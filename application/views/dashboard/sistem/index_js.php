<script>
  const urlAPISistemDailyChart = "<?php echo base_url('api/graph/get-beban-sistem-daily'); ?>";
  const urlAPISistemMonthlyChart = "<?php echo base_url('api/graph/get-beban-sistem-monthly'); ?>";
  const urlAPISistemYearlyChart = "<?php echo base_url('api/graph/get-beban-sistem-yearly'); ?>";
  const urlAPIBebanSistemSelect2 = "<?php echo base_url('api/select2/beban-sistem'); ?>";
  let sistemDailyChart = document.getElementById('sistem-daily-chart');
  let sistemMonthlyChart = document.getElementById('sistem-monthly-chart');
  let sistemYearlyChart = document.getElementById('sistem-yearly-chart');
  let sistemStartDate = "";
  let sistemEndDate = "";

  // /** Initialize Data */
  async function initializeSistemData() {
    await initializeSistemSelect2Default();
    initializeSistemDailyChart();
    initializeSistemMonthlyChart();
    initializeSistemYearlyChart();
    initializeSistemSelect2();
  };

  async function initializeSistemSelect2Default() {
    await getDefaultSelect2({
      id: 'sistem-daily-default',
      url: `${urlAPIBebanSistemSelect2}`
    });

    await getDefaultSelect2({
      id: 'sistem-monthly-default',
      url: `${urlAPIBebanSistemSelect2}`
    });

    await getDefaultSelect2({
      id: 'sistem-yearly-default',
      url: `${urlAPIBebanSistemSelect2}`
    });
  }

  function initializeSistemDailyChart() {
    sistemDailyChart = new Chart(sistemDailyChart, {
      type: 'line',
      data: {
        labels: generateDailyLabels()
      },
      options: getDailyOptions()
    });
  }

  function initializeSistemMonthlyChart() {
    sistemMonthlyChart = new Chart(sistemMonthlyChart, {
      type: 'line',
      data: {
        labels: generateMonthlyLabels()
      },
      options: getStandardOptions()
    });
  }

  function initializeSistemYearlyChart() {
    sistemYearlyChart = new Chart(sistemYearlyChart, {
      type: 'line',
      data: {
        labels: generateYearlyLabels()
      },
      options: getStandardOptions()
    });
  }

  function initializeSistemSelect2() {
    $(".select2-sistem").select2({
      ajax: {
        url: urlAPIBebanSistemSelect2,
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
      templateResult: formatBebanSistem,
      templateSelection: formatTemplateSelection,
      escapeMarkup: (m) => m
    });
  }

  const formatBebanSistem = (result) => formatTemplateResult(result, 'beban-sistem');

  // /** Read */
  async function refreshSistemDailyChartData() {
    let params = {
      sistem: getValue('sistem-daily')
    };
    let datasets = [];

    for (let i = 1; i <= 5; i++) {
      if (getValue(`sistem-tanggal-daily-${i}`)) {
        const daily1Data = await getAndGenerateSistemDailyChartData(params, `sistem-tanggal-daily-${i}`);
        if (!isChecked(`sistem-tanggal-daily-${i}-checkbox`)) daily1Data.shift();
        datasets = [...datasets, ...daily1Data];
      }
    }

    sistemDailyChart.data.datasets = datasets;
    sistemDailyChart.update();
  }

  async function getAndGenerateSistemDailyChartData(params, dateElementID) {
    return new Promise(async (resolve, reject) => {
      params.tanggal = getValue(dateElementID);
      let firstDateData = await getSistemDailyChartData(params);

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

  async function getSistemDailyChartData({
    sistem,
    tanggal
  }) {
    return await crud.read({
      url: `${urlAPISistemDailyChart}?sistem=${sistem}&tanggal=${tanggal}`
    });
  }

  async function refreshSistemMonthlyChartData() {
    let params = {
      sistem: getValue('sistem-monthly')
    };
    let datasets = [];

    for (let i = 1; i <= 5; i++) {
      if (getValue(`sistem-tanggal-monthly-${i}`)) {
        const data = await getAndGenerateSistemMonthlyChartData(params, `sistem-tanggal-monthly-${i}`);
        if (!isChecked(`sistem-tanggal-monthly-${i}-checkbox`)) data.shift();
        datasets = [...datasets, ...data];
      }
    }

    sistemMonthlyChart.data.datasets = datasets;
    sistemMonthlyChart.update();
  }

  async function getAndGenerateSistemMonthlyChartData(params, dateElementID) {
    return new Promise(async (resolve, reject) => {
      [params.bulan, params.tahun] = getValue(dateElementID).split("-");
      let data = await getSistemMonthlyChartData(params);

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

  async function getSistemMonthlyChartData({
    sistem,
    bulan,
    tahun
  }) {
    return await crud.read({
      url: `${urlAPISistemMonthlyChart}?sistem=${sistem}&bulan=${bulan}&tahun=${tahun}`
    });
  }

  async function refreshSistemYearlyChartData() {
    let params = {
      sistem: getValue('sistem-yearly')
    };
    let datasets = [];

    for (let i = 1; i <= 5; i++) {
      if (getValue(`sistem-tanggal-yearly-${i}`)) {
        const data = await getAndGenerateSistemYearlyChartData(params, `sistem-tanggal-yearly-${i}`);
        if (!isChecked(`sistem-tanggal-yearly-${i}-checkbox`)) data.shift();
        datasets = [...datasets, ...data];
      }
    }

    sistemYearlyChart.data.datasets = datasets;
    sistemYearlyChart.update();
  }

  async function getAndGenerateSistemYearlyChartData(params, dateElementID) {
    return new Promise(async (resolve, reject) => {
      params.tahun = getValue(dateElementID);
      let data = await getSistemYearlyChartData(params);

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

  async function getSistemYearlyChartData({
    sistem,
    tahun
  }) {
    return await crud.read({
      url: `${urlAPISistemYearlyChart}?sistem=${sistem}&tahun=${tahun}`
    });
  }
</script>