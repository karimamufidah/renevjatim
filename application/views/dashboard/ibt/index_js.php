<script>
  const urlAPIIBTDailyChart = "<?php echo base_url('api/graph/get-beban-ibt-daily'); ?>";
  const urlAPIIBTMonthlyChart = "<?php echo base_url('api/graph/get-beban-ibt-monthly'); ?>";
  const urlAPIIBTYearlyChart = "<?php echo base_url('api/graph/get-beban-ibt-yearly'); ?>";
  const urlAPIBebanIBTSelect2 = "<?php echo base_url('api/select2/beban-interbus-transformer'); ?>";
  const urlAPISatuanIBTSelect2 = "<?php echo base_url('api/select2/satuan-ibt'); ?>";
  const urlAPIIBTDatatable = "<?php echo base_url('api/datatable/ibt-realisasi-table'); ?>";
  const urlAPIIBTHighestThisMonth = "<?php echo base_url('api/panel/get-highest-ibt-this-month-panel'); ?>";
  const urlAPIIBTHighestThisYear = "<?php echo base_url('api/panel/get-highest-ibt-this-year-panel'); ?>";
  const urlAPIIBTHighestThisAllTime = "<?php echo base_url('api/panel/get-highest-ibt-all-time-panel'); ?>";
  const urlAPIIBTDailyExport = "<?php echo base_url('export/xlsx-ibt'); ?>";
  const urlAPIIBTMonthlyExport = "<?php echo base_url('export/monthly/xlsx-ibt'); ?>";
  const urlAPIIBTYearlyExport = "<?php echo base_url('export/yearly/xlsx-ibt'); ?>";
  const urlAPIIBTPemantauanExport = "<?php echo base_url('export/pemantauan/xlsx-ibt'); ?>";
  let ibtDailyChart = document.getElementById('ibt-daily-chart');
  let ibtMonthlyChart = document.getElementById('ibt-monthly-chart');
  let ibtYearlyChart = document.getElementById('ibt-yearly-chart');
  let ibtDatatable = document.getElementById("ibt-datatable");
  let ibtStartDate = "";
  let ibtEndDate = "";

  /** Initialize Data */
  async function initializeIBTData() {
    await initializeIBTSelect2Default();
    await getAndFillIBTPanelData();
    await initializeIBTDateRangePicker();
    await initializeIBTDailyChart();
    await initializeIBTMonthlyChart();
    await initializeIBTYearlyChart();
    await updateRangeIBTTableLabel();
    await initializeIBTDatatable();
    await initializeIBTSelect2();
  };

  async function initializeIBTSelect2Default() {
    await getDefaultSelect2({
      id: 'ibt-panel-default',
      url: `${urlAPIBebanIBTSelect2}`
    });

    await getDefaultSelect2({
      id: 'ibt-daily-default',
      url: `${urlAPIBebanIBTSelect2}`
    });

    await getDefaultSelect2({
      id: 'ibt-monthly-default',
      url: `${urlAPIBebanIBTSelect2}`
    });

    await getDefaultSelect2({
      id: 'ibt-yearly-default',
      url: `${urlAPIBebanIBTSelect2}`
    });

    await getDefaultSelect2({
      id: 'ibt-table-default',
      url: `${urlAPIBebanIBTSelect2}`
    });

    await getDefaultSelect2({
      id: 'ibt-satuan-daily-default',
      url: `${urlAPISatuanIBTSelect2}`
    });

    await getDefaultSelect2({
      id: 'ibt-satuan-monthly-default',
      url: `${urlAPISatuanIBTSelect2}`
    });

    await getDefaultSelect2({
      id: 'ibt-satuan-yearly-default',
      url: `${urlAPISatuanIBTSelect2}`
    });
  }

  async function getAndFillIBTPanelData() {
    await getAndFillIBTHighestThisMonthPanel();
    await getAndFillIBTHighestThisYearPanel();
    await getAndFillIBTHighestAllTimePanel();
  }

  async function getAndFillIBTHighestThisMonthPanel() {
    const data = await crud.read({
      url: `${urlAPIIBTHighestThisMonth}?nama=${getValue("ibt-panel")}`
    });

    fillInner("ibt-highest-this-month", `${data.value} MW`);
    fillInner("ibt-highest-this-month-datetime", getDateFormatOptions(data.logged_at));
  }

  async function getAndFillIBTHighestThisYearPanel() {
    const data = await crud.read({
      url: `${urlAPIIBTHighestThisYear}?nama=${getValue("ibt-panel")}`
    });

    fillInner("ibt-highest-this-year", `${data.value} MW`);
    fillInner("ibt-highest-this-year-datetime", getDateFormatOptions(data.logged_at));
  }

  async function getAndFillIBTHighestAllTimePanel() {
    const data = await crud.read({
      url: `${urlAPIIBTHighestThisAllTime}?nama=${getValue("ibt-panel")}`
    });

    fillInner("ibt-highest-all-time", `${data.value} MW`);
    fillInner("ibt-highest-all-time-datetime", getDateFormatOptions(data.logged_at));
  }

  async function initializeIBTDateRangePicker() {
    ibtStartDate = moment().subtract(7, 'days');
    ibtEndDate = moment();

    $('#f-ibt-date-range').daterangepicker({
      startDate: ibtStartDate,
      endDate: ibtEndDate
    }, function(start, end, label) {
      ibtStartDate = start;
      ibtEndDate = end;
    });
  }

  function initializeIBTDailyChart() {
    ibtDailyChart = new Chart(ibtDailyChart, {
      type: 'line',
      data: {
        labels: generateDailyLabels()
      },
      options: getDailyOptions()
    });
  }

  function initializeIBTMonthlyChart() {
    ibtMonthlyChart = new Chart(ibtMonthlyChart, {
      type: 'line',
      data: {
        labels: generateMonthlyLabels()
      },
      options: getStandardOptions()
    });
  }

  function initializeIBTYearlyChart() {
    ibtYearlyChart = new Chart(ibtYearlyChart, {
      type: 'line',
      data: {
        labels: generateYearlyLabels()
      },
      options: getStandardOptions()
    });
  }

  const updateRangeIBTTableLabel = () => updateRangeLabel("ibt-percentage-table");

  async function initializeIBTDatatable() {
    ibtDatatable = $('#ibt-datatable').DataTable({
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
            return `${row.mvar}`;
          }
        }
      ],
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": urlAPIIBTDatatable,
        "data": function(d) {
          d.nama = getValue("ibt-table");
          d.tanggalAwal = ibtStartDate.format("YYYY-MM-DD");
          d.tanggalAkhir = ibtEndDate.format("YYYY-MM-DD");
          d.persentaseAwal = getInner("ibt-percentage-table-label-1").replace("%", "");
          d.persentaseAkhir = getInner("ibt-percentage-table-label-2").replace("%", "");
        },
      }
    });
  }

  function initializeIBTSelect2() {
    $(".select2-ibt").select2({
      ajax: {
        url: urlAPIBebanIBTSelect2,
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
      templateResult: formatBebanIBT,
      templateSelection: formatTemplateSelection,
      escapeMarkup: (m) => m
    });

    $(".select2-satuan-ibt").select2({
      ajax: {
        url: urlAPISatuanIBTSelect2,
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
      templateResult: formatSatuanIBT,
      templateSelection: formatTemplateSelection,
      escapeMarkup: (m) => m
    });
  }

  const formatBebanIBT = (result) => formatTemplateResult(result, 'beban-ibt');
  const formatSatuanIBT = (result) => formatTemplateResult(result, 'satuan-ibt');

  /** Read */
  async function refreshIBTDailyChartData() {
    let params = {
      ibt: getValue('ibt-daily'),
      satuan: getValue('ibt-satuan-daily')
    };
    let datasets = [];

    for (let i = 1; i <= 5; i++) {
      if (getValue(`ibt-tanggal-daily-${i}`)) {
        const daily1Data = await getAndGenerateIBTDailyChartData(params, `ibt-tanggal-daily-${i}`);
        if (!isChecked(`ibt-tanggal-daily-${i}-checkbox`)) daily1Data.shift();
        datasets = [...datasets, ...daily1Data];
      }
    }

    ibtDailyChart.data.datasets = datasets;
    ibtDailyChart.update();
  }

  async function getAndGenerateIBTDailyChartData(params, dateElementID) {
    return new Promise(async (resolve, reject) => {
      params.tanggal = getValue(dateElementID);
      let firstDateData = await getIBTDailyChartData(params);

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

  async function getIBTDailyChartData({
    ibt,
    satuan,
    tanggal,
    url
  }) {
    return await crud.read({
      url: `${urlAPIIBTDailyChart}?ibt=${ibt}&satuan=${satuan}&tanggal=${tanggal}`
    });
  }

  async function refreshIBTMonthlyChartData() {
    let params = {
      ibt: getValue('ibt-monthly'),
      satuan: getValue('ibt-satuan-monthly')
    };
    let datasets = [];

    for (let i = 1; i <= 5; i++) {
      if (getValue(`ibt-tanggal-monthly-${i}`)) {
        const data = await getAndGenerateIBTMonthlyChartData(params, `ibt-tanggal-monthly-${i}`);
        if (!isChecked(`ibt-tanggal-monthly-${i}-checkbox`)) data.shift();
        datasets = [...datasets, ...data];
      }
    }

    ibtMonthlyChart.data.datasets = datasets;
    ibtMonthlyChart.update();
  }

  async function getAndGenerateIBTMonthlyChartData(params, dateElementID) {
    return new Promise(async (resolve, reject) => {
      [params.bulan, params.tahun] = getValue(dateElementID).split("-");
      let data = await getIBTMonthlyChartData(params);

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

  async function getIBTMonthlyChartData({
    ibt,
    satuan,
    bulan,
    tahun
  }) {
    return await crud.read({
      url: `${urlAPIIBTMonthlyChart}?ibt=${ibt}&satuan=${satuan}&bulan=${bulan}&tahun=${tahun}`
    });
  }

  async function refreshIBTYearlyChartData() {
    let params = {
      ibt: getValue('ibt-yearly'),
      satuan: getValue('ibt-satuan-yearly')
    };
    let datasets = [];

    for (let i = 1; i <= 5; i++) {
      if (getValue(`ibt-tanggal-yearly-${i}`)) {
        const data = await getAndGenerateIBTYearlyChartData(params, `ibt-tanggal-yearly-${i}`);
        if (!isChecked(`ibt-tanggal-yearly-${i}-checkbox`)) data.shift();
        datasets = [...datasets, ...data];
      }
    }

    ibtYearlyChart.data.datasets = datasets;
    ibtYearlyChart.update();
  }

  async function getAndGenerateIBTYearlyChartData(params, dateElementID) {
    return new Promise(async (resolve, reject) => {
      params.tahun = getValue(dateElementID);
      let data = await getIBTYearlyChartData(params);

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

  async function getIBTYearlyChartData({
    ibt,
    satuan,
    tahun
  }) {
    return await crud.read({
      url: `${urlAPIIBTYearlyChart}?ibt=${ibt}&satuan=${satuan}&tahun=${tahun}`
    });
  }

  // Daily
  function downloadIBTDailyXLSX() {
    const mainFilter = `ibt=${getValue("ibt-daily")}&satuan=${getValue("ibt-satuan-daily")}`;
    const dateData = `${generateIBTDateDaily()}`;
    const isWithPlanData = `${generateIBTIsWithPlanDaily()}`;
    const url = `${urlAPIIBTDailyExport}?${mainFilter}${dateData}${isWithPlanData}`;
    window.open(url);
  }

  function generateIBTDateDaily() {
    let dateData = "";

    for (let i = 1; i <= 5; i++) {
      const date = getValue(`ibt-tanggal-daily-${i}`);
      if (date) dateData += `&date${i}=${date}`;
    }

    return dateData;
  }

  function generateIBTIsWithPlanDaily() {
    let isWithPlan = "";

    for (let i = 1; i <= 5; i++) {
      const isWithPlanCheck = getElement(`ibt-tanggal-daily-${i}-checkbox`).checked;
      if (isWithPlanCheck) isWithPlan += `&isWithPlan${i}=${isWithPlanCheck}`;
    }

    return isWithPlan;
  }

  // Monthly
  function downloadIBTMonthlyXLSX() {
    const mainFilter = `ibt=${getValue("ibt-monthly")}&satuan=${getValue("ibt-satuan-monthly")}`;
    const dateData = `${generateIBTDateMonthly()}`;
    const isWithPlanData = `${generateIBTIsWithPlanMonthly()}`;
    const url = `${urlAPIIBTMonthlyExport}?${mainFilter}${dateData}${isWithPlanData}`;
    window.open(url);
  }

  function generateIBTDateMonthly() {
    let dateData = "";

    for (let i = 1; i <= 5; i++) {
      const date = getValue(`ibt-tanggal-monthly-${i}`);
      const [month, year] = date.split("-");
      if (date) dateData += `&date${i}=${year}-${month}`;
    }

    return dateData;
  }

  function generateIBTIsWithPlanMonthly() {
    let isWithPlan = "";

    for (let i = 1; i <= 5; i++) {
      const isWithPlanCheck = getElement(`ibt-tanggal-monthly-${i}-checkbox`).checked;
      if (isWithPlanCheck) isWithPlan += `&isWithPlan${i}=${isWithPlanCheck}`;
    }

    return isWithPlan;
  }

  // Yearly
  function downloadIBTYearlyXLSX() {
    const mainFilter = `ibt=${getValue("ibt-yearly")}&satuan=${getValue("ibt-satuan-yearly")}`;
    const dateData = `${generateIBTDateYearly()}`;
    const isWithPlanData = `${generateIBTIsWithPlanYearly()}`;
    const url = `${urlAPIIBTYearlyExport}?${mainFilter}${dateData}${isWithPlanData}`;
    window.open(url);
  }

  function generateIBTDateYearly() {
    let dateData = "";

    for (let i = 1; i <= 5; i++) {
      const date = getValue(`ibt-tanggal-yearly-${i}`);
      if (date) dateData += `&date${i}=${date}`;
    }

    return dateData;
  }

  function generateIBTIsWithPlanYearly() {
    let isWithPlan = "";

    for (let i = 1; i <= 5; i++) {
      const isWithPlanCheck = getElement(`ibt-tanggal-yearly-${i}-checkbox`).checked;
      if (isWithPlanCheck) isWithPlan += `&isWithPlan${i}=${isWithPlanCheck}`;
    }

    return isWithPlan;
  }

  // Pemantauan
  function downloadIBTPemantauanXLSX() {
    const mainFilter = `nama=${getValue("ibt-table")}`;
    const dateData = `${generateIBTDatePemantauan()}`;
    const rangeData = `${generateIBTRangePemantauan()}`;
    const url = `${urlAPIIBTPemantauanExport}?${mainFilter}${dateData}${rangeData}`;
    window.open(url);
  }

  function generateIBTDatePemantauan() {
    const tanggalAwal = ibtStartDate.format("YYYY-MM-DD");
    const tanggalAkhir = ibtEndDate.format("YYYY-MM-DD");

    return `&tanggalAwal=${tanggalAwal}&tanggalAkhir=${tanggalAkhir}`;
  }

  function generateIBTRangePemantauan() {
    const persentaseAwal = getInner("ibt-percentage-table-label-1").replace("%", "");
    const persentaseAkhir = getInner("ibt-percentage-table-label-2").replace("%", "");

    return `&rangeAwal=${persentaseAwal}&rangeAkhir=${persentaseAkhir}`;
  }
</script>