<?= $this->extend('layout/auth') ?>

<?= $this->section('content') ?>
                    <form class="forms-sample" action="<?= base_url('register') ?>" method="POST">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Username</label>
                        <input type="text" name="username" class="form-control" id="exampleInputUsername1" autocomplete="Username" placeholder="Username">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" id="exampleInputUsername1" autocomplete="Username" placeholder="Username">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" autocomplete="current-password" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Konfirmasi Password</label>
                        <input type="password" name="password_conf" class="form-control" id="exampleInputPassword1" autocomplete="current-password" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Nomor Identitas</label>
                        <input type="number" name="nomor_identitas" class="form-control" id="exampleInputUsername1" autocomplete="Username" placeholder="Username">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Alamat</label>
                        <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                      </div>
                      <div class="form-group">
                      <label for="exampleFormControlSelect1">Jenis Kelamin</label>
										<select name="gender" class="form-control" id="exampleFormControlSelect1">
											<option selected disabled>Pilih Jenis Kelamin</option>
											<option value="laki-laki">Laki-Laki</option>
											<option value="perempuan">Perempuan</option>
										</select>
                      </div>
                      <div class="mt-3">
                        <button type="submit" class="btn btn-primary text-white mr-2 mb-2 mb-md-0">Daftar</button>
                        <a href="<?= base_url('login') ?>" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                          <i class="btn-icon-prepend" data-feather="camera"></i>
                          Masuk dengan QR Code
                        </a>
                      </div>
                      <a href="<?= base_url('masuk') ?>" class="d-block mt-3 text-muted">Sudah punya Akun? Masuk</a>
                    </form>
<?= $this->endSection() ?>