<form method="POST" action="<?= site_url('master/pengguna/ubah_sv') ?>">
  <input type="hidden" class="form-control" name="user_id" required value="<?= $user['id'] ?>">
  <div class="card">
    <div class="card-header">
      <h5>Form Ubah Pengguna</h5>
    </div>
    <div class="card-body">
      <div class="mt-4">
        <div class="row">
          <div class="col-md-7">
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Nama</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nama" required value="<?= $user['nama'] ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Jabatan</label>
              <div class="col-sm-9">
                <select class="form-control" name="jabatan" required>
                  <option value="">--Pilih--</option>
                  <?php foreach ($jabatan as $je) { ?>
                    <option <?= $je == $user['jabatan'] ? "selected" : ""; ?> value="<?= $je ?>"><?= $je ?></option>
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
                    <option <?= $jk == $user['jenis_kelamin'] ? "selected" : ""; ?> value="<?= $jk ?>"><?= $jk ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
              <div class="col-sm-5">
                <input type="date" class="form-control" name="tgl_lahir" required value="<?= $user['tgl_lahir'] ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Telp.</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="telp" required value="<?= $user['telp'] ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Username</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="username" required value="<?= $user['username'] ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" name="password">
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