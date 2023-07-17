<?php

namespace App\Controllers;

use App\Models\Barang_m;
use App\Models\Permintaan_m;
use App\Models\Permintaan_barang_m;

class Permintaan extends BaseController
{

  public function index()
  {
    $Barang_m = new Barang_m();
    $Permintaan_m = new Permintaan_m();
    $data['barang'] = $Barang_m->getAllBarang();
    $data['tgl'] = date('d-m-Y');
    $data['nomor'] = $Permintaan_m->generateNum();
    return $this->template("permintaan/form_vw", "Permintaan", $data);
  }


  public function buat()
  {
    $Permintaan_m = new Permintaan_m();
    $Permintaan_barang_m = new Permintaan_barang_m();
    $post = $this->request->getPost();

    $data = [
      'nama_pengguna' => session()->get('nama'),
      'nomor'         => $post['nomor'],
      'tanggal'       => date('Y-m-d'),
      'keterangan'    => $post['keterangan'],
      'status'        => "Menunggu Persetujuan",
      'posisi'        => "Kepala Gudang",
      'nomor_po'      => $post['nomor_po'],
      'tanggal_po'    => $post['tgl_po'],
    ];

    $Permintaan_m->db->transBegin();

    $Permintaan_m->insertPermintaan($data);
    $id = $Permintaan_m->db->insertID();

    foreach ($post['itm_id'] as $key => $value) {
      $barang[$key]['id_permintaan']      = $id;
      $barang[$key]['id_barang']      = (int)$post['itm_id'][$key];
      $barang[$key]['kode']      = $post['itm_code'][$key];
      $barang[$key]['nama']       = $post['itm_nama'][$key];
      $barang[$key]['jumlah']       = $post['itm_jml'][$key];
      $barang[$key]['satuan']    = $post['itm_unt'][$key];
    }

    $Permintaan_barang_m->insertPermintaanBarang($barang);

    if ($Permintaan_m->db->transStatus() === false) {
      $status = "danger";
      $msg = 'Data permintaan gagal dibuat';
      $Permintaan_m->db->transRollback();
    } else {
      $status = "success";
      $msg = 'Data permintaan berhasil dibuat';
      $Permintaan_m->db->transCommit();
    }

    $this->setMessage($status, $msg);
    return redirect()->to(base_url(''));
  }


  public function proses($id)
  {
    $Permintaan_barang_m = new Permintaan_barang_m();
    $Permintaan_m = new Permintaan_m();

    $data['permintaan'] = $Permintaan_m->getPermintaan($id);
    $data['barang'] = $Permintaan_barang_m->getPermintaanBarang($id);

    return $this->template("permintaan/proses_vw", "Permintaan", $data);
  }


  public function persetujuan()
  {
    $Permintaan_m = new Permintaan_m();
    $post = $this->request->getPost();

    $data = [
      'status'        => $post['status'],
      'posisi'        => "Kepala Gudang (Proses Selesai)",
      'note'          => $post['note']
    ];

    $Permintaan_m->db->transBegin();
    $Permintaan_m->updatePermintaan($post['id'], $data);

    if ($post['status'] == "Disetujui") {
      $this->updateStock($post['id']);
    }

    if ($Permintaan_m->db->transStatus() === false) {
      $status = "danger";
      $msg = 'Data permintaan gagal diproses';
      $Permintaan_m->db->transRollback();
    } else {
      $status = "success";
      $msg = 'Data permintaan berhasil diproses';
      $Permintaan_m->db->transCommit();
    }

    $this->setMessage($status, $msg);
    return redirect()->to(base_url(''));
  }


  public function getbyno($no)
  {
    $Permintaan_barang_m = new Permintaan_barang_m();
    $Permintaan_m = new Permintaan_m();

    $permintaan = $Permintaan_m->getPermintaanParam(['nomor' => $no]);

    $barang = "";
    if (!empty($permintaan)) {
      $barang = $Permintaan_barang_m->getPermintaanBarang($permintaan['id']);
    }

    echo json_encode($barang);
  }

  public function riwayat($id)
  {
    $Permintaan_barang_m = new Permintaan_barang_m();
    $Permintaan_m = new Permintaan_m();

    $data['permintaan'] = $Permintaan_m->getPermintaan($id);
    $data['barang'] = $Permintaan_barang_m->getPermintaanBarang($id);

    return $this->template("permintaan/riwayat_vw", "Riwayat Permintaan", $data);
  }

  public function updateStock($id)
  {
    $Permintaan_barang_m = new Permintaan_barang_m();
    $Barang_m = new Barang_m();
    $barang = $Permintaan_barang_m->getPermintaanBarang($id);

    foreach ($barang as $k => $v) {
      $mst =  $Barang_m->getBarang($v['id_barang']);
      $stock = empty($mst['stok']) ? 0 : ($mst['stok'] - $v['jumlah']);
      $Barang_m->updateBarang($mst['id'], ['stok' => $stock]);
    }
  }
}
