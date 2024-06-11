<?php

namespace App\Controllers;
use App\Models\SiswaModel;
use App\Models\KamarModel;
use App\Models\HistoriKamarSiswaModel;

// library untuk export excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// library untuk export pdf
use Dompdf\Dompdf;
use Dompdf\Options;
class PenghuniKamar extends BaseController
{
    protected $kamarModel;
    protected $siswaModel;
    protected $historiKamarSiswaModel;
    public function __construct()
    {
        helper('form');
        $this->kamarModel = new KamarModel();
        $this->siswaModel = new SiswaModel();
        $this->historiKamarSiswaModel = new HistoriKamarSiswaModel();   
    }

    public function index()
    {
        $id_kamar = session()->get('id_kamar');
        $semuaKamar = $this->kamarModel->getAllByAdmin();
        $semuaSiswaBelumAdaKamar = $this->siswaModel->getAllSiswaBelumAdaKamar();
        $semuaSiswaSudahAdaKamar = $this->siswaModel->getAllSiswaSudahAdaKamar($id_kamar);
        $data = [
            'judul' => 'Kamar Siswa',
            'semuaKamar' => $semuaKamar,
            'semuaSiswaBelumAdaKamar' => $semuaSiswaBelumAdaKamar,
            'semuaSiswaSudahAdaKamar' => $semuaSiswaSudahAdaKamar
        ];
        return view('penghuni_kamar/v_penghuni_kamar', $data);
    }

