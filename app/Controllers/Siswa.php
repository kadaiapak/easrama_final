<?php

namespace App\Controllers;
use App\Models\SiswaModel;
use App\Models\UserLevelModel;

// library untuk export excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// library untuk export pdf
use Dompdf\Dompdf;
use Dompdf\Options;
class Siswa extends BaseController
{
    protected $siswaModel;
    public function __construct()
    {
        helper('form');
        $this->siswaModel = new SiswaModel();
        $this->userLevelModel = new UserLevelModel();
    }

    public function index()
    {
        $tahun = session()->get('tahun');
        $semuaSiswa = $this->siswaModel->getAllPendaftarByAdmin($tahun);
        $data = [
            'judul' => 'Siswa',
            'semuaSiswa' => $semuaSiswa,
        ];
        return view('siswa/v_siswa', $data);
    }


    public function siswa_terdaftar()
    {
        $tahun = session()->get('tahun');
        $semuaSiswa = $this->siswaModel->getAllSiswaTerdaftarByAdmin($tahun);
        $data = [
            'judul' => 'Siswa',
            'semuaSiswa' => $semuaSiswa,
        ];
        return view('siswa/v_siswa_terdaftar', $data);
    }
    
    public function tambah()
    {   
        $data = [
            'judul' => 'Tambah Siswa',
        ];
        return view('siswa/v_tambah_siswa', $data);
    }

