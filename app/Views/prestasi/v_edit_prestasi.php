<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Prestasi</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" action="<?= base_url('admin/prestasi/update/'.$detailPrestasi['prestasi_id']); ?>">
            <?= csrf_field(); ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Prestasi</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="form-group">
                            <input type="hidden" name="slug" value="<?= $detailPrestasi['prestasi_slug']; ?>">
                            <input type="hidden" name="prestasi_sampul_lama" value="<?= $detailPrestasi['prestasi_sampul']; ?>">
                            <input type="hidden" name="prestasi_sertifikat_lama" value="<?= $detailPrestasi['prestasi_sertifikat']; ?>">
                            <label for="prestasi_sampul" class="file-label">Sampul Berita<b>(ukuran sampul dibawah 1MB / 1024KB)</b></label>
                            <input accept="image/*" class="form-control <?= validation_show_error('prestasi_sampul') ? 'is-invalid' : null; ?>" type="file" id="prestasi_sampul" name="prestasi_sampul">
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('prestasi_sampul'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="berita_sampul">Preview Sampul</label>
                            <div>
                                <img id="gambar_load" src="<?= base_url('upload/prestasi/'.$detailPrestasi['prestasi_sampul']); ?>" alt="" style="width: 400px;" class="img-thumbnail img-preview">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prestasi_judul">Judul Prestasi * :</label>
                            <input type="text" id="prestasi_judul" value="<?= old('prestasi_judul') ? old('prestasi_judul') : $detailPrestasi['prestasi_judul']; ?>" name="prestasi_judul" class="form-control <?= validation_show_error('prestasi_judul') ? 'is-invalid' : null; ?>" name="prestasi_judul" placeholder="Tuliskan judul"/>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('prestasi_judul'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prestasi_deskripsi">Deskripsi * :</label>
                            <textarea name="prestasi_deskripsi" id="prestasi_deskripsi" class="form-control <?= validation_show_error('prestasi_deskripsi') ? 'is-invalid' : null; ?>" cols="10" rows="10"><?= old('prestasi_deskripsi') ? old('prestasi_deskripsi') : $detailPrestasi['prestasi_deskripsi']; ?></textarea>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('prestasi_deskripsi'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prestasi_penyelenggara">Penyelenggara * :</label>
                            <input type="text" id="prestasi_penyelenggara" value="<?= old('prestasi_penyelenggara') ? old('prestasi_penyelenggara') : $detailPrestasi['prestasi_penyelenggara']; ?>" name="prestasi_penyelenggara" class="form-control <?= validation_show_error('prestasi_penyelenggara') ? 'is-invalid' : null; ?>" name="prestasi_penyelenggara" placeholder="Tuliskan siapa penyelenggara lomba tersebut"/>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('prestasi_penyelenggara'); ?>
                            </div>
                        </div>
                        <?php $tahun = date('Y');?>
                        <div class="form-group">
                            <label for="prestasi_tahun"><b>Tahun * :</b></label>
                            <select name="prestasi_tahun" id="prestasi_tahun" class="form-control <?= validation_show_error('prestasi_tahun') ? 'is-invalid' : null; ?>" required>
                                <option value="">-- Pilih Tahun --</option>
                                <?php for ($i= $tahun-5; $i <= $tahun; $i++) { ?>
                                    <option value="<?= $i; ?>" <?= $detailPrestasi['prestasi_tahun'] == $i ? "selected" : null ; ?>><?= $i; ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('prestasi_tahun'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label" for="prestasi_tanggal_mulai">Tanggal Mulai Lomba<b>(boleh dikosongkan)</b> :</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                    <input required <?= validation_show_error('prestasi_tanggal_mulai') ? "style='border : 1px solid red'" : null?> placeholder="tanggal mulai lomba" type="text" value="<?= old('prestasi_tanggal_mulai') ? old('prestasi_tanggal_mulai') : $detailPrestasi['prestasi_tanggal_mulai']; ?>" class="form-control datepicker" name="prestasi_tanggal_mulai">
                                    <div class="invalid-feedback" style="text-align: left; display: block;">
                                        <?= validation_show_error('prestasi_tanggal_mulai'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="prestasi_tanggal_selesai">Tanggal Selesai Lomba <b>(boleh dikosongkan)</b> :</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                    <input required <?= validation_show_error('prestasi_tanggal_selesai') ? "style='border : 1px solid red'" : null?> placeholder="sampai tanggal berapa" type="text" value="<?= old('prestasi_tanggal_selesai') ? old('prestasi_tanggal_selesai') : $detailPrestasi['prestasi_tanggal_selesai']; ?>" class="form-control datepicker" name="prestasi_tanggal_selesai">
                                    <div class="invalid-feedback" style="text-align: left; display: block;">
                                        <?= validation_show_error('prestasi_tanggal_selesai'); ?>
                                    </div>
                                </div>
                            </div>
                        
                        <div class="form-group">
                            <label for="prestasi_tingkat">Tingkat :<b>(wajib diisi)</b></label>
                            <select name="prestasi_tingkat" id="prestasi_tingkat" class="form-control <?= validation_show_error('prestasi_tingkat') ? 'is-invalid' : null; ?>" required>
                                <option value="">-- Pilih Tingkat Lomba --</option>
                                <option value="1" <?= $detailPrestasi['prestasi_tingkat'] == "1" ? "selected" : null ; ?>>Kabupaten / Kota</option>
                                <option value="2" <?= $detailPrestasi['prestasi_tingkat'] == "2" ? "selected" : null ; ?>>Provinsi</option>
                                <option value="3" <?= $detailPrestasi['prestasi_tingkat'] == "3" ? "selected" : null ; ?>>Nasional</option>
                                <option value="4" <?= $detailPrestasi['prestasi_tingkat'] == "4" ? "selected" : null ; ?>>Internasional</option>
                            </select>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('prestasi_tingkat'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prestasi_peringkat">Juara Berapa : <b>(wajib diisi)</b></label>
                            <input type="text" id="prestasi_peringkat" value="<?= old('prestasi_peringkat') ? old('prestasi_peringkat') : $detailPrestasi['prestasi_peringkat']; ?>" name="prestasi_peringkat" class="form-control <?= validation_show_error('prestasi_peringkat') ? 'is-invalid' : null; ?>" name="prestasi_peringkat" placeholder="Tuliskan juara berapa pada lomba tersebut"/>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('prestasi_peringkat'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Pemenang</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="form-group">
                            <label for="prestasi_nim">NIM : <b>(wajib diisi)</b></label>
                            <input type="text" id="prestasi_nim" value="<?= old('prestasi_nim') ? old('prestasi_nim') : $detailPrestasi['prestasi_nim']; ?>" name="prestasi_nim" class="form-control <?= validation_show_error('prestasi_nim') ? 'is-invalid' : null; ?>" name="prestasi_nim" placeholder="Tuliskan NIM pemenang"/>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('prestasi_nim'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prestasi_nama">Nama : <b>(wajib diisi)</b></label>
                            <input type="text" id="prestasi_nama" value="<?= old('prestasi_nama') ? old('prestasi_nama') : $detailPrestasi['prestasi_nama']; ?>" name="prestasi_nama" class="form-control <?= validation_show_error('prestasi_nama') ? 'is-invalid' : null; ?>" name="prestasi_nama" placeholder="Tuliskan NIM pemenang"/>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('prestasi_nama'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prestasi_departemen"><b>Departemen * :</b></label>
                            <select name="prestasi_departemen" id="prestasi_departemen" class="form-control <?= validation_show_error('prestasi_departemen') ? 'is-invalid' : null; ?>" required>
                                <option value="">-- Pilih Departemen --</option>
                                <?php foreach ($semuaDepartemen as $sd) { ?>
                                    <option value="<?= $sd['departemen_id']; ?>" <?= $detailPrestasi['prestasi_departemen'] == $sd['departemen_id'] ? "selected" : null ; ?>><?= $sd['departemen_nama']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('prestasi_departemen'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prestasi_sertifikat" class="file-label">Sertifikat<b>(ukuran sampul dibawah 1MB / 1024KB)</b></label>
                            <input accept="image/*" class="form-control <?= validation_show_error('prestasi_sertifikat') ? 'is-invalid' : null; ?>" type="file" id="prestasi_sertifikat" name="prestasi_sertifikat">
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('prestasi_sertifikat'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prestasi_sertifikat">Preview Sampul</label>
                            <div>
                                <img id="sertifikat_load" src="<?= base_url('upload/prestasi/'.$detailPrestasi['prestasi_sertifikat']); ?>" alt="" style="width: 400px;" class="img-thumbnail img-preview">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-9  offset-md-3">
                <div class="form-group">
                    <a href="<?= base_url('/admin/prestasi'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-chevron-circle-left" style="margin-right: 5px;"></i>Kembali</a>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save" style="margin-right: 5px;"></i>Simpan</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<script type="text/javascript">
 $(function(){
  $(".datepicker").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
  });
 });
</script>
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
    $('#prestasi_sampul').change(function() {
        bacaGambar(this);
    })
</script>
<script>
    function bacaSertifikat(input) {
        if(input.files && input.files[0])
        {
            var reader = new FileReader();
            reader.onload = function(e)
            {
                $('#sertifikat_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#prestasi_sertifikat').change(function() {
        bacaSertifikat(this);
    })
</script>
<?= $this->endSection(); ?>
