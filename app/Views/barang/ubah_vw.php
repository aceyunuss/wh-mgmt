<form method="POST" action="<?= site_url('master/barang/ubah_sv') ?>">
  <input type="hidden" class="form-control" name="id" value="<?= $barang['id'] ?>">
  <div class="card">
    <div class="card-header">
      <h5>Form Tambah Barang</h5>
    </div>
    <div class="card-body">
      <div class="mt-4">
        <div class="row">
          <div class="col-md-7">
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Kode</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="kode" required value="<?= $barang['kode'] ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Nama</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nama" required value="<?= $barang['nama'] ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Jenis</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="jenis" required value="<?= $barang['jenis'] ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Stok</label>
              <div class="col-sm-9">
                <input type="number" class="form-control" name="stok" required value="<?= $barang['stok'] ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Satuan</label>
              <div class="col-sm-9">
                <select class="form-control" name="satuan" required>
                  <option value="">--Pilih--</option>
                  <?php foreach ($satuan as $sa) { ?>
                    <option <?= $barang['satuan'] == $sa ? "selected" : "" ?> value="<?= $sa ?>"><?= $sa ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <center>
        <br>
        <button class="btn btn-primary" type="submit">Simpan</button>
      </center>
    </div>
  </div>
</form>