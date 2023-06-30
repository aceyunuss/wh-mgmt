<div class="card">
  <div class="card-header">
    <h5>List Pengguna</h5>
  </div>
  <div class="card-body">
    <a href="<?= site_url('master/pengguna/tambah') ?>" class="btn btn-primary btn-md"><span class="icon-plus feather"></span>&nbsp; Tambah</a>
    <div class="mt-4">
      <table id="data-table" class="table data-table">
        <thead>
          <tr>
            <th style="text-align: center;">Aksi</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>No. Telp</th>
            <th>Jenis Kelamin</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ((array)$pengguna as $key => $value) { ?>
            <tr>
              <td style="width: 20%; text-align:center;">
                <a href="<?= site_url('master/pengguna/ubah/' . $value['id']) ?>" class="btn btn-primary btn-sm">Ubah</a>
                <a href="<?= site_url('master/pengguna/hapus/' . $value['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus?')">Hapus</a>
              </td>
              <td><?= $value['nama'] ?></td>
              <td><?= $value['jabatan'] ?></td>
              <td><?= $value['telp'] ?></td>
              <td><?= $value['jenis_kelamin'] ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

  </div>
</div>