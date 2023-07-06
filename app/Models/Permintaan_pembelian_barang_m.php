<?php

namespace App\Models;

use CodeIgniter\Model;

class Permintaan_pembelian_barang_m extends Model
{
  protected $table = 'permintaan_pembelian_barang';
  protected $primaryKey = 'id';
  protected $allowedFields = ['id_permintaan_pembelian', 'id_barang', 'nama', 'kode', 'jumlah', 'satuan', 'harga', 'total'];

  public function insertPermintaanPembelianBarang($data)
  {
    return $this->insertBatch($data);
  }

  public function getPermintaanPembelianBarang($id)
  {
    return $this->where(['id_permintaan_pembelian' => $id])->findAll();
  }

  public function updatePermintaanPembelian($id, $data)
  {
    return $this->update($id, $data);
  }
}
