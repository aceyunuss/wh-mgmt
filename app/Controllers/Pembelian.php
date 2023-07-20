<?php

namespace App\Controllers;

use App\Models\Barang_m;
use App\Models\Supplier_m;
use App\Models\Pembelian_m;
use App\Models\Permintaan_m;
use App\Models\Pembelian_barang_m;

class Pembelian extends BaseController
{

  public function index()
  {
    $Barang_m = new Barang_m();
    $Pembelian_m = new Pembelian_m();
    $Supplier_m = new Supplier_m();
    $Permintaan = new Permintaan_m();
    $data['barang'] = $Barang_m->getAllBarang();
    $data['supplier'] = $Supplier_m->getAllSupplier();
    $data['tgl'] = date('d-m-Y');
    $data['nomor'] = $Pembelian_m->generateNum();
    $permintaan = $Permintaan->getAllPermintaan();
    $po = [];
    foreach ($permintaan as $p) {
      $po[] = $p['nomor_po'];
    }
    $data['po'] = $po;
    return $this->template("pembelian/form_vw", "Pembelian", $data);
  }


  public function buat()
  {
    $Pembelian_m = new Pembelian_m();
    $Pembelian_barang_m = new Pembelian_barang_m();
    $Supplier_m = new Supplier_m();
    $post = $this->request->getPost();


    $sup = $Supplier_m->getSupplier($post['supplier']);

    $data = [
      'nama_pengguna' => session()->get('nama'),
      'nomor'         => $post['nomor'],
      'tanggal'       => date('Y-m-d'),
      'keterangan'    => $post['keterangan'],
      'status'        => "Menunggu Persetujuan",
      'posisi'        => "General Manager",
      'id_supplier'   => $sup['id'],
      'kode_supplier' => $sup['kode'],
      'nama_supplier' => $sup['nama'],
      'nomor_po'      => $post['nomor_po'],
      'tanggal_po'    => $post['tgl_po_real'],
    ];

    $Pembelian_m->db->transBegin();

    $Pembelian_m->insertPembelian($data);
    $id = $Pembelian_m->db->insertID();

    foreach ($post['itm_id'] as $key => $value) {
      $barang[$key]['id_pembelian']      = $id;
      $barang[$key]['id_barang']      = (int)$post['itm_id'][$key];
      $barang[$key]['kode']      = $post['itm_code'][$key];
      $barang[$key]['nama']       = $post['itm_nama'][$key];
      $barang[$key]['jumlah']       = $post['itm_jml'][$key];
      $barang[$key]['satuan']    = $post['itm_unt'][$key];
      $barang[$key]['total']    = $post['itm_total'][$key];
      $barang[$key]['harga']    = $post['itm_harga'][$key];
    }

    $Pembelian_barang_m->insertPembelianBarang($barang);

    if ($Pembelian_m->db->transStatus() === false) {
      $status = "danger";
      $msg = 'Data pembelian gagal dibuat';
      $Pembelian_m->db->transRollback();
    } else {
      $status = "success";
      $msg = 'Data pembelian berhasil dibuat';
      $Pembelian_m->db->transCommit();
    }

    $this->setMessage($status, $msg);
    return redirect()->to(base_url(''));
  }


  public function proses($id)
  {
    $Pembelian_barang_m = new Pembelian_barang_m();
    $Pembelian_m = new Pembelian_m();

    $data['pembelian'] = $Pembelian_m->getPembelian($id);
    $data['barang'] = $Pembelian_barang_m->getPembelianBarang($id);

    return $this->template("pembelian/proses_vw", "Pembelian", $data);
  }


  public function persetujuan()
  {
    $Pembelian_m = new Pembelian_m();
    $post = $this->request->getPost();

    $data = [
      'status'        => $post['status'],
      'note'          => $post['note'],
      'posisi'        => "General Manager (Proses Selesai)"
    ];

    $Pembelian_m->db->transBegin();
    $Pembelian_m->updatePembelian($post['id'], $data);

    if ($post['status'] == "Disetujui") {
      $this->updateStock($post['id']);
    }

    if ($Pembelian_m->db->transStatus() === false) {
      $status = "danger";
      $msg = 'Data pembelian gagal diproses';
      $Pembelian_m->db->transRollback();
    } else {
      $status = "success";
      $msg = 'Data pembelian berhasil diproses';
      $Pembelian_m->db->transCommit();
    }

    $this->setMessage($status, $msg);
    return redirect()->to(base_url(''));
  }


  public function getbyno($no)
  {
    $Pembelian_barang_m = new Pembelian_barang_m();
    $Pembelian_m = new Pembelian_m();

    $pembelian = $Pembelian_m->getPembelianParam(['nomor' => $no]);

    $barang = "";
    if (!empty($pembelian)) {
      $barang = $Pembelian_barang_m->getPembelianBarang($pembelian['id']);
    }

    echo json_encode($barang);
  }


  public function riwayat($id)
  {
    $Pembelian_barang_m = new Pembelian_barang_m();
    $Pembelian_m = new Pembelian_m();

    $data['pembelian'] = $Pembelian_m->getPembelian($id);
    $data['barang'] = $Pembelian_barang_m->getPembelianBarang($id);

    return $this->template("pembelian/riwayat_vw", "Riwayat Pembelian", $data);
  }

  public function updateStock($id)
  {
    $Pembelian_barang_m = new Pembelian_barang_m();
    $Barang_m = new Barang_m();
    $barang = $Pembelian_barang_m->getPembelianBarang($id);

    foreach ($barang as $k => $v) {
      $mst =  $Barang_m->getBarang($v['id_barang']);
      $stock = $mst['stok'] + $v['jumlah'];
      $Barang_m->updateBarang($mst['id'], ['stok' => $stock]);
    }
  }
}
