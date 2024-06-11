<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>User</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Ubah Password User</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left" method="POST" action="<?= base_url('/user/update-password/'.$detailUser['user_id']); ?>">
                            <?= csrf_field(); ?>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="username">Username</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input readonly type="text" value="<?= $detailUser['username']; ?>" name="username" class="form-control <?= validation_show_error('username') ? 'is-invalid' : null; ?>" id="username">
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('username'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="password_lama">Password Lama</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="password" name="password_lama" class="form-control <?= validation_show_error('password_lama') ? 'is-invalid' : null; ?>" id="password_lama">
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('password_lama'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="password_baru">Password Baru</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="password" name="password_baru" class="form-control <?= validation_show_error('password_baru') ? 'is-invalid' : null; ?>" id="password_baru">
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('password_baru'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="conf_password_baru">Konfirmasi Password Baru</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="password" name="conf_password_baru" class="form-control <?= validation_show_error('conf_password_baru') ? 'is-invalid' : null; ?>" id="conf_password_baru">
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('conf_password_baru'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9  offset-md-3">
                                    <a href="<?= base_url('/user'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-chevron-circle-left" style="margin-right: 5px;"></i>Kembali</a>
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
