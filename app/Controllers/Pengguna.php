<?php

namespace App\Controllers;

use App\Models\Pengguna_m;

class Pengguna extends BaseController
{

  public function index()
  {
    $Pengguna_m = new Pengguna_m();
    $data['pengguna'] = $Pengguna_m->getAllUsers();
    return $this->template("pengguna/list_vw", "Master/Pengguna", $data);
  }

  public function tambah()
  {

    $data['jabatan'] = ['Purchasing', 'Marketing', 'Kepala Gudang', 'General Manager'];
    $data['jenis_kelamin'] = ['Laki-Laki', 'Perempuan'];
    return $this->template("pengguna/tambah_vw", "Master/Pengguna/Tambah", $data);
  }

  public function tambah_sv()
  {
    $Pengguna_m = new Pengguna_m();
    $Pengguna_m->db->transBegin();

    $post =  $this->request->getPost();
    $data = [
      'username' => $post['username'],
      'password' => password_hash($post['password'], PASSWORD_DEFAULT),
      'nama'      => $post['nama'],
      'jabatan'   => $post['jabatan'],
      'jenis_kelamin' => $post['jenis_kelamin'],
      'tgl_lahir'     => $post['tgl_lahir'],
      'telp'          => $post['telp']
    ];

    $Pengguna_m->insertUser($data);
    if ($Pengguna_m->db->transStatus() === false) {
      $status = "danger";
      $msg = 'Data pengguna gagal ditambahkan';
      $Pengguna_m->db->transRollback();
    } else {
      $status = "success";
      $msg = 'Data pengguna berhasil ditambahkan';
      $Pengguna_m->db->transCommit();
    }
    $this->setMessage($status, $msg);
    return redirect()->to(base_url('master/pengguna'));
  }



  public function ubah($usr_id)
  {
    $Pengguna_m = new Pengguna_m();
    $data['user'] = $Pengguna_m->getUserById($usr_id);
    $data['jabatan'] = ['Purchasing', 'Marketing', 'Kepala Gudang', 'General Manager'];
    $data['jenis_kelamin'] = ['Laki-Laki', 'Perempuan'];
    return $this->template("pengguna/ubah_vw", "Master/Pengguna/Ubah", $data);
  }


  public function ubah_sv()
  {
    $Pengguna_m = new Pengguna_m();

    $Pengguna_m->db->transBegin();

    $post =  $this->request->getPost();
    $data = [
      'username' => $post['username'],
      'nama'      => $post['nama'],
      'jabatan'   => $post['jabatan'],
      'jenis_kelamin' => $post['jenis_kelamin'],
      'tgl_lahir'     => $post['tgl_lahir'],
      'telp'          => $post['telp']
    ];

    if (!empty($post['password'])) {
      $data['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
    }

    $Pengguna_m->updateUser($post['user_id'], $data);

    if ($Pengguna_m->db->transStatus() === false) {
      $status = "danger";
      $msg = 'Data pengguna gagal diubah';
      $Pengguna_m->db->transRollback();
    } else {
      $status = "success";
      $msg = 'Data pengguna berhasil diubah';
      $Pengguna_m->db->transCommit();
    }
    $this->setMessage($status, $msg);
    return redirect()->to(base_url('master/pengguna'));
  }


  public function hapus($usr_id)
  {
    $Pengguna_m = new Pengguna_m();
    $Pengguna_m->deleteUser($usr_id);

    if ($Pengguna_m->db->transStatus() === false) {
      $status = "danger";
      $msg = 'Data pengguna gagal dihapus';
      $Pengguna_m->db->transRollback();
    } else {
      $status = "success";
      $msg = 'Data pengguna berhasil dihapus';
      $Pengguna_m->db->transCommit();
    }
    $this->setMessage($status, $msg);
    return redirect()->to(base_url('master/pengguna'));
  }
}
