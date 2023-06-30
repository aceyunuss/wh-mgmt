<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengguna_m extends Model
{
  protected $table = 'pengguna';
  protected $primaryKey = 'id';
  protected $allowedFields = ['username', 'nama', 'password', 'jabatan', 'jenis_kelamin', 'tgl_lahir', 'telp'];

  public function insertUser($data)
  {
    return $this->insert($data);
  }

  public function getUserById($id)
  {
    return $this->find($id);
  }

  public function checkLogin($username, $password)
  {
    $user = $this->where('username', $username)->first();

    if ($user && password_verify($password, $user['password'])) {
      return $user;
    }

    return null;
  }

  public function getAllUsers()
  {
    return $this->findAll();
  }

  public function updateUser($id, $data)
  {
    return $this->update($id, $data);
  }

  public function deleteUser($id)
  {
    return $this->delete($id);
  }
}
