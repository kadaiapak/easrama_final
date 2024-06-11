<?php

namespace App\Controllers;
use App\Models\BeritaModel;
use App\Models\KunjunganModel;
use App\Models\VideoProfilModel;
use App\Models\PengaturanModel;
use App\Models\PrestasiModel;
class Home extends BaseController
{
    protected $beritaModel;
    protected $kunjunganModel;
    protected $videoProfilModel;
    protected $pengaturanModel;
    protected $prestasiModel;
    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
        $this->kunjunganModel = new KunjunganModel();
        $this->videoProfilModel = new VideoProfilModel();
        $this->pengaturanModel = new PengaturanModel();
        $this->prestasiModel = new PrestasiModel();
    }
    public function index()
    {
        $tanggal_diproses_admin = date('Y-m-d H:i:s');
        $data = [
            'kunjungan_nama' => $tanggal_diproses_admin
        ];
        $this->kunjunganModel->insert($data);
        $umumBerita = $this->beritaModel->getAllBeritaUmum($limit = 4);
        $pentingBerita = $this->beritaModel->getAllBeritaPenting();
        $pengumumanBerita = $this->beritaModel->getAllBeritaPengumuman($limit = 5);
        $videoProfil = $this->videoProfilModel->getLastActive();
        $visiMisi = $this->pengaturanModel->getVisiMisi();
        $headerPrestasi = $this->pengaturanModel->getHeaderPrestasi();
        $prestasi = $this->prestasiModel->getAll($limit = 4);
        $data = [
            'judul' => 'Home',
            'penting_berita' => $pentingBerita,
            'umum_berita' => $umumBerita,
            'pengumuman_berita' => $pengumumanBerita,
            'video_profil' => $videoProfil,
            'visi_misi' => $visiMisi,
            'prestasi' => $prestasi,
            'headerPrestasi' => $headerPrestasi
        ];
        return view('home/v_home', $data);
    }

    public function profilDitmawa()
    {
        $data = [
            'judul' => 'Profil Direktorat Kemahasiswaan',
        ];

        return view('home/v_profil_ditmawa', $data);
    }

    public function strukturOrganisasi()
    {
        $data = [
            'judul' => 'Struktur Organisasi',
        ];

        return view('home/v_struktur_organisasi', $data);
    }

    public function unitKegiatan()
    {
        $semuaUnit = $this->ukormawaModel->getAll();
        $data = [
            'judul' => 'Unit Kegiatan',
            'semuaUnit' => $semuaUnit,
        ];

        return view('home/v_unit_kegiatan', $data);
    }

    public function semuaPrestasi()
    {
        $data = [
            'judul' => 'Daftar Prestasi',
        ];

        return view('home/v_semua_prestasi', $data);
    }

    public function panduanBebasUkt()
    {
        $data = [
            'judul' => 'Panduan Bebas UKT',
        ];

        return view('home/v_panduan_bebas_ukt', $data);
    }

    public function panduanSib()
    {
        $data = [
            'judul' => 'Panduan Sistem Informasi Beasiswa',
        ];

        return view('home/v_panduan_sib', $data);
    }
  
}
