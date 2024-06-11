<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

 <!-- page content -->
 <div class="right_col" role="main">
    <div class="">
	<div class="page-title">
            <div class="title_left">
                <h3>Berita</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Daftar berita</h2>
                        <div class="clearfix"></div>
                    </div>
					
                    <div class="x_content">
						<div>
							<a href="<?= base_url("admin/berita/tambah"); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus-square" style="margin-right: 5px;"></i>Tambah Berita</a>
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
												<th class="column-title">Judul Berita </th>
												<th class="column-title">Kategori </th>
												<th class="column-title">Sampul</th>
												<th class="column-title">Penulis</th>
												<th class="column-title">Tayang</th>
												<th class="column-title">Tampil</th>
												<th class="column-title no-link last"><span class="nobr">Aksi</span>
												</th>
											</tr>
										</thead>
										<tbody>
                                        	<?php $no = 1 ?>
											<?php foreach($semua_berita as $sb): ?>
											<tr>
												<td class=" "><?= $no; ?></td>
												<td class=" "><?= $sb['berita_judul']; ?></td>
												<td class=" "><?= $sb['nama_kategori']; ?></td>
												<td class=" "><img style="width: 50px; height: 50px;" src="<?= base_url('/upload/berita_sampul/'.$sb['berita_sampul']); ?>" alt=""></td>
												<td class=" "><?= $sb['nama_user']; ?></td>
												<td class=" "><?= $sb['berita_tayang']; ?></td>
												<td class=" "><?= $sb['berita_tampil'] == 1 ? "<span class='badge badge-success'>Aktif</span>" : ($sb['berita_tampil'] ==  0 ? "<span class='badge badge-warning'>Tidak Aktif</span>" : null)  ?></td>
												<td class="">
													<a href="<?= base_url('/admin/berita/detail/'.$sb['berita_id']); ?>" class="btn btn-primary">Detail</a>
													<a href="<?= base_url('/admin/berita/edit/'.$sb['berita_slug']); ?>" class="btn btn-warning">Ubah</a>
													<?php if(session()->get('level') == 1) { ?>
													<form action="<?= base_url('/admin/berita/hapus/'.$sb['berita_id']); ?>" method="post" class="d-inline">
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
