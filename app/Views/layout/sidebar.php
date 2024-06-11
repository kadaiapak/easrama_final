<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <?php if(session()->get('level') == '1') { ?>
            <!-- menu yang bisa di akses oleh super-admin -->
        <ul class="nav side-menu">
            <h3>General</h3>
            <br />
            <li><a href="<?= base_url('/dashboard'); ?>"><i class="fa fa-home"></i> Dashboard</a></li>
            <br />
            <h3>Pengaturan</h3>
            <br />
            <li>
                <a><i class="fa fa-gear"></i> User <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?= base_url('/user_level'); ?>">User Level</a></li>
                    <li><a href="<?= base_url('/user'); ?>">User</a></li>
                </ul>
            </li>
            <br />
            <h3>Pengaturan Siswa</h3>
            <br />
            <li><a href="<?= base_url('/admin/penghuni-kamar'); ?>"><i class="fa fa-building-o"></i> Kamar Siswa</a></li>
            <li><a href="<?= base_url('/admin/penghuni-kelas'); ?>"><i class="fa fa-graduation-cap"></i> Kelas Siswa</a></li>
            <li><a href="<?= base_url('/admin/pelajaran-kelas'); ?>"><i class="fa fa-book"></i> Pelajaran Kelas</a></li>
            <br />
            <h3>Halaman</h3>
            <br />
            <li><a><i class="fa fa-list"></i>  Halaman <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?= base_url('/admin/halaman'); ?>"> Halaman</a></li>
                        <li><a href="<?= base_url('/admin/menu'); ?>"> Kategori Halaman</a></li>
                    </ul>
                </li>
            <br />
            <h3>Post</h3>
            <br />
            <li>
                <a><i class="fa fa-book"></i>  Berita <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?= base_url('/admin/berita'); ?>"> Berita</a></li>
                    <li><a href="<?= base_url('/admin/kategori'); ?>">Kategori Berita</a></li>
                </ul>
            </li>
            <li><a href="<?= base_url('/admin/pengumuman'); ?>"><i class="fa fa-bullhorn"></i> Pengumuman</a></li> 
            <br />
            <h3>Log Aktifitas</h3>
            <br />
            <li><a href="<?= base_url('/admin/histori'); ?>"><i class="fa fa-bullhorn"></i> Histori Siswa</a></li> 
            <br />
        </ul>
        <!-- akhir dari super admin -->
        <?php } ?>
        <?php if(session()->get('level') == '2') { ?>
            <!-- menu untuk admin -->
            <ul class="nav side-menu">
                <h3>General</h3>
                <br />
                <li><a href="<?= base_url('/dashboard'); ?>"><i class="fa fa-home"></i> Dashboard</a></li>
                <br />
                <h3>Pendaftaran</h3>
                <br />
                <li><a href="<?= base_url('/admin/siswa'); ?>"><i class="fa fa-group"></i> Siswa Belum Verifikasi</a></li>
                <li><a href="<?= base_url('/admin/siswa/terdaftar'); ?>"><i class="fa fa-group"></i> Siswa Terdaftar</a></li>
                <br />
                <h3>Pengaturan Siswa</h3>
                <br />
                <li><a href="<?= base_url('/admin/penghuni-kamar'); ?>"><i class="fa fa-building-o"></i> Kamar Siswa</a></li>
                <li><a href="<?= base_url('/admin/penghuni-kelas'); ?>"><i class="fa fa-graduation-cap"></i> Kelas Siswa</a></li>
                <li><a href="<?= base_url('/admin/pelajaran-kelas'); ?>"><i class="fa fa-book"></i> Pelajaran Kelas</a></li>
                <br />
                <h3>Master Data</h3>
                <br />
                <li><a href="<?= base_url('/admin/master-siswa'); ?>"><i class="fa fa-graduation-cap"></i> Data Siswa</a></li>
                <li><a href="<?= base_url('/admin/kamar'); ?>"><i class="fa fa-building "></i> Data Kamar</a></li>
                <li><a href="<?= base_url('/admin/kelas'); ?>"><i class="fa fa-home"></i> Data Kelas</a></li>
                <li><a href="<?= base_url('/admin/pelajaran'); ?>"><i class="fa fa-book"></i> Data Pelajaran</a></li>
                <br />
                <h3>Halaman</h3>
                <br />
                <li><a><i class="fa fa-list"></i>  Halaman <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?= base_url('/admin/halaman'); ?>"> Halaman</a></li>
                        <li><a href="<?= base_url('/admin/menu'); ?>"> Kategori Halaman</a></li>
                    </ul>
                </li>
                <br />
                <h3>Post</h3>
                <br />
                <li><a href="<?= base_url('/penyimpanan-gambar'); ?>"><i class="fa fa-photo"></i> Penyimpanan Gambar</a></li>
                <li><a><i class="fa fa-book"></i>  Berita <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?= base_url('/admin/kategori'); ?>">Kategori Berita</a></li>
                        <li><a href="<?= base_url('/admin/berita'); ?>"> Berita</a></li>
                    </ul>
                </li>
                <li><a href="<?= base_url('/admin/pengumuman'); ?>"><i class="fa fa-bullhorn"></i> Pengumuman</a></li> 
                <li><a href="<?= base_url('/admin/prestasi'); ?>"><i class="fa fa-graduation-cap"></i> Prestasi</a></li> 
                <br />
                <h3>Pengaturan</h3>
                <br />
                <li><a href="<?= base_url('/admin/visi-misi'); ?>"><i class="fa fa-university"></i> Visi Misi</a></li> 
                <li><a href="<?= base_url('/admin/grafik-mahasiswa'); ?>"><i class="fa fa-bar-chart"></i> Grafik Siswa</a></li> 
                <li><a href="<?= base_url('/admin/video-profil'); ?>"><i class="fa fa-youtube-play"></i> Video Profil</a></li> 
                <br />
            </ul>
            <!-- akhir dari admin -->
        <?php } ?>
    </div>
</div>
<!-- /sidebar menu -->