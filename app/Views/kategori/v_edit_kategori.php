<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>+ Departemen</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left" method="POST" action="<?= base_url('/admin/kategori/update/'.$detail_kategori['kategori_id']); ?>">
                            <?= csrf_field(); ?>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="kategori_nama">Nama Kategori</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" value="<?= $detail_kategori['kategori_nama']; ?>"  name="kategori_nama" class="form-control <?= validation_show_error('kategori_nama') ? 'is-invalid' : null; ?>" id="kategori_nama">
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('kategori_nama'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="kategori_is_active">Nama Kategori</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select id="kategori_is_active" name="kategori_is_active" class="form-control" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="1" <?= $detail_kategori['kategori_is_active'] == 1 ? 'selected' : null; ?>>Ya, Aktif</option>
                                        <option value="0" <?= $detail_kategori['kategori_is_active'] == 0 ? 'selected' : null; ?>>Tidak</option>
                                    </select>
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('kategori_is_active'); ?>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9  offset-md-3">
                                    <a href="<?= base_url('admin/kategori'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-chevron-circle-left" style="margin-right: 5px;"></i>Kembali</a>
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
