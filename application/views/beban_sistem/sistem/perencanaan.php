<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Beban Sistem /</span> Sistem | Perencanaan</h4>

    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item">
                    <a class="nav-link active" href="javascript:void(0);">Perencanaan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('beban_sistem/sistem_realisasi') ?>">Realisasi</a>
                </li>
            </ul>
            <div class="card">
                <!-- Perencanaan -->
                <div class="card-header">
                    <button type="button" class="btn btn-primary dropdown-toggle float-end" data-bs-toggle="dropdown" aria-expanded="false">Add data</button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= site_url('beban_sistem/add_sistem_ren') ?>">Manual Input</a></li>
                        <li><a class="dropdown-item" href="<?= site_url('beban_sistem/import_sistem_ren') ?>">Import File</a></li>
                    </ul>
                </div>
                <!-- Responsive Table -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>Sistem</th>
                                    <th class="text-center">Status</th>
                                    <th>Created Date</th>
                                    <th>Updated Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = $this->uri->segment(3) ? $this->uri->segment(3) + 1 : 1;
                                foreach ($row->result() as $key => $data) { ?>
                                    <tr data-toggle="collapse" data-target="#collapseExample" class="accordion-toggle">
                                        <td><button class="btn p-0 dropdown-toggle hide-arrow accordion-header" data-bs-toggle="collapse" data-bs-target="#collapseExample<?php echo $data->data_id; ?>" aria-expanded="true" aria-controls="collapseExample">
                                                <i class='bx bx-chevron-right'></i>
                                            </button></td>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data->tanggal ?></td>
                                        <td><?= ucwords($data->sistem) ?></td>
                                        <td class="text-center"><?= $data->status == 1 ? "<i class='bx bx-check'></i>" : "<i class='bx bx-x'></i>" ?></td>
                                        <td><?= $data->created_date ?></td>
                                        <td><?= $data->updated_date ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="<?= base_url('beban_sistem/edit_sistem_ren/' . $data->data_id); ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <a class="dropdown-item" href="<?= base_url('beban_sistem/del_sistem_ren/' . $data->data_id); ?>" onclick="return confirm('Apakah Anda yakin?')"><i class="bx bx-trash-alt me-1"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="10" class="hiddedRow" style="padding: 0 !important;">
                                            <div class="container">
                                                <div class="accordion-body collapse" id="collapseExample<?php echo $data->data_id; ?>">
                                                    <div class="table-responsive table-consended text-nowrap">
                                                        <table id="example" class="table table-bordered table-striped d-block table-sm">
                                                            <thead>
                                                                <tr>
                                                                    <th>00.30</th>
                                                                    <th>01.00</th>
                                                                    <th>01.30</th>
                                                                    <th>02.00</th>
                                                                    <th>02.30</th>
                                                                    <th>03.00</th>
                                                                    <th>03.30</th>
                                                                    <th>04.00</th>
                                                                    <th>04.30</th>
                                                                    <th>05.00</th>
                                                                    <th>05.30</th>
                                                                    <th>06.00</th>
                                                                    <th>06.30</th>
                                                                    <th>07.00</th>
                                                                    <th>07.30</th>
                                                                    <th>08.00</th>
                                                                    <th>08.30</th>
                                                                    <th>09.00</th>
                                                                    <th>09.30</th>
                                                                    <th>10.00</th>
                                                                    <th>10.30</th>
                                                                    <th>11.00</th>
                                                                    <th>11.30</th>
                                                                    <th>12.00</th>
                                                                    <th>12.30</th>
                                                                    <th>13.00</th>
                                                                    <th>13.30</th>
                                                                    <th>14.00</th>
                                                                    <th>14.30</th>
                                                                    <th>15.00</th>
                                                                    <th>15.30</th>
                                                                    <th>16.00</th>
                                                                    <th>16.30</th>
                                                                    <th>17.00</th>
                                                                    <th>17.30</th>
                                                                    <th>18.00</th>
                                                                    <th>18.30</th>
                                                                    <th>19.00</th>
                                                                    <th>19.30</th>
                                                                    <th>20.00</th>
                                                                    <th>20.30</th>
                                                                    <th>21.00</th>
                                                                    <th>21.30</th>
                                                                    <th>22.00</th>
                                                                    <th>22.30</th>
                                                                    <th>23.00</th>
                                                                    <th>23.30</th>
                                                                    <th>24.00</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><?= $data->ren_0030 ?></td>
                                                                    <td><?= $data->ren_0100 ?></td>
                                                                    <td><?= $data->ren_0130 ?></td>
                                                                    <td><?= $data->ren_0200 ?></td>
                                                                    <td><?= $data->ren_0230 ?></td>
                                                                    <td><?= $data->ren_0300 ?></td>
                                                                    <td><?= $data->ren_0330 ?></td>
                                                                    <td><?= $data->ren_0400 ?></td>
                                                                    <td><?= $data->ren_0430 ?></td>
                                                                    <td><?= $data->ren_0500 ?></td>
                                                                    <td><?= $data->ren_0530 ?></td>
                                                                    <td><?= $data->ren_0600 ?></td>
                                                                    <td><?= $data->ren_0630 ?></td>
                                                                    <td><?= $data->ren_0700 ?></td>
                                                                    <td><?= $data->ren_0730 ?></td>
                                                                    <td><?= $data->ren_0800 ?></td>
                                                                    <td><?= $data->ren_0830 ?></td>
                                                                    <td><?= $data->ren_0900 ?></td>
                                                                    <td><?= $data->ren_0930 ?></td>
                                                                    <td><?= $data->ren_1000 ?></td>
                                                                    <td><?= $data->ren_1030 ?></td>
                                                                    <td><?= $data->ren_1100 ?></td>
                                                                    <td><?= $data->ren_1130 ?></td>
                                                                    <td><?= $data->ren_1200 ?></td>
                                                                    <td><?= $data->ren_1230 ?></td>
                                                                    <td><?= $data->ren_1300 ?></td>
                                                                    <td><?= $data->ren_1330 ?></td>
                                                                    <td><?= $data->ren_1400 ?></td>
                                                                    <td><?= $data->ren_1430 ?></td>
                                                                    <td><?= $data->ren_1500 ?></td>
                                                                    <td><?= $data->ren_1530 ?></td>
                                                                    <td><?= $data->ren_1600 ?></td>
                                                                    <td><?= $data->ren_1630 ?></td>
                                                                    <td><?= $data->ren_1700 ?></td>
                                                                    <td><?= $data->ren_1730 ?></td>
                                                                    <td><?= $data->ren_1800 ?></td>
                                                                    <td><?= $data->ren_1830 ?></td>
                                                                    <td><?= $data->ren_1900 ?></td>
                                                                    <td><?= $data->ren_1930 ?></td>
                                                                    <td><?= $data->ren_2000 ?></td>
                                                                    <td><?= $data->ren_2030 ?></td>
                                                                    <td><?= $data->ren_2100 ?></td>
                                                                    <td><?= $data->ren_2130 ?></td>
                                                                    <td><?= $data->ren_2200 ?></td>
                                                                    <td><?= $data->ren_2230 ?></td>
                                                                    <td><?= $data->ren_2300 ?></td>
                                                                    <td><?= $data->ren_2330 ?></td>
                                                                    <td><?= $data->ren_2400 ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="demo-inline-spacing">
                        <ul class="pagination justify-content-end">
                            <?= $pagination ?>
                        </ul>
                    </div>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>
</div>