<form class="card mb-3" onsubmit="postDelete();return false" id="delete-card" style="display: none">
  <div class="card-header">
    <small class="bx bx-trash"></small>&nbsp; Hapus Per Tanggal
  </div>

  <div class="card-body">
    <div class="row">
      <div class="col-12">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input class="form-control" type="date" id="dc-tanggal" />
      </div>
    </div>
  </div>

  <div class="card-footer">
    <button class="btn btn-primary float-end m-1">Hapus</button>
    <button type="button" class="btn btn-default float-end m-1" onclick="hideDeleteForm()">Tutup</button>
  </div>
</form>