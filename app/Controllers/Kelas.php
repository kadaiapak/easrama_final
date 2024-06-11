<?php

namespace App\Controllers;
use App\Models\KelasModel;
use App\Models\SiswaModel;
use App\Models\PelajaranKelasModel;


class Kelas extends BaseController
{
    protected $kelasModel;
    protected $siswaModel;
    public function __construct()
    {
        helper('form');
        $this->kelasModel = new KelasModel();
        $this->siswaModel = new SiswaModel();
        $this->pelajaranKelasModel = new PelajaranKelasModel();
    }

    public function index()
    {
        $semuaKelas = $this->kelasModel->getAllDetailByAdmin();
        $data = [
            'judul' => 'Kelas',
            'semuaKelas' => $semuaKelas
        ];
        return view('kelas/v_kelas', $data);
    }
    
    public function tambah()
    {
        $data = [
            'judul' => 'Tambah Kelas',
        ];
        return view('kelas/v_tambah_kelas', $data);
    }

    public function simpan()
    {
        if(!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[kelas.nama]',
                'errors' => [
                    'required' => 'Tuliskan nama kelas !',
                    'is_unique' => 'Nama kelas ada !'
                ]
            ],
            'kapasitas' => [
                'rules' => 'required',
                'errors' => [
                    'is_unique' => 'Judul sudah pernah ada !'
                ]
            ],
        ])){
            return redirect()->back()->withInput();
        }
    
        $slug = url_title($this->request->getVar('nama'), '-', true);
        $data = array(
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'keterangan' => $this->request->getVar('keterangan'),
            'kapasitas' => $this->request->getVar('kapasitas'),
            'status' => true,
        );

        $this->kelasModel->insert($data);
        return redirect()->to('/admin/kelas')->with('sukses','Data berhasil disimpan!');
    }

    public function edit($slug = null)
    {
        if($slug == '') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $detailKelas = $this->kelasModel->getDetailForEdit($slug);
        if (empty($detailKelas)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Kelas ' .$slug. ' tidak ditemukan');
        }
        $data = [
            'judul' => 'Edit Kelas',
            'detailKelas' => $detailKelas 
        ];
        return view('kelas/v_edit_kelas', $data);
    }

    public function update($id = ''){
        if($id == ''){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $namaKelasLama = $this->request->getVar('nama_lama');
        $namaKelasBaru = $this->request->getVar('nama');
        if($namaKelasLama == $namaKelasBaru){
            $rule_judul = 'required';
        }else{
            $rule_judul = 'required|is_unique[kelas.nama]';
        }
        if(!$this->validate([
            'nama' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => 'Inputkan nama kelas',
                    'is_unique' => 'Nama kelas sudah ada'
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isikan keterangan kelas',
                ]
            ],
            'kapasitas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tuliskan kapasitas kelas',
                ]
            ],
        ])){
            return redirect()->back()->withInput();
        }

        $slug = url_title($this->request->getVar('nama'), '-', true);
        $data = array(
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'keterangan' => $this->request->getVar('keterangan'),  
            'kapasitas' => $this->request->getVar('kapasitas'),  
            'status' => true,  
        );
        $this->kelasModel->where('id', $id)->set($data)->update();
        return redirect()->to('/admin/kelas')->with('sukses','Data berhasil diubah!');
    }

    public function tambah_penghuni()
    {
        $semuaSiswaBelumAdaKelas = $this->siswaModel->getAllSiswaBelumAdaKelas();
        $semuaKelas = $this->kelasModel->getAllKelasMasihKosong();

    }

    public function hapus($id_kelas)
    {
        $cekKelas = $this->pelajaranKelasModel->where('id_kelas', $id_kelas)->countAllResults();
        if($cekKelas == 0){
            $cekSiswa = $this->siswaModel->where('id_kelas', $id_kelas)->countAllResults();
            if($cekSiswa == 0){
                $this->kelasModel->delete($id_kelas);
                return redirect()->to('/admin/kelas')->with('sukses','Data berhasil dihapus!');
            }else {
                return redirect()->to('/admin/kelas')->with('gagal','Kelas tidak bisa di hapus karna ada siswa di dalam tabel nya!');
            }
        }else {
            return redirect()->to('/admin/kelas')->with('gagal','Pelajaran tidak bisa di hapus karna ada matapelajaran dalam tabelnya!');
        }
    }
}
