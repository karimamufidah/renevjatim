<script>
  let crud;

  /** Initialize Data */
  window.onload = () => {
    crud = new LimCRUD();
    initializeDatePicker();
    initializePenghantarData();
    initializeIBTData();
    initializePembangkitData();
    initializeTrafoData();
    initializeSistemData();
    initializeSubsistemData();
    initializeTeganganData();
  };

  /** General */
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

  const isChecked = elementID => document.getElementById(elementID).checked;

  function generateDailyLabels() {
    let labels = [];

    for (let i = 0; i <= 24; i++) {
      const hourString = i < 10 ? `0${i}` : i;


      if (i !== 0) labels.push(`${hourString}.00`);
      if (i !== 24) labels.push(`${hourString}.30`);
    }

    return labels;
  }

  function generateMonthlyLabels() {
    let labels = [];

    for (let i = 1; i <= 31; i++) labels.push(i);

    return labels;
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

  function getDailyOptions() {
    return {
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
    };
  }

  function getStandardOptions() {
    return {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    };
  }

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