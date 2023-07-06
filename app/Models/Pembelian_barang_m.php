<?php

namespace App\Models;

use CodeIgniter\Model;

class Pembelian_barang_m extends Model
{
  protected $table = 'pembelian_barang';
  protected $primaryKey = 'id';
  protected $allowedFields = ['id_pembelian', 'id_barang', 'nama', 'kode', 'jumlah', 'satuan', 'harga', 'total'];

  public function insertPembelianBarang($data)
  {
    return $this->insertBatch($data);
  }

  public function getPembelianBarang($id)
  {
    return $this->where(['id_pembelian' => $id])->findAll();
  }

  public function updatePembelian($id, $data)
  {
    return $this->update($id, $data);
  }
}
