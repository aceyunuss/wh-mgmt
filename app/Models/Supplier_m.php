<?php

namespace App\Models;

use CodeIgniter\Model;

class Supplier_m extends Model
{
  protected $table = 'supplier';
  protected $primaryKey = 'id';
  protected $allowedFields = ['kode', 'nama', 'alamat'];

  public function insertSupplier($data)
  {
    return $this->insert($data);
  }

  public function getSupplier($id)
  {
    return $this->find($id);
  }

  public function getAllSupplier()
  {
    return $this->findAll();
  }

  public function updateSupplier($id, $data)
  {
    return $this->update($id, $data);
  }

  public function deleteSupplier($id)
  {
    return $this->delete($id);
  }
}
