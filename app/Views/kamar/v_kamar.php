<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

 <!-- page content -->
 <div class="right_col" role="main">
    <div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Kamar</h3>
				<div>
					<a href="<?= base_url("/admin/kamar/tambah"); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus-square" style="margin-right: 5px;"></i>Tambah Kamar</a>
				</div>
			</div>
		</div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Daftar Kamar</h2>
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
												<th class="column-title">Nama</th>
												<th class="column-title">Kapasitas</th>
												<th class="column-title">Total Penghuni</th>
												<th class="column-title">Keterangan</th>
												<th class="column-title no-link last"><span class="nobr">Aksi</span>
												</th>
											</tr>
										</thead>
										<tbody>
                                        	<?php $no = 1 ?>
											<?php foreach($semuaKamar as $sk): ?>
											<tr>
												<td class=" "><?= $no; ?></td>
												<td class=" "><?= $sk['nama']; ?></td>
												<td class=" "><?= $sk['kapasitas']; ?></td>
												<td class=" "><?= $sk['total_penghuni']; ?></td>
												<td class=" "><?= $sk['keterangan']; ?></td>
												<td class="">
													<a href="<?= base_url('/admin/kamar/edit/'.$sk['slug']); ?>" class="btn btn-warning"><i class="fa fa-edit" style="margin-right: 5px;"></i>Edit</a>
													<form action="<?= base_url('/admin/kamar/hapus/'.$sk['id']); ?>" method="post" class="d-inline">
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
        </div>
    </div>
</div>
        <!-- /page content -->


<?= $this->endSection(); ?>
