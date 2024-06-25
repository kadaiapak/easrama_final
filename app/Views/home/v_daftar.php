<?= $this->extend('layout_front_end/template'); ?>
<?= $this->section('content'); ?>
    <div class="login-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <form action="<?= base_url('/daftar/simpan'); ?>" method="post" id="register-form" class="white-popup-block">
                    <?= csrf_field(); ?>
                        <div class="col-md-12 login-custom">
                            <h4>Formulir Pendaftaran Bintang Sekolah Al-Quran</h4>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Nama Lengkap*" type="text" name="nama">
                                        <div style="text-align: left; font-size: 12px; background-color: #FFB606;">
                                            <?= validation_show_error('nama'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <select id="jk" name="jk" class="form-control">
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option value="l">Laki - laki</option>
                                            <option value="p">Perempuan</option>
                                        </select>
                                        <div style="text-align: left; font-size: 12px; background-color: #FFB606; color: red;">
                                            <?= validation_show_error('jk'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="No HP*" type="text" name="no_hp">
                                        <div style="text-align: left; font-size: 12px; background-color: #FFB606; color: red;">
                                            <?= validation_show_error('no_hp'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Nomor Whatsapp*" type="text" name="no_wa">
                                        <div style="text-align: left; font-size: 12px; background-color: #FFB606; color: red;">
                                            <?= validation_show_error('no_wa'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <textarea name="alamat" class="form-control" placeholder="Alamat Lengkap*"></textarea>
                                        <div style="text-align: left; font-size: 12px; background-color: #FFB606; color: red;">
                                            <?= validation_show_error('alamat'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Kelurahan/Desa*" type="text" name="kelurahan_desa">
                                        <div style="text-align: left; font-size: 12px; background-color: #FFB606; color: red;">
                                            <?= validation_show_error('kelurahan_desa'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Kecamatan*" type="text" name="kecamatan">
                                        <div style="text-align: left; font-size: 12px; background-color: #FFB606; color: red;">
                                            <?= validation_show_error('kecamatan'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Kabupaten/Kota*" type="text" name="kabupaten_kota">
                                        <div style="text-align: left; font-size: 12px; background-color: #FFB606; color: red;">
                                            <?= validation_show_error('kabupaten_kota'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Provinsi*" type="text" name="provinsi">
                                        <div style="text-align: left; font-size: 12px; background-color: #FFB606; color: red;">
                                            <?= validation_show_error('provinsi'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4>Pembuatan Akun, Username dan Password Tidak Boleh Lupa</h4>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username*" type="text" name="username">
                                        <div style="text-align: left; font-size: 12px; background-color: #FFB606; color: red;">
                                            <?= validation_show_error('username'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password*" type="password" name="password">
                                        <div style="text-align: left; font-size: 12px; background-color: #FFB606; color: red;">
                                            <?= validation_show_error('password'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Konfirmasi Password*" type="password" name="password_conf">
                                        <div style="text-align: left; font-size: 12px; background-color: #FFB606; color: red;">
                                            <?= validation_show_error('password_conf'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <button type="submit">
                                        Daftar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Login Area -->
<?= $this->endSection(); ?>
