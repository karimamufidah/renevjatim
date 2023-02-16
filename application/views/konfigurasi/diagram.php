<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Konfigurasi Diagram </span>
        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#modalCenter">Upload File</button>
    </h4>

    <!-- Modal -->
    <form id="formRegister" method="POST" action="<?= base_url('konfigurasi/uploadDiagram'); ?>" enctype="multipart/form-data">
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Upload File</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <input class="form-control" type="file" name="file" id="formFileMultiple" multiple required>
                                <label for="formFileMultiple" class="form-label float-end">Max size 40 MB</label>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <input type="hidden" name="username" value="<?= $this->fungsi->user_login()->name ?>">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Responsive Table -->
    <div class="card">
        <!-- h5 class="card-header">Responsive Table</h5 -->
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>File Name</th>
                        <th class="text-center">File Size</th>
                        <th class="text-center">Uploaded Date</th>
                        <th class="text-center">Uploaded By</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data->file_name ?></td>
                            <td class="text-center"><?= $data->file_size ?> MB</td>
                            <td class="text-center"><?= $data->uploaded_date ?></td>
                            <td class="text-center"><?= ucwords($data->uploaded_by) ?></td>
                            <td>
                                <ul class="text-nowrap float-end">

                                    <a class="btn btn-primary btn-xs" href="<?= site_url('konfigurasi/downloadDiagram/' . $data->file_id) ?>"><i class='bx bxs-download'></i> Download</a>
                                    <a class="btn btn-danger btn-xs" href="<?= site_url('konfigurasi/deleteDiagram/' . $data->file_id) ?>" onclick="return confirm('Apakah Anda yakin?')"><i class='bx bxs-trash'></i> Delete</a>

                                </ul>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>