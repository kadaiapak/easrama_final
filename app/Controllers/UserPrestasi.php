<?php

namespace App\Controllers;
use App\Models\PrestasiModel;
use App\Models\BeritaModel;

class UserPrestasi extends BaseController
{
    protected $prestasiModel;
    protected $beritaModel;
    public function __construct()
    {
        helper('form');
        $this->prestasiModel = new PrestasiModel();
        $this->beritaModel = new BeritaModel();
    }

    public function semua_prestasi()
    {
        $semuaPrestasi = $this->prestasiModel->getPaginated(5, null, 1);
        $semuaPengumuman = $this->beritaModel->getAllBeritaPengumuman($limit = 4);
        $data = [
            'judul' => 'Berita Terbaru',
            'semuaPrestasi' => $semuaPrestasi['berita'],
            'pager' => $semuaPrestasi['pager'],
            'semuaPengumuman' => $semuaPengumuman
        ];

        return view('home/v_semua_prestasi', $data);
    }

    public function detail_prestasi($slug = null)
    {
        $detailPrestasi = $this->prestasiModel->getDetailForUser($slug);
        $semuaPengumuman = $this->beritaModel->getAllBeritaPengumuman($limit = 4);
        if (empty($detailPrestasi)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul berita ' .$slug. ' tidak ditemukan');
        }
        $data = [
            'judul' => 'Detail Prestasi',
            'detailPrestasi' => $detailPrestasi,
            'semuaPengumuman' => $semuaPengumuman
        ];

        return view('home/v_detail_prestasi', $data);
    }

    // public function semua_pengumuman()
    // {
    //     $semuaPengumuman = $this->prestasiModel->getPaginated(5, null, 2);
    //     $semuaPrestasi = $this->prestasiModel->getAllBeritaUmum($limit = 5);
    //     $data = [
    //         'judul' => 'Berita Terbaru',
    //         'semuaPengumuman' => $semuaPengumuman['berita'],
    //         'pager' => $semuaPengumuman['pager'],
    //         'semuaPrestasi' => $semuaPrestasi
    //     ];

    //     return view('home/v_semua_pengumuman', $data);
    // }



    // public function detail_pengumuman($slug = null)
    // {
    //     $detailPengumuman = $this->prestasiModel->getDetailForUser($slug);
    //     $semuaPrestasi = $this->prestasiModel->getAllBeritaUmum($limit = 4);
    //     if (empty($detailPengumuman)) {
    //         throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul berita ' .$slug. ' tidak ditemukan');
    //     }
    //     $data = [
    //         'judul' => 'Detail Berita',
    //         'detailPengumuman' => $detailPengumuman,
    //         'semuaPrestasi' => $semuaPrestasi
    //     ];

    //     return view('home/v_detail_pengumuman', $data);
    // }

    // public function berita_beasiswa()
    // {
    //     $semuaPrestasi = $this->prestasiModel->getPaginated(5, null, 1);
    //     $beritaPenting = $this->prestasiModel->getAllBeritaPenting(4);
    //     $data = [
    //         'judul' => 'Berita Beasiswa',
    //         'semuaPrestasi' => $semuaPrestasi['berita'],
    //         'pager' => $semuaPrestasi['pager'],
    //         'beritaPenting' => $beritaPenting
    //     ];
    //     return view('home/v_semua_berita', $data);
    // }

    // public function berita_prestasi()
    // {
    //     $prestasiBerita = $this->prestasiModel->getPaginated(5, null, 3);
    //     $beritaPenting = $this->prestasiModel->getAllBeritaPenting(4);

    //     $data = [
    //         'judul' => 'Berita Prestasi',
    //         'semuaPrestasi' => $prestasiBerita['berita'],
    //         'pager' => $prestasiBerita['pager'],
    //         'beritaPenting' => $beritaPenting

    //     ];
    //     return view('home/v_semua_berita', $data);
    // }

    // public function berita_organisasi()
    // {
    //     $organisasiBerita = $this->prestasiModel->getPaginated(5, null, 2);
    //     $beritaPenting = $this->prestasiModel->getAllBeritaPenting(4);
    //     $data = [
    //         'judul' => 'Berita Organisasi',
    //         'semuaPrestasi' => $organisasiBerita['berita'],
    //         'pager' => $organisasiBerita['pager'],
    //         'beritaPenting' => $beritaPenting

    //     ];
    //     return view('home/v_semua_berita', $data);
    // }



}
