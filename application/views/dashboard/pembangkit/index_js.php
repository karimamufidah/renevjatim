<script>
  const urlAPIPembangkitDailyChart = "<?php echo base_url('api/graph/get-beban-pembangkit-daily'); ?>";
  const urlAPIPembangkitMonthlyChart = "<?php echo base_url('api/graph/get-beban-pembangkit-monthly'); ?>";
  const urlAPIPembangkitYearlyChart = "<?php echo base_url('api/graph/get-beban-pembangkit-yearly'); ?>";
  const urlAPIBebanPembangkitSelect2 = "<?php echo base_url('api/select2/beban-pembangkit'); ?>";
  const urlAPISatuanPembangkitSelect2 = "<?php echo base_url('api/select2/satuan-pembangkit'); ?>";
  const urlAPIPembangkitDatatable = "<?php echo base_url('api/datatable'); ?>";
  const urlAPIPembangkitHighestThisMonth = "<?php echo base_url('api/panel/get-highest-pembangkit-this-month-panel'); ?>";
  const urlAPIPembangkitHighestThisYear = "<?php echo base_url('api/panel/get-highest-pembangkit-this-year-panel'); ?>";
  const urlAPIPembangkitHighestThisAllTime = "<?php echo base_url('api/panel/get-highest-pembangkit-all-time-panel'); ?>";
  const urlAPIPembangkitDailyExport = "<?php echo base_url('export/xlsx-pembangkit'); ?>";
  let pembangkitDailyChart = document.getElementById('pembangkit-daily-chart');
  let pembangkitMonthlyChart = document.getElementById('pembangkit-monthly-chart');
  let pembangkitYearlyChart = document.getElementById('pembangkit-yearly-chart');
  let pembangkitDatatable = document.getElementById("pembangkit-datatable");
  let pembangkitStartDate = "";
  let pembangkitEndDate = "";

  /** Initialize Data */
  async function initializePembangkitData() {
    await initializePembangkitSelect2Default();
    initializePembangkitDateRangePicker();
    initializePembangkitDailyChart();
    initializePembangkitMonthlyChart();
    initializePembangkitYearlyChart();
    updateRangePembangkitTableLabel();
    initializePembangkitDatatable();
    initializePembangkitSelect2();
  };

  async function initializePembangkitSelect2Default() {
    await getDefaultSelect2({
      id: 'pembangkit-daily-default',
      url: `${urlAPIBebanPembangkitSelect2}`
    });

    await getDefaultSelect2({
      id: 'pembangkit-monthly-default',
      url: `${urlAPIBebanPembangkitSelect2}`
    });

    await getDefaultSelect2({
      id: 'pembangkit-yearly-default',
      url: `${urlAPIBebanPembangkitSelect2}`
    });

    await getDefaultSelect2({
      id: 'pembangkit-table-default',
      url: `${urlAPIBebanPembangkitSelect2}`
    });

    await getDefaultSelect2({
      id: 'pembangkit-satuan-daily-default',
      url: `${urlAPISatuanPembangkitSelect2}`
    });

    await getDefaultSelect2({
      id: 'pembangkit-satuan-monthly-default',
      url: `${urlAPISatuanPembangkitSelect2}`
    });

    await getDefaultSelect2({
      id: 'pembangkit-satuan-yearly-default',
      url: `${urlAPISatuanPembangkitSelect2}`
    });
  }

  async function getAndFillPembangkitHighestThisMonthPanel() {
    const data = await crud.read({
      url: `${urlAPIPembangkitHighestThisMonth}`
    });

    fillInner("pembangkit-highest-this-month", `${data.value} MW`);
    fillInner("pembangkit-highest-this-month-datetime", getDateFormatOptions(data.logged_at));
  }

  async function getAndFillPembangkitHighestThisYearPanel() {
    const data = await crud.read({
      url: `${urlAPIPembangkitHighestThisYear}`
    });

    fillInner("pembangkit-highest-this-year", `${data.value} MW`);
    fillInner("pembangkit-highest-this-year-datetime", getDateFormatOptions(data.logged_at));
  }

  async function getAndFillPembangkitHighestAllTimePanel() {
    const data = await crud.read({
      url: `${urlAPIPembangkitHighestThisAllTime}`
    });

    fillInner("pembangkit-highest-all-time", `${data.value} MW`);
    fillInner("pembangkit-highest-all-time-datetime", getDateFormatOptions(data.logged_at));
  }

  async function initializePembangkitDateRangePicker() {
    pembangkitStartDate = moment().subtract(7, 'days');
    pembangkitEndDate = moment();

    $('#f-pembangkit-date-range').daterangepicker({
      startDate: pembangkitStartDate,
      endDate: pembangkitEndDate
    }, function(start, end, label) {
      pembangkitStartDate = start;
      pembangkitEndDate = end;
    });
  }

  function initializePembangkitDailyChart() {
    pembangkitDailyChart = new Chart(pembangkitDailyChart, {
      type: 'line',
      data: {
        labels: generateDailyLabels()
      },
      options: getDailyOptions()
    });
  }

  function initializePembangkitMonthlyChart() {
    pembangkitMonthlyChart = new Chart(pembangkitMonthlyChart, {
      type: 'line',
      data: {
        labels: generateMonthlyLabels()
      },
      options: getStandardOptions()
    });
  }

  function initializePembangkitYearlyChart() {
    pembangkitYearlyChart = new Chart(pembangkitYearlyChart, {
      type: 'line',
      data: {
        labels: generateYearlyLabels()
      },
      options: getStandardOptions()
    });
  }

  const updateRangePembangkitTableLabel = () => updateRangeLabel("pembangkit-percentage-table");

  function initializePembangkitDatatable() {
    pembangkitDatatable = $('#pembangkit-datatable').DataTable({
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
        "url": urlAPIPembangkitDatatable,
        "data": function(d) {
          d.pembangkit = getValue("pembangkit-table");
          d.tanggalAwal = pembangkitStartDate.format("YYYY-MM-DD");
          d.tanggalAkhir = pembangkitEndDate.format("YYYY-MM-DD");
          d.persentaseAwal = getInner("pembangkit-percentage-table-label-1").replace("%", "");
          d.persentaseAkhir = getInner("pembangkit-percentage-table-label-2").replace("%", "");
        },
      }
    });
  }

  function initializePembangkitSelect2() {
    $(".select2-pembangkit").select2({
      ajax: {
        url: urlAPIBebanPembangkitSelect2,
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
      templateResult: formatBebanPembangkit,
      templateSelection: formatTemplateSelection,
      escapeMarkup: (m) => m
    });
    
    $(".select2-satuan-pembangkit").select2({
      ajax: {
        url: urlAPISatuanPembangkitSelect2,
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
      templateResult: formatSatuanPembangkit,
      templateSelection: formatTemplateSelection,
      escapeMarkup: (m) => m
    });
  }

  const formatBebanPembangkit = (result) => formatTemplateResult(result, 'beban-pembangkit');
  const formatSatuanPembangkit = (result) => formatTemplateResult(result, 'satuan-pembangkit');

  /** Read */
  async function refreshPembangkitDailyChartData() {
    let params = {
      pembangkit: getValue('pembangkit-daily'),
      satuan: getValue('pembangkit-satuan-daily')
    };
    let datasets = [];

    for (let i = 1; i <= 5; i++) {
      if (getValue(`pembangkit-tanggal-daily-${i}`)) {
        const daily1Data = await getAndGeneratePembangkitDailyChartData(params, `pembangkit-tanggal-daily-${i}`);
        if (!isChecked(`pembangkit-tanggal-daily-${i}-checkbox`)) daily1Data.shift();
        datasets = [...datasets, ...daily1Data];
      }
    }

    pembangkitDailyChart.data.datasets = datasets;
    pembangkitDailyChart.update();
  }

  async function getAndGeneratePembangkitDailyChartData(params, dateElementID) {
    return new Promise(async (resolve, reject) => {
      params.tanggal = getValue(dateElementID);
      let firstDateData = await getPembangkitDailyChartData(params);

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

  async function getPembangkitDailyChartData({
    pembangkit,
    satuan,
    tanggal,
    url
  }) {
    return await crud.read({
      url: `${urlAPIPembangkitDailyChart}?pembangkit=${pembangkit}&satuan=${satuan}&tanggal=${tanggal}`
    });
  }

  async function refreshPembangkitMonthlyChartData() {
    let params = {
      pembangkit: getValue('pembangkit-monthly'),
      satuan: getValue('pembangkit-satuan-monthly')
    };
    let datasets = [];

    for (let i = 1; i <= 5; i++) {
      if (getValue(`pembangkit-tanggal-monthly-${i}`)) {
        const data = await getAndGeneratePembangkitMonthlyChartData(params, `pembangkit-tanggal-monthly-${i}`);
        if (!isChecked(`pembangkit-tanggal-monthly-${i}-checkbox`)) data.shift();
        datasets = [...datasets, ...data];
      }
    }

    pembangkitMonthlyChart.data.datasets = datasets;
    pembangkitMonthlyChart.update();
  }

  async function getAndGeneratePembangkitMonthlyChartData(params, dateElementID) {
    return new Promise(async (resolve, reject) => {
      [params.bulan, params.tahun] = getValue(dateElementID).split("-");
      let data = await getPembangkitMonthlyChartData(params);

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

  async function getPembangkitMonthlyChartData({
    pembangkit,
    satuan,
    bulan,
    tahun
  }) {
    return await crud.read({
      url: `${urlAPIPembangkitMonthlyChart}?pembangkit=${pembangkit}&satuan=${satuan}&bulan=${bulan}&tahun=${tahun}`
    });
  }

  async function refreshPembangkitYearlyChartData() {
    let params = {
      pembangkit: getValue('pembangkit-yearly'),
      satuan: getValue('pembangkit-satuan-yearly')
    };
    let datasets = [];

    for (let i = 1; i <= 5; i++) {
      if (getValue(`pembangkit-tanggal-yearly-${i}`)) {
        const data = await getAndGeneratePembangkitYearlyChartData(params, `pembangkit-tanggal-yearly-${i}`);
        if (!isChecked(`pembangkit-tanggal-yearly-${i}-checkbox`)) data.shift();
        datasets = [...datasets, ...data];
      }
    }

    pembangkitYearlyChart.data.datasets = datasets;
    pembangkitYearlyChart.update();
  }

  async function getAndGeneratePembangkitYearlyChartData(params, dateElementID) {
    return new Promise(async (resolve, reject) => {
      params.tahun = getValue(dateElementID);
      let data = await getPembangkitYearlyChartData(params);

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

  async function getPembangkitYearlyChartData({
    pembangkit,
    satuan,
    tahun
  }) {
    return await crud.read({
      url: `${urlAPIPembangkitYearlyChart}?pembangkit=${pembangkit}&satuan=${satuan}&tahun=${tahun}`
    });
  }

  function downloadPembangkitDailyXLSX() {
    const mainFilter = `pembangkit=${getValue("pembangkit-daily")}&satuan=${getValue("pembangkit-satuan-daily")}`;
    const dateData = `${generatePembangkitDateDaily()}`;
    const isWithPlanData = `${generatePembangkitIsWithPlanDaily()}`;
    const url = `${urlAPIPembangkitDailyExport}?${mainFilter}${dateData}${isWithPlanData}`;
    window.open(url);
  }

  function generatePembangkitDateDaily() {
    let dateData = "";

    for (let i = 1; i <= 5; i++) {
      const date = getValue(`pembangkit-tanggal-daily-${i}`);
      if (date) dateData += `&date${i}=${date}`;
    }

    return dateData;
  }

  function generatePembangkitIsWithPlanDaily() {
    let isWithPlan = "";

    for (let i = 1; i <= 5; i++) {
      const isWithPlanCheck = getElement(`pembangkit-tanggal-daily-${i}-checkbox`).checked;
      if (isWithPlanCheck) isWithPlan += `&isWithPlan${i}=${isWithPlanCheck}`;
    }

    return isWithPlan;
  }
</script>