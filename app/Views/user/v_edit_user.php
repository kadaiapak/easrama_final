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
                        <h2>Edit User</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left" method="POST" action="<?= base_url('/user/update/'.$detailUser['user_id']); ?>">
                            <?= csrf_field(); ?>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3" for="nama_asli">Nama Asli</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" value="<?= $detailUser['nama_asli']; ?>" name="nama_asli" class="form-control <?= validation_show_error('nama_asli') ? 'is-invalid' : null; ?>" id="nama_asli">
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('nama_asli'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="username">Username</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" value="<?= $detailUser['username']; ?>" name="username" class="form-control <?= validation_show_error('username') ? 'is-invalid' : null; ?>" id="username">
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('username'); ?>
                                    </div>
                                </div>
                            </div>
                            <?php if($detailUser['level'] != 1){ ?>
                            <div class="form-group row">
                                <label for="level" class="control-label col-md-3 col-sm-3">Level User</label>
                                <div class="col-md-9 col-sm-9">
                                    <select name="level" id="level" class="form-control <?= validation_show_error('level') ? 'is-invalid' : null; ?>" required>
                                        <option value="">-- Pilih Level User --</option>
                                        <?php foreach ($semuaUserLevel as $sul) { ?>
                                            <option value="<?= $sul['user_level_id']; ?>" <?= old('level') == $sul['user_level_id'] ? "selected" : null ; ?>><?= $sul['user_level_nama']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('level'); ?>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
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
