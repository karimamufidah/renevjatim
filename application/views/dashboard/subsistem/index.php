<div class="tab-pane fade" id="navs-pills-top-subsistem" role="tabpanel">
  <div class="row">
    <div class="col-md-4 col-12 mb-4">
      <div class="card h-100 py-2 bg-light border-start border-primary">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-muted text-uppercase mb-1">
                Beban Puncak Bulan Ini
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800" id="subsistem-highest-this-month">0</div>
              <small class="text-muted"><em id="subsistem-highest-this-month-datetime">Sedang memuat...</em></small>
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
              <div class="h5 mb-0 font-weight-bold text-gray-800" id="subsistem-highest-this-year">0</div>
              <small class="text-muted"><em id="subsistem-highest-this-year-datetime">Sedang memuat...</em></small>
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
              <div class="h5 mb-0 font-weight-bold text-gray-800" id="subsistem-highest-all-time">0</div>
              <small class="text-muted"><em id="subsistem-highest-all-time-datetime">Sedang memuat...</em></small>
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
              <select id="subsistem-daily" class="select2-subsistem form-select" style="width: 100%;">
                <option id="subsistem-daily-default" selected></option>
              </select>
            </div>

            <?php for ($i = 1; $i <= 5; $i++) { ?>
              <div class="input-group mb-3">
                <input type="text" class="form-control datepicker" id="subsistem-tanggal-daily-<?= $i; ?>">
                <span class="input-group-text">
                  <input class="form-check-input" type="checkbox" value="" id="subsistem-tanggal-daily-<?= $i; ?>-checkbox">
                </span>
              </div>
            <?php } ?>

            <div class="input-group mb-3">
              <select id="subsistem-pasokan-daily" class="select2-pasokan-subsistem  form-select" style="width: 100%;">
                <option id="subsistem-pasokan-daily-default" selected></option>
              </select>
            </div>

            <div class="row mt-3">
              <div class="col-6">
                <button class="btn btn-default col-12"><i class="bx bx-download"></i>&nbsp; Download</button>
              </div>
              <div class="col-6">
                <button class="btn btn-primary col-12" onclick="refreshSubsistemDailyChartData()"><i class="bx bx-search"></i>&nbsp; Proses</button>
              </div>
            </div>
          </div>

          <div class="col-8">
            <canvas id="subsistem-daily-chart"></canvas>
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
              <select id="subsistem-monthly" class="select2-subsistem form-control" style="width: 100%;">
                <option id="subsistem-monthly-default" selected></option>
              </select>
            </div>

            <?php for ($i = 1; $i <= 5; $i++) { ?>
              <div class="input-group mb-3">
                <input type="text" class="form-control datepicker-month" id="subsistem-tanggal-monthly-<?= $i; ?>">
                <span class="input-group-text">
                  <input class="form-check-input" type="checkbox" value="" id="subsistem-tanggal-monthly-<?= $i; ?>-checkbox">
                </span>
              </div>
            <?php } ?>

            <div class="input-group mb-3">
              <select id="subsistem-pasokan-monthly" class="select2-pasokan-subsistem  form-select" style="width: 100%;">
                <option id="subsistem-pasokan-monthly-default" selected></option>
              </select>
            </div>

            <div class="row mt-3">
              <div class="col-6">
                <button class="btn btn-default col-12"><i class="bx bx-download"></i>&nbsp; Download</button>
              </div>
              <div class="col-6">
                <button class="btn btn-primary col-12" onclick="refreshSubsistemMonthlyChartData()"><i class="bx bx-search"></i>&nbsp; Proses</button>
              </div>
            </div>
          </div>

          <div class="col-8">
            <canvas id="subsistem-monthly-chart"></canvas>
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
              <select id="subsistem-yearly" class="select2-subsistem form-control" style="width: 100%;">
                <option id="subsistem-yearly-default" selected></option>
              </select>
            </div>

            <?php for ($i = 1; $i <= 5; $i++) { ?>
              <div class="input-group mb-3">
                <input type="text" class="form-control datepicker-year" id="subsistem-tanggal-yearly-<?= $i; ?>">
                <span class="input-group-text">
                  <input class="form-check-input" type="checkbox" value="" id="subsistem-tanggal-yearly-<?= $i; ?>-checkbox">
                </span>
              </div>
            <?php } ?>

            <div class="input-group mb-3">
              <select id="subsistem-pasokan-yearly" class="select2-pasokan-subsistem  form-select" style="width: 100%;">
                <option id="subsistem-pasokan-yearly-default" selected></option>
              </select>
            </div>

            <div class="row mt-3">
              <div class="col-6">
                <button class="btn btn-default col-12"><i class="bx bx-download"></i>&nbsp; Download</button>
              </div>
              <div class="col-6">
                <button class="btn btn-primary col-12" onclick="refreshSubsistemYearlyChartData()"><i class="bx bx-search"></i>&nbsp; Proses</button>
              </div>
            </div>
          </div>

          <div class="col-8">
            <canvas id="subsistem-yearly-chart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view("dashboard/subsistem/index_js"); ?>