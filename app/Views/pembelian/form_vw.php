<form method="POST" action="<?= site_url('pembelian/buat') ?>" class="form">
  <div class="card">
    <div class="card-header">
      <h5>Form Pembelian Barang</h5>
    </div>
    <div class="card-body">
      <div class="mt-4">
        <div class="row">
          <div class="col-md-12">
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Nomor</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" value="<?= $nomor ?>" name="nomor" readonly>
              </div>
              <div class="col-sm-1"></div>
              <label class="col-sm-2 col-form-label">Nomor Pesanan Pembelian</label>
              <div class="col-sm-3">
                <select class="form-control nomor_pesanan_pembelian" name="nomor_pesanan_pembelian" required>
                  <option value="">--Pilih--</option>
                  <?php foreach ((array)$nopp as $p) { ?>
                    <option value="<?= $p ?>"><?= $p ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Tanggal Pembelian</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" value="<?= $tgl ?>" name="tgl" readonly>
              </div>
              <div class="col-sm-1"></div>
              <label class="col-sm-2 col-form-label">Nomor PO</label>
              <div class="col-sm-3">
                <input type="text" class="form-control nomor_po" name="nomor_po" readonly>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Supplier</label>
              <div class="col-sm-3">
                <select class="form-control" name="supplier">
                  <option value="">--Pilih--</option>
                  <?php foreach ((array)$supplier as $k => $b) { ?>
                    <option value="<?= $b['id'] ?>"><?= $b['kode'] . " - " . $b['nama']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-sm-1"></div>
              <label class="col-sm-2 col-form-label">Tanggal PO</label>
              <div class="col-sm-3">
                <input type="text" class="form-control tgl_po" name="tgl_po" readonly>
                <input type="date" class="form-control tgl_po_real" name="tgl_po_real" style="display: none;">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Keterangan</label>
              <div class="col-sm-4">
                <textarea class="form-control" name="keterangan"></textarea>
              </div>
              <label class="col-sm-2 col-form-label">File PO</label>
              <div class="col-sm-3">
                <a target="_blank" class="link_file_po" href="<?= site_url('download/') ?>"></a>
                <input type="text" class="form-control file_po" name="file_po" style="display: none;">
              </div>
            </div>
          </div>
        </div>
      </div>
      </br>
      <hr>
      <div class="mt-5">
        <!--
        <div class="row">
          <div class="col-md-12">
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Barang</label>
              <div class="col-sm-9">
                <select class="form-control" id="item">
                  <option value="">--Pilih--</option>
                  <?php foreach ((array)$barang as $k => $b) { ?>
                    <option value="<?= $b['id'] ?>"><?= $b['kode'] . " - " . $b['nama'] . " @" . $b['harga'] . "/" . $b['satuan'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Jumlah</label>
              <div class="col-sm-2">
                <input type="number" class="form-control" id="jml">
              </div>
            </div>
          </div>
        </div>
        <center>
          <a class="btn btn-success btn-sm add">Tambah Barang</a>
        </center>
        </br>
                  -->
        <table class="table item_table">
          <thead>
            <tr>
              <th style="text-align: center;">#</th>
              <th>Kode</th>
              <th>Nama Barang</th>
              <th>Jumlah</th>
              <th>Satuan</th>
              <th>Harga</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
        <div class="d-flex justify-content-end mt-5">
          <div class="text-end">
            <h5 class="fw-bold mt-3"><span class="ms-1">Total Akhir : Rp </span><span class="ta">0</span></h5>
          </div>
        </div>
      </div>
      </br></br></br>
      <center>
        <button class="btn btn-primary" type="submit">Simpan</button>
      </center>
    </div>
  </div>
</form>
<script>
  $(document).ready(function() {

    $(".nomor_pesanan_pembelian").change(function() {
      const no = $(this).val().replaceAll("/", "|");
      let tbody = ""
      $('.item_table tbody').empty()
      $.ajax({
        method: 'GET',
        url: '<?= site_url('permintaanpembelian/getbyno/'); ?>' + no,
        dataType: 'json',
        success: function(response) {
          response.forEach(el => {
            tbody += '<tr>\
              <td><center><i class="icon-trash-2 feather remove"></i></i></center></td>\
              <td>' + el.kode + '</td>\
              <input type="hidden" value="' + el.kode + '" name="itm_code[]">\
              <td>' + el.nama + '</td>\
              <input type="hidden" value="' + el.id_barang + '" name="itm_id[]">\
              <input type="hidden" value="' + el.nama + '" name="itm_nama[]">\
              <td>' + el.jumlah + '</td>\
              <input type="hidden" value="' + el.jumlah + '" name="itm_jml[]">\
              <td>' + el.satuan + '</td>\
              <input type="hidden" value="' + el.satuan + '" name="itm_unt[]">\
              <td>' + el.harga + '</td>\
              <input type="hidden" value="' + el.harga + '" name="itm_harga[]">\
              <td>' + el.total + '</td>\
              <input type="hidden" value="' + el.total + '" name="itm_total[]">\
            </tr>';
          })

          $('.file_po').val(response[0].file_po);
          $('.link_file_po').text(response[0].file_po).attr("href", "<?= site_url('download/') ?>" + response[0].file_po);
          $('.nomor_po').val(response[0].nomor_po);
          tgl = response[0].tanggal_po.split("-")
          $('.tgl_po').val(tgl[2] + "-" + tgl[1] + "-" + tgl[0]);
          $('.tgl_po_real').val(response[0].tanggal_po);

          $('.item_table tbody').append(tbody)
          sumTot();
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    })

    $('.add').click(function() {
      let counter = $('.item_table tr').length + 1;
      let id = $('#item').val()
      let selected = $('#item option:selected').text()
      let sel = selected.split(" - ");
      let code = sel[0];
      let name = sel[1].split("@")[0];
      let harga = sel[1].split("@")[1].split("/")[0];
      let unit = sel[1].split("@")[1].split("/")[1];
      let qty = $('#jml').val()
      let total = harga * qty;

      if (name == "" || qty == "" || id == "") {
        alert('Please fill form item')
      } else {

        tbody = '<tr>\
              <td><center><i class="icon-trash-2 feather remove"></i></i></center></td>\
              <td>' + code + '</td>\
              <input type="hidden" value="' + code + '" name="itm_code[]">\
              <td>' + name + '</td>\
              <input type="hidden" value="' + id + '" name="itm_id[]">\
              <input type="hidden" value="' + name + '" name="itm_nama[]">\
              <td>' + qty + '</td>\
              <input type="hidden" value="' + qty + '" name="itm_jml[]">\
              <td>' + unit + '</td>\
              <input type="hidden" value="' + unit + '" name="itm_unt[]">\
              <td>' + harga + '</td>\
              <input type="hidden" value="' + harga + '" name="itm_harga[]">\
              <td>' + total + '</td>\
              <input type="hidden" value="' + total + '" name="itm_total[]">\
            </tr>';

        $('.item_table tbody').append(tbody)
        $('#item, #jml').val('')
        $('#item').trigger('change')
        sumTot();
      }
    })
  })



  function sumTot() {
    let stot = 0;
    $('.item_table tbody tr').each(function() {
      stot += $(this).children().eq(12).text() * 1;
    });
    $(".ta").text(stot.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."))
  }


  $(document).on('click', '.remove', function() {
    if (confirm("Anda yakin ingin menghapus?")) {
      $(this).parent().parent().parent().remove();
      sumTot();
    }
  })


  $(".form").submit(function(e) {
    if ($('.item_table tr').length == 1) {
      alert("Barang boleh kosong")
      e.preventDefault();
    }
  })
</script>