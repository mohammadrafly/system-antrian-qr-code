<?= $this->extend('layout/auth') ?>

<?= $this->section('content') ?>
                    <form class="forms-sample" action="<?= base_url('masuk') ?>" method="POST">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" autocomplete="current-password" placeholder="Password">
                      </div>
                      <div class="mt-3">
                        <button type="sumbit" class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">Masuk</button>
                        <a href="<?= base_url('login') ?>" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                          <i class="btn-icon-prepend" data-feather="camera"></i>
                          Masuk dengan QR Code
                        </a>
                      </div>
                      <a href="<?= base_url('register') ?>" class="d-block mt-3 text-muted">Bukan pengguna? Daftar</a>
                    </form>
<?= $this->endSection() ?>