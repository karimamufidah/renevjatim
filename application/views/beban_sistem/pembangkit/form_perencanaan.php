<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><a href="<?= site_url('beban_sistem/pembangkit_perencanaan') ?>"><span class="text-muted fw-light">Beban Sistem /</span></a> Pembangkit | Perencanaan</h4>

    <!-- Account -->
    <form id="formRegister" method="POST" action="<?= site_url('beban_sistem/process_pembangkit_ren') ?>">
        <?php //echo validation_errors();
        ?>
        <!-- Form controls -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <h5 class="card-header">Input Data</h5>
                        <div class="card-body" style="height: 400px;">

                            <div class="mb-3" <?= form_error('tanggal') ? 'has-error' : null ?>>
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="hidden" name="username" value="<?= $this->fungsi->user_login()->name ?>">
                                <input type="hidden" name="data_id" value="<?= $row->data_id ?>">
                                <div>
                                    <input class="form-control" type="date" value="<?= $row->tanggal ?>" id="tanggal" name="tanggal" required />
                                    <?= form_error('tanggal') ?>
                                </div>
                            </div>
                            <div class="mb-3" <?= form_error('pembangkit') ? 'has-error' : null ?>>
                                <label for="pembangkit" class="form-label">Pembangkit</label>
                                <input type="text" class="form-control" id="pembangkit" name="pembangkit" placeholder="Pembangkit" value="<?= $row->pembangkit ?>" required />
                                <?= form_error('pembangkit') ?>
                            </div>
                            <div class="mb-3 <?= form_error('satuan') ? 'has-error' : null ?>">
                                <label class="form-label" for="satuan">Satuan</label>
                                <select id="satuan" class="select2 form-select" name="satuan" required>
                                    <option value="<?= $row->satuan ?>"><?= $row->satuan ?></option>
                                    <option value="MW" <?= set_value('satuan') == "MW" ? "selected" : null ?>>MW</option>
                                    <option value="MVAR" <?= set_value('satuan') == "MVAR" ? "selected" : null ?>>MVAR</option>
                                    <option value="DMP" <?= set_value('satuan') == "DMP" ? "selected" : null ?>>DMP</option>
                                    <option value="%" <?= set_value('satuan') == "%" ? "selected" : null ?>>%</option>
                                </select>
                                <?= form_error('satuan') ?>
                            </div>
                            <div class="form-check float-end">
                                <!-- input class="form-check-input" type="checkbox" value="<?= set_value('status') == 1 ? 'checked' : set_value('status') == 2 ?>" id="status" name="status" checked / -->
                                <input class="form-check-input" id="status" type="hidden" name="status" value="2" />
                                <input class="form-check-input" id="status" type="checkbox" name="status" checked value="1" />
                                <label class="form-check-label" for="defaultCheck3">
                                    Status
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Input Sizing -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <h5 class="card-header">Waktu</h5>
                        <div class="card-body">
                            <span class="badge bg-label-info">Use "." for comma</span>

                        </div>

                        <div class="card-body scroll" style="overflow-y:auto; height: 353px;">

                            <div class="mb-3">
                                <label for="ren_0030" class="form-label">00.30</label>
                                <input type="text" class="form-control" id="ren_0030" name="ren_0030" placeholder="" value="<?= $row->ren_0030 ?>" />
                                <?= form_error('ren_0030') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_0100" class="form-label">01.00</label>
                                <input type="text" class="form-control" id="ren_0100" name="ren_0100" placeholder="" value="<?= $row->ren_0100 ?>" />
                                <?= form_error('ren_0100') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_0130" class="form-label">01.30</label>
                                <input type="text" class="form-control" id="ren_0130" name="ren_0130" placeholder="" value="<?= $row->ren_0130 ?>" />
                                <?= form_error('ren_0130') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_0200" class="form-label">02.00</label>
                                <input type="text" class="form-control" id="ren_0200" name="ren_0200" placeholder="" value="<?= $row->ren_0200 ?>" />
                                <?= form_error('ren_0200') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_0230" class="form-label">02.30</label>
                                <input type="text" class="form-control" id="ren_0230" name="ren_0230" placeholder="" value="<?= $row->ren_0230 ?>" />
                                <?= form_error('ren_0230') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_0300" class="form-label">03.00</label>
                                <input type="text" class="form-control" id="ren_0300" name="ren_0300" placeholder="" value="<?= $row->ren_0300 ?>" />
                                <?= form_error('ren_0300') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_0330" class="form-label">03.30</label>
                                <input type="text" class="form-control" id="ren_0330" name="ren_0330" placeholder="" value="<?= $row->ren_0330 ?>" />
                                <?= form_error('ren_0330') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_0400" class="form-label">04.00</label>
                                <input type="text" class="form-control" id="ren_0400" name="ren_0400" placeholder="" value="<?= $row->ren_0400 ?>" />
                                <?= form_error('ren_0400') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_0430" class="form-label">04.30</label>
                                <input type="text" class="form-control" id="ren_0430" name="ren_0430" placeholder="" value="<?= $row->ren_0430 ?>" />
                                <?= form_error('ren_0430') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_0500" class="form-label">05.00</label>
                                <input type="text" class="form-control" id="ren_0500" name="ren_0500" placeholder="" value="<?= $row->ren_0500 ?>" />
                                <?= form_error('ren_0500') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_0530" class="form-label">05.30</label>
                                <input type="text" class="form-control" id="ren_0530" name="ren_0530" placeholder="" value="<?= $row->ren_0530 ?>" />
                                <?= form_error('ren_0530') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_0600" class="form-label">06.00</label>
                                <input type="text" class="form-control" id="ren_0600" name="ren_0600" placeholder="" value="<?= $row->ren_0600 ?>" />
                                <?= form_error('ren_0600') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_0630" class="form-label">06.30</label>
                                <input type="text" class="form-control" id="ren_0630" name="ren_0630" placeholder="" value="<?= $row->ren_0630 ?>" />
                                <?= form_error('ren_0630') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_0700" class="form-label">07.00</label>
                                <input type="text" class="form-control" id="ren_0700" name="ren_0700" placeholder="" value="<?= $row->ren_0700 ?>" />
                                <?= form_error('ren_0700') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_0730" class="form-label">07.30</label>
                                <input type="text" class="form-control" id="ren_0730" name="ren_0730" placeholder="" value="<?= $row->ren_0730 ?>" />
                                <?= form_error('ren_0730') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_0800" class="form-label">08.00</label>
                                <input type="text" class="form-control" id="ren_0800" name="ren_0800" placeholder="" value="<?= $row->ren_0800 ?>" />
                                <?= form_error('ren_0800') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_0830" class="form-label">08.30</label>
                                <input type="text" class="form-control" id="ren_0830" name="ren_0830" placeholder="" value="<?= $row->ren_0830 ?>" />
                                <?= form_error('ren_0830') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_0900" class="form-label">09.00</label>
                                <input type="text" class="form-control" id="ren_0900" name="ren_0900" placeholder="" value="<?= $row->ren_0900 ?>" />
                                <?= form_error('ren_0900') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_0930" class="form-label">09.30</label>
                                <input type="text" class="form-control" id="ren_0930" name="ren_0930" placeholder="" value="<?= $row->ren_0930 ?>" />
                                <?= form_error('ren_0930') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_1000" class="form-label">10.00</label>
                                <input type="text" class="form-control" id="ren_1000" name="ren_1000" placeholder="" value="<?= $row->ren_1000 ?>" />
                                <?= form_error('ren_1000') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_1030" class="form-label">10.30</label>
                                <input type="text" class="form-control" id="ren_1030" name="ren_1030" placeholder="" value="<?= $row->ren_1030 ?>" />
                                <?= form_error('ren_1030') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_1100" class="form-label">11.00</label>
                                <input type="text" class="form-control" id="ren_1100" name="ren_1100" placeholder="" value="<?= $row->ren_1100 ?>" />
                                <?= form_error('ren_1100') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_1130" class="form-label">11.30</label>
                                <input type="text" class="form-control" id="ren_1130" name="ren_1130" placeholder="" value="<?= $row->ren_1130 ?>" />
                                <?= form_error('ren_1130') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_1200" class="form-label">12.00</label>
                                <input type="text" class="form-control" id="ren_1200" name="ren_1200" placeholder="" value="<?= $row->ren_1200 ?>" />
                                <?= form_error('ren_1200') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_1230" class="form-label">12.30</label>
                                <input type="text" class="form-control" id="ren_1230" name="ren_1230" placeholder="" value="<?= $row->ren_1230 ?>" />
                                <?= form_error('ren_1230') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_1300" class="form-label">13.00</label>
                                <input type="text" class="form-control" id="ren_1300" name="ren_1300" placeholder="" value="<?= $row->ren_1300 ?>" />
                                <?= form_error('ren_1300') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_1330" class="form-label">13.30</label>
                                <input type="text" class="form-control" id="ren_1330" name="ren_1330" placeholder="" value="<?= $row->ren_1330 ?>" />
                                <?= form_error('ren_1330') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_1400" class="form-label">14.00</label>
                                <input type="text" class="form-control" id="ren_1400" name="ren_1400" placeholder="" value="<?= $row->ren_1400 ?>" />
                                <?= form_error('ren_1400') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_1430" class="form-label">14.30</label>
                                <input type="text" class="form-control" id="ren_1430" name="ren_1430" placeholder="" value="<?= $row->ren_1430 ?>" />
                                <?= form_error('ren_1430') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_1500" class="form-label">15.00</label>
                                <input type="text" class="form-control" id="ren_1500" name="ren_1500" placeholder="" value="<?= $row->ren_1500 ?>" />
                                <?= form_error('ren_1500') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_1530" class="form-label">15.30</label>
                                <input type="text" class="form-control" id="ren_1530" name="ren_1530" placeholder="" value="<?= $row->ren_1530 ?>" />
                                <?= form_error('ren_1530') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_1600" class="form-label">16.00</label>
                                <input type="text" class="form-control" id="ren_1600" name="ren_1600" placeholder="" value="<?= $row->ren_1600 ?>" />
                                <?= form_error('ren_1600') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_1630" class="form-label">16.30</label>
                                <input type="text" class="form-control" id="ren_1630" name="ren_1630" placeholder="" value="<?= $row->ren_1630 ?>" />
                                <?= form_error('ren_1630') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_1700" class="form-label">17.00</label>
                                <input type="text" class="form-control" id="ren_1700" name="ren_1700" placeholder="" value="<?= $row->ren_1700 ?>" />
                                <?= form_error('ren_1700') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_1730" class="form-label">17.30</label>
                                <input type="text" class="form-control" id="ren_1730" name="ren_1730" placeholder="" value="<?= $row->ren_1730 ?>" />
                                <?= form_error('ren_1730') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_1800" class="form-label">18.00</label>
                                <input type="text" class="form-control" id="ren_1800" name="ren_1800" placeholder="" value="<?= $row->ren_1800 ?>" />
                                <?= form_error('ren_1800') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_1830" class="form-label">18.30</label>
                                <input type="text" class="form-control" id="ren_1830" name="ren_1830" placeholder="" value="<?= $row->ren_1830 ?>" />
                                <?= form_error('ren_1830') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_1900" class="form-label">19.00</label>
                                <input type="text" class="form-control" id="ren_1900" name="ren_1900" placeholder="" value="<?= $row->ren_1900 ?>" />
                                <?= form_error('ren_1900') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_1930" class="form-label">19.30</label>
                                <input type="text" class="form-control" id="ren_1930" name="ren_1930" placeholder="" value="<?= $row->ren_1930 ?>" />
                                <?= form_error('ren_1930') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_2000" class="form-label">20.00</label>
                                <input type="text" class="form-control" id="ren_2000" name="ren_2000" placeholder="" value="<?= $row->ren_2000 ?>" />
                                <?= form_error('ren_2000') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_2030" class="form-label">20.30</label>
                                <input type="text" class="form-control" id="ren_2030" name="ren_2030" placeholder="" value="<?= $row->ren_2030 ?>" />
                                <?= form_error('ren_2030') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_2100" class="form-label">21.00</label>
                                <input type="text" class="form-control" id="ren_2100" name="ren_2100" placeholder="" value="<?= $row->ren_2100 ?>" />
                                <?= form_error('ren_2100') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_2130" class="form-label">21.30</label>
                                <input type="text" class="form-control" id="ren_2130" name="ren_2130" placeholder="" value="<?= $row->ren_2130 ?>" />
                                <?= form_error('ren_2130') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_2200" class="form-label">22.00</label>
                                <input type="text" class="form-control" id="ren_2200" name="ren_2200" placeholder="" value="<?= $row->ren_2200 ?>" />
                                <?= form_error('ren_2200') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_2230" class="form-label">22.30</label>
                                <input type="text" class="form-control" id="ren_2230" name="ren_2230" placeholder="" value="<?= $row->ren_2230 ?>" />
                                <?= form_error('ren_2230') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_2300" class="form-label">23.00</label>
                                <input type="text" class="form-control" id="ren_2300" name="ren_2300" placeholder="" value="<?= $row->ren_2300 ?>" />
                                <?= form_error('ren_2300') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_2330" class="form-label">23.30</label>
                                <input type="text" class="form-control" id="ren_2330" name="ren_2330" placeholder="" value="<?= $row->ren_2330 ?>" />
                                <?= form_error('ren_2330') ?>
                            </div>
                            <div class="mb-3">
                                <label for="ren_2400" class="form-label">24.00</label>
                                <input type="text" class="form-control" id="ren_2400" name="ren_2400" placeholder="" value="<?= $row->ren_2400 ?>" />
                                <?= form_error('ren_2400') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" name="<?= $page ?>" class="btn btn-primary me-2">Save</button>
                    <a href="<?= site_url('beban_sistem/pembangkit_perencanaan') ?>" class="btn btn-outline-secondary">Cancel</a>
                </div>
    </form>
</div>
<!-- /Account -->