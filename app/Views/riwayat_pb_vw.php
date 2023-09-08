<?php if (!in_array($usr['jabatan'], ["Marketing", "Kepala Gudang"])) { ?>
  <div class="card">
    <div class="card-header">
      <h5>Riwayat Pembelian Barang</h5>
    </div>
    <div class="card-body">
      <div class="mt-4">
        <table id="data-table-3" class="table data-table">
          <thead>
            <tr>
              <th style="text-align: center;">#</th>
              <th>Nomor</th>
              <th>Tanggal</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($pb as $k => $v) { ?>
              <tr class="cursor-pointer">
                <td style="text-align: center;">
                  <a href="<?= site_url('/pembelian/riwayat/' . $v['id']) ?>" class="btn btn-sm btn-primary">Lihat</a>
                </td>
                <td><?= $v['nomor'] ?></td>
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
<?php } ?>