<div class="row">
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <div class="text-muted mb-2">This Quarter</div>
        <h3>$3,936.80</h3>
        </p>
        <span class="text-muted fw-semibold">Total Revenue</span>
        <h3>$3,936.80</h3>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h4>Device Satistic</h4>
        <div class="my-4">
          <div class="row">
            <div class="col-4">
              <h5>50%</h5>
              <span class="text-muted">Chrome</span>
            </div>
            <div class="col-4">
              <h5>30%</h5>
              <span class="text-muted">Firefox</span>
            </div>
            <div class="col-4">
              <h5>20%</h5>
              <span class="text-muted">Edge</span>
            </div>
          </div>
        </div>
        <div class="progress">
          <div class="progress-bar bg-danger" style="width: 25%;"></div>
          <div class="progress-bar bg-warning" style="width: 15%;"></div>
          <div class="progress-bar bg-info" style="width: 50%;"></div>
          <div class="progress-bar bg-primary" style="width: 10%;"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h5 class="mb-1">88</h5>
        <div class="text-muted d-flex justify-content-between mb-2">
          <span>Online Revenue</span>
          <span>70%</span>
        </div>
        <div class="progress-sm progress">
          <div class="progress-bar bg-info" style="width: 70%"></div>
        </div>
        </p>
        <h5 class="mb-1">69</h5>
        <div class="text-muted d-flex justify-content-between mb-2">
          <span>Offline Revenue</span>
          <span>50%</span>
        </div>
        <div class="progress-sm progress">
          <div class="progress-bar bg-success" style="width: 50%"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-4">
          <h4 class="mb-0">List Pekerjaan</h4>
        </div>
        <table class="table table-hover mt-2">
          <thead>
            <tr>
              <th style="text-align: center;">#</th>
              <th>Nomor</th>
              <th>Kategori</th>
              <th>Tanggal</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($pekerjaan as $k => $v) { ?>
              <tr class="cursor-pointer">
                <td style="text-align: center;">
                  <a href="<?= site_url($v['link']) ?>" class="btn btn-sm btn-primary">Proses</a>
                </td>
                <td><?= $v['nomor'] ?></td>
                <td>
                  <div class="d-flex align-items-center">
                    <i class="icon-box feather"></i>&nbsp;&nbsp;<?= $v['kategori'] ?>
                  </div>
                </td>
                <td><?= $v['tanggal'] ?></td>
                <td>
                  <div class="badge-dot bg-success"></div>
                  <span class="ms-2"><?= $v['status'] ?></span>
                </td>
              </tr>
            <?php } ?>
          </tbody>

        </table>
      </div>
    </div>
  </div>
</div>