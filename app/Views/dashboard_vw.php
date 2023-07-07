<div class="row">
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <div class="text-muted mb-2">Total Nilai Permintaan Pembelian</div>
        <h3>Rp <?= $dash1['permintaan_pembelian'] ?></h3>
        </p>
        <span class="text-muted fw-semibold">Total Nilai Pembelian</span>
        <h3>Rp <?= $dash1['pembelian'] ?></h3>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h4>Data</h4>
        <div class="my-4">
          <div class="row">
            <div class="col-4">
              <h5><?= $dash2['pengguna'] ?></h5>
              <span class="text-muted">Pengguna</span>
            </div>
            <div class="col-4">
              <h5><?= $dash2['supplier'] ?></h5>
              <span class="text-muted">Supplier</span>
            </div>
            <div class="col-4">
              <h5><?= $dash2['barang'] ?></h5>
              <span class="text-muted">Barang</span>
            </div>
          </div>
        </div>
        <div class="progress">
          <div class="progress-bar bg-danger" style="width: 33%;"></div>
          <div class="progress-bar bg-warning" style="width: 34%;"></div>
          <div class="progress-bar bg-primary" style="width: 33%;"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h5 class="mb-1"><?= $dash3['permintaan_pending'] ?></h5>
        <div class="text-muted d-flex justify-content-between mb-2">
          <span>Permintaan Disetujui</span>
          <span><?= empty($dash3['permintaan_total']) ? 0 : round(($dash3['permintaan_pending'] / $dash3['permintaan_total'] * 100), 0) ?> %</span>
        </div>
        <div class="progress-sm progress">
          <div class="progress-bar bg-info" style="width: <?= empty($dash3['permintaan_total']) ? 0 : round(($dash3['permintaan_pending'] / $dash3['permintaan_total'] * 100), 0) ?>%"></div>
        </div>
        </p>
        <h5 class="mb-1"><?= $dash3['permintaan_pembelian_pending'] ?></h5>
        <div class="text-muted d-flex justify-content-between mb-2">
          <span>Permintaan Pembelian Disetujui</span>
          <span><?= empty($dash3['permintaan_pembelian_total']) ? 0 : round(($dash3['permintaan_pembelian_pending'] / $dash3['permintaan_pembelian_total'] * 100), 0) ?> %</span>
        </div>
        <div class="progress-sm progress">
          <div class="progress-bar bg-success" style="width: <?= empty($dash3['permintaan_pembelian_total']) ? 0 : round(($dash3['permintaan_pembelian_pending'] / $dash3['permintaan_pembelian_total'] * 100), 0) ?>%"></div>
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
                    <i class="<?= $v['icon'] ?>"></i>&nbsp;&nbsp;<?= $v['kategori'] ?>
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