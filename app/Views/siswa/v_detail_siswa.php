<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

 <!-- page content -->
 <div class="right_col" role="main">
    <div class>
        <div class="page-title">
            <div class="title_left">
                <h3>Santri</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Profil <b><?= $detailSiswa['nama']; ?></b></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3  profile_left">
                            <div class="profile_img">
                                <?php if($detailSiswa['foto'] == null) { ?>
                                <div id="crop-avatar">
                                    <img class="img-responsive avatar-view" src="<?= base_url('/upload/no_photo.png'); ?>" alt="Avatar" title="Change the avatar" style="width: 50%;" >
                                </div>
                                <?php }else{ ?>
                                <div id="crop-avatar">
                                    <a href="<?= base_url('/upload/pas_foto/'.$detailSiswa['foto']); ?>" class="chocolat-image" title="pas foto">
                                        <div>
                                            <img alt="image" src="<?= base_url('/upload/pas_foto/'.$detailSiswa['foto']); ?>" class="img-fluid">
                                        </div>
                                    </a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-9 ">
                            <div class="profile_title">
                                <div class="col-md-6"><h2>Detail</h2></div>
                            </div>
                            <!-- detail mahasiswa -->
                            <table class="table table-striped table-bordered mb-0">
                                <tr>
                                    <td class="font-weight-bold">Nomor Pendaftaran</td>
                                    <td><?= $detailSiswa['no_pendaftaran']; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Nama Santri</td>
                                    <td><?= $detailSiswa['nama']; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Nomor HP</td>
                                    <td><?= $detailSiswa['no_hp']; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Nomor Whatsapp</td>
                                    <td><?= $detailSiswa['no_wa']; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Alamat</td>
                                    <td><?= $detailSiswa['alamat']; ?> Kelurahan <?= $detailSiswa['kelurahan_desa']; ?> Kecamatan <?= $detailSiswa['kecamatan']; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Kabupaten Kota/ Provinsin</td>
                                    <td><?= $detailSiswa['kabupaten_kota']; ?> / <?= $detailSiswa['provinsi']; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Tanggal Pendaftaran</td>
                                    <td><?= $detailSiswa['tanggal_pendaftaran'] != null ? $detailSiswa['tanggal_pendaftaran'].'-'.$detailSiswa['bulan_pendaftaran'].'-'.$detailSiswa['tahun_pendaftaran'] : date_format(date_create($detailSiswa['created_at']), 'd-m-Y'); ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Jenis Kelamin</td>
                                    <td><?= $detailSiswa['jk'] == 'P' ? 'Perempuan' : ($detailSiswa['jk'] == 'L' ? 'Laki - laki' : null) ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Alamat</td>
                                    <td><?= $detailSiswa['alamat']; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Status</td>
                                    <td><?= $detailSiswa['status'] == 1 ? "<span class='badge badge-warning'>Mendaftar</span>" : ($detailSiswa['status'] == 2 ? "<span class='badge badge-danger'>Ditolak</span>" :(($detailSiswa['status'] == 3 ? "<span class='badge badge-success'>Diterima</span>" : null))); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <a href="<?= base_url('admin/siswa/edit/'.$detailSiswa['id']); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit" style="margin-right: 5px;"></i>Edit</a>
                                        <form action="<?= base_url('/admin/siswa/verifikasi/'.$detailSiswa['id']); ?>" class="d-inline" method="post" onclick="return confirm('Yakin diverifikasi?');">
                                            <?= csrf_field(); ?>
                                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-square-o" style="margin-right: 5px;"></i>Terima Pendaftaran</button>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                            <!-- akhir detail mahasiswa -->
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-12">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- /page content -->


<?= $this->endSection(); ?>
