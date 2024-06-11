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
        <form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" action="<?= base_url('admin/prestasi/update-header-prestasi'); ?>">
            <?= csrf_field(); ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Header Prestasi</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="form-group">
                            <input type="hidden" name="pengaturan_nama_pama" value="<?= $headerPrestasi['pengaturan_nama']; ?>">
                            <label for="pengaturan_nama">Title * :</label>
                            <input type="text" id="pengaturan_nama" value="<?= old('pengaturan_nama') ? old('pengaturan_nama') : $headerPrestasi['pengaturan_nama']; ?>" name="pengaturan_nama" class="form-control <?= validation_show_error('pengaturan_nama') ? 'is-invalid' : null; ?>" name="pengaturan_nama" placeholder="Tuliskan judul"/>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('pengaturan_nama'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pengaturan_isi">Deskripsi * :</label>
                            <textarea name="pengaturan_isi" id="pengaturan_isi" class="form-control <?= validation_show_error('pengaturan_isi') ? 'is-invalid' : null; ?>" cols="10" rows="10"><?= old('pengaturan_isi') ? old('pengaturan_isi') : $headerPrestasi['pengaturan_isi']; ?></textarea>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('pengaturan_isi'); ?>
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
