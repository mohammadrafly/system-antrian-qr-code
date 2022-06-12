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
                                <a href="<?= base_url('dashboard/user/add') ?>" class="btn btn-primary mr-2 mb-4">Tambah <?= $pages ?></a>
                                <div class="table-responsive">
                                    <table id="dataTableExample" class="table">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Nama Lengkap</th>
                                            <th>Nomor Identitas</th>
                                            <th>Nomor HP</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Alamat</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Status</th>
                                            <th>Foto KTP</th>
                                            <th>Opsi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no = 1; 
                                        foreach($content as $row): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row->username ?></td>
                                            <td><?= $row->name ?></td>
                                            <td><?= $row->nomor_identitas ?></td>
                                            <td><?= $row->phone ?></td>
                                            <td><?= $row->tl ?></td>
                                            <td><?= $row->address ?></td>
                                            <td><?= $row->gender ?></td>
                                            <td>
                                            <?php if($row->status_account === 'verified'): ?>
                                                <span class="badge bg-success text-white"><?= $row->status_account ?></span>
                                            <?php elseif($row->status_account === 'unverified'): ?>
                                                <span class="badge bg-warning text-white"><?= $row->status_account ?></span>
                                            <?php endif ?>
                                            </td>
                                            <td><img data-enlargeable width="100" style="cursor: zoom-in" src="<?= base_url('foto_ktp/'.$row->foto_ktp) ?>" width="100px"/></td>
                                            <td>
                                                <a href="<?= base_url('dashboard/user/delete/'.$row->id) ?>" class="btn btn-danger">Delete</a>
                                                <a href="<?= base_url('dashboard/user/edit/'.$row->id) ?>" class="btn btn-info">Edit</a>
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