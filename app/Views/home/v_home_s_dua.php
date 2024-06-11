<?= $this->extend('layout_front_end/template'); ?>
<?= $this->section('content'); ?>
<!-- Start Banner ============================================= -->
<div class="banner-area content-top-heading less-paragraph text-normal">
    <div id="bootcarousel" class="carousel slide animate_text carousel-fade" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner text-light carousel-zoom">
            <div class="item active">
                <div class="slider-thumb bg-fixed" style="background-image: url(assets/img/2440x1578.png);"></div>
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
                <div class="slider-thumb bg-fixed" style="background-image: url(assets/img/2440x1578.png);"></div>
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
                <div class="slider-thumb bg-fixed" style="background-image: url(assets/img/2440x1578.png);"></div>
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
<!-- End Banner -->

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

        <!-- Berita Terkini -->
        <div class="about-area">
            <div class="container">
                <div class="row">
                    <div class="site-heading text-center">
                        <div class="col-md-8 col-md-offset-2">
                            <h2>Berita Terkini</h2>
                            <p>
                                Berita Program Studi Magister Pendidikan Non Formal Fakultas Ilmu Pendidikan
                                Universitas Negeri Padang
                            </p>
                        </div>
                    </div>
                    <div id="blog" class="blog-area bottom-less">
                        <div class="container">
                            <div class="row">
                                <div class="blog-items">
                                    <!-- Single Item -->
                                    <div class="col-md-3 single-item">
                                        <div class="item">
                                            <div class="thumb">
                                                <a href="#"><img src="assets/img/1500x700.jpeg" alt="Thumb"></a>
                                            </div>
                                            <div class="info">
                                                <h4>
                                                    <a href="Halaman Berita Lengkap.html">Tindak Lanjuti Kerjasama Internasional
                                                        Departemen PNF FIP UNP Adakan Seminar Internasional Dan Visiting Profesor</a>
                                                </h4>
                                                <i class="fas fa-user"></i>
                                                By
                                                <a>Dion Laloc</a>&emsp;
                                                <span>
                                                    <i class="fas fa-clock"></i>
                                                    25 Nov, 2023</span>
                                                <div class="meta">
                                                    <a href="Halaman Berita Lengkap.html">Baca Lebih Lanjut
                                                        <i class="fas fa-angle-double-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Item -->
                                    <!-- Single Item -->
                                    <div class="col-md-3 single-item">
                                        <div class="item">
                                            <div class="thumb">
                                                <a href="#"><img src="assets/img/800x600.png" alt="Thumb"></a>
                                            </div>
                                            <div class="info">
                                                <h4>
                                                    <a href="Halaman Berita Lengkap.html">IMPLEMETASI AKSI BELA RAYA (CONGKAK
                                                        LITERASI BERBASIS NILAI KARAKTER DAN BUDAYA) DI KAMPUNG MELAYU KOTA MEDAN</a>
                                                </h4>
                                                <i class="fas fa-user"></i>
                                                By
                                                <a>Drup Paul</a>
                                                &emsp;
                                                <span>
                                                    <i class="fas fa-clock"></i>
                                                    13 Jan, 2019</span>
                                                <div class="meta">
                                                    <a href="Halaman Berita Lengkap.html">Baca Lebih Lanjut
                                                        <i class="fas fa-angle-double-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Item -->
                                    <!-- Single Item -->
                                    <div class="col-md-3 single-item">
                                        <div class="item">
                                            <div class="thumb">
                                                <a href="#"><img src="assets/img/800x600.png" alt="Thumb"></a>
                                            </div>
                                            <div class="info">
                                                <h4>
                                                    <a href="Halaman Berita Lengkap.html">Kaprodi S2 MPI Pascasarjana UIN Maulana
                                                        Malik Ibrahim Malang Meraih Penghargaan Penulis Buku Produktif dari Permapendis
                                                        Indonesia dalam RAKERNAS PERMAPENDIS dan International Conference</a>
                                                </h4>
                                                <i class="fas fa-user"></i>
                                                By
                                                <a>Drup Paul</a>
                                                &emsp;
                                                <span>
                                                    <i class="fas fa-clock"></i>
                                                    13 Jan, 2019</span>
                                                <div class="meta">
                                                    <a href="Halaman Berita Lengkap.html">Baca Lebih Lanjut
                                                        <i class="fas fa-angle-double-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Item -->
                                    <!-- Single Item -->
                                    <div class="col-md-3 single-item">
                                        <div class="item">
                                            <div class="thumb">
                                                <a href="#"><img src="assets/img/800x600.png" alt="Thumb"></a>
                                            </div>
                                            <div class="info">
                                                <h4>
                                                    <a href="Halaman Berita Lengkap.html">Pendidikan Nonformal : Dimensi dalam
                                                        Keaksaraan Fungsional, Pelatihan dan Andragogi</a>
                                                </h4>
                                                <i class="fas fa-user"></i>
                                                By
                                                <a>Drup Paul</a>
                                                &emsp;
                                                <span>
                                                    <i class="fas fa-clock"></i>
                                                    13 Jan, 2019</span>
                                                <div class="meta">
                                                    <a href="Halaman Berita Lengkap.html">Baca Lebih Lanjut<i class="fas fa-angle-double-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Item -->

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End news -->

        <!-- Start Fun Factor ============================================= -->
        <div
            class="fun-factor-area default-padding bottom-less text-center bg-fixed shadow dark-hard"
            style="background-image: url(assets/img/2440x1578.png);">
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
        <!-- End Fun Factor -->

        <!-- Start Popular Courses ============================================= -->
        <div
            id="courses"
            class="popular-courses bg-gray circle carousel-shadow default-padding">
            <div class="container">
                <div class="row">
                    <div class="site-heading text-center">
                        <div class="col-md-8 col-md-offset-2">
                            <h2>E-Learning Magister PNF FIP UNP</h2>
                            <p>
                                Discourse assurance estimable applauded to so. Him everything melancholy
                                uncommonly but solicitude inhabiting projection off. Connection stimulated
                                estimating excellence an to impression.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div
                            class="popular-courses-items bottom-price popular-courses-carousel owl-carousel owl-theme">
                            <!-- Single Item -->
                            <div class="item">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="assets/img/800x600.png" alt="Thumb">
                                    </a>
                                    <div class="overlay">
                                        <a class="btn btn-theme effect btn-sm" href="#">
                                            <i class="fas fa-chart-bar"></i>
                                            Enroll Now
                                        </a>
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="author-info">
                                        <div class="thumb">
                                            <a href="#"><img src="assets/img/100x100.png" alt="Thumb"></a>
                                        </div>
                                        <div class="others">
                                            <a href="#">Munil Druva</a>
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <span>4.5 (23,890)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <h4>
                                        <a href="#">Java Programming Masterclass</a>
                                    </h4>
                                    <div class="cats">
                                        <a href="#">Education</a>
                                        <a href="#">Science</a>
                                    </div>
                                    <p>
                                        Would day nor ask walls known. But preserved advantage are but and certainty
                                        earnestly enjoyment.
                                    </p>
                                    <div class="bottom-info">
                                        <ul>
                                            <li>
                                                <i class="fas fa-user"></i>
                                                6,690
                                            </li>
                                            <li>
                                                <i class="fas fa-clock"></i>
                                                16:00
                                            </li>
                                        </ul>
                                        <div class="price-btn">
                                            Free
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="item">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="assets/img/800x600.png" alt="Thumb">
                                    </a>
                                    <div class="overlay">
                                        <a class="btn btn-theme effect btn-sm" href="#">
                                            <i class="fas fa-chart-bar"></i>
                                            Enroll Now
                                        </a>
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="author-info">
                                        <div class="thumb">
                                            <a href="#"><img src="assets/img/100x100.png" alt="Thumb"></a>
                                        </div>
                                        <div class="others">
                                            <a href="#">Akua Paul</a>
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <span>5 (1,890)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <h4>
                                        <a href="#">Social Science & Humanities</a>
                                    </h4>
                                    <div class="cats">
                                        <a href="#">Social</a>
                                        <a href="#">Online</a>
                                    </div>
                                    <p>
                                        Would day nor ask walls known. But preserved advantage are but and certainty
                                        earnestly enjoyment.
                                    </p>
                                    <div class="bottom-info">
                                        <ul>
                                            <li>
                                                <i class="fas fa-user"></i>
                                                6,690
                                            </li>
                                            <li>
                                                <i class="fas fa-clock"></i>
                                                16:00
                                            </li>
                                        </ul>
                                        <div class="price-btn">
                                            $12.00
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="item">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="assets/img/800x600.png" alt="Thumb">
                                    </a>
                                    <div class="overlay">
                                        <a class="btn btn-theme effect btn-sm" href="#">
                                            <i class="fas fa-chart-bar"></i>
                                            Enroll Now
                                        </a>
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="author-info">
                                        <div class="thumb">
                                            <a href="#"><img src="assets/img/100x100.png" alt="Thumb"></a>
                                        </div>
                                        <div class="others">
                                            <a href="#">Jon Babu</a>
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <span>4.7 (890)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <h4>
                                        <a href="#">Actualized Leadership Network</a>
                                    </h4>
                                    <div class="cats">
                                        <a href="#">Online</a>
                                        <a href="#">Source</a>
                                    </div>
                                    <p>
                                        Would day nor ask walls known. But preserved advantage are but and certainty
                                        earnestly enjoyment.
                                    </p>
                                    <div class="bottom-info">
                                        <ul>
                                            <li>
                                                <i class="fas fa-user"></i>
                                                8,690
                                            </li>
                                            <li>
                                                <i class="fas fa-clock"></i>
                                                126:00
                                            </li>
                                        </ul>
                                        <div class="price-btn">
                                            Free
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="item">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="assets/img/800x600.png" alt="Thumb">
                                    </a>
                                    <div class="overlay">
                                        <a class="btn btn-theme effect btn-sm" href="#">
                                            <i class="fas fa-chart-bar"></i>
                                            Enroll Now
                                        </a>
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="author-info">
                                        <div class="thumb">
                                            <a href="#"><img src="assets/img/100x100.png" alt="Thumb"></a>
                                        </div>
                                        <div class="others">
                                            <a href="#">Babu Paol</a>
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <span>5 (980)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <h4>
                                        <a href="#">Machine Learning Management</a>
                                    </h4>
                                    <div class="cats">
                                        <a href="#">PHP</a>
                                        <a href="#">Programming</a>
                                    </div>
                                    <p>
                                        Would day nor ask walls known. But preserved advantage are but and certainty
                                        earnestly enjoyment.
                                    </p>
                                    <div class="bottom-info">
                                        <ul>
                                            <li>
                                                <i class="fas fa-user"></i>
                                                8,690
                                            </li>
                                            <li>
                                                <i class="fas fa-clock"></i>
                                                256:00
                                            </li>
                                        </ul>
                                        <div class="price-btn">
                                            $124.00
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="item">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="assets/img/800x600.png" alt="Thumb">
                                    </a>
                                    <div class="overlay">
                                        <a class="btn btn-theme effect btn-sm" href="#">
                                            <i class="fas fa-chart-bar"></i>
                                            Enroll Now
                                        </a>
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="author-info">
                                        <div class="thumb">
                                            <a href="#"><img src="assets/img/100x100.png" alt="Thumb"></a>
                                        </div>
                                        <div class="others">
                                            <a href="#">Mickel Clark</a>
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <span>4.5 (23,890)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <h4>
                                        <a href="#">Online Programming</a>
                                    </h4>
                                    <div class="cats">
                                        <a href="#">Education</a>
                                        <a href="#">Science</a>
                                    </div>
                                    <p>
                                        Would day nor ask walls known. But preserved advantage are but and certainty
                                        earnestly enjoyment.
                                    </p>
                                    <div class="bottom-info">
                                        <ul>
                                            <li>
                                                <i class="fas fa-user"></i>
                                                6,690
                                            </li>
                                            <li>
                                                <i class="fas fa-clock"></i>
                                                16:00
                                            </li>
                                        </ul>
                                        <div class="price-btn">
                                            $12.00
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Popular Courses -->

        <!-- Start Top Categories ============================================= -->
        <div id="top-categories" class="top-cat-area default-padding bottom-less">
            <div class="container">
                <div class="row">
                    <div class="site-heading text-center">
                        <div class="col-md-8 col-md-offset-2">
                            <h2>Layanan Magister PNF FIP UNP</h2>
                            <p>
                                Discourse assurance estimable applauded to so. Him everything melancholy
                                uncommonly but solicitude inhabiting projection off. Connection stimulated
                                estimating excellence an to impression.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="top-cat-items">
                        <div class="col-md-3 col-sm-6 equal-height">
                            <div class="item" style="background-image: url(assets/img/800x600.png);">
                                <a href="#">
                                    <i class="flaticon-feature"></i>
                                    <div class="info">
                                        <h4>software engineering</h4>
                                        <span>(1,226) Topics</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 equal-height">
                            <div class="item" style="background-image: url(assets/img/800x600.png);">
                                <a href="#">
                                    <i class="flaticon-interaction"></i>
                                    <div class="info">
                                        <h4>Interactive Programming</h4>
                                        <span>(2,366) Topics</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 equal-height">
                            <div class="item" style="background-image: url(assets/img/800x600.png);">
                                <a href="#">
                                    <i class="flaticon-conveyor"></i>
                                    <div class="info">
                                        <h4>Quantum Mechanics</h4>
                                        <span>(766) Topics</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 equal-height">
                            <div class="item" style="background-image: url(assets/img/800x600.png);">
                                <a href="#">
                                    <i class="flaticon-education"></i>
                                    <div class="info">
                                        <h4>Preventing Dementia</h4>
                                        <span>(4,500) Topics</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 equal-height">
                            <div class="item" style="background-image: url(assets/img/800x600.png);">
                                <a href="#">
                                    <i class="flaticon-potential"></i>
                                    <div class="info">
                                        <h4>Hidden Potential</h4>
                                        <span>(975) Topics</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 equal-height">
                            <div class="item" style="background-image: url(assets/img/800x600.png);">
                                <a href="#">
                                    <i class="flaticon-print"></i>
                                    <div class="info">
                                        <h4>Introduction Programming</h4>
                                        <span>(3,340) Topics</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 equal-height">
                            <div class="item" style="background-image: url(assets/img/800x600.png);">
                                <a href="#">
                                    <i class="flaticon-translate"></i>
                                    <div class="info">
                                        <h4>Machine Learning</h4>
                                        <span>(7,800) Topics</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 equal-height">
                            <div class="item" style="background-image: url(assets/img/800x600.png);">
                                <a href="#">
                                    <i class="flaticon-firewall"></i>
                                    <div class="info">
                                        <h4>Maintaining a Mindful</h4>
                                        <span>(24,80) Topics</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Top Categories -->

        <!-- Start Advisor Area ============================================= -->
        <section id="advisor" class="advisor-area bg-gray circle default-padding">
            <div class="container">
                <div class="row">
                    <div class="site-heading text-center">
                        <div class="col-md-8 col-md-offset-2">
                            <h2>Pengalaman Dosen PNF FIP NP</h2>
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
                        <div class="advisor-carousel owl-carousel owl-theme text-center text-light">

                            <!-- Single Item -->
                            <div class="advisor-item">
                                <div class="info-box">
                                    <img src="assets/img/800x800.png" alt="Thumb">
                                    <div class="info-title">
                                        <h4>Dr. Ismaniar, S.Pd, M.Pd</h4>
                                        <span>Bahasa Indonesia</span>
                                    </div>
                                    <div class="overlay">
                                        <div class="box">
                                            <div class="content">
                                                <div class="overlay-content">
                                                    <h4>About Nuri Paul</h4>
                                                    <p>
                                                        Great explorer of the truth, the master-builder of human happiness.
                                                    </p>
                                                    <a href="#">Read More</a>
                                                    <div class="social">
                                                        <ul>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fab fa-facebook-f"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fab fa-twitter"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fab fa-pinterest"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fab fa-instagram"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item -->
                            <!-- Single Item -->
                            <div class="advisor-item">
                                <div class="info-box">
                                    <img src="assets/img/800x800.png" alt="Thumb">
                                    <div class="info-title">
                                        <h4>Fitri Dwi Arini, M.Pd.</h4>
                                        <span>Pembelajaran Isyarat
                                        </span>
                                    </div>
                                    <div class="overlay">
                                        <div class="box">
                                            <div class="content">
                                                <div class="overlay-content">
                                                    <h4>About John Babu</h4>
                                                    <p>
                                                        Great explorer of the truth, the master-builder of human happiness.
                                                    </p>
                                                    <a href="#">Read More</a>
                                                    <div class="social">
                                                        <ul>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fab fa-facebook-f"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fab fa-twitter"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fab fa-pinterest"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fab fa-instagram"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item -->
                            <!-- Single Item -->
                            <div class="advisor-item">
                                <div class="info-box">
                                    <img src="assets/img/800x800.png" alt="Thumb">
                                    <div class="info-title">
                                        <h4>Dr. Mhd. Natsir, S.Sos., M.Pd.</h4>
                                        <span>Kreatifitas Anak Usia Dini</span>
                                    </div>
                                    <div class="overlay">
                                        <div class="box">
                                            <div class="content">
                                                <div class="overlay-content">
                                                    <h4>About Mridul Druva</h4>
                                                    <p>
                                                        Great explorer of the truth, the master-builder of human happiness.
                                                    </p>
                                                    <a href="#">Read More</a>
                                                    <div class="social">
                                                        <ul>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fab fa-facebook-f"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fab fa-twitter"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fab fa-pinterest"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fab fa-instagram"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item -->
                            <!-- Single Item -->
                            <div class="advisor-item">
                                <div class="info-box">
                                    <img src="assets/img/800x800.png" alt="Thumb">
                                    <div class="info-title">
                                        <h4>Sufia Nilla</h4>
                                        <span>Project Manager</span>
                                    </div>
                                    <div class="overlay">
                                        <div class="box">
                                            <div class="content">
                                                <div class="overlay-content">
                                                    <h4>About Sufia Nilla</h4>
                                                    <p>
                                                        Great explorer of the truth, the master-builder of human happiness.
                                                    </p>
                                                    <a href="#">Read More</a>
                                                    <div class="social">
                                                        <ul>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fab fa-facebook-f"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fab fa-twitter"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fab fa-pinterest"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fab fa-instagram"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item -->
                            <!-- Single Item -->
                            <div class="advisor-item">
                                <div class="info-box">
                                    <img src="assets/img/800x800.png" alt="Thumb">
                                    <div class="info-title">
                                        <h4>Professon. Nuri Paul</h4>
                                        <span>Chemistry specialist</span>
                                    </div>
                                    <div class="overlay">
                                        <div class="box">
                                            <div class="content">
                                                <div class="overlay-content">
                                                    <h4>About Nuri Paul</h4>
                                                    <p>
                                                        Great explorer of the truth, the master-builder of human happiness.
                                                    </p>
                                                    <a href="#">Read More</a>
                                                    <div class="social">
                                                        <ul>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fab fa-facebook-f"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fab fa-twitter"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fab fa-pinterest"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fab fa-instagram"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item -->

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Advisor Area -->

        <!-- Start Video Area ============================================= -->
        <div
            class="video-area padding-xl text-center bg-fixed text-light shadow dark-hard"
            style="background-image: url(assets/img/2440x1578.png);">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="video-heading">
                            <h2>Video Profil S2 PNF FIP UNP</h2>
                            <p>
                                Tolerably behaviour may admitting daughters offending her ask own. Praise effect
                                wishes change way and any wanted. Lively use looked latter regard had. Do he it
                                part more last in. Merits ye if mr narrow points. Melancholy particular
                                devonshire alteration it favourable appearance
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="video-info">
                        <div class="overlay-video">
                            <a
                                class="popup-youtube video-play-button"
                                href="https://www.youtube.com/watch?v=8GQTt50izkg">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Video Area -->

        <!-- Start Testimonials ============================================= -->
        <div
            class="testimonials-area carousel-shadow default-padding bg-dark text-light">
            <div class="container">
                <div class="row">
                    <div class="site-heading text-center">
                        <div class="col-md-8 col-md-offset-2">
                            <h2>Alumni S2 PNF FIP UNP</h2>
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
                                    <span>Biology Student</span>
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
                                    <span>Science Student</span>
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
                                    <span>Development Student</span>
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
                                    <span>Biology Student</span>
                                </div>
                            </div>
                            <!-- Single Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Testimonials -->

<?= $this->endSection(); ?>
