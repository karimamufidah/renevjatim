<script>
  const urlAPISubsistemDailyChart = "<?php echo base_url('api/graph/get-beban-subsistem-daily'); ?>";
  const urlAPISubsistemMonthlyChart = "<?php echo base_url('api/graph/get-beban-subsistem-monthly'); ?>";
  const urlAPISubsistemYearlyChart = "<?php echo base_url('api/graph/get-beban-subsistem-yearly'); ?>";
  const urlAPIBebanSubsistemSelect2 = "<?php echo base_url('api/select2/beban-subsistem'); ?>";
  const urlAPIPasokanSubsistemSelect2 = "<?php echo base_url('api/select2/pasokan-subsistem'); ?>";
  const urlAPISubsistemDatatable = "<?php echo base_url('api/datatable'); ?>";
  const urlAPISubsistemHighestThisMonth = "<?php echo base_url('api/panel/get-highest-subsistem-this-month-panel'); ?>";
  const urlAPISubsistemHighestThisYear = "<?php echo base_url('api/panel/get-highest-subsistem-this-year-panel'); ?>";
  const urlAPISubsistemHighestThisAllTime = "<?php echo base_url('api/panel/get-highest-subsistem-all-time-panel'); ?>";
  const urlAPISubsistemDailyExport = "<?php echo base_url('export/xlsx-subsistem'); ?>";
  const urlAPISubsistemMonthlyExport = "<?php echo base_url('export/monthly/xlsx-subsistem'); ?>";
  const urlAPISubsistemYearlyExport = "<?php echo base_url('export/yearly/xlsx-subsistem'); ?>";
  let subsistemDailyChart = document.getElementById('subsistem-daily-chart');
  let subsistemMonthlyChart = document.getElementById('subsistem-monthly-chart');
  let subsistemYearlyChart = document.getElementById('subsistem-yearly-chart');
  let subsistemDatatable = document.getElementById("subsistem-datatable");
  let subsistemStartDate = "";
  let subsistemEndDate = "";

  /** Initialize Data */
  async function initializeSubsistemData() {
    await initializeSubsistemSelect2Default();
    getAndFillSubsistemPanelData();
    initializeSubsistemDailyChart();
    initializeSubsistemMonthlyChart();
    initializeSubsistemYearlyChart();
    initializeSubsistemSelect2();
  };

  async function initializeSubsistemSelect2Default() {
    await getDefaultSelect2({
      id: 'subsistem-panel-default',
      url: `${urlAPIBebanSubsistemSelect2}`
    });

    await getDefaultSelect2({
      id: 'subsistem-daily-default',
      url: `${urlAPIBebanSubsistemSelect2}`
    });

    await getDefaultSelect2({
      id: 'subsistem-monthly-default',
      url: `${urlAPIBebanSubsistemSelect2}`
    });

    await getDefaultSelect2({
      id: 'subsistem-yearly-default',
      url: `${urlAPIBebanSubsistemSelect2}`
    });

    await getDefaultSelect2({
      id: 'subsistem-pasokan-daily-default',
      url: `${urlAPIPasokanSubsistemSelect2}`
    });

    await getDefaultSelect2({
      id: 'subsistem-pasokan-monthly-default',
      url: `${urlAPIPasokanSubsistemSelect2}`
    });

    await getDefaultSelect2({
      id: 'subsistem-pasokan-yearly-default',
      url: `${urlAPIPasokanSubsistemSelect2}`
    });
  }

  function getAndFillSubsistemPanelData() {
    getAndFillSubsistemHighestThisMonthPanel();
    getAndFillSubsistemHighestThisYearPanel();
    getAndFillSubsistemHighestAllTimePanel();
  }

  async function getAndFillSubsistemHighestThisMonthPanel() {
    const data = await crud.read({
      url: `${urlAPISubsistemHighestThisMonth}?nama=${getValue("subsistem-panel")}`
    });

    fillInner("subsistem-highest-this-month", `${data.value} MW`);
    fillInner("subsistem-highest-this-month-datetime", getDateFormatOptions(data.logged_at));
  }

  async function getAndFillSubsistemHighestThisYearPanel() {
    const data = await crud.read({
      url: `${urlAPISubsistemHighestThisYear}?nama=${getValue("subsistem-panel")}`
    });

    fillInner("subsistem-highest-this-year", `${data.value} MW`);
    fillInner("subsistem-highest-this-year-datetime", getDateFormatOptions(data.logged_at));
  }

  async function getAndFillSubsistemHighestAllTimePanel() {
    const data = await crud.read({
      url: `${urlAPISubsistemHighestThisAllTime}?nama=${getValue("subsistem-panel")}`
    });

    fillInner("subsistem-highest-all-time", `${data.value} MW`);
    fillInner("subsistem-highest-all-time-datetime", getDateFormatOptions(data.logged_at));
  }

  async function initializeSubsistemDateRangePicker() {
    subsistemStartDate = moment().subtract(7, 'days');
    subsistemEndDate = moment();

    $('#f-subsistem-date-range').daterangepicker({
      startDate: subsistemStartDate,
      endDate: subsistemEndDate
    }, function(start, end, label) {
      subsistemStartDate = start;
      subsistemEndDate = end;
    });
  }

  function initializeSubsistemDailyChart() {
    subsistemDailyChart = new Chart(subsistemDailyChart, {
      type: 'line',
      data: {
        labels: generateDailyLabels()
      },
      options: getDailyOptions()
    });
  }

  function initializeSubsistemMonthlyChart() {
    subsistemMonthlyChart = new Chart(subsistemMonthlyChart, {
      type: 'line',
      data: {
        labels: generateMonthlyLabels()
      },
      options: getStandardOptions()
    });
  }

  function initializeSubsistemYearlyChart() {
    subsistemYearlyChart = new Chart(subsistemYearlyChart, {
      type: 'line',
      data: {
        labels: generateYearlyLabels()
      },
      options: getStandardOptions()
    });
  }

  const updateRangeSubsistemTableLabel = () => updateRangeLabel("subsistem-percentage-table");

  function initializeSubsistemDatatable() {
    subsistemDatatable = $('#subsistem-datatable').DataTable({
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
        "url": urlAPISubsistemDatatable,
        "data": function(d) {
          d.subsistem = getValue("subsistem-table");
          d.tanggalAwal = subsistemStartDate.format("YYYY-MM-DD");
          d.tanggalAkhir = subsistemEndDate.format("YYYY-MM-DD");
          d.persentaseAwal = getInner("subsistem-percentage-table-label-1").replace("%", "");
          d.persentaseAkhir = getInner("subsistem-percentage-table-label-2").replace("%", "");
        },
      }
    });
  }

  function initializeSubsistemSelect2() {
    $(".select2-subsistem").select2({
      ajax: {
        url: urlAPIBebanSubsistemSelect2,
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
      templateResult: formatBebanSubsistem,
      templateSelection: formatTemplateSelection,
      escapeMarkup: (m) => m
    });

    $(".select2-pasokan-subsistem").select2({
      ajax: {
        url: urlAPIPasokanSubsistemSelect2,
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
      templateResult: formatPasokanSubsistem,
      templateSelection: formatTemplateSelection,
      escapeMarkup: (m) => m
    });
  }

  const formatBebanSubsistem = (result) => formatTemplateResult(result, 'beban-subsistem');
  const formatPasokanSubsistem = (result) => formatTemplateResult(result, 'pasokan-subsistem');

  /** Read */
  async function refreshSubsistemDailyChartData() {
    let params = {
      subsistem: getValue('subsistem-daily'),
      pasokan: getValue('subsistem-pasokan-daily')
    };
    let datasets = [];

    for (let i = 1; i <= 5; i++) {
      if (getValue(`subsistem-tanggal-daily-${i}`)) {
        const daily1Data = await getAndGenerateSubsistemDailyChartData(params, `subsistem-tanggal-daily-${i}`);
        if (!isChecked(`subsistem-tanggal-daily-${i}-checkbox`)) daily1Data.shift();
        datasets = [...datasets, ...daily1Data];
      }
    }

    subsistemDailyChart.data.datasets = datasets;
    subsistemDailyChart.update();
  }

  async function getAndGenerateSubsistemDailyChartData(params, dateElementID) {
    return new Promise(async (resolve, reject) => {
      params.tanggal = getValue(dateElementID);
      let firstDateData = await getSubsistemDailyChartData(params);

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

  async function getSubsistemDailyChartData({
    subsistem,
    pasokan,
    tanggal,
    url
  }) {
    return await crud.read({
      url: `${urlAPISubsistemDailyChart}?subsistem=${subsistem}&pasokan=${pasokan}&tanggal=${tanggal}`
    });
  }

  async function refreshSubsistemMonthlyChartData() {
    let params = {
      subsistem: getValue('subsistem-monthly'),
      pasokan: getValue('subsistem-pasokan-monthly')
    };
    let datasets = [];

    for (let i = 1; i <= 5; i++) {
      if (getValue(`subsistem-tanggal-monthly-${i}`)) {
        const data = await getAndGenerateSubsistemMonthlyChartData(params, `subsistem-tanggal-monthly-${i}`);
        if (!isChecked(`subsistem-tanggal-monthly-${i}-checkbox`)) data.shift();
        datasets = [...datasets, ...data];
      }
    }

    subsistemMonthlyChart.data.datasets = datasets;
    subsistemMonthlyChart.update();
  }

  async function getAndGenerateSubsistemMonthlyChartData(params, dateElementID) {
    return new Promise(async (resolve, reject) => {
      [params.bulan, params.tahun] = getValue(dateElementID).split("-");
      let data = await getSubsistemMonthlyChartData(params);

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

  async function getSubsistemMonthlyChartData({
    subsistem,
    pasokan,
    bulan,
    tahun
  }) {
    return await crud.read({
      url: `${urlAPISubsistemMonthlyChart}?subsistem=${subsistem}&pasokan=${pasokan}&bulan=${bulan}&tahun=${tahun}`
    });
  }

  async function refreshSubsistemYearlyChartData() {
    let params = {
      subsistem: getValue('subsistem-yearly'),
      pasokan: getValue('subsistem-pasokan-yearly')
    };
    let datasets = [];

    for (let i = 1; i <= 5; i++) {
      if (getValue(`subsistem-tanggal-yearly-${i}`)) {
        const data = await getAndGenerateSubsistemYearlyChartData(params, `subsistem-tanggal-yearly-${i}`);
        if (!isChecked(`subsistem-tanggal-yearly-${i}-checkbox`)) data.shift();
        datasets = [...datasets, ...data];
      }
    }

    subsistemYearlyChart.data.datasets = datasets;
    subsistemYearlyChart.update();
  }

  async function getAndGenerateSubsistemYearlyChartData(params, dateElementID) {
    return new Promise(async (resolve, reject) => {
      params.tahun = getValue(dateElementID);
      let data = await getSubsistemYearlyChartData(params);

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

  async function getSubsistemYearlyChartData({
    subsistem,
    pasokan,
    tahun
  }) {
    return await crud.read({
      url: `${urlAPISubsistemYearlyChart}?subsistem=${subsistem}&pasokan=${pasokan}&tahun=${tahun}`
    });
  }

  // Daily
  function downloadSubsistemDailyXLSX() {
    const mainFilter = `subsistem=${getValue("subsistem-daily")}&pasokan=${getValue("subsistem-pasokan-daily")}`;
    const dateData = `${generateSubsistemDateDaily()}`;
    const isWithPlanData = `${generateSubsistemIsWithPlanDaily()}`;
    const url = `${urlAPISubsistemDailyExport}?${mainFilter}${dateData}${isWithPlanData}`;
    window.open(url);
  }

  function generateSubsistemDateDaily() {
    let dateData = "";

    for (let i = 1; i <= 5; i++) {
      const date = getValue(`subsistem-tanggal-daily-${i}`);
      if (date) dateData += `&date${i}=${date}`;
    }

    return dateData;
  }

  function generateSubsistemIsWithPlanDaily() {
    let isWithPlan = "";

    for (let i = 1; i <= 5; i++) {
      const isWithPlanCheck = getElement(`subsistem-tanggal-daily-${i}-checkbox`).checked;
      if (isWithPlanCheck) isWithPlan += `&isWithPlan${i}=${isWithPlanCheck}`;
    }

    return isWithPlan;
  }

  // Monthly
  function downloadSubsistemMonthlyXLSX() {
    const mainFilter = `subsistem=${getValue("subsistem-monthly")}&pasokan=${getValue("subsistem-pasokan-monthly")}`;
    const dateData = `${generateSubsistemDateMonthly()}`;
    const isWithPlanData = `${generateSubsistemIsWithPlanMonthly()}`;
    const url = `${urlAPISubsistemMonthlyExport}?${mainFilter}${dateData}${isWithPlanData}`;
    window.open(url);
  }

  function generateSubsistemDateMonthly() {
    let dateData = "";

    for (let i = 1; i <= 5; i++) {
      const date = getValue(`subsistem-tanggal-monthly-${i}`);
      const [month, year] = date.split("-");
      if (date) dateData += `&date${i}=${year}-${month}`;
    }

    return dateData;
  }

  function generateSubsistemIsWithPlanMonthly() {
    let isWithPlan = "";

    for (let i = 1; i <= 5; i++) {
      const isWithPlanCheck = getElement(`subsistem-tanggal-monthly-${i}-checkbox`).checked;
      if (isWithPlanCheck) isWithPlan += `&isWithPlan${i}=${isWithPlanCheck}`;
    }

    return isWithPlan;
  }

  // Yearly
  function downloadSubsistemYearlyXLSX() {
    const mainFilter = `subsistem=${getValue("subsistem-yearly")}&pasokan=${getValue("subsistem-pasokan-yearly")}`;
    const dateData = `${generateSubsistemDateYearly()}`;
    const isWithPlanData = `${generateSubsistemIsWithPlanYearly()}`;
    const url = `${urlAPISubsistemYearlyExport}?${mainFilter}${dateData}${isWithPlanData}`;
    window.open(url);
  }

  function generateSubsistemDateYearly() {
    let dateData = "";

    for (let i = 1; i <= 5; i++) {
      const date = getValue(`subsistem-tanggal-yearly-${i}`);
      if (date) dateData += `&date${i}=${date}`;
    }

    return dateData;
  }

  function generateSubsistemIsWithPlanYearly() {
    let isWithPlan = "";

    for (let i = 1; i <= 5; i++) {
      const isWithPlanCheck = getElement(`subsistem-tanggal-yearly-${i}-checkbox`).checked;
      if (isWithPlanCheck) isWithPlan += `&isWithPlan${i}=${isWithPlanCheck}`;
    }

    return isWithPlan;
  }
</script>