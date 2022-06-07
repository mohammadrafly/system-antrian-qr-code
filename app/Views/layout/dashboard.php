<?php if(session()->get('role') === 'admin'): ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>SAQC | <?= $pages ?></title>
	<link rel="stylesheet" href="<?= base_url('template/assets/vendors/core/core.css') ?>">
    <link rel="stylesheet" href="<?= base_url('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') ?>">
    <link rel="stylesheet" href="<?= base_url('template/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('template/assets/fonts/feather-font/css/iconfont.css') ?>">
	<link rel="stylesheet" href="<?= base_url('template/assets/vendors/flag-icon-css/css/flag-icon.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('template/assets/css/demo_1/style.css') ?>">
  <link rel="shortcut icon" href="<?= base_url('template/assets/images/favicon.png') ?>" />
</head>
<body>
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
		<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
        SA<span> QR Code</span>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">Main</li>
          <li class="nav-item">
            <a href="<?= base_url('dashboard') ?>" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">web apps</li>
          <li class="nav-item">
            <a href="<?= base_url('dashboard/antrian/'.date('Y-m-d')) ?>" class="nav-link">
              <i class="link-icon" data-feather="book-open"></i>
              <span class="link-title">Antrian</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('dashboard/poli') ?>" class="nav-link">
              <i class="link-icon" data-feather="list"></i>
              <span class="link-title">Data Poli</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('dashboard/user') ?>" class="nav-link">
              <i class="link-icon" data-feather="users"></i>
              <span class="link-title">Data User</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
		<!-- partial -->
	
		<div class="page-wrapper">
					
			<!-- partial:partials/_navbar.html -->
			<nav class="navbar">
				<a href="#" class="sidebar-toggler">
					<i data-feather="menu"></i>
				</a>
				<div class="navbar-content">
					<form class="search-form">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i data-feather="search"></i>
								</div>
							</div>
							<input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
						</div>
					</form>
					<ul class="navbar-nav">
						<li class="nav-item dropdown nav-profile">
							<a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img src="https://via.placeholder.com/30x30" alt="profile">
							</a>
							<div class="dropdown-menu" aria-labelledby="profileDropdown">
								<div class="dropdown-header d-flex flex-column align-items-center">
									<div class="figure mb-3">
										<img src="https://via.placeholder.com/80x80" alt="">
									</div>
									<div class="info text-center">
										<p class="name font-weight-bold mb-0"><?= session()->get('name') ?></p>
										<p class="email text-muted mb-3"><?= session()->get('nomor_identitas') ?></p>
									</div>
								</div>
								<div class="dropdown-body">
									<ul class="profile-nav p-0 pt-3">
										<li class="nav-item">
											<a href="<?= base_url('dashboard/profile/'.session()->get('username')) ?>" class="nav-link">
												<i data-feather="user"></i>
												<span>Profile</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?= base_url('logout') ?>" class="nav-link">
												<i data-feather="log-out"></i>
												<span>Log Out</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</nav>
			<!-- partial -->

			<div class="page-content">
                <nav class="page-breadcrumb">
					<ol class="breadcrumb">
                    <?php if($IniDashboard === TRUE): ?>
						<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                    <?php elseif($IniDashboard === FALSE): ?>
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= $pages ?></li>
                    <?php endif ?>
					</ol>
				</nav>
                <div class="row">
          <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">Total Pasien</h6>
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2"><?= $pasien ?></h3>
                        <div class="d-flex align-items-baseline">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">Total Antrian</h6>
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2"><?= $antri ?></h3>
                        <div class="d-flex align-items-baseline">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">Total Poli</h6>
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2"><?= $poli ?></h3>
                        <div class="d-flex align-items-baseline">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- row -->
                <?= $this->renderSection('content') ?>

            </div>
			<!-- partial:partials/_footer.html -->
			<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
				<p class="text-muted text-center text-md-left">Copyright © 2020 <a href="https://www.nobleui.com" target="_blank">NobleUI</a>. All rights reserved</p>
				<p class="text-muted text-center text-md-left mb-0 d-none d-md-block">Handcrafted With <i class="mb-1 text-primary ml-1 icon-small" data-feather="heart"></i></p>
			</footer>
			<!-- partial -->
		
		</div>
	</div>

  <script src="<?= base_url('template/assets/vendors/core/core.js') ?>"></script>
  <script src="<?= base_url('template/assets/vendors/chartjs/Chart.min.js') ?>"></script>
  <script src="<?= base_url('template/assets/vendors/jquery.flot/jquery.flot.js') ?>"></script>
  <script src="<?= base_url('template/assets/vendors/jquery.flot/jquery.flot.resize.js') ?>"></script>
  <script src="<?= base_url('template/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') ?>"></script>
  <script src="<?= base_url('template/assets/vendors/apexcharts/apexcharts.min.js') ?>"></script>
  <script src="<?= base_url('template/assets/vendors/progressbar.js/progressbar.min.js') ?>"></script>
  <script src="<?= base_url('template/assets/vendors/feather-icons/feather.min.js') ?>"></script>
  <script src="<?= base_url('template/assets/js/template.js') ?>"></script>
  <script src="<?= base_url('template/assets/js/dashboard.js') ?>"></script>
  <script src="<?= base_url('template/assets/js/datepicker.js') ?>"></script>
  <script src="<?= base_url('template/assets/vendors/datatables.net/jquery.dataTables.js') ?>"></script>
  <script src="<?= base_url('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') ?>"></script>
  <script src="<?= base_url('template/assets/js/data-table.js') ?>"></script>
</body>
</html>
<?php elseif(session()->get('role') === 'pasien'): ?>
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
                    <?php foreach($antrian as $row): ?>
                        <h1>Nomor Antrian Saat Ini <?= $row->nomor_antrian ?></h1> 
                    <?php endforeach ?>
                    <?php if($row->status == 'BELUM SELESAI'): ?>
                        <p><span class="typed" data-typed-items="Status <?= $row->status ?>, Silahkan Tunggu Giliran."></span></p>
                        <div class="social-links">
                            <a href="<?= base_url('Antrians/cetakAntrianProses/'.$row->id) ?>"><p>Cetak Nomor</p></a>
                        </div>
                    <?php elseif($row->status == 'SELESAI'): ?>
                        <p><span class="typed" data-typed-items="Status <?= $row->status ?>, Terimakasih Telah Mengunjungi Puskesmas..."></span></p>
                    <?php endif ?>
                    
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pilih Antrian Poli</h2>
        </div>

        <div class="row">
        <?php 

        foreach($content as $row): ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
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
<?php endif ?>