    public function simpan()
    {
        if(!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tuliskan Nama Lengkap',
                ]
            ],
            'jk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih jenis kelamin',
                ]
            ],
            'no_hp' => [
                'rules' => 'required|alpha_numeric',
                'errors' => [
                    'required' => 'Inputkan No HP',
                    'alpha_numeric' => 'Username hanya angka tanpa spasi dan spesial karakter',
                ]
            ],
            'no_wa' => [
                'rules' => 'required|alpha_numeric',
                'errors' => [
                    'required' => 'Inputkan no Whatsapp',
                    'alpha_numeric' => 'Username hanya angka tanpa spasi dan spesial karakter',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tuliskan alamat lengkap',
                ]
            ],
            'kelurahan_desa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tuliskan kelurahan/desa tempat tinggal',
                ]
            ],
            'kecamatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tuliskan kecamatan tempat tinggal',
                ]
            ],
            'kabupaten_kota' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tuliskan kabupaten/kota tempat tinggal',
                ]
            ],
            'provinsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tuliskan provinsi tempat tinggal',
                ]
            ],
            'tanggal_pendaftaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tuliskan tanggal',
                ]
            ],
        ])){
            return redirect()->back()->withInput();
        }

        // pengelolaan foto
        $berita_sampul = $this->request->getFile('berita_sampul');
        if($berita_sampul->getError() == 4) {
            $nama_sampul = null;
        }else {
            $nama_sampul = $berita_sampul->getRandomName();
            echo "Nama file: ".$nama_sampul;
            $berita_sampul->move('./upload/pas_foto', $nama_sampul);
        }
        // akhir pengelolaan foto
        // no pendaftaran
        // $noTerakhir = $this->siswaModel->getNomorPendaftarTerakhir();
        // $tanggal = date_format('mY', $this->request->getVar('tanggal_pendaftaran'));
        // if($noTerakhir != null){
        //     $noPendaftar = $noTerakhir['id'] + 1;
        // }else {
        //     $noPendaftar = 1;
        // }
        // $noPendaftaran = $noPendaftar.$tanggal;
        // akhir no pendaftaran
        $tanggal = strtotime($this->request->getVar('tanggal_pendaftaran'));
        $tanggalPendaftaran = date('d', $tanggal);
        $bulanPendaftaran = date('m', $tanggal);
        $tahunPendaftaran = date('Y', $tanggal);
        $data = array(
            'no_pendaftaran' => $this->request->getVar('no_pendaftaran'),
            'foto' => $nama_sampul,
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
        return redirect()->to('/admin/siswa')->with('sukses','Data berhasil disimpan!');
    }

    public function detail($id = '')
    {
        if($id == '') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $data = [
            'judul' => 'Detail Siswa',
            'detailSiswa' => $this->siswaModel->find($id)
        ];
        return view('siswa/v_detail_siswa', $data);
    }

    public function edit($id = '')
    {
        if($id == '') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $data = [
            'judul' => 'Edit Siswa',
            'detailSiswa' => $this->siswaModel->getForEdit($id)
        ];
        return view('siswa/v_edit_siswa', $data);
    }

    public function update($id = ''){
        if($id == ''){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        if(!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tuliskan Nama Lengkap',
                ]
            ],
            'jk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih jenis kelamin',
                ]
            ],
            'no_hp' => [
                'rules' => 'required|alpha_numeric',
                'errors' => [
                    'required' => 'Inputkan No HP',
                    'alpha_numeric' => 'Username hanya angka tanpa spasi dan spesial karakter',
                ]
            ],
            'no_wa' => [
                'rules' => 'required|alpha_numeric',
                'errors' => [
                    'required' => 'Inputkan no Whatsapp',
                    'alpha_numeric' => 'Username hanya angka tanpa spasi dan spesial karakter',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tuliskan alamat lengkap',
                ]
            ],
            'kelurahan_desa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tuliskan kelurahan/desa tempat tinggal',
                ]
            ],
            'kecamatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tuliskan kecamatan tempat tinggal',
                ]
            ],
            'kabupaten_kota' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tuliskan kabupaten/kota tempat tinggal',
                ]
            ],
            'provinsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tuliskan provinsi tempat tinggal',
                ]
            ],
            'tanggal_pendaftaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tuliskan tanggal',
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
            $beritaSampulBaru->move('./upload/pas_foto', $berita_sampul);
            // hapus file lama
            if($this->request->getVar('berita_sampul_lama') != null) {
                unlink('upload/pas_foto/'.$this->request->getVar('berita_sampul_lama'));
            } 
        }

        $tanggal = strtotime($this->request->getVar('tanggal_pendaftaran'));
        $tanggalPendaftaran = date('d', $tanggal);
        $bulanPendaftaran = date('m', $tanggal);
        $tahunPendaftaran = date('Y', $tanggal); 
        $data = array(
            'no_pendaftaran' => $this->request->getVar('no_pendaftaran'),
            'foto' => $berita_sampul,
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
        $this->siswaModel->where('id', $id)->set($data)->update();
        return redirect()->to('/admin/siswa')->with('sukses','Data berhasil diubah!');
    }

    public function verifikasi($id)
    {
        $data = array(
            'status' => 3
        );
        $this->siswaModel->where('id', $id)->set($data)->update();
        return redirect()->to('/admin/siswa')->with('sukses','Data berhasil diubah!');
    }

    public function set_tahun()
    {
        $tahun = $this->request->getVar('tahun_pendaftaran');
        session()->set('tahun', $tahun);
        return redirect()->to('/admin/siswa');
    }

    // callback function untuk validation rules
    function cek_spasi($str)
    {
        $pattern = '/ /';
        $result = preg_match($pattern, $str);

        if ($result)
        {
            $this->form_validation->set_message('username_check', 'The %s field can not have a " "');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }



    public function excel()
    {
        $tahun = $this->request->getVar('tahun_pendaftaran');
        $semuaSiswa = $this->siswaModel->getAllPendaftarExportExcel($tahun);
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'Rekap Semua Pendaftar Tahun '.$tahun);
        $activeWorksheet->mergeCells('A1:L1');
        $activeWorksheet->getStyle('A1')->getFont()->setBold(true);
        $activeWorksheet->setCellValue('A3', 'No');
        $activeWorksheet->setCellValue('B3', 'No Pendaftaran');
        $activeWorksheet->setCellValue('C3', 'Nama');
        $activeWorksheet->setCellValue('D3', 'JK');
        $activeWorksheet->setCellValue('E3', 'No HP');
        $activeWorksheet->setCellValue('F3', 'No Whatsapp');
        $activeWorksheet->setCellValue('G3', 'Alamat');
        $activeWorksheet->setCellValue('H3', 'Kelurahan/Desa');
        $activeWorksheet->setCellValue('I3', 'Kecamatan');
        $activeWorksheet->setCellValue('J3', 'Kabupaten/Kota');
        $activeWorksheet->setCellValue('K3', 'Provinsi');
        $activeWorksheet->setCellValue('L3', 'Tanggal Pendaftaran');

        $column = 4;
        foreach ($semuaSiswa as $ss) {
            $activeWorksheet->setCellValue('A'.$column ,($column-3));
            $activeWorksheet->setCellValue('B'.$column , $ss['no_pendaftaran']);
            $activeWorksheet->setCellValue('C'.$column , $ss['nama']);
            $activeWorksheet->setCellValue('D'.$column , $ss['jk']);
            $activeWorksheet->setCellValue('E'.$column , $ss['no_hp']);
            $activeWorksheet->setCellValue('F'.$column , $ss['no_wa']);
            $activeWorksheet->setCellValue('G'.$column , $ss['alamat']);
            $activeWorksheet->setCellValue('H'.$column , $ss['kelurahan_desa']);
            $activeWorksheet->setCellValue('I'.$column , $ss['kecamatan']);
            $activeWorksheet->setCellValue('J'.$column , $ss['kabupaten_kota']);
            $activeWorksheet->setCellValue('K'.$column , $ss['provinsi']);
            $activeWorksheet->setCellValue('L'.$column , $ss['tanggal_pendaftaran'].'-'.$ss['bulan_pendaftaran'].'-'.$ss['tahun_pendaftaran']);
            $column++;
        }

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];
        $activeWorksheet->getStyle('A3:L'.($column-1))->applyFromArray($styleArray);

        $activeWorksheet->getDefaultRowDimension()->setRowHeight(-1);
        $activeWorksheet->getStyle('F:H')->getAlignment()->setWrapText(true);
        $activeWorksheet->getColumnDimension('F')->setWidth(60);
        $activeWorksheet->getColumnDimension('G')->setWidth(60);
        $activeWorksheet->getColumnDimension('H')->setWidth(40);

        $activeWorksheet->getColumnDimension('A')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('B')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('C')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('D')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('E')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('I')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('J')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('K')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('L')->setAutoSize(true);


        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=laporan_semua_pendaftar.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }

    public function master_siswa()
    {
        $tahun = session()->get('tahun');
        $status = session()->get('status');
        $semuaSiswa = $this->siswaModel->getAllMasterSiswa($tahun, $status);
        $data = [
            'judul' => 'Maste Data Siswa',
            'semuaSiswa' => $semuaSiswa,
        ];
        return view('siswa/v_master_siswa', $data);
    }

    public function master_siswa_detail($id = '')
    {
        if($id == '') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $data = [
            'judul' => 'Detail Siswa',
            'detailSiswa' => $this->siswaModel->find($id)
        ];
        return view('siswa/v_detail_master_siswa', $data);
    }

    public function master_siswa_excel()
    {
        $tahun = $this->request->getVar('tahun_pendaftaran');
        $status = $this->request->getVar('status');
        $semuaSiswa = $this->siswaModel->getAllMasterSiswa($tahun, $status);
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', "Rekap Semua Siswa Sekolah Bintang Al-Quran ".$tahun);
        $activeWorksheet->mergeCells('A1:L1');
        $activeWorksheet->getStyle('A1')->getFont()->setBold(true);
        $activeWorksheet->setCellValue('A3', 'No');
        $activeWorksheet->setCellValue('B3', 'No Pendaftaran');
        $activeWorksheet->setCellValue('C3', 'Nama');
        $activeWorksheet->setCellValue('D3', 'JK');
        $activeWorksheet->setCellValue('E3', 'No HP');
        $activeWorksheet->setCellValue('F3', 'No Whatsapp');
        $activeWorksheet->setCellValue('G3', 'Alamat');
        $activeWorksheet->setCellValue('H3', 'Kelurahan/Desa');
        $activeWorksheet->setCellValue('I3', 'Kecamatan');
        $activeWorksheet->setCellValue('J3', 'Kabupaten/Kota');
        $activeWorksheet->setCellValue('K3', 'Provinsi');
        $activeWorksheet->setCellValue('L3', 'Tanggal Pendaftaran');
        $activeWorksheet->setCellValue('M3', 'Kelas');
        $activeWorksheet->setCellValue('N3', 'Kamar');
        $activeWorksheet->setCellValue('O3', 'Status');

        $column = 4;
        foreach ($semuaSiswa as $ss) {
            $activeWorksheet->setCellValue('A'.$column ,($column-3));
            $activeWorksheet->setCellValue('B'.$column , $ss['no_pendaftaran']);
            $activeWorksheet->setCellValue('C'.$column , $ss['nama']);
            $activeWorksheet->setCellValue('D'.$column , $ss['jk']);
            $activeWorksheet->setCellValue('E'.$column , $ss['no_hp']);
            $activeWorksheet->setCellValue('F'.$column , $ss['no_wa']);
            $activeWorksheet->setCellValue('G'.$column , $ss['alamat']);
            $activeWorksheet->setCellValue('H'.$column , $ss['kelurahan_desa']);
            $activeWorksheet->setCellValue('I'.$column , $ss['kecamatan']);
            $activeWorksheet->setCellValue('J'.$column , $ss['kabupaten_kota']);
            $activeWorksheet->setCellValue('K'.$column , $ss['provinsi']);
            $activeWorksheet->setCellValue('L'.$column , $ss['tanggal_pendaftaran'].'-'.$ss['bulan_pendaftaran'].'-'.$ss['tahun_pendaftaran']);
            $activeWorksheet->setCellValue('M'.$column , $ss['nama_kelas']);
            $activeWorksheet->setCellValue('N'.$column , $ss['nama_kamar']);
            $activeWorksheet->setCellValue('O'.$column , $ss['status'] == 1 ? 'Pelamar' : ($ss['status'] == 2 ? 'Ditolak' : ($ss['status'] == 3 ? 'Diterima' : null)));
            $column++;
        }

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];
        $activeWorksheet->getStyle('A3:O'.($column-1))->applyFromArray($styleArray);

        $activeWorksheet->getDefaultRowDimension()->setRowHeight(-1);
        $activeWorksheet->getStyle('F:H')->getAlignment()->setWrapText(true);
        $activeWorksheet->getColumnDimension('F')->setWidth(60);
        $activeWorksheet->getColumnDimension('G')->setWidth(60);
        $activeWorksheet->getColumnDimension('H')->setWidth(40);

        $activeWorksheet->getColumnDimension('A')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('B')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('C')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('D')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('E')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('I')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('J')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('K')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('L')->setAutoSize(true);


        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=Rekap_Semua_Siswa_Sekolah_Bintang_AlQuran.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }

    public function master_siswa_set_tahun_status()
    {
        $tahun = $this->request->getVar('tahun_pendaftaran');
        $status = $this->request->getVar('status');
        session()->set('tahun', $tahun);
        session()->set('status', $status);
        return redirect()->to('/admin/master-siswa');
    }

    public function master_siswa_pdf()
    {
        $tahun = $this->request->getVar('tahun_pendaftaran');
        $status = $this->request->getVar('status');
        $semuaSiswa = $this->siswaModel->getAllMasterSiswa($tahun, $status);
        $options = new Options();
        $dompdf = new Dompdf($options);
        $data = array(
            'title_pdf' => 'Rekap Semua Siswa Sekolah Bintang Al-Quran',
            'semuaSiswa' => $semuaSiswa,
        );
        $filename = 'Rekap_Semua_Siswa_Sekolah_Bintang_AlQuran';
        $html = view('siswa/v_cetak_rekap_master_siswa', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4','portrait');
        $dompdf->render();
        $dompdf->stream($filename, array("Attachment" => false));
        exit();
    }

}
