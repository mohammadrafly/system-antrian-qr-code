<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>

                <div class="row">
					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h6 class="card-title"><?= $pages ?></h6>
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
								<form class="forms-sample" action="<?= base_url('dashboard/profile/update') ?>" method="POST">
                                    <input name="id" value="<?= $content['id'] ?>" type="text" hidden>
									<div class="form-group row">
										<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Username</label>
										<div class="col-sm-9">
											<input name="username" value="<?= $content['username'] ?>" type="text" class="form-control" id="exampleInputUsername2" placeholder="Username">
										</div>
									</div>
									<div class="form-group row">
										<label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama Lengkap</label>
										<div class="col-sm-9">
											<input name="name" value="<?= $content['name'] ?>" type="text" class="form-control" id="exampleInputEmail2" autocomplete="off" placeholder="Nama Lengkap">
										</div>
									</div>
                                    <div class="form-group row">
										<label for="exampleInputMobile" class="col-sm-3 col-form-label">Phone</label>
										<div class="col-sm-9">
											<input name="phone" value="<?= $content['phone'] ?>" type="number" class="form-control" id="exampleInputMobile" placeholder="Mobile number">
										</div>
									</div>
									<div class="form-group row">
										<label for="exampleInputMobile" class="col-sm-3 col-form-label">Nomor Identitas</label>
										<div class="col-sm-9">
											<input name="nomor_identitas" value="<?= $content['nomor_identitas'] ?>" type="number" class="form-control" id="exampleInputMobile" placeholder="Nomor Identitas">
										</div>
									</div>
									<div class="form-group row">
										<label for="exampleInputPassword2" class="col-sm-3 col-form-label">Tanggal Lahir</label>
										<div class="col-sm-9">
											<input type="date" name="tl" value="<?= $content['tl'] ?>" class="form-control" id="exampleInputPassword2" autocomplete="off" placeholder="Tanggal Lahir">
										</div>
									</div>
                                    <div class="form-group row">
										<label for="exampleInputPassword2" class="col-sm-3 col-form-label">Alamat</label>
										<div class="col-sm-9">
                                            <textarea name="address" value="<?= $content['address'] ?>" class="form-control" id="exampleFormControlTextarea1" rows="5"><?= $content['address'] ?></textarea>
										</div>
									</div>
                                    <div class="form-group row">
                                        <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-9">
                                            <select name="gender" class="form-control" id="exampleFormControlSelect1">
                                                <option selected value="<?= $content['gender'] ?>"><?= $content['gender'] ?></option>
                                                <option value="laki-laki">Laki-Laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
									<button type="submit" class="btn btn-primary mr-2">Simpan</button>
								</form>
							</div>
						</div>
					</div>
				</div>

                <div class="row">
					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h6 class="card-title">Update Password</h6>
                                <?php if (!empty(session()->getFlashdata('password_success'))) : ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?php echo session()->getFlashdata('password_success'); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty(session()->getFlashdata('password_error'))) : ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <?php echo session()->getFlashdata('password_error'); ?>
                                    </div>
                                <?php endif; ?>
								<form class="forms-sample" action="<?= base_url('dashboard/profile/update/password') ?>" method="POST">
									<div class="form-group row">
										<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Password Lama</label>
										<div class="col-sm-9">
											<input name="old_password" type="password" class="form-control" id="exampleInputUsername2" placeholder="Password">
										</div>
									</div>
									<div class="form-group row">
										<label for="exampleInputEmail2" class="col-sm-3 col-form-label">Password Baru</label>
										<div class="col-sm-9">
											<input name="new_password" type="password" class="form-control" id="exampleInputEmail2" autocomplete="off" placeholder="Password baru">
										</div>
									</div>
									<div class="form-group row">
										<label for="exampleInputMobile" class="col-sm-3 col-form-label">Konfirmasi Password Baru</label>
										<div class="col-sm-9">
											<input name="new_password" type="password" class="form-control" id="exampleInputMobile" placeholder="Konfirmasi Password Baru">
										</div>
									</div>
									<button type="submit" class="btn btn-primary mr-2">Simpan</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!--
                <div class="row">
					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h6 class="card-title">Cetak Kartu QRCode</h6>
								<form class="forms-sample" action="<?= base_url('dashboard/profile/cetak/qrcode') ?>" method="POST">
									<div class="form-group row">
										<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Password</label>
										<div class="col-sm-9">
											<input name="password" type="password" class="form-control" id="exampleInputUsername2" placeholder="Masukkan Password">
										</div>
									</div>
									<button type="submit" class="btn btn-primary mr-2">Cetak</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				-->

<?= $this->endSection() ?>