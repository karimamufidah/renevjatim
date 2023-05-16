<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  const urlAPIMainDatatable = "<?php echo base_url('api/datatable/subsistem-realisasi'); ?>";
  let mainDatatable = document.getElementById("main-datatable");
  let startDate;
  let endDate;

  window.onload = () => getData();

  async function getData() {
    try {
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
      <strong style="text-transform:uppercase">${data.subsistem}</strong><br>
      <small>Pasokan: ${data.pasokan}</small><br>
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
      ${generateEditButtonLink(`<?= base_url('beban_sistem/edit_subsistem_eval'); ?>/${data.data_id}`)}
      ${generateDeleteButtonLink(`<?= base_url('beban_sistem/del_subsistem_eval'); ?>/${data.data_id}`)}
    `;
  }
</script>