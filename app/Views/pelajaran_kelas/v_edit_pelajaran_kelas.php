<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
			<div class="title_left">
				<h3>Pelajaran Tiap Kelas</h3>
			</div>
		</div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Ubah Pelajaran Tiap Kelas</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left" method="POST" action="<?= base_url('/admin/pelajaran-kelas/update/'.$detailPelajaranKelas['id']); ?>">
                            <?= csrf_field(); ?>
                            <div class="form-group row">
                                <label for="id_kelas" class="control-label col-md-3 col-sm-3">Kelas</label>
                                <div class="col-md-9 col-sm-9">
                                    <select required name="id_kelas" id="id_kelas" class="form-control <?= validation_show_error('id_kelas') ? 'is-invalid' : null; ?>">
                                        <option value="">-- Pilih Kelas --</option>
                                        <?php foreach ($semuaKelas as $sk) { ?>
                                            <option value="<?= $sk['id']; ?>" <?= old('id_kelas') == $sk['id'] ? "selected" : ($detailPelajaranKelas['id_kelas'] == $sk['id'] ? "selected" : null) ; ?>><?= $sk['nama']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('id_kelas'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hari" class="col-md-3 col-sm-3">Hari</label>
                                <div class="col-md-9 col-sm-9">
                                    <select required name="hari" id="hari" class="form-control <?= validation_show_error('hari') ? 'is-invalid' : null; ?>">
                                        <option value="">-- Pilih Hari --</option>
                                        <option value="1" <?= old('hari') == 1 ? "selected" : null ; ?>>Senin</option>
                                        <option value="2" <?= old('hari') == 2 ? "selected" : null ; ?>>Selasa</option>
                                        <option value="3" <?= old('hari') == 3 ? "selected" : null ; ?>>Rabu</option>
                                        <option value="4" <?= old('hari') == 4 ? "selected" : null ; ?>>Kamis</option>
                                        <option value="5" <?= old('hari') == 5 ? "selected" : null ; ?>>Jumat</option>
                                        <option value="6" <?= old('hari') == 6 ? "selected" : null ; ?>>Sabtu</option>
                                    </select>
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('hari'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="jam_pelajaran">Jam Pelajaran</label>
                                <div class="col-md-9 col-sm-9">
                                    <input type="text" value="<?= old('jam_pelajaran') ? old('jam_pelajaran') : $detailPelajaranKelas['jam_pelajaran']; ?>" name="jam_pelajaran"  class="form-control <?= validation_show_error('jam_pelajaran') ? 'is-invalid' : null; ?>" id="jam_pelajaran">
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('jam_pelajaran'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_pelajaran" class="control-label col-md-3 col-sm-3">Pelajaran</label>
                                <div class="col-md-9 col-sm-9">
                                    <select name="id_pelajaran" id="id_pelajaran" class="form-control <?= validation_show_error('id_pelajaran') ? 'is-invalid' : null; ?>" required>
                                        <option value="">-- Pilih Pelajaran --</option>
                                        <?php foreach ($semuaPelajaran as $sp) { ?>
                                            <option value="<?= $sp['id']; ?>" <?= old('id_pelajaran') == $sp['id'] ? "selected" : ( $detailPelajaranKelas['id_pelajaran'] == $sp['id'] ? "selected" : null); ?>><?= $sp['nama']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('id_pelajaran'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="guru" class="col-md-3 col-sm-3">Guru</label>
                                <div class="col-md-9 col-sm-9">
                                    <select required name="guru" id="guru" class="form-control <?= validation_show_error('guru') ? 'is-invalid' : null; ?>">
                                        <option value="">-- Pilih Guru --</option>
                                        <?php foreach ($semuaGuru as $sg) { ?>
                                            <option value="<?= $sg['user_id']; ?>" <?= old('guru') == $sg['user_id'] ? "selected" : null ; ?>><?= $sg['nama_asli']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('guru'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9  offset-md-3">
                                    <a href="<?= base_url('/admin/pelajaran-kelas'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-chevron-circle-left" style="margin-right: 5px;"></i>Kembali</a>
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
