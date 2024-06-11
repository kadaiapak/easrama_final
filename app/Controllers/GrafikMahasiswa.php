<?php

namespace App\Controllers;
use App\Models\PengaturanModel;


class GrafikMahasiswa extends BaseController
{
    protected $pengaturanModel;
    public function __construct()
    {
        helper('form');
        $this->pengaturanModel = new PengaturanModel();
    }

    public function index()
    {
        $grafikMahasiswa = $this->pengaturanModel->getGrafikMahasiswa();
        $data = [
            'judul' => 'Grafik Mahasiswa',
            'grafikMahasiswa' => $grafikMahasiswa
        ];
        return view('grafik_mahasiswa/v_grafik_mahasiswa', $data);
    }

    public function edit($id = null)
    {
        if($id == '') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $detailGrafikMahasiswa  = $this->pengaturanModel->getDetailGrafikMahasiswa($id);
        if (empty($detailGrafikMahasiswa )) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pengaturan tidak ditemukan');
        }
        $data = [
            'judul' => 'Edit Grafik Mahasiswa',
            'detailGrafikMahasiswa' => $detailGrafikMahasiswa  
        ];
        return view('grafik_mahasiswa/v_edit_grafik_mahasiswa', $data);
    }

    public function update($id = ''){
        if($id == ''){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $detailGrafikMahasiswa  = $this->pengaturanModel->getDetailGrafikMahasiswa($id);
        if(!$this->validate([
            'pengaturan_nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isikan title',
                ]
            ],
            'pengaturan_isi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi ',
                ]
            ],
        ])){
            return redirect()->back()->withInput();
        }
        $data = array(
            'pengaturan_nama' => $this->request->getVar('pengaturan_nama'),
            'pengaturan_isi' => $this->request->getVar('pengaturan_isi'),
        );
        $this->pengaturanModel->where('pengaturan_id', $id)->set($data)->update();
        return redirect()->to('/admin/grafik-mahasiswa')->with('sukses','Data berhasil diubah!');
    }
}
