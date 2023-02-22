<div class="tab-pane fade show active" id="navs-pills-top-pht" role="tabpanel">
  <div class="row">
    <div class="col-md-4 col-12 mb-4">
      <div class="card h-100 py-2 bg-light border-start border-primary">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-muted text-uppercase mb-1">
                Beban Puncak Bulan Ini
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800" id="this-month-cancelled-order-count">0</div>
              <small class="text-muted"><em>Hari, Tanggal, Pukul</em></small>
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
              <div class="h5 mb-0 font-weight-bold text-gray-800" id="this-month-cancelled-order-count">0</div>
              <small class="text-muted"><em>Hari, Tanggal, Pukul</em></small>
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
              <div class="h5 mb-0 font-weight-bold text-gray-800" id="this-month-cancelled-order-count">0</div>
              <small class="text-muted"><em>Hari, Tanggal, Pukul</em></small>
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
              <select id="penghantar-ruas-daily" class="select2-penghantar form-select" style="width: 100%;">
                <option id="penghantar-ruas-daily-default" selected></option>
              </select>
            </div>

            <?php for ($i = 1; $i <= 5; $i++) { ?>
              <div class="input-group mb-3">
                <input type="text" class="form-control datepicker" id="penghantar-tanggal-daily-<?= $i; ?>">
                <span class="input-group-text">
                  <input class="form-check-input" type="checkbox" value="" id="penghantar-tanggal-daily-<?= $i; ?>-checkbox">
                </span>
              </div>
            <?php } ?>

            <div class="input-group mb-3">
              <select id="penghantar-satuan-daily" class="select2-satuan-penghantar form-select" style="width: 100%;">
                <option id="penghantar-satuan-daily-default" selected></option>
              </select>
            </div>

            <div class="row mt-3">
              <div class="col-6">
                <button class="btn btn-default col-12"><i class="bx bx-download"></i>&nbsp; Download</button>
              </div>
              <div class="col-6">
                <button class="btn btn-primary col-12" onclick="refreshPenghantarDailyChartData()"><i class="bx bx-search"></i>&nbsp; Proses</button>
              </div>
            </div>
          </div>

          <div class="col-8">
            <canvas id="penghantar-daily"></canvas>
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
              <select id="penghantar-ruas-monthly" class="select2-penghantar form-control" style="width: 100%;">
                <option id="penghantar-ruas-monthly-default" selected></option>
              </select>
            </div>

            <?php for ($i = 1; $i <= 5; $i++) { ?>
              <div class="input-group mb-3">
                <input type="text" class="form-control datepicker-month" id="penghantar-tanggal-monthly-<?= $i; ?>">
                <span class="input-group-text">
                  <input class="form-check-input" type="checkbox" value="" id="penghantar-tanggal-monthly-<?= $i; ?>-checkbox">
                </span>
              </div>
            <?php } ?>

            <div class="input-group mb-3">
              <select id="penghantar-satuan-monthly" class="select2-satuan-penghantar form-select" style="width: 100%;">
                <option id="penghantar-satuan-monthly-default" selected></option>
              </select>
            </div>

            <div class="row mt-3">
              <div class="col-6">
                <button class="btn btn-default col-12"><i class="bx bx-download"></i>&nbsp; Download</button>
              </div>
              <div class="col-6">
                <button class="btn btn-primary col-12" onclick="refreshPenghantarMonthlyChartData()"><i class="bx bx-search"></i>&nbsp; Proses</button>
              </div>
            </div>
          </div>

          <div class="col-8">
            <canvas id="penghantar-monthly"></canvas>
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
              <select id="penghantar-ruas-yearly" class="select2-penghantar form-control" style="width: 100%;">
                <option id="penghantar-ruas-yearly-default" selected></option>
              </select>
            </div>

            <?php for ($i = 1; $i <= 5; $i++) { ?>
              <div class="input-group mb-3">
                <input type="text" class="form-control datepicker-year" id="penghantar-tanggal-yearly-<?= $i; ?>">
                <span class="input-group-text">
                  <input class="form-check-input" type="checkbox" value="" id="penghantar-tanggal-yearly-<?= $i; ?>-checkbox">
                </span>
              </div>
            <?php } ?>

            <div class="input-group mb-3">
              <select id="penghantar-satuan-yearly" class="select2-satuan-penghantar form-select" style="width: 100%;">
                <option id="penghantar-satuan-yearly-default" selected></option>
              </select>
            </div>

            <div class="row mt-3">
              <div class="col-6">
                <button class="btn btn-default col-12"><i class="bx bx-download"></i>&nbsp; Download</button>
              </div>
              <div class="col-6">
                <button class="btn btn-primary col-12" onclick="refreshPenghantarYearlyChartData()"><i class="bx bx-search"></i>&nbsp; Proses</button>
              </div>
            </div>
          </div>

          <div class="col-8">
            <canvas id="penghantar-yearly"></canvas>
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
              <select id="penghantar-ruas-table" class="select2-penghantar form-control" style="width: 100%;">
                <option id="penghantar-ruas-table-default" selected></option>
              </select>
            </div>

            <div class="row mb-3">
              <div class="col-12">
                <input id="f-penghantar-date-range" type="text" class="form-control">
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-12">
                <strong class="form-label col-12"><span id="penghantar-percentage-table-label-1">0%</span><span id="penghantar-percentage-table-label-2" class="float-end">100%</span></strong>
                <br>
                <br>
                <label for="penghantar-percentage-table-1" class="form-label col-12">Min</label>
                <input type="range" class="form-range" min="0" max="100" step="1" id="penghantar-percentage-table-1" onchange="updateRangePenghantarTableLabel()">

                <label for="penghantar-percentage-table-2" class="form-label col-12">Max</label>
                <input type="range" class="form-range" min="0" max="100" step="1" id="penghantar-percentage-table-2" onchange="updateRangePenghantarTableLabel()">
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-12">
                <button class="btn btn-primary col-12" onclick="penghantarDatatable.ajax.reload()">Proses</button>
              </div>
            </div>
          </div>

          <div class="col-8">
            <div class="table-responsive">
              <table id="penghantar-datatable" class="table table-borderless table-striped" style="width:100%">
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

<?php $this->load->view("dashboard/penghantar/index_js"); ?>