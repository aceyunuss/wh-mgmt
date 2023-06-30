<div class="card">
  <div class="card-header">
    <h5>Form Permintaan Barang</h5>
  </div>
  <div class="card-body">
    <div class="mt-4">
      <div class="row">
        <div class="col-md-7">
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Nomor</label>
            <div class="col-sm-9">
              <input type="hidden" value="<?= $nomor ?>" name="nomor">
              <label class="col-sm-3 col-form-label"><?= $nomor ?></label>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Keterangan</label>
            <div class="col-sm-9">
              <textarea class="form-control"></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
    </br>
    <hr>
    <center>
      <h5 class="fw-bold mt-3">Data Barang</h5>
    </center>
    <div class="mt-5">
      <table class="table">
        <thead>
          <tr>
            <th>No.</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Samsung Galaxy S20+</td>
            <td>2</td>
            <td>$899.00</td>
            <td>$1,798.00</td>
          </tr>
          <tr>
            <td>2</td>
            <td>SonicGear Evo 9 BTMI Speaker</td>
            <td>1</td>
            <td>$199.00</td>
            <td>$199.00</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Sharp Aquos 40-Inch Easy Smart LED TV</td>
            <td>1</td>
            <td>$977.00</td>
            <td>$977.00</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="d-flex justify-content-end mt-5">
      <div class="text-end">
        <div class="border-bottom">
          <p class="mb-2"><span>Sub - Total amount: </span><span>$2,075.00</span></p>
          <p>vat (10%) : 207.50</p>
        </div>
        <h5 class="fw-bold mt-3"><span class="ms-1">Grand Total: </span><span>$1,867.50</span></h5>
      </div>
    </div>
    </br></br></br>
    <center>
      <button class="btn btn-primary" type="submit">Simpan</button>
    </center>

  </div>
</div>