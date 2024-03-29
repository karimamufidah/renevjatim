<script>
  const urlAPIPembangkitDailyChart = "<?php echo base_url('api/graph/get-beban-pembangkit-daily'); ?>";
  const urlAPIPembangkitMonthlyChart = "<?php echo base_url('api/graph/get-beban-pembangkit-monthly'); ?>";
  const urlAPIPembangkitYearlyChart = "<?php echo base_url('api/graph/get-beban-pembangkit-yearly'); ?>";
  const urlAPIBebanPembangkitSelect2 = "<?php echo base_url('api/select2/beban-pembangkit'); ?>";
  const urlAPISatuanPembangkitSelect2 = "<?php echo base_url('api/select2/satuan-pembangkit'); ?>";
  const urlAPIPembangkitHighestThisMonth = "<?php echo base_url('api/panel/get-highest-pembangkit-this-month-panel'); ?>";
  const urlAPIPembangkitHighestThisYear = "<?php echo base_url('api/panel/get-highest-pembangkit-this-year-panel'); ?>";
  const urlAPIPembangkitHighestThisAllTime = "<?php echo base_url('api/panel/get-highest-pembangkit-all-time-panel'); ?>";
  const urlAPIPembangkitDailyExport = "<?php echo base_url('export/xlsx-pembangkit'); ?>";
  const urlAPIPembangkitMonthlyExport = "<?php echo base_url('export/monthly/xlsx-pembangkit'); ?>";
  const urlAPIPembangkitYearlyExport = "<?php echo base_url('export/yearly/xlsx-pembangkit'); ?>";
  let pembangkitDailyChart = document.getElementById('pembangkit-daily-chart');
  let pembangkitMonthlyChart = document.getElementById('pembangkit-monthly-chart');
  let pembangkitYearlyChart = document.getElementById('pembangkit-yearly-chart');

  /** Initialize Data */
  async function initializePembangkitData() {
    await initializePembangkitSelect2Default();
    await getAndFillPembangkitPanelData();
    await initializePembangkitDailyChart();
    await initializePembangkitMonthlyChart();
    await initializePembangkitYearlyChart();
    await initializePembangkitSelect2();
  };

  async function initializePembangkitSelect2Default() {
    await getDefaultSelect2({
      id: 'pembangkit-panel-default',
      url: `${urlAPIBebanPembangkitSelect2}`
    });

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

  async function getAndFillPembangkitPanelData() {
    await getAndFillPembangkitHighestThisMonthPanel();
    await getAndFillPembangkitHighestThisYearPanel();
    await getAndFillPembangkitHighestAllTimePanel();
  }

  async function getAndFillPembangkitHighestThisMonthPanel() {
    const data = await crud.read({
      url: `${urlAPIPembangkitHighestThisMonth}?nama=${getValue("pembangkit-panel")}`
    });

    fillInner("pembangkit-highest-this-month", `${data.value} MW`);
    fillInner("pembangkit-highest-this-month-datetime", getDateFormatOptions(data.logged_at));
  }

  async function getAndFillPembangkitHighestThisYearPanel() {
    const data = await crud.read({
      url: `${urlAPIPembangkitHighestThisYear}?nama=${getValue("pembangkit-panel")}`
    });

    fillInner("pembangkit-highest-this-year", `${data.value} MW`);
    fillInner("pembangkit-highest-this-year-datetime", getDateFormatOptions(data.logged_at));
  }

  async function getAndFillPembangkitHighestAllTimePanel() {
    const data = await crud.read({
      url: `${urlAPIPembangkitHighestThisAllTime}?nama=${getValue("pembangkit-panel")}`
    });

    fillInner("pembangkit-highest-all-time", `${data.value} MW`);
    fillInner("pembangkit-highest-all-time-datetime", getDateFormatOptions(data.logged_at));
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

  // Monthly
  function downloadPembangkitMonthlyXLSX() {
    const mainFilter = `pembangkit=${getValue("pembangkit-monthly")}&satuan=${getValue("pembangkit-satuan-monthly")}`;
    const dateData = `${generatePembangkitDateMonthly()}`;
    const isWithPlanData = `${generatePembangkitIsWithPlanMonthly()}`;
    const url = `${urlAPIPembangkitMonthlyExport}?${mainFilter}${dateData}${isWithPlanData}`;
    window.open(url);
  }

  function generatePembangkitDateMonthly() {
    let dateData = "";

    for (let i = 1; i <= 5; i++) {
      const date = getValue(`pembangkit-tanggal-monthly-${i}`);
      const [month, year] = date.split("-");
      if (date) dateData += `&date${i}=${year}-${month}`;
    }

    return dateData;
  }

  function generatePembangkitIsWithPlanMonthly() {
    let isWithPlan = "";

    for (let i = 1; i <= 5; i++) {
      const isWithPlanCheck = getElement(`pembangkit-tanggal-monthly-${i}-checkbox`).checked;
      if (isWithPlanCheck) isWithPlan += `&isWithPlan${i}=${isWithPlanCheck}`;
    }

    return isWithPlan;
  }

  // Yearly
  function downloadPembangkitYearlyXLSX() {
    const mainFilter = `pembangkit=${getValue("pembangkit-yearly")}&satuan=${getValue("pembangkit-satuan-yearly")}`;
    const dateData = `${generatePembangkitDateYearly()}`;
    const isWithPlanData = `${generatePembangkitIsWithPlanYearly()}`;
    const url = `${urlAPIPembangkitYearlyExport}?${mainFilter}${dateData}${isWithPlanData}`;
    window.open(url);
  }

  function generatePembangkitDateYearly() {
    let dateData = "";

    for (let i = 1; i <= 5; i++) {
      const date = getValue(`pembangkit-tanggal-yearly-${i}`);
      if (date) dateData += `&date${i}=${date}`;
    }

    return dateData;
  }

  function generatePembangkitIsWithPlanYearly() {
    let isWithPlan = "";

    for (let i = 1; i <= 5; i++) {
      const isWithPlanCheck = getElement(`pembangkit-tanggal-yearly-${i}-checkbox`).checked;
      if (isWithPlanCheck) isWithPlan += `&isWithPlan${i}=${isWithPlanCheck}`;
    }

    return isWithPlan;
  }
</script>