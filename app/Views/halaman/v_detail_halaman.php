<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="right_col" role="main">
    <div class>
        <div class="page-title">
            <div class="title_left">
                <h3>Halaman</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Detail Halaman</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php if($detailHalaman['halaman_cover'] != null) { ?>
                        <div class="col-md-12 col-sm-12">
                            <div class="product-image">
                                <img src="<?= base_url('/upload/halaman_sampul/'.$detailHalaman['halaman_cover']); ?>"/>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="col-md-12 col-sm-12" style="border:0px solid #e5e5e5;">
                            <table class="table table-striped table-bordered mb-0">
                                <tr>
                                    <td class="font-weight-bold">Nama Halaman</td>
                                    <td><?= $detailHalaman['halaman_nama']; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Kategori Halaman</td>
                                    <td><?= $detailHalaman['nama_menu']; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Judul Halaman</td>
                                    <td><?= $detailHalaman['halaman_judul_isi']; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Tampilkan</td>
                                    <td><?= $detailHalaman['halaman_is_active'] == '1' ? "<span class='badge badge-success'>Tampil</span>" : ($detailHalaman['halaman_is_active'] == '0' ? "<span class='badge badge-danger'>Tidak Aktif</span>" : null); ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Status</td>
                                    <td><?= tanggal_indo($detailHalaman['created_at']) ?></td>
                                </tr>
                            </table>
                            <br/>
                            <br/>
                            <br/>
                            <p><?= $detailHalaman['halaman_isi']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>