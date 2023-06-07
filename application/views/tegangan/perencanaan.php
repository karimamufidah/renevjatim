<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tegangan | Perencanaan</span></h4>

  <div class="row">
    <div class="col-md-12">
      <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item">
          <a class="nav-link active" href="javascript:void(0);">Perencanaan</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('tegangan/realisasi') ?>">Realisasi</a>
        </li>
      </ul>

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
              <input class="form-control" type="file" id="file" multiple accept=".csv">
            </div>
          </div>
        </div>

        <div class="card-footer">
          <button class="btn btn-primary float-end m-1">Simpan & Tambah Lagi</button>
          <button type="button" class="btn btn-default float-end m-1" onclick="hideImportForm()">Tutup</button>
        </div>
      </form>

      <div class="card">
        <!-- Perencanaan -->
        <div class="card-header" id="main-toolbar">
          <div class="btn-group mt-1" role="group">
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="bx bx-calendar"></i></span>
              <input id="f-date-range" type="text" class="form-control" value="">
            </div>
          </div>

          <button type="button" class="btn btn-primary dropdown-toggle float-end" data-bs-toggle="dropdown" aria-expanded="false">Add data</button>

          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= site_url('tegangan/add_ren') ?>">Manual Input</a></li>
            <li><a class="dropdown-item" href="javascript:void(0)" onclick="showImportForm()">Import File</a></li>
          </ul>
        </div>

        <!-- Responsive Table -->
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover" id="main-datatable">
              <thead>
                <tr>
                  <th>Data</th>
                  <th style="max-width:80px" class="text-center">Status</th>
                  <th style="max-width:100px" class="text-center">Opsi</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
        <!-- /Account -->
      </div>
    </div>
  </div>
</div>

<?php $this->load->view("tegangan/perencanaan_js"); ?>