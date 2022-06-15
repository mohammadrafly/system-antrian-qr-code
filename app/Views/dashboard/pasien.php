<!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">

      <title>SAQC | <?= $pages ?></title>
      <meta content="" name="description">
      <meta content="" name="keywords">

      <!-- Favicons -->
      <link href="<?= base_url('qrlogs/assets/img/favicon.png') ?>" rel="icon">
      <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

      <!-- Vendor CSS Files -->
      <link href="<?= base_url('qrlogs/assets/vendor/aos/aos.css') ?>" rel="stylesheet">
      <link href="<?= base_url('qrlogs/assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
      <link href="<?= base_url('qrlogs/assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
      <link href="<?= base_url('qrlogs/assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
      <link href="<?= base_url('qrlogs/assets/vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">
      <link href="<?= base_url('qrlogs/assets/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">

      <!-- Template Main CSS File -->
      <link href="<?= base_url('qrlogs/assets/css/style.css') ?>" rel="stylesheet">

      <!-- =======================================================
      * Template Name: MyResume - v4.7.0
      * Template URL: https://bootstrapmade.com/free-html-bootstrap-template-my-resume/
      * Author: BootstrapMade.com
      * License: https://bootstrapmade.com/license/
      ======================================================== -->
    </head>
    <style>
      .button {
        background: #0563bb;
        border: 0;
        padding: 10px 35px;
        color: #fff;
        transition: 0.4s;
        border-radius: 50px;
      }
      .button:hover {
        background: #0678e3;
      }
    </style>

    <body>

      <!-- ======= Mobile nav toggle button ======= -->
      <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->
      <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>
      <!-- ======= Header ======= -->
      <header id="header" class="d-flex flex-column justify-content-center">

        <nav id="navbar" class="navbar nav-menu">
          <ul>
            <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Beranda</span></a></li>
            <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Pilih Poli</span></a></li>
            <li><a href="#profile" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Profile</span></a></li>
            <li><a href="#qrcode" class="nav-link"><i class="bx bx-file-blank"></i> <span>Cetak QR Code</span></a></li>
            <li><a href="<?= base_url('logout') ?>" class="nav-link"><i class="bx bx-log-out"></i> <span>Log Out</span></a></li>
          </ul>
        </nav><!-- .nav-menu -->

      </header><!-- End Header -->

      <!-- ======= Hero Section ======= -->
      <section id="hero" class="d-flex flex-column justify-content-center">
        <div class="container" data-aos="zoom-in" data-aos-delay="100">
                        <?php if (!empty(session()->getFlashdata('error'))) : ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <?php echo session()->getFlashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty(session()->getFlashdata('success'))) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo session()->getFlashdata('success'); ?>
                            </div>
                        <?php endif; ?>
                        <br>
                        <?php if($antrianSaya): ?>
                          <?php foreach($antrianSaya as $row): ?>
                              <h1>Nomor Antrian Anda: <?= $row->nomor_antrian ?></h1> 
                              <h2><?= $row->nama_poli ?></h2>
                            <?php if($row->status == 'BELUM SELESAI'): ?>
                              <p><span class="typed" data-typed-items="Status <?= $row->status ?>, Silahkan Tunggu Giliran."></span></p>
                              <div class="social-links">
                                  <h4><a class="button text-white" href="<?= base_url('Antrians/cetakAntrianProses/'.$row->id) ?>">Cetak Nomor</a></h4>
                              </div>
                            <?php elseif($row->status == 'SELESAI'): ?>
                              <p><span class="typed" data-typed-items="Status <?= $row->status ?>, Terimakasih Telah Mengunjungi Puskesmas..."></span></p>
                            <?php endif ?>
                          <?php endforeach ?>
                        <?php elseif($antrianSaya == NULL): ?>
                          <h4 class="button text-center">Belum Ada Antrian Saat Ini!</h5>
                        <?php endif ?>
                        

        </div>
      </section><!-- End Hero -->

      <main id="main">
      <section id="facts" class="facts">
          <div class="container" data-aos="fade-up">

            <div class="section-title">
              <h2>Antrian Saat Ini</h2>
            </div>

            <div class="row">
            <?php if($antrian): ?>
              <?php foreach($antrianByGroup as $row): ?>                
                <div class="col-lg-3 col-md-6">
                  <div class="count-box">
                    <i class="bi bi-journal-richtext"></i>
                    <span data-purecounter-start="0" data-purecounter-end="<?= $row->nomor_antrian ?>" data-purecounter-duration="1" class="purecounter"></span>
                    <p><?= $row->nama_poli ?></p>
                  </div>
                </div>
              <?php endforeach ?>
            <?php elseif($antrian == NULL): ?>
              <h4 class="button text-center">Belum Ada Antrian</h5>
            <?php endif ?>
            </div>

          </div>
        </section><!-- End Facts Section -->
        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
          <div class="container" data-aos="fade-up">

            <div class="section-title">
              <h2>Pilih Antrian Poli</h2>
            </div>

            <div class="row">
            <?php 

            foreach($content as $row): ?>
              <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box iconbox-blue">
                  <div class="icon">
                    <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                      <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
                    </svg>
                    <i class="bx bx-id-card"></i>
                  </div>
                  <h4><a href="<?= base_url('Antrians/addPasien/'.$row['id']) ?>"><?= $row['title'] ?></a></h4>
                  <p name="limits" value="<?= $row['limits'] ?>">Limit <?= $row['limits'] ?></p>
                </div>
              </div>
            <?php endforeach ?>

            </div>

          </div>
        </section><!-- End Services Section -->

        <section id="profile" class="contact">
          <div class="container" data-aos="fade-up">

            <div class="section-title">
              <h2>Profile</h2>
            </div>

              <div class="col-lg-12 mt-5 mt-lg-0">

                <form action="<?= base_url('Dashboard/update') ?>" method="post">
                <input type="text" name="id" hidden value="<?= $user['id'] ?>">
                  <div class="row">
                    <div class="col-md-6 form-group mt-3">
                      <label >Username</label>
                      <input type="text" name="username" class="form-control" placeholder="Username" value="<?= $user['username'] ?>">
                    </div>
                    <div class="col-md-6 form-group mt-3">
                      <label >Nama</label>
                      <input type="text" name="name" class="form-control" placeholder="Name" value="<?= $user['name'] ?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 form-group mt-3">
                      <label >Nomor HP</label>
                      <input type="number" name="phone" class="form-control" placeholder="Nomor HP" value="<?= $user['phone'] ?>">
                    </div>
                    <div class="col-md-6 form-group mt-3">
                      <label >Nomor Identitas</label>
                      <input type="number" class="form-control" name="nomor_identitas" placeholder="Nomor Identitas" value="<?= $user['nomor_identitas'] ?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 form-group mt-3">
                      <label >Tanggal Lahir</label>
                      <input type="date" name="tl" class="form-control" value="<?= $user['tl'] ?>">
                    </div>
                    <div class="col-md-6 form-group mt-3">
                      <label >Jenis Kelamin</label>
                                            <select name="gender" class="form-control" id="exampleFormControlSelect1">
                                                <option selected value="<?= $user['gender'] ?>"><?= $user['gender'] ?></option>
                                                <option value="laki-laki">Laki-Laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 form-group mt-3">
                      <label >Alamat</label>
                      <textarea class="form-control" name="address" rows="5"><?= $user['address'] ?></textarea>
                    </div>
                  </div>
                  <div class="text-center"><button class="button mt-3" type="submit">Update</button></div>
                </form>

              </div>

            </div>

          </div>
        </section><!-- End Contact Section -->

        <section id="profile" class="contact">
          <div class="container" data-aos="fade-up">

            <div class="section-title">
              <h2>Password</h2>
            </div>

              <div class="col-lg-12 mt-5 mt-lg-0">

                <form action="<?= base_url('Dashboard/updatePassword') ?>" method="POST">
                  <div class="row">
                    <div class="col-md-6 form-group mt-3">
                      <label for="name">Password Lama</label>
                      <input type="password" name="old_password" class="form-control" placeholder="Password Lama">
                    </div>
                    <div class="col-md-6 form-group mt-3">
                      <label for="name">Password Baru</label>
                      <input type="password" class="form-control" name="new_password" placeholder="Password Baru">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 form-group mt-3">
                      <label for="name">Konfirmasi Password Baru</label>
                      <input type="password" name="new_password_conf" class="form-control" placeholder="Konfirmasi Password Baru">
                    </div>
                  </div>
                  <div class="text-center"><button class="button mt-3" type="submit">Update</button></div>
                </form>

              </div>

            </div>

          </div>
        </section><!-- End Contact Section -->

        <section id="qrcode" class="contact">
          <div class="container" data-aos="fade-up">

            <div class="section-title">
              <h2>Cetak QR Code</h2>
            </div>

              <div class="col-lg-12 mt-5 mt-lg-0">

                <form action="<?= base_url('Profile/cetakQRCode') ?>" method="POST">
                  <div class="row">
                    <div class="col-md-12 form-group mt-3 mb-3">
                      <label for="name">Password</label>
                      <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                  </div>
                  <div class="text-center"><button class="button mt-3" type="submit">Cetak QR Code</button></div>
                </form>

              </div>

            </div>

          </div>
        </section><!-- End Contact Section -->

      </main><!-- End #main -->


      <div id="preloader"></div>
      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

      <!-- Vendor JS Files -->
      <script src="<?= base_url('qrlogs/assets/vendor/purecounter/purecounter.js') ?>"></script>
      <script src="<?= base_url('qrlogs/assets/vendor/aos/aos.js') ?>"></script>
      <script src="<?= base_url('qrlogs/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
      <script src="<?= base_url('qrlogs/assets/vendor/glightbox/js/glightbox.min.js') ?>"></script>
      <script src="<?= base_url('qrlogs/assets/vendor/isotope-layout/isotope.pkgd.min.js') ?>"></script>
      <script src="<?= base_url('qrlogs/assets/vendor/swiper/swiper-bundle.min.js') ?>"></script>
      <script src="<?= base_url('qrlogs/assets/vendor/typed.js/typed.min.js') ?>"></script>
      <script src="<?= base_url('qrlogs/assets/vendor/waypoints/noframework.waypoints.js') ?>"></script>
      <script src="<?= base_url('qrlogs/assets/vendor/php-email-form/validate.js') ?>"></script>

      <!-- Template Main JS File -->
      <script src="<?= base_url('qrlogs/assets/js/main.js') ?>"></script>

    </body>

    </html>