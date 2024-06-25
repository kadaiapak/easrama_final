<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

 <!-- page content -->
 <div class="right_col" role="main">
    <div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Histori Santri</h3>
			</div>
		</div>
        <div class="clearfix"></div>
        <div class="row">
			<div class="col-md-6 col-sm-12">
				<div class="x_panel">
					<div class="x_title">
						<form class="form-horizontal form-label-left" method="POST" action="<?= base_url('admin/histori-kelas/excel'); ?>">
                            <?= csrf_field(); ?>
                            <div class="form-group row">
                                <div class="col-md-4 col-sm-4">
                                    <select class="form-control" name="id_kelas">
                                        	<option value="">Pilih Kelas</option>
											<?php foreach ($semuaKelas as $sk) { ?>
												<option value="<?= $sk['id']; ?>" <?= session()->get('id_kelas') && session()->get('id_kelas') == $sk['id'] ? 'selected' : null; ?>><?= $sk['nama']; ?></option>
											<?php } ?>
                                            <option value="" <?= !session()->get('id_kelas') ? 'selected' : null; ?>>Semua Kelas</option>
                                    </select>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <button type="submit" formaction="<?= base_url('admin/histori-kelas/id-kelas'); ?>" class="btn btn-primary btn-lg d-inline"><i class="fa fa-eye" style="margin-right: 5px;"></i>Tampil</button>
                                    <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-file-excel-o" style="margin-right: 5px;"></i>Download Excel</button>
                                    <button type="submit" formtarget="_blank" formaction="<?= base_url('admin/histori-kelas/pdf'); ?>" class="btn btn-info btn-lg d-inline"><i class="fa fa-file-pdf-o" style="margin-right: 5px;"></i>Download PDF</button>
                                </div>
                            </div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="x_panel">
					<div class="x_title">
						<form class="form-horizontal form-label-left" method="POST" action="<?= base_url('admin/histori-kamar/excel'); ?>">
                            <?= csrf_field(); ?>
                            <div class="form-group row">
                                <div class="col-md-4 col-sm-4">
                                    <select class="form-control" name="id_kamar">
                                        	<option value="">Pilih Kamar</option>
											<?php foreach ($semuaKamar as $sk) { ?>
												<option value="<?= $sk['id']; ?>" <?= session()->get('id_kamar') && session()->get('id_kamar') == $sk['id'] ? 'selected' : null; ?>><?= $sk['nama']; ?></option>
											<?php } ?>
                                            <option value="" <?= !session()->get('id_kamar') ? 'selected' : null; ?>>Semua Kamar</option>
                                    </select>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <button type="submit" formaction="<?= base_url('admin/histori-kamar/id-kamar'); ?>" class="btn btn-primary btn-lg d-inline"><i class="fa fa-eye" style="margin-right: 5px;"></i>Tampil</button>
                                    <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-file-excel-o" style="margin-right: 5px;"></i>Download Excel</button>
                                    <button type="submit" formtarget="_blank" formaction="<?= base_url('admin/histori-kamar/pdf'); ?>" class="btn btn-info btn-lg d-inline"><i class="fa fa-file-pdf-o" style="margin-right: 5px;"></i>Download PDF</button>
                                </div>
                            </div>
						</form>
					</div>
				</div>
			</div>
            <div class="col-md-6 col-sm-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Histori Pergantian Kelas Santri</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
									<?php if(session()->getFlashdata('sukses')) : ?>
										<div class="alert alert-success alert-dismissible " role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
											</button>
											<strong>Sukses!</strong> <?= session()->getFlashdata('sukses'); ?>.
										</div>
									<?php endif; ?>
									<?php if(session()->getFlashdata('gagal')) : ?>
										<div class="alert alert-danger alert-dismissible " role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
											</button>
											<strong>Gagal!</strong> <?= session()->getFlashdata('gagal'); ?>.
										</div>
									<?php endif; ?>
									<table class="table table-bordered">
										<thead>
											<tr class="headings">
												<th class="column-title">No</th>
												<th class="column-title">Santri</th>
												<th class="column-title">Kelas</th>
												<th class="column-title">Keterangan</th>
												<th class="column-title">Tanggal</th>
												</th>
											</tr>
										</thead>
										<tbody>
                                        	<?php $no = 1 ?>
											<?php foreach($semuaHistoriKelas as $shk): ?>
											<tr>
												<td class=" "><?= $no; ?></td>
												<td class=" "><?= $shk['nama_siswa']; ?></td>
												<td class=" "><?= $shk['nama_kelas']; ?></td>
												<td class=" "><?= $shk['keterangan']; ?></td>
												<td class=" "><?= tanggal_indo($shk['created_at']) ; ?></td>
												<?php $no++ ?>
											</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
                        		</div>
                    		</div>
                		</div>
            		</div>
            	</div>
    		</div>
			<div class="col-md-6 col-sm-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Histori Pergantian Kamar Santri</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
									<table class="table table-bordered">
										<thead>
											<tr class="headings">
												<th class="column-title">No</th>
												<th class="column-title">Nama Santri</th>
												<th class="column-title">Kamar</th>
												<th class="column-title">Keterangan</th>
												<th class="column-title">Tanggal</th>
											</tr>
										</thead>
										<tbody>
                                        	<?php $no = 1 ?>
											<?php foreach($semuaHistoriKamar as $shka): ?>
											<tr>
												<td class=" "><?= $no; ?></td>
												<td class=" "><?= $shka['nama_siswa']; ?></td>
												<td class=" "><?= $shka['nama_kamar']; ?></td>
												<td class=" "><?= $shka['keterangan']; ?></td>
												<td class=" "><?= tanggal_indo($shka['created_at']); ?></td>
												<?php $no++ ?>
											</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
                        		</div>
                    		</div>
                		</div>
            		</div>
            	</div>
    		</div>
        </div>
    </div>
</div>
<!-- form terima pengajuan oleh admin dan input no surat -->
<div class="modal fade tambah_penghuni_kamar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" style="max-width: 500px;">
        <form action="<?= base_url('/admin/penghuni-kamar/simpan'); ?>" method="post" id="tambah_penghuni_kamar">
            <?= csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-body">
					<div class="form-group row">
						<label for="id_kamar" class="col-md-3 col-sm-3"><b>Kamar</b></label>
						<div class="col-md-9 col-sm-9">
							<select name="id_kamar" id="id_kamar" class="form-control" required>
								<option value="">-- Pilih Kamar --</option>
								<?php foreach ($semuaKamar as $sk) { ?>
									<option value="<?= $sk['id']; ?>" <?= old('id_kamar') == $sk['id'] ? "selected" : null ; ?>><?= $sk['nama']; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
                </div>
                <div class="modal-footer" style="border: none; justify-content: center;">
                    <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal"><i class="fa fa-chevron-circle-left" style="margin-right: 5px;"></i> Kembali</button>
                    <button type="submit" name="action" class="btn btn-primary btn-sm"><i class="fa fa-save" style="margin-right: 5px;"></i>Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--  -->
        <!-- /page content -->
<?= $this->endSection(); ?>
