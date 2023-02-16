<main>
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Pills -->
        <div class="row">
            <div class="col-xl-12">
                <div class="nav-align-top mb-4">
                    <ul class="nav nav-pills mb-3" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-pht" aria-controls="navs-pills-top-pht" aria-selected="true">Penghantar</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-ibt" aria-controls="navs-pills-top-ibt" aria-selected="false">Interbus Transformer</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-trafo" aria-controls="navs-pills-top-trafo" aria-selected="false">Trafo TD dan KTT</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-sistem" aria-controls="navs-pills-top-sistem" aria-selected="false">Sistem</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-subsistem" aria-controls="navs-pills-top-subsistem" aria-selected="false">Subsistem</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-kit" aria-controls="navs-pills-top-kit" aria-selected="false">Pembangkit</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-teg" aria-controls="navs-pills-top-teg" aria-selected="false">Tegangan</button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="navs-pills-top-pht" role="tabpanel">
                            <div class="card shadow-none bg-transparent border border-secondary mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Grafik Harian</h5>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <select name="" id="ruas-daily" class="form-select mb-3">
                                                    <?php foreach ($beban_penghantar as $datum) { ?>
                                                        <option value="<?= $datum->name ?>"><?= $datum->name ?></option>
                                                    <?php } ?>
                                                </select>

                                                <?php for ($i = 1; $i <= 5; $i++) { ?>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control datepicker" id="tanggal-daily-<?= $i; ?>">
                                                        <span class="input-group-text">
                                                            <input class="form-check-input" type="checkbox" value="" id="tanggal-daily-<?= $i; ?>-checkbox">
                                                        </span>
                                                    </div>
                                                <?php } ?>

                                                <select name="" id="satuan-daily" class="form-select">
                                                    <?php foreach ($satuan as $datum) { ?>
                                                        <option value="<?= $datum->name ?>"><?= $datum->name ?></option>
                                                    <?php } ?>
                                                </select>

                                                <div class="row mt-3">
                                                    <div class="col-12">
                                                        <button class="btn btn-primary col-12" onclick="refreshDailyChartData()">Proses</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-8">
                                                <canvas id="daily"></canvas>
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
                                                <select name="" id="ruas-monthly" class="form-select mb-3">
                                                    <?php foreach ($beban_penghantar as $datum) { ?>
                                                        <option value="<?= $datum->name ?>"><?= $datum->name ?></option>
                                                    <?php } ?>
                                                </select>

                                                <?php for ($i = 1; $i <= 5; $i++) { ?>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control datepicker-month" id="tanggal-monthly-<?= $i; ?>">
                                                        <span class="input-group-text">
                                                            <input class="form-check-input" type="checkbox" value="" id="tanggal-monthly-<?= $i; ?>-checkbox">
                                                        </span>
                                                    </div>
                                                <?php } ?>

                                                <select name="" id="satuan-monthly" class="form-select">
                                                    <?php foreach ($satuan as $datum) { ?>
                                                        <option value="<?= $datum->name ?>"><?= $datum->name ?></option>
                                                    <?php } ?>
                                                </select>

                                                <div class="row mt-3">
                                                    <div class="col-12">
                                                        <button class="btn btn-primary col-12" onclick="refreshMonthlyChartData()">Proses</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-8">
                                                <canvas id="monthly"></canvas>
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
                                                <select name="" id="ruas-yearly" class="form-select mb-3">
                                                    <?php foreach ($beban_penghantar as $datum) { ?>
                                                        <option value="<?= $datum->name ?>"><?= $datum->name ?></option>
                                                    <?php } ?>
                                                </select>

                                                <?php for ($i = 1; $i <= 5; $i++) { ?>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control datepicker-year" id="tanggal-yearly-<?= $i; ?>">
                                                        <span class="input-group-text">
                                                            <input class="form-check-input" type="checkbox" value="" id="tanggal-yearly-<?= $i; ?>-checkbox">
                                                        </span>
                                                    </div>
                                                <?php } ?>

                                                <select name="" id="satuan-yearly" class="form-select">
                                                    <?php foreach ($satuan as $datum) { ?>
                                                        <option value="<?= $datum->name ?>"><?= $datum->name ?></option>
                                                    <?php } ?>
                                                </select>

                                                <div class="row mt-3">
                                                    <div class="col-12">
                                                        <button class="btn btn-primary col-12" onclick="refreshYearlyChartData()">Proses</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <canvas id="yearly"></canvas>
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
                                                <select name="" id="ruas-table" class="form-select mb-3">
                                                    <?php foreach ($beban_penghantar as $datum) { ?>
                                                        <option value="<?= $datum->name ?>"><?= $datum->name ?></option>
                                                    <?php } ?>
                                                </select>

                                                <div class="row mb-3">
                                                    <div class="col-12">
                                                        <input id="f-date-range" type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-12">
                                                        <strong class="form-label col-12"><span id="percentage-table-label-1">0%</span><span id="percentage-table-label-2" class="float-end">100%</span></strong>
                                                        <br>
                                                        <br>
                                                        <label for="percentage-table-1" class="form-label col-12">Min</label>
                                                        <input type="range" class="form-range" min="0" max="100" step="1" id="percentage-table-1" onchange="updateRangeTableLabel()">

                                                        <label for="percentage-table-2" class="form-label col-12">Max</label>
                                                        <input type="range" class="form-range" min="0" max="100" step="1" id="percentage-table-2" onchange="updateRangeTableLabel()">
                                                    </div>

                                                    <script>
                                                        const updateRangeTableLabel = () => updateRangeLabel("percentage-table");

                                                        function updateRangeLabel(mainElementID) {
                                                            let range1Value = parseInt(getValue(`${mainElementID}-1`));
                                                            let range2Value = parseInt(getValue(`${mainElementID}-2`));

                                                            if (range1Value < range2Value) {
                                                                fillInner(`${mainElementID}-label-1`, `${range1Value}%`);
                                                                fillInner(`${mainElementID}-label-2`, `${range2Value}%`);
                                                            } else {
                                                                fillInner(`${mainElementID}-label-1`, `${range2Value}%`);
                                                                fillInner(`${mainElementID}-label-2`, `${range1Value}%`);
                                                            }
                                                        }
                                                    </script>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-12">
                                                        <button class="btn btn-primary col-12" onclick="mainDatatable.ajax.reload()">Proses</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-8">
                                                <div class="table-responsive">
                                                    <table id="main-datatable" class="table table-borderless table-striped" style="width:100%">
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
                        <div class="tab-pane fade" id="navs-pills-top-ibt" role="tabpanel">
                            <p>
                                Donut dragée jelly pie halvah. Danish gingerbread bonbon cookie wafer candy oat cake ice cream. Gummies
                                halvah
                                tootsie roll muffin biscuit icing dessert gingerbread. Pastry ice cream cheesecake fruitcake.
                            </p>
                            <p class="mb-0">
                                Jelly-o jelly beans icing pastry cake cake lemon drops. Muffin muffin pie tiramisu halvah cotton candy
                                liquorice caramels.
                            </p>
                        </div>
                        <div class="tab-pane fade" id="navs-pills-top-trafo" role="tabpanel">
                            <p>
                                Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon gummies cupcake gummi
                                bears
                                cake chocolate.
                            </p>
                            <p class="mb-0">
                                Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie cake. Sweet roll icing
                                sesame snaps caramels danish toffee. Brownie biscuit dessert dessert. Pudding jelly jelly-o tart brownie
                                jelly.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pills -->
    </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.id.min.js" integrity="sha512-zHDWtKP91CHnvBDpPpfLo9UsuMa02/WgXDYcnFp5DFs8lQvhCe2tx56h2l7SqKs/+yQCx4W++hZ/ABg8t3KH/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

