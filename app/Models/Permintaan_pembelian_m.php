<?php

namespace App\Models;

use CodeIgniter\Model;

class Permintaan_pembelian_m extends Model
{
  protected $table = 'permintaan_pembelian';
  protected $primaryKey = 'id';
  protected $allowedFields = ['nama_pengguna', 'nomor', 'tanggal', 'status', 'posisi', 'id_permintaan', 'note', 'nomor_po', 'tanggal_po'];

  public function insertPermintaanPembelian($data)
  {
    return $this->insert($data);
  }

  public function getPermintaanPembelian($id)
  {
    return $this->find($id);
  }

  public function getPermintaanParamPembelian($where)
  {
    return $this->where($where)->get()->getRowArray();
  }

  public function getAllPermintaanPembelian()
  {
    return $this->findAll();
  }

  public function updatePermintaanPembelian($id, $data)
  {
    return $this->update($id, $data);
  }

  public function generateNum()
  {
    $lastValue = $this->countAllResults();
    $last = $lastValue + 1;
    $code = "PER-BKS/" . date('Ym') . "/" . str_repeat(0, 4 - strlen($last)) . $last;

    return $code;
  }
}
