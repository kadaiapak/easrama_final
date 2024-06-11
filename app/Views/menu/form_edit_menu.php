<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Halaman</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-9 col-sm-9">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Menu Utama</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left" method="POST" action="<?= base_url('/admin/menu/update-menu/'.$detailMenu['kode_menu']); ?>">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="nama_menu_lama" value="<?= $detailMenu['nama_menu']; ?>">
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3" for="nama_menu">Nama Menu Halaman</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" value="<?= old('nama_menu') ? old('nama_menu') : $detailMenu['nama_menu']; ?>" name="nama_menu" class="form-control <?= validation_show_error('nama_menu') ? 'is-invalid' : null; ?>" id="nama_menu" placeholder="Tuliskan nama menu halaman">
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('nama_menu'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="level">Tipe Menu</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select name="level" id="level" class="form-control <?= validation_show_error('level') ? 'is-invalid' : null; ?>">
                                        <option value="">-- Pilih Tipe Menu --</option>
                                        <option value="main_menu" <?= old("level") && old("level") == "main_menu" ? "selected" : ($detailMenu['level'] == "main_menu" ? "selected" : "") ; ?>>Main Menu</option>
                                        <option value="single_menu" <?= old('level') && old('level') == "single_menu" ? "selected" : ($detailMenu['level'] == "single_menu" ? "selected" : "") ; ?>>Single Menu</option>
                                    </select>
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('level'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3" for="no_urut">No Urut Menu</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="number" value="<?= old('no_urut') ? old('no_urut') : $detailMenu['no_urut']; ?>" name="no_urut" class="form-control <?= validation_show_error('no_urut') ? 'is-invalid' : null; ?>" id="no_urut" placeholder="Tuliskan nomor urut halaman">
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('no_urut'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="is_active">Tampilkan</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select name="is_active" id="is_active" class="form-control <?= validation_show_error('is_active') ? 'is-invalid' : null; ?>">
                                        <option value="">-- Pilih Tampilkan atau tidak --</option>
                                        <option value="1" <?= old("is_active") && old("is_active") == 1 ? "selected" : ($detailMenu['is_active'] == 1 ? "selected" : "") ; ?>>Ya tampilkan</option>
                                        <option value="0" <?= old('is_active') && old('is_active') == 0 ? "selected" : ($detailMenu['is_active'] == 0 ? "selected" : "") ; ?>>Jangan tampilkan</option>
                                    </select>
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('is_active'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9  offset-md-3">
                                    <a href="<?= base_url('/admin/menu'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-chevron-circle-left" style="margin-right: 5px;"></i>Kembali</a>
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
