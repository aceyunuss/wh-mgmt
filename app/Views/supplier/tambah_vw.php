<form method="POST" action="<?= site_url('master/supplier/tambah_sv') ?>">
  <div class="card">
    <div class="card-header">
      <h5>Form Tambah Supplier</h5>
    </div>
    <div class="card-body">
      <div class="mt-4">
        <div class="row">
          <div class="col-md-7">
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Kode</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="kode" required>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Nama</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nama" required>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Alamat</label>
              <div class="col-sm-9">
                <textarea class="form-control" name="alamat" required></textarea>
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