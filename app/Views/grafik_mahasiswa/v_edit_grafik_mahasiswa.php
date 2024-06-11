<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Visi Misi</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Visi Misi</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left" method="POST" action="<?= base_url('/admin/grafik-mahasiswa/update/'.$detailGrafikMahasiswa['pengaturan_id']); ?>">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="pengaturan_nama_lama" value="<?= $detailGrafikMahasiswa['pengaturan_nama']; ?>">
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="pengaturan_nama">Nama</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" value="<?= $detailGrafikMahasiswa['pengaturan_nama']; ?>"  name="pengaturan_nama" class="form-control <?= validation_show_error('pengaturan_nama') ? 'is-invalid' : null; ?>" id="pengaturan_nama">
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('pengaturan_nama'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="pengaturan_logo">Logo</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" value="<?= $detailGrafikMahasiswa['pengaturan_logo']; ?>"  name="pengaturan_logo" class="form-control <?= validation_show_error('pengaturan_logo') ? 'is-invalid' : null; ?>" id="pengaturan_logo">
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('pengaturan_logo'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="pengaturan_isi">Jumlah</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" value="<?= $detailGrafikMahasiswa['pengaturan_isi']; ?>"  name="pengaturan_isi" class="form-control <?= validation_show_error('pengaturan_isi') ? 'is-invalid' : null; ?>" id="pengaturan_isi">
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('pengaturan_isi'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9  offset-md-3">
                                    <a href="<?= base_url('admin/grafik-mahasiswa'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-chevron-circle-left" style="margin-right: 5px;"></i>Kembali</a>
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
