<div class="tab-pane fade" id="navs-pills-top-kit" role="tabpanel">
  <div class="row">
    <div class="col-md-4 col-12 mb-4">
      <div class="card h-100 py-2 bg-light border-start border-primary">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-muted text-uppercase mb-1">
                Beban Puncak Bulan Ini
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800" id="pembangkit-highest-this-month">0</div>
              <small class="text-muted"><em id="pembangkit-highest-this-month-datetime">Sedang memuat...</em></small>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-12 mb-4">
      <div class="card h-100 py-2 bg-light border-start border-primary">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-muted text-uppercase mb-1">
                Beban Puncak Tahun Ini
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800" id="pembangkit-highest-this-year">0</div>
              <small class="text-muted"><em id="pembangkit-highest-this-year-datetime">Sedang memuat...</em></small>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-12 mb-4">
      <div class="card h-100 py-2 bg-light border-start border-primary">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-muted text-uppercase mb-1">
                Beban Puncak Tertinggi
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800" id="pembangkit-highest-all-time">0</div>
              <small class="text-muted"><em id="pembangkit-highest-all-time-datetime">Sedang memuat...</em></small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card shadow-none bg-transparent border border-secondary mb-3">
    <div class="card-body">
      <h5 class="card-title">Grafik Harian</h5>
      <div class="card-body">
        <div class="row">
          <div class="col-4">
            <div class="input-group mb-3">
              <select id="pembangkit-daily" class="select2-pembangkit form-select" style="width: 100%;">
                <option id="pembangkit-daily-default" selected></option>
              </select>
            </div>

            <?php for ($i = 1; $i <= 5; $i++) { ?>
              <div class="input-group mb-3">
                <input type="text" class="form-control datepicker" id="pembangkit-tanggal-daily-<?= $i; ?>">
                <span class="input-group-text">
                  <input class="form-check-input" type="checkbox" value="" id="pembangkit-tanggal-daily-<?= $i; ?>-checkbox">
                </span>
              </div>
            <?php } ?>

            <div class="input-group mb-3">
              <select id="pembangkit-satuan-daily" class="select2-satuan-pembangkit form-select" style="width: 100%;">
                <option id="pembangkit-satuan-daily-default" selected></option>
              </select>
            </div>

            <div class="row mt-3">
              <div class="col-6">
                <button class="btn btn-default col-12" onclick="downloadPembangkitDailyXLSX()"><i class="bx bx-download"></i>&nbsp; Download</button>
              </div>
              <div class="col-6">
                <button class="btn btn-primary col-12" onclick="refreshPembangkitDailyChartData()"><i class="bx bx-search"></i>&nbsp; Proses</button>
              </div>
            </div>
          </div>

          <div class="col-8">
            <canvas id="pembangkit-daily-chart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card shadow-none bg-transparent border border-secondary mb-3">
    <div class="card-body">
      <h5 class="card-title">Grafik Bulanan</h5>
      <div class="card-body">
        <div class="row">
          <div class="col-4">
            <div class="input-group mb-3">
              <select id="pembangkit-monthly" class="select2-pembangkit form-control" style="width: 100%;">
                <option id="pembangkit-monthly-default" selected></option>
              </select>
            </div>

            <?php for ($i = 1; $i <= 5; $i++) { ?>
              <div class="input-group mb-3">
                <input type="text" class="form-control datepicker-month" id="pembangkit-tanggal-monthly-<?= $i; ?>">
                <span class="input-group-text">
                  <input class="form-check-input" type="checkbox" value="" id="pembangkit-tanggal-monthly-<?= $i; ?>-checkbox">
                </span>
              </div>
            <?php } ?>

            <div class="input-group mb-3">
              <select id="pembangkit-satuan-monthly" class="select2-satuan-pembangkit form-select" style="width: 100%;">
                <option id="pembangkit-satuan-monthly-default" selected></option>
              </select>
            </div>

            <div class="row mt-3">
              <div class="col-6">
                <button class="btn btn-default col-12"><i class="bx bx-download"></i>&nbsp; Download</button>
              </div>
              <div class="col-6">
                <button class="btn btn-primary col-12" onclick="refreshPembangkitMonthlyChartData()"><i class="bx bx-search"></i>&nbsp; Proses</button>
              </div>
            </div>
          </div>

          <div class="col-8">
            <canvas id="pembangkit-monthly-chart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card shadow-none bg-transparent border border-secondary mb-3">
    <div class="card-body">
      <h5 class="card-title">Grafik Tahunan</h5>
      <div class="card-body">
        <div class="row">
          <div class="col-4">
            <div class="input-group mb-3">
              <select id="pembangkit-yearly" class="select2-pembangkit form-control" style="width: 100%;">
                <option id="pembangkit-yearly-default" selected></option>
              </select>
            </div>

            <?php for ($i = 1; $i <= 5; $i++) { ?>
              <div class="input-group mb-3">
                <input type="text" class="form-control datepicker-year" id="pembangkit-tanggal-yearly-<?= $i; ?>">
                <span class="input-group-text">
                  <input class="form-check-input" type="checkbox" value="" id="pembangkit-tanggal-yearly-<?= $i; ?>-checkbox">
                </span>
              </div>
            <?php } ?>

            <div class="input-group mb-3">
              <select id="pembangkit-satuan-yearly" class="select2-satuan-pembangkit form-select" style="width: 100%;">
                <option id="pembangkit-satuan-yearly-default" selected></option>
              </select>
            </div>

            <div class="row mt-3">
              <div class="col-6">
                <button class="btn btn-default col-12"><i class="bx bx-download"></i>&nbsp; Download</button>
              </div>
              <div class="col-6">
                <button class="btn btn-primary col-12" onclick="refreshPembangkitYearlyChartData()"><i class="bx bx-search"></i>&nbsp; Proses</button>
              </div>
            </div>
          </div>

          <div class="col-8">
            <canvas id="pembangkit-yearly-chart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card shadow-none bg-transparent border border-secondary mb-3">
    <div class="card-body">
      <h5 class="card-title">Pemantauan</h5>
      <div class="card-body">
        <div class="row">
          <div class="col-4">
            <div class="input-group mb-3">
              <select id="pembangkit-table" class="select2-pembangkit form-control" style="width: 100%;">
                <option id="pembangkit-table-default" selected></option>
              </select>
            </div>

            <div class="row mb-3">
              <div class="col-12">
                <input id="f-pembangkit-date-range" type="text" class="form-control">
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-12">
                <strong class="form-label col-12"><span id="pembangkit-percentage-table-label-1">0%</span><span id="pembangkit-percentage-table-label-2" class="float-end">100%</span></strong>
                <br>
                <br>
                <label for="pembangkit-percentage-table-1" class="form-label col-12">Min</label>
                <input type="range" class="form-range" min="0" max="100" step="1" id="pembangkit-percentage-table-1" onchange="updateRangePembangkitTableLabel()">

                <label for="pembangkit-percentage-table-2" class="form-label col-12">Max</label>
                <input type="range" class="form-range" min="0" max="100" step="1" id="pembangkit-percentage-table-2" onchange="updateRangePembangkitTableLabel()">
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-12">
                <button class="btn btn-primary col-12" onclick="pembangkitDatatable.ajax.reload()">Proses</button>
              </div>
            </div>
          </div>

          <div class="col-8">
            <div class="table-responsive">
              <table id="pembangkit-datatable" class="table table-borderless table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th style="text-align:center; width:15px">No</th>
                    <th style="text-align:center">Tanggal</th>
                    <th style="text-align:center">Pukul</th>
                    <th style="text-align:right">%</th>
                    <th style="text-align:right">MW</th>
                    <th style="text-align:right">MVAR</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view("dashboard/pembangkit/index_js"); ?>