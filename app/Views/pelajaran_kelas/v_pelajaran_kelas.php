<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

 <!-- page content -->
 <div class="right_col" role="main">
    <div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Pelajaran Tiap Kelas</h3>
				<div class="button_container">
					<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target=".tambah_pelajaran_kelas"><i class="fa fa-plus-square" style="margin-right: 5px;"></i>Input Pelajaran Pada Kelas</button>
				</div>
			</div>
		</div>
        <div class="clearfix"></div>
        <div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="x_panel">
					<div class="x_title">
						<form class="form-horizontal form-label-left" method="POST" action="<?= base_url('admin/pelajaran-kelas/excel'); ?>">
                            <?= csrf_field(); ?>
                            <div class="form-group row">
                                <div class="col-md-2 col-sm-2">
                                    <select class="form-control <?= validation_show_error('id_kelas') ? 'is-invalid' : null; ?>" name="id_kelas">
                                        	<option value="">Pilih Kelas</option>
											<?php foreach ($semuaKelas as $sk) { ?>
												<option value="<?= $sk['id']; ?>"><?= $sk['nama']; ?></option>
											<?php } ?>
                                            <option value="">Semua Kelas</option>
                                    </select>
                                </div>
                                <div class="col-md-5 col-sm-5">
                                    <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-file-excel-o" style="margin-right: 5px;"></i>Download Excel</button>
                                    <button type="submit" formtarget="_blank" formaction="<?= base_url('admin/pelajaran-kelas/pdf'); ?>" class="btn btn-info btn-lg d-inline"><i class="fa fa-file-pdf-o" style="margin-right: 5px;"></i>Download PDF</button>
                                    <button type="submit" formaction="<?= base_url('admin/pelajaran-kelas/id-kelas'); ?>" class="btn btn-primary btn-lg d-inline"><i class="fa fa-eye" style="margin-right: 5px;"></i>Tampil</button>
                                </div>
                            </div>
						</form>
					</div>
				</div>
			</div>
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Daftar Pelajaran Tiap Kelas</h2>
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
												<th class="column-title">Kelas</th>
												<th class="column-title">Hari</th>
												<th class="column-title">Jam</th>
												<th class="column-title">Pelajaran</th>
												<th class="column-title">Guru</th>
												<th class="column-title no-link last"><span class="nobr">Aksi</span>
												</th>
											</tr>
										</thead>
										<tbody>
                                        	<?php $no = 1 ?>
											<?php foreach($semuaPelajaranKelas as $spk): ?>
											<tr>
												<td class=" "><?= $no; ?></td>
												<td class=" "><?= $spk['nama_kelas']; ?></td>
												<td class=" "><?= $spk['nama_hari']; ?></td>
												<td class=" "><?= $spk['jam_pelajaran']; ?></td>
												<td class=" "><?= $spk['nama_pelajaran']; ?></td>
												<td class=" "><?= $spk['nama_guru']; ?></td>
												<td class="">
													<a href="<?= base_url('/admin/pelajaran-kelas/edit/'.$spk['id']); ?>" class="btn btn-warning"><i class="fa fa-edit" style="margin-right: 5px;"></i>Edit</a>
													<?php if(session()->get('level') == 1) { ?>
													<form action="<?= base_url('/admin/pelajaran-kelas/hapus/'.$spk['id']); ?>" method="post" class="d-inline">
														<?= csrf_field(); ?>
														<input type="hidden" name="_method" value="DELETE">
														<button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin dihaus?')"><i class="fa fa-trash-o" style="margin-right: 5px;"></i>Hapus</button>
													</form>
													<?php } ?>
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
        </div>
    </div>
</div>
<!-- form terima pengajuan oleh admin dan input no surat -->
<div class="modal fade tambah_pelajaran_kelas" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" style="max-width: 500px;">
        <form action="<?= base_url('/admin/pelajaran-kelas/simpan'); ?>" method="post" id="tambah_pelajaran_kelas">
            <?= csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-body">
					<div class="form-group row">
						<label for="id_kelas" class="col-md-3 col-sm-3">Kelas</label>
						<div class="col-md-9 col-sm-9">
							<select required name="id_kelas" id="id_kelas" class="form-control <?= validation_show_error('id_kelas') ? 'is-invalid' : null; ?>">
								<option value="">-- Pilih Kelas --</option>
								<?php foreach ($semuaKelas as $sk) { ?>
									<option value="<?= $sk['id']; ?>" <?= old('id_kelas') == $sk['id'] ? "selected" : null ; ?>><?= $sk['nama']; ?></option>
								<?php } ?>
							</select>
							<div class="invalid-feedback" style="text-align: left;">
								<?= validation_show_error('id_kelas'); ?>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="hari" class="col-md-3 col-sm-3">Hari</label>
						<div class="col-md-9 col-sm-9">
							<select required name="hari" id="hari" class="form-control <?= validation_show_error('hari') ? 'is-invalid' : null; ?>">
								<option value="">-- Pilih Hari --</option>
								<option value="1" <?= old('hari') == 1 ? "selected" : null ; ?>>Senin</option>
								<option value="2" <?= old('hari') == 2 ? "selected" : null ; ?>>Selasa</option>
								<option value="3" <?= old('hari') == 3 ? "selected" : null ; ?>>Rabu</option>
								<option value="4" <?= old('hari') == 4 ? "selected" : null ; ?>>Kamis</option>
								<option value="5" <?= old('hari') == 5 ? "selected" : null ; ?>>Jumat</option>
								<option value="6" <?= old('hari') == 6 ? "selected" : null ; ?>>Sabtu</option>
							</select>
							<div class="invalid-feedback" style="text-align: left;">
								<?= validation_show_error('hari'); ?>
							</div>
						</div>
					</div>
					<div class="form-group row ">
						<label class="control-label col-md-3 col-sm-3" for="jam_pelajaran">Jam Pelajaran</label>
						<div class="col-md-9 col-sm-9">
							<input type="text" name="jam_pelajaran"  class="form-control <?= validation_show_error('jam_pelajaran') ? 'is-invalid' : null; ?>" id="jam_pelajaran">
							<div class="invalid-feedback" style="text-align: left;">
								<?= validation_show_error('jam_pelajaran'); ?>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="id_pelajaran" class="col-md-3 col-sm-3">Pelajaran</label>
						<div class="col-md-9 col-sm-9">
							<select required name="id_pelajaran" id="id_pelajaran" class="form-control <?= validation_show_error('id_pelajaran') ? 'is-invalid' : null; ?>">
								<option value="">-- Pilih Pelajaran --</option>
								<?php foreach ($semuaPelajaran as $sp) { ?>
									<option value="<?= $sp['id']; ?>" <?= old('id_pelajaran') == $sp['id'] ? "selected" : null ; ?>><?= $sp['nama']; ?></option>
								<?php } ?>
							</select>
							<div class="invalid-feedback" style="text-align: left;">
								<?= validation_show_error('id_pelajaran'); ?>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="guru" class="col-md-3 col-sm-3">Guru</label>
						<div class="col-md-9 col-sm-9">
							<select required name="guru" id="guru" class="form-control <?= validation_show_error('guru') ? 'is-invalid' : null; ?>">
								<option value="">-- Pilih Guru --</option>
								<?php foreach ($semuaGuru as $sg) { ?>
									<option value="<?= $sg['user_id']; ?>" <?= old('guru') == $sg['user_id'] ? "selected" : null ; ?>><?= $sg['nama_asli']; ?></option>
								<?php } ?>
							</select>
							<div class="invalid-feedback" style="text-align: left;">
								<?= validation_show_error('guru'); ?>
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
