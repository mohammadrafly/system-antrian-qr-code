<?= $this->extend('layout/auth') ?>

<?= $this->section('content') ?>
        <form action="<?= base_url('loginQR') ?>" method="POST" id="myForm" hidden>
          <fieldset class="scheduler-border">
            <legend class="scheduler-border"> Form Scan </legend>
            <input type="text" name="qrcode" id="code" autofocus>
          </fieldset>
        </form>
        <div class="col-md-6 rounded-3">
            <div class="camera rounded-3">
                <span class="d-block text-center my-4 text-muted">&mdash; Scan disini! &mdash;</span>
                <video id="preview" class="thumbnail rounded-3"></video>
            </div>
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
                                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?php echo session()->getFlashdata('success'); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <?php echo session()->getFlashdata('error'); ?>
                                    </div>
                                <?php endif; ?>
              <h3>Daftar</h3>
              <p class="mb-4">Baru disini? Mendaftar itu mudah. Hanya butuh beberapa langkah</p>
            </div>
              <form action="<?= base_url('register') ?>" method="GET">
                <input type="submit" value="Daftar" class="btn btn-block btn-primary">

                <span class="d-block text-center my-4 text-muted">&mdash; atau masuk dengan &mdash;</span>
              </form>
              <form action="<?= base_url('masuk') ?>" method="GET">
                <button type="submit" class="btn btn-block btn-primary">
                  Username & Password
                </button>
              </from>
              <div class="mt-4">
                <h5>Klik Login > Scan QR Code > Pilih Poli > Klik Cetak</h5>
                <h5>Pasien melakukan Registrasi > Input Data Diri > Klik Login >  Pilih Poli > Klik Cetak </h5>
              </div>
            </div>
          </div>
          
        </div>

<?= $this->endSection() ?>