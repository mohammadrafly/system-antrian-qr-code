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
                                <div class="table-responsive">
                                    <table id="dataTableExample" class="table">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pasien</th>
                                            <th>Mama Poli</th>
                                            <th>Nomor Antrian</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no = 1; 
                                        foreach($content as $row): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row->user_name ?></td>
                                            <td><?= $row->poli_name ?></td>
                                            <td><?= $row->nomor_antrian ?></td>
                                            <td><?= $row->date ?></td>
                                            <td>
                                                <?php if($row->status === 'BELUM SELESAI'): ?>
                                                    <span class="badge badge-danger"><?= $row->status ?></span>
                                                <?php elseif($row->status === 'SELESAI'): ?>
                                                    <span class="badge badge-success"><?= $row->status ?></span>
                                                <?php endif ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('Antrians/edit/'.$row->id) ?>" class="btn btn-info">Edit Status</a>
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