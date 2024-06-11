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
                                                <h3 data-animation="animated slideInUp">Di Laman Resmi Program Studi Pendidikan Non Formal FIP UNP</h3>
                                                <a
                                                    data-animation="animated slideInUp"
                                                    class="btn btn-light border btn-md"
                                                    href="profile.html">Profil</a>
                                                <a
                                                    data-animation="animated slideInUp"
                                                    class="btn btn-theme effect btn-md"
                                                    href="#subscribe">Subscribe</a>
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
                                                <h3 data-animation="animated slideInLeft">We're glade to see you</h3>
                                                <h1 data-animation="animated slideInUp">explore our brilliant graduates</h1>
                                                <a
                                                    data-animation="animated slideInUp"
                                                    class="btn btn-light border btn-md"
                                                    href="#">Learn more</a>
                                                <a
                                                    data-animation="animated slideInUp"
                                                    class="btn btn-theme effect btn-md"
                                                    href="#">View Courses</a>
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
                                                <h3 data-animation="animated slideInLeft">The goal of education</h3>
                                                <h1 data-animation="animated slideInUp">Join the bigest comunity of eduka</h1>
                                                <a
                                                    data-animation="animated slideInUp"
                                                    class="btn btn-light border btn-md"
                                                    href="#">Learn more</a>
                                                <a
                                                    data-animation="animated slideInUp"
                                                    class="btn btn-theme effect btn-md"
                                                    href="#">View Courses</a>
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

    <!-- Berita Utama PNF -->
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

    <!-- Berita dibawah -->
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
                                                    <a href="<?= base_url('/berita/'.$ub['berita_slug']); ?>">Tindak Lanjuti Kerjasama Internasional
                                                        Departemen PNF FIP UNP Adakan Seminar Internasional Dan Visiting Profesor</a>
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

                </div>
            </div>
        </div>
        <!-- End news -->

    <!-- video profil -->
    <!-- Start join Us ============================================= -->
    <div class="join-us-area default-padding bg-dark text-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6 info">
                    <h2><?= $video_profil['vp_judul']; ?></h2>
                    <?= $video_profil['vp_deskripsi']; ?>
                    <a href="" class="btn btn-light effect btn-md">Join With Us</a>
                </div>
                <div class="col-md-6 video">
                    <iframe
                        width="580"
                        height="360"
                        src="<?= $video_profil['vp_youtube_link']; ?>"
                        title="<?= $video_profil['vp_youtube_title']; ?>"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen="allowfullscreen"></iframe>

                </div>
            </div>
        </div>
    </div>
    <!--End Join Us -->
    <!-- akhir video profil -->
    <!-- Start Berita -->
    <div class="blog-area bg-dark text-light full-blog left-sidebar full-blog default-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12 col-md-4">
                    <div class="site-heading text-left">
                        <h2>Agenda</h2>
                    </div>
                    <div class="item">
                        <div class="row">
                            <?php foreach ($semua_agenda as $sa) { ?>
                            <div class="col-lg-12 col-md-12 col-sm-12" style="border-bottom: 1px solid #ffb606; margin-bottom: 10px;">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3">
                                        <div class="icon">
                                            <?php $tanggal_agenda = tanggal_indo($sa['tanggal']);
                                                $array_tanggal_agenda = explode(' ', $tanggal_agenda); 
                                            ?>
                                            <h1 style="border-bottom: 1px solid #ffb606;"><?= $array_tanggal_agenda[0]; ?></h1>
                                            <h5><?= $array_tanggal_agenda[1]; ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-9">
                                        <div class="info">
                                            <h4>
                                                <a href="#"><?= $sa['judul']; ?></a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            
                        </div>
                    </div>
                    <div class="more-btn col-md-12 text-center">
                        <a href="<?= base_url('/semua-agenda'); ?>" class="btn btn-light border btn-md" style="margin-top: 20px;">SEMUA AGENDA</a>
                    </div>
                </div>
                <div class="col-lg-1 col-md-1"></div>

                <div class="col-lg-7 col-md-7 col-sm-12">
                    <div class="site-heading text-left">
                        <h2>Tour Universitas Negeri Padang</h2>
                    </div>
                    <video autoplay muted loop src="<?= base_url('upload/video/video.mp4'); ?>" style="width: 100%;">
                    </video>
                    <p style="text-align: justify;" >
                    Universitas Negeri Padang (UNP) adalah hasil konversi IKIP Padang menjadi Universitas pada tahun 1999 yang pada mulanya bernama perguruan tinggi pendidikan guru (PTPG) yang berdiri pada tanggal 23 Oktober 1954. UNP terdiri dari 10 fakultas dan 1 Pascasarjana. Kampus UNP terletak di kampus Air Tawar, Kota Padang. UNP terakreditasi Unggul Institusi dari BAN-PT.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Berita -->

    <!-- Start Clients Area 
    ============================================= -->
    <div class="clients-area default-padding bg-gray">
        <div class="container">
            <div class="site-heading text-left">
                <h2>Sistem Informasi</h2>
            </div>
            <div class="clients-items owl-carousel owl-theme text-center">
                <div class="single-item">
                    <a href="#"><img src="<?= base_url()?>template_front_end/assets/img/sistem_informasi_satu.png" alt="Clients"></a>
                </div>
                <div class="single-item">
                    <a href="#"><img src="<?= base_url()?>template_front_end/assets/img/sistem_informasi_dua.png" alt="Clients"></a>
                </div>
                <div class="single-item">
                    <a href="#"><img src="<?= base_url()?>template_front_end/assets/img/sistem_informasi_tiga.png" alt="Clients"></a>
                </div>
                <div class="single-item">
                    <a href="#"><img src="<?= base_url()?>template_front_end/assets/img/sistem_informasi_empat.png" alt="Clients"></a>
                </div>
                <div class="single-item">
                    <a href="#"><img src="<?= base_url()?>template_front_end/assets/img/sistem_informasi_lima.png" alt="Clients"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Clients Area -->
  

<?= $this->endSection(); ?>
