<?php

namespace App\Controllers;
use App\Models\KategoriModel;


class Kategori extends BaseController
{
    protected $kategoriModel;
    public function __construct()
    {
        helper('form');
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $semuaKategori = $this->kategoriModel->find();
        $data = [
            'judul' => 'Kategori',
            'semua_kategori' => $semuaKategori
        ];
        return view('kategori/v_kategori', $data);
    }
    
    public function tambah()
    {
        $data = [
            'judul' => 'Tambah Kategori',
        ];
        return view('kategori/v_tambah_kategori', $data);
    }

    public function simpan()
    {
        if(!$this->validate([
            'kategori_nama' => [
                'rules' => 'required|is_unique[kategori.kategori_nama]',
                'errors' => [
                    'required' => 'Tuliskan judul kategori !',
                    'is_unique' => 'Judul sudah pernah ada !'
                ]
            ],
        ])){
            return redirect()->back()->withInput();
        }
    
        $slug = url_title($this->request->getVar('kategori_nama'), '-', true);
        $data = array(
            'kategori_nama' => $this->request->getVar('kategori_nama'),
            'kategori_slug' => $slug,
            'kategori_is_active' => true,
        );
        $this->kategoriModel->insert($data);
        return redirect()->to('/admin/kategori')->with('sukses','Data berhasil disimpan!');
    }

    public function edit($id = null)
    {
        if($id == '') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $detailKategori = $this->kategoriModel->getDetailForEdit($id);
        if (empty($detailKategori)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul kategori ' .$id. ' tidak ditemukan');
        }
        $data = [
            'judul' => 'Edit Prodi',
            'detail_kategori' => $detailKategori 
        ];
        return view('kategori/v_edit_kategori', $data);
    }

    public function update($id = ''){
        if($id == ''){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $kategoriLama = $this->kategoriModel->getDetailForEdit($id);
        if($kategoriLama['kategori_nama'] == $this->request->getVar('kategori_nama')){
            $rule_judul = 'required';
        }else{
            $rule_judul = 'required|is_unique[kategori.kategori_nama]';
        }
        if(!$this->validate([
            'kategori_nama' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => 'Inputkan judul kategori',
                    'is_unique' => 'Judul kategori harus unik'
                ]
            ],
            'kategori_is_active' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih apakah kategori termasuk aktiv apa tidak',
                ]
            ],
        ])){
            return redirect()->back()->withInput();
        }

        $slug = url_title($this->request->getVar('kategori_nama'), '-', true);
        $data = array(
            'kategori_nama' => $this->request->getVar('kategori_nama'),
            'kategori_slug' => $slug,
            'kategori_is_active' => $this->request->getVar('kategori_is_active'),  
        );
        $this->kategoriModel->where('kategori_id', $id)->set($data)->update();
        return redirect()->to('/admin/kategori')->with('sukses','Data berhasil diubah!');
    }

    public function hapus()
    {
        $this->kategoriModel->delete();
        return redirect()->to('/admin/kategori')->with('sukses','Data berhasil dihapus!');
    }
}
