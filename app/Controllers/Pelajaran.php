<?php

namespace App\Controllers;
use App\Models\PelajaranModel;
use App\Models\SiswaModel;
use App\Models\PelajaranKelasModel;


class Pelajaran extends BaseController
{
    protected $pelajaranModel;
    protected $siswaModel;
    protected $pelajaranKelasModel;
    public function __construct()
    {
        helper('form');
        $this->pelajaranModel = new PelajaranModel();
        $this->siswaModel = new SiswaModel();
        $this->pelajaranKelasModel = new PelajaranKelasModel();
    }

    public function index()
    {
        $semuaPelajaran = $this->pelajaranModel->getAllByAdmin();
        $data = [
            'judul' => 'Pelajaran',
            'semuaPelajaran' => $semuaPelajaran
        ];
        return view('pelajaran/v_pelajaran', $data);
    }

    public function siswa_index()
    {
        $username = session()->get('username');
        $semuaPelajaran = $this->siswaModel->getDaftarPelajaranBySantri($username); 
        foreach ($semuaPelajaran as $sp) {
            $detailJadwalPelajaran[$sp['nama_hari']][] = $sp;
        }
        $data = [
            'judul' => 'Pelajaran',
            'detailJadwalPelajaran' => $detailJadwalPelajaran
        ];
        return view('pelajaran/v_siswa_pelajaran', $data);
    }

    public function guru_index()
    {
        $user_id = session()->get('user_id');
        $jadwalMengajar = $this->pelajaranKelasModel->getJadwalMengajarByGuru($user_id); 
        foreach ($jadwalMengajar as $jm) {
            $detailJadwalMengajar[$jm['nama_hari']][] = $jm;
        }
        $data = [
            'judul' => 'Pelajaran',
            'detailJadwalMengajar' => $detailJadwalMengajar
        ];
        return view('pelajaran/v_guru_pelajaran', $data);
    }
    
    public function tambah()
    {
        $data = [
            'judul' => 'Tambah Pelajaran',
        ];
        return view('pelajaran/v_tambah_pelajaran', $data);
    }

    public function simpan()
    {
        if(!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[pelajaran.nama]',
                'errors' => [
                    'required' => 'Tuliskan nama pelajaran !',
                    'is_unique' => 'Nama pelajaran ada !'
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
            'status' => true,
        );

        $this->pelajaranModel->insert($data);
        return redirect()->to('/admin/pelajaran')->with('sukses','Data berhasil disimpan!');
    }

    public function edit($slug = null)
    {
        if($slug == '') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $detailPelajaran = $this->pelajaranModel->getDetailForEdit($slug);
        if (empty($detailPelajaran)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pelajaran ' .$slug. ' tidak ditemukan');
        }
        $data = [
            'judul' => 'Edit Pelajaran',
            'detailPelajaran' => $detailPelajaran 
        ];
        return view('pelajaran/v_edit_pelajaran', $data);
    }

    public function update($id = ''){
        if($id == ''){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $namaPelajaranLama = $this->request->getVar('nama_lama');
        $namaPelajaranBaru = $this->request->getVar('nama');
        if($namaPelajaranLama == $namaPelajaranBaru){
            $rule_judul = 'required';
        }else{
            $rule_judul = 'required|is_unique[pelajaran.nama]';
        }
        if(!$this->validate([
            'nama' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => 'Inputkan nama pelajaran',
                    'is_unique' => 'Nama pelajaran sudah ada'
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
            'status' => true,  
        );
        $this->pelajaranModel->where('id', $id)->set($data)->update();
        return redirect()->to('/admin/pelajaran')->with('sukses','Data berhasil diubah!');
    }

    public function tambah_penghuni()
    {
        $semuaSiswaBelumAdaPelajaran = $this->siswaModel->getAllSiswaBelumAdaPelajaran();
        $semuaPelajaran = $this->pelajaranModel->getAllPelajaranMasihKosong();

    }

    public function hapus($id_pelajaran)
    {
        $cekPelajaran = $this->pelajaranKelasModel->where('id_pelajaran', $id_pelajaran)->countAllResults();
        if($cekPelajaran == 0){
            $this->pelajaranModel->delete($id_pelajaran);
            return redirect()->to('/admin/pelajaran')->with('sukses','Data berhasil dihapus!');
        }else {
            return redirect()->to('/admin/pelajaran')->with('gagal','Pelajaran tidak bisa di hapus karna sedang digunakan kelas lain!');
        }
    }
}