<script>
    const urlAPIDailyChart = "<?php echo base_url('api/daily'); ?>";
    const urlAPIMonthlyChart = "<?php echo base_url('api/monthly'); ?>";
    const urlAPIYearlyChart = "<?php echo base_url('api/yearly'); ?>";
    const urlAPIMainDatatable = "<?php echo base_url('api/datatable'); ?>";
    let dailyChart = document.getElementById('daily');
    let monthlyChart = document.getElementById('monthly');
    let yearlyChart = document.getElementById('yearly');
    let mainDatatable = document.getElementById("main-datatable");
    let startDate = "";
    let endDate = "";


    /** Initialize Data */
    window.onload = () => {
        initializeDatePicker();
        initializeDateRangePicker();
        initializeDailyChart();
        initializeMonthlyChart();
        initializeYearlyChart();
        updateRangeTableLabel();
        initializeDatatable();
    };

    function initializeDatePicker() {
        $('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd"
        });

        $('.datepicker-month').datepicker({
            autoclose: true,
            format: "mm-yyyy",
            startView: "months",
            minViewMode: "months"
        });

        $('.datepicker-year').datepicker({
            autoclose: true,
            format: "yyyy",
            startView: "years",
            minViewMode: "years"
        });
    }

    async function initializeDateRangePicker() {
        startDate = moment().subtract(7, 'days');
        endDate = moment();

        $('#f-date-range').daterangepicker({
            startDate: startDate,
            endDate: endDate
        }, function(start, end, label) {
            startDate = start;
            endDate = end;
        });
    }

    function initializeDailyChart() {
        dailyChart = new Chart(dailyChart, {
            type: 'line',
            data: {
                labels: generateDailyLabels()
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    },
                    x: {
                        ticks: {
                            autoSkip: false,
                            callback: function(val, index) {
                                if (!index) return '';

                                return index % 2 !== 0 ? this.getLabelForValue(val) : '';
                            },
                        }
                    }
                }
            }
        });
    }

    function generateDailyLabels() {
        let labels = [];

        for (let i = 0; i <= 24; i++) {
            const hourString = i < 10 ? `0${i}` : i;


            if (i !== 0) labels.push(`${hourString}.00`);
            if (i !== 24) labels.push(`${hourString}.30`);
        }

        return labels;
    }

    function initializeMonthlyChart() {
        monthlyChart = new Chart(monthlyChart, {
            type: 'line',
            data: {
                labels: generateMonthlyLabels()
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    function generateMonthlyLabels() {
        let labels = [];

        for (let i = 1; i <= 31; i++) labels.push(i);

        return labels;
    }

    function initializeYearlyChart() {
        yearlyChart = new Chart(yearlyChart, {
            type: 'line',
            data: {
                labels: generateYearlyLabels()
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    function generateYearlyLabels() {
        let labels = [];

        for (let i = 1; i <= 12; i++) {
            const dateString = i < 10 ? `2022-0${i}-01` : `2022-${i}-01`;
            const dateObject = new Date(dateString);
            labels.push(dateObject.toLocaleString('id', {
                month: 'long'
            }));
        }

        return labels;
    }

    function initializeDatatable() {
        mainDatatable = $('#main-datatable').DataTable({
            "responsive": true,
            "ordering": false,
            "searching": false,
            "pagingType": "full_numbers",
            "columnDefs": [{
                    "defaultContent": "-",
                    "targets": "_all"
                },
                {
                    "targets": [1, 2],
                    createdCell: function(td, cellData, rowData, row, col) {
                        $(td).css("text-align", "center");
                    },
                },
                {
                    "targets": [3, 4, 5],
                    createdCell: function(td, cellData, rowData, row, col) {
                        $(td).css("text-align", "right");
                    },
                },
                {
                    "targets": [0],
                    "render": function(data, type, row, meta) {
                        return `${row.no}`;
                    }
                },
                {
                    "targets": [1],
                    "render": function(data, type, row, meta) {
                        return `${row.tanggal}`;
                    }
                },
                {
                    "targets": [2],
                    "render": function(data, type, row, meta) {
                        return `${row.jam}`;
                    }
                },
                {
                    "targets": [3],
                    "render": function(data, type, row, meta) {
                        return `${row.percentage}`;
                    }
                },
                {
                    "targets": [4],
                    "render": function(data, type, row, meta) {
                        return `${row.mw}`;
                    }
                },
                {
                    "targets": [5],
                    "render": function(data, type, row, meta) {
                        return `${row.mx}`;
                    }
                }
            ],
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": urlAPIMainDatatable,
                "data": function(d) {
                    d.ruas = getValue("ruas-table");
                    d.tanggalAwal = startDate.format("YYYY-MM-DD");
                    d.tanggalAkhir = endDate.format("YYYY-MM-DD");
                    d.persentaseAwal = getInner("percentage-table-label-1").replace("%", "");
                    d.persentaseAkhir = getInner("percentage-table-label-2").replace("%", "");
                },
            }
        });
    }

    /** Read */
    async function refreshDailyChartData() {
        let params = {
            ruas: getValue('ruas-daily'),
            satuan: getValue('satuan-daily')
        };
        let datasets = [];

        for (let i = 1; i <= 5; i++) {
            if (isChecked(`tanggal-daily-${i}-checkbox`)) {
                const daily1Data = await getAndGenerateDailyChartData(params, `tanggal-daily-${i}`);
                datasets = [...datasets, ...daily1Data];
            }
        }

        dailyChart.data.datasets = datasets;
        dailyChart.update();
    }

    async function getAndGenerateDailyChartData(params, dateElementID) {
        return new Promise(async (resolve, reject) => {
            params.tanggal = getValue(dateElementID);
            let firstDateData = await getDailyChartData(params);

            resolve([{
                label: `Perencanaan ${params.tanggal}`,
                data: firstDateData.plan,
                borderWidth: 1
            }, {
                label: `Realisasi ${params.tanggal}`,
                data: firstDateData.realization,
                borderWidth: 1,
                borderDash: [5]
            }]);
        });
    }

    async function getDailyChartData({
        ruas,
        satuan,
        tanggal
    }) {
        let response = await fetch(`${urlAPIDailyChart}?ruas=${ruas}&satuan=${satuan}&tanggal=${tanggal}`, {
            headers: {
                "Content-Type": "application/json"
            }
        });
        let data = await response.json();

        if (!data.success) throw Error("Gagal mengambil data");

        return data.data;
    }

    async function refreshMonthlyChartData() {
        let params = {
            ruas: getValue('ruas-monthly'),
            satuan: getValue('satuan-monthly')
        };
        let datasets = [];

        for (let i = 1; i <= 5; i++) {
            if (isChecked(`tanggal-monthly-${i}-checkbox`)) {
                const data = await getAndGenerateMonthlyChartData(params, `tanggal-monthly-${i}`);
                datasets = [...datasets, ...data];
            }
        }

        monthlyChart.data.datasets = datasets;
        monthlyChart.update();
    }

    async function getAndGenerateMonthlyChartData(params, dateElementID) {
        return new Promise(async (resolve, reject) => {
            [params.bulan, params.tahun] = getValue(dateElementID).split("-");
            let data = await getMonthlyChartData(params);

            resolve([{
                label: `Perencanaan ${getValue(dateElementID)}`,
                data: data.plan,
                borderWidth: 1
            }, {
                label: `Realisasi ${getValue(dateElementID)}`,
                data: data.realization,
                borderWidth: 1,
                borderDash: [5]
            }]);
        });
    }

    async function getMonthlyChartData({
        ruas,
        satuan,
        bulan,
        tahun
    }) {
        let response = await fetch(`${urlAPIMonthlyChart}?ruas=${ruas}&satuan=${satuan}&bulan=${bulan}&tahun=${tahun}`, {
            headers: {
                "Content-Type": "application/json"
            }
        });
        let data = await response.json();

        if (!data.success) throw Error("Gagal mengambil data");

        return data.data;
    }

    async function refreshYearlyChartData() {
        let params = {
            ruas: getValue('ruas-yearly'),
            satuan: getValue('satuan-yearly')
        };
        let datasets = [];

        for (let i = 1; i <= 5; i++) {
            if (isChecked(`tanggal-yearly-${i}-checkbox`)) {
                const data = await getAndGenerateYearlyChartData(params, `tanggal-yearly-${i}`);
                datasets = [...datasets, ...data];
            }
        }

        yearlyChart.data.datasets = datasets;
        yearlyChart.update();
    }

    async function getAndGenerateYearlyChartData(params, dateElementID) {
        return new Promise(async (resolve, reject) => {
            params.tahun = getValue(dateElementID);
            let data = await getYearlyChartData(params);

            resolve([{
                label: `Perencanaan ${getValue(dateElementID)}`,
                data: data.plan,
                borderWidth: 1
            }, {
                label: `Realisasi ${getValue(dateElementID)}`,
                data: data.realization,
                borderWidth: 1,
                borderDash: [5]
            }]);
        });
    }

    async function getYearlyChartData({
        ruas,
        satuan,
        tahun
    }) {
        let response = await fetch(`${urlAPIYearlyChart}?ruas=${ruas}&satuan=${satuan}&tahun=${tahun}`, {
            headers: {
                "Content-Type": "application/json"
            }
        });
        let data = await response.json();

        if (!data.success) throw Error("Gagal mengambil data");

        return data.data;
    }

    /** General */
    const getValue = elementID => document.getElementById(elementID).value;
    const getInner = elementID => document.getElementById(elementID).innerHTML;
    const isChecked = elementID => document.getElementById(elementID).checked;
    const fillInner = (elementID, text) => document.getElementById(elementID).innerHTML = text;
</script>