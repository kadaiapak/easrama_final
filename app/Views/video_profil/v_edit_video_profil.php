<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Video Profil</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" action="<?= base_url('admin/video-profil/update/'.$detail_video_profil['vp_id']); ?>">
        <?= csrf_field(); ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Video Profil</h2>
                        <div class="clearfix"></div>
                        <p><?= validation_list_errors(); ?></p>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="form-group">
                            <label for="vp_judul">Judul * :</label>
                            <input type="text" id="vp_judul" value="<?= (old('vp_judul')) ? old('vp_judul') : $detail_video_profil['vp_judul']; ?>" name="vp_judul" class="form-control <?= validation_show_error('vp_judul') ? 'is-invalid' : null; ?>" name="vp_judul" placeholder="Tuliskan judul"/>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('vp_judul'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="vp_deskripsi">Deskripsi * :</label>
                            <textarea name="vp_deskripsi" id="vp_deskripsi" class="form-control <?= validation_show_error('vp_deskripsi') ? 'is-invalid' : null; ?>" cols="10" rows="10"><?= (old('vp_deskripsi')) ? old('vp_deskripsi') : $detail_video_profil['vp_deskripsi']; ?></textarea>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('vp_deskripsi'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="vp_youtube_link">Link Video Youtube * :</label>
                            <input type="text" id="vp_youtube_link" value="<?= (old('vp_youtube_link')) ? old('vp_youtube_link') : $detail_video_profil['vp_youtube_link']; ?>" name="vp_youtube_link" class="form-control <?= validation_show_error('vp_youtube_link') ? 'is-invalid' : null; ?>" name="vp_youtube_link" placeholder="Isikan link video youtube"/>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('vp_youtube_link'); ?>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="berita_sampul">Preview Sampul</label>
                            <div>
                            <iframe
                                id="gambar_load"
                                width="100"
                                height="70"
                                src=""
                                title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen="allowfullscreen"></iframe>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="vp_youtube_title">Judul Video Youtube * :</label>
                            <input type="text" id="vp_youtube_title" value="<?= (old('vp_youtube_title')) ? old('vp_youtube_title') : $detail_video_profil['vp_youtube_title']; ?>" name="vp_youtube_title" class="form-control <?= validation_show_error('vp_youtube_title') ? 'is-invalid' : null; ?>" name="vp_youtube_title" placeholder="Tuliskan judul video youtube"/>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('vp_youtube_title'); ?>
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
                            <label for="vp_is_active"><b>Terbitkan Video Profil * :</b></label>
                            <select id="vp_is_active" name="vp_is_active" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="1" <?= $detail_video_profil['vp_is_active'] == 1 ? 'selected' : null; ?>>Ya, Terbitkan</option>
                                <option value="0" <?= $detail_video_profil['vp_is_active'] == 0 ? 'selected' : null; ?>>Tidak, Jangan terbitkan dulu</option>
                            </select>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= validation_show_error('vp_is_active'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-9  offset-md-3">
                <div class="form-group">
                    <a href="<?= base_url('/admin/video-profil'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-chevron-circle-left" style="margin-right: 5px;"></i>Kembali</a>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save" style="margin-right: 5px;"></i>Simpan</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<script>
        $(document).ready(function() {
            var value = $('#vp_youtube_link').val();
            $('#gambar_load').attr('src', value);   
            $('#vp_youtube_link').change(function() {
                var value = $('#vp_youtube_link').val();
                $('#gambar_load').attr('src', value);
            });
        });
        // function get_video(){
        //     var link_video = $('#vp_youtube_link').val();
        //     console.log(link_video);
        // }
</script>
<?= $this->endSection(); ?>
