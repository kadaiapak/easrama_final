<?php

namespace App\Controllers;
use App\Models\KelasModel;
use App\Models\PelajaranModel;
use App\Models\PelajaranKelasModel;

// library untuk export excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// library untuk export pdf
use Dompdf\Dompdf;
use Dompdf\Options;
class PelajaranKelas extends BaseController
{
    protected $kelasModel;
    protected $pelajaranModel;
    protected $pelajaranKelasModel;
    public function __construct()
    {
        helper('form');
        $this->kelasModel = new KelasModel();
        $this->pelajaranModel = new PelajaranModel();
        $this->pelajaranKelasModel = new PelajaranKelasModel();
    }

    public function index()
    {
        $id_kelas = session()->get('id_kelas');
        $semuaPelajaranKelas = $this->pelajaranKelasModel->getAllPelajaranKelasByAdmin($id_kelas);
        $semuaKelas = $this->kelasModel->getAllByAdmin();
        $semuaPelajaran = $this->pelajaranModel->getAllByAdmin();
        $data = [
            'judul' => 'Pelajaran Kelas',
            'semuaKelas' => $semuaKelas,
            'semuaPelajaran' => $semuaPelajaran,
            'semuaPelajaranKelas' => $semuaPelajaranKelas
        ];
        return view('pelajaran_kelas/v_pelajaran_kelas', $data);
    }
    
    public function tambah()
    {
        $semuaKelas = $this->kelasModel->getAllByAdmin();
        $semuaPelajaran = $this->pelajaranModel->getAllByAdmin();
        $data = [
            'judul' => 'Tambah Pelajaran Pada Kelas',
            'semuaKelas' => $semuaKelas,
            'semuaPelajaran' => $semuaPelajaran
        ];
        return view('pelajaran_kelas/v_tambah_pelajaran_kelas', $data);
    }

    public function simpan()
    {
        if(!$this->validate([
            'id_pelajaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Mata Pelajaran !',
                ]
            ],
            'id_kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Kelas !'
                ]
            ],
            'jam_pelajaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Jam Pelajaran !'
                ]
            ],
        ])){
            return redirect()->back()->withInput();
        }
    
        $data = array(
            'jam_pelajaran' => $this->request->getVar('jam_pelajaran'),
            'id_kelas' => $this->request->getVar('id_kelas'),
            'id_pelajaran' => $this->request->getVar('id_pelajaran'),
        );

        $this->pelajaranKelasModel->insert($data);
        return redirect()->to('/admin/pelajaran-kelas')->with('sukses','Data berhasil disimpan!');
    }

    public function edit($id = null)
    {
        if($id == '') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $detailPelajaranKelas = $this->pelajaranKelasModel->getDetailForEdit($id);
        if (empty($detailPelajaranKelas)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pelajaran pada Kelas ' .$id. ' tidak ditemukan');
        }
        $semuaKelas = $this->kelasModel->getAllByAdmin();
        $semuaPelajaran = $this->pelajaranModel->getAllByAdmin();
        $data = [
            'judul' => 'Edit Pelajaran Tiap Kelas',
            'detailPelajaranKelas' => $detailPelajaranKelas,
            'semuaKelas' => $semuaKelas,
            'semuaPelajaran' => $semuaPelajaran,
        ];
        return view('pelajaran_kelas/v_edit_pelajaran_kelas', $data);
    }

    public function update($id = ''){
        if($id == ''){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        if(!$this->validate([
            'id_kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih kelas, tidak boleh kosong',
                ]
            ],
            'id_pelajaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih pelajaran, tidak boleh kosong',
                ]
            ],
            'jam_pelajaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isikan jam pelajaran',
                ]
            ],
        ])){
            return redirect()->back()->withInput();
        }
        $data = array(
            'id_pelajaran' => $this->request->getVar('id_pelajaran'),
            'jam_pelajaran' => $this->request->getVar('jam_pelajaran'),
            'id_kelas' => $this->request->getVar('id_kelas'),
        );
        $this->pelajaranKelasModel->where('id', $id)->set($data)->update();
        return redirect()->to('/admin/pelajaran-kelas')->with('sukses','Data berhasil diubah!');
    }

    public function hapus($id)
    {
        $this->pelajaranKelasModel->delete($id);
        return redirect()->to('/admin/pelajaran-kelas')->with('sukses','Data berhasil dihapus!');
    }

    public function set_id_kelas()
    {
        $id_kelas = $this->request->getVar('id_kelas');
        session()->set('id_kelas', $id_kelas);
        return redirect()->to('/admin/pelajaran-kelas');
    }

    public function excel()
    {
        $id_kelas = $this->request->getVar('id_kelas');
        $semuaPelajaranKelas = $this->pelajaranKelasModel->getAllPelajaranKelasByAdmin($id_kelas);
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'Rekap Pelajaran Tiap Kelas Kamar');
        $activeWorksheet->mergeCells('A1:D1');
        $activeWorksheet->getStyle('A1')->getFont()->setBold(true);
        $activeWorksheet->setCellValue('A3', 'No');
        $activeWorksheet->setCellValue('B3', 'Kelas');
        $activeWorksheet->setCellValue('C3', 'Jam Pelajaran');
        $activeWorksheet->setCellValue('D3', 'Mata Pelajaran');
        $column = 4;
        foreach ($semuaPelajaranKelas as $ss) {
            $activeWorksheet->setCellValue('A'.$column ,($column-3));
            $activeWorksheet->setCellValue('B'.$column , $ss['nama_kelas']);
            $activeWorksheet->setCellValue('C'.$column , $ss['jam_pelajaran']);
            $activeWorksheet->setCellValue('D'.$column , $ss['nama_pelajaran']);
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
        $activeWorksheet->getStyle('A3:D'.($column-1))->applyFromArray($styleArray);

        $activeWorksheet->getDefaultRowDimension()->setRowHeight(-1);
        $activeWorksheet->getStyle('F:H')->getAlignment()->setWrapText(true);
        $activeWorksheet->getColumnDimension('F')->setWidth(60);
        $activeWorksheet->getColumnDimension('G')->setWidth(60);
        $activeWorksheet->getColumnDimension('H')->setWidth(40);

        $activeWorksheet->getColumnDimension('A')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('B')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('C')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('D')->setAutoSize(true);
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=laporan_jam_pelajaran_tiap_kela.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }

    public function pdf()
    {
        $id_kelas = $this->request->getVar('id_kelas');
        $semuaPelajaranKelas = $this->pelajaranKelasModel->getAllPelajaranKelasByAdmin($id_kelas);
        $options = new Options();
        $dompdf = new Dompdf($options);
        $tanggal_surat = tanggal_indo(date('Y-m-d'));
        $data = array(
            'title_pdf' => 'Rekap Jam Pelajaran Tiap Kelas',
            'semuaPelajaranKelas' => $semuaPelajaranKelas,
            'tanggal_surat' => $tanggal_surat,
        );
        $filename = 'rekap_jam_pelajaran_tiap_kelas';
        $html = view('pelajaran_kelas/v_cetak_rekap_pelajaran_kelas', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4','portrait');
        $dompdf->render();
        $dompdf->stream($filename, array("Attachment" => false));
        exit();
    }
}
