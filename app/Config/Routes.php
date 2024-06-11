<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  route untuk home
$routes->get('/', 'Home::index');
$routes->get('/semua-prestasi', 'Home::semuaPrestasi');
$routes->get('/pendidikan-non-formal-s2', 'Home::s_dua');

$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'adminDanSuperAdminFilter']);

// ROUTE UNTUK DAFTAR 
$routes->get('/daftar', 'UserDaftar::index');
$routes->post('/daftar/simpan', 'UserDaftar::simpan');
$routes->get('/daftar/sukses', 'UserDaftar::sukses');
// AKHIR ROUTE UNTUK DAFTAR

// ROUTE UNTUK SISWA
// master siswa
$routes->get('admin/master-siswa', 'Siswa::master_siswa',['filter' => 'adminDanSuperAdminFilter']);
$routes->get('admin/master-siswa/detail/(:num)', 'Siswa::master_siswa_detail/$1',['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/master-siswa/excel', 'Siswa::master_siswa_excel',['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/master-siswa/tahun-status', 'Siswa::master_siswa_set_tahun_status',['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/master-siswa/pdf', 'Siswa::master_siswa_pdf',['filter' => 'adminDanSuperAdminFilter']);

// akhir dari master siswa
$routes->get('admin/siswa', 'Siswa::index',['filter' => 'adminDanSuperAdminFilter']);
$routes->get('admin/siswa/terdaftar', 'Siswa::siswa_terdaftar',['filter' => 'adminDanSuperAdminFilter']);
$routes->get('admin/siswa/tambah', 'Siswa::tambah',['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/siswa/simpan', 'Siswa::simpan',['filter' => 'adminDanSuperAdminFilter']);
$routes->get('admin/siswa/detail/(:num)', 'Siswa::detail/$1',['filter' => 'adminDanSuperAdminFilter']);
$routes->get('admin/siswa/edit/(:num)', 'Siswa::edit/$1',['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/siswa/update/(:num)', 'Siswa::update/$1',['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/siswa/verifikasi/(:num)', 'Siswa::verifikasi/$1',['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/siswa/tahun', 'Siswa::set_tahun',['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/siswa/excel', 'Siswa::excel',['filter' => 'adminDanSuperAdminFilter']);


// AKHIR DARI ROUTE UNTUK SISWA

// ROUTE UNTUK KAMAR
$routes->get('admin/kamar', 'Kamar::index',['filter' => 'adminDanSuperAdminFilter']);
$routes->get('admin/kamar/tambah', 'Kamar::tambah',['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/kamar/simpan', 'Kamar::simpan',['filter' => 'adminDanSuperAdminFilter']);
$routes->get('admin/kamar/edit/(:any)', 'Kamar::edit/$1' ,['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/kamar/update/(:any)', 'Kamar::update/$1' ,['filter' => 'adminDanSuperAdminFilter']);
$routes->delete('admin/kamar/hapus/(:num)', 'Kamar::hapus/$1' ,['filter' => 'adminDanSuperAdminFilter']);
// AKHIR ROUTE UNTUK KAMAR

// ROUTE UNTUK KELAS
$routes->get('admin/kelas', 'Kelas::index',['filter' => 'adminDanSuperAdminFilter']);
$routes->get('admin/kelas/tambah', 'Kelas::tambah',['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/kelas/simpan', 'Kelas::simpan',['filter' => 'adminDanSuperAdminFilter']);
$routes->get('admin/kelas/edit/(:any)', 'Kelas::edit/$1' ,['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/kelas/update/(:any)', 'Kelas::update/$1' ,['filter' => 'adminDanSuperAdminFilter']);
$routes->delete('admin/kelas/hapus/(:num)', 'Kelas::hapus/$1' ,['filter' => 'adminDanSuperAdminFilter']);
// AKHIR ROUTE UNTUK KELAS

// ROUTE UNTUK KELAS
$routes->get('admin/pelajaran', 'Pelajaran::index',['filter' => 'adminDanSuperAdminFilter']);
$routes->get('admin/pelajaran/tambah', 'Pelajaran::tambah',['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/pelajaran/simpan', 'Pelajaran::simpan',['filter' => 'adminDanSuperAdminFilter']);
$routes->get('admin/pelajaran/edit/(:any)', 'Pelajaran::edit/$1' ,['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/pelajaran/update/(:any)', 'Pelajaran::update/$1' ,['filter' => 'adminDanSuperAdminFilter']);
$routes->delete('admin/pelajaran/hapus/(:num)', 'Pelajaran::hapus/$1' ,['filter' => 'adminDanSuperAdminFilter']);
// AKHIR ROUTE UNTUK KELAS

// ROUTE UNTUK PENGHUNI KELAS
$routes->get('admin/penghuni-kelas', 'PenghuniKelas::index',['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/penghuni-kelas/simpan', 'PenghuniKelas::simpan',['filter' => 'adminDanSuperAdminFilter']);
$routes->get('admin/penghuni-kelas/edit/(:any)', 'PenghuniKelas::edit/$1' ,['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/penghuni-kelas/update/(:any)', 'PenghuniKelas::update/$1' ,['filter' => 'adminDanSuperAdminFilter']);
$routes->delete('admin/penghuni-kelas/hapus/(:num)', 'PenghuniKelas::hapus/$1' ,['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/penghuni-kelas/excel', 'PenghuniKelas::excel',['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/penghuni-kelas/pdf', 'PenghuniKelas::pdf',['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/penghuni-kelas/id-kelas', 'PenghuniKelas::set_id_kelas',['filter' => 'adminDanSuperAdminFilter']);
// AKHIR ROUTE UNTUK PENGHUNI KELAS

// ROUTE UNTUK PENGHUNI KAMAR
$routes->get('admin/penghuni-kamar', 'PenghuniKamar::index',['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/penghuni-kamar/simpan', 'PenghuniKamar::simpan',['filter' => 'adminDanSuperAdminFilter']);
$routes->get('admin/penghuni-kamar/edit/(:any)', 'PenghuniKamar::edit/$1' ,['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/penghuni-kamar/update/(:any)', 'PenghuniKamar::update/$1' ,['filter' => 'adminDanSuperAdminFilter']);
$routes->delete('admin/penghuni-kamar/hapus/(:num)', 'PenghuniKamar::hapus/$1' ,['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/penghuni-kamar/excel', 'PenghuniKamar::excel',['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/penghuni-kamar/pdf', 'PenghuniKamar::pdf',['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/penghuni-kamar/id-kamar', 'PenghuniKamar::set_id_kamar',['filter' => 'adminDanSuperAdminFilter']);
// AKHIR ROUTE UNTUK PENGHUNI KAMAR

// ROUTE UNTUK PELAJARAN KELAS
$routes->get('admin/pelajaran-kelas', 'PelajaranKelas::index',['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/pelajaran-kelas/simpan', 'PelajaranKelas::simpan',['filter' => 'adminDanSuperAdminFilter']);
$routes->get('admin/pelajaran-kelas/edit/(:any)', 'PelajaranKelas::edit/$1' ,['filter' => 'adminDanSuperAdminFilter']);
$routes->delete('admin/pelajaran-kelas/hapus/(:any)', 'PelajaranKelas::hapus/$1' ,['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/pelajaran-kelas/update/(:any)', 'PelajaranKelas::update/$1' ,['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/pelajaran-kelas/excel', 'PelajaranKelas::excel',['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/pelajaran-kelas/pdf', 'PelajaranKelas::pdf',['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/pelajaran-kelas/id-kelas', 'PelajaranKelas::set_id_kelas',['filter' => 'adminDanSuperAdminFilter']);
// AKHIR ROUTE UNTUK PELAJARAN KELAS

// ROUTE PRESTASI
    // ROUTE UNTUK PRESTASI USER
    $routes->get('/semua-prestasi', 'UserPrestasi::semua_prestasi');
    $routes->get('/prestasi/(:any)', 'UserPrestasi::detail_prestasi/$1');
    // $routes->get('/berita-beasiswa', 'UserBerita::berita_beasiswa');
    // $routes->get('/berita-organisasi', 'UserBerita::berita_organisasi');
    // $routes->get('/berita-prestasi', 'UserBerita::berita_prestasi');
    // AKHIR ROUTE UNTUK BERITA USER

    // ROUTE UNTUK PRESTASI ADMIN
    $routes->get('admin/prestasi', 'Prestasi::index',['filter' => 'adminDanSuperAdminFilter']);
    $routes->get('admin/prestasi/tambah', 'Prestasi::tambah',['filter' => 'adminDanSuperAdminFilter']);
    $routes->post('admin/prestasi/simpan', 'Prestasi::simpan',['filter' => 'adminDanSuperAdminFilter']);
    $routes->get('admin/prestasi/edit/(:any)', 'Prestasi::edit/$1' ,['filter' => 'adminDanSuperAdminFilter']);
    $routes->post('admin/prestasi/update/(:any)', 'Prestasi::update/$1' ,['filter' => 'adminDanSuperAdminFilter']);
    $routes->get('admin/prestasi/edit-header', 'Prestasi::edit_header' ,['filter' => 'adminDanSuperAdminFilter']);
    $routes->post('admin/prestasi/update-header-prestasi', 'Prestasi::update_header_prestasi' ,['filter' => 'adminDanSuperAdminFilter']);
    // $routes->get('admin/berita/detail/(:any)', 'Berita::detail');
    // $routes->get('admin/berita/hapus/(:any)', 'Berita::hapus/$1');
    // AHKIR ROUTE PRESTASI ADMIN
// AKHIR ROUTE PRESTASI

// ROUTE UNTUK PENGUMUMAN
     // ROUTE UNTUK PENGUMUMAN USER
     $routes->get('/semua-pengumuman', 'UserBerita::semua_pengumuman');
     $routes->get('/pengumuman/(:any)', 'UserBerita::detail_pengumuman/$1');
    //  $routes->get('/berita-beasiswa', 'UserBerita::berita_beasiswa');
    //  $routes->get('/berita-organisasi', 'UserBerita::berita_organisasi');
    //  $routes->get('/berita-prestasi', 'UserBerita::berita_prestasi');
     // AKHIR ROUTE UNTUK PENGUMUMAN USER
// ROUTE UNTUK PENGUMUMAN
// AKHIR ROUTE UNTUK PENGUMUMAN

// ROUTE UNTUK KATEGORI
    $routes->get('admin/kategori', 'Kategori::index',['filter' => 'adminDanSuperAdminFilter']);
    $routes->get('admin/kategori/tambah', 'Kategori::tambah',['filter' => 'adminDanSuperAdminFilter']);
    $routes->post('admin/kategori/simpan', 'Kategori::simpan',['filter' => 'adminDanSuperAdminFilter']);
    $routes->get('admin/kategori/edit/(:any)', 'Kategori::edit/$1' ,['filter' => 'adminDanSuperAdminFilter']);
    $routes->post('admin/kategori/update/(:any)', 'Kategori::update/$1' ,['filter' => 'adminDanSuperAdminFilter']);
// AKHIR ROUTE UNTUK KATEGORI

// ROUTE UNTUK VIDEO PROFIL
$routes->get('admin/video-profil', 'VideoProfil::index',['filter' => 'adminDanSuperAdminFilter']);
$routes->get('admin/video-profil/tambah', 'VideoProfil::tambah',['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/video-profil/simpan', 'VideoProfil::simpan',['filter' => 'adminDanSuperAdminFilter']);
$routes->get('admin/video-profil/edit/(:any)', 'VideoProfil::edit/$1' ,['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/video-profil/update/(:any)', 'VideoProfil::update/$1' ,['filter' => 'adminDanSuperAdminFilter']);
// AKHIR ROUTE UNTUK VIDEO PROFIL

// ROUTE UNTUK VISI MISI
$routes->get('admin/visi-misi', 'VisiMisi::index',['filter' => 'adminDanSuperAdminFilter']);
$routes->get('admin/visi-misi/tambah', 'VisiMisi::tambah',['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/visi-misi/simpan', 'VisiMisi::simpan',['filter' => 'adminDanSuperAdminFilter']);
$routes->get('admin/visi-misi/edit/(:any)', 'VisiMisi::edit/$1' ,['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/visi-misi/update/(:any)', 'VisiMisi::update/$1' ,['filter' => 'adminDanSuperAdminFilter']);
// AKHIR ROUTE UNTUK VISI MISI

// ROUTE UNTUK VISI MISI
$routes->get('admin/grafik-mahasiswa', 'GrafikMahasiswa::index',['filter' => 'adminDanSuperAdminFilter']);
$routes->get('admin/grafik-mahasiswa/edit/(:any)', 'GrafikMahasiswa::edit/$1' ,['filter' => 'adminDanSuperAdminFilter']);
$routes->post('admin/grafik-mahasiswa/update/(:any)', 'GrafikMahasiswa::update/$1' ,['filter' => 'adminDanSuperAdminFilter']);
// AKHIR ROUTE UNTUK VISI MISI

// ROUTE DOWNLOAD
    // ROUTE DOWNLOAD UNTUK ADMIN
    $routes->get('admin/download', 'Download::index',['filter' => 'adminFilter']);
    $routes->get('admin/download/tambah', 'Download::tambah',['filter' => 'adminFilter']);
    $routes->post('admin/download/simpan', 'Download::simpan',['filter' => 'adminFilter']);
    $routes->get('admin/download/edit/(:any)', 'Download::edit/$1' ,['filter' => 'adminDanSuperAdminFilter']);
    $routes->post('admin/download/update/(:any)', 'Download::update/$1' ,['filter' => 'adminDanSuperAdminFilter']);
    // AKHIR ROUTE DOWNLOAD UNTUK ADMIN

    // ROUTE DOWNLOAD UNTUK USER
    $routes->get('/semua-download', 'UserDownload::semua_download');
    $routes->get('/semua-download/(:any)', 'UserDownload::download/$1');
    // AKHIR ROUTE DOWNLOAD UNTUK USER
// AKHIR ROUTE DOWNLOAD

// ROUTE UNTUK AGENDA
    // ROUTE UNTUK AGENDA ADMIN
    $routes->get('admin/agenda', 'Agenda::admin_agenda',['filter' => 'adminFilter']);
    $routes->get('admin/agenda/tambah', 'Agenda::tambah',['filter' => 'adminFilter']);
    $routes->post('admin/agenda/simpan', 'Agenda::simpan',['filter' => 'adminFilter']);
    $routes->get('admin/agenda/edit/(:any)', 'Agenda::edit/$1',['filter' => 'adminDanSuperAdminFilter']);
    $routes->post('admin/agenda/update/(:any)', 'Agenda::update/$1' ,['filter' => 'adminDanSuperAdminFilter']);
    // AKHIR ROUTE UNTUK AGENDA ADMIN

    // ROUTE AGENDA USER
    $routes->get('/semua-agenda', 'UserAgenda::semua_agenda');
    // AKHIR ROUTE AGENDA USER
// AKHIR ROUTE AGENDA

// ROUTE UNTUK UKORMAWA
    // ROUTE UKORMAWA ADMIN
    $routes->get('admin/ukormawa', 'Ukormawa::admin_ukormawa',['filter' => 'adminFilter']);
    $routes->get('admin/ukormawa/tambah', 'Ukormawa::tambah',['filter' => 'adminFilter']);
    $routes->post('admin/ukormawa/simpan', 'Ukormawa::simpan',['filter' => 'adminFilter']);
    $routes->get('admin/ukormawa/edit/(:any)', 'Ukormawa::edit/$1',['filter' => 'adminDanSuperAdminFilter']);
    $routes->post('admin/ukormawa/update/(:any)', 'Ukormawa::update/$1' ,['filter' => 'adminDanSuperAdminFilter']);
    // AKHIR ROUTE UKORMAWA ADMIN
// AKHIR ROUTE UKORMAWA

// ROUTE UNTUK PENYIMPANAN GAMBAR ADMIN
$routes->get('penyimpanan-gambar', 'PenyimpananGambar::index',['filter' => 'adminFilter']);
$routes->get('penyimpanan-gambar/tambah', 'PenyimpananGambar::tambah',['filter' => 'adminFilter']);
$routes->post('penyimpanan-gambar/simpan', 'PenyimpananGambar::simpan',['filter' => 'adminFilter']);
// AKHIR ROUTE PENYIMPANAN GAMBAR ADMIN


// ROUTE LOGIN
$routes->get('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->post('/loginProcess', 'Auth::loginProcess');
// AKHIR ROUTE LOGIN

// route untuk User Level
    // bisa di akses oleh super admin 
    $routes->get('/user_level', 'UserLevel::index', ['filter' => 'superAdminFilter']);
    // bisa di akses oleh super admin 
    $routes->get('/user_level/tambah', 'UserLevel::tambah', ['filter' => 'superAdminFilter']);
    // bisa di akses oleh super admin 
    $routes->post('/user_level/simpan', 'UserLevel::simpan', ['filter' => 'superAdminFilter']);
    // bisa di akses oleh super admin 
    $routes->get('/user_level/(:any)/edit', 'UserLevel::edit/$1', ['filter' => 'superAdminFilter']);
    // bisa di akses oleh super admin 
    $routes->post('/user_level/(:any)/update', 'UserLevel::update/$1', ['filter' => 'superAdminFilter']);
// akhir dari route untuk User 

// route untuk User
    $routes->get('/user', 'User::index', ['filter' => 'superAdminFilter']);
    $routes->get('/user/detail/(:num)', 'User::detail/$1', ['filter' => 'superAdminFilter']);
    $routes->get('/user/tambah', 'User::tambah', ['filter' => 'superAdminFilter']);
    $routes->post('/user/simpan', 'User::simpan', ['filter' => 'superAdminFilter']);
    $routes->get('/user/edit/(:num)', 'User::edit/$1', ['filter' => 'superAdminFilter']);
    $routes->post('/user/update/(:num)', 'User::update/$1', ['filter' => 'superAdminFilter']);
    $routes->get('/user/edit-password/(:num)', 'User::edit_password/$1', ['filter' => 'superAdminFilter']);
    $routes->post('/user/update-password/(:num)', 'User::update_password/$1', ['filter' => 'superAdminFilter']);
// akhir dari route untuk User

// ROUTE PROFIL
    // diakses oleh mahasiswa untuk meilhat detail profil mereka
    $routes->get('/profil', 'Profil::index', ['filter' => 'mahasiswaFilter']);
    // diakses mahasiswa untuk melakukan verifikasi data pertama kali saat dia menggunakan aplikasi ini
    $routes->get('/profil/verifikasi', 'Profil::verifikasi', ['filter' => 'mahasiswaFilter']);
    // diakses mahasiswa untuk melakukan verifikasi data pertama kali saat dia menggunakan aplikasi ini
    $routes->post('/profil/update_verifikasi', 'Profil::update_verifikasi', ['filter' => 'mahasiswaFilter']);
// AKHIR ROUTE PROFIL

// ROUNTE UNTUK MENU
    // bisa di akses oleh super admin 
    $routes->get('/admin/menu', 'Menu::index', ['filter' => 'adminDanSuperAdminFilter']);

    // bisa di akses oleh super admin 
    $routes->get('/admin/menu/tambah-menu', 'Menu::tambah_menu', ['filter' => 'adminDanSuperAdminFilter']);
    // bisa di akses oleh super admin 
    $routes->get('/admin/menu/tambah-submenu', 'Menu::tambah_submenu', ['filter' => 'adminDanSuperAdminFilter']);
    // bisa di akses oleh super admin 
    $routes->post('/admin/menu/simpan-menu', 'Menu::simpan_menu', ['filter' => 'adminDanSuperAdminFilter']);
    // bisa di akses oleh super admin 
    $routes->post('/admin/menu/simpan-submenu', 'Menu::simpan_submenu', ['filter' => 'adminDanSuperAdminFilter']);

    // bisa di akses oleh super admin 
    $routes->get('/admin/menu/edit-menu/(:num)', 'Menu::edit_menu/$1', ['filter' => 'adminDanSuperAdminFilter']);
    // bisa di akses oleh super admin 
    $routes->get('/admin/menu/edit-submenu/(:num)', 'Menu::edit_submenu/$1', ['filter' => 'adminDanSuperAdminFilter']);
    // bisa di akses oleh super admin 
    $routes->post('/admin/menu/update-menu/(:num)', 'Menu::update_menu/$1', ['filter' => 'adminDanSuperAdminFilter']);
    // bisa di akses oleh super admin 
    $routes->post('/admin/menu/update-submenu/(:num)', 'Menu::update_submenu/$1', ['filter' => 'adminDanSuperAdminFilter']);

    // bisa di akses oleh super admin 
    $routes->delete('/admin/menu/hapus/(:num)', 'Menu::hapus/$1', ['filter' => 'adminDanSuperAdminFilter']);
// AKHIR dari ROUTE UNTUK MENU

// ROUTE BERITA
    $routes->get('admin/halaman', 'Halaman::index',['filter' => 'adminDanSuperAdminFilter']);
    $routes->get('admin/halaman/detail/(:any)', 'Halaman::detail/$1',['filter' => 'adminDanSuperAdminFilter']);
    $routes->get('admin/halaman/tambah', 'Halaman::tambah',['filter' => 'adminDanSuperAdminFilter']);
    $routes->post('admin/halaman/simpan', 'Halaman::simpan',['filter' => 'adminFilter']);
    $routes->get('admin/halaman/edit/(:any)', 'Halaman::edit/$1' ,['filter' => 'adminDanSuperAdminFilter']);
    $routes->post('admin/halaman/update/(:any)', 'Halaman::update/$1' ,['filter' => 'adminDanSuperAdminFilter']);
    $routes->delete('admin/halaman/hapus/(:any)', 'Halaman::hapus/$1');
// AKHIR ROUTE BERITA

// ROUTE UNTUK BERITA DI HOME
    $routes->get('halaman/(:any)', 'UserHalaman::detail_halaman/$1');
// AKHIR DARI ROUTE UNTUK BERITA DI HOME

// ROUTE BERITA
    $routes->get('admin/berita', 'Berita::index',['filter' => 'adminDanSuperAdminFilter']);
    $routes->get('admin/berita/detail/(:any)', 'Berita::detail/$1');
    $routes->get('admin/berita/tambah', 'Berita::tambah',['filter' => 'adminFilter']);
    $routes->post('admin/berita/simpan', 'Berita::simpan',['filter' => 'adminFilter']);
    $routes->get('admin/berita/edit/(:any)', 'Berita::edit/$1' ,['filter' => 'adminDanSuperAdminFilter']);
    $routes->post('admin/berita/update/(:any)', 'Berita::update/$1' ,['filter' => 'adminDanSuperAdminFilter']);
    $routes->delete('admin/berita/hapus/(:any)', 'Berita::hapus/$1');
// AKHIR ROUTE BERITA

 // ROUTE UNTUK BERITA USER
 $routes->get('/semua-berita', 'UserBerita::semua_berita');
 $routes->get('/berita/(:any)', 'UserBerita::detail_berita/$1');
 // $routes->get('/berita-beasiswa', 'UserBerita::berita_beasiswa');
 // $routes->get('/berita-organisasi', 'UserBerita::berita_organisasi');
 // $routes->get('/berita-prestasi', 'UserBerita::berita_prestasi');
 // AKHIR ROUTE UNTUK BERITA USER

 // ROUTE PENGUMUMAN
 $routes->get('admin/pengumuman', 'Pengumuman::index',['filter' => 'adminDanSuperAdminFilter']);
 $routes->get('admin/pengumuman/detail/(:any)', 'Pengumuman::detail/$1');
 $routes->get('admin/pengumuman/tambah', 'Pengumuman::tambah',['filter' => 'adminFilter']);
 $routes->post('admin/pengumuman/simpan', 'Pengumuman::simpan',['filter' => 'adminFilter']);
 $routes->get('admin/pengumuman/edit/(:any)', 'Pengumuman::edit/$1' ,['filter' => 'adminDanSuperAdminFilter']);
 $routes->post('admin/pengumuman/update/(:any)', 'Pengumuman::update/$1' ,['filter' => 'adminDanSuperAdminFilter']);
 $routes->delete('admin/pengumuman/hapus/(:any)', 'Pengumuman::hapus/$1');
// AKHIR ROUTE PENGUMUMAN

 // ROUTE PENGUMUMAN
 $routes->get('admin/histori', 'Histori::index',['filter' => 'adminDanSuperAdminFilter']);  
 $routes->post('admin/histori-kelas/excel', 'Histori::kelas_excel',['filter' => 'adminDanSuperAdminFilter']);  
 $routes->post('admin/histori-kelas/pdf', 'Histori::kelas_pdf',['filter' => 'adminDanSuperAdminFilter']);  
 $routes->post('admin/histori-kelas/id-kelas', 'Histori::set_id_kelas',['filter' => 'adminDanSuperAdminFilter']);  
 $routes->post('admin/histori-kamar/excel', 'Histori::kamar_excel',['filter' => 'adminDanSuperAdminFilter']);  
 $routes->post('admin/histori-kamar/pdf', 'Histori::kamar_pdf',['filter' => 'adminDanSuperAdminFilter']);  
 $routes->post('admin/histori-kamar/id-kamar', 'Histori::set_id_kamar',['filter' => 'adminDanSuperAdminFilter']);  
// AKHIR ROUTE PENGUMUMAN
    


