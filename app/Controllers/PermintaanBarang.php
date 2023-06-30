<?php

namespace App\Controllers;

use App\Models\Pengguna;

class PermintaanBarang extends BaseController
{

  public function index()
  {
    $data['nomor'] = "RE.123123";
    return $this->template("permintaanbarang/form_vw", "Permintaan Barang", $data);
  }
}
