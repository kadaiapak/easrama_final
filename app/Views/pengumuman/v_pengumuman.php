<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

 <!-- page content -->
 <div class="right_col" role="main">
    <div class="">
	<div class="page-title">
            <div class="title_left">
                <h3>Pengumuman</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Daftar Pengumuman</h2>
                        <div class="clearfix"></div>
                    </div>
					
                    <div class="x_content">
						<div>
							<a href="<?= base_url("admin/pengumuman/tambah"); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus-square" style="margin-right: 5px;"></i>Buat Pengumuman Baru</a>
						</div>
						<br>
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
												<th class="column-title">No </th>
												<th class="column-title">Tanggal </th>
												<th class="column-title" style="text-align: center;">Judul Berita </th>
												<th class="column-title" style="text-align: center;">Sampul</th>
												<th class="column-title" style="text-align: center;">Penulis</th>
												<th class="column-title" style="text-align: center;">Tayang</th>
												<th class="column-title">Tampil</th>
												<th class="column-title no-link last" style="text-align: center;"><span class="nobr">Aksi</span>
												</th>
											</tr>
										</thead>
										<tbody>
                                        	<?php $no = 1 ?>
											<?php foreach($semuaPengumuman as $sp): ?>
											<tr>
												<td class=" "><?= $no; ?></td>
												<td class=" "><?= tanggal_indo($sp['created_at']) ?></td>
												<td class=" "><?= $sp['berita_judul']; ?></td>
												<td class=" ">
													<?php if($sp['berita_sampul'] == null) { ?>
													Tidak ada Gambar
													<?php }else { ?>
													<img style="width: 50px; height: 50px;" src="<?= base_url('/upload/berita_sampul/'.$sp['berita_sampul']); ?>" alt="">
													<?php } ?>
												</td>
												<td class=" "><?= $sp['nama_user']; ?></td>
												<td class=" "><?= $sp['berita_tayang']; ?></td>
												<td class=" "><?= $sp['berita_tampil'] == 1 ? "<span class='badge badge-success'>Aktif</span>" : ($sp['berita_tampil'] ==  0 ? "<span class='badge badge-warning'>Tidak Aktif</span>" : null)  ?></td>
												<td class="">
													<a href="<?= base_url('/admin/pengumuman/detail/'.$sp['berita_id']); ?>" class="btn btn-primary"><i class="fa fa-file-text-o" style="margin-right: 5px;"></i>Detail</a>
													<a href="<?= base_url('/admin/pengumuman/edit/'.$sp['berita_slug']); ?>" class="btn btn-warning"><i class="fa fa-edit" style="margin-right: 5px;"></i>Ubah</a>
													<?php if(session()->get('level') == 1) { ?>
													<form action="<?= base_url('/admin/pengumuman/hapus/'.$sp['berita_id']); ?>" method="post" class="d-inline">
													<?= csrf_field(); ?>
														<input type="hidden" name="_method" value="DELETE">
														<button type="submit" class="btn btn-danger" onclick="return confirm('yakin menu ini dihapus?')">Hapus</button>
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
        <!-- /page content -->


<?= $this->endSection(); ?>
