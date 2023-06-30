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
      'status'        => "Menunggu Persetujuan"
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
}
