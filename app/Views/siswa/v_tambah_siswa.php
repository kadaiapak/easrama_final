<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Siswa</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" action="<?= base_url('admin/siswa/simpan'); ?>">
        <?= csrf_field(); ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Tambah Siswa</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="form-group">
                            <label for="berita_sampul" class="file-label">Pas Foto <b>(maksimal 1MB / 1024KB)</b></label>
                            <input accept="image/*" class="form-control <?= validation_show_error('berita_sampul') ? 'is-invalid' : null; ?>" type="file" id="berita_sampul" name="berita_sampul">
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('berita_sampul'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="berita_sampul">Preview Pas Foto</label>
                            <img id="gambar_load" src="<?= base_url('/image_manager/pattern.jpg'); ?>" alt="" style="width: 400px;" class="img-thumbnail img-preview">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Siswa * :</label>
                            <input type="text" id="nama" value="<?= old('nama'); ?>" name="nama" class="form-control <?= validation_show_error('nama') ? 'is-invalid' : null; ?>" name="nama" placeholder="Tuliskan nama siswa"/>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('nama'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin *</label>
                            <select id="jk" name="jk" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="l">Laki - laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('jk'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_pendaftaran">No Pendaftaran Siswa * :</label>
                            <input type="text" id="no_pendaftaran" value="<?= old('no_pendaftaran'); ?>" name="no_pendaftaran" class="form-control <?= validation_show_error('no_pendaftaran') ? 'is-invalid' : null; ?>" name="no_pendaftaran" placeholder="Tuliskan no pendaftaran siswa"/>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('no_pendaftaran'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No HP * :</label>
                            <input type="text" id="no_hp" value="<?= old('no_hp'); ?>" name="no_hp" class="form-control <?= validation_show_error('no_hp') ? 'is-invalid' : null; ?>" name="no_hp" placeholder="Tuliskan no hp"/>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('no_hp'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_wa">No WA * :</label>
                            <input type="text" id="no_wa" value="<?= old('no_wa'); ?>" name="no_wa" class="form-control <?= validation_show_error('no_wa') ? 'is-invalid' : null; ?>" name="no_wa" placeholder="Tuliskan no whatsapp"/>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('no_wa'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat Lengkap* :</label>
                            <textarea name="alamat" id="alamat" placeholder="Tuliskan alamat lengkap" class="form-control <?= validation_show_error('alamat') ? 'is-invalid' : null; ?>" cols="10" rows="10"><?= old('alamat'); ?></textarea>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('alamat'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kelurahan_desa">Kelurahan / Desa * :</label>
                            <input type="text" id="kelurahan_desa" value="<?= old('kelurahan_desa'); ?>" name="kelurahan_desa" class="form-control <?= validation_show_error('kelurahan_desa') ? 'is-invalid' : null; ?>" name="kelurahan_desa" placeholder="Tuliskan kelurahan / desa tempat tinggal"/>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('kelurahan_desa'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan * :</label>
                            <input type="text" id="kecamatan" value="<?= old('kecamatan'); ?>" name="kecamatan" class="form-control <?= validation_show_error('kecamatan') ? 'is-invalid' : null; ?>" name="kecamatan" placeholder="Tuliskan kecamatan tempat tinggal"/>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('kecamatan'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kabupaten_kota">Kabupaten / Kota * :</label>
                            <input type="text" id="kabupaten_kota" value="<?= old('kabupaten_kota'); ?>" name="kabupaten_kota" class="form-control <?= validation_show_error('kabupaten_kota') ? 'is-invalid' : null; ?>" name="kabupaten_kota" placeholder="Tuliskan kabupaten / kota tempat tinggal"/>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('kabupaten_kota'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="provinsi">Provinsi * :</label>
                            <input type="text" id="provinsi" value="<?= old('provinsi'); ?>" name="provinsi" class="form-control <?= validation_show_error('provinsi') ? 'is-invalid' : null; ?>" name="provinsi" placeholder="Tuliskan provinsi tempat tinggal"/>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('provinsi'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_pendaftaran">Tanggal Pendaftaran* :</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                                <input <?= validation_show_error('tanggal_pendaftaran') ? "style='border : 1px solid red'" : null?> placeholder="tanggal pendaftaran" type="text" value="<?= old('tanggal_pendaftaran'); ?>" class="form-control datepicker" name="tanggal_pendaftaran">
                                <div class="invalid-feedback" style="text-align: left; display: block;">
                                    <?= validation_show_error('tanggal_pendaftaran'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-9  offset-md-3">
                <div class="form-group">
                    <a href="<?= base_url('/admin/siswa'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-chevron-circle-left" style="margin-right: 5px;"></i>Kembali</a>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save" style="margin-right: 5px;"></i>Simpan</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<script>
    function bacaGambar(input) {
        if(input.files && input.files[0])
        {
            var reader = new FileReader();
            reader.onload = function(e)
            {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#berita_sampul').change(function() {
        bacaGambar(this);
    })
</script>
<script type="text/javascript">
 $(function(){
  $(".datepicker").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
  });
 });
</script>
<?= $this->endSection(); ?>
