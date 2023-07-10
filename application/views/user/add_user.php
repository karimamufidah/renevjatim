<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><a href="<?= site_url('user') ?>"><span class="text-muted fw-light">User List /</span></a> Add New User</h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Profile Details</h5>
                <!-- Account -->
                <div class="card-body">
                    <form id="formRegister" method="POST" action="<?= base_url('user/add'); ?>" enctype="multipart/form-data">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="<?= base_url('assets/admin/img/avatars/') ?>01.png" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" name="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                </label>
                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>

                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                            </div>
                        </div>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <?php //echo validation_errors(); 
                    ?>
                    <div class="row">
                        <div class="mb-3 col-md-6 <?= form_error('name') ? 'has-error' : null ?>">
                            <label for="name" class="form-label">Name *</label>
                            <input class="form-control" type="text" id="name" name="name" placeholder="Enter name" value="<?= set_value('name') ?>" autofocus />
                            <?= form_error('name') ?>
                        </div>
                        <div class="mb-3 col-md-6 <?= form_error('username') ? 'has-error' : null ?>">
                            <label for="username" class="form-label">Username *</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" value="<?= set_value('username') ?>" />
                            <?= form_error('username') ?>
                        </div>
                        <div class="mb-3 col-md-6 form-password-toggle <?= form_error('password') ? 'has-error' : null ?>">
                            <label class="form-label" for="password">Password *</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" value="<?= set_value('password') ?>" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                            <?= form_error('password') ?>
                        </div>
                        <div class="mb-3 col-md-6 form-password-toggle <?= form_error('confpassword') ? 'has-error' : null ?>">
                            <label class="form-label" for="password">Confirm Password *</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="confpass" class="form-control" name="confpassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" value="<?= set_value('confpassword') ?>" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                            <?= form_error('confpassword') ?>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="<?= set_value('title') ?>" />
                            <?= form_error('title') ?>
                        </div>
                        <div class="mb-3 col-md-6 <?= form_error('role') ? 'has-error' : null ?>">
                            <label class="form-label" for="role">Role *</label>
                            <select id="role" class="select2 form-select" name="role">
                                <option value="">Select</option>
                                <option value="1" <?= set_value('role') == 1 ? "selected" : null ?>>Admin</option>
                                <option value="2" <?= set_value('role') == 2 ? "selected" : null ?>>Operator</option>
                                <option value="3" <?= set_value('role') == 2 ? "selected" : null ?>>Internal</option>
                                <option value="4" <?= set_value('role') == 2 ? "selected" : null ?>>Eksternal</option>
                            </select>
                            <?= form_error('role') ?>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Create User</button>
                            <a href="<?= site_url('user') ?>" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>
            </div>
        </div>
    </div>