<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

 <!-- page content -->
 <div class="right_col" role="main">
    <div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Data Santri Tiap Kamar</h3>
				<div class="button_container">
					<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target=".tambah_penghuni_kamar"><i class="fa fa-plus-square" style="margin-right: 5px;"></i>Input Kamar Santri</button>
				</div>
			</div>
		</div>
        <div class="clearfix"></div>
        <div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="x_panel">
					<div class="x_title">
						<form class="form-horizontal form-label-left" method="POST" action="<?= base_url('admin/penghuni-kamar/excel'); ?>">
                            <?= csrf_field(); ?>
                            <div class="form-group row">
                                <div class="col-md-2 col-sm-2">
                                    <select class="form-control <?= validation_show_error('id_kamar') ? 'is-invalid' : null; ?>" name="id_kamar">
                                        	<option value="">Pilih Kamar</option>
											<?php foreach ($semuaKamar as $sk) { ?>
												<option value="<?= $sk['id']; ?>"><?= $sk['nama']; ?></option>
											<?php } ?>
                                            <option value="">Semua Kamar</option>
                                    </select>
                                </div>
                                <div class="col-md-5 col-sm-5">
                                    <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-file-excel-o" style="margin-right: 5px;"></i>Download Excel</button>
                                    <button type="submit" formtarget="_blank" formaction="<?= base_url('admin/penghuni-kamar/pdf'); ?>" class="btn btn-info btn-lg d-inline"><i class="fa fa-file-pdf-o" style="margin-right: 5px;"></i>Download PDF</button>
                                    <button type="submit" formaction="<?= base_url('admin/penghuni-kamar/id-kamar'); ?>" class="btn btn-primary btn-lg d-inline"><i class="fa fa-eye" style="margin-right: 5px;"></i>Tampil</button>
                                </div>
                            </div>
						</form>
					</div>
				</div>
			</div>
            <div class="col-md-7 col-sm-7">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Daftar Santri Sudah Ada Kamar</h2>
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
									<table id="datatable" class="table table-bordered">
										<thead>
											<tr class="headings">
												<th class="column-title">No</th>
												<th class="column-title">Kamar</th>
												<th class="column-title">Nama Santri</th>
												<th class="column-title">Jenis Kelamin</th>
												<th class="column-title no-link last"><span class="nobr">Aksi</span>
												</th>
											</tr>
										</thead>
										<tbody>
                                        	<?php $no = 1 ?>
											<?php foreach($semuaSiswaSudahAdaKamar as $sssak): ?>
											<tr>
												<td class=" "><?= $no; ?></td>
												<td class=" "><?= $sssak['nama_kamar']; ?></td>
												<td class=" "><?= $sssak['nama']; ?></td>
												<td class=" "><?= $sssak['jk'] == 'l' ? 'Laki - laki' : ($sssak['jk'] == 'p' ? 'Perempuan' : null); ?></td>
												<td class="">
													<a href="<?= base_url('/admin/penghuni-kamar/edit/'.$sssak['id']); ?>" class="btn btn-warning"><i class="fa fa-edit" style="margin-right: 5px;"></i>Edit</a>
													<form action="<?= base_url('/admin/penghuni-kamar/hapus/'.$sssak['id']); ?>" method="post" class="d-inline">
														<?= csrf_field(); ?>
														<input type="hidden" name="_method" value="DELETE">
														<button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin dihaus?')"><i class="fa fa-trash-o" style="margin-right: 5px;"></i>Hapus</button>
													</form>
												</td>
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
			<div class="col-md-5 col-sm-5">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Daftar Santri Belum Ada Kamar</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
									<table id="datatable" class="table table-bordered">
										<thead>
											<tr class="headings">
												<th class="column-title">No</th>
												<th class="column-title">Nama Santri</th>
												<th class="column-title">Jenis Kelamin</th>
											</tr>
										</thead>
										<tbody>
                                        	<?php $no = 1 ?>
											<?php foreach($semuaSiswaBelumAdaKamar as $ssbak): ?>
											<tr>
												<td class=" "><?= $no; ?></td>
												<td class=" "><?= $ssbak['nama']; ?></td>
												<td class=" "><?= $ssbak['jk'] == 'l' ? 'Laki - laki' : ($ssbak['jk'] == 'p' ? 'Perempuan' : null); ?></td>
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
							<select name="id_kamar" id="id_kamar" class="form-control <?= validation_show_error('id_kamar') ? 'is-invalid' : null; ?>" required>
								<option value="">-- Pilih Kamar --</option>
								<?php foreach ($semuaKamar as $sk) { ?>
									<option value="<?= $sk['id']; ?>" <?= old('id_kamar') == $sk['id'] ? "selected" : null ; ?>><?= $sk['nama']; ?></option>
								<?php } ?>
							</select>
							<div class="invalid-feedback" style="text-align: left;">
								<?= validation_show_error('id_kamar'); ?>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="id_siswa" class="col-md-3 col-sm-3"><b>Santri</b></label>
						<div class="col-md-9 col-sm-9">
							<select name="id_siswa" id="id_siswa" class="form-control <?= validation_show_error('id_siswa') ? 'is-invalid' : null; ?>" required>
								<option value="">-- Pilih Santri --</option>
								<?php foreach ($semuaSiswaBelumAdaKamar as $ssbak) { ?>
									<option value="<?= $ssbak['id']; ?>" <?= old('id_siswa') == $ssbak['id'] ? "selected" : null ; ?>><?= $ssbak['nama']; ?> / <?= $ssbak['jk'] == 'p' ? 'Perempuan' : ($ssbak['jk'] == 'l' ? 'Laki - laki' : null); ?></option>
								<?php } ?>
							</select>
							<div class="invalid-feedback" style="text-align: left;">
								<?= validation_show_error('id_siswa'); ?>
							</div>
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
