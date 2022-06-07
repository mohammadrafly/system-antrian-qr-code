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
								<form class="forms-sample" action="<?= base_url('dashboard/antrian/update') ?>" method="POST">
                                    <input name="id" type="number" class="form-control" value="<?= $content['id'] ?>" hidden>
                                    <div class="form-group row">
										<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Status Antrian</label>
										<div class="col-sm-9">
                                            <select name="status" class="form-control" id="exampleFormControlSelect1">
                                                <option selected value="<?= $content['status'] ?>"><?= $content['status'] ?></option>
                                                <option value="SELESAI">SELESAI</option>
                                                <option value="BELUM SELESAI">BELUM SELESAI</option>
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