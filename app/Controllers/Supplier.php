<?php

namespace App\Controllers;

use App\Models\Supplier_m;

class Supplier extends BaseController
{

  public function index()
  {
    $Supplier_m = new Supplier_m();
    $data['supplier'] = $Supplier_m->getAllSupplier();
    return $this->template("supplier/list_vw", "Master/Supplier", $data);
  }

  public function tambah()
  {
    return $this->template("supplier/tambah_vw", "Master/Supplier/Tambah");
  }

  public function tambah_sv()
  {
    $Supplier_m = new Supplier_m();
    $Supplier_m->db->transBegin();

    $post =  $this->request->getPost();
    $data = [
      'kode' => $post['kode'],
      'nama'      => $post['nama'],
      'alamat'   => $post['alamat'],
    ];

    $Supplier_m->insertSupplier($data);
    if ($Supplier_m->db->transStatus() === false) {
      $status = "danger";
      $msg = 'Data supplier gagal ditambahkan';
      $Supplier_m->db->transRollback();
    } else {
      $status = "success";
      $msg = 'Data supplier berhasil ditambahkan';
      $Supplier_m->db->transCommit();
    }
    $this->setMessage($status, $msg);
    return redirect()->to(base_url('master/supplier'));
  }



  public function ubah($id)
  {
    $Supplier_m = new Supplier_m();
    $data['supplier'] = $Supplier_m->getSupplier($id);
    return $this->template("supplier/ubah_vw", "Master/Supplier/Ubah", $data);
  }


  public function ubah_sv()
  {
    $Supplier_m = new Supplier_m();

    $Supplier_m->db->transBegin();

    $post =  $this->request->getPost();
    $data = [
      'kode' => $post['kode'],
      'nama'      => $post['nama'],
      'alamat'   => $post['alamat'],
    ];

    $Supplier_m->updateSupplier($post['id'], $data);

    if ($Supplier_m->db->transStatus() === false) {
      $status = "danger";
      $msg = 'Data supplier gagal diubah';
      $Supplier_m->db->transRollback();
    } else {
      $status = "success";
      $msg = 'Data supplier berhasil diubah';
      $Supplier_m->db->transCommit();
    }
    $this->setMessage($status, $msg);
    return redirect()->to(base_url('master/supplier'));
  }


  public function hapus($id)
  {
    $Supplier_m = new Supplier_m();
    $Supplier_m->deleteSupplier($id);

    if ($Supplier_m->db->transStatus() === false) {
      $status = "danger";
      $msg = 'Data supplier gagal dihapus';
      $Supplier_m->db->transRollback();
    } else {
      $status = "success";
      $msg = 'Data supplier berhasil dihapus';
      $Supplier_m->db->transCommit();
    }
    $this->setMessage($status, $msg);
    return redirect()->to(base_url('master/supplier'));
  }
}
