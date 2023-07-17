<div class="card">
  <div class="card-header">
    <h5>Form Permintaan Barang</h5>
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
            <div class="col-sm-1"></div>
            <label class="col-sm-2 col-form-label">Nomor PO</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" value="<?= $permintaan['nomor_po'] ?>" readonly>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Tanggal Permintaan</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" value="<?= $permintaan['tanggal'] ?>" readonly>
            </div>
            <div class="col-sm-1"></div>
            <label class="col-sm-2 col-form-label">Tanggal PO</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" value="<?= $permintaan['tanggal_po'] ?>" readonly>
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
          </tr>
        </thead>
        <tbody>
          <?php foreach ($barang as $k => $v) { ?>
            <tr>
              <td>
                <center><?= $k + 1 ?></center>
              </td>
              <td><?= $v['kode'] ?></td>
              <td><?= $v['nama'] ?></td>
              <td><?= $v['jumlah'] ?></td>
              <td><?= $v['satuan'] ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    </br>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <div class="mt-4">
      <div class="row">
        <div class="col-md-12">
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Catatan</label>
            <div class="col-sm-9">
              <textarea class="form-control" readonly><?= $permintaan['note'] ?></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>