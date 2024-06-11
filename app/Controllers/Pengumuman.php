<?php

namespace App\Controllers;
use App\Models\BeritaModel;
use App\Models\KategoriModel;

class Pengumuman extends BaseController
{
    protected $beritaModel;
    protected $kategoriModel;
    public function __construct()
    {
        helper('form');
        $this->beritaModel = new BeritaModel();
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        if(session()->get('level') == 1 ){
            $whereLevel = null;
        }else {
            $whereLevel = session()->get('user_id');
        }
        $semuaPengumuman = $this->beritaModel->getAllByAdmin($whereLevel, 2);
        $data = [
            'judul' => 'Pengumuman',
            'semuaPengumuman' => $semuaPengumuman
        ];
        return view('pengumuman/v_pengumuman', $data);
    }

    public function detail($id)
    {
        if($id == '') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $detailPengumuman = $this->beritaModel->getDetailByAdmin($id);
        if (empty($detailPengumuman)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul pengumuman dengan id' .$id. ' tidak ditemukan');
        }
        $data = [
            'judul' => 'Detail Pengumuman',    
            'detailPengumuman' => $detailPengumuman,
        ];
        return view('pengumuman/v_detail_pengumuman', $data);
    }
    
    public function tambah()
    {
        $data = [
            'judul' => 'Tambah Pengumuman',
        ];
        return view('pengumuman/v_tambah_pengumuman', $data);
    }

    public function simpan()
    {
        if(!$this->validate([
            'berita_sampul' => [
                'rules' => 'max_size[berita_sampul,1024]|is_image[berita_sampul]',
                'errors' => [
                    'max_size' => 'Gambar sampul tidak boleh lebih dari 1MB / 1024KB !',
                    'is_image' => 'Gambar sampul harus format Gambar'
                ]
            ],
            'berita_judul' => [
                'rules' => 'required|is_unique[berita.berita_judul]',
                'errors' => [
                    'required' => 'Tuliskan judul berita !',
                    'is_unique' => 'Judul sudah pernah ada !'
                ]
            ],
            'berita_isi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tulis isi berita'
                ]
            ],
            'berita_tampil' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih berita penting atau tidak'
                ]
            ]
        ])){
            return redirect()->back()->withInput();
        }
        $berita_sampul = $this->request->getFile('berita_sampul');
        if($berita_sampul->getError() == 4) {
            $nama_sampul = null;
        }else {
            $nama_sampul = $berita_sampul->getRandomName();
            echo "Nama file: ".$nama_sampul;
            $berita_sampul->move('./upload/berita_sampul', $nama_sampul);
        }
        $slug = url_title($this->request->getVar('berita_judul'), '-', true);
        $data = array(
            'berita_sampul' => $nama_sampul,
            'berita_judul' => $this->request->getVar('berita_judul'),
            'berita_slug' => $slug,
            'berita_isi' => $this->request->getVar('berita_isi'),
            'berita_kategori' => 2,
            'berita_penulis' => session()->get('user_id'),
            'berita_is_penting' => 0,
            'berita_tampil' => $this->request->getVar('berita_tampil'),
        );
        $this->beritaModel->insert($data);
        return redirect()->to('/admin/pengumuman')->with('sukses','Data berhasil disimpan!');
    }

    public function edit($slug = null)
    {
        if($slug == '') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $detailPengumuman = $this->beritaModel->getDetailForEditByAdmin($slug);
        if (empty($detailPengumuman)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul berita ' .$slug. ' tidak ditemukan');
        }
        if($detailPengumuman['berita_penulis'] == session()->get('user_id') OR session()->get('level') == 1)
        {
            $data = [
                'judul' => 'Edit Berita',    
                'detailPengumuman' => $detailPengumuman,
            ];
            return view('pengumuman/v_edit_pengumuman', $data);
        } else {
           return redirect()->back();
        }
    }

    public function update($id = ''){
        if($id == ''){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        if($this->request->getVar('berita_judul_lama') == $this->request->getVar('berita_judul')){
            $rule_judul = 'required';
        }else{
            $rule_judul = 'required|required|is_unique[berita.berita_judul]';
        }
        if(!$this->validate([
            'berita_judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => 'Inputkan judul berita',
                    'is_unique' => 'Judul berita harus unik'
                ]
            ],
            'berita_sampul' => [
                'rules' => 'max_size[berita_sampul,1024]|is_image[berita_sampul]',
                'errors' => [
                    'uploaded' => 'Silahkan upload sampul berita !',
                    'max_size' => 'Ukuran sampul berita tidak boleh lebih dari 1MB / 1024KB !',
                    'is_image' => 'Sampul Berita harus Gambar'
                ]
            ],
            'berita_isi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tulis isi berita'
                ]
            ],
            'berita_tampil' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih berita penting atau tidak'
                ]
            ]
        ])){
            return redirect()->back()->withInput();
        }

        $beritaSampulBaru = $this->request->getFile('berita_sampul');
        if($beritaSampulBaru->getError() == 4) {
            $berita_sampul = $this->request->getVar('berita_sampul_lama');
        }else {
            $berita_sampul = $beritaSampulBaru->getRandomName();
            $beritaSampulBaru->move('./upload/berita_sampul', $berita_sampul);
            // hapus file lama
            unlink('upload/berita_sampul/'.$this->request->getVar('berita_sampul_lama'));
        }

        $slug = url_title($this->request->getVar('berita_judul'), '-', true);
        $data = array(
            'berita_sampul' => $berita_sampul,
            'berita_judul' => $this->request->getVar('berita_judul'),
            'berita_slug' => $slug,
            'berita_isi' => $this->request->getVar('berita_isi'),
            'berita_penulis' => session()->get('user_id'),
            'berita_is_penting' => 0,
            'berita_tampil' => $this->request->getVar('berita_tampil'),
        );
        $this->beritaModel->where('berita_id', $id)->set($data)->update();
        return redirect()->to('/admin/pengumuman')->with('sukses','Data berhasil diubah!');
    }

    public function hapus($id)
    {
        $cekGambar = $this->beritaModel->cekGambar($id);
        if($cekGambar['berita_sampul'] != null){
            unlink('upload/berita_sampul/'.$cekGambar['berita_sampul']);
        }
        $this->beritaModel->delete($id);
        return redirect()->to('/admin/pengumuman')->with('sukses','Data berhasil dihapus!');
    }
}
