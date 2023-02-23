<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><a href="<?= site_url('beban_sistem/penghantar_perencanaan') ?>"><span class="text-muted fw-light">Beban Sistem /</span></a> Penghantar | Perencanaan</h4>

  <form id="formBulkUpload" method="POST" onsubmit="checkDate();return false;" action="<?= site_url('beban_sistem/upload_penghantar_ren') ?>" enctype="multipart/form-data">
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
      <a href="<?= site_url('beban_sistem/penghantar_perencanaan') ?>" class="btn btn-outline-secondary">Cancel</a>
    </div>
  </form>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  const urlAPICountByDate = "<?= base_url("api/utilities/get-beban-penghantar-perencanaan-by-date-count"); ?>";
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
      submitData();
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
      if (result.isConfirmed) submitData();
    });
  }

  function submitData() {
    getElement("formBulkUpload").setAttribute("onsubmit", "");
    getElement("formBulkUpload").submit();
  }
</script>