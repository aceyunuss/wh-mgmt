<div class="card">
  <div class="card-header">
    <h5>Form Permintaan Pembelian Barang</h5>
  </div>
  <div class="card-body">
    <div class="mt-4">
      <div class="row">
        <div class="col-md-12">
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nomor</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" value="<?= $permintaan['nomor'] ?>" readonly>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Tanggal</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" value="<?= $permintaan['tanggal'] ?>" readonly>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-6">
              <textarea class="form-control" readonly><?= $permintaan['keterangan'] ?></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-5">
      <table class="table item_table">
        <thead>
          <tr>
            <th style="text-align: center;">No.</th>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Satuan</th>
            <th>Harga</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $total = 0;
          foreach ($barang as $k => $v) {
            $total += $v['total'];
          ?>
            <tr>
              <td>
                <center><?= $k + 1 ?></center>
              </td>
              <td><?= $v['kode'] ?></td>
              <td><?= $v['nama'] ?></td>
              <td><?= $v['jumlah'] ?></td>
              <td><?= $v['satuan'] ?></td>
              <td><?= number_format($v['harga'], 0, ",", ".") ?></td>
              <td><?= number_format($v['total'], 0, ",", ".") ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <div class="d-flex justify-content-end mt-5">
        <div class="text-end">
          <h5 class="fw-bold mt-3"><span class="ms-1">Total Akhir : Rp </span><span class="ta"><?= number_format($total, 0, ",", ".") ?></span></h5>
        </div>
      </div>
    </div>
    </br>
  </div>
</div>