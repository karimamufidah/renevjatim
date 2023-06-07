<form class="card mb-3" onsubmit="postMain();return false" id="import-card" style="display: none">
  <div class="card-header">
    <small class="bx bx-upload"></small>&nbsp; Import CSV
  </div>

  <div class="card-body">
    <div class="row">
      <div class="col-md-6 col-12">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input class="form-control" type="date" id="tanggal" />
      </div>

      <div class="col-md-6 col-12">
        <label for="tanggal" class="form-label">File</label>
        <input class="form-control" type="file" id="file" accept=".csv">
      </div>
    </div>
  </div>

  <div class="card-footer">
    <button class="btn btn-primary float-end m-1">Simpan & Tambah Lagi</button>
    <button type="button" class="btn btn-default float-end m-1" onclick="hideImportForm()">Tutup</button>
  </div>
</form>