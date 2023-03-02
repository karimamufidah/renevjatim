<script>
  const urlAPITeganganDailyChart = "<?php echo base_url('api/graph/get-beban-tegangan-daily'); ?>";
  const urlAPITeganganMonthlyChart = "<?php echo base_url('api/graph/get-beban-tegangan-monthly'); ?>";
  const urlAPITeganganYearlyChart = "<?php echo base_url('api/graph/get-beban-tegangan-yearly'); ?>";
  const urlAPIBebanTeganganSelect2 = "<?php echo base_url('api/select2/beban-tegangan'); ?>";
  const urlAPIMinMaxSelect2 = "<?php echo base_url('api/select2/min-max'); ?>";
  const urlAPITeganganDatatable = "<?php echo base_url('api/datatable'); ?>";
  const urlAPITeganganHighestThisMonth = "<?php echo base_url('api/panel/get-highest-tegangan-this-month-panel'); ?>";
  const urlAPITeganganHighestThisYear = "<?php echo base_url('api/panel/get-highest-tegangan-this-year-panel'); ?>";
  const urlAPITeganganHighestThisAllTime = "<?php echo base_url('api/panel/get-highest-tegangan-all-time-panel'); ?>";
  const urlAPITeganganDailyExport = "<?php echo base_url('export/xlsx-tegangan'); ?>";
  const urlAPITeganganMonthlyExport = "<?php echo base_url('export/monthly/xlsx-tegangan'); ?>";
  let teganganDailyChart = document.getElementById('tegangan-daily-chart');
  let teganganMonthlyChart = document.getElementById('tegangan-monthly-chart');
  let teganganYearlyChart = document.getElementById('tegangan-yearly-chart');
  let teganganDatatable = document.getElementById("tegangan-datatable");
  let teganganStartDate = "";
  let teganganEndDate = "";

  /** Initialize Data */
  async function initializeTeganganData() {
    await initializeTeganganSelect2Default();
    initializeTeganganDateRangePicker();
    initializeTeganganDailyChart();
    initializeTeganganMonthlyChart();
    initializeTeganganYearlyChart();
    updateRangeTeganganTableLabel();
    initializeTeganganDatatable();
    initializeTeganganSelect2();
  };

  async function initializeTeganganSelect2Default() {
    await getDefaultSelect2({
      id: 'tegangan-daily-default',
      url: `${urlAPIBebanTeganganSelect2}`
    });

    await getDefaultSelect2({
      id: 'tegangan-monthly-default',
      url: `${urlAPIBebanTeganganSelect2}`
    });

    await getDefaultSelect2({
      id: 'tegangan-yearly-default',
      url: `${urlAPIBebanTeganganSelect2}`
    });

    await getDefaultSelect2({
      id: 'tegangan-table-default',
      url: `${urlAPIBebanTeganganSelect2}`
    });

    await getDefaultSelect2({
      id: 'min-max-monthly-default',
      url: `${urlAPIMinMaxSelect2}`
    });

    await getDefaultSelect2({
      id: 'min-max-yearly-default',
      url: `${urlAPIMinMaxSelect2}`
    });
  }

  async function getAndFillTeganganHighestThisMonthPanel() {
    const data = await crud.read({
      url: `${urlAPITeganganHighestThisMonth}`
    });

    fillInner("tegangan-highest-this-month", `${data.value} MW`);
    fillInner("tegangan-highest-this-month-datetime", getDateFormatOptions(data.logged_at));
  }

  async function getAndFillTeganganHighestThisYearPanel() {
    const data = await crud.read({
      url: `${urlAPITeganganHighestThisYear}`
    });

    fillInner("tegangan-highest-this-year", `${data.value} MW`);
    fillInner("tegangan-highest-this-year-datetime", getDateFormatOptions(data.logged_at));
  }

  async function getAndFillTeganganHighestAllTimePanel() {
    const data = await crud.read({
      url: `${urlAPITeganganHighestThisAllTime}`
    });

    fillInner("tegangan-highest-all-time", `${data.value} MW`);
    fillInner("tegangan-highest-all-time-datetime", getDateFormatOptions(data.logged_at));
  }

  async function initializeTeganganDateRangePicker() {
    teganganStartDate = moment().subtract(7, 'days');
    teganganEndDate = moment();

    $('#f-tegangan-date-range').daterangepicker({
      startDate: teganganStartDate,
      endDate: teganganEndDate
    }, function(start, end, label) {
      teganganStartDate = start;
      teganganEndDate = end;
    });
  }

  function initializeTeganganDailyChart() {
    teganganDailyChart = new Chart(teganganDailyChart, {
      type: 'line',
      data: {
        labels: generateDailyLabels()
      },
      options: getDailyOptions()
    });
  }

  function initializeTeganganMonthlyChart() {
    teganganMonthlyChart = new Chart(teganganMonthlyChart, {
      type: 'line',
      data: {
        labels: generateMonthlyLabels()
      },
      options: getStandardOptions()
    });
  }

  function initializeTeganganYearlyChart() {
    teganganYearlyChart = new Chart(teganganYearlyChart, {
      type: 'line',
      data: {
        labels: generateYearlyLabels()
      },
      options: getStandardOptions()
    });
  }

  const updateRangeTeganganTableLabel = () => updateRangeLabel("tegangan-percentage-table");

  function initializeTeganganDatatable() {
    teganganDatatable = $('#tegangan-datatable').DataTable({
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
        "url": urlAPITeganganDatatable,
        "data": function(d) {
          d.tegangan = getValue("tegangan-table");
          d.tanggalAwal = teganganStartDate.format("YYYY-MM-DD");
          d.tanggalAkhir = teganganEndDate.format("YYYY-MM-DD");
          d.persentaseAwal = getInner("tegangan-percentage-table-label-1").replace("%", "");
          d.persentaseAkhir = getInner("tegangan-percentage-table-label-2").replace("%", "");
        },
      }
    });
  }

  function initializeTeganganSelect2() {
    $(".select2-tegangan").select2({
      ajax: {
        url: urlAPIBebanTeganganSelect2,
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
      templateResult: formatBebanTegangan,
      templateSelection: formatTemplateSelection,
      escapeMarkup: (m) => m
    });

    $(".select2-min-max").select2({
      ajax: {
        url: urlAPIMinMaxSelect2,
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
      templateResult: formatSatuanTegangan,
      templateSelection: formatTemplateSelection,
      escapeMarkup: (m) => m
    });
  }

  const formatBebanTegangan = (result) => formatTemplateResult(result, 'beban-tegangan');
  const formatSatuanTegangan = (result) => formatTemplateResult(result, 'satuan-tegangan');

  /** Read */
  async function refreshTeganganDailyChartData() {
    let params = {
      gardu_induk: getValue('tegangan-daily')
    };
    let datasets = [];

    for (let i = 1; i <= 5; i++) {
      if (getValue(`tegangan-tanggal-daily-${i}`)) {
        const daily1Data = await getAndGenerateTeganganDailyChartData(params, `tegangan-tanggal-daily-${i}`);
        if (!isChecked(`tegangan-tanggal-daily-${i}-checkbox`)) daily1Data.shift();
        datasets = [...datasets, ...daily1Data];
      }
    }

    teganganDailyChart.data.datasets = datasets;
    teganganDailyChart.update();
  }

  async function getAndGenerateTeganganDailyChartData(params, dateElementID) {
    return new Promise(async (resolve, reject) => {
      params.tanggal = getValue(dateElementID);
      let firstDateData = await getTeganganDailyChartData(params);

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

  async function getTeganganDailyChartData({
    gardu_induk,
    tanggal
  }) {
    return await crud.read({
      url: `${urlAPITeganganDailyChart}?gardu_induk=${gardu_induk}&tanggal=${tanggal}`
    });
  }

  async function refreshTeganganMonthlyChartData() {
    let params = {
      gardu_induk: getValue('tegangan-monthly'),
      min_max: getValue('min-max-monthly')
    };
    let datasets = [];

    for (let i = 1; i <= 5; i++) {
      if (getValue(`tegangan-tanggal-monthly-${i}`)) {
        const data = await getAndGenerateTeganganMonthlyChartData(params, `tegangan-tanggal-monthly-${i}`);
        if (!isChecked(`tegangan-tanggal-monthly-${i}-checkbox`)) data.shift();
        datasets = [...datasets, ...data];
      }
    }

    teganganMonthlyChart.data.datasets = datasets;
    teganganMonthlyChart.update();
  }

  async function getAndGenerateTeganganMonthlyChartData(params, dateElementID) {
    return new Promise(async (resolve, reject) => {
      [params.bulan, params.tahun] = getValue(dateElementID).split("-");
      let data = await getTeganganMonthlyChartData(params);

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

  async function getTeganganMonthlyChartData({
    gardu_induk,
    min_max,
    bulan,
    tahun
  }) {
    return await crud.read({
      url: `${urlAPITeganganMonthlyChart}?gardu_induk=${gardu_induk}&min_max=${min_max}&bulan=${bulan}&tahun=${tahun}`
    });
  }

  async function refreshTeganganYearlyChartData() {
    let params = {
      gardu_induk: getValue('tegangan-yearly'),
      min_max: getValue('min-max-yearly')
    };
    let datasets = [];

    for (let i = 1; i <= 5; i++) {
      if (getValue(`tegangan-tanggal-yearly-${i}`)) {
        const data = await getAndGenerateTeganganYearlyChartData(params, `tegangan-tanggal-yearly-${i}`);
        if (!isChecked(`tegangan-tanggal-yearly-${i}-checkbox`)) data.shift();
        datasets = [...datasets, ...data];
      }
    }

    teganganYearlyChart.data.datasets = datasets;
    teganganYearlyChart.update();
  }

  async function getAndGenerateTeganganYearlyChartData(params, dateElementID) {
    return new Promise(async (resolve, reject) => {
      params.tahun = getValue(dateElementID);
      let data = await getTeganganYearlyChartData(params);

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

  async function getTeganganYearlyChartData({
    gardu_induk,
    min_max,
    tahun
  }) {
    return await crud.read({
      url: `${urlAPITeganganYearlyChart}?gardu_induk=${gardu_induk}&min_max=${min_max}&tahun=${tahun}`
    });
  }

  function downloadTeganganDailyXLSX() {
    const mainFilter = `tegangan=${getValue("tegangan-daily")}`;
    const dateData = `${generateTeganganDateDaily()}`;
    const isWithPlanData = `${generateTeganganIsWithPlanDaily()}`;
    const url = `${urlAPITeganganDailyExport}?${mainFilter}${dateData}${isWithPlanData}`;
    window.open(url);
  }

  function generateTeganganDateDaily() {
    let dateData = "";

    for (let i = 1; i <= 5; i++) {
      const date = getValue(`tegangan-tanggal-daily-${i}`);
      if (date) dateData += `&date${i}=${date}`;
    }

    return dateData;
  }

  function generateTeganganIsWithPlanDaily() {
    let isWithPlan = "";

    for (let i = 1; i <= 5; i++) {
      const isWithPlanCheck = getElement(`tegangan-tanggal-daily-${i}-checkbox`).checked;
      if (isWithPlanCheck) isWithPlan += `&isWithPlan${i}=${isWithPlanCheck}`;
    }

    return isWithPlan;
  }


  // Monthly
  function downloadTeganganMonthlyXLSX() {
    const mainFilter = `tegangan=${getValue("tegangan-monthly")}&minMax=${getValue("min-max-monthly")}`;
    const dateData = `${generateTeganganDateMonthly()}`;
    const isWithPlanData = `${generateTeganganIsWithPlanMonthly()}`;
    const url = `${urlAPITeganganMonthlyExport}?${mainFilter}${dateData}${isWithPlanData}`;
    window.open(url);
  }

  function generateTeganganDateMonthly() {
    let dateData = "";

    for (let i = 1; i <= 5; i++) {
      const date = getValue(`tegangan-tanggal-monthly-${i}`);
      const [month, year] = date.split("-");
      if (date) dateData += `&date${i}=${year}-${month}`;
    }

    return dateData;
  }

  function generateTeganganIsWithPlanMonthly() {
    let isWithPlan = "";

    for (let i = 1; i <= 5; i++) {
      const isWithPlanCheck = getElement(`tegangan-tanggal-monthly-${i}-checkbox`).checked;
      if (isWithPlanCheck) isWithPlan += `&isWithPlan${i}=${isWithPlanCheck}`;
    }

    return isWithPlan;
  }
</script>