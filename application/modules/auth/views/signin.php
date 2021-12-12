<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="assets/images/favicon.svg"
      type="image/x-icon"
    />
    <title>Sign In | PlainAdmin Demo</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/lineicons.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/main.css" />
  </head>
  <body>
    <!-- ======== sidebar-nav start =========== -->
    
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
      <!-- ========== header start ========== -->
     
      <!-- ========== header end ========== -->

      <!-- ========== signin-section start ========== -->
      <section class="signin-section">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <!-- ========== title-wrapper end ========== -->

          <div class="row g-0 auth-row">
            <div class="col-lg-6">
              <div class="auth-cover-wrapper bg-primary-100">
                <div class="auth-cover">
                  <div class="title text-center">
                    <h1 class="text-primary mb-10">Disaster Event</h1>
                    <p class="text-medium">
                      Aplikasi Manajemen Data Bencana
                    </p>
                  </div>
                  <div class="cover-image">
                    <img src="<?= base_url() ?>assets/images/auth/signin-image.svg" alt="" />
                  </div>
                  <div class="shape-image">
                    <img src="<?= base_url() ?>assets/images/auth/shape.svg" alt="" />
                  </div>
                </div>
              </div>
            </div>
            <!-- end col -->
            <div class="col-lg-6">
              <div class="signin-wrapper">
                <div class="form-wrapper">
                  
                  <p class="text-sm mb-30">
                   
                  </p>
                  <?= form_open('login') ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Silahkan masuk terlebih dahulu</h4>
                    <?php if ($this->session->flashdata('failed')) : ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <div class="d-flex">
                                <div>
                                    <h4 class="alert-title"><?= $this->session->flashdata('failed') ?></h4>
                                </div>
                            </div>
                            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                        </div>
                    <?php endif; ?>
                    <div class="mt-4 mb-3">
                        <label class="form-label">Email address</label>
                        <input name="email" type="email" class="form-control" placeholder="Enter email">
                        <div class="text-danger mt-1"><?= form_error('email') ?></div>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Password</label>
                        <div class="input-group input-group-flat">
                            <input name="password" type="password" class="form-control" placeholder="Password" autocomplete="off">
                        </div>
                        <div class="text-danger mt-1"><?= form_error('password') ?></div>
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Masuk</button>
                    </div>
                </div>
            </div>
            <?= form_close() ?>
                  
                </div>
              </div>
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
        </div>
      </section>
      <!-- ========== signin-section end ========== -->

      <!-- ========== footer start =========== -->
     
      <!-- ========== footer end =========== -->
    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/js/Chart.min.js"></script>
    <script src="<?= base_url() ?>assets/js/dynamic-pie-chart.js"></script>
    <script src="<?= base_url() ?>assets/js/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/js/fullcalendar.js"></script>
    <script src="<?= base_url() ?>assets/js/jvectormap.min.js"></script>
    <script src="<?= base_url() ?>assets/js/world-merc.js"></script>
    <script src="<?= base_url() ?>assets/js/polyfill.js"></script>
    <script src="<?= base_url() ?>assets/js/main.js"></script>
  </body>
</html>
