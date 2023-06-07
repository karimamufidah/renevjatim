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

      <div class="card">
        <!-- Perencanaan -->
        <div class="card-header">
          <div class="btn-group mt-1" role="group">
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="bx bx-calendar"></i></span>
              <input id="f-date-range" type="text" class="form-control" value="">
            </div>
          </div>

          <button type="button" class="btn btn-primary dropdown-toggle float-end" data-bs-toggle="dropdown" aria-expanded="false">Add data</button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= site_url('tegangan/add_ren') ?>">Manual Input</a></li>
            <li><a class="dropdown-item" href="<?= site_url('tegangan/import_ren') ?>">Import File</a></li>
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