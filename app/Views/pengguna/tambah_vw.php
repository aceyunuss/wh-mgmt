<form method="POST" action="<?= site_url('master/pengguna/tambah_sv') ?>">
  <div class="card">
    <div class="card-header">
      <h5>Form Tambah Pengguna</h5>
    </div>
    <div class="card-body">
      <div class="mt-4">
        <div class="row">
          <div class="col-md-7">
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Nama</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nama" required>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Jabatan</label>
              <div class="col-sm-9">
                <select class="form-control" name="jabatan" required>
                  <option value="">--Pilih--</option>
                  <?php foreach ($jabatan as $je) { ?>
                    <option value="<?= $je ?>"><?= $je ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
              <div class="col-sm-9">
                <select class="form-control" name="jenis_kelamin" required>
                  <option value="">--Pilih--</option>
                  <?php foreach ($jenis_kelamin as $jk) { ?>
                    <option value="<?= $jk ?>"><?= $jk ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
              <div class="col-sm-5">
                <input type="date" class="form-control" name="tgl_lahir" required>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Telp.</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="telp" required>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Username</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="username" required>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" name="password" required>
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