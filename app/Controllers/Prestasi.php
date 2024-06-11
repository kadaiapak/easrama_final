<?php

namespace App\Controllers;
use App\Models\PrestasiModel;
use App\Models\DepartemenModel;
use App\Models\PengaturanModel;

class Prestasi extends BaseController
{
    protected $prestasiModel;
    protected $departemenModel;
    protected $pengaturanModel;
    public function __construct()
    {
        helper('form');
        $this->prestasiModel = new PrestasiModel();
        $this->departemenModel = new DepartemenModel();
        $this->pengaturanModel = new PengaturanModel();
    }

    public function index()
    {
        $semuaPrestasi = $this->prestasiModel->getAllByAdmin();
        $headerPrestasi = $this->pengaturanModel->getHeaderPrestasi();
        $data = [
            'judul' => 'Prestasi',
            'semuaPrestasi' => $semuaPrestasi,
            'headerPrestasi' => $headerPrestasi,
        ];
        return view('prestasi/v_prestasi', $data);
    }
    
    public function tambah()
    {
        $semuaDepartemen = $this->departemenModel->find();
        $data = [
            'judul' => 'Tambah Prestasi',
            'semuaDepartemen' => $semuaDepartemen
        ];
        return view('prestasi/v_tambah_prestasi', $data);
    }

