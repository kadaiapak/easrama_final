<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

 <!-- page content -->
 <div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Daftar Video Profil</h2>
                        <div class="clearfix"></div>
                    </div>
					
                    <div class="x_content">
						<div>
							<a href="<?= base_url("admin/video-profil/tambah"); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus-square" style="margin-right: 5px;"></i>Tambah Video Profil</a>
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
												<th class="column-title">Judul Video Profil</th>
												<th class="column-title">Youtube Link</th>
												<th class="column-title">Video</th>
												<th class="column-title">Aktif</th>
												<th class="column-title">Penulis</th>
												<th class="column-title no-link last"><span class="nobr">Aksi</span>
												</th>
											</tr>
										</thead>
										<tbody>
                                        	<?php $no = 1 ?>
											<?php foreach($semua_video_profil as $svp): ?>
											<tr>
												<td class=" "><?= $no; ?></td>
												<td class=" "><?= $svp['vp_judul']; ?></td>
												<td class=" "><?= $svp['vp_youtube_link']; ?></td>
												<td class=" "><iframe
																	width="100"
																	height="70"
																	src="<?= $svp['vp_youtube_link']; ?>"
																	title="YouTube video player"
																	frameborder="0"
																	allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
																	allowfullscreen="allowfullscreen"></iframe></td>
												<td class=" "><?= $svp['vp_is_active'] == 1 ? "<span class='badge badge-success'>Aktif</span>" : ($svp['vp_is_active'] ==  0 ? "<span class='badge badge-warning'>Tidak Aktif</span>" : null)  ?></td>
												<td class=" "><?= $svp['nama_user']; ?></td>
												<td class="">
													<a href="<?= base_url('/admin/video-profil/edit/'.$svp['vp_id']); ?>" class="btn btn-warning">Ubah</a>
													<?php if(session()->get('level') == 1) { ?>
														<a href="<?= base_url('/admin/video-profil/hapus/'.$svp['vp_id']); ?>" class="btn btn-danger">Hapus</a>
													<?php }else { ?>
														<a href="<?= base_url('/admin/video-profil/hapus/'.$svp['vp_id']); ?>" class="btn btn-danger">Permintaan Hapus</a>
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
