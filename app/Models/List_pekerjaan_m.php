<?php

namespace App\Models;

use CodeIgniter\Model;

class List_pekerjaan_m extends Model
{
  protected $table = 'vw_list_pekerjaan';
  protected $primaryKey = 'link';

  public function getPekerjaan()
  {
    return $this->where(['posisi' => session()->get('jabatan')])->findAll();
  }
}
