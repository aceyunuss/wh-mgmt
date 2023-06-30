<div class="card">
  <div class="card-header">
    <h5>List Supplier</h5>
  </div>
  <div class="card-body">
    <a href="<?= site_url('master/supplier/tambah') ?>" class="btn btn-primary btn-md"><span class="icon-plus feather"></span>&nbsp; Tambah</a>
    <div class="mt-4">
      <table id="data-table" class="table data-table">
        <thead>
          <tr>
            <th style="text-align: center;">Aksi</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Alamat</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ((array)$supplier as $key => $value) { ?>
            <tr>
              <td style="width: 20%; text-align:center;">
                <a href="<?= site_url('master/supplier/ubah/' . $value['id']) ?>" class="btn btn-primary btn-sm">Ubah</a>
                <a href="<?= site_url('master/supplier/hapus/' . $value['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus?')">Hapus</a>
              </td>
              <td><?= $value['kode'] ?></td>
              <td><?= $value['nama'] ?></td>
              <td><?= $value['alamat'] ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

  </div>
</div>