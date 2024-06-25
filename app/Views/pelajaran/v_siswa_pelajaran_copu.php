<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

 <!-- page content -->
 <div class="right_col" role="main">
    <div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Pelajaran</h3>
			</div>
		</div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Daftar Pelajaran</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
							<?php if($semuaPelajaran == null) { ?>
							<h1>Kelas Anda Belum di Input</h1>
							<?php }else { ?>
							<!-- pelajaran hari senin -->
                            <div class="col-md-6 col-sm-6">
                                <div class="card-box table-responsive">
									<p>Pelajaran Hari Senin</p>
									<table class="table table-bordered">
										<thead>
											<tr class="headings">
												<th class="column-title">No</th>
												<th class="column-title">Jam Pelajaran</th>
												<th class="column-title">Mata Pelajaran</th>
												<th class="column-title">Guru</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1 ?>
											<?php foreach($semuaPelajaran as $stsk): ?>
											<?php if($stsk['nama_hari'] == 'Senin') { ?>
											<tr>
												<td class=" "><?= $no; ?></td>
												<td class=" "><?= $stsk['jam_pelajaran']; ?></td>
												<td class=" "><?= $stsk['mata_pelajaran']; ?></td>
												<td class=" "><?= $stsk['nama_guru']; ?></td>
												<?php $no++ ?>
											</tr>
											<?php } ?>
											<?php endforeach; ?>
										</tbody>
									</table>	
								</div>
                        	</div>
							<!-- akhir pelajaran hari senin -->
							<!-- pelajaran hari selasa -->
							<div class="col-md-6 col-sm-6">
                                <div class="card-box table-responsive">
									<p>Pelajaran Hari Selasa</p>
									<table class="table table-bordered">
										<thead>
											<tr class="headings">
												<th class="column-title">No</th>
												<th class="column-title">Jam Pelajaran</th>
												<th class="column-title">Mata Pelajaran</th>
												<th class="column-title">Guru</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1 ?>
											<?php foreach($semuaPelajaran as $stsk): ?>
											<?php if($stsk['nama_hari'] == 'Selasa') { ?>
											<tr>
												<td class=" "><?= $no; ?></td>
												<td class=" "><?= $stsk['jam_pelajaran']; ?></td>
												<td class=" "><?= $stsk['mata_pelajaran']; ?></td>
												<td class=" "><?= $stsk['nama_guru']; ?></td>
												<?php $no++ ?>
											</tr>
											<?php } ?>
											<?php endforeach; ?>
										</tbody>
									</table>	
								</div>
                        	</div>
							<!-- akhir pelajaran hari selasa -->
							<!-- pelajaran hari rabu -->
							<div class="col-md-6 col-sm-6">
                                <div class="card-box table-responsive">
									<p>Pelajaran Hari Rabu</p>
									<table class="table table-bordered">
										<thead>
											<tr class="headings">
												<th class="column-title">No</th>
												<th class="column-title">Jam Pelajaran</th>
												<th class="column-title">Mata Pelajaran</th>
												<th class="column-title">Guru</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1 ?>
											<?php foreach($semuaPelajaran as $stsk): ?>
											<?php if($stsk['nama_hari'] == 'Rabu') { ?>
											<tr>
												<td class=" "><?= $no; ?></td>
												<td class=" "><?= $stsk['jam_pelajaran']; ?></td>
												<td class=" "><?= $stsk['mata_pelajaran']; ?></td>
												<td class=" "><?= $stsk['nama_guru']; ?></td>
												<?php $no++ ?>
											</tr>
											<?php } ?>
											<?php endforeach; ?>
										</tbody>
									</table>	
								</div>
                        	</div>
							<!-- akhir pelajaran hari rabu -->
							<!-- pelajaran hari kamis -->
							<div class="col-md-6 col-sm-6">
                                <div class="card-box table-responsive">
									<p>Pelajaran Hari Kamis</p>
									<table class="table table-bordered">
										<thead>
											<tr class="headings">
												<th class="column-title">No</th>
												<th class="column-title">Jam Pelajaran</th>
												<th class="column-title">Mata Pelajaran</th>
												<th class="column-title">Guru</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1 ?>
											<?php foreach($semuaPelajaran as $stsk): ?>
											<?php if($stsk['nama_hari'] == 'Kamis') { ?>
											<tr>
												<td class=" "><?= $no; ?></td>
												<td class=" "><?= $stsk['jam_pelajaran']; ?></td>
												<td class=" "><?= $stsk['mata_pelajaran']; ?></td>
												<td class=" "><?= $stsk['nama_guru']; ?></td>
												<?php $no++ ?>
											</tr>
											<?php } ?>
											<?php endforeach; ?>
										</tbody>
									</table>	
								</div>
                        	</div>
							<!-- akhir pelajaran hari kamis -->
							<!-- pelajaran hari jumat -->
							<div class="col-md-6 col-sm-6">
                                <div class="card-box table-responsive">
									<p>Pelajaran Hari Jumat</p>
									<table class="table table-bordered">
										<thead>
											<tr class="headings">
												<th class="column-title">No</th>
												<th class="column-title">Jam Pelajaran</th>
												<th class="column-title">Mata Pelajaran</th>
												<th class="column-title">Guru</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1 ?>
											<?php foreach($semuaPelajaran as $stsk): ?>
											<?php if($stsk['nama_hari'] == 'Jumat') { ?>
											<tr>
												<td class=" "><?= $no; ?></td>
												<td class=" "><?= $stsk['jam_pelajaran']; ?></td>
												<td class=" "><?= $stsk['mata_pelajaran']; ?></td>
												<td class=" "><?= $stsk['nama_guru']; ?></td>
												<?php $no++ ?>
											</tr>
											<?php } ?>
											<?php endforeach; ?>
										</tbody>
									</table>	
								</div>
                        	</div>
							<!-- akhir pelajaran hari jumat -->
							 <!-- pelajaran hari sabtu -->
							<div class="col-md-6 col-sm-6">
                                <div class="card-box table-responsive">
									<p>Pelajaran Hari Sabtu</p>
									<table class="table table-bordered">
										<thead>
											<tr class="headings">
												<th class="column-title">No</th>
												<th class="column-title">Jam Pelajaran</th>
												<th class="column-title">Mata Pelajaran</th>
												<th class="column-title">Guru</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1 ?>
											<?php foreach($semuaPelajaran as $stsk): ?>
											<?php if($stsk['nama_hari'] == 'Sabtu') { ?>
											<tr>
												<td class=" "><?= $no; ?></td>
												<td class=" "><?= $stsk['jam_pelajaran']; ?></td>
												<td class=" "><?= $stsk['mata_pelajaran']; ?></td>
												<td class=" "><?= $stsk['nama_guru']; ?></td>
												<?php $no++ ?>
											</tr>
											<?php } ?>
											<?php endforeach; ?>
										</tbody>
									</table>	
								</div>
                        	</div>
							<!-- akhir pelajaran hari sabtu -->
							<?php } ?>

                    	</div>
                	</div>
            	</div>
            </div>
    	</div>
    </div>
</div>
<!-- /page content -->


<?= $this->endSection(); ?>
