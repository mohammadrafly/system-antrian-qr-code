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
                                <a href="<?= base_url('dashboard/poli/add') ?>" class="btn btn-primary mr-2 mb-4">Tambah <?= $pages ?></a>
                                <div class="table-responsive">
                                    <table id="dataTableExample" class="table">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Poli</th>
                                            <th>Kode Poli</th>
                                            <th>Limit</th>
                                            <th>Opsi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no = 1; 
                                        foreach($content as $row): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row['title'] ?></td>
                                            <td><?= $row['kode'] ?></td>
                                            <td><?= $row['limits'] ?></td>
                                            <td>
                                                <a href="<?= base_url('dashboard/poli/delete/'.$row['id']) ?>" class="btn btn-danger">Delete</a>
                                                <a href="<?= base_url('dashboard/poli/edit/'.$row['id']) ?>" class="btn btn-info">Edit</a>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
					</div>
				</div>

<?= $this->endSection() ?>