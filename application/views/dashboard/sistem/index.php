<div class="tab-pane fade" id="navs-pills-top-sistem" role="tabpanel">
  <div class="row">
    <div class="col-md-4 col-12 mb-4">
      <div class="card h-100 py-2 bg-light border-start border-primary">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-muted text-uppercase mb-1">
                Beban Puncak Bulan Ini
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800" id="sistem-highest-this-month">0</div>
              <small class="text-muted"><em id="sistem-highest-this-month-datetime">Sedang memuat...</em></small>
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
              <div class="h5 mb-0 font-weight-bold text-gray-800" id="sistem-highest-this-year">0</div>
              <small class="text-muted"><em id="sistem-highest-this-year-datetime">Sedang memuat...</em></small>
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
              <div class="h5 mb-0 font-weight-bold text-gray-800" id="sistem-highest-all-time">0</div>
              <small class="text-muted"><em id="sistem-highest-all-time-datetime">Sedang memuat...</em></small>
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
              <select id="sistem-daily" class="select2-sistem form-select" style="width: 100%;">
                <option id="sistem-daily-default" selected></option>
              </select>
            </div>

            <?php for ($i = 1; $i <= 5; $i++) { ?>
              <div class="input-group mb-3">
                <input type="text" class="form-control datepicker" id="sistem-tanggal-daily-<?= $i; ?>">
                <span class="input-group-text">
                  <input class="form-check-input" type="checkbox" value="" id="sistem-tanggal-daily-<?= $i; ?>-checkbox">
                </span>
              </div>
            <?php } ?>

            <div class="row mt-3">
              <div class="col-6">
                <button class="btn btn-default col-12" onclick="downloadSistemDailyXLSX()"><i class="bx bx-download"></i>&nbsp; Download</button>
              </div>
              <div class="col-6">
                <button class="btn btn-primary col-12" onclick="refreshSistemDailyChartData()"><i class="bx bx-search"></i>&nbsp; Proses</button>
              </div>
            </div>
          </div>

          <div class="col-8">
            <canvas id="sistem-daily-chart"></canvas>
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
              <select id="sistem-monthly" class="select2-sistem form-control" style="width: 100%;">
                <option id="sistem-monthly-default" selected></option>
              </select>
            </div>

            <?php for ($i = 1; $i <= 5; $i++) { ?>
              <div class="input-group mb-3">
                <input type="text" class="form-control datepicker-month" id="sistem-tanggal-monthly-<?= $i; ?>">
                <span class="input-group-text">
                  <input class="form-check-input" type="checkbox" value="" id="sistem-tanggal-monthly-<?= $i; ?>-checkbox">
                </span>
              </div>
            <?php } ?>

            <div class="row mt-3">
              <div class="col-6">
                <button class="btn btn-default col-12" onclick="downloadSistemMonthlyXLSX()"><i class="bx bx-download"></i>&nbsp; Download</button>
              </div>
              <div class="col-6">
                <button class="btn btn-primary col-12" onclick="refreshSistemMonthlyChartData()"><i class="bx bx-search"></i>&nbsp; Proses</button>
              </div>
            </div>
          </div>

          <div class="col-8">
            <canvas id="sistem-monthly-chart"></canvas>
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
              <select id="sistem-yearly" class="select2-sistem form-control" style="width: 100%;">
                <option id="sistem-yearly-default" selected></option>
              </select>
            </div>

            <?php for ($i = 1; $i <= 5; $i++) { ?>
              <div class="input-group mb-3">
                <input type="text" class="form-control datepicker-year" id="sistem-tanggal-yearly-<?= $i; ?>">
                <span class="input-group-text">
                  <input class="form-check-input" type="checkbox" value="" id="sistem-tanggal-yearly-<?= $i; ?>-checkbox">
                </span>
              </div>
            <?php } ?>

            <div class="row mt-3">
              <div class="col-6">
                <button class="btn btn-default col-12"><i class="bx bx-download"></i>&nbsp; Download</button>
              </div>
              <div class="col-6">
                <button class="btn btn-primary col-12" onclick="refreshSistemYearlyChartData()"><i class="bx bx-search"></i>&nbsp; Proses</button>
              </div>
            </div>
          </div>

          <div class="col-8">
            <canvas id="sistem-yearly-chart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view("dashboard/sistem/index_js"); ?>