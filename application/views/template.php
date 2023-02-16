<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="<?= base_url() ?>assets/admin/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title><?= $title; ?></title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/landingpage/img/Logo_PLN.png" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/vendor/libs/apex-charts/apex-charts.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.standalone.min.css" integrity="sha512-p4vIrJ1mDmOVghNMM4YsWxm0ELMJ/T0IkdEvrkNHIcgFsSzDi/fV7YxzTzb3mnMvFPawuIyIrHcpxClauEfpQg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" />


  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="<?= base_url() ?>assets/admin/vendor/js/helpers.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="<?= base_url() ?>assets/admin/js/config.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

        <div>
          <a class="navbar-brand " href="<?= site_url('dashboard') ?>" style="justify-content: center ;">
            <img src="<?= base_url() ?>assets/admin/img/renev-logo.png" class="img-fluid" style="width: 70%;">
          </a>
        </div>


        <div class="app-brand demo">

          <a href="<?= site_url('dashboard') ?>" class="app-brand-link">

            <span class="app-brand-text demo menu-text fw-bolder ms-2">Renev Jatim</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          <li <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="menu-item active"' : 'class="menu-item"' ?>>
            <a href="<?= site_url('dashboard') ?>" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Dashboard">Dashboard</div>
            </a>
          </li>

          <!-- Layouts -->
          <li <?= $this->uri->segment(1) == 'beban_sistem' ? 'class="menu-item active open"' : 'class="menu-item"' ?>>
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-cube-alt"></i>
              <div data-i18n="Beban Sistem">Beban Sistem</div>
            </a>

            <ul class="menu-sub">
              <li <?= $this->uri->segment(2) == 'penghantar_perencanaan' || $this->uri->segment(2) == 'penghantar_realisasi' || $this->uri->segment(2) == 'add_penghantar_ren' || $this->uri->segment(2) == 'add_penghantar_eval' || $this->uri->segment(2) == 'edit_penghantar_ren' || $this->uri->segment(2) == 'edit_penghantar_eval' || $this->uri->segment(2) == 'import_penghantar_ren' || $this->uri->segment(2) == 'import_penghantar_eval' || $this->uri->segment(2) == 'upload_penghantar_ren' || $this->uri->segment(2) == 'upload_penghantar_eval' ? 'class="menu-item active"' : 'class="menu-item"' ?>>
                <a href="<?= site_url('beban_sistem/penghantar_perencanaan') ?>" class="menu-link">
                  <div data-i18n="Penghantar">Penghantar</div>
                </a>
              </li>
              <li <?= $this->uri->segment(2) == 'ibt_perencanaan' || $this->uri->segment(2) == 'ibt_realisasi' || $this->uri->segment(2) == 'add_ibt_ren' || $this->uri->segment(2) == 'add_ibt_eval' || $this->uri->segment(2) == 'edit_ibt_ren' || $this->uri->segment(2) == 'edit_ibt_eval' || $this->uri->segment(2) == 'import_ibt_ren' || $this->uri->segment(2) == 'import_ibt_eval' || $this->uri->segment(2) == 'upload_ibt_ren' || $this->uri->segment(2) == 'upload_ibt_eval' ? 'class="menu-item active"' : 'class="menu-item"' ?>>
                <a href="<?= site_url('beban_sistem/ibt_perencanaan') ?>" class="menu-link">
                  <div data-i18n="Interbus Transformer">Interbus Transformer</div>
                </a>
              </li>
              <li <?= $this->uri->segment(2) == 'trafo_perencanaan' || $this->uri->segment(2) == 'trafo_realisasi' || $this->uri->segment(2) == 'add_trafo_ren' || $this->uri->segment(2) == 'add_trafo_eval' || $this->uri->segment(2) == 'edit_trafo_ren' || $this->uri->segment(2) == 'edit_trafo_eval' || $this->uri->segment(2) == 'import_trafo_ren' || $this->uri->segment(2) == 'import_trafo_eval' || $this->uri->segment(2) == 'upload_trafo_ren' || $this->uri->segment(2) == 'upload_trafo_eval' ? 'class="menu-item active"' : 'class="menu-item"' ?>>
                <a href="<?= site_url('beban_sistem/trafo_perencanaan') ?>" class="menu-link">
                  <div data-i18n="Trafo TD dan KTT">Trafo TD dan KTT</div>
                </a>
              </li>
              <li <?= $this->uri->segment(2) == 'sistem_perencanaan' || $this->uri->segment(2) == 'sistem_realisasi' || $this->uri->segment(2) == 'add_sistem_ren' || $this->uri->segment(2) == 'add_sistem_eval' || $this->uri->segment(2) == 'edit_sistem_ren' || $this->uri->segment(2) == 'edit_sistem_eval' || $this->uri->segment(2) == 'import_sistem_ren' || $this->uri->segment(2) == 'import_sistem_eval' || $this->uri->segment(2) == 'upload_sistem_ren' || $this->uri->segment(2) == 'upload_sistem_eval' ? 'class="menu-item active"' : 'class="menu-item"' ?>>
                <a href="<?= site_url('beban_sistem/sistem_perencanaan') ?>" class="menu-link">
                  <div data-i18n="Sistem">Sistem</div>
                </a>
              </li>
              <li <?= $this->uri->segment(2) == 'subsistem_perencanaan' || $this->uri->segment(2) == 'subsistem_realisasi' || $this->uri->segment(2) == 'add_subsistem_ren' || $this->uri->segment(2) == 'add_subsistem_eval' || $this->uri->segment(2) == 'edit_subsistem_ren' || $this->uri->segment(2) == 'edit_subsistem_eval' || $this->uri->segment(2) == 'import_subsistem_ren' || $this->uri->segment(2) == 'import_subsistem_eval' || $this->uri->segment(2) == 'upload_subsistem_ren' || $this->uri->segment(2) == 'upload_subsistem_eval' ? 'class="menu-item active"' : 'class="menu-item"' ?>>
                <a href="<?= site_url('beban_sistem/subsistem_perencanaan') ?>" class="menu-link">
                  <div data-i18n="Subsistem">Subsistem</div>
                </a>
              </li>
              <li <?= $this->uri->segment(2) == 'pembangkit_perencanaan' || $this->uri->segment(2) == 'pembangkit_realisasi' || $this->uri->segment(2) == 'add_pembangkit_ren' || $this->uri->segment(2) == 'add_pembangkit_eval' || $this->uri->segment(2) == 'edit_pembangkit_ren' || $this->uri->segment(2) == 'edit_pembangkit_eval' || $this->uri->segment(2) == 'import_pembangkit_ren' || $this->uri->segment(2) == 'import_pembangkit_eval' || $this->uri->segment(2) == 'upload_pembangkit_ren' || $this->uri->segment(2) == 'upload_pembangkit_eval' ? 'class="menu-item active"' : 'class="menu-item"' ?>>
                <a href="<?= site_url('beban_sistem/pembangkit_perencanaan') ?>" class="menu-link">
                  <div data-i18n="Pembangkit">Pembangkit</div>
                </a>
              </li>
            </ul>
          </li>
          <!-- Cards -->
          <li <?= $this->uri->segment(1) == 'tegangan' ? 'class="menu-item active"' : 'class="menu-item"' ?>>
            <a href="<?= site_url('tegangan/perencanaan') ?>" class="menu-link">
              <i class="menu-icon tf-icons bx bx-area"></i>
              <div data-i18n="Tegangan">Tegangan</div>
            </a>
          </li>
          <li <?= $this->uri->segment(1) == 'gangguan' ? 'class="menu-item active open"' : 'class="menu-item"' ?>>
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-error-alt"></i>
              <div data-i18n="Gangguan">Gangguan</div>
            </a>
            <ul class="menu-sub">
              <li <?= $this->uri->segment(2) == 'rekonstruksi' ? 'class="menu-item active"' : 'class="menu-item"' ?>>
                <a href="<?= site_url('gangguan/rekonstruksi') ?>" class="menu-link">
                  <div data-i18n="Rekonstruksi">Rekonstruksi</div>
                </a>
              </li>
              <li <?= $this->uri->segment(2) == 'data_fois' ? 'class="menu-item active"' : 'class="menu-item"' ?>>
                <a href="<?= site_url('gangguan/data_fois') ?>" class="menu-link">
                  <div data-i18n="Data FOIS">Data FOIS</div>
                </a>
              </li>
            </ul>
          </li>
          <!-- Cards -->
          <li <?= $this->uri->segment(1) == 'defense_scheme' ? 'class="menu-item active"' : 'class="menu-item"' ?>>
            <a href="<?= site_url('defense_scheme') ?>" class="menu-link">
              <i class="menu-icon tf-icons bx bx-folder-open"></i>
              <div data-i18n="Defense Scheme">Defense Scheme</div>
            </a>
          </li>
          <li <?= $this->uri->segment(1) == 'konfigurasi' ? 'class="menu-item active open"' : 'class="menu-item"' ?>>
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-network-chart"></i>
              <div data-i18n="Konfigurasi">Konfigurasi</div>
            </a>
            <ul class="menu-sub">
              <li <?= $this->uri->segment(2) == 'diagram' ? 'class="menu-item active"' : 'class="menu-item"' ?>>
                <a href="<?= site_url('konfigurasi/diagram') ?>" class="menu-link">
                  <div data-i18n="Diagram">Diagram</div>
                </a>
              </li>
              <li <?= $this->uri->segment(2) == 'kerawanan' ? 'class="menu-item active"' : 'class="menu-item"' ?>>
                <a href="<?= site_url('konfigurasi/kerawanan') ?>" class="menu-link">
                  <div data-i18n="Kerawanan">Kerawanan</div>
                </a>
              </li>
            </ul>
          </li>
          <!-- User interface -->
          <li <?= $this->uri->segment(1) == 'laporan' ? 'class="menu-item active open"' : 'class="menu-item"' ?>>
            <a href="javascript:void(0)" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-file"></i>
              <div data-i18n="Laporan">Laporan</div>
            </a>
            <ul class="menu-sub">
              <li <?= $this->uri->segment(2) == 'rob' ? 'class="menu-item active"' : 'class="menu-item"' ?>>
                <a href="<?= site_url('laporan/rob') ?>" class="menu-link">
                  <div data-i18n="Laporan ROB">Laporan ROB</div>
                </a>
              </li>
              <li <?= $this->uri->segment(2) == 'rot' ? 'class="menu-item active"' : 'class="menu-item"' ?>>
                <a href="<?= site_url('laporan/rot') ?>" class="menu-link">
                  <div data-i18n="Laporan ROT">Laporan ROT</div>
                </a>
              </li>
              <li <?= $this->uri->segment(2) == 'eob' ? 'class="menu-item active"' : 'class="menu-item"' ?>>
                <a href="<?= site_url('laporan/eob') ?>" class="menu-link">
                  <div data-i18n="Laporan EOB">Laporan EOB</div>
                </a>
              </li>
              <li <?= $this->uri->segment(2) == 'eot' ? 'class="menu-item active"' : 'class="menu-item"' ?>>
                <a href="<?= site_url('laporan/eot') ?>" class="menu-link">
                  <div data-i18n="Laporan EOT">Laporan EOT</div>
                </a>
              </li>
              <li <?= $this->uri->segment(2) == 'deklarasi_tmp' ? 'class="menu-item active"' : 'class="menu-item"' ?>>
                <a href="<?= site_url('laporan/deklarasi_tmp') ?>" class="menu-link">
                  <div data-i18n="Deklarasi TMP">Deklarasi TMP</div>
                </a>
              </li>
            </ul>
          </li>
          <!-- Cards -->
          <?php if ($this->fungsi->user_login()->role == 1) { ?>
            <li <?= $this->uri->segment(1) == 'user' ? 'class="menu-item active"' : 'class="menu-item"' ?>>
              <a href="<?= site_url('user') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="User Management">User Management</div>
              </a>
            </li>
          <?php } ?>
          <!-- Cards -->
          <li <?= $this->uri->segment(1) == 'master_data' ? 'class="menu-item active"' : 'class="menu-item"' ?>>
            <a href="<?= site_url('master_data') ?>" class="menu-link">
              <i class="menu-icon tf-icons bx bx-data"></i>
              <div data-i18n="Master Data">Master Data</div>
            </a>
          </li>
          <!-- Cards -->
          <?php if ($this->session->userdata('role') == 1) { ?>
            <li <?= $this->uri->segment(1) == 'audit_trail' ? 'class="menu-item active"' : 'class="menu-item"' ?>>
              <a href="<?= site_url('audit_trail') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-desktop"></i>
                <div data-i18n="Audit Trail">Audit Trail</div>
              </a>
            </li>
          <?php } ?>
        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">

            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="<?= base_url('assets/admin/img/avatars/') . $this->fungsi->user_login()->image ?>" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="<?= base_url('assets/admin/img/avatars/') . $this->fungsi->user_login()->image ?>" alt class="w-px-40 h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block"><?= $this->fungsi->user_login()->name ?></span>
                          <small class="text-muted"><?= $this->fungsi->user_login()->role == 1 ? "Admin" : "Operator" ?></small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <i class="bx bx-user me-2"></i>
                      <span class="align-middle">My Profile</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <i class="bx bx-cog me-2"></i>
                      <span class="align-middle">Settings</span>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?= site_url('auth/logout') ?>">
                      <i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">Log Out</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ User -->
            </ul>
          </div>
        </nav>

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <?php echo $contents ?>

        </div>
        <!-- / Content -->

        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
          <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
            <div class="mb-2 mb-md-0">
              ©
              <script>
                document.write(new Date().getFullYear());
              </script>
              by
              <a class="footer-link fw-bolder">Renev Jatim</a>
            </div>
          </div>
        </footer>
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
      </div>
      <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
  </div>

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- Core JS -->
  <!-- build:js <?= base_url() ?>assets/vendor/js/core.js -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="<?= base_url() ?>assets/admin/vendor/libs/jquery/jquery.js"></script>
  <script src="<?= base_url() ?>assets/admin/vendor/libs/popper/popper.js"></script>
  <script src="<?= base_url() ?>assets/admin/vendor/js/bootstrap.js"></script>
  <script src="<?= base_url() ?>assets/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!--script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></!--script-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.id.min.js" integrity="sha512-zHDWtKP91CHnvBDpPpfLo9UsuMa02/WgXDYcnFp5DFs8lQvhCe2tx56h2l7SqKs/+yQCx4W++hZ/ABg8t3KH/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

  <script src="<?= base_url() ?>assets/admin/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="<?= base_url() ?>assets/admin/vendor/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="<?= base_url() ?>assets/admin/js/main.js"></script>

  <!-- Page JS -->
  <script src="<?= base_url() ?>assets/admin/js/dashboards-analytics.js"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>