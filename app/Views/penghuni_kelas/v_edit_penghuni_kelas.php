<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
			<div class="title_left">
				<h3>Data Santri Tiap Kelas</h3>
			</div>
		</div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Kelas Santri</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left" method="POST" action="<?= base_url('/admin/penghuni-kelas/update/'.$detailSiswa['id']); ?>">
                            <?= csrf_field(); ?>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="nama">Nama</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" readonly value="<?= $detailSiswa['nama']; ?>"  name="nama" class="form-control <?= validation_show_error('nama') ? 'is-invalid' : null; ?>" id="nama">
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('nama'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="jk">Jenis Kelamin</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" readonly value="<?= $detailSiswa['jk'] == 'p' ? 'Perempuan' : ($detailSiswa['jk'] == 'l' ? 'Laki - laki' : null) ;  ?>"  name="jk" class="form-control <?= validation_show_error('jk') ? 'is-invalid' : null; ?>" id="jk">
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('jk'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="nama_kamar">Kamar</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" readonly value="<?= $detailSiswa['nama_kamar'];  ?>"  name="nama_kamar" class="form-control <?= validation_show_error('nama_kamar') ? 'is-invalid' : null; ?>" id="nama_kamar">
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('nama_kamar'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="kelas_sebelumnya">Kelas Sebelumnya</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" readonly value="<?= $detailSiswa['nama_kelas'];  ?>"  name="kelas_sebelumnya" class="form-control <?= validation_show_error('kelas_sebelumnya') ? 'is-invalid' : null; ?>" id="kelas_sebelumnya">
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('kelas_sebelumnya'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_kelas" class="col-md-3 col-sm-3">Pindah Ke Kelas</label>
                                <div class="col-md-9 col-sm-9">
                                    <select required name="id_kelas" id="id_kelas" class="form-control <?= validation_show_error('id_kelas') ? 'is-invalid' : null; ?>">
                                        <option value="">-- Pilih Kelas --</option>
                                        <?php foreach ($semuaKelas as $sk) { ?>
                                            <option value="<?= $sk['id']; ?>" <?= old('id_kelas') == $sk['id'] ? "selected" : null ; ?>><?= $sk['nama']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('id_kelas'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9  offset-md-3">
                                    <a href="<?= base_url('/admin/penghuni-kelas'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-chevron-circle-left" style="margin-right: 5px;"></i>Kembali</a>
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save" style="margin-right: 5px;"></i>Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
