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

  public function getDash1(){
    return $this->db->query("select * from vw_dash1")->getRowArray();
  }
  
  public function getDash2(){
    return $this->db->query("select * from vw_dash2")->getRowArray();
  }
  
  public function getDash3(){
    return $this->db->query("select * from vw_dash3")->getRowArray();
  }
}
