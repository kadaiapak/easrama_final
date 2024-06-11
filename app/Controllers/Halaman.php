<?php

namespace App\Controllers;
use App\Models\HalamanModel;
use App\Models\MenuModel;

class Halaman extends BaseController
{
    protected $halamanModel;
    protected $menuModel;
    public function __construct()
    {
        helper('form');
        $this->halamanModel = new HalamanModel();
        $this->menuModel = new MenuModel();
    }

    public function index()
    {
        $semuaHalaman = $this->halamanModel->getAllByAdmin();
        $data = [
            'judul' => 'Halaman',
            'semuaHalaman' => $semuaHalaman
        ];
        return view('halaman/v_halaman', $data);
    }

    public function detail($id)
    {
        if($id == '') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $detailHalaman = $this->halamanModel->getDetailByAdmin($id);
        if (empty($detailHalaman)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul halaman dengan id ' .$id. ' tidak ditemukan');
        }
        $data = [
            'judul' => 'Detail Halaman',
            'detailHalaman' => $detailHalaman ,
        ];
        return view('halaman/v_detail_halaman', $data);
    }
    
    public function tambah()
    {
        $semuaMenu = $this->menuModel->getAllMenuUntukTambahHalaman();
        $data = [
            'judul' => 'Tambah Halaman',
            'semuaMenu' => $semuaMenu
        ];
        return view('halaman/v_tambah_halaman', $data);
    }

    public function simpan()
    {
        if(!$this->validate([
            'berita_sampul' => [
                'rules' => 'max_size[berita_sampul,1024]|is_image[berita_sampul]',
                'errors' => [
                    'max_size' => 'Ukuran sampul berita tidak boleh lebih dari 1MB / 1024KB !',
                    'is_image' => 'Sampul Berita harus Gambar'
                ]
            ],
            'menu_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih menu'
                ]
            ],
            'halaman_nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isikan nama halaman'
                ]
            ],
            'halaman_isi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tulis isi halaman'
                ]
            ],
            'halaman_is_active' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih halaman ditampilkan atau tidak'
                ]
            ],
        ])){
            return redirect()->back()->withInput();
        }

        if($this->request->getFile('berita_sampul')->getError() == 4)
        {
            $nama_sampul = null;
        }else {
            $berita_sampul = $this->request->getFile('berita_sampul');
            $nama_sampul = $berita_sampul->getRandomName();
            echo "Nama file: ".$nama_sampul;
            $berita_sampul->move('./upload/halaman_sampul', $nama_sampul);
        };
        $slug = url_title($this->request->getVar('halaman_nama'), '-', true);
        $data = array(
            'menu_id' => $this->request->getVar('menu_id'),
            'penulis' => session()->get('user_id'),
            'halaman_nama' => $this->request->getVar('halaman_nama'),
            'halaman_slug' => $slug,
            'halaman_cover' => $nama_sampul,
            'halaman_isi' => $this->request->getVar('halaman_isi'),
            'halaman_judul_isi' => $this->request->getVar('halaman_judul_isi'),
            'halaman_is_active' => $this->request->getVar('halaman_is_active'),
        );
        $this->halamanModel->insert($data);
        return redirect()->to('/admin/halaman')->with('sukses','Data berhasil disimpan!');
    }

    public function edit($slug = null)
    {
        if($slug == '') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $detailHalaman = $this->halamanModel->getDetailforEdit($slug);
        if (empty($detailHalaman)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul berita ' .$slug. ' tidak ditemukan');
        }
        $semuaMenu = $this->menuModel->getAllMenuUntukTambahHalaman();
        $data = [
            'judul' => 'Edit Halaman',
            'detailHalaman' => $detailHalaman ,
            'semuaMenu' => $semuaMenu
        ];
        return view('halaman/v_edit_halaman', $data);
    }

    public function update($id = ''){
        if($id == ''){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $slug = $this->request->getVar('halaman_slug_lama');
        if($this->request->getVar('halaman_nama_lama') == $this->request->getVar('halaman_nama')){
            $rule_judul = 'required';
        }else{
            $rule_judul = 'required|required|is_unique[halaman.halaman_nama]';
        }
        if(!$this->validate([
            'halaman_nama' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => 'Inputkan nama halaman',
                    'is_unique' => 'Nama halaman harus unik'
                ]
            ],
            'berita_sampul' => [
                'rules' => 'max_size[berita_sampul,1024]|is_image[berita_sampul]',
                'errors' => [
                    'max_size' => 'Ukuran sampul halaman tidak boleh lebih dari 1MB / 1024KB !',
                    'is_image' => 'Sampul Berita harus Gambar'
                ]
            ],
            // 
            'menu_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih menu'
                ]
            ],
            'halaman_isi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tulis isi halaman'
                ]
            ],
            'halaman_is_active' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih halaman ditampilkan atau tidak'
                ]
            ],
        ])){
            return redirect()->back()->withInput();
        }

        $beritaSampulBaru = $this->request->getFile('berita_sampul');
        if($beritaSampulBaru->getError() == 4) {
            $berita_sampul = $this->request->getVar('berita_sampul_lama');
        }else {
            $berita_sampul = $beritaSampulBaru->getRandomName();
            $beritaSampulBaru->move('./upload/halaman_sampul', $berita_sampul);
            // hapus file lama
            if($this->request->getVar('berita_sampul_lama') != null){
                unlink('upload/halaman_sampul/'.$this->request->getVar('berita_sampul_lama'));
            }
        }

        $slug = url_title($this->request->getVar('halaman_nama'), '-', true);
        $data = array(
            'menu_id' => $this->request->getVar('menu_id'),
            'penulis' => session()->get('user_id'),
            'halaman_nama' => $this->request->getVar('halaman_nama'),
            'halaman_slug' => $slug,
            'halaman_cover' => $berita_sampul,
            'halaman_isi' => $this->request->getVar('halaman_isi'),
            'halaman_judul_isi' => $this->request->getVar('halaman_judul_isi'),
            'halaman_is_active' => $this->request->getVar('halaman_is_active'),
        );
        $this->halamanModel->where('halaman_id', $id)->set($data)->update();
        return redirect()->to('/admin/halaman')->with('sukses','Data berhasil diubah!');
    }

    public function hapus($id)
    {
        $cekGambar = $this->halamanModel->cekGambar($id);
        if($cekGambar['halaman_cover'] != null){
            unlink('upload/halaman_sampul/'.$cekGambar['halaman_cover']);
        }
        $this->halamanModel->delete($id);
        return redirect()->to('/admin/halaman')->with('sukses','Data berhasil dihapus!');
    }
}
