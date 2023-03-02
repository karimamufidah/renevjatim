<script>
  const urlAPIPenghantarDailyChart = "<?php echo base_url('api/graph/get-beban-penghantar-daily'); ?>";
  const urlAPIPenghantarMonthlyChart = "<?php echo base_url('api/graph/get-beban-penghantar-monthly'); ?>";
  const urlAPIPenghantarYearlyChart = "<?php echo base_url('api/graph/get-beban-penghantar-yearly'); ?>";
  const urlAPIBebanPenghantarSelect2 = "<?php echo base_url('api/select2/beban-penghantar'); ?>";
  const urlAPISatuanPenghantarSelect2 = "<?php echo base_url('api/select2/satuan-penghantar'); ?>";
  const urlAPIPenghantarDatatable = "<?php echo base_url('api/datatable'); ?>";
  const urlAPIPenghantarHighestThisMonth = "<?php echo base_url('api/panel/get-highest-penghantar-this-month-panel'); ?>";
  const urlAPIPenghantarHighestThisYear = "<?php echo base_url('api/panel/get-highest-penghantar-this-year-panel'); ?>";
  const urlAPIPenghantarHighestThisAllTime = "<?php echo base_url('api/panel/get-highest-penghantar-all-time-panel'); ?>";
  const urlAPIPenghantarDailyExport = "<?php echo base_url('export/xlsx-penghantar'); ?>";
  let penghantarDailyChart = document.getElementById('penghantar-daily');
  let penghantarMonthlyChart = document.getElementById('penghantar-monthly');
  let penghantarYearlyChart = document.getElementById('penghantar-yearly');
  let penghantarDatatable = document.getElementById("penghantar-datatable");
  let penghantarStartDate = "";
  let penghantarEndDate = "";


  /** Initialize Data */
  async function initializePenghantarData() {
    await initializePenghantarSelect2Default();
    getAndFillPenghantarHighestThisMonthPanel();
    getAndFillPenghantarHighestThisYearPanel();
    getAndFillPenghantarHighestAllTimePanel();
    initializePenghantarDateRangePicker();
    initializePenghantarDailyChart();
    initializePenghantarMonthlyChart();
    initializePenghantarYearlyChart();
    updateRangePenghantarTableLabel();
    initializePenghantarDatatable();
    initializePenghantarSelect2();
  };

  async function getAndFillPenghantarHighestThisMonthPanel() {
    const data = await crud.read({
      url: `${urlAPIPenghantarHighestThisMonth}`
    });

    fillInner("penghantar-highest-this-month", `${data.value} MW`);
    fillInner("penghantar-highest-this-month-datetime", getDateFormatOptions(data.logged_at));
  }

  async function getAndFillPenghantarHighestThisYearPanel() {
    const data = await crud.read({
      url: `${urlAPIPenghantarHighestThisYear}`
    });

    fillInner("penghantar-highest-this-year", `${data.value} MW`);
    fillInner("penghantar-highest-this-year-datetime", getDateFormatOptions(data.logged_at));
  }

  async function getAndFillPenghantarHighestAllTimePanel() {
    const data = await crud.read({
      url: `${urlAPIPenghantarHighestThisAllTime}`
    });

    fillInner("penghantar-highest-all-time", `${data.value} MW`);
    fillInner("penghantar-highest-all-time-datetime", getDateFormatOptions(data.logged_at));
  }

  async function initializePenghantarSelect2Default() {
    await getDefaultSelect2({
      id: 'penghantar-ruas-daily-default',
      url: `${urlAPIBebanPenghantarSelect2}`
    });

    await getDefaultSelect2({
      id: 'penghantar-ruas-monthly-default',
      url: `${urlAPIBebanPenghantarSelect2}`
    });

    await getDefaultSelect2({
      id: 'penghantar-ruas-yearly-default',
      url: `${urlAPIBebanPenghantarSelect2}`
    });

    await getDefaultSelect2({
      id: 'penghantar-ruas-table-default',
      url: `${urlAPIBebanPenghantarSelect2}`
    });

    await getDefaultSelect2({
      id: 'penghantar-satuan-daily-default',
      url: `${urlAPISatuanPenghantarSelect2}`
    });

    await getDefaultSelect2({
      id: 'penghantar-satuan-monthly-default',
      url: `${urlAPISatuanPenghantarSelect2}`
    });

    await getDefaultSelect2({
      id: 'penghantar-satuan-yearly-default',
      url: `${urlAPISatuanPenghantarSelect2}`
    });
  }

  async function initializePenghantarDateRangePicker() {
    penghantarStartDate = moment().subtract(7, 'days');
    penghantarEndDate = moment();

    $('#f-penghantar-date-range').daterangepicker({
      startDate: penghantarStartDate,
      endDate: penghantarEndDate
    }, function(start, end, label) {
      penghantarStartDate = start;
      penghantarEndDate = end;
    });
  }

  function initializePenghantarDailyChart() {
    penghantarDailyChart = new Chart(penghantarDailyChart, {
      type: 'line',
      data: {
        labels: generateDailyLabels()
      },
      options: getDailyOptions()
    });
  }

  function initializePenghantarMonthlyChart() {
    penghantarMonthlyChart = new Chart(penghantarMonthlyChart, {
      type: 'line',
      data: {
        labels: generateMonthlyLabels()
      },
      options: getStandardOptions()
    });
  }

  function initializePenghantarYearlyChart() {
    penghantarYearlyChart = new Chart(penghantarYearlyChart, {
      type: 'line',
      data: {
        labels: generateYearlyLabels()
      },
      options: getStandardOptions()
    });
  }

  const updateRangePenghantarTableLabel = () => updateRangeLabel("penghantar-percentage-table");

  function initializePenghantarDatatable() {
    penghantarDatatable = $('#penghantar-datatable').DataTable({
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
        "url": urlAPIPenghantarDatatable,
        "data": function(d) {
          d.ruas = getValue("penghantar-ruas-table");
          d.tanggalAwal = penghantarStartDate.format("YYYY-MM-DD");
          d.tanggalAkhir = penghantarEndDate.format("YYYY-MM-DD");
          d.persentaseAwal = getInner("penghantar-percentage-table-label-1").replace("%", "");
          d.persentaseAkhir = getInner("penghantar-percentage-table-label-2").replace("%", "");
        },
      }
    });
  };

  function initializePenghantarSelect2() {
    $(".select2-penghantar").select2({
      ajax: {
        url: urlAPIBebanPenghantarSelect2,
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
      templateResult: formatBebanPenghantar,
      templateSelection: formatTemplateSelection,
      escapeMarkup: (m) => m
    });

    $(".select2-satuan-penghantar").select2({
      ajax: {
        url: urlAPISatuanPenghantarSelect2,
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
      templateResult: formatSatuanPenghantar,
      templateSelection: formatTemplateSelection,
      escapeMarkup: (m) => m
    });
  }

  const formatBebanPenghantar = (result) => formatTemplateResult(result, 'beban-penghantar');
  const formatSatuanPenghantar = (result) => formatTemplateResult(result, 'satuan-penghantar');

  /** Read */
  async function refreshPenghantarDailyChartData() {
    let params = {
      ruas: getValue('penghantar-ruas-daily'),
      satuan: getValue('penghantar-satuan-daily')
    };
    let datasets = [];

    for (let i = 1; i <= 5; i++) {
      if (getValue(`penghantar-tanggal-daily-${i}`)) {
        const daily1Data = await getAndGeneratePenghantarDailyChartData(params, `penghantar-tanggal-daily-${i}`);
        if (!isChecked(`penghantar-tanggal-daily-${i}-checkbox`)) daily1Data.shift();
        datasets = [...datasets, ...daily1Data];
      }
    }

    penghantarDailyChart.data.datasets = datasets;
    penghantarDailyChart.update();
  }

  async function getAndGeneratePenghantarDailyChartData(params, dateElementID) {
    return new Promise(async (resolve, reject) => {
      params.tanggal = getValue(dateElementID);
      let firstDateData = await getPenghantarDailyChartData(params);

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

  async function getPenghantarDailyChartData({
    ruas,
    satuan,
    tanggal,
    url
  }) {
    return await crud.read({
      url: `${urlAPIPenghantarDailyChart}?ruas=${ruas}&satuan=${satuan}&tanggal=${tanggal}`
    });
  }

  async function refreshPenghantarMonthlyChartData() {
    let params = {
      ruas: getValue('penghantar-ruas-monthly'),
      satuan: getValue('penghantar-satuan-monthly')
    };
    let datasets = [];

    for (let i = 1; i <= 5; i++) {
      if (getValue(`penghantar-tanggal-monthly-${i}`)) {
        const data = await getAndGeneratePenghantarMonthlyChartData(params, `penghantar-tanggal-monthly-${i}`);
        if (!isChecked(`penghantar-tanggal-monthly-${i}-checkbox`)) data.shift();
        datasets = [...datasets, ...data];
      }
    }

    penghantarMonthlyChart.data.datasets = datasets;
    penghantarMonthlyChart.update();
  }

  async function getAndGeneratePenghantarMonthlyChartData(params, dateElementID) {
    return new Promise(async (resolve, reject) => {
      [params.bulan, params.tahun] = getValue(dateElementID).split("-");
      let data = await getPenghantarMonthlyChartData(params);

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

  async function getPenghantarMonthlyChartData({
    ruas,
    satuan,
    bulan,
    tahun
  }) {
    return await crud.read({
      url: `${urlAPIPenghantarMonthlyChart}?ruas=${ruas}&satuan=${satuan}&bulan=${bulan}&tahun=${tahun}`
    });
  }

  async function refreshPenghantarYearlyChartData() {
    let params = {
      ruas: getValue('penghantar-ruas-yearly'),
      satuan: getValue('penghantar-satuan-yearly')
    };
    let datasets = [];

    for (let i = 1; i <= 5; i++) {
      if (getValue(`penghantar-tanggal-yearly-${i}`)) {
        const data = await getAndGeneratePenghantarYearlyChartData(params, `penghantar-tanggal-yearly-${i}`);
        if (!isChecked(`penghantar-tanggal-yearly-${i}-checkbox`)) data.shift();
        datasets = [...datasets, ...data];
      }
    }

    penghantarYearlyChart.data.datasets = datasets;
    penghantarYearlyChart.update();
  }

  async function getAndGeneratePenghantarYearlyChartData(params, dateElementID) {
    return new Promise(async (resolve, reject) => {
      params.tahun = getValue(dateElementID);
      let data = await getPenghantarYearlyChartData(params);

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

  async function getPenghantarYearlyChartData({
    ruas,
    satuan,
    tahun
  }) {
    return await crud.read({
      url: `${urlAPIPenghantarYearlyChart}?ruas=${ruas}&satuan=${satuan}&tahun=${tahun}`
    });
  }

  function downloadPenghantarDailyXLSX() {
    const mainFilter = `ruas=${getValue("penghantar-ruas-daily")}&satuan=${getValue("penghantar-satuan-daily")}`;
    const dateData = `${generateDateDaily()}`;
    const isWithPlanData = `${generateIsWithPlanDaily()}`;
    const url = `${urlAPIPenghantarDailyExport}?${mainFilter}${dateData}${isWithPlanData}`;
    window.open(url);
  }

  function generateDateDaily() {
    let dateData = "";

    for (let i = 1; i <= 5; i++) {
      const date = getValue(`penghantar-tanggal-daily-${i}`);
      if (date) dateData += `&date${i}=${date}`;
    }

    return dateData;
  }

  function generateIsWithPlanDaily() {
    let isWithPlan = "";

    for (let i = 1; i <= 5; i++) {
      const isWithPlanCheck = getElement(`penghantar-tanggal-daily-${i}-checkbox`).checked;
      if (isWithPlanCheck) isWithPlan += `&isWithPlan${i}=${isWithPlanCheck}`;
    }

    return isWithPlan;
  }

  /** General */
  function getDateFormatOptions(datetime) {
    const date = new Date(datetime);
    const options = {
      weekday: 'long',
      year: 'numeric',
      month: 'long',
      day: 'numeric'
    };
    return `${date.toLocaleDateString('id-ID', options)}, ${date.toLocaleTimeString('id-ID')}`;
  }
</script>