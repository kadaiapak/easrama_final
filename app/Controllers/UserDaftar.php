<?php

namespace App\Controllers;
use App\Models\SiswaModel;

class UserDaftar extends BaseController
{
    protected $siswaModel;
    public function __construct()
    {
        helper('form');
        $this->siswaModel = new SiswaModel();
    }

    public function index()
    {
        $data = [
            'judul' => 'Formulir Pendaftaran',
        ];
        return view('home/v_daftar', $data);
    }

    public function simpan()
    {
        if(!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tulis nama lengkap'
                ]
            ],
            'jk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih jenis kelamin'
                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tulis Nomor HP'
                ]
            ],
            'no_wa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tulis Nomor Whatsapp'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tulis Alamat Lengkap'
                ]
            ],
            'kelurahan_desa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tulis kelurahan / desa tempat tinggal'
                ]
            ],
            'kecamatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tulis kecamatan tempat tinggal'
                ]
            ],
            'kabupaten_kota' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tulis kabupaten / kota tempat tinggal'
                ]
            ],
            'provinsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tulis provinsi tempat tinggal'
                ]
            ]
        ])){
            return redirect()->back()->withInput();
        }

        $noTerakhir = $this->siswaModel->getNomorPendaftarTerakhir();
        $tanggal = date('mY');
        if($noTerakhir != null){
            $noPendaftar = $noTerakhir['id'] + 1;
        }else {
            $noPendaftar = 1;
        }
        $noPendaftaran = $noPendaftar.$tanggal;
        $tanggalPendaftaran = date('d');
        $bulanPendaftaran = date('m');
        $tahunPendaftaran = date('Y');
        $data = array(
            'no_pendaftaran' => $noPendaftaran,
            'nama' => $this->request->getVar('nama'),
            'jk' => $this->request->getVar('jk'),
            'no_hp' => $this->request->getVar('no_hp'),
            'no_wa' => $this->request->getVar('no_wa'),
            'alamat' => $this->request->getVar('alamat'),
            'kelurahan_desa' => $this->request->getVar('kelurahan_desa'),
            'kecamatan' => $this->request->getVar('kecamatan'),
            'kabupaten_kota' => $this->request->getVar('kabupaten_kota'),
            'provinsi' => $this->request->getVar('provinsi'),
            'tanggal_pendaftaran' => $tanggalPendaftaran,
            'bulan_pendaftaran' => $bulanPendaftaran,
            'tahun_pendaftaran' => $tahunPendaftaran,
            'status' => 1,
        );
        $this->siswaModel->insert($data);
        return redirect()->to('/daftar/sukses')->with('sukses','Data berhasil disimpan!');
    }

    public function sukses()
    {
        if(session()->getFlashdata('sukses')){
            $data = [
                'judul' => 'Pendfataran Sukses',
            ];
            return view('home/v_daftar_sukses', $data);
        }else {
           return redirect()->to('/');
        }
    }

    // public function detail($id)
    // {
    //     if($id == '') {
    //         throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    //     }
    //     $detailBerita = $this->beritaModel->getDetailByAdmin($id);
    //     if (empty($detailBerita)) {
    //         throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul berita dengan id' .$id. ' tidak ditemukan');
    //     }
    //     $data = [
    //         'judul' => 'Detail Berita',    
    //         'detailBerita' => $detailBerita,
    //     ];
    //     return view('berita/v_detail_berita', $data);
    // }

    // public function edit($slug = null)
    // {
    //     if($slug == '') {
    //         throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    //     }
    //     $detailBerita = $this->beritaModel->getDetailForEditByAdmin($slug);
    //     if (empty($detailBerita)) {
    //         throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul berita ' .$slug. ' tidak ditemukan');
    //     }
    //     if($detailBerita['berita_penulis'] == session()->get('user_id') OR session()->get('level') == 1)
    //     {
    //         $semuaKategori = $this->kategoriModel->find();
    //         $data = [
    //             'judul' => 'Edit Berita',    
    //             'detailBerita' => $detailBerita,
    //             'semuaKategori'=> $semuaKategori,
    //         ];
    //         return view('berita/v_edit_berita', $data);
    //     } else {
    //        return redirect()->back();
    //     }
    // }

    // public function update($id = ''){
    //     if($id == ''){
    //         throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    //     }
    //     if($this->request->getVar('berita_judul_lama') == $this->request->getVar('berita_judul')){
    //         $rule_judul = 'required';
    //     }else{
    //         $rule_judul = 'required|required|is_unique[berita.berita_judul]';
    //     }
    //     if(!$this->validate([
    //         'berita_judul' => [
    //             'rules' => $rule_judul,
    //             'errors' => [
    //                 'required' => 'Inputkan judul berita',
    //                 'is_unique' => 'Judul berita harus unik'
    //             ]
    //         ],
    //         'berita_sampul' => [
    //             'rules' => 'max_size[berita_sampul,1024]|is_image[berita_sampul]',
    //             'errors' => [
    //                 'uploaded' => 'Silahkan upload sampul berita !',
    //                 'max_size' => 'Ukuran sampul berita tidak boleh lebih dari 1MB / 1024KB !',
    //                 'is_image' => 'Sampul Berita harus Gambar'
    //             ]
    //         ],
    //     ])){
    //         return redirect()->back()->withInput();
    //     }

    //     $beritaSampulBaru = $this->request->getFile('berita_sampul');
    //     if($beritaSampulBaru->getError() == 4) {
    //         $berita_sampul = $this->request->getVar('berita_sampul_lama');
    //     }else {
    //         $berita_sampul = $beritaSampulBaru->getRandomName();
    //         $beritaSampulBaru->move('./upload/berita_sampul', $berita_sampul);
    //         // hapus file lama
    //         unlink('upload/berita_sampul/'.$this->request->getVar('berita_sampul_lama'));
    //     }

    //     $slug = url_title($this->request->getVar('berita_judul'), '-', true);
    //     $data = array(
    //         'berita_sampul' => $berita_sampul,
    //         'berita_judul' => $this->request->getVar('berita_judul'),
    //         'berita_slug' => $slug,
    //         'berita_isi' => $this->request->getVar('berita_isi'),
    //         'berita_kategori' => $this->request->getVar('berita_kategori'),
    //         'berita_penulis' => session()->get('user_id'),
    //         'berita_is_penting' => $this->request->getVar('berita_is_penting'),
    //         'berita_tampil' => $this->request->getVar('berita_tampil'),
    //     );
    //     $this->beritaModel->where('berita_id', $id)->set($data)->update();
    //     return redirect()->to('/admin/berita')->with('sukses','Data berhasil diubah!');
    // }

    // public function hapus($id)
    // {
    //     $cekGambar = $this->beritaModel->cekGambar($id);
    //     if($cekGambar['berita_sampul'] != null){
    //         unlink('upload/berita_sampul/'.$cekGambar['berita_sampul']);
    //     }
    //     $this->beritaModel->delete($id);
    //     return redirect()->to('/admin/berita')->with('sukses','Data berhasil dihapus!');
    // }
}
