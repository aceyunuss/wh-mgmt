 <?php

namespace App\Controllers;

use App\Models\User;

class Home extends BaseController
{
  public function index()
  {
    $session = session();
    if (is_null($session->get('uid'))) {
      return view('login');
    } else {
      return redirect()->to('dashboard');
    }
  }

  public function dashboard()
  {
    return $this->template("dashboard_vw", "Hola", []);
  }

  public function login()
  {
    $session = session();

    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    $userModel = new User();

    $user = $userModel->checkLogin($username, $password);

    if ($user) {

      $session->set('uid', $user['id']);
      $session->set('nama', $user['nama']);
      $session->set('jabatan', $user['jabatan']);
      echo "<script>alert('Login berhasi!')</script>";
    } else {
      echo "<script>alert('Login gagal! Username dan password tidak sesuai.')</script>";
    }
    return $this->index();
  }

  public function logout()
  {
    $session = session();
    $session->destroy();
    return redirect()->to('/');
  }
}
