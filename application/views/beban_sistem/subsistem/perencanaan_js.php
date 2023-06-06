<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
  const urlAPISubsystemSupplyFilterSelect2 = "<?php echo base_url('api/select2/pasokan-subsistem-filter'); ?>";
  const urlAPIMainDatatable = "<?php echo base_url('api/datatable/subsistem-perencanaan'); ?>";
  let mainDatatable = document.getElementById("main-datatable");
  let startDate;
  let endDate;

  window.onload = () => getData();

  async function getData() {
    try {
      await initializeDateRangePicker();
      await initializeSelect2Default();
      initializeDatatable();
      initializeSelect2();
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

  async function initializeSelect2Default() {
    await getDefaultSelect2({
      id: 'f-supply-default',
      url: `${urlAPISubsystemSupplyFilterSelect2}`
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
          d.pasokan = getValue("f-supply");
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
        <td><small><strong>${data.ren_0030}</strong></small></td>
        <td><small><strong>${data.ren_0100}</strong></small></td>
        <td><small><strong>${data.ren_0130}</strong></small></td>
        <td><small><strong>${data.ren_0200}</strong></small></td>
        <td><small><strong>${data.ren_0230}</strong></small></td>
        <td><small><strong>${data.ren_0300}</strong></small></td>
        <td><small><strong>${data.ren_0330}</strong></small></td>
        <td><small><strong>${data.ren_0400}</strong></small></td>
        <td><small><strong>${data.ren_0430}</strong></small></td>
        <td><small><strong>${data.ren_0500}</strong></small></td>
        <td><small><strong>${data.ren_0530}</strong></small></td>
        <td><small><strong>${data.ren_0600}</strong></small></td>
        <td><small><strong>${data.ren_0630}</strong></small></td>
        <td><small><strong>${data.ren_0700}</strong></small></td>
        <td><small><strong>${data.ren_0730}</strong></small></td>
        <td><small><strong>${data.ren_0800}</strong></small></td>
        <td><small><strong>${data.ren_0830}</strong></small></td>
        <td><small><strong>${data.ren_0900}</strong></small></td>
        <td><small><strong>${data.ren_0930}</strong></small></td>
        <td><small><strong>${data.ren_1000}</strong></small></td>
        <td><small><strong>${data.ren_1030}</strong></small></td>
        <td><small><strong>${data.ren_1100}</strong></small></td>
        <td><small><strong>${data.ren_1130}</strong></small></td>
        <td><small><strong>${data.ren_1200}</strong></small></td>
        <td><small><strong>${data.ren_1230}</strong></small></td>
        <td><small><strong>${data.ren_1300}</strong></small></td>
        <td><small><strong>${data.ren_1330}</strong></small></td>
        <td><small><strong>${data.ren_1400}</strong></small></td>
        <td><small><strong>${data.ren_1430}</strong></small></td>
        <td><small><strong>${data.ren_1500}</strong></small></td>
        <td><small><strong>${data.ren_1530}</strong></small></td>
        <td><small><strong>${data.ren_1600}</strong></small></td>
        <td><small><strong>${data.ren_1630}</strong></small></td>
        <td><small><strong>${data.ren_1700}</strong></small></td>
        <td><small><strong>${data.ren_1730}</strong></small></td>
        <td><small><strong>${data.ren_1800}</strong></small></td>
        <td><small><strong>${data.ren_1830}</strong></small></td>
        <td><small><strong>${data.ren_1900}</strong></small></td>
        <td><small><strong>${data.ren_1930}</strong></small></td>
        <td><small><strong>${data.ren_2000}</strong></small></td>
        <td><small><strong>${data.ren_2030}</strong></small></td>
        <td><small><strong>${data.ren_2100}</strong></small></td>
        <td><small><strong>${data.ren_2130}</strong></small></td>
        <td><small><strong>${data.ren_2200}</strong></small></td>
        <td><small><strong>${data.ren_2230}</strong></small></td>
        <td><small><strong>${data.ren_2300}</strong></small></td>
        <td><small><strong>${data.ren_2330}</strong></small></td>
        <td><small><strong>${data.ren_2400}</strong></small></td>
      </tr>
    `;
  }

  function generateStatus(data) {
    return data == 1 ? "<i class='bx bx-check text-success'></i>" : "<i class='bx bx-x text-danger'></i>";
  }

  function generateButtons(data) {
    return `
      ${generateEditButtonLink(`<?= base_url('beban_sistem/edit_subsistem_ren'); ?>/${data.data_id}`)}
      ${generateDeleteButtonLink(`<?= base_url('beban_sistem/del_subsistem_ren'); ?>/${data.data_id}`)}
    `;
  }

  function initializeSelect2() {
    $("#f-supply").select2({
      ajax: {
        url: urlAPISubsystemSupplyFilterSelect2,
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
      templateResult: formatUnit,
      templateSelection: formatTemplateSelection,
      escapeMarkup: function(m) {
        return m;
      }
    });
  }

  const formatUnit = (result) => formatTemplateResult(result, 'supply');
</script>