<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.2/papaparse.min.js"></script>

<script>
  const urlAPIMain = "<?= base_url("api/tegangan-realisasi"); ?>";
  const urlAPICountByDate = "<?= base_url("api/utilities/get-beban-tegangan-realisasi-by-date-count"); ?>";
  const urlAPIDeleteByDate = "<?= base_url("api/utilities/delete-tegangan-realisasi-by-date"); ?>";
  const urlAPIMainDatatable = "<?php echo base_url('api/datatable/tegangan-realisasi'); ?>";
  let mainDatatable = document.getElementById("main-datatable");
  let startDate;
  let endDate;
  let crud;

  window.onload = () => getData();

  async function getData() {
    try {
      crud = new LimCRUD();

      await initializeDateRangePicker();
      initializeDatatable();
    } catch (error) {
      openFail(error);
    };
  };

  async function initializeDateRangePicker() {
    $('#f-date-range').daterangepicker({
      autoUpdateInput: false,
      locale: {
        cancelLabel: 'Clear'
      }
    }, function(start, end, label) {
      startDate = start;
      endDate = end;

      mainDatatable.ajax.reload();
    });

    $('#f-date-range').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('YYYY/MM/DD') + ' - ' + picker.endDate.format('YYYY/MM/DD'));
    });
  }

  function initializeDatatable(isReinitialize) {
    mainDatatable = $('#main-datatable').DataTable({
      "responsive": true,
      "order": [
        [0, 'desc']
      ],
      "pagingType": "full_numbers",
      "language": defaultLanguageDatatableProperties,
      "columnDefs": [{
          "defaultContent": "-",
          "targets": "_all"
        },
        generateUnorderableColDatatable(1, 2),
        generateCenteredColDatatable(1, 2),
        {
          "targets": [0],
          "render": function(data, type, row, meta) {
            return generateInfo(row);
          }
        },
        {
          "targets": [1],
          "render": function(data, type, row, meta) {
            return generateStatus(row.status);
          }
        },
        {
          "targets": [2],
          "render": function(data, type, row, meta) {
            return generateButtons(row);
          }
        }
      ],
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": urlAPIMainDatatable,
        "data": function(d) {
          d.tanggalAwal = startDate ? startDate.format("YYYY-MM-DD") : null;
          d.tanggalAkhir = endDate ? endDate.format("YYYY-MM-DD") : null;
        }
      }
    });
  }

  function generateInfo(data) {
    return `
      <small class="text-muted"><em>${data.tanggal}</em></small><br>
      <strong style="text-transform:uppercase">${data.gardu_induk}</strong><br>
      <small>Busbar: ${data.busbar}</small><br>
      <small>kV: ${data.kv}</small><br>
      <small id="toggler-${data.data_id}"><a href="javascript:void(0)" onclick="showDetail(${data.data_id})">Tampilkan Detail</a></small>
      ${generateDetail(data)}
    `;
  }

  function generateDetail(data) {
    return `
      <div id="detail-${data.data_id}" style="display:none">
        <small>Dibuat Pada: ${data.created_at_string}</small><br>
        <small>Diubah Pada: ${data.updated_at_string}</small><br>

        <div style="overflow-x: scroll; max-width:700px">
          <table class="table table-bordered my-2">
            <tbody>
              ${generateDetailTitle()}
              ${generateDetailContent(data)}
            </tbody>
          </table>
        </div>
        
        <small><a href="javascript:void(0)" onclick="hideDetail(${data.data_id})">Sembunyikan Detail</a></small>
      </div>
    `;
  }

  function showDetail(id) {
    show(`detail-${id}`);
    hide(`toggler-${id}`);
  }

  function hideDetail(id) {
    hide(`detail-${id}`);
    show(`toggler-${id}`);
  }

  function generateDetailTitle() {
    return `
      <tr>
        <td><small>00:30</small></td>
        <td><small>01:00</small></td>
        <td><small>01:30</small></td>
        <td><small>02:00</small></td>
        <td><small>02:30</small></td>
        <td><small>03:00</small></td>
        <td><small>03:30</small></td>
        <td><small>04:00</small></td>
        <td><small>04:30</small></td>
        <td><small>05:00</small></td>
        <td><small>05:30</small></td>
        <td><small>06:00</small></td>
        <td><small>06:30</small></td>
        <td><small>07:00</small></td>
        <td><small>07:30</small></td>
        <td><small>08:00</small></td>
        <td><small>08:30</small></td>
        <td><small>09:00</small></td>
        <td><small>09:30</small></td>
        <td><small>10:00</small></td>
        <td><small>10:30</small></td>
        <td><small>11:00</small></td>
        <td><small>11:30</small></td>
        <td><small>12:00</small></td>
        <td><small>12:30</small></td>
        <td><small>13:00</small></td>
        <td><small>13:30</small></td>
        <td><small>14:00</small></td>
        <td><small>14:30</small></td>
        <td><small>15:00</small></td>
        <td><small>15:30</small></td>
        <td><small>16:00</small></td>
        <td><small>16:30</small></td>
        <td><small>17:00</small></td>
        <td><small>17:30</small></td>
        <td><small>18:00</small></td>
        <td><small>18:30</small></td>
        <td><small>19:00</small></td>
        <td><small>19:30</small></td>
        <td><small>20:00</small></td>
        <td><small>20:30</small></td>
        <td><small>21:00</small></td>
        <td><small>21:30</small></td>
        <td><small>22:00</small></td>
        <td><small>22:30</small></td>
        <td><small>23:00</small></td>
        <td><small>23:30</small></td>
        <td><small>24:00</small></td>
      </tr>
    `;
  }

  function generateDetailContent(data) {
    return `
      <tr>
        <td><small><strong>${data.eval_0030}</strong></small></td>
        <td><small><strong>${data.eval_0100}</strong></small></td>
        <td><small><strong>${data.eval_0130}</strong></small></td>
        <td><small><strong>${data.eval_0200}</strong></small></td>
        <td><small><strong>${data.eval_0230}</strong></small></td>
        <td><small><strong>${data.eval_0300}</strong></small></td>
        <td><small><strong>${data.eval_0330}</strong></small></td>
        <td><small><strong>${data.eval_0400}</strong></small></td>
        <td><small><strong>${data.eval_0430}</strong></small></td>
        <td><small><strong>${data.eval_0500}</strong></small></td>
        <td><small><strong>${data.eval_0530}</strong></small></td>
        <td><small><strong>${data.eval_0600}</strong></small></td>
        <td><small><strong>${data.eval_0630}</strong></small></td>
        <td><small><strong>${data.eval_0700}</strong></small></td>
        <td><small><strong>${data.eval_0730}</strong></small></td>
        <td><small><strong>${data.eval_0800}</strong></small></td>
        <td><small><strong>${data.eval_0830}</strong></small></td>
        <td><small><strong>${data.eval_0900}</strong></small></td>
        <td><small><strong>${data.eval_0930}</strong></small></td>
        <td><small><strong>${data.eval_1000}</strong></small></td>
        <td><small><strong>${data.eval_1030}</strong></small></td>
        <td><small><strong>${data.eval_1100}</strong></small></td>
        <td><small><strong>${data.eval_1130}</strong></small></td>
        <td><small><strong>${data.eval_1200}</strong></small></td>
        <td><small><strong>${data.eval_1230}</strong></small></td>
        <td><small><strong>${data.eval_1300}</strong></small></td>
        <td><small><strong>${data.eval_1330}</strong></small></td>
        <td><small><strong>${data.eval_1400}</strong></small></td>
        <td><small><strong>${data.eval_1430}</strong></small></td>
        <td><small><strong>${data.eval_1500}</strong></small></td>
        <td><small><strong>${data.eval_1530}</strong></small></td>
        <td><small><strong>${data.eval_1600}</strong></small></td>
        <td><small><strong>${data.eval_1630}</strong></small></td>
        <td><small><strong>${data.eval_1700}</strong></small></td>
        <td><small><strong>${data.eval_1730}</strong></small></td>
        <td><small><strong>${data.eval_1800}</strong></small></td>
        <td><small><strong>${data.eval_1830}</strong></small></td>
        <td><small><strong>${data.eval_1900}</strong></small></td>
        <td><small><strong>${data.eval_1930}</strong></small></td>
        <td><small><strong>${data.eval_2000}</strong></small></td>
        <td><small><strong>${data.eval_2030}</strong></small></td>
        <td><small><strong>${data.eval_2100}</strong></small></td>
        <td><small><strong>${data.eval_2130}</strong></small></td>
        <td><small><strong>${data.eval_2200}</strong></small></td>
        <td><small><strong>${data.eval_2230}</strong></small></td>
        <td><small><strong>${data.eval_2300}</strong></small></td>
        <td><small><strong>${data.eval_2330}</strong></small></td>
        <td><small><strong>${data.eval_2400}</strong></small></td>
      </tr>
    `;
  }

  function generateStatus(data) {
    return data == 1 ? "<i class='bx bx-check text-success'></i>" : "<i class='bx bx-x text-danger'></i>";
  }

  function generateButtons(data) {
    return `
      ${generateEditButtonLink(`<?= base_url('tegangan/edit_eval'); ?>/${data.data_id}`)}
      ${generateDeleteButtonLink(`<?= base_url('tegangan/del_eval'); ?>/${data.data_id}`)}
    `;
  }

  /** Create */
  function showImportForm() {
    show("import-card");
    hide("main-toolbar");
  }

  function hideImportForm() {
    hide("import-card");
    show("main-toolbar");
  }

  async function postMain() {
    try {
      await validatePostForm();
      const data = await crud.read({
        url: `${urlAPICountByDate}?date=${getValue("tanggal")}`
      });

      if (parseInt(data)) {
        showConfirmationAlert();
      } else {
        importCSV();
      }
    } catch (error) {
      openFail(error);
    }
  }

  async function validatePostForm() {
    return new Promise((resolve, reject) => {
      if (!getElement("tanggal").value) reject("Tanggal harus diisi.");
      if (!getElement("file").value) reject("File harus diisi.");

      resolve(true);
    })
  }

  function showConfirmationAlert() {
    Swal.fire({
      showDenyButton: true,
      showCancelButton: false,
      confirmButtonText: 'Replace',
      denyButtonText: `Don't save`,
      title: 'Data Exist!',
      text: 'Data is already exist. Do you want to replace the data?'
    }).then((result) => {
      if (result.isConfirmed) importCSV();
    });
  }

  async function importCSV() {
    Papa.parse(getElement("file").files[0], {
      complete: function(results) {
        importData(results.data);
      }
    });
  }

  async function importData(data) {
    $("#modal-proses").modal("show");
    fillProgress(0);

    const totalData = data.length;
    let processed = 0;

    for (let i = 0; i < data.length; i++) {
      processed++;
      fillProgress(Math.round(processed / totalData * 100));

      if (i === 0) continue;
      if (!data[i][0]) continue;

      await postData({
        name: data[i][1],
        kv: data[i][3],
        busbar: data[i][2],
        status: data[i][52],
        username: "<?= $this->fungsi->user_login()->name ?>",
        tanggal: getValue("tanggal"),
        at0030: data[i][4],
        at0100: data[i][5],
        at0130: data[i][6],
        at0200: data[i][7],
        at0230: data[i][8],
        at0300: data[i][9],
        at0330: data[i][10],
        at0400: data[i][11],
        at0430: data[i][12],
        at0500: data[i][13],
        at0530: data[i][14],
        at0600: data[i][15],
        at0630: data[i][16],
        at0700: data[i][17],
        at0730: data[i][18],
        at0800: data[i][19],
        at0830: data[i][20],
        at0900: data[i][21],
        at0930: data[i][22],
        at1000: data[i][23],
        at1030: data[i][24],
        at1100: data[i][25],
        at1130: data[i][26],
        at1200: data[i][27],
        at1230: data[i][28],
        at1300: data[i][29],
        at1330: data[i][30],
        at1400: data[i][31],
        at1430: data[i][32],
        at1500: data[i][33],
        at1530: data[i][34],
        at1600: data[i][35],
        at1630: data[i][36],
        at1700: data[i][37],
        at1730: data[i][38],
        at1800: data[i][39],
        at1830: data[i][40],
        at1900: data[i][41],
        at1930: data[i][42],
        at2000: data[i][43],
        at2030: data[i][44],
        at2100: data[i][45],
        at2130: data[i][46],
        at2200: data[i][47],
        at2230: data[i][48],
        at2300: data[i][49],
        at2330: data[i][50],
        at2400: data[i][51]
      });
    }

    setTimeout(() => {
      $("#modal-proses").modal("hide");
      openSuccess("Berhasil mengimpor data!");
      mainDatatable.ajax.reload();
    }, 1000);
  }

  async function postData(data) {
    const response = await crud.create({
      url: urlAPIMain,
      data: data,
      name: "realisasi tegangan"
    });

    if (!response.success) throw response.message;

    return true;
  }

  /** Delete */
  function showDeleteForm() {
    show("delete-card");
    hide("main-toolbar");
  }

  function hideDeleteForm() {
    hide("delete-card");
    show("main-toolbar");
  }

  async function postDelete() {
    try {
      await validateDeleteForm();

      $("#modal-proses").modal("show");
      fillProgress(0);

      await deleteDataByDate({
        date: getValue("dc-tanggal")
      });

      fillProgress(100);

      setTimeout(() => {
        $("#modal-proses").modal("hide");
        openSuccess("Berhasil menghapus data!");
        mainDatatable.ajax.reload();
      }, 1000);
    } catch (error) {
      openFail(error);
    }
  }

  async function validateDeleteForm() {
    return new Promise((resolve, reject) => {
      if (!getElement("dc-tanggal").value) reject("Tanggal harus diisi.");

      resolve(true);
    })
  }

  async function deleteDataByDate(data) {
    const response = await crud.delete({
      url: urlAPIDeleteByDate,
      data: data,
      name: "realisasi tegangan"
    });

    if (!response.success) throw response.message;

    return true;
  }

  /** Others */
  function fillProgress(percentage) {
    fillInner("mp-loading-text", percentage + "%");
    getElement("mp-loading-progress").style.width = percentage + "%";
    getElement("mp-loading-progress").setAttribute("aria-valuenow", percentage);
  }
</script>