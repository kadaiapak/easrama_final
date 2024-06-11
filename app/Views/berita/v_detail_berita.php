<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="right_col" role="main">
    <div class>
        <div class="page-title">
            <div class="title_left">
                <h3>Berita</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Detail Berita</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php if($detailBerita['berita_sampul'] != null) { ?>
                        <div class="col-md-12 col-sm-12">
                            <div class="product-image">
                                <img src="<?= base_url('/upload/berita_sampul/'.$detailBerita['berita_sampul']); ?>"/>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="col-md-12 col-sm-12" style="border:0px solid #e5e5e5;">
                            <table class="table table-striped table-bordered mb-0">
                                <tr>
                                    <td class="font-weight-bold">Judul Berita</td>
                                    <td><?= $detailBerita['berita_judul']; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Slug</td>
                                    <td><?= $detailBerita['berita_slug']; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Kategori</td>
                                    <td><?= $detailBerita['nama_kategori']; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Penulis</td>
                                    <td><?= $detailBerita['nama_penulis']; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Jumlah Tayang</td>
                                    <td><?= $detailBerita['berita_tayang']; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Apakah Berita Penting ?</td>
                                    <td><?= $detailBerita['berita_is_penting'] == '1' ? "<span class='badge badge-success'>Ya Berita Penting</span>" : ($detailBerita['berita_is_penting'] == '0' ? "<span class='badge badge-danger'>Tidak</span>" : null); ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Tampilkan</td>
                                    <td><?= $detailBerita['berita_tampil'] == '1' ? "<span class='badge badge-success'>Tampil</span>" : ($detailBerita['berita_tampil'] == '0' ? "<span class='badge badge-danger'>Tidak Aktif</span>" : null); ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Tanggal Pembuatan</td>
                                    <td><?= tanggal_indo($detailBerita['created_at']) ?></td>
                                </tr>
                                <?php if($detailBerita['updated_at']) { ?>
                                <tr>
                                    <td class="font-weight-bold">Tanggal Diedit</td>
                                    <td><?= tanggal_indo($detailBerita['updated_at']) ?></td>
                                </tr>
                                <?php } ?>
                            </table>
                            <br/>
                            <br/>
                            <br/>
                            <p><?= $detailBerita['berita_isi']; ?></p>
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <div class="form-group">
                                <a href="<?= base_url('/admin/berita'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-chevron-circle-left" style="margin-right: 5px;"></i>Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>