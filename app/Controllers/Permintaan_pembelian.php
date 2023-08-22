<?php

namespace App\Controllers;

use App\Models\Barang_m;
use App\Models\Permintaan_m;
use App\Models\Permintaan_pembelian_m;
use App\Models\Permintaan_pembelian_barang_m;

class Permintaan_pembelian extends BaseController
{

  public function index()
  {
    $Barang_m = new Barang_m();
    $Permintaan_pembelian_m = new Permintaan_pembelian_m();
    $Permintaan = new Permintaan_m();
    $data['barang'] = $Barang_m->getAllBarang();
    $data['tgl'] = date('d-m-Y');
    $data['nomor'] = $Permintaan_pembelian_m->generateNum();

    $Permintaan_pembelian_m->select("nomor_permintaan");
    $per_pem = $Permintaan_pembelian_m->getAllPermintaanPembelian();;
    $used = array_filter(array_column($per_pem, "nomor_permintaan"), function ($item) {
      return $item !== NULL;
    });

    $Permintaan->whereNotIn("nomor", $used);
    $permintaan = $Permintaan->getAllPermintaan();
    $nop = [];
    foreach ($permintaan as $p) {
      $nop[] = $p['nomor'];
    }
    $data['nop'] = $nop;
    return $this->template("permintaan_pembelian/form_vw", "Pesanan Pembelian", $data);
  }


  public function buat()
  {
    $Permintaan_pembelian_m = new Permintaan_pembelian_m();
    $Permintaan_pembelian_barang_m = new Permintaan_pembelian_barang_m();
    $post = $this->request->getPost();

    $data = [
      'nama_pengguna' => session()->get('nama'),
      'nomor'         => $post['nomor'],
      'tanggal'       => date('Y-m-d'),
      'keterangan'    => $post['keterangan'],
      'status'        => "Menunggu Persetujuan",
      'posisi'        => "Purchasing",
      'nomor_po'      => $post['nomor_po'],
      'tanggal_po'    => $post['tgl_po_real'],
      'file_po'      => $post['file_po'],
      'nomor_permintaan' => $post['nomor_pesanan']
    ];

    $Permintaan_pembelian_m->db->transBegin();

    $Permintaan_pembelian_m->insertPermintaanPembelian($data);
    $id = $Permintaan_pembelian_m->db->insertID();

    foreach ($post['itm_id'] as $key => $value) {
      $barang[$key]['id_permintaan_pembelian']      = $id;
      $barang[$key]['id_barang']      = (int)$post['itm_id'][$key];
      $barang[$key]['kode']      = $post['itm_code'][$key];
      $barang[$key]['nama']       = $post['itm_nama'][$key];
      $barang[$key]['jumlah']       = $post['itm_jml'][$key];
      $barang[$key]['satuan']    = $post['itm_unt'][$key];
      $barang[$key]['total']    = $post['itm_total'][$key];
      $barang[$key]['harga']    = $post['itm_harga'][$key];
    }

    $Permintaan_pembelian_barang_m->insertPermintaanPembelianBarang($barang);

    if ($Permintaan_pembelian_m->db->transStatus() === false) {
      $status = "danger";
      $msg = 'Data permintaan pembelian gagal dibuat';
      $Permintaan_pembelian_m->db->transRollback();
    } else {
      $status = "success";
      $msg = 'Data permintaan pembelian berhasil dibuat';
      $Permintaan_pembelian_m->db->transCommit();
    }

    $this->setMessage($status, $msg);
    return redirect()->to(base_url(''));
  }


  public function proses($id)
  {
    $Permintaan_pembelian_barang_m = new Permintaan_pembelian_barang_m();
    $Permintaan_pembelian_m = new Permintaan_pembelian_m();

    $data['permintaan'] = $Permintaan_pembelian_m->getPermintaanPembelian($id);
    $data['barang'] = $Permintaan_pembelian_barang_m->getPermintaanPembelianBarang($id);

    return $this->template("permintaan_pembelian/proses_vw", "Pesanan Pembelian", $data);
  }


  public function persetujuan()
  {
    $Permintaan_pembelian_m = new Permintaan_pembelian_m();
    $post = $this->request->getPost();

    $data = [
      'status'        => $post['status'],
      'note'          => $post['note'],
      'posisi'        => "Purchasing (Proses Selesai)"
    ];

    $Permintaan_pembelian_m->db->transBegin();
    $Permintaan_pembelian_m->updatePermintaanPembelian($post['id'], $data);

    if ($Permintaan_pembelian_m->db->transStatus() === false) {
      $status = "danger";
      $msg = 'Data permintaan pembelian gagal diproses';
      $Permintaan_pembelian_m->db->transRollback();
    } else {
      $status = "success";
      $msg = 'Data permintaan pembelian berhasil diproses';
      $Permintaan_pembelian_m->db->transCommit();
    }

    $this->setMessage($status, $msg);
    return redirect()->to(base_url(''));
  }


  public function getbyno($no)
  {
    $Permintaan_pembelian_barang_m = new Permintaan_pembelian_barang_m();
    $Permintaan_pembelian_m = new Permintaan_pembelian_m();
    $no = str_replace("|", "/", $no);

    $permintaan = $Permintaan_pembelian_m->getPermintaanParamPembelian(['nomor' => $no]);

    $barang = "";
    if (!empty($permintaan)) {
      $barang = $Permintaan_pembelian_barang_m->getPermintaanPembelianBarang($permintaan['id']);
      $barang[0]['nomor_po'] = $permintaan['nomor_po'];
      $barang[0]['tanggal_po'] = $permintaan['tanggal_po'];
      $barang[0]['file_po'] = $permintaan['file_po'];
    }

    echo json_encode($barang);
  }

  public function riwayat($id)
  {
    $Permintaan_pembelian_barang_m = new Permintaan_pembelian_barang_m();
    $Permintaan_pembelian_m = new Permintaan_pembelian_m();

    $data['permintaan'] = $Permintaan_pembelian_m->getPermintaanPembelian($id);
    $data['barang'] = $Permintaan_pembelian_barang_m->getPermintaanPembelianBarang($id);

    return $this->template("permintaan_pembelian/riwayat_vw", "Riwayat Pesanan Pembelian", $data);
  }
}
