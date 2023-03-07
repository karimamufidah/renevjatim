<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

<main>
  <div class="container-xxl flex-grow-1 container-p-y">
    <!-- Pills -->
    <div class="row">
      <div class="col-xl-12">
        <div class="nav-align-top mb-4">
          <ul class="nav nav-pills mb-3" role="tablist">
            <li class="nav-item">
              <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-pht" aria-controls="navs-pills-top-pht" aria-selected="true">Penghantar</button>
            </li>
            <li class="nav-item">
              <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-ibt" aria-controls="navs-pills-top-ibt" aria-selected="false">Interbus Transformer</button>
            </li>
            <li class="nav-item">
              <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-trafo" aria-controls="navs-pills-top-trafo" aria-selected="false">Trafo TD dan KTT</button>
            </li>
            <li class="nav-item">
              <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-sistem" aria-controls="navs-pills-top-sistem" aria-selected="false">Sistem</button>
            </li>
            <li class="nav-item">
              <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-subsistem" aria-controls="navs-pills-top-subsistem" aria-selected="false">Subsistem</button>
            </li>
            <li class="nav-item">
              <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-kit" aria-controls="navs-pills-top-kit" aria-selected="false">Pembangkit</button>
            </li>
            <li class="nav-item">
              <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-teg" aria-controls="navs-pills-top-teg" aria-selected="false">Tegangan</button>
            </li>
          </ul>

          <div class="tab-content">
            <?php $this->load->view("dashboard/penghantar/index"); ?>
            <?php $this->load->view("dashboard/ibt/index"); ?>
            <?php $this->load->view("dashboard/trafo/index"); ?>
            <?php $this->load->view("dashboard/sistem/index"); ?>
            <?php $this->load->view("dashboard/subsistem/index"); ?>
            <?php $this->load->view("dashboard/pembangkit/index"); ?>
            <?php $this->load->view("dashboard/tegangan/index"); ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Pills -->
  </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.id.min.js" integrity="sha512-zHDWtKP91CHnvBDpPpfLo9UsuMa02/WgXDYcnFp5DFs8lQvhCe2tx56h2l7SqKs/+yQCx4W++hZ/ABg8t3KH/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<?php $this->load->view("dashboard/index_js"); ?>