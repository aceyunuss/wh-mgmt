<?php

namespace App\Models;

use CodeIgniter\Model;

class Barang_m extends Model
{
  protected $table = 'barang';
  protected $primaryKey = 'id';
  protected $allowedFields = ['kode', 'nama', 'jenis', 'stok', 'satuan'];

  public function insertBarang($data)
  {
    return $this->insert($data);
  }

  public function getBarang($id)
  {
    return $this->find($id);
  }

  public function getAllBarang()
  {
    return $this->findAll();
  }

  public function updateBarang($id, $data)
  {
    return $this->update($id, $data);
  }

  public function deleteBarang($id)
  {
    return $this->delete($id);
  }
}
