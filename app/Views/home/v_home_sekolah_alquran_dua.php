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
                            style="background-image: url(<?= base_url('template_front_end/assets/img/2440x1578.png')?>);"></div>
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
                            style="background-image: url(<?= base_url('template_front_end/assets/img/2440x1578.png')?>);"></div>
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
                            style="background-image: url(<?= base_url('template_front_end/assets/img/2440x1578.png')?>);"></div>
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

    <?php if($penting_berita != null) { ?>
        <!-- Berita Penting PNF -->
    <div id="blog" class="blog-area"><br><br>
        <div class="container">
            <div class="row">
                <div class="blog-items">
                    <!-- Single Item -->
                    <div class="col-md-6 single-item">
                        <div class="item">
                            <div class="thumb">
                                <a href="<?= base_url('/berita/'.$penting_berita['berita_slug']); ?>"><img src="<?= base_url()?>upload/berita_sampul/<?= $penting_berita['berita_sampul']; ?>" alt="Thumb"></a>
                                <div class="date">
                                <?php $tanggal = tanggal_indo($penting_berita['created_at']);
                                    $array_tanggal_berita = explode(" ", $tanggal);
                                    ?>
                                    <h4><span><?= $array_tanggal_berita[0]; ?></span> <?= $array_tanggal_berita[1]; ?>, <?= $array_tanggal_berita[2]; ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 info">
                        <h4>Berita Penting</h4>
                        <h1><?= $penting_berita['berita_judul']; ?></h1>
                        <div class="meta">
                            <i class="fas fa-user"></i>
                            By
                            <a><?= $penting_berita['nama_user']; ?></a>&emsp;
                            <span>
                                <?php $tanggal = tanggal_indo($penting_berita['created_at']);
                                    $array_tanggal_beasiswa = explode(" ", $tanggal);
                                ?>
                                <i class="fas fa-calendar-alt"></i>
                                <?= $tanggal; ?></li>
                            </span>&emsp;
                        </div>
                        <?php $remove_tag = strip_tags($penting_berita['berita_isi']); ?>
                        <p><?= substr($remove_tag,0,300) ?> ...  </p>
                        <a href="<?= base_url('/berita/'.$penting_berita['berita_slug']); ?>" class="btn btn-dark border btn-md">Baca Lebih Lanjut</a>
                    </div>
                <!-- Single Item -->
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Berita Utama PNF -->
    <?php } ?>

    <!-- Berita Umum -->
    <div class="about-area">
        <div class="container">
            <div class="row">
                <div class="seperator col-md-12">
                    <span class="border"></span>
                </div>
                <div id="blog" class="blog-area bottom-less">
                    <div class="container">
                        <div class="row">
                            <div class="blog-items">
                                <?php foreach ($umum_berita as $ub) { ?>
                                <!-- Single Item -->
                                <div class="col-md-3 single-item">
                                    <div class="item">
                                        <div class="thumb">
                                            <a href="<?= base_url('/berita/'.$ub['berita_slug']); ?>"><img src="<?= base_url()?>upload/berita_sampul/<?= $ub['berita_sampul']; ?>" alt="Thumb"></a>
                                            <div class="date">
                                                <?php $tanggal = tanggal_indo($ub['created_at']);
                                                $array_tanggal_beasiswa = explode(" ", $tanggal);
                                                ?>
                                                <h4><span><?= $array_tanggal_beasiswa[0]; ?></span> <?= $array_tanggal_beasiswa[1]; ?>, <?= $array_tanggal_beasiswa[2]; ?></h4>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <h4>
                                                <a href="<?= base_url('/berita/'.$ub['berita_slug']); ?>"><?= $ub['berita_judul']; ?></a>
                                            </h4>
                                            <i class="fas fa-user"></i>
                                            By
                                            <a><?= $ub['nama_user']; ?></a>&emsp;
                                            <span>
                                            <i class="fas fa-eye"></i> <?= $ub['berita_tayang']; ?></span>
                                            <div class="meta">
                                                <a href="<?= base_url('/berita/'.$ub['berita_slug']); ?>">Baca Lebih Lanjut
                                                    <i class="fas fa-angle-double-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Item -->
                                <?php }; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="more-btn col-md-12 text-center" style="margin-bottom: 30px;">
                    <a href="<?= base_url('/semua-berita'); ?>" class="btn btn-dark border btn-md">LIHAT SEMUA BERITA</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Berita Umum -->

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

    <!-- Start Why Chose Us ============================================= -->
    <div class="wcs-area bg-dark text-light">
        <div class="container-full">
            <div class="row">
                <div
                    class="col-md-6 thumb bg-cover"
                    style="background-image: url(assets/img/2440x1578.png);"></div>
                <div class="col-md-6 content">
                    <div class="site-heading text-left">
                        <h2>Kenapa Memilih Kami</h2>
                        <p>
                            Discourse assurance estimable applauded to so. Him everything melancholy
                            uncommonly but solicitude inhabiting projection off. Connection stimulated
                            estimating excellence an to impression.
                        </p>
                    </div>

                    <!-- item -->
                    <div class="item">
                        <div class="icon">
                            <i class="flaticon-trending"></i>
                        </div>
                        <div class="info">
                            <h4>
                                <a href="#">Trending Courses</a>
                            </h4>
                            <p>
                                Absolute required of reserved in offering no. How sense found our those gay
                                again taken the. Had mrs outweigh desirous sex overcame. Improved property
                                reserved disposal do offering me.
                            </p>
                        </div>
                    </div>
                    <!-- item -->

                    <!-- item -->
                    <div class="item">
                        <div class="icon">
                            <i class="flaticon-books"></i>
                        </div>
                        <div class="info">
                            <h4>
                                <a href="#">Books & Library</a>
                            </h4>
                            <p>
                                Absolute required of reserved in offering no. How sense found our those gay
                                again taken the. Had mrs outweigh desirous sex overcame. Improved property
                                reserved disposal do offering me.
                            </p>
                        </div>
                    </div>
                    <!-- item -->

                    <!-- item -->
                    <div class="item">
                        <div class="icon">
                            <i class="flaticon-professor"></i>
                        </div>
                        <div class="info">
                            <h4>
                                <a href="#">Certified Teachers</a>
                            </h4>
                            <p>
                                Absolute required of reserved in offering no. How sense found our those gay
                                again taken the. Had mrs outweigh desirous sex overcame. Improved property
                                reserved disposal do offering me.
                            </p>
                        </div>
                    </div>
                    <!-- item -->

                </div>
            </div>
        </div>
    </div>
    <!-- End Why Chose Us -->

    <!-- Prestasi ============================================= -->
    <div class="popular-courses bg-gray circle carousel-shadow default-padding">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2><?= $headerPrestasi['pengaturan_nama']; ?></h2>
                        <p>
                          <?= $headerPrestasi['pengaturan_isi']; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div
                        class="popular-courses-items popular-courses-carousel owl-carousel owl-theme">
                        <?php foreach ($prestasi as $p) { ?>
                        <!-- Single Item -->
                        <div class="item">
                            <div class="thumb">
                                <a href="<?= base_url('/prestasi/'.$p['prestasi_slug']); ?>">
                                    <img src="<?= base_url('upload/prestasi/'.$p['prestasi_sampul']); ?>" alt="Thumb">
                                </a>
                            </div>
                            <div class="info">
                                <div class="author-info">
                                    <div class="thumb">
                                        <a href="<?= base_url('/prestasi/'.$p['prestasi_slug']); ?>"><img src="<?= base_url('upload/prestasi/'.$p['prestasi_sampul']); ?>" alt="Thumb"></a>
                                    </div>
                                    <div class="others">
                                        <a href="<?= base_url('/prestasi/'.$p['prestasi_slug']); ?>">Dion Laloc</a>
                                        <div class="rating">
                                            <span><?= $p['prestasi_peringkat']; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <h4>
                                    <a href="<?= base_url('/prestasi/'.$p['prestasi_slug']); ?>"><?= $p['prestasi_judul']; ?></a>
                                </h4>
                                <?= $p['prestasi_deskripsi']; ?>
                                <div class="bottom-info">
                                    <ul>
                                        <li>
                                            <span>
                                                <i class="fas fa-clock"></i>
                                                <?php $tanggal_prestasi = tanggal_indo($p['created_at']);
                                                ?>
                                                <?= $tanggal_prestasi; ?></span>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Item -->
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Prestasi -->

    <!-- Grafik Angkat -->
    <div class="fun-factor-area default-padding bottom-less text-center bg-fixed shadow dark-hard" style="background-image: url(assets/img/2440x1578.png);">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <div class="icon">
                            <i class="flaticon-contract"></i>
                        </div>
                        <div class="info">
                            <span class="timer" data-to="212" data-speed="5000"></span>
                            <span class="medium">Karya Ilmiah</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <div class="icon">
                            <i class="flaticon-professor"></i>
                        </div>
                        <div class="info">
                            <span class="timer" data-to="128" data-speed="5000"></span>
                            <span class="medium">Jumlah Dosen</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <div class="icon">
                            <i class="flaticon-online"></i>
                        </div>
                        <div class="info">
                            <span class="timer" data-to="8970" data-speed="5000"></span>
                            <span class="medium">Mahasiswa Terdaftar</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <div class="icon">
                            <i class="flaticon-medal"></i>
                        </div>
                        <div class="info">
                            <span class="timer" data-to="640" data-speed="5000"></span>
                            <span class="medium">Cources</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhr Grafik Angkat -->

        <!-- Ulasan Alumni ============================================= -->
        <div
        class="testimonials-area carousel-shadow default-padding bg-dark text-light">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Ulasan Alumni</h2>
                        <p>
                            Able an hope of body. Any nay shyness article matters own removal nothing his
                            forming. Gay own additions education satisfied the perpetual. If he cause manor
                            happy. Without farther she exposed saw man led. Along on happy could cease green
                            oh.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="clients-review-carousel owl-carousel owl-theme">
                        <!-- Single Item -->
                        <div class="item">
                            <div class="col-md-5 thumb">
                                <img src="assets/img/800x800.png" alt="Thumb">
                            </div>
                            <div class="col-md-7 info">
                                <p>
                                    Procuring continued suspicion its ten. Pursuit brother are had fifteen distant
                                    has. Early had add equal china quiet visit. Appear an manner as no limits either
                                    praise..
                                </p>
                                <h4>Druna Patia</h4>
                                <span>Mentri Pendidikan</span>
                            </div>
                        </div>
                        <!-- Single Item -->
                        <!-- Single Item -->
                        <div class="item">
                            <div class="col-md-5 thumb">
                                <img src="assets/img/800x800.png" alt="Thumb">
                            </div>
                            <div class="col-md-7 info">
                                <p>
                                    Procuring continued suspicion its ten. Pursuit brother are had fifteen distant
                                    has. Early had add equal china quiet visit. Appear an manner as no limits either
                                    praise..
                                </p>
                                <h4>Astron Brun</h4>
                                <span>Guru SMA N 5 Solok Selatan</span>
                            </div>
                        </div>
                        <!-- Single Item -->
                        <!-- Single Item -->
                        <div class="item">
                            <div class="col-md-5 thumb">
                                <img src="assets/img/800x800.png" alt="Thumb">
                            </div>
                            <div class="col-md-7 info">
                                <p>
                                    Procuring continued suspicion its ten. Pursuit brother are had fifteen distant
                                    has. Early had add equal china quiet visit. Appear an manner as no limits either
                                    praise..
                                </p>
                                <h4>Paol Druva</h4>
                                <span>Pengacara</span>
                            </div>
                        </div>
                        <!-- Single Item -->
                        <!-- Single Item -->
                        <div class="item">
                            <div class="col-md-5 thumb">
                                <img src="assets/img/800x800.png" alt="Thumb">
                            </div>
                            <div class="col-md-7 info">
                                <p>
                                    Procuring continued suspicion its ten. Pursuit brother are had fifteen distant
                                    has. Early had add equal china quiet visit. Appear an manner as no limits either
                                    praise..
                                </p>
                                <h4>Druna Patia</h4>
                                <span>Dosen UGM</span>
                            </div>
                        </div>
                        <!-- Single Item -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Ulasan ALumni -->


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
