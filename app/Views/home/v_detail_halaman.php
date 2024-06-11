<?= $this->extend('layout_front_end/template'); ?>
<?= $this->section('content'); ?>
<!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area shadow dark text-center bg-fixed text-light" style="background-image: url(<?= base_url('template_front_end/assets/img/foto_rektorat.jpg')?>);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1><?= $detailHalaman['halaman_nama']; ?></h1>
                    <ul class="breadcrumb">
                        <li><a href="/"><i class="fas fa-home"></i> Halaman</a></li>
                        <li><a href="/"><?= $detailHalaman['halaman_nama']; ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Blog
    ============================================= -->
    <div class="blog-area full-blog right-sidebar single-blog full-blog default-padding">
        <div class="container">
            <div class="row">
                <div class="blog-items">
                    <div class="blog-content col-md-8">
                        <div class="item-box">
                            <div class="item">
                                <div class="thumb">
                                    <a href="#">
                                        <?php if($detailHalaman['halaman_cover'] != null) { ?>
                                            <div class="image_contaner" style="width: 100%; height: 400px;">
                                                <img style="object-fit: cover; height: 100%; width: 100%;" src="<?= base_url('/upload/halaman_sampul/'.$detailHalaman['halaman_cover']); ?>" alt="Thumb">
                                            </div>  
                                        <?php } ?>
                                    </a>
                                </div>
                                <div class="info">
                                    <h3>    
                                        <?= $detailHalaman['halaman_judul_isi']; ?>
                                    </h3>
                                    <div class="meta">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-user"></i> <?= $detailHalaman['nama_user']; ?></a></li>
                                        </ul>
                                    </div>
                                    <?= $detailHalaman['halaman_isi']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Start Sidebar -->
                    <?php include('pengumuman_sidebar.php'); ?>
                    <!-- End Start Sidebar -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->
<?= $this->endSection(); ?>
