<?= $this->extend('layout_front_end/template'); ?>
<?= $this->section('content'); ?>
    <!-- Start Banner 
    ============================================= -->
    <div class="banner-area content-top-heading less-paragraph text-normal">
        <div id="bootcarousel" class="carousel slide animate_text carousel-fade" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner text-light carousel-zoom">
                <div class="item active">
                    <div class="slider-thumb bg-fixed" style="background-image: url(<?= base_url('template_front_end/assets/img/foto_rektorat.jpg')?>);"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="content">
                                            <h3 data-animation="animated slideInLeft">DIREKTORAT KEMAHASISWAAN DAN ALUMNI</h3>
                                            <h1 data-animation="animated slideInUp">UNIVERSITAS NEGERI PADANG</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="item">
                    <div class="slider-thumb bg-fixed" style="background-image: url(<?= base_url('template_front_end/assets/img/foto_rektorat.jpg')?>);"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="content">
                                            <h3 data-animation="animated slideInLeft">DIREKTORAT KEMAHASISWAAN</h3>
                                            <h1 data-animation="animated slideInUp">UNIVERSITAS NEGERI PADANG</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="slider-thumb bg-fixed" style="background-image: url(<?= base_url('template_front_end/assets/img/foto_rektorat.jpg')?>);"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="content">
                                            <h3 data-animation="animated slideInLeft">DIREKTORAT KEMAHASISWAAN</h3>
                                            <h1 data-animation="animated slideInUp">UNIVERSITAS NEGERI PADANG</h1>
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
    <marquee bgcolor="#002147" style="color: white;"><strong>MOHON UNTUK TIDAK MEMBERIKAN IMBALAN DALAM BENTUK APAPUN ATAS PELAYANAN YANG KAMI BERIKAN (BAIK SEBELUM ATAU SESUDAH LAYANAN DIBERIKAN)</strong></marquee>

    <!-- Berita Beasiswa -->
    <!-- Start Berita -->
    <div class="blog-area full-blog left-sidebar full-blog default-padding">
        <div class="container">
            <div class="row">
                <div class="site-heading text-left">
                        <h2>Beasiswa</h2>
                </div>
                <div class="blog-items">
                    <?php foreach ($beasiswa_berita as $bb) { ?>
                    <div class="blog-content col-lg-3 col-md-3 col-sm-12">
                        <!-- Single Item -->
                        <div class="single-item">
                            <div class="item">
                                <div class="thumb">
                                    <a href="<?= base_url('/berita/'.$bb['berita_slug']); ?>"  >
                                        <div class="img_container" style="width: 100%; height:180px;">
                                            <img style="width: 100%; height: 100%; object-fit: cover;" src="<?= base_url()?>upload/berita_sampul/<?= $bb['berita_sampul']; ?>" alt="Thumb">
                                        </div>
                                    </a>
                                    <div class="date">
                                        <?php $tanggal = tanggal_indo($bb['created_at']);
                                        $array_tanggal_beasiswa = explode(" ", $tanggal);
                                        ?>
                                        <h4><span><?= $array_tanggal_beasiswa[0]; ?></span> <?= $array_tanggal_beasiswa[1]; ?>, <?= $array_tanggal_beasiswa[2]; ?></h4>
                                    </div>
                                </div>
                                <div class="info">
                                    <h3>
                                        <a href="<?= base_url('/berita/'.$bb['berita_slug']); ?>"><?= $bb['berita_judul']; ?></a>
                                    </h3>
                                    <a href="<?= base_url('/berita/'.$bb['berita_slug']); ?>">Read More <i class="fas fa-angle-double-right"></i></a>
                                    <div class="meta">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="fas fa-user"></i> <?= $bb['nama_user']; ?></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fas fa-eye"></i> <?= $bb['berita_tayang']; ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Item -->
                    </div>
                    <?php } ?>
                        <div class="more-btn col-md-12 text-center">
                        <a href="<?= base_url('/berita-beasiswa'); ?>" class="btn btn-dark border btn-md">LIHAT SEMUA BERITA</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Berita -->
    <!-- End Berita Beasiswa -->

    <!-- Berita Prestasi -->
    <!-- Start Berita -->
    <div class="blog-area full-blog left-sidebar full-blog default-padding" style="background-image: url(<?= base_url('image_manager/pattern.jpg')?>);">
        <div class="container">
            <div class="row">
                <div class="site-heading text-left">
                        <h2>Lomba / Prestasi</h2>
                </div>
                <div class="blog-items">
                    <?php foreach ($prestasi_berita as $pb) { ?>
                    <div class="blog-content col-lg-3 col-md-3 col-sm-12">
                        <!-- Single Item -->
                        <div class="single-item">
                            <div class="item">
                                <div class="thumb">
                                    <div class="img_container" style="width: 100%; height:180px;">
                                        <img style="width: 100%; height: 100%; object-fit: cover;" src="<?= base_url()?>upload/berita_sampul/<?= $pb['berita_sampul']; ?>" alt="Thumb">
                                    </div>
                                    <div class="date">
                                        <?php $tanggal = tanggal_indo($pb['created_at']);
                                        $array_tanggal_prestasi = explode(" ", $tanggal);
                                        ?>
                                        <h4><span><?= $array_tanggal_prestasi[0]; ?></span> <?= $array_tanggal_prestasi[1]; ?>, <?= $array_tanggal_prestasi[2]; ?></h4>
                                    </div>
                                </div>
                                <div class="info">
                                    <h3>
                                        <a href="<?= base_url('/berita/'.$pb['berita_slug']); ?>"><?= $pb['berita_judul']; ?></a>
                                    </h3>
                                    <a href="<?= base_url('/berita/'.$pb['berita_slug']); ?>">Read More <i class="fas fa-angle-double-right"></i></a>
                                    <div class="meta">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="fas fa-user"></i> </i> <?= $pb['nama_user']; ?></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fas fa-eye"></i> <?= $pb['berita_tayang']; ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Item -->
                    </div>
                    <?php } ?>
                        <div class="more-btn col-md-12 text-center">
                        <a href="<?= base_url('/berita-prestasi'); ?>" class="btn btn-dark border btn-md">LIHAT SEMUA BERITA</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Berita -->
    <!-- End Berita Prestasi -->

    <!-- Berita Organisasi -->
    <!-- Start Berita -->
    <div class="blog-area full-blog left-sidebar full-blog default-padding">
        <div class="container">
            <div class="row">
                <div class="site-heading text-left">
                        <h2>Organisasi Kemahasiswaan</h2>
                </div>
                <div class="blog-items">
                    <?php foreach ($organisasi_berita as $ob) { ?>
                    <div class="blog-content col-lg-3 col-md-3 col-sm-12">
                        <!-- Single Item -->
                        <div class="single-item">
                            <div class="item">
                                <div class="thumb">
                                    <div class="img_container" style="width: 100%; height:180px;">
                                        <img style="width: 100%; height: 100%; object-fit: cover;" src="<?= base_url()?>upload/berita_sampul/<?= $ob['berita_sampul']; ?>" alt="Thumb">
                                    </div>
                                    <div class="date">
                                        <?php $tanggal = tanggal_indo($ob['created_at']);
                                        $array_tanggal_prestasi = explode(" ", $tanggal);
                                        ?>
                                        <h4><span><?= $array_tanggal_prestasi[0]; ?></span> <?= $array_tanggal_prestasi[1]; ?>, <?= $array_tanggal_prestasi[2]; ?></h4>
                                    </div>
                                </div>
                                <div class="info">
                                    <h3>
                                        <a href="<?= base_url('/berita/'.$ob['berita_slug']); ?>"><?= $ob['berita_judul']; ?></a>
                                    </h3>
                                    <a href="<?= base_url('/berita/'.$ob['berita_slug']); ?>">Read More <i class="fas fa-angle-double-right"></i></a>
                                    <div class="meta">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="fas fa-user"></i> <?= $ob['nama_user']; ?></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fas fa-eye"></i> <?= $ob['berita_tayang']; ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Item -->
                    </div>
                    <?php } ?>
                    <div class="more-btn col-md-12 text-center">
                        <a href="<?= base_url('/berita-organisasi'); ?>" class="btn btn-dark border btn-md">LIHAT SEMUA BERITA</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Berita -->
    <!-- End Berita Prestasi -->
    
    

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
