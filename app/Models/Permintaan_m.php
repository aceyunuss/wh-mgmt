<?php

namespace App\Models;

use CodeIgniter\Model;

class Permintaan_m extends Model
{
  protected $table = 'permintaan';
  protected $primaryKey = 'id';
  protected $allowedFields = ['nama_pengguna', 'nomor', 'tanggal', 'keterangan', 'status', 'posisi'];

  public function insertPermintaan($data)
  {
    return $this->insert($data);
  }

  public function getPermintaan($id)
  {
    return $this->find($id);
  }

  public function getPermintaanParam($where)
  {
    return $this->where($where)->get()->getRowArray();
  }

  public function getAllPermintaan()
  {
    return $this->findAll();
  }

  public function updatePermintaan($id, $data)
  {
    return $this->update($id, $data);
  }

  public function generateNum()
  {
    $lastValue = $this->countAllResults();
    $last = $lastValue + 1;
    $code = "BKS/" . date('Ym') . "/" . str_repeat(0, 4 - strlen($last)) . $last;

    return $code;
  }
}
