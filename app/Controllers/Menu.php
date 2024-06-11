<?php

namespace App\Controllers;
use App\Models\MenuModel;


class Menu extends BaseController
{
    protected $menuModel;
    public function __construct()
    {
        helper('form');
        $this->menuModel = new MenuModel();
    }

    public function index()
    {
        $semuaMenu = $this->menuModel->getAll();
        $data = [
            'judul' => 'Menu Halaman',
            'semuaMenu' => $semuaMenu
        ];
        return view('menu/v_menu', $data);
    }
    
    public function tambah_menu()
    {
        $data = [
            'judul' => 'Tambah Menu',
        ];
        return view('menu/form_tambah_menu', $data);
    }

    public function simpan_menu()
    {
        if(!$this->validate([
            'nama_menu' => [
                'rules' => 'required|is_unique[menu.nama_menu]',
                'errors' => [
                    'required' => 'Tuliskan nama menu halaman !',
                    'is_unique' => 'Nama menu sudah ada !'
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih tipe menu !',
                ]
            ],
            'no_urut' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tuliskan no urut halaman !',
                ]
            ],
        ])){
            return redirect()->back()->withInput();
        }
    
        if($this->request->getVar('level') == 'main_menu')
        {
            $jenis = 'mega_menu' ;
        }else {
            $jenis = NULL ;
        }
        $slug = url_title($this->request->getVar('nama_menu'), '-', true);
        $data = array(
            'nama_menu' => $this->request->getVar('nama_menu'),
            'url' => $slug,
            'level' => $this->request->getVar('level'),
            'jenis' => $jenis,
            'is_active' => true,
            'no_urut' => $this->request->getVar('no_urut')
        );
        $this->menuModel->insert($data);
        return redirect()->to('/admin/menu')->with('sukses','Data berhasil disimpan!');
    }

    public function tambah_submenu()
    {
        $mainMenu = $this->menuModel->getAllMainMenu();
        $data = [
            'judul' => 'Tambah Sub Menu',
            'mainMenu' => $mainMenu
        ];
        return view('menu/form_tambah_submenu', $data);
    }

    public function simpan_submenu()
    {
        if(!$this->validate([
            'nama_menu' => [
                'rules' => 'required|is_unique[menu.nama_menu]',
                'errors' => [
                    'required' => 'Tuliskan nama menu halaman !',
                    'is_unique' => 'Nama menu sudah ada !'
                ]
            ],
            'main_menu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih main menu nya !',
                ]
            ],
            'no_urut' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tuliskan no urut halaman !',
                ]
            ],
        ])){
            return redirect()->back()->withInput();
        }
    
        $slug = url_title($this->request->getVar('nama_menu'), '-', true);
        $data = array(
            'nama_menu' => $this->request->getVar('nama_menu'),
            'url' => $slug,
            'level' => 'sub_menu',
            'main_menu' => $this->request->getVar('main_menu'),
            'is_active' => true,
            'no_urut' => $this->request->getVar('no_urut')
        );
        $this->menuModel->insert($data);
        return redirect()->to('/admin/menu')->with('sukses','Data berhasil disimpan!');
    }

    public function edit_menu($id = null)
    {
        if($id == '') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $detailMenu = $this->menuModel->getDetailMenuForEdit($id);
        if (empty($detailMenu)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Menu ' .$id. ' tidak ditemukan');
        }
        $data = [
            'judul' => 'Edit Prodi',
            'detailMenu' => $detailMenu 
        ];
        return view('menu/form_edit_menu', $data);
    }

    public function update_menu($id = ''){
        if($id == ''){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        if($this->request->getVar('nama_menu') == $this->request->getVar('nama_menu_lama')){
            $rule_judul = 'required';
        }else{
            $rule_judul = 'required|is_unique[menu.nama_menu]';
        }
        if(!$this->validate([
            'nama_menu' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => 'Inputkan Nama Menu',
                    'is_unique' => 'Nama menu harus unik'
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih tipe menu apakah single menu atau main menu',
                ]
            ],
            'is_active' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih apakah menu ditampilkan apa tidak',
                ]
            ],
            'no_urut' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tulis nomor urut menu agar tersusun rapi',
                ]
            ],
        ])){
            return redirect()->back()->withInput();
        }
        if($this->request->getVar('level') == 'main_menu')
        {
            $jenis = 'mega_menu' ;
        }else {
            $jenis = NULL ;
        }
        $slug = url_title($this->request->getVar('nama_menu'), '-', true);
        $data = array(
            'nama_menu' => $this->request->getVar('nama_menu'),
            'url' => $slug,
            'level' => $this->request->getVar('level'),
            'jenis' => $jenis,
            'is_active' => $this->request->getVar('is_active'),
            'no_urut' => $this->request->getVar('no_urut'),
        );
        $this->menuModel->where('kode_menu', $id)->set($data)->update();
        return redirect()->to('/admin/menu')->with('sukses','Data berhasil diubah!');
    }

    public function update_submenu($id = ''){
        if($id == ''){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        if($this->request->getVar('nama_menu') == $this->request->getVar('nama_menu_lama')){
            $rule_judul = 'required';
        }else{
            $rule_judul = 'required|is_unique[menu.nama_menu]';
        }
        if(!$this->validate([
            'nama_menu' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => 'Inputkan Nama Menu',
                    'is_unique' => 'Nama menu harus unik'
                ]
            ],
            'main_menu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih menu utamanya',
                ]
            ],
            'is_active' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih apakah menu ditampilkan apa tidak',
                ]
            ],
            'no_urut' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tulis nomor urut menu agar tersusun rapi',
                ]
            ],
        ])){
            return redirect()->back()->withInput();
        }
        $slug = url_title($this->request->getVar('nama_menu'), '-', true);
        $data = array(
            'nama_menu' => $this->request->getVar('nama_menu'),
            'url' => $slug,
            'level' => 'sub_menu',
            'main_menu' => $this->request->getVar('main_menu'),
            'is_active' => $this->request->getVar('is_active'),
            'no_urut' => $this->request->getVar('no_urut'),
        );
        $this->menuModel->where('kode_menu', $id)->set($data)->update();
        return redirect()->to('/admin/menu')->with('sukses','Data berhasil diubah!');
    }

    public function edit_submenu($id = null)
    {
        if($id == '') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $detailSubMenu = $this->menuModel->getDetailSubMenuForEdit($id);
        if (empty($detailSubMenu)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Menu ' .$id. ' tidak ditemukan');
        }
        $data = [
            'judul' => 'Edit Prodi',
            'semuaMenu' => $this->menuModel->getAllMainMenu(),
            'detailSubMenu' => $detailSubMenu 
        ];
        return view('menu/form_edit_submenu', $data);
    }

    public function hapus($id)
    {
        $cekApakahBisaDihapus = $this->menuModel->cekApakahBisaDihapus($id);
        if($cekApakahBisaDihapus['nama_menu'] != 0){
            return redirect()->to('/admin/menu')->with('gagal','Menu ini tidak bisa diubah, karena terdapat sub menu yang menggunakan menu ini!');
        }
        $this->menuModel->delete($id);
        return redirect()->to('/admin/menu')->with('sukses','Data berhasil dihapus!');
    }
}
