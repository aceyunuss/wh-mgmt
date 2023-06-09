<?php

namespace App\Controllers;

class Home extends BaseController
{
  public function index()
  {
    return view('login');
  }

  public function te()
  {
    return $this->template("dashboard_vw", "Hola", []);
  }

  public function login()
  {
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    if (true) {
      $session = session();
      $session->set('username', $username);
      return $this->template("dashboard_vw", "Hola", []);
    } else {
      echo 'Invalid username or password.';
    }
  }
}
