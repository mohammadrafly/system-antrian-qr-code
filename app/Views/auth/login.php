<?= $this->extend('layout/auth') ?>

<?= $this->section('content') ?>
        <form action="<?= base_url('login') ?>" method="POST" id="myForm" hidden>
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
                <h5 class="code">Klik Login > Scan QR Code > Pilih Poli > Klik Cetak</h5>
                <h5 class="code">Pasien melakukan Registrasi > Input Data Diri > Klik Login >  Pilih Poli > Klik Cetak </h5>
              </div>
            </div>
          </div>
          
        </div>

<?= $this->endSection() ?>