    public function simpan()
    {
        if(!$this->validate([
            'prestasi_judul' => [
                'rules' => 'required|is_unique[prestasi.prestasi_judul]',
                'errors' => [
                    'required' => 'Tuliskan judul prestasi !',
                    'is_unique' => 'Judul sudah pernah ada !'
                ]
            ],
            'prestasi_sampul' => [
                'rules' => 'uploaded[prestasi_sampul]|max_size[prestasi_sampul,1024]|is_image[prestasi_sampul]',
                'errors' => [
                    'uploaded' => 'Silahkan upload sampul berita prestasi !',
                    'max_size' => 'Ukuran sampul berita tidak boleh lebih dari 1MB / 1024KB !',
                    'is_image' => 'Sampul Berita harus Gambar'
                ]
            ],
            'prestasi_deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tulis deskripsi dari prestasi'
                ]
            ],
            'prestasi_tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tuliskan tahun prestasi'
                ]
            ],
            'prestasi_tingkat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih tingkat lomba'
                ]
            ],
            'prestasi_peringkat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih peringkat lomba'
                ]
            ],
            'prestasi_nim' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih NIM pemenang'
                ]
            ],
            'prestasi_nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Nama pemenang'
                ]
            ],
            'prestasi_departemen' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Departemen Pemenang'
                ]
            ],
            'prestasi_sertifikat' => [
                'rules' => 'uploaded[prestasi_sertifikat]|max_size[prestasi_sertifikat,1024]|is_image[prestasi_sertifikat]',
                'errors' => [
                    'uploaded' => 'Silahkan upload sertifikat prestasi !',
                    'max_size' => 'Ukuran sertifikat tidak boleh lebih dari 1MB / 1024KB !',
                    'is_image' => 'Sertifikat harus Gambar'
                ]
            ],
        ])){
            return redirect()->back()->withInput();
        }

        $prestasi_sampul = $this->request->getFile('prestasi_sampul');
        $nama_sampul = $prestasi_sampul->getRandomName();
        echo "Nama file: ".$nama_sampul;
        $prestasi_sampul->move('./upload/prestasi', $nama_sampul);

        $prestasi_sertifikat = $this->request->getFile('prestasi_sertifikat');
        $nama_sertifikat = $prestasi_sertifikat->getRandomName();
        echo "Nama file: ".$nama_sertifikat;
        $prestasi_sertifikat->move('./upload/prestasi', $nama_sertifikat);
    
        $slug = url_title($this->request->getVar('prestasi_judul'), '-', true);
        $data = array(
            'prestasi_judul' => $this->request->getVar('prestasi_judul'),
            'prestasi_slug' => $slug,
            'prestasi_sampul' => $nama_sampul,
            'prestasi_deskripsi' => $this->request->getVar('prestasi_deskripsi'),
            'prestasi_penyelenggara' => $this->request->getVar('prestasi_penyelenggara'),
            'prestasi_tahun' => $this->request->getVar('prestasi_tahun'),
            'prestasi_tanggal_mulai' => $this->request->getVar('prestasi_tanggal_mulai'),
            'prestasi_tanggal_selesai' => $this->request->getVar('prestasi_tanggal_selesai'),
            'prestasi_tingkat' => $this->request->getVar('prestasi_tingkat'),
            'prestasi_peringkat' => $this->request->getVar('prestasi_peringkat'),
            'prestasi_nim' => $this->request->getVar('prestasi_nim'),
            'prestasi_nama' => $this->request->getVar('prestasi_nama'),
            'prestasi_departemen' => $this->request->getVar('prestasi_departemen'),
            'prestasi_sertifikat' => $nama_sertifikat,
            'prestasi_penulis' => session()->get('user_id'),
        );
        $this->prestasiModel->insert($data);
        return redirect()->to('/admin/prestasi')->with('sukses','Data berhasil disimpan!');
    }

    public function edit_header($slug = null)
    {
        $headerPrestasi = $this->pengaturanModel->getHeaderPrestasi();
        if (empty($headerPrestasi)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Halaman tidak ditemukan');
        }
            $data = [
                'judul' => 'Edit Prestasi',
                'headerPrestasi' => $headerPrestasi,
            ];
            return view('prestasi/v_edit_header_prestasi', $data);
    }

    public function edit($slug = null)
    {
        if($slug == '') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $detailPrestasi = $this->prestasiModel->getDetailForEdit($slug);
        if (empty($detailPrestasi)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul berita ' .$slug. ' tidak ditemukan');
        }
        if($detailPrestasi['prestasi_penulis'] == session()->get('user_id') OR session()->get('level') == 1)
        {
            $semuaDepartemen = $this->departemenModel->find();
            $data = [
                'judul' => 'Edit Prestasi',
                'detailPrestasi' => $detailPrestasi,
                'semuaDepartemen' => $semuaDepartemen
            ];
            return view('prestasi/v_edit_prestasi', $data);
        } else {
           return redirect()->back();
        }
   
        
    }

    public function update($id = ''){
        if($id == ''){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $slug = $this->request->getVar('slug');
        $prestasiLama = $this->prestasiModel->getDetailForEdit($slug);
        if($prestasiLama['prestasi_judul'] == $this->request->getVar('prestasi_judul')){
            $rule_judul = 'required';
        }else{
            $rule_judul = 'required|required|is_unique[berita.berita_judul]';
        }
        if(!$this->validate([
            'prestasi_judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => 'Inputkan judul berita prestasi',
                    'is_unique' => 'Judul berita prestasi harus unik'
                ]
            ],
            'prestasi_sampul' => [
                'rules' => 'uploaded[prestasi_sampul]|max_size[prestasi_sampul,1024]|is_image[prestasi_sampul]',
                'errors' => [
                    'uploaded' => 'Silahkan upload sampul berita prestasi !',
                    'max_size' => 'Ukuran sampul berita tidak boleh lebih dari 1MB / 1024KB !',
                    'is_image' => 'Sampul Berita harus Gambar'
                ]
            ],
            'prestasi_deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tulis deskripsi dari prestasi'
                ]
            ],
            'prestasi_tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tuliskan tahun prestasi'
                ]
            ],
            'prestasi_tingkat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih tingkat lomba'
                ]
            ],
            'prestasi_peringkat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih peringkat lomba'
                ]
            ],
            'prestasi_nim' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih NIM pemenang'
                ]
            ],
            'prestasi_nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Nama pemenang'
                ]
            ],
            'prestasi_departemen' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Departemen Pemenang'
                ]
            ],
            'prestasi_sertifikat' => [
                'rules' => 'uploaded[prestasi_sertifikat]|max_size[prestasi_sertifikat,1024]|is_image[prestasi_sertifikat]',
                'errors' => [
                    'uploaded' => 'Silahkan upload sertifikat prestasi !',
                    'max_size' => 'Ukuran sertifikat tidak boleh lebih dari 1MB / 1024KB !',
                    'is_image' => 'Sertifikat harus Gambar'
                ]
            ],
        ])){
            return redirect()->back()->withInput();
        }

        $prestasiSampulBaru = $this->request->getFile('prestasi_sampul');
        if($prestasiSampulBaru->getError() == 4) {
            $prestasi_sampul = $this->request->getVar('prestasi_sampul_lama');
        }else {
            $prestasi_sampul = $prestasiSampulBaru->getRandomName();
            $prestasiSampulBaru->move('./upload/prestasi', $prestasi_sampul);
            // hapus file lama
            unlink('upload/prestasi/'.$this->request->getVar('prestasi_sampul_lama'));
        }

        $prestasiSertifikatBaru = $this->request->getFile('prestasi_sertifikat');
        if($prestasiSertifikatBaru->getError() == 4) {
            $prestasi_sertifikat = $this->request->getVar('prestasi_sertifikat_lama');
        }else {
            $prestasi_sertifikat = $prestasiSertifikatBaru->getRandomName();
            $prestasiSertifikatBaru->move('./upload/prestasi', $prestasi_sertifikat);
            // hapus file lama
            unlink('upload/prestasi/'.$this->request->getVar('prestasi_sertifikat_lama'));
        }

        $slug = url_title($this->request->getVar('prestasi_judul'), '-', true);
        $data = array(
            'prestasi_judul' => $this->request->getVar('prestasi_judul'),
            'prestasi_slug' => $slug,
            'prestasi_sampul' => $prestasi_sampul,
            'prestasi_deskripsi' => $this->request->getVar('prestasi_deskripsi'),
            'prestasi_penyelenggara' => $this->request->getVar('prestasi_penyelenggara'),
            'prestasi_tahun' => $this->request->getVar('prestasi_tahun'),
            'prestasi_tanggal_mulai' => $this->request->getVar('prestasi_tanggal_mulai'),
            'prestasi_tanggal_selesai' => $this->request->getVar('prestasi_tanggal_selesai'),
            'prestasi_tingkat' => $this->request->getVar('prestasi_tingkat'),
            'prestasi_peringkat' => $this->request->getVar('prestasi_peringkat'),
            'prestasi_nim' => $this->request->getVar('prestasi_nim'),
            'prestasi_nama' => $this->request->getVar('prestasi_nama'),
            'prestasi_departemen' => $this->request->getVar('prestasi_departemen'),
            'prestasi_sertifikat' => $prestasi_sertifikat,
            'prestasi_penulis' => session()->get('user_id'),
        );
        $this->prestasiModel->where('prestasi_id', $id)->set($data)->update();
        return redirect()->to('/admin/prestasi  ')->with('sukses','Data berhasil diubah!');
    }

    public function update_header_prestasi(){
     
        if(!$this->validate([
            'pengaturan_nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Inputkan title kepala sesi prestasi',
                ]
            ]
        ])){
            return redirect()->back()->withInput();
        }
        $slug = url_title($this->request->getVar('pengaturan_nama'), '-', true);
        $data = array(
            'pengaturan_nama' => $this->request->getVar('pengaturan_nama'),
            'pengaturan_slug' => $slug,
            'pengaturan_isi' => $this->request->getVar('pengaturan_isi'),
        );
        $this->pengaturanModel->where('pengaturan_sesi', 'prestasi')->set($data)->update();
        return redirect()->to('/admin/prestasi')->with('sukses','Data berhasil diubah!');
    }

    // public function hapus()
    // {
    //     $this->prestasiModel->delete();
    //     return redirect()->to('/admin/berita')->with('sukses','Data berhasil dihapus!');
    // }
}
