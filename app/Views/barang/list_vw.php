<div class="card">
  <div class="card-header">
    <h5>List Barang</h5>
  </div>
  <div class="card-body">
    <?php if ($access) { ?>
      <a href="<?= site_url('master/barang/tambah') ?>" class="btn btn-primary btn-md"><span class="icon-plus feather"></span>&nbsp; Tambah</a>
    <?php } ?>
    <div class="mt-4">
      <table id="data-table" class="table data-table">
        <thead>
          <tr>
            <th style="text-align: center;">Aksi</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Satuan</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ((array)$barang as $key => $value) { ?>
            <tr>
              <td style="width: 20%; text-align:center;">
                <a href="<?= site_url('master/barang/ubah/' . $value['id']) ?>" class="btn btn-primary btn-sm <?= !$access ? "disabled" :  "" ?> ">Ubah</a>
                <a href="<?= site_url('master/barang/hapus/' . $value['id']) ?>" class="btn btn-danger btn-sm <?= !$access ? "disabled" :  "" ?> " onclick="return confirm('Apakah anda yakin ingin menghapus?')">Hapus</a>
              </td>
              <td><?= $value['kode'] ?></td>
              <td><?= $value['nama'] ?></td>
              <td><?= $value['harga'] ?></td>
              <td><?= $value['stok'] ?></td>
              <td><?= $value['satuan'] ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

  </div>
</div>