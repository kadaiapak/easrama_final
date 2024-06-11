<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
			<div class="title_left">
				<h3>Pelajaran</h3>
			</div>
		</div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Ubah Pelajaran</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left" method="POST" action="<?= base_url('/admin/pelajaran/update/'.$detailPelajaran['id']); ?>">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="nama_lama" value="<?= $detailPelajaran['nama']; ?>">
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="nama">Nama</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" value="<?= old('nama') ? old('nama') : $detailPelajaran['nama']; ?>"  name="nama" class="form-control <?= validation_show_error('nama') ? 'is-invalid' : null; ?>" id="nama">
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('nama'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="keterangan">Keterangan Pelajaran</label>
                                <div class="col-md-9 col-sm-9">
                                    <textarea name="keterangan" id="keterangan" class="form-control <?= validation_show_error('keterangan') ? 'is-invalid' : null; ?>" cols="10" rows="10"><?= old('keterangan') ? old('keterangan') : $detailPelajaran['keterangan']; ?></textarea>
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('keterangan'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="kapasitas">Kapasitas</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" value="<?= old('kapasitas') ? old('kapasitas') : $detailPelajaran['kapasitas']; ?>"  name="kapasitas" class="form-control <?= validation_show_error('kapasitas') ? 'is-invalid' : null; ?>" id="kapasitas">
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('kapasitas'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9  offset-md-3">
                                    <a href="<?= base_url('/admin/pelajaran'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-chevron-circle-left" style="margin-right: 5px;"></i>Kembali</a>
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
