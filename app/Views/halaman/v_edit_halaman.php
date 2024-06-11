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
        <form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" action="<?= base_url('/admin/halaman/update/'.$detailHalaman['halaman_id']); ?>">
            <?= csrf_field(); ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Halaman</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <input type="hidden" name="halaman_slug_lama" value="<?= $detailHalaman['halaman_slug']; ?>">
                        <input type="hidden" name="berita_sampul_lama" value="<?= $detailHalaman['halaman_cover']; ?>">
                        <input type="hidden" name="halaman_nama_lama" value="<?= $detailHalaman['halaman_nama']; ?>">
                        <div class="form-group">
                            <label for="berita_sampul" class="file-label">Cover Halaman(jika ada) <b>(ukuran sampul harus berukuran 1500px X 700px dan dibawah 1MB / 1024KB)</b></label>
                            <input accept="image/*" class="form-control <?= validation_show_error('berita_sampul') ? 'is-invalid' : null; ?>" type="file" id="berita_sampul" name="berita_sampul">
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('berita_sampul'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="berita_sampul">Preview Sampul</label>
                            <img id="gambar_load" src="<?= base_url('/upload/halaman_sampul/'.$detailHalaman['halaman_cover']); ?>" alt="" style="width: 400px;" class="img-thumbnail img-preview">
                        </div>
                        <div class="form-group">
                            <label for="halaman_nama">Nama Halaman <b>(harus diisi)</b></label>
                            <input type="text" id="halaman_nama" value="<?= old('halaman_nama') ? old('halaman_nama') : $detailHalaman['halaman_nama']; ?>" name="halaman_nama" class="form-control <?= validation_show_error('halaman_nama') ? 'is-invalid' : null; ?>" name="halaman_nama" placeholder="Tuliskan Nama Halaman"/>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('halaman_nama'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="halaman_judul_isi">Judul Dari Isi Halaman</label>
                            <input type="text" id="halaman_judul_isi" value="<?= old('halaman_judul_isi') ? old('halaman_judul_isi') : $detailHalaman['halaman_judul_isi']; ?>" name="halaman_judul_isi" class="form-control <?= validation_show_error('halaman_judul_isi') ? 'is-invalid' : null; ?>" name="halaman_judul_isi" placeholder="Tuliskan judul dari isi halaman"/>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('halaman_judul_isi'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="halaman_isi">Isi Halaman <b>(harus diisi)</b></label>
                            <textarea name="halaman_isi" id="halaman_isi" class="form-control <?= validation_show_error('halaman_isi') ? 'is-invalid' : null; ?>" cols="10" rows="10"><?= old('halaman_isi') ? old('halaman_isi') : $detailHalaman['halaman_isi'] ; ?></textarea>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('halaman_isi'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Pengaturan Tambahan</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="form-group">
                            <label for="menu_id">Menu <b>(harus dipilih)</b></label>
                            <select name="menu_id" id="menu_id" class="form-control <?= validation_show_error('menu_id') ? 'is-invalid' : null; ?>">
                                <option value="">-- Pilih Menu --</option>
                                <?php foreach ($semuaMenu as $sm) { ?>
                                    <option value="<?= $sm['kode_menu']; ?>" <?= old('menu_id') && old('menu_id') == $sm['kode_menu'] ? "selected" : ($detailHalaman['menu_id'] == $sm['kode_menu'] ? "selected" : null) ; ?>><?= $sm['nama_menu']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('menu_id'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="halaman_is_active">Terbitkan Halaman <b>(harus dipilih)</b></label>
                            <select id="halaman_is_active" name="halaman_is_active" class="form-control <?= validation_show_error('halaman_is_active') ? 'is-invalid' : null; ?>">
                                <option value="">-- Pilih Terbitkan atau Tidak --</option>
                                <option value="1" <?= old('halaman_is_active') && old('halaman_is_active') == '1' ? 'selected' : ($detailHalaman['halaman_is_active'] == '1' ? 'selected' : null); ?>>Ya, Terbitkan</option>
                                <option value="0" <?= old('halaman_is_active') && old('halaman_is_active') == '0' ? 'selected' : ($detailHalaman['halaman_is_active'] == '0' ? 'selected' : null); ?>>Tidak, Jangan terbitkan dulu</option>
                            </select>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('halaman_is_active'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 offset-md-3">
                <div class="form-group">
                    <a href="<?= base_url('/admin/halaman'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-chevron-circle-left" style="margin-right: 5px;"></i>Kembali</a>
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
<?= $this->endSection(); ?>
