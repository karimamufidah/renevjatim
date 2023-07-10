<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User List </span>
    <a class="btn btn-primary float-end" href="<?= site_url('user/add') ?>" role="button">Add User</a>
  </h4>

  <!-- Responsive Table -->
  <div class="card">
    <!-- h5 class="card-header">Responsive Table</h5 -->
    <div class="table-responsive text-nowrap">
      <table class="table table-striped">
        <thead>
          <tr class="text-nowrap">
            <th>#</th>
            <th>Username</th>
            <th>Name</th>
            <th>Title</th>
            <th>Role</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($row->result() as $key => $data) { ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $data->username ?></td>
              <td><?= ucwords($data->name) ?></td>
              <td><?= ucwords($data->title) ?></td>
              <td><?= $data->role == 1 ? "Admin" : ($data->role == 2 ? "Operator" : ($data->role == 3 ? "Internal" : ($data->role == 4 ? "Eksternal" : "Tidak Diketahui"))) ?>
              </td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= site_url('user/edit/' . $data->user_id) ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                    <a class="dropdown-item" href="<?= site_url('user/del/' . $data->user_id) ?>" onclick="return confirm('Apakah Anda yakin?')"><i class='bx bx-trash me-1'></i> Delete</a>
                    <input type="hidden" name="user_id" value="<?= $data->user_id ?>">
                  </div>
                </div>
              </td>
            </tr>
          <?php
          } ?>
        </tbody>
      </table>
    </div>
  </div>