<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

 <!-- page content -->
 <div class="right_col" role="main">
    <div class="">
		<div class="page-title">
            <div class="title_left">
                <h3>Halaman</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Daftar Halaman</h2>
                        <div class="clearfix"></div>
                    </div>
					
                    <div class="x_content">
						<div>
							<a href="<?= base_url("admin/halaman/tambah"); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus-square" style="margin-right: 5px;"></i>Tambah Halaman</a>
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
												<th class="column-title">Nama Halaman</th>
												<th class="column-title">Menu Halaman</th>
												<th class="column-title">Penulis</th>
												<th class="column-title">Tampil</th>
												<th class="column-title no-link last"><span class="nobr">Aksi</span>
												</th>
											</tr>
										</thead>
										<tbody>
                                        	<?php $no = 1 ?>
											<?php foreach($semuaHalaman as $sh): ?>
											<tr>
												<td class=" "><?= $no; ?></td>
												<td class=" "><?= $sh['halaman_nama']; ?></td>
												<td class=" "><?= $sh['nama_menu']; ?></td>
												<td class=" "><?= $sh['nama_penulis']; ?></td>
												<td class=" "><?= $sh['halaman_is_active'] == 1 ? "<span class='badge badge-success'>Aktif</span>" : ($sh['halaman_is_active'] ==  0 ? "<span class='badge badge-warning'>Tidak Aktif</span>" : null)  ?></td>
												<td class="">
													<a href="<?= base_url('/admin/halaman/detail/'.$sh['halaman_id']); ?>" class="btn btn-primary">Detail</a>
													<a href="<?= base_url('/admin/halaman/edit/'.$sh['halaman_slug']); ?>" class="btn btn-warning">Edit</a>
													<?php if(session()->get('level') == 1) { ?>
														<form action="<?= base_url('/admin/halaman/hapus/'.$sh['halaman_id']); ?>" method="post" class="d-inline">
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
<?= $this->endSection(); ?>
