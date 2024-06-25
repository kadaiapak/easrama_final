<?= $this->extend('layout_front_end/template'); ?>
<?= $this->section('content'); ?>

    <!-- Banner PNF -->
            <div class="banner-area content-top-heading less-paragraph text-normal">
            <div
                id="bootcarousel"
                class="carousel slide animate_text carousel-fade"
                data-ride="carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner text-light carousel-zoom">
                    <div class="item active">
                        <div
                            class="slider-thumb bg-fixed"
                            style="background-image: url(<?= base_url('background.jpg')?>);"></div>
                        <div class="box-table shadow dark">
                            <div class="box-cell">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="content">
                                                <h1 data-animation="animated slideInLeft">SELAMAT DATANG</h1>
                                                <h3 data-animation="animated slideInUp">Di Laman Resmi Bintang Sekolah Al-Qur’an Siteba</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div
                            class="slider-thumb bg-fixed"
                            style="background-image: url(<?= base_url('background.jpg')?>);"></div>
                        <div class="box-table shadow dark">
                            <div class="box-cell">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="content">
                                            <h1 data-animation="animated slideInLeft">SELAMAT DATANG</h1>
                                            <h3 data-animation="animated slideInUp">Di Laman Resmi Bintang Sekolah Al-Qur’an Siteba</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div
                            class="slider-thumb bg-fixed"
                            style="background-image: url(<?= base_url('background.jpg')?>);"></div>
                        <div class="box-table shadow dark">
                            <div class="box-cell">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="content">
                                            <h1 data-animation="animated slideInLeft">SELAMAT DATANG</h1>
                                            <h3 data-animation="animated slideInUp">Di Laman Resmi Bintang Sekolah Al-Qur’an Siteba</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Wrapper for slides -->

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#bootcarousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#bootcarousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                    <span class="sr-only">Next</span>
                </a>

            </div>
        </div>
    <!-- Akhir Banner PNF -->

    <!-- Video Profil -->
    <div class="join-us-area default-padding bg-dark text-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6 info">
                    <h2><?= $video_profil['vp_judul']; ?></h2>
                    <?= $video_profil['vp_deskripsi']; ?>
                </div>
                <div class="col-md-6 video">
                    <iframe
                        width="580"
                        height="360"
                        src="<?= $video_profil['vp_youtube_link']; ?>"
                        title="<?= $video_profil['vp_youtube_title']; ?>"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen="allowfullscreen">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- End Video Profil -->

    <!-- Visi Misi dan Pengumuman -->
    <div class="our-featues-area inc-trending-courses about-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 our-feature-items">
                    <div class="row">

                        <div class="col-md-12 info less-bar">
                            <?php foreach ($visi_misi as $vs) { ?>
                                <?php if($vs['pengaturan_nama'] == 'Title') { ?>
                                <h1><?= $vs['pengaturan_isi']; ?> 
                                </h1>
                                <?php }else { ?>
                                    <h1><?= $vs['pengaturan_nama']; ?></h1>
                                    <p>
                                        <?= $vs['pengaturan_isi']; ?>
                                    </p>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- End Our Features -->

                <!-- End Home Sidebar -->
                <div class="col-md-4 home-sidebar">
                    <!-- Start Latest Post -->
                    <div class="sidebar-item latest-posts trending-courses-box">
                        <h4>Pengumuman</h4>
                        <div class="trending-courses-items">
                            <?php foreach ($pengumuman_berita as $pb) { ?>
                                <div class="item">
                                    <h4>
                                        <a href="<?= base_url('/pengumuman/'.$pb['berita_slug']); ?>"><?= $pb['berita_judul']; ?></a>
                                    </h4>
                                    <div class="meta">
                                        <i class="fas fa-user"></i>
                                        By
                                        <a><?= $pb['nama_user']; ?></a>
                                        <span>
                                            <i class="fas fa-clock"></i>
                                            <?php $tanggal = tanggal_indo($pb['created_at']);
                                                $array_tanggal = explode(" ", $tanggal);
                                            ?>
                                            <?= $array_tanggal[0]; ?> <?= $array_tanggal[1]; ?>, <?= $array_tanggal[2]; ?></span>
                                    </div>
                                </div>
                            <?php } ?>
                            <a href="<?= base_url('/semua-pengumuman'); ?>" class="more">Pengumuman lainnya,..
                                <i class="fas fa-angle-double-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- End Latest Posts -->
                </div>
                <!-- End Home Sidebar -->
            </div>
        </div>
    </div>
    <!-- Akhir dari Visi Misi dan Pengumuman -->

    <!-- Grafik Angkat -->
    <div class="fun-factor-area default-padding bottom-less text-center bg-fixed shadow dark-hard" style="background-image: url(assets/img/2440x1578.png);">
        <div class="container">
            <div class="row">
                <?php foreach ($grafikMahasiswa as $gm) { ?>
                <div class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <div class="icon">
                            <i class="flaticon-contract"></i>
                        </div>
                        <div class="info">
                            <span class="timer" data-to="<?= $gm['pengaturan_isi']; ?>" data-speed="5000"></span>
                            <span class="medium"><?= $gm['pengaturan_nama']; ?></span>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Akhr Grafik Angkat -->

    <!-- Kerjas Sama Program Studi ============================================= -->
    <div class="clients-area default-padding bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-4 info">
                    <h4>Kerjasama</h4>
                    <p>
                        Bintang Sekolah Al-Quran menjalin kerjasama dengan berbagai pihak
                    </p>
                </div>
                <div class="col-md-8 clients">
                    <div class="clients-items owl-carousel owl-theme text-center">
                        <div class="single-item">
                            <a href="#"><img src="<?= base_url('/logo_sekolah_alquran.png'); ?>" alt="Clients"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="<?= base_url('/logo_sekolah_alquran.png'); ?>" alt="Clients"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="<?= base_url('/logo_sekolah_alquran.png'); ?>" alt="Clients"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="<?= base_url('/logo_sekolah_alquran.png'); ?>" alt="Clients"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="<?= base_url('/logo_sekolah_alquran.png'); ?>" alt="Clients"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="<?= base_url('/logo_sekolah_alquran.png'); ?>" alt="Clients"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="<?= base_url('/logo_sekolah_alquran.png'); ?>" alt="Clients"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="<?= base_url('/logo_sekolah_alquran.png'); ?>" alt="Clients"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="<?= base_url('/logo_sekolah_alquran.png'); ?>" alt="Clients"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="<?= base_url('/logo_sekolah_alquran.png'); ?>" alt="Clients"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Kerja sama Program Studi -->


<?= $this->endSection(); ?>
