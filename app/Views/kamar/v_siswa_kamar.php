<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

 <!-- page content -->
 <div class="right_col" role="main">
    <div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Kamar</h3>
			</div>
		</div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Daftar Teman Satu Kamar</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-8 col-sm-8">
                                <div class="card-box table-responsive">
									<?php if($semuaTemanSatuKamar == null) { ?>
										<h1>Anda Belum Mendapatkan Kamar</h1>
									<?php }else { ?>
									<table class="table table-bordered">
										<thead>
											<tr class="headings">
												<th class="column-title">No</th>
												<th class="column-title">Nama</th>
												<th class="column-title">No Whatsapp</th>
											</tr>
										</thead>
										<tbody>
                                        	<?php $no = 1 ?>
											<?php foreach($semuaTemanSatuKamar as $stsk): ?>
											<tr>
												<td class=" "><?= $no; ?></td>
												<td class=" "><?= $stsk['nama_siswa']; ?></td>
												<td class=" "><?= $stsk['nowa_siswa']; ?></td>
												<?php $no++ ?>
											</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
									<?php } ?>
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
