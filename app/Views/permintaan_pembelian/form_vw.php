<form method="POST" action="<?= site_url('permintaanpembelian/buat') ?>" class="form">
  <div class="card">
    <div class="card-header">
      <h5>Form Permintaan Pembelian Barang</h5>
    </div>
    <div class="card-body">
      <div class="mt-4">
        <div class="row">
          <div class="col-md-12">
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Nomor Permintaan</label>
              <div class="col-sm-4">
                <div class="input-group mb-12">
                  <input id="no_permintaan" type="text" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
                  <input type="hidden" value="" name="id_permintaan" id="id_permintaan">
                  <button class="btn btn-outline-secondary" type="button" id="cari">Cari</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </br>
      <hr>
      <div class="mt-5">
        <table class="table item_table">
          <thead>
            <tr>
              <th style="text-align: center;">#</th>
              <th>Kode</th>
              <th>Nama Barang</th>
              <th>Jumlah</th>
              <th>Satuan</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
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

    $('#cari').click(function() {
      $('.item_table tbody').empty()
      let tbody = "";
      let no = $('#no_permintaan').val();
      $.ajax({
        method: 'GET',
        url: '<?= site_url('permintaan/getbyno/'); ?>' + no,
        dataType: 'json',
        success: function(response) {
          response.forEach(el => {
            tbody += '<tr>\
            <td><center><i class="icon-trash-2 feather remove"></i></i></center></td>\
              <input type="hidden" value="' + el.id_barang + '" name="itm_id[]">\
              <td>' + el.kode + '</td>\
              <input type="hidden" value="' + el.kode + '" name="itm_code[]">\
              <td>' + el.nama + '</td>\
              <input type="hidden" value="' + el.nama + '" name="itm_nama[]">\
              <td><input type="number" min=0 class="form-control" style="width: 130px" value="' + el.jumlah + '" name="itm_jml[]"></td>\
              <td>' + el.satuan + '</td>\
              <input type="hidden" value="' + el.satuan + '" name="itm_unt[]">\
            </tr>';
          });
          $('#id_permintaan').val(response[0].id_permintaan);
          $('.item_table tbody').append(tbody)
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    })
  })

  $(document).on('click', '.remove', function() {
    if (confirm("Anda yakin ingin menghapus?")) {
      $(this).parent().parent().parent().remove();
    }
  })

  $(".form").submit(function(e) {
    if ($('.item_table tr').length == 1) {
      alert("Barang boleh kosong")
      e.preventDefault();
    }
  })
</script>