<?php

namespace App\Models;

use CodeIgniter\Model;

class Permintaan_barang_m extends Model
{
  protected $table = 'permintaan_barang';
  protected $primaryKey = 'id';
  protected $allowedFields = ['id_permintaan', 'id_barang', 'nama', 'kode', 'jumlah', 'satuan'];

  public function insertPermintaanBarang($data)
  {
    return $this->insertBatch($data);
  }

  public function getPermintaanBarang($id)
  {
    return $this->where(['id_permintaan' => $id])->findAll();
  }

  public function updatePermintaan($id, $data)
  {
    return $this->update($id, $data);
  }
}
