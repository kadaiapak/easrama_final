<?php

namespace App\Controllers;
use App\Models\HalamanModel;
use App\Models\BeritaModel;

class UserHalaman extends BaseController
{
    protected $halamanModel;
    protected $beritaModel;
    public function __construct()
    {
        $this->halamanModel = new HalamanModel();
        $this->beritaModel = new BeritaModel();
    }

    public function detail_halaman($slug = null)
    {
        $detailHalaman = $this->halamanModel->getDetailForUser($slug);
        $semuaPengumuman = $this->beritaModel->getAllBeritaPengumuman($limit = 4);
        if (empty($detailHalaman)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul berita ' .$slug. ' tidak ditemukan');
        }
        $data = [
            'judul' => $detailHalaman['halaman_nama'],
            'detailHalaman' => $detailHalaman,
            'semuaPengumuman' => $semuaPengumuman
        ];
        return view('home/v_detail_halaman', $data);
    }
}
