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
								<form class="forms-sample" action="<?= base_url('dashboard/user/update') ?>" method="POST" enctype="multipart/form-data">
                                    <input name="id" type="text" value="<?= $content['id'] ?>" class="form-control" hidden>
									<div class="form-group row">
										<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Username</label>
										<div class="col-sm-9">
											<input name="username" type="text" value="<?= $content['username'] ?>" class="form-control" id="exampleInputUsername2" placeholder="Masukkan Username">
										</div>
									</div>
									<div class="form-group row">
										<label for="exampleInputMobile" class="col-sm-3 col-form-label">Nama Lengkap</label>
										<div class="col-sm-9">
											<input name="name" type="text" value="<?= $content['name'] ?>" class="form-control" id="exampleInputMobile" placeholder="Masukkan Nama Lengkap">
										</div>
									</div>
									<div class="form-group row">
										<label for="exampleInputMobile" class="col-sm-3 col-form-label">Foto KTP</label>
										<div class="col-sm-9">
											<span>
													<?php if($content['foto_ktp'] == NULL): ?>
                                                        <img data-enlargeable width="100" style="cursor: zoom-in" src="<?= base_url('template/assets/images/dummy.png') ;?>" width="100px">
                                                    <?php elseif($content['foto_ktp']): ?>
                                                        <img data-enlargeable width="100" style="cursor: zoom-in" src="<?= base_url('foto_ktp/'.$content['foto_ktp']) ?>" width="100px">
                                                    <?php endif ?>
											</span>
											<input name="foto_ktp" type="file" id="myDropify" class="form-control"/>
										</div>		
									</div>
                                    <div class="form-group row">
										<label for="exampleInputMobile" class="col-sm-3 col-form-label">Nomor Identitas</label>
										<div class="col-sm-9">
											<input name="nomor_identitas" type="number" value="<?= $content['nomor_identitas'] ?>" class="form-control" id="exampleInputMobile" placeholder="Masukkan Nomor Identitas">
										</div>
									</div>
                                    <div class="form-group row">
										<label for="exampleInputMobile" class="col-sm-3 col-form-label">Nomor HP</label>
										<div class="col-sm-9">
											<input name="phone" type="number" value="<?= $content['phone'] ?>" class="form-control" id="exampleInputMobile" placeholder="Masukkan Nomor HP">
										</div>
									</div>
                                    <div class="form-group row">
										<label for="exampleInputMobile" class="col-sm-3 col-form-label">Tanggal Lahir</label>
										<div class="col-sm-9">
											<input name="tl" type="date" value="<?= $content['tl'] ?>" class="form-control" id="exampleInputMobile" placeholder="Masukkan Tanggal Lahir">
										</div>
									</div>
                                    <div class="form-group row">
										<label for="exampleInputMobile" class="col-sm-3 col-form-label">Alamat</label>
										<div class="col-sm-9">
                                            <textarea name="address" placeholder="Masukkan Alamat" value="<?= $content['address'] ?>" class="form-control"  id="exampleFormControlTextarea1" rows="5"><?= $content['address'] ?></textarea>
										</div>
									</div>
                                    <div class="form-group row">
										<label for="exampleInputMobile" class="col-sm-3 col-form-label">Jenis Kelamin</label>
										<div class="col-sm-9">
                                            <select name="gender" class="form-control" id="exampleFormControlSelect1">
                                                <option selected value="<?= $content['gender'] ?>"><?= $content['gender'] ?></option>
                                                <option value="laki-laki">Laki-Laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
										</div>
									</div>
                                    <div class="form-group row">
										<label for="exampleInputMobile" class="col-sm-3 col-form-label">Role</label>
										<div class="col-sm-9">
                                            <select name="role" class="form-control" id="exampleFormControlSelect1">
                                                <option selected value="<?= $content['role'] ?>"><?= $content['role'] ?></option>
                                                <option value="admin">Admin</option>
                                                <option value="pasien">Pasien</option>
                                            </select>
										</div>
									</div>
									<div class="form-group row">
										<label for="exampleInputMobile" class="col-sm-3 col-form-label">Status Akun</label>
										<div class="col-sm-9">
                                            <select name="status_account" class="form-control" id="exampleFormControlSelect1">
                                                <option selected value="<?= $content['status_account'] ?>"><?= $content['status_account'] ?></option>
                                                <?php if($content['status_account'] === 'verified'): ?>
													<option value="unverified">unverified</option>
												<?php elseif($content['status_account'] === 'unverified'): ?>
													<option value="verified">verified</option>
												<?php endif ?>
                                            </select>
										</div>
									</div>
									<button type="submit" class="btn btn-primary mr-2">Simpan</button>
								</form>
							</div>
						</div>
					</div>
				</div>

<?= $this->endSection() ?>