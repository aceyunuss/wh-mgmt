<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('dashboard', 'Home::dashboard');
$routes->get('riwayat', 'Home::riwayat');
$routes->get('logout', 'Home::logout');
$routes->post('login', 'Home::login');


$routes->group('master', function ($routes) {
  $routes->group('pengguna', function ($routes) {
    $routes->get('/', 'Pengguna::index');
    $routes->get('tambah', 'Pengguna::tambah');
    $routes->post('tambah_sv', 'Pengguna::tambah_sv');
    $routes->get('ubah/(:num)', 'Pengguna::ubah/$1');
    $routes->post('ubah_sv', 'Pengguna::ubah_sv');
    $routes->get('hapus/(:num)', 'Pengguna::hapus/$1');
  });

  $routes->group('barang', function ($routes) {
    $routes->get('/', 'Barang::index');
    $routes->get('tambah', 'Barang::tambah');
    $routes->post('tambah_sv', 'Barang::tambah_sv');
    $routes->get('ubah/(:num)', 'Barang::ubah/$1');
    $routes->post('ubah_sv', 'Barang::ubah_sv');
    $routes->get('hapus/(:num)', 'Barang::hapus/$1');
  });

  $routes->group('supplier', function ($routes) {
    $routes->get('/', 'Supplier::index');
    $routes->get('tambah', 'Supplier::tambah');
    $routes->post('tambah_sv', 'Supplier::tambah_sv');
    $routes->get('ubah/(:num)', 'Supplier::ubah/$1');
    $routes->post('ubah_sv', 'Supplier::ubah_sv');
    $routes->get('hapus/(:num)', 'Supplier::hapus/$1');
  });
});

$routes->group('permintaan', function ($routes) {
  $routes->get('/', 'Permintaan::index');
  $routes->post('buat', 'Permintaan::buat');
  $routes->get('proses/(:num)', 'Permintaan::proses/$1');
  $routes->get('riwayat/(:num)', 'Permintaan::riwayat/$1');
  $routes->post('persetujuan', 'Permintaan::persetujuan');
  $routes->get('getbyno/(:any)', 'Permintaan::getbyno/$1');
  $routes->get('getbypo/(:any)', 'Permintaan::getbypo/$1');
});

$routes->group('permintaanpembelian', function ($routes) {
  $routes->get('/', 'Permintaan_pembelian::index');
  $routes->post('buat', 'Permintaan_pembelian::buat');
  $routes->get('proses/(:num)', 'Permintaan_pembelian::proses/$1');
  $routes->get('riwayat/(:num)', 'Permintaan_pembelian::riwayat/$1');
  $routes->post('persetujuan', 'Permintaan_pembelian::persetujuan');
  $routes->get('getbyno/(:any)', 'Permintaan_pembelian::getbyno/$1');
});

$routes->group('pembelian', function ($routes) {
  $routes->get('/', 'Pembelian::index');
  $routes->post('buat', 'Pembelian::buat');
  $routes->get('proses/(:num)', 'Pembelian::proses/$1');
  $routes->get('riwayat/(:num)', 'Pembelian::riwayat/$1');
  $routes->post('persetujuan', 'Pembelian::persetujuan');
  $routes->get('getbyno/(:any)', 'Pembelian::getbyno/$1');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
  require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
