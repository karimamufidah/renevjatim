<script>
  const urlAPITrafoDailyChart = "<?php echo base_url('api/graph/get-beban-trafo-daily'); ?>";
  const urlAPITrafoMonthlyChart = "<?php echo base_url('api/graph/get-beban-trafo-monthly'); ?>";
  const urlAPITrafoYearlyChart = "<?php echo base_url('api/graph/get-beban-trafo-yearly'); ?>";
  const urlAPIBebanTrafoSelect2 = "<?php echo base_url('api/select2/beban-trafo'); ?>";
  const urlAPISatuanTrafoSelect2 = "<?php echo base_url('api/select2/satuan-trafo'); ?>";
  const urlAPITrafoDatatable = "<?php echo base_url('api/datatable'); ?>";
  const urlAPITrafoHighestThisMonth = "<?php echo base_url('api/panel/get-highest-trafo-this-month-panel'); ?>";
  const urlAPITrafoHighestThisYear = "<?php echo base_url('api/panel/get-highest-trafo-this-year-panel'); ?>";
  const urlAPITrafoHighestThisAllTime = "<?php echo base_url('api/panel/get-highest-trafo-all-time-panel'); ?>";
  let trafoDailyChart = document.getElementById('trafo-daily-chart');
  let trafoMonthlyChart = document.getElementById('trafo-monthly-chart');
  let trafoYearlyChart = document.getElementById('trafo-yearly-chart');
  let trafoDatatable = document.getElementById("trafo-datatable");
  let trafoStartDate = "";
  let trafoEndDate = "";

  // /** Initialize Data */
  async function initializeTrafoData() {
    await initializeTrafoSelect2Default();
    getAndFillTrafoHighestThisMonthPanel();
    getAndFillTrafoHighestThisYearPanel();
    getAndFillTrafoHighestAllTimePanel();
    initializeTrafoDateRangePicker();
    initializeTrafoDailyChart();
    initializeTrafoMonthlyChart();
    initializeTrafoYearlyChart();
    updateRangeTrafoTableLabel();
    initializeTrafoDatatable();
    initializeTrafoSelect2();
  };

  async function initializeTrafoSelect2Default() {
    await getDefaultSelect2({
      id: 'trafo-daily-default',
      url: `${urlAPIBebanTrafoSelect2}`
    });

    await getDefaultSelect2({
      id: 'trafo-monthly-default',
      url: `${urlAPIBebanTrafoSelect2}`
    });

    await getDefaultSelect2({
      id: 'trafo-yearly-default',
      url: `${urlAPIBebanTrafoSelect2}`
    });

    await getDefaultSelect2({
      id: 'trafo-table-default',
      url: `${urlAPIBebanTrafoSelect2}`
    });

    await getDefaultSelect2({
      id: 'trafo-satuan-daily-default',
      url: `${urlAPISatuanTrafoSelect2}`
    });

    await getDefaultSelect2({
      id: 'trafo-satuan-monthly-default',
      url: `${urlAPISatuanTrafoSelect2}`
    });

    await getDefaultSelect2({
      id: 'trafo-satuan-yearly-default',
      url: `${urlAPISatuanTrafoSelect2}`
    });
  }

  async function getAndFillTrafoHighestThisMonthPanel() {
    const data = await crud.read({
      url: `${urlAPITrafoHighestThisMonth}`
    });

    fillInner("trafo-highest-this-month", `${data.value} MW`);
    fillInner("trafo-highest-this-month-datetime", getDateFormatOptions(data.logged_at));
  }

  async function getAndFillTrafoHighestThisYearPanel() {
    const data = await crud.read({
      url: `${urlAPITrafoHighestThisYear}`
    });

    fillInner("trafo-highest-this-year", `${data.value} MW`);
    fillInner("trafo-highest-this-year-datetime", getDateFormatOptions(data.logged_at));
  }

  async function getAndFillTrafoHighestAllTimePanel() {
    const data = await crud.read({
      url: `${urlAPITrafoHighestThisAllTime}`
    });

    fillInner("trafo-highest-all-time", `${data.value} MW`);
    fillInner("trafo-highest-all-time-datetime", getDateFormatOptions(data.logged_at));
  }

  async function initializeTrafoDateRangePicker() {
    trafoStartDate = moment().subtract(7, 'days');
    trafoEndDate = moment();

    $('#f-trafo-date-range').daterangepicker({
      startDate: trafoStartDate,
      endDate: trafoEndDate
    }, function(start, end, label) {
      trafoStartDate = start;
      trafoEndDate = end;
    });
  }

  function initializeTrafoDailyChart() {
    trafoDailyChart = new Chart(trafoDailyChart, {
      type: 'line',
      data: {
        labels: generateDailyLabels()
      },
      options: getDailyOptions()
    });
  }

  function initializeTrafoMonthlyChart() {
    trafoMonthlyChart = new Chart(trafoMonthlyChart, {
      type: 'line',
      data: {
        labels: generateMonthlyLabels()
      },
      options: getStandardOptions()
    });
  }

  function initializeTrafoYearlyChart() {
    trafoYearlyChart = new Chart(trafoYearlyChart, {
      type: 'line',
      data: {
        labels: generateYearlyLabels()
      },
      options: getStandardOptions()
    });
  }

  const updateRangeTrafoTableLabel = () => updateRangeLabel("trafo-percentage-table");

  function initializeTrafoDatatable() {
    trafoDatatable = $('#trafo-datatable').DataTable({
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
        "url": urlAPITrafoDatatable,
        "data": function(d) {
          d.trafo = getValue("trafo-table");
          d.tanggalAwal = trafoStartDate.format("YYYY-MM-DD");
          d.tanggalAkhir = trafoEndDate.format("YYYY-MM-DD");
          d.persentaseAwal = getInner("trafo-percentage-table-label-1").replace("%", "");
          d.persentaseAkhir = getInner("trafo-percentage-table-label-2").replace("%", "");
        },
      }
    });
  }

  function initializeTrafoSelect2() {
    $(".select2-trafo").select2({
      ajax: {
        url: urlAPIBebanTrafoSelect2,
        dataType: 'json',
        data: function(params) {
          var query = {
            search: params.term,
            page: params.page || 1
          }

          return query;
        },
        cache: true
      },
      theme: 'bootstrap-5',
      templateResult: formatBebanTrafo,
      templateSelection: formatTemplateSelection,
      escapeMarkup: (m) => m
    });

    $(".select2-satuan-trafo").select2({
      ajax: {
        url: urlAPISatuanTrafoSelect2,
        dataType: 'json',
        data: function(params) {
          var query = {
            search: params.term,
            page: params.page || 1
          }

          return query;
        },
        cache: true
      },
      theme: 'bootstrap-5',
      templateResult: formatSatuanTrafo,
      templateSelection: formatTemplateSelection,
      escapeMarkup: (m) => m
    });
  }

  const formatBebanTrafo = (result) => formatTemplateResult(result, 'beban-trafo');
  const formatSatuanTrafo = (result) => formatTemplateResult(result, 'satuan-trafo');

  // /** Read */
  async function refreshTrafoDailyChartData() {
    let params = {
      trafo: getValue('trafo-daily'),
      satuan: getValue('trafo-satuan-daily')
    };
    let datasets = [];

    for (let i = 1; i <= 5; i++) {
      if (getValue(`trafo-tanggal-daily-${i}`)) {
        const daily1Data = await getAndGenerateTrafoDailyChartData(params, `trafo-tanggal-daily-${i}`);
        if (!isChecked(`trafo-tanggal-daily-${i}-checkbox`)) daily1Data.shift();
        datasets = [...datasets, ...daily1Data];
      }
    }

    trafoDailyChart.data.datasets = datasets;
    trafoDailyChart.update();
  }

  async function getAndGenerateTrafoDailyChartData(params, dateElementID) {
    return new Promise(async (resolve, reject) => {
      params.tanggal = getValue(dateElementID);
      let firstDateData = await getTrafoDailyChartData(params);

      resolve([{
        label: `Perencanaan ${params.tanggal}`,
        data: firstDateData.plan,
        borderWidth: 1,
        borderDash: [5]
      }, {
        label: `Realisasi ${params.tanggal}`,
        data: firstDateData.realization,
        borderWidth: 1
      }]);
    });
  }

  async function getTrafoDailyChartData({
    trafo,
    satuan,
    tanggal,
    url
  }) {
    return await crud.read({
      url: `${urlAPITrafoDailyChart}?trafo=${trafo}&satuan=${satuan}&tanggal=${tanggal}`
    });
  }

  async function refreshTrafoMonthlyChartData() {
    let params = {
      trafo: getValue('trafo-monthly'),
      satuan: getValue('trafo-satuan-monthly')
    };
    let datasets = [];

    for (let i = 1; i <= 5; i++) {
      if (getValue(`trafo-tanggal-monthly-${i}`)) {
        const data = await getAndGenerateTrafoMonthlyChartData(params, `trafo-tanggal-monthly-${i}`);
        if (!isChecked(`trafo-tanggal-monthly-${i}-checkbox`)) data.shift();
        datasets = [...datasets, ...data];
      }
    }

    trafoMonthlyChart.data.datasets = datasets;
    trafoMonthlyChart.update();
  }

  async function getAndGenerateTrafoMonthlyChartData(params, dateElementID) {
    return new Promise(async (resolve, reject) => {
      [params.bulan, params.tahun] = getValue(dateElementID).split("-");
      let data = await getTrafoMonthlyChartData(params);

      resolve([{
        label: `Perencanaan ${getValue(dateElementID)}`,
        data: data.plan,
        borderWidth: 1,
        borderDash: [5]
      }, {
        label: `Realisasi ${getValue(dateElementID)}`,
        data: data.realization,
        borderWidth: 1
      }]);
    });
  }

  async function getTrafoMonthlyChartData({
    trafo,
    satuan,
    bulan,
    tahun
  }) {
    return await crud.read({
      url: `${urlAPITrafoMonthlyChart}?trafo=${trafo}&satuan=${satuan}&bulan=${bulan}&tahun=${tahun}`
    });
  }

  async function refreshTrafoYearlyChartData() {
    let params = {
      trafo: getValue('trafo-yearly'),
      satuan: getValue('trafo-satuan-yearly')
    };
    let datasets = [];

    for (let i = 1; i <= 5; i++) {
      if (getValue(`trafo-tanggal-yearly-${i}`)) {
        const data = await getAndGenerateTrafoYearlyChartData(params, `trafo-tanggal-yearly-${i}`);
        if (!isChecked(`trafo-tanggal-yearly-${i}-checkbox`)) data.shift();
        datasets = [...datasets, ...data];
      }
    }

    trafoYearlyChart.data.datasets = datasets;
    trafoYearlyChart.update();
  }

  async function getAndGenerateTrafoYearlyChartData(params, dateElementID) {
    return new Promise(async (resolve, reject) => {
      params.tahun = getValue(dateElementID);
      let data = await getTrafoYearlyChartData(params);

      resolve([{
        label: `Perencanaan ${getValue(dateElementID)}`,
        data: data.plan,
        borderWidth: 1,
        borderDash: [5]
      }, {
        label: `Realisasi ${getValue(dateElementID)}`,
        data: data.realization,
        borderWidth: 1
      }]);
    });
  }

  async function getTrafoYearlyChartData({
    trafo,
    satuan,
    tahun
  }) {
    return await crud.read({
      url: `${urlAPITrafoYearlyChart}?trafo=${trafo}&satuan=${satuan}&tahun=${tahun}`
    });
  }
</script>