<form method="POST" action="<?= site_url('master/supplier/ubah_sv') ?>">
  <input type="hidden" class="form-control" name="id" value="<?= $supplier['id'] ?>">
  <div class="card">
    <div class="card-header">
      <h5>Form Ubah Supplier</h5>
    </div>
    <div class="card-body">
      <div class="mt-4">
        <div class="row">
          <div class="col-md-7">
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Kode</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="kode" required value="<?= $supplier['kode'] ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Nama</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nama" required value="<?= $supplier['nama'] ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Alamat</label>
              <div class="col-sm-9">
                <textarea class="form-control" required name="alamat"><?= $supplier['alamat'] ?></textarea>
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