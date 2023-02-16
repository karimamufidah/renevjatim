<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><a href="<?= site_url('beban_sistem/penghantar_perencanaan') ?>"><span class="text-muted fw-light">Beban Sistem /</span></a> Penghantar | Perencanaan</h4>

    <form id="formBulkUpload" method="POST" action="<?= site_url('beban_sistem/upload_penghantar_ren') ?>" enctype="multipart/form-data">
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

<?php if ($this->session->flashdata('confirm')) : ?>
    <script>
        Swal.fire({
            title: 'Data is already exist. Do you want to replace the data?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Replace',
            denyButtonText: `Don't save`,
            html: `<input class="form-control" type="hidden" value="<?= set_value('tanggal') ?>" id="tanggal" name="tanggal" required />`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $(document).ready(function() {

                    $('#formBulkUpload').on('submit', function(event) {

                        event.preventDefault();
                        $.ajax({
                            //url: '<?php echo base_url('tegangan/trial') ?>',
                            method: 'POST',
                            data: new FormData(this),
                            dataType: 'json',
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function(data) {
                                swal("Sukses", "Your imaginary file has been deleted.", "success");
                            },
                            error: function(data) {
                                swal("NOT Deleted!", "Something blew up.", "error");
                            }
                        });

                    });

                });
                //window.location.href = "<?php echo base_url('tegangan/trial') ?>";
            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
            }
        })
    </script>
<?php endif; ?>