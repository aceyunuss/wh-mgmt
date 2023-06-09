<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $site_title . " - " . $site_subtitle; ?></title>

  <link rel="shortcut icon" href="<?= base_url('assets/images/logo/favicon.ico'); ?>">
  <link href="<?= base_url('assets/vendors/apexcharts/dist/apexcharts.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('assets/css/app.min.css'); ?>" rel="stylesheet">
</head>

<body>
  <div class="layout">
    <div class="vertical-layout">
      <?php
      include("header_vw.php");
      include("navbar_vw.php");
      include("content_vw.php");
      ?>
    </div>
  </div>

  <script src="<?= base_url('assets/js/vendors.min.js'); ?>"></script>
  <script src="<?= base_url('assets/vendors/apexcharts/dist/apexcharts.min.js'); ?>"></script>
  <script src="<?= base_url('assets/js/pages/dashboard.js'); ?>"></script>
  <script src="<?= base_url('assets/js/app.min.js'); ?>"></script>

</body>

</html>