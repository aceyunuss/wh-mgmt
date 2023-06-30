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
  <ul class="nav-menu">
    <li class="nav-group-title">Data Master</li>
    <li class="nav-menu-item">
      <a href="<?= site_url("master/pengguna") ?>">
        <i class="icon-users feather"></i>
        <span class="nav-menu-item-title">Pengguna</span>
      </a>
    </li>
    <li class="nav-menu-item">
      <a href="<?= site_url("master/barang") ?>">
        <i class="icon-package feather"></i>
        <span class="nav-menu-item-title">Barang</span>
      </a>
    </li>
    <li class="nav-menu-item">
      <a href="<?= site_url("master/supplier") ?>">
        <i class="icon-truck feather"></i>
        <span class="nav-menu-item-title">Supplier</span>
      </a>
    </li>
  </ul>
  <ul class="nav-menu">
    <li class="nav-group-title">Transaksi</li>
    <li class="nav-menu-item">
      <a href="<?= site_url("permintaanbarang") ?>">
        <i class="icon-box feather"></i>
        <span class="nav-menu-item-title">Permintaan Barang</span>
      </a>
    </li>
    <li class="nav-menu-item">
      <a href="v-mail.html">
        <i class="icon-briefcase feather"></i>
        <span class="nav-menu-item-title">Permintaan Pembelian Barang</span>
      </a>
    </li>
    <li class="nav-menu-item">
      <a href="v-chat.html">
        <i class="icon-shopping-bag feather"></i>
        <span class="nav-menu-item-title">Pembelian Barang</span>
      </a>
    </li>
  </ul>
</div>
<!-- Side Nav END -->