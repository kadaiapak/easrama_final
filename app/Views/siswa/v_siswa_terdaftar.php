<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

 <!-- page content -->
 <div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Siswa</h3>
            </div>
        </div>
        <div class="clearfix"></div>
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
        <div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Semua Pendaftar Belum Verifikasi</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="x_title">
                            <form class="form-horizontal form-label-left" method="POST" action="<?= base_url('admin/siswa/excel'); ?>">
                            <?= csrf_field(); ?>
                            <div class="form-group row">
                                <?php $tahun = date('Y'); ?>
                                <?php $tahun_batas = $tahun - 4; ?>
                                <div class="col-md-2 col-sm-2">
                                    <select class="form-control <?= validation_show_error('tahun_pendaftaran') ? 'is-invalid' : null; ?>" name="tahun_pendaftaran">
                                        <option value="">Pilih Tahun</option>
                                        <?php for ($tahun; $tahun > $tahun_batas; $tahun--) { ?>
                                            <option value="<?= $tahun; ?>"><?= $tahun; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-5 col-sm-5">
                                    <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-file-excel-o" style="margin-right: 5px;"></i>Download Excel</button>
                                    <button type="submit" formaction="<?= base_url('admin/siswa/tahun'); ?>" class="btn btn-primary btn-lg d-inline"><i class="fa fa-eye" style="margin-right: 5px;"></i>Tampil</button>
                                </div>
                            </div>
                            </form>
                            <div class="clearfix"></div>
                        </div>
                        <div style="margin-bottom: 10px;">
							<a href="<?= base_url("admin/siswa/tambah"); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus-square" style="margin-right: 5px;"></i>Daftarkan Manual</a>
						</div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
									<!-- table  -->
									<table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal Pendaftaran</th>
                                                <th>Nama</th>
                                                <th>Jenis Kelamin</th>
                                                <th>No Pendaftaran</th>
                                                <th>Whatsapp</th>
                                                <th>Kab/Kota</th>
                                                <th>Provinsi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no = 1 ?>
                                        <?php foreach($semuaSiswa as $ss): ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= tanggal_indo($ss['created_at']) ?></td>
                                                <td><?= $ss['nama']; ?></td>
                                                <td><?= $ss['jk'] == 'l' ? 'Laki - laki' : ($ss['jk'] == 'p' ? 'Perempuan' : null ) ; ?></td>
                                                <td><?= $ss['no_pendaftaran']; ?></td>
                                                <td><?= $ss['no_wa']; ?></td>
                                                <td><?= $ss['kabupaten_kota']; ?></td>
                                                <td><?= $ss['provinsi']; ?></td>
                                                <td>
                                                    <a href="<?= base_url('admin/siswa/detail/'.$ss['id']); ?>" class="btn btn-primary btn-sm"><i class="fa fa-file-text-o" style="margin-right: 5px;"></i>Detail</a>
                                                </td>
                                            <?php $no++ ?>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
									<!-- akhir tabel -->
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
