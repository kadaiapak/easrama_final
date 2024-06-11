<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Examin - Education and LMS Template">

    <!-- ========== Page Title ========== -->
    <title><?= $judul; ?></title>

    <!-- ========== Favicon Icon ========== -->
    <!-- <link rel="shortcut icon" href="< ?= base_url()?>template_front_end/assets/img/favicon.png" type="image/x-icon"> -->
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <!-- ========== Start Stylesheet ========== -->
    <link href="<?= base_url()?>template_front_end/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= base_url()?>template_front_end/assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?= base_url()?>template_front_end/assets/css/flaticon-set.css" rel="stylesheet" />
    <link href="<?= base_url()?>template_front_end/assets/css/elegant-icons.css" rel="stylesheet" />
    <link href="<?= base_url()?>template_front_end/assets/css/magnific-popup.css" rel="stylesheet" />
    <link href="<?= base_url()?>template_front_end/assets/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="<?= base_url()?>template_front_end/assets/css/owl.theme.default.min.css" rel="stylesheet" />
    <link href="<?= base_url()?>template_front_end/assets/css/animate.css" rel="stylesheet" />
    <link href="<?= base_url()?>template_front_end/assets/css/bootsnav.css" rel="stylesheet" />
    <link href="<?= base_url()?>template_front_end/assets/css/responsive.css" rel="stylesheet" />
    <link href="<?= base_url()?>template_front_end/style.css" rel="stylesheet">
    <!-- ========== End Stylesheet ========== -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="< ?= base_url()?>template_front_end/assets/js/html5/html5shiv.min.js"></script>
      <script src="< ?= base_url()?>template_front_end/assets/js/html5/respond.min.js"></script>
    <![endif]-->

    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">

</head>

<body>

    <!-- Preloader Start -->
    <!-- <div class="se-pre-con"></div> -->
    <!-- Preloader Ends -->

    <!-- Start Header Top ============================================= -->
    <div class="top-bar-area address-two-lines bg-dark text-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 address-info">
                        <div class="info box link">
                            <ul>
                                <li>
                                    <span>
                                        <i class="fas fa-map"></i>
                                        Address</span>Jl. Prof. Dr. Hamka, Air Tawar, Padang
                                </li>
                                <li>
                                    <span>
                                        <i class="fas fa-envelope-open"></i>
                                        Email</span>pnf@fip.unp.ac.id
                                </li>
                                <li>
                                    <span>
                                        <i class="fas fa-phone"></i>
                                        Contact</span>
                                    <a style="color:#ffb606; font-size: larger;" href="contact.html">Klik Disini</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="user-login text-right col-md-4">
                        <a
                            data-animation="animated slideInUp"
                            class="btn btn-theme effect btn-md"
                            href="#">Langguage</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Top -->

        <!-- Header PNF -->
        <header id="home">
            <!-- Start Navigation -->
            <nav class="navbar navbar-default navbar-sticky bootsnav">
                <!-- Start Top Search -->
                <div class="container">
                    <div class="row">
                        <div class="top-search">
                            <div class="input-group">
                                <form action="#">
                                    <input type="text" name="text" class="form-control" placeholder="Search">
                                    <button type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Top Search -->
                <div class="container">
                    <!-- Start Atribute Navigation -->
                    <div class="attr-nav">
                        <ul>
                            <li class="search">
                                <a href="#">
                                    <i class="fa fa-search"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Atribute Navigation -->
                    <!-- Start Header Navigation -->
                    <div class="navbar-header">
                        <button
                            type="button"
                            class="navbar-toggle"
                            data-toggle="collapse"
                            data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="<?= base_url('/'); ?>">
                            <img src="<?= base_url()?>template/logopnfbiru.png" class="logo" alt="Logo">
                        </a>
                    </div>
                    <!-- End Header Navigation -->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle active" data-toggle="dropdown">Beranda</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="index.html">S1 Pendidikan Non Formal</a>
                                    </li>
                                    <li>
                                        <a href="index-2-onepage.html">S2 Pendidikan Non Formal</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- end menu -->
                            <!-- query menu -->
                            <?php
                                $db = db_connect();
                                $query = $db->query('SELECT * FROM menu');
                                //you get result as an array in here but fetch your result however you feel to
                                $result = $query->getResultArray();
                            ?>
                            <!-- end query menu -->
                            <!-- query 2 -->
                            
                            <?php
                                $query = "SELECT `pemisah_menu`.`id`, `nama_pemisah` FROM `pemisah_menu` ORDER BY `no_urut` ASC";
                                $pemisah_menu = $this->db->query($query)->result_array();
                            ?>
                            <?php foreach($pemisah_menu as $pm) : ?>
                            <?php $single_menu = single_menu($pm['id']) ?>
                            <?php $main_menu = main_menu($pm['id']) ?>
                            <?php $sub_menu = sub_menu() ?>

                            <?php if($single_menu || $main_menu) { ?>
                                <li class="menu-header"><?= $pm['nama_pemisah'] ?></li>
                            <?php } ?>
                            <?php foreach ($single_menu as $sim) : ?>
                                    <li class="<?= ($this->uri->segment(1,0) == $sim['url'] ? 'active' : ''); ?>"><a class="nav-link" href="<?= base_url($sim['url']); ?>"><i class="<?= $sim['icon']; ?>"></i><span><?= $sim['nama_menu']; ?></span></a></li>
                            <?php endforeach ?>

                            <?php foreach($main_menu as $mm) : ?>
                                <li class="nav-item dropdown <?= ($mm['url'] == $this->uri->segment(1,0)? "active" : "") ?>">
                                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                                    <i class="<?= $mm['icon']; ?>"></i>
                                    <span><?= $mm['nama_menu']; ?>
                                </span></a>
                                <ul class="dropdown-menu">

                                <?php foreach($sub_menu as $sm) : ?>
                                    <?php if($sm['main_menu'] == $mm['kode_menu']){ ?>
                                    <li class="<?= ($sm['url'] == $this->uri->segment(1,0).$this->uri->slash_segment(2,'leading') ? "active" : "") ?>">
                                        <a class="nav-link" href="<?= base_url($sm['url']); ?>"><?= $sm['nama_menu']; ?>
                                        </a>
                                    </li>
                                    <?php } ?>
                                <?php endforeach  ?>
                                </ul>
                                </li>
                            <?php endforeach ?>
                            <?php endforeach; ?>
                            <!-- end query 2 -->
                            <li class="dropdown megamenu-fw">
                                <a class="dropdown-toggle" data-toggle="dropdown">Tentang kami</a>
                                <ul class="dropdown-menu megamenu-content" role="menu">
                                    <li>
                                        <div class="row">
                                            <div class="col-menu col-md-3">
                                                <h6 class="title">Profil</h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Sejarah</a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Pimpinan Program Studi</a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Visi Misi</a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Struktur Organisasi</a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Kurikulum</a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Fasilitas</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- end col-3 -->
                                            <div class="col-menu col-md-3">
                                                <h6 class="title">Akreditasi</h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Program Studi S1</a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Program Studi S2</a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Program Studi S3</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- end col-3 -->
                                            <div class="col-menu col-md-3">
                                                <h6 class="title">Alumni</h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Profil Alumni</a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Tracer Studi</a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Kuesioner Pengguna</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- end col-3 -->
                                            <div class="col-menu col-md-3">
                                                <h6 class="title">Luaran Tridarma</h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Buku Ajar</a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">HKI</a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Jurnal Scopus</a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Jurnal</a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Sitasi</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- end col-3 -->
                                        </div>
                                        <!-- end row -->
                                    </li>
                                </ul>
                            </li>
                            <!-- end menu -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle active" data-toggle="dropdown">Informasi</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="blog-right-sidebar.html">Berita</a>
                                    </li>
                                    <li>
                                        <a href="blog-right-sidebar.html">Pengumuman</a>
                                    </li>
                                    <li>
                                        <a href="blog-right-sidebar.html">Besiswa</a>
                                    </li>
                                    <li>
                                        <a href="gallery-4-colum.html">Gallery</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- end menu -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle active" data-toggle="dropdown">Akademik</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="page-table-sdm.html">SDM</a>
                                    </li>
                                    <li>
                                        <a href="page table.html">Penelitian</a>
                                    </li>
                                    <li>
                                        <a href="page table.html">Pengabdian</a>
                                    </li>
                                    <li>
                                        <a href="page table.html">Panduan, Peraturan dan Download File</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- end menu -->
                            <li class="dropdown megamenu-fw">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Other</a>
                                <ul class="dropdown-menu megamenu-content" role="menu">
                                    <li>
                                        <div class="row">
                                            <div class="col-menu col-md-3">
                                                <h6 class="title">Kerjasama</h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Internasional</a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Nasional</a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Cara Melaksanakan Kerjasama</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- end col-3 -->
                                            <div class="col-menu col-md-3">
                                                <h6 class="title">Mahasiswa</h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Mahasiswa Aktif</a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Prestasi Mahasiswa</a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Penerimaan Mahasiswa Baru</a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Organisasi Mahasiswa</a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Produk Mahasiswa</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- end col-3 -->
                                            <div class="col-menu col-md-3">
                                                <h6 class="title">Layanan</h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">E-Office</a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Portal Akademik</a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">E-Learning</a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Pendaftaran Wisuda</a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Input Beasiswa</a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Input Prestasi</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- end col-3 -->
                                            <div class="col-menu col-md-3">
                                                <h6 class="title">Pemangku Kepentingan</h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Laporan Kepuasasan 2019</a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Monev Awal Smester Awal 2023</a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Monev Awal Smester Akhir 2023</a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Monev SIAKAD</a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Survey Kepuasan Tata Kelola, Tata Pamong dan Kerjasama (Alumni/Lulusan)</a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-single-right-sidebar.html">Survey Kepuasan Tata Kelola, Tata Pamong dan Kerjasama Tenaga Kependidikan</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- end col-3 -->
                                        </div>
                                        <!-- end row -->
                                    </li>
                                </ul>
                            </li>
                        <!-- end menu -->
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>

            </nav>
            <!-- End Navigation -->
        </header>
    <!-- Akhir Header PNF -->
			<?= $this->renderSection('content'); ?>

    <!-- Start Footer ============================================= -->
    <footer class="bg-dark default-padding-top text-light">
        <div class="container">
            <div class="row">
                <div class="f-items">
                    <div class="col-md-4 item">
                        <div class="f-item">
                            <img src="assets/img/logopnfwhite.png" alt="Logo">
                            <p>
                                Pogram Studi Pendidikan Non Formal Pakultas Ilmu Pendidikan Adalah Excellence decisively nay man yet impression for contrasted remarkably. There
                                spoke happy for you are out. Fertile how old address did showing because sitting
                                replied six. Had arose guest visit going off child she new.
                            </p>
                            <p class="text-italic">
                                Please write your email and get our amazing updates, news and support
                            </p>
                            <div class="subscribe">
                                <form action="#">
                                    <div class="input-group stylish-input-group">
                                        <input
                                            type="email"
                                            placeholder="Enter your e-mail here"
                                            class="form-control"
                                            name="email">
                                        <button type="submit">
                                            <i class="fa fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 item">
                        <div class="f-item link">
                            <h4>Links</h4>
                            <ul>
                                <li>
                                    <a href="blog-right-sidebar.html">Berita</a>
                                </li>
                                <li>
                                    <a href="blog-right-sidebar.html">Pengumuman</a>
                                </li>
                                <li>
                                    <a href="#">Gallery</a>
                                </li>
                                <li>
                                    <a href="#">Faqs</a>
                                </li>
                                <li>
                                    <a href="#">Dosen</a>
                                </li>
                                <li>
                                    <a href="contact.html">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 item">
                        <div class="f-item link">
                            <h4>Support</h4>
                            <ul>
                                <li>
                                    <a href="#">Penelitian</a>
                                </li>
                                <li>
                                    <a href="#">SDM</a>
                                </li>
                                <li>
                                    <a href="#">Pengabdian</a>
                                </li>
                                <li>
                                    <a href="#">Release Status</a>
                                </li>
                                <li>
                                    <a href="#">LearnPress</a>
                                </li>
                                <li>
                                    <a href="#">Alumni</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 item">
                        <div class="f-item address">
                            <h4>Address</h4>
                            <ul>
                                <li>
                                    <i class="fas fa-envelope"></i>
                                    <p>Email
                                        <span>
                                            <a href="mailto:support@validtheme.com">pnf@fip.unp.ac.id</a></span></p>
                                </li>
                                <li>
                                    <i class="fas fa-map"></i>
                                    <p>Office
                                        <span>Jl. Prof. Dr. Hamka, Air Tawar, Padang</span></p>
                                </li>
                            </ul>
                            <div class="opening-info">
                                <h5>Opening Hours</h5>
                                <ul>
                                    <li>
                                        <span>
                                            Senin - Jum'at
                                        </span>
                                        <div class="pull-right">
                                            08.00 am - 16.00 pm
                                        </div>
                                    </li>
                                    <li>
                                        <span>
                                            Sabtu - Minggu </span>
                                        <div class="pull-right">
                                            Libur
                                        </div>
                                    </li>
                                    <li>
                                        <span>
                                            Istirahat
                                        </span>
                                        <div class="pull-right closed">
                                           12.00 am - 13.30 pm
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <p>&copy; Copyright 2019. All Rights Reserved by
                                <a href="#">Fakultas Ilmu Pendidikan UNP</a>
                            </p>
                        </div>
                        <div class="col-md-6 text-right link">
                            <ul>
                                <li>
                                    <a href="#">Terms of user</a>
                                </li>
                                <li>
                                    <a href="#">License</a>
                                </li>
                                <li>
                                    <a href="#">Support</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->
    <script src="<?= base_url()?>template_front_end/assets/js/jquery-1.12.4.min.js"></script>
    <script src="<?= base_url()?>template_front_end/assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url()?>template_front_end/assets/js/equal-height.min.js"></script>
    <script src="<?= base_url()?>template_front_end/assets/js/jquery.appear.js"></script>
    <script src="<?= base_url()?>template_front_end/assets/js/jquery.easing.min.js"></script>
    <script src="<?= base_url()?>template_front_end/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url()?>template_front_end/assets/js/modernizr.custom.13711.js"></script>
    <script src="<?= base_url()?>template_front_end/assets/js/owl.carousel.min.js"></script>
    <script src="<?= base_url()?>template_front_end/assets/js/wow.min.js"></script>
    <script src="<?= base_url()?>template_front_end/assets/js/isotope.pkgd.min.js"></script>
    <script src="<?= base_url()?>template_front_end/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?= base_url()?>template_front_end/assets/js/count-to.js"></script>
    <script src="<?= base_url()?>template_front_end/assets/js/loopcounter.js"></script>
    <script src="<?= base_url()?>template_front_end/assets/js/jquery.nice-select.min.js"></script>
    <script src="<?= base_url()?>template_front_end/assets/js/bootsnav.js"></script>
    <script src="<?= base_url()?>template_front_end/assets/js/main.js"></script>

</body>
</html>