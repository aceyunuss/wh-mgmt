<?php

namespace App\Models;

use CodeIgniter\Model;

class Pembelian_m extends Model
{
  protected $table = 'pembelian';
  protected $primaryKey = 'id';
  protected $allowedFields = ['nama_pengguna', 'nomor', 'tanggal', 'keterangan', 'status', 'posisi', 'id_supplier', 'kode_supplier', 'nama_supplier', 'note'];

  public function insertPembelian($data)
  {
    return $this->insert($data);
  }

  public function getPembelian($id)
  {
    return $this->find($id);
  }

  public function getPembelianParam($where)
  {
    return $this->where($where)->get()->getRowArray();
  }

  public function getAllPembelian()
  {
    return $this->findAll();
  }

  public function updatePembelian($id, $data)
  {
    return $this->update($id, $data);
  }

  public function generateNum()
  {
    $lastValue = $this->countAllResults();
    $last = $lastValue + 1;
    $code = "BUY/" . date('Ym') . "/" . str_repeat(0, 4 - strlen($last)) . $last;

    return $code;
  }
}
