<div class="tab-pane fade" id="navs-pills-top-ibt" role="tabpanel">
  <div class="row">
    <div class="col-md-4 col-12 mb-4">
      <div class="card h-100 py-2 bg-light border-start border-primary">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-muted text-uppercase mb-1">
                Beban Puncak Bulan Ini
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800" id="ibt-highest-this-month">0</div>
              <small class="text-muted"><em id="ibt-highest-this-month-datetime">Sedang memuat...</em></small>
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
              <div class="h5 mb-0 font-weight-bold text-gray-800" id="ibt-highest-this-year">0</div>
              <small class="text-muted"><em id="ibt-highest-this-year-datetime">Sedang memuat...</em></small>
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
              <div class="h5 mb-0 font-weight-bold text-gray-800" id="ibt-highest-all-time">0</div>
              <small class="text-muted"><em id="ibt-highest-all-time-datetime">Sedang memuat...</em></small>
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
              <select id="ibt-daily" class="select2-ibt form-select" style="width: 100%;">
                <option id="ibt-daily-default" selected></option>
              </select>
            </div>

            <?php for ($i = 1; $i <= 5; $i++) { ?>
              <div class="input-group mb-3">
                <input type="text" class="form-control datepicker" id="ibt-tanggal-daily-<?= $i; ?>">
                <span class="input-group-text">
                  <input class="form-check-input" type="checkbox" value="" id="ibt-tanggal-daily-<?= $i; ?>-checkbox">
                </span>
              </div>
            <?php } ?>

            <div class="input-group mb-3">
              <select id="ibt-satuan-daily" class="select2-satuan-ibt form-select" style="width: 100%;">
                <option id="ibt-satuan-daily-default" selected></option>
              </select>
            </div>

            <div class="row mt-3">
              <div class="col-6">
                <button class="btn btn-default col-12" onclick="downloadIBTDailyXLSX()"><i class="bx bx-download"></i>&nbsp; Download</button>
              </div>
              <div class="col-6">
                <button class="btn btn-primary col-12" onclick="refreshIBTDailyChartData()"><i class="bx bx-search"></i>&nbsp; Proses</button>
              </div>
            </div>
          </div>

          <div class="col-8">
            <canvas id="ibt-daily-chart"></canvas>
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
              <select id="ibt-monthly" class="select2-ibt form-control" style="width: 100%;">
                <option id="ibt-monthly-default" selected></option>
              </select>
            </div>

            <?php for ($i = 1; $i <= 5; $i++) { ?>
              <div class="input-group mb-3">
                <input type="text" class="form-control datepicker-month" id="ibt-tanggal-monthly-<?= $i; ?>">
                <span class="input-group-text">
                  <input class="form-check-input" type="checkbox" value="" id="ibt-tanggal-monthly-<?= $i; ?>-checkbox">
                </span>
              </div>
            <?php } ?>

            <div class="input-group mb-3">
              <select id="ibt-satuan-monthly" class="select2-satuan-ibt form-select" style="width: 100%;">
                <option id="ibt-satuan-monthly-default" selected></option>
              </select>
            </div>

            <div class="row mt-3">
              <div class="col-6">
                <button class="btn btn-default col-12" onclick="downloadIBTMonthlyXLSX()"><i class="bx bx-download"></i>&nbsp; Download</button>
              </div>
              <div class="col-6">
                <button class="btn btn-primary col-12" onclick="refreshIBTMonthlyChartData()"><i class="bx bx-search"></i>&nbsp; Proses</button>
              </div>
            </div>
          </div>

          <div class="col-8">
            <canvas id="ibt-monthly-chart"></canvas>
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
              <select id="ibt-yearly" class="select2-ibt form-control" style="width: 100%;">
                <option id="ibt-yearly-default" selected></option>
              </select>
            </div>

            <?php for ($i = 1; $i <= 5; $i++) { ?>
              <div class="input-group mb-3">
                <input type="text" class="form-control datepicker-year" id="ibt-tanggal-yearly-<?= $i; ?>">
                <span class="input-group-text">
                  <input class="form-check-input" type="checkbox" value="" id="ibt-tanggal-yearly-<?= $i; ?>-checkbox">
                </span>
              </div>
            <?php } ?>

            <div class="input-group mb-3">
              <select id="ibt-satuan-yearly" class="select2-satuan-ibt form-select" style="width: 100%;">
                <option id="ibt-satuan-yearly-default" selected></option>
              </select>
            </div>

            <div class="row mt-3">
              <div class="col-6">
                <button class="btn btn-default col-12"><i class="bx bx-download"></i>&nbsp; Download</button>
              </div>
              <div class="col-6">
                <button class="btn btn-primary col-12" onclick="refreshIBTYearlyChartData()"><i class="bx bx-search"></i>&nbsp; Proses</button>
              </div>
            </div>
          </div>

          <div class="col-8">
            <canvas id="ibt-yearly-chart"></canvas>
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
              <select id="ibt-table" class="select2-ibt form-control" style="width: 100%;">
                <option id="ibt-table-default" selected></option>
              </select>
            </div>

            <div class="row mb-3">
              <div class="col-12">
                <input id="f-ibt-date-range" type="text" class="form-control">
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-12">
                <strong class="form-label col-12"><span id="ibt-percentage-table-label-1">0%</span><span id="ibt-percentage-table-label-2" class="float-end">100%</span></strong>
                <br>
                <br>
                <label for="ibt-percentage-table-1" class="form-label col-12">Min</label>
                <input type="range" class="form-range" min="0" max="100" step="1" id="ibt-percentage-table-1" onchange="updateRangeIBTTableLabel()">

                <label for="ibt-percentage-table-2" class="form-label col-12">Max</label>
                <input type="range" class="form-range" min="0" max="100" step="1" id="ibt-percentage-table-2" onchange="updateRangeIBTTableLabel()">
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-12">
                <button class="btn btn-primary col-12" onclick="ibtDatatable.ajax.reload()">Proses</button>
              </div>
            </div>
          </div>

          <div class="col-8">
            <div class="table-responsive">
              <table id="ibt-datatable" class="table table-borderless table-striped" style="width:100%">
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

<?php $this->load->view("dashboard/ibt/index_js"); ?>