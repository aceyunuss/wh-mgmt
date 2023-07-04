<?php

namespace App\Controllers;

use App\Models\Permintaan_pembelian_m;
use App\Models\Permintaan_pembelian_barang_m;

class Permintaan_pembelian extends BaseController
{

  public function index()
  {
    return $this->template("permintaan_pembelian/form_vw", "Permintaan Pembelian", []);
  }

  public function buat()
  {
    $Permintaan_pembelian_m = new Permintaan_pembelian_m();
    $Permintaan_pembelian_barang_m = new Permintaan_pembelian_barang_m();
    $post = $this->request->getPost();

    $no = $Permintaan_pembelian_m->generateNum();

    $data = [
      'nama_pengguna' => session()->get('nama'),
      'nomor'         => $no,
      'tanggal'       => date('Y-m-d'),
      'status'        => "Menunggu Persetujuan",
      'posisi'        => "Purchasing",
      'id_permintaan' => $post['id_permintaan']
    ];

    $Permintaan_pembelian_m->db->transBegin();

    $Permintaan_pembelian_m->insertPermintaanPembelian($data);
    $id = $Permintaan_pembelian_m->db->insertID();

    foreach ($post['itm_id'] as $key => $value) {
      $barang[$key]['id_permintaan_pembelian'] = $id;
      $barang[$key]['id_barang']      = (int)$post['itm_id'][$key];
      $barang[$key]['kode']      = $post['itm_code'][$key];
      $barang[$key]['nama']       = $post['itm_nama'][$key];
      $barang[$key]['jumlah']       = $post['itm_jml'][$key];
      $barang[$key]['satuan']    = $post['itm_unt'][$key];
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

    $data['permintaanpembelian'] = $Permintaan_pembelian_m->getPermintaanPembelian($id);
    $data['barang'] = $Permintaan_pembelian_barang_m->getPermintaanPembelianBarang($id);

    return $this->template("permintaan_pembelian/proses_vw", "Permintaan Pembelian", $data);
  }


  public function persetujuan()
  {
    $Permintaan_pembelian_m = new Permintaan_pembelian_m();
    $id = $this->request->getPost('id');

    $data = [
      'status'        => "Disetujui",
      'posisi'        => "Purchasing (Proses Selesai)"
    ];

    $Permintaan_pembelian_m->db->transBegin();
    $Permintaan_pembelian_m->updatePermintaanPembelian($id, $data);

    if ($Permintaan_pembelian_m->db->transStatus() === false) {
      $status = "danger";
      $msg = 'Data permintaan pembelian gagal disetujui';
      $Permintaan_pembelian_m->db->transRollback();
    } else {
      $status = "success";
      $msg = 'Data permintaan pembelian berhasil disetujui';
      $Permintaan_pembelian_m->db->transCommit();
    }

    $this->setMessage($status, $msg);
    return redirect()->to(base_url(''));
  }
}