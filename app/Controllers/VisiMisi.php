<?php

namespace App\Controllers;
use App\Models\PengaturanModel;


class VisiMisi extends BaseController
{
    protected $pengaturanModel;
    public function __construct()
    {
        helper('form');
        $this->pengaturanModel = new PengaturanModel();
    }

    public function index()
    {
        $visiMisi = $this->pengaturanModel->getVisiMisi();
        $data = [
            'judul' => 'Visi Misi',
            'visi_misi' => $visiMisi
        ];
        return view('visi_misi/v_visi_misi', $data);
    }

    public function edit($id = null)
    {
        if($id == '') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $detailVisiMisi  = $this->pengaturanModel->getDetailForEdit($id);
        if (empty($detailVisiMisi )) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pengaturan ' .$id. ' tidak ditemukan');
        }
        $data = [
            'judul' => 'Edit Visi Misi',
            'detail_visi_misi' => $detailVisiMisi  
        ];
        return view('visi_misi/v_edit_visi_misi', $data);
    }

    public function update($id = ''){
        if($id == ''){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
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
        return redirect()->to('/admin/visi-misi')->with('sukses','Data berhasil diubah!');
    }
}