    public function simpan()
    {
        if(!$this->validate([
            'id_siswa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Mata Pelajaran !',
                ]
            ],
            'id_kamar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Kamar !'
                ]
            ],
        ])){
            return redirect()->back()->withInput();
        }
    
        $data = array(
            'id_kamar' => $this->request->getVar('id_kamar'),
        );
        $id = $this->request->getVar('id_siswa');
        $this->siswaModel->where('id', $id)->set($data)->update();
        
        $dataHistori = array(
            'id_siswa' => $this->request->getVar('id_siswa'),
            'id_kamar' => $this->request->getVar('id_kamar'),
            'keterangan' => 'masuk'
        );
        
        $this->historiKamarSiswaModel->insert($dataHistori);
        return redirect()->to('/admin/penghuni-kamar')->with('sukses','Data berhasil disimpan!');
    }

    public function edit($id = null)
    {
        if($id == '') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $detailSiswa = $this->siswaModel->getForEdit($id);
        if (empty($detailSiswa)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Kamar ' .$id. ' tidak ditemukan');
        }
        $semuaKamar = $this->kamarModel->getAllByAdmin();
        $data = [
            'judul' => 'Edit Kamar Siswa',
            'semuaKamar' => $semuaKamar,
            'detailSiswa' => $detailSiswa 
        ];
        return view('penghuni_kamar/v_edit_penghuni_kamar', $data);
    }

    public function update($id = ''){
        if($id == ''){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        if(!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama siswa tidak boleh kosong',
                ]
            ],
            'jk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis kelamin tidak boleh kosong',
                ]
            ],
            'id_kamar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kamar harus dipilih, tidak boleh kosong !',
                ]
            ],
        ])){
            return redirect()->back()->withInput();
        }

        $data = array(
            'id_kamar' => $this->request->getVar('id_kamar'),
        );
        $dataHistori = array(
            'id_siswa' => $id,
            'id_kamar' => $this->request->getVar('id_kamar'),
            'keterangan' => 'pindah'
        );
        $this->siswaModel->where('id', $id)->set($data)->update();
        $this->historiKamarSiswaModel->insert($dataHistori);
        return redirect()->to('/admin/penghuni-kamar')->with('sukses','Data berhasil diubah!');
    }

    public function hapus($id)
    {
        $data = array(
            'id_kamar' => null,
        );
        $dataHistori = array(
            'id_siswa' => $id,
            'id_kamar' => null,
            'keterangan' => 'hapus'
        );
        $this->siswaModel->where('id', $id)->set($data)->update();
        $this->historiKamarSiswaModel->insert($dataHistori);
        return redirect()->to('/admin/penghuni-kamar')->with('sukses','Data berhasil dihapus!');
    }

    public function set_id_kamar()
    {
        $id_kamar = $this->request->getVar('id_kamar');
        session()->set('id_kamar', $id_kamar);
        return redirect()->to('/admin/penghuni-kamar');
    }

    public function excel()
    {
        $id_kamar = $this->request->getVar('id_kamar');
        $semuaSiswa = $this->siswaModel->getAllSiswaSudahAdaKamar($id_kamar);
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'Rekap Penghuni Kamar');
        $activeWorksheet->mergeCells('A1:L1');
        $activeWorksheet->getStyle('A1')->getFont()->setBold(true);
        $activeWorksheet->setCellValue('A3', 'No');
        $activeWorksheet->setCellValue('B3', 'Kamar');
        $activeWorksheet->setCellValue('C3', 'Nama');
        $activeWorksheet->setCellValue('D3', 'Kelas');
        $activeWorksheet->setCellValue('E3', 'JK');
        $activeWorksheet->setCellValue('F3', 'No HP');
        $activeWorksheet->setCellValue('G3', 'No Whatsapp');
        $activeWorksheet->setCellValue('H3', 'Alamat');
        $activeWorksheet->setCellValue('I3', 'Kelurahan/Desa');
        $activeWorksheet->setCellValue('J3', 'Kecamatan');
        $activeWorksheet->setCellValue('K3', 'Kabupaten/Kota');
        $activeWorksheet->setCellValue('L3', 'Provinsi');
        $activeWorksheet->setCellValue('M3', 'Tanggal Pendaftaran');

        $column = 4;
        foreach ($semuaSiswa as $ss) {
            $activeWorksheet->setCellValue('A'.$column ,($column-3));
            $activeWorksheet->setCellValue('B'.$column , $ss['nama_kamar']);
            $activeWorksheet->setCellValue('C'.$column , $ss['nama']);
            $activeWorksheet->setCellValue('D'.$column , $ss['nama_kelas']);
            $activeWorksheet->setCellValue('E'.$column , $ss['jk']);
            $activeWorksheet->setCellValue('F'.$column , $ss['no_hp']);
            $activeWorksheet->setCellValue('G'.$column , $ss['no_wa']);
            $activeWorksheet->setCellValue('H'.$column , $ss['alamat']);
            $activeWorksheet->setCellValue('I'.$column , $ss['kelurahan_desa']);
            $activeWorksheet->setCellValue('J'.$column , $ss['kecamatan']);
            $activeWorksheet->setCellValue('K'.$column , $ss['kabupaten_kota']);
            $activeWorksheet->setCellValue('L'.$column , $ss['provinsi']);
            $activeWorksheet->setCellValue('M'.$column , $ss['tanggal_pendaftaran'].'-'.$ss['bulan_pendaftaran'].'-'.$ss['tahun_pendaftaran']);
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
        $activeWorksheet->getColumnDimension('M')->setAutoSize(true);


        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=laporan_semua_penghuni_kamar.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }

    public function pdf()
    {
        $id_kamar = $this->request->getVar('id_kamar');
        $semuaSiswaSudahAdaKamar = $this->siswaModel->getAllSiswaSudahAdaKamar($id_kamar);
       
        $options = new Options();
        $dompdf = new Dompdf($options);
        $tanggal_surat = tanggal_indo(date('Y-m-d'));
        $data = array(
            'title_pdf' => 'Rekap Penghuni Kamar Asrama',
            'semuaSiswaSudahAdaKamar' => $semuaSiswaSudahAdaKamar,
            'tanggal_surat' => $tanggal_surat,
        );
        $filename = 'rekap_penghuni_asrama';
        $html = view('penghuni_kamar/v_cetak_rekap_penghuni_kamar', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4','portrait');
        $dompdf->render();
        $dompdf->stream($filename, array("Attachment" => false));
        exit();
    }
}
