<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="right_col" role="main">
    <div class>
        <div class="page-title">
            <div class="title_left">
                <h3>Pengumuman</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Detail Pengumuman</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php if($detailPengumuman['berita_sampul'] != null) { ?>
                        <div class="col-md-12 col-sm-12">
                            <div class="product-image">
                                <img src="<?= base_url('/upload/berita_sampul/'.$detailPengumuman['berita_sampul']); ?>"/>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="col-md-12 col-sm-12" style="border:0px solid #e5e5e5;">
                            <table class="table table-striped table-bordered mb-0">
                                <tr>
                                    <td class="font-weight-bold">Judul Berita</td>
                                    <td><?= $detailPengumuman['berita_judul']; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Slug</td>
                                    <td><?= $detailPengumuman['berita_slug']; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Kategori</td>
                                    <td><?= $detailPengumuman['nama_kategori']; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Penulis</td>
                                    <td><?= $detailPengumuman['nama_penulis']; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Jumlah Tayang</td>
                                    <td><?= $detailPengumuman['berita_tayang']; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Apakah Berita Penting ?</td>
                                    <td><?= $detailPengumuman['berita_is_penting'] == '1' ? "<span class='badge badge-success'>Ya Berita Penting</span>" : ($detailPengumuman['berita_is_penting'] == '0' ? "<span class='badge badge-danger'>Tidak</span>" : null); ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Tampilkan</td>
                                    <td><?= $detailPengumuman['berita_tampil'] == '1' ? "<span class='badge badge-success'>Tampil</span>" : ($detailPengumuman['halaman_is_active'] == '0' ? "<span class='badge badge-danger'>Tidak Aktif</span>" : null); ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Tanggal Pembuatan</td>
                                    <td><?= tanggal_indo($detailPengumuman['created_at']) ?></td>
                                </tr>
                                <?php if($detailPengumuman['updated_at']) { ?>
                                <tr>
                                    <td class="font-weight-bold">Tanggal Diedit</td>
                                    <td><?= tanggal_indo($detailPengumuman['updated_at']) ?></td>
                                </tr>
                                <?php } ?>
                            </table>
                            <br/>
                            <br/>
                            <br/>
                            <p><?= $detailPengumuman['berita_isi']; ?></p>
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <div class="form-group">
                                <a href="<?= base_url('/admin/pengumuman'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-chevron-circle-left" style="margin-right: 5px;"></i>Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>