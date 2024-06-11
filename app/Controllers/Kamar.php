<?php

namespace App\Controllers;
use App\Models\KamarModel;
use App\Models\SiswaModel;


class Kamar extends BaseController
{
    protected $kamarModel;
    protected $siswaModel;
    public function __construct()
    {
        helper('form');
        $this->kamarModel = new KamarModel();
        $this->siswaModel = new SiswaModel();
    }

    public function index()
    {
        $semuaKamar = $this->kamarModel->getAllDetailByAdmin();
        $data = [
            'judul' => 'Kamar',
            'semuaKamar' => $semuaKamar
        ];
        return view('kamar/v_kamar', $data);
    }
    
    public function tambah()
    {
        $data = [
            'judul' => 'Tambah Kamar',
        ];
        return view('kamar/v_tambah_kamar', $data);
    }

    public function simpan()
    {
        if(!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[kamar.nama]',
                'errors' => [
                    'required' => 'Tuliskan nama kamar !',
                    'is_unique' => 'Nama kamar ada !'
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

        $this->kamarModel->insert($data);
        return redirect()->to('/admin/kamar')->with('sukses','Data berhasil disimpan!');
    }

    public function edit($slug = null)
    {
        if($slug == '') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $detailKamar = $this->kamarModel->getDetailForEdit($slug);
        if (empty($detailKamar)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Kamar ' .$slug. ' tidak ditemukan');
        }
        $data = [
            'judul' => 'Edit Kamar',
            'detailKamar' => $detailKamar 
        ];
        return view('kamar/v_edit_kamar', $data);
    }

    public function update($id = ''){
        if($id == ''){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $namaKamarLama = $this->request->getVar('nama_lama');
        $namaKamarBaru = $this->request->getVar('nama');
        if($namaKamarLama == $namaKamarBaru){
            $rule_judul = 'required';
        }else{
            $rule_judul = 'required|is_unique[kamar.nama]';
        }
        if(!$this->validate([
            'nama' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => 'Inputkan nama kamar',
                    'is_unique' => 'Nama kamar sudah ada'
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isikan keterangan kamar',
                ]
            ],
            'kapasitas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tuliskan kapasitas kamar',
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
        $this->kamarModel->where('id', $id)->set($data)->update();
        return redirect()->to('/admin/kamar')->with('sukses','Data berhasil diubah!');
    }

    public function penghuni_kamar()
    {
        
    }

    public function tambah_penghuni()
    {
        $semuaSiswaBelumAdaKamar = $this->siswaModel->getAllSiswaBelumAdaKamar();
        $semuaKamar = $this->kamarModel->getAllKamarMasihKosong();
    }

    public function hapus($id_kamar)
    {
       
            $cekPenghuni = $this->siswaModel->where('id_kamar', $id_kamar)->countAllResults();
            if($cekPenghuni == 0){
                $this->kamarModel->delete($id_kamar);
                return redirect()->to('/admin/kamar')->with('sukses','Data berhasil dihapus!');
            }else {
                return redirect()->to('/admin/kamar')->with('gagal','Kamar tidak bisa di hapus karna ada penghuninya!');
            }
    }
}
