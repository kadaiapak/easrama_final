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
            <div class="col-md-12 col-sm-12">
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
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Menu Utama Halaman</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
						<div>
							<a href="<?= base_url("/admin/menu/tambah-menu"); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus-square" style="margin-right: 5px;"></i>Tambah Menu Utama</a>
						</div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card-box table-responsive">
									<table class="table table-striped">
										<thead>
											<tr class="headings">
												<th class="column-title" width="3%">No </th>
												<th class="column-title" width="15%">Nama Menu</th>
												<th class="column-title" width="10%">Tipe Menu</th>
												<th class="column-title" width="42%">Keterangan</th>
												<th class="column-title" width="3%">Nomor Urut Tampilan</th>
												<th class="column-title" width="10%">Aktif</th>
												<th class="column-title no-link last text-center" width="30%"><span class="nobr">Aksi</span>
												</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1 ?>
											<?php foreach($semuaMenu as $sm): ?>
												<?php if($sm['level'] == 'main_menu' || $sm['level'] == 'single_menu') { ?>
												<tr>
													<td><?= $no; ?></td>
													<td><?= $sm['nama_menu']; ?></td>
													<td><?= $sm['level']; ?></td>
													<td><?= $sm['level'] == 'main_menu' ? 'Jenis Menu yang memiliki anak atau submenu' : ($sm['level'] == 'single_menu' ? 'Jenis menu yang tidak memiliki anak atau submenu, sehingga langsung menampilkan halaman yang terhubung' : null)  ?></td>
													<td><?= $sm['no_urut']; ?></td>
													<td><?= $sm['is_active'] == 1 ? "<span class='badge badge-success'>Aktif</span>" : ($sm['is_active'] == 0 ? "<span class='badge badge-danger'>Tidak Aktif</span>" : null) ; ?></td>
													<td>
														<a href="<?= base_url('/admin/menu/edit-menu/'.$sm['kode_menu']); ?>" class="btn btn-warning">Edit</a>
														<?php if(session()->get('level') == 1) { ?>
														<form action="<?= base_url('/admin/menu/hapus/'.$sm['kode_menu']); ?>" method="post" class="d-inline">
															<?= csrf_field(); ?>
															<input type="hidden" name="_method" value="DELETE">
															<button type="submit" class="btn btn-danger" onclick="return confirm('yakin menu ini dihapus?')">Hapus</button>
														</form>
														<?php } ?>
													</td>
													<?php $no++ ?>
												</tr>
												<?php } ?>
											<?php endforeach; ?>
										</tbody>
									</table>
                        		</div>
                    		</div>
                		</div>
            		</div>
            	</div>
    		</div>
			<div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Sub Menu Halaman</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
						<div>
							<a href="<?= base_url("/admin/menu/tambah-submenu"); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus-square" style="margin-right: 5px;"></i>Tambah Sub Menu</a>
						</div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card-box table-responsive">
									<table class="table table-striped">
										<thead>
											<tr class="headings">
												<th>No</th>
												<th>Nama Sub Menu</th>
												<th>Nama Menu Utamanya</th>
												<th>Nomor Urut</th>
												<th>Aktif</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1 ?>
											<?php foreach($semuaMenu as $sm): ?>
												<?php if($sm['level'] == 'sub_menu') { ?>
												<tr>
													<td ><?= $no; ?></td>
													<td><?= $sm['nama_menu']; ?></td>
													<td><?= $sm['nama_join_menu']; ?></td>
													<td><?= $sm['no_urut']; ?></td>
													<td><?= $sm['is_active'] == 1 ? "<span class='badge badge-success'>Aktif</span>" : ($sm['is_active'] == 0 ? "<span class='badge badge-danger'>Tidak Aktif</span>" : null) ; ?></td>
													<td>
														<a href="<?= base_url('/admin/menu/edit-submenu/'.$sm['kode_menu']); ?>" class="btn btn-warning">Edit</a>
														<?php if(session()->get('level') == 1) { ?>
														<form action="<?= base_url('/admin/menu/hapus/'.$sm['kode_menu']); ?>" method="post" class="d-inline">
															<?= csrf_field(); ?>
															<input type="hidden" name="_method" value="DELETE">
															<button type="submit" class="btn btn-danger" onclick="return confirm('yakin menu ini dihapus?')">Hapus</button>
														</form>
														<?php } ?>
													</td>
													<?php $no++ ?>
												</tr>
												<?php } ?>
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
