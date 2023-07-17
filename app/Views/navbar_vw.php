<!-- Side Nav START -->
<div class="side-nav vertical-menu nav-menu-light scrollable">
  <a href="<?= site_url() ?>">
    <div class="nav-logo">
      <div class="logo">
        <img class="img-fluid" src="<?= base_url('assets/images/logo/logo-fold.png') ?>" style="max-height: 50px;" alt="logo">
      </div>
      <span><b>GM Medical</b></span>
      <div class="mobile-close">
        <i class="icon-arrow-left feather"></i>
      </div>
    </div>
  </a>
  <li class="nav-menu-item dash">
    <a href="<?= site_url("dashboard") ?>">
      <i class="feather icon-home"></i>
      <span class="nav-menu-item-title">Dashboard</span>
    </a>
  </li>
  <ul class="nav-menu">
    <li class="nav-group-title">Data Master</li>
    <li class="nav-menu-item pengguna">
      <a href="<?= site_url("master/pengguna") ?>">
        <i class="icon-users feather"></i>
        <span class="nav-menu-item-title">Pengguna</span>
      </a>
    </li>
    <li class="nav-menu-item barang">
      <a href="<?= site_url("master/barang") ?>">
        <i class="icon-package feather"></i>
        <span class="nav-menu-item-title">Barang</span>
      </a>
    </li>
    <li class="nav-menu-item supp">
      <a href="<?= site_url("master/supplier") ?>">
        <i class="icon-truck feather"></i>
        <span class="nav-menu-item-title">Supplier</span>
      </a>
    </li>
  </ul>
  <ul class="nav-menu">
    <li class="nav-group-title">Transaksi</li>
    <li class="nav-menu-item perm">
      <a href="<?= site_url("permintaan") ?>">
        <i class="icon-box feather"></i>
        <span class="nav-menu-item-title">Pesanan Barang</span>
      </a>
    </li>
    <li class="nav-menu-item permpemb">
      <a href="<?= site_url("permintaanpembelian") ?>">
        <i class="icon-briefcase feather"></i>
        <span class="nav-menu-item-title">Pesanan Pembelian Barang</span>
      </a>
    </li>
    <li class="nav-menu-item pemb">
      <a href="<?= site_url("pembelian") ?>">
        <i class="icon-shopping-bag feather"></i>
        <span class="nav-menu-item-title">Pembelian Barang</span>
      </a>
    </li>
    <li class="nav-menu-item riw">
      <a href="<?= site_url("riwayat") ?>">
        <i class="icon-clock feather"></i>
        <span class="nav-menu-item-title">Riwayat Transaksi</span>
      </a>
    </li>
    <!-- <li class="nav-menu-item">
      <a href="<?= site_url("prediksi") ?>">
        <i class="icon-bar-chart-2 feather"></i>
        <span class="nav-menu-item-title">Prediksi Persediaan</span>
      </a>
    </li> -->
  </ul>
</div>


<script>
  let role =  "<?= $usr['jabatan'] ?>";

  $('.nav-menu-item').hide();
  switch (role) {
    case "Admin Aplikasi":
      $('.pemb, .pengguna, .barang, .supp, .permpemb, .perm, .riw, .dash').show();
    case "Purchasing":
      $('.pemb, .barang, .supp, .riw, .dash').show();
      break;
    case "Marketing":
      $('.perm, .barang, .riw, .dash').show();
      break;
    case "Kepala Gudang":
      $('.permpemb, .barang, .riw, .dash').show();
      break;
    case "General Manager":
      $('.riw, .dash').show();
      break;
  }
</script>

<!-- Side Nav END -->