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
								<form class="forms-sample" action="<?= base_url('dashboard/poli/store') ?>" method="POST">
									<div class="form-group row">
										<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Poli</label>
										<div class="col-sm-9">
											<input name="title" type="text" class="form-control" id="exampleInputUsername2" placeholder="Masukkan Nama Poli">
										</div>
									</div>
									<div class="form-group row">
										<label for="exampleInputEmail2" class="col-sm-3 col-form-label">Kode Poli</label>
										<div class="col-sm-9">
											<input name="kode" type="text" class="form-control" id="exampleInputEmail2" autocomplete="off" placeholder="Masukkan Kode Poli">
										</div>
									</div>
									<div class="form-group row">
										<label for="exampleInputMobile" class="col-sm-3 col-form-label">Limit Antrian</label>
										<div class="col-sm-9">
											<input name="limits" type="number" class="form-control" id="exampleInputMobile" placeholder="Masukkan Limit Antrian">
										</div>
									</div>
									<button type="submit" class="btn btn-primary mr-2">Simpan</button>
								</form>
							</div>
						</div>
					</div>
				</div>

<?= $this->endSection() ?>