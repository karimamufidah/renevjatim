<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><a href="<?= site_url('beban_sistem/sistem_perencanaan') ?>"><span class="text-muted fw-light">Beban Sistem /</span></a> Sistem | Perencanaan</h4>

  <form id="formBulkUpload" onsubmit="checkDate();return false;">
    <div class="card mb-4">
      <h5 class="card-header">Upload File</h5>
      <div class="card-body" style="height: 300px;">

        <div class=" col mb-0" <?= form_error('tanggal') ? 'has-error' : null ?>>
          <label for="tanggal" class="form-label">Tanggal</label>
          <input class="form-control" type="date" value="<?= set_value('tanggal') ?>" id="tanggal" name="tanggal" required />
          <input type="hidden" name="username" value="<?= $this->fungsi->user_login()->name ?>">
          <?= form_error('tanggal') ?>
        </div>
        <div class="col mb-0">
          <label for="tanggal" class="form-label">File</label>
          <input class="form-control" type="file" name="file" id="formFileMultiple" multiple required accept=".xlsx,.xls">
          <label for="formFileMultiple" class="form-label float-end">Max size 10 MB</label>
          <?= form_error('file') ?>
        </div>
      </div>
    </div>
    <div class="mt-2">
      <button type="submit" class="btn btn-primary me-2">Save</button>
      <a href="<?= site_url('beban_sistem/sistem_perencanaan') ?>" class="btn btn-outline-secondary">Cancel</a>
    </div>
  </form>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modal">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <i class='bx bx-loader bx-spin my-3' style="font-size: 24pt;"></i>
        <p>Processing...</p>
      </div>
    </div>
  </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  const urlAPICountByDate = "<?= base_url("api/utilities/get-beban-sistem-perencanaan-by-date-count"); ?>";
  const urlAPIUpload = "<?= base_url("api/import/sistem-perencanaan/store"); ?>";
  const INSERT = 1;
  const UPDATE = 2;
  let crud;

  /** Initialize Data */
  window.onload = () => {
    crud = new LimCRUD();
  };

  async function checkDate() {
    const data = await crud.read({
      url: `${urlAPICountByDate}?date=${getValue("tanggal")}`
    });

    if (parseInt(data)) {
      showConfirmationAlert();
    } else {
      submitData(INSERT);
    }
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
      if (result.isConfirmed) submitData(UPDATE);
    });
  }

  function submitData(submitType) {
    $("#modal").modal("show");

    return new Promise((resolve, reject) => {
      let xhr = new XMLHttpRequest();
      let urlAPI = `${urlAPIUpload}`;
      let data = generateDataForUpload();

      xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          let response = JSON.parse(this.responseText);

          if (!response.success) {
            openFail(response.message);
          } else {
            if (submitType == INSERT) openSuccess("Data inserted successfully");
            if (submitType == UPDATE) openSuccess("Data updated successfully");
          }

          $("#modal").modal("hide");
          setTimeout(function() {
            window.open("<?= base_url("beban_sistem/sistem_perencanaan"); ?>", "_self");
          }, 2000);
        } else if (this.status == 500 || this.status == 404) {
          openFail("Gagal menghubungkan ke server.");
        }
      };

      xhr.open("POST", urlAPIUpload, true);
      xhr.send(data);
    });
  }

  function generateDataForUpload() {
    let data = new FormData();

    data.append('tanggal', getValue('tanggal'));

    if (getElement('formFileMultiple').files[0]) data.append('xlsx', getElement('formFileMultiple').files[0]);

    return data;
  }
</script>