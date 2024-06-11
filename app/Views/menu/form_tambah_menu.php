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
                        <h2>Tambah Menu Utama</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
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
                        <form class="form-horizontal form-label-left" method="POST" action="<?= base_url('/admin/menu/simpan-menu'); ?>">
                            <?= csrf_field(); ?>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3" for="nama_menu">Nama Menu Halaman</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" value="<?= old('nama_menu'); ?>" name="nama_menu" class="form-control <?= validation_show_error('nama_menu') ? 'is-invalid' : null; ?>" id="nama_menu" placeholder="Tuliskan nama menu halaman">
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('nama_menu'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="level">Tipe Menu</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select name="level" id="level" class="form-control <?= validation_show_error('level') ? 'is-invalid' : null; ?>" required>
                                        <option value="">-- Pilih Tipe Menu --</option>
                                        <option value="main_menu" <?= old("level") == "main_menu" ? "selected" : null ; ?>>Main Menu</option>
                                        <option value="single_menu" <?= old('level') == "single_menu" ? "selected" : null ; ?>>Single Menu</option>
                                    </select>
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('level'); ?>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3" for="no_urut">No Urut Menu</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="number" name="no_urut" class="form-control <?= validation_show_error('no_urut') ? 'is-invalid' : null; ?>" id="no_urut" placeholder="Tuliskan nomor urut halaman">
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('no_urut'); ?>
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
