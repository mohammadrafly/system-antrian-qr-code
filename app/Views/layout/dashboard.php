
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
  <link rel="stylesheet" href="<?= base_url('template/assets/vendors/sweetalert2/sweetalert2.min.css') ?>">
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
          <?php if(session()->get('role') === 'admin'): ?>
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
          <?php elseif(session()->get('role') === 'pasien'): ?>
          <li class="nav-item">
            <a href="<?= base_url('dashboard/profile/'.session()->get('username')) ?>" class="nav-link">
              <i class="link-icon" data-feather="user"></i>
              <span class="link-title">Profile</span>
            </a>
          </li>
          <?php endif ?>
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
        <?php if($IniDashboard === TRUE): ?>

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
        <?php elseif($IniDashboard === FALSE): ?>
          <!-- do something here --> 
        <?php endif ?>
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
  <script src="<?= base_url('template/assets/js/sweet-alert.js') ?>"></script>
  <script src="<?= base_url('template/assets/vendors/sweetalert2/sweetalert2.min.js') ?>"></script>
  <script src="<?= base_url('template/assets/vendors/promise-polyfill/polyfill.min.js') ?>"></script>
</body>
</html>