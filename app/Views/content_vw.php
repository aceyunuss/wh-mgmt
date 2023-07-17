<!-- Content START -->
<div class="content">
  <div class="main">
    <div class="page-header">
      <h4 class="page-title"><?= $site_subtitle2 ? $site_subtitle2 : $site_subtitle; ?></h4>
      <div class="breadcrumb">
        <span class="me-1 text-gray"><i class="feather icon-home"></i></span>
        <div class="breadcrumb-item">Home</div>
        <div class="breadcrumb-item"><?= $site_subtitle ?></div>
        <?php if (!empty($site_subtitle2)) { ?>
          <div class="breadcrumb-item"><?= $site_subtitle2 ?></div>
        <?php } ?>
      </div>
    </div>

    <?php if (isset($message) && !empty($message)) { ?>
      <div class="alert alert-<?= $message['status'] ?> alert-dismissible fade show" role="alert">
        <?= $message['msg'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php
      // $session = session();
      session()->remove('message');
    } ?>
    <?php include($content . ".php"); ?>
  </div>

  <!-- Footer START -->
  <div class="footer">
    <div class="footer-content">
      <p class="mb-0">Copyright © 2023</p>
    </div>
  </div>
  <!-- Footer End -->
</div>
<!-- Content END -->