<?php if($QRCodeLogin === TRUE): ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('auth/fonts/icomoon/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('auth/css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('auth/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('auth/css/style.css') ?>">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/js/jquery-3.4.1.min.js') ?>"></script>
    <script src="<?= base_url('assets/scanner/vendor/modernizr/modernizr.js') ?>"></script>
    <script src="<?= base_url('assets/scanner/vendor/vue/vue.min.js') ?>"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SACQ | <?= $pages ?></title>
  </head>
  <body>
  
  <div class="content">
    <div class="container">
      <div class="row">
        <?= $this->renderSection('content') ?>
      </div>
    </div>
  </div>

  
    <script src="<?= base_url('auth/js/jquery-3.3.1.min.js') ?>"></script>
    <script src="<?= base_url('auth/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('auth/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('auth/js/main.js') ?>"></script>
    <script src="<?= base_url('assets/scanner/js/app.js') ?>"></script>
    <script src="<?= base_url('assets/scanner/vendor/instascan/instascan.min.js') ?>"></script>
    <script src="<?= base_url('assets/scanner/js/scanner.js') ?>"></script>
  </body>
</html>

<?php elseif($QRCodeLogin === FALSE): ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>SAQC | <?= $pages ?></title>
	<link rel="stylesheet" href="<?= base_url('template/assets/vendors/core/core.css') ?>">
	<link rel="stylesheet" href="<?= base_url('template/assets/fonts/feather-font/css/iconfont.css') ?>">
	<link rel="stylesheet" href="<?= base_url('template/assets/vendors/flag-icon-css/css/flag-icon.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('template/assets/css/demo_1/style.css') ?>">
  <link rel="shortcut icon" href="<?= base_url('template/assets/images/favicon.png') ?>" />
</head>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
                <div class="col-md-6 pr-md-0">
                  <div class="auth-left-wrapper" style="background-image: url(<?= base_url('template/assets/images/bg-auth.jpg') ?>); ">

                  </div>
                </div>
                <?php if($Login === TRUE): ?>
                <div class="col-md-6 pl-md-0">
                <?php elseif($Login === FALSE): ?>
                <div class="col-md-12 pl-md-3">
                <?php endif ?>
                  <div class="auth-form-wrapper px-4 py-5">
                    <?php if($Login === TRUE): ?>
                    <a href="#" class="noble-ui-logo d-block mb-2">System Antrian<span>QR Code</span></a>
                    <h5 class="text-muted font-weight-normal mb-4">Selamat datang kembali! Masuk ke akun Anda.</h5>
                    <?php elseif($Login === FALSE): ?>
                    <a href="#" class="noble-ui-logo d-block mb-2">System Antrian<span>QR Code</span></a>
                    <h5 class="text-muted font-weight-normal mb-4">Buat Akun gratis.</h5>
                    <?php endif ?>
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
                    <?= $this->renderSection('content') ?>
                  </div>
                </div>
              </div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<script src="<?= base_url('template/assets/vendors/core/core.js') ?>"></script>
	<script src="<?= base_url('template/assets/vendors/feather-icons/feather.min.js') ?>"></script>
	<script src="<?= base_url('template/assets/js/template.js') ?>"></script>
</body>
</html>
<?php endif ?>