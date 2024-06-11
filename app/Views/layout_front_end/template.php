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
	<link rel="icon" href="<?= base_url('logo_sekolah_alquran.ico'); ?>" type="image/ico" />

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
                                <li style="font-size: 10px;">
                                    <span>
                                        <i class="fas fa-map"></i>
                                        Alamat</span>Jl.Medan Raya No.3, Surau Gadang, Kec.Nanggalo
                                </li>
                                <li style="font-size: 10px;">
                                    <span>
                                        <i class="fas fa-envelope-open"></i>
                                        Email</span>sekolahalquran@gmail.com
                                </li>
                                <li style="font-size: 10px;">
                                    <span>
                                        <i class="fas fa-phone"></i>
                                        Kontak</span>
                                        085271087165
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="user-login text-right col-md-4">
                        <a
                            data-animation="animated slideInUp"
                            class="btn btn-theme effect btn-md"
                            href="<?= base_url('/daftar'); ?>">Daftar</a>
                        <a
                            data-animation="animated slideInUp"
                            class="btn btn-theme effect btn-md"
                            href="<?= base_url('/login'); ?>">Login</a>   
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
                            <img src="<?= base_url()?>logo_sekolah_alquran.png" class="logo" alt="Logo" style="width: 250px;" >
                        </a>
                    </div>
                    <!-- End Header Navigation -->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">
                            <!-- menu dinamis -->
                            <?php
                                $db = db_connect();
                                $query = $db->query('SELECT * FROM menu WHERE is_active = 1 ORDER BY no_urut ASC');
                                //you get result as an array in here but fetch your result however you feel to
                                $result = $query->getResultArray();
                            ?>
                            <?php foreach ($result as $menu) { ?>
                                <?php if($menu['level'] == 'main_menu'){ ?>
                                    <?php if($menu['jenis'] == 'mega_menu'){ ?>
                                        <li class="dropdown megamenu-fw">
                                            <a class="dropdown-toggle" data-toggle="dropdown"><?= $menu['nama_menu'] ?></a>
                                            <ul class="dropdown-menu megamenu-content" role="menu">
                                                <li>
                                                    <div class="row">
                                                        <?php  
                                                        $menu_id = $menu['kode_menu'];
                                                        $query = $db->query(
                                                            'SELECT * FROM menu WHERE is_active = 1
                                                            AND main_menu = '.$menu_id.'
                                                            ORDER BY no_urut ASC');
                                                        $sub_menu = $query->getResultArray();
                                                        ?>
                                                        <?php foreach ($sub_menu as $sm) { ?>
                                                        <div class="col-menu col-md-3">
                                                            <h6 class="title"><?= $sm['nama_menu']; ?></h6>
                                                            <div class="content">
                                                                <ul class="menu-col">
                                                                    <?php $sub_menu_id = $sm['kode_menu']; 
                                                                        $query = $db->query(
                                                                            'SELECT * FROM halaman 
                                                                            WHERE halaman_is_active = 1
                                                                            AND menu_id = '.$sub_menu_id.'');
                                                                        //you get result as an array in here but fetch your result however you feel to
                                                                        $halaman = $query->getResultArray();
                                                                    ?>
                                                                    <?php foreach ($halaman as $h) { ?>
                                                                        <li>
                                                                            <a href="<?= base_url('/halaman/'.$h['halaman_slug']); ?>"><?= $h['halaman_nama']; ?></a>
                                                                        </li>
                                                                    <?php } ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                    <!-- end row -->
                                                </li>
                                            </ul>
                                        </li>
                                    <?php } ?>
                                       
                                <?php } elseif ($menu['level'] == 'single_menu') { ?>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown"><?= $menu['nama_menu']; ?></a>
                                        <ul class="dropdown-menu">
                                            <?php $single_menu_id = $menu['kode_menu']; 
                                                $query = $db->query(
                                                    'SELECT * FROM halaman 
                                                    WHERE halaman_is_active = 1
                                                    AND menu_id = '.$single_menu_id.'');
                                                //you get result as an array in here but fetch your result however you feel to
                                                $single_menu_halaman = $query->getResultArray();
                                            ?>
                                            <?php foreach ($single_menu_halaman as $smh) { ?>
                                                <li>
                                                    <a href="<?= base_url('/halaman/'.$smh['halaman_slug']); ?>"><?= $smh['halaman_nama']; ?></a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                            <!-- end menu dinamis -->
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
                            <img src="<?= base_url('/logo_sekolah_alquran.png'); ?>" alt="Logo">
                            <p>
                            Di Asrama Bintang Sekolah Al-Qur’an Siteba Kota Padang kita bisa  mempelajari Al-Qur’an khususnya membaca Al-Qur’an untuk menghindari kesalahan dalam membaca ayat suci Al-Qur’an.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="maps-form">
                            <div class="col-md-12 col-lg-12 col-sm-12 maps">
                                <h3>Lokasi</h3>
                                <div class="google-maps">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.3291619066986!2d100.3713633!3d-0.8972021!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b998bda60471%3A0x19c19cad26339d32!2sBiNTANG%20SEKOLAH%20AL-QURAN%20(BiSA)!5e0!3m2!1sid!2sid!4v1717944237013!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
                                </div>
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
                                <a href="#">Sekolah Bintang Al-Quran</a>
                            </p>
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