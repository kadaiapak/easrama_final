<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

 <!-- page content -->
 <div class="right_col" role="main">
    <div class>
        <div class="page-title">
            <div class="title_left">
                <h3>User</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Detail User <b><?= $detailUser['nama_asli']; ?></b></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3  profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <img class="img-responsive avatar-view" src="<?= base_url('no-photo.jpg'); ?>" width="150px;" alt="Avatar" title="Change the avatar">
                                </div>
                            </div>
                            <a href="<?= base_url('/user'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-chevron-circle-left" style="margin-right: 5px;"></i>Kembali</a>
                            <a href="<?= base_url('/user/edit-password/'.$detailUser['user_id']); ?>" class="btn btn-danger btn-sm"><i class="fa fa-key" style="margin-right: 5px;"></i>Ubah Password</a>
                            <br/>
                        </div>
                        <div class="col-md-9 col-sm-9 ">
                            <div class="profile_title">
                                <div class="col-md-6"><h2>Detail</h2></div>
                            </div>
                        <!-- detail mahasiswa -->
                            <table class="table table-striped table-bordered mb-0">
                                <tr>
                                    <td class="font-weight-bold">Nama</td>
                                    <td><?= $detailUser['nama_asli']; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Username</td>
                                    <td><?= $detailUser['username']; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Aktif ?</td>
                                    <td><?= $detailUser['is_aktif'] == 1 ? "<span class='badge badge-success'>Aktif</span>" : ($detailUser['is_aktif'] == 0 ? "<span class='badge badge-warning'>Tidak Aktif</span>"  : null) ; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Level ?</td>
                                    <td><?= $detailUser['level'] == 1 ? "Super Admin" : ($detailUser['level'] == 2 ? "Admin"  : null) ; ?></td>
                                </tr>
                            </table>
                            <!-- akhir detail mahasiswa -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->


<?= $this->endSection(); ?>
