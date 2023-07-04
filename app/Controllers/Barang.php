<?php

namespace App\Controllers;

use App\Models\Barang_m;

class Barang extends BaseController
{

  public function index()
  {
    $Barang_m = new Barang_m();
    $data['barang'] = $Barang_m->getAllBarang();
    return $this->template("barang/list_vw", "Master/Barang", $data);
  }

  public function tambah()
  {
    $data['satuan'] = ['BOX', 'PCS', 'SET', 'PACK', 'ROL'];
    return $this->template("barang/tambah_vw", "Master/Barang/Tambah", $data);
  }

  public function tambah_sv()
  {
    $Barang_m = new Barang_m();
    $Barang_m->db->transBegin();

    $post =  $this->request->getPost();
    $data = [
      'kode' => $post['kode'],
      'nama'      => $post['nama'],
      'harga'   => $post['harga'],
      'stok' => $post['stok'],
      'satuan'     => $post['satuan']
    ];

    $Barang_m->insertBarang($data);
    if ($Barang_m->db->transStatus() === false) {
      $status = "danger";
      $msg = 'Data barang gagal ditambahkan';
      $Barang_m->db->transRollback();
    } else {
      $status = "success";
      $msg = 'Data barang berhasil ditambahkan';
      $Barang_m->db->transCommit();
    }
    $this->setMessage($status, $msg);
    return redirect()->to(base_url('master/barang'));
  }



  public function ubah($id)
  {
    $Barang_m = new Barang_m();
    $data['barang'] = $Barang_m->getBarang($id);
    $data['satuan'] = ['BOX', 'PCS', 'SET', 'PACK', 'ROL'];
    return $this->template("barang/ubah_vw", "Master/Barang/Ubah", $data);
  }


  public function ubah_sv()
  {
    $Barang_m = new Barang_m();

    $Barang_m->db->transBegin();

    $post =  $this->request->getPost();
    $data = [
      'kode' => $post['kode'],
      'nama'      => $post['nama'],
      'harga'   => $post['harga'],
      'stok' => $post['stok'],
      'satuan'     => $post['satuan']
    ];

    $Barang_m->updateBarang($post['id'], $data);

    if ($Barang_m->db->transStatus() === false) {
      $status = "danger";
      $msg = 'Data barang gagal diubah';
      $Barang_m->db->transRollback();
    } else {
      $status = "success";
      $msg = 'Data barang berhasil diubah';
      $Barang_m->db->transCommit();
    }
    $this->setMessage($status, $msg);
    return redirect()->to(base_url('master/barang'));
  }


  public function hapus($id)
  {
    $Barang_m = new Barang_m();
    $Barang_m->deleteBarang($id);

    if ($Barang_m->db->transStatus() === false) {
      $status = "danger";
      $msg = 'Data barang gagal dihapus';
      $Barang_m->db->transRollback();
    } else {
      $status = "success";
      $msg = 'Data barang berhasil dihapus';
      $Barang_m->db->transCommit();
    }
    $this->setMessage($status, $msg);
    return redirect()->to(base_url('master/barang'));
  }
}
