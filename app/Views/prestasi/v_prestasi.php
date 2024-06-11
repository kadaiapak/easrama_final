<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

 <!-- page content -->
 <div class="right_col" role="main">
    <div class="">
		<div class="page-title">
            <div class="title_left">
                <h3>Prestasi</h3>
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
            </div>
			
        </div>
        <div class="clearfix"></div>
        <div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Title Sesi Prestasi</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
						<div>
							<a href="<?= base_url("admin/prestasi/edit-header"); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit" style="margin-right: 5px;"></i>Edit Title Prestasi</a>
						</div>
                        <br />
                        <div class="form-group">
                            <label for="pengaturan_nama">Judul Kepala :</label>
                            <input type="text" readonly value="<?= $headerPrestasi['pengaturan_nama']; ?>" class="form-control"/>
                        </div>
						<div class="form-group">
                            <label>Deskripsi :</label>
                            <textarea readonly class="form-control" cols="10" rows="3"><?= $headerPrestasi['pengaturan_isi']; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
			<div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Daftar Prestasi</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
						<div>
							<a href="<?= base_url("admin/prestasi/tambah"); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus-square" style="margin-right: 5px;"></i>Tambah Prestasi</a>
						</div>
						<br>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
									<table id="datatable" class="table table-bordered">
										<thead>
											<tr class="headings">
												<th class="column-title">No</th>
												<th class="column-title">Sertifikat</th>
												<th class="column-title">Tanggal</th>
												<th class="column-title">Judul</th>
												<th class="column-title">Tingkat</th>
												<th class="column-title">Peringkat</th>
												<th class="column-title">Nim</th>
												<th class="column-title">Nama</th>
												<th class="column-title">Departemen</th>
												<th class="column-title no-link last"><span class="nobr">Aksi</span>
												</th>
											</tr>
										</thead>
										<tbody>
                                        	<?php $no = 1 ?>
											<?php foreach($semuaPrestasi as $sp): ?>
											<tr>
												<td class=" "><?= $no; ?></td>
												<td class=" "><img style="width: 50px; height: 50px;" src="<?= base_url('/upload/prestasi/'.$sp['prestasi_sertifikat']); ?>" alt=""></td>
												<td class=" "><?= $sp['created_at']; ?></td>
												<td class=" "><?= $sp['prestasi_judul']; ?></td>
												<td class=" "><?= $sp['prestasi_tingkat'] == 0 ? '' : $sp['prestasi_tingkat']  ; ?></td>
												<td class=" "><?= $sp['prestasi_peringkat']; ?></td>
												<td class=" "><?= $sp['prestasi_nim']; ?></td>
												<td class=" "><?= $sp['prestasi_nama']; ?></td>
												<td class=" "><?= $sp['nama_departemen']; ?></td>
												<td class="">
													<a href="<?= base_url('/admin/prestasi/edit/'.$sp['prestasi_slug']); ?>" class="btn btn-warning">Ubah</a>
													<?php if(session()->get('level') == 1) { ?>
														<a href="<?= base_url('/admin/prestasi/hapus/'.$sp['prestasi_id']); ?>" class="btn btn-danger">Hapus</a>
													<?php }else { ?>
														<a href="<?= base_url('/admin/prestasi/hapus/'.$sp['prestasi_id']); ?>" class="btn btn-danger">Permintaan Hapus</a>
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
        <!-- /page content -->


<?= $this->endSection(); ?>
