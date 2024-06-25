<?php

namespace App\Controllers;
use App\Models\HistoriKelasSiswaModel;
use App\Models\HistoriKamarSiswaModel;
use App\Models\KamarModel;
use App\Models\KelasModel;

// library untuk export excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// library untuk export pdf
use Dompdf\Dompdf;
use Dompdf\Options;
class Histori extends BaseController
{
    protected $historiKelasSiswaModel;
    protected $historiKamarSiswaModel;
    protected $kamarModel;
    protected $kelasModel;
    public function __construct()
    {
        $this->historiKelasSiswaModel = new HistoriKelasSiswaModel();
        $this->historiKamarSiswaModel = new HistoriKamarSiswaModel();
        $this->kamarModel = new KamarModel();
        $this->kelasModel = new KelasModel();
    }

    public function index()
    {
        $id_kelas = session()->get('id_kelas');
        $id_kamar = session()->get('id_kamar');
        $semuaKamar = $this->kamarModel->findAll();
        $semuaKelas = $this->kelasModel->findAll();
        $semuaHistoriKelas = $this->historiKelasSiswaModel->getAllByAdmin($id_kelas);
        $semuaHistoriKamar = $this->historiKamarSiswaModel->getAllByAdmin($id_kamar);
        $data = [
            'judul' => 'Histori Santri',
            'semuaKelas' => $semuaKelas,
            'semuaKamar' => $semuaKamar,
            'semuaHistoriKelas' => $semuaHistoriKelas,
            'semuaHistoriKamar' => $semuaHistoriKamar,
        ];
        return view('histori/v_histori', $data);
    }

    public function set_id_kelas()
    {
        $id_kelas = $this->request->getVar('id_kelas');
        session()->set('id_kelas', $id_kelas);
        return redirect()->to('/admin/histori');
    }

    public function kelas_excel()
    {
        $id_kelas = $this->request->getVar('id_kelas');
        $semuaHistoriKelasSiswa = $this->historiKelasSiswaModel->getAllByAdmin($id_kelas);
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'Laporan Histori Perpindahan Kelas Santri '.date('Y'));
        $activeWorksheet->mergeCells('A1:E1');
        $activeWorksheet->getStyle('A1')->getFont()->setBold(true);
        $activeWorksheet->setCellValue('A3', 'No');
        $activeWorksheet->setCellValue('B3', 'Nama');
        $activeWorksheet->setCellValue('C3', 'Kelas');
        $activeWorksheet->setCellValue('D3', 'Keterangan');
        $activeWorksheet->setCellValue('E3', 'Tanggal');

        $column = 4;
        foreach ($semuaHistoriKelasSiswa as $ss) {
            $activeWorksheet->setCellValue('A'.$column ,($column-3));
            $activeWorksheet->setCellValue('B'.$column , $ss['nama_siswa']);
            $activeWorksheet->setCellValue('C'.$column , $ss['nama_kelas']);
            $activeWorksheet->setCellValue('D'.$column , $ss['keterangan']);
            $activeWorksheet->setCellValue('E'.$column , tanggal_indo($ss['created_at']));
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
        $activeWorksheet->getStyle('A3:E'.($column-1))->applyFromArray($styleArray);

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

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=laporan_perpindahan_kelas.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }

    public function kelas_pdf()
    {
        $id_kelas = $this->request->getVar('id_kelas');
        $semuaHistoriKelasSiswa = $this->historiKelasSiswaModel->getAllByAdmin($id_kelas);
       
        $options = new Options();
        $dompdf = new Dompdf($options);
        $data = array(
            'title_pdf' => 'Laporan Histori Perpindahan Kelas',
            'semuaHistoriKelasSiswa' => $semuaHistoriKelasSiswa,
        );
        $filename = 'laporan_histori_perpindahan_kelas';
        $html = view('histori/v_cetak_rekap_histori_kelas', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4','portrait');
        $dompdf->render();
        $dompdf->stream($filename, array("Attachment" => false));
        exit();
    }

    // 
    public function set_id_kamar()
    {
        $id_kamar = $this->request->getVar('id_kamar');
        session()->set('id_kamar', $id_kamar);
        return redirect()->to('/admin/histori');
    }

    public function kamar_excel()
    {
        $id_kamar = $this->request->getVar('id_kamar');
        $semuaHistorikamarSiswa = $this->historiKamarSiswaModel->getAllByAdmin($id_kamar);

        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'Laporan Histori Perpindahan Kamar Santri '.date('Y'));
        $activeWorksheet->mergeCells('A1:E1');
        $activeWorksheet->getStyle('A1')->getFont()->setBold(true);
        $activeWorksheet->setCellValue('A3', 'No');
        $activeWorksheet->setCellValue('B3', 'Nama');
        $activeWorksheet->setCellValue('C3', 'Kamar');
        $activeWorksheet->setCellValue('D3', 'Keterangan');
        $activeWorksheet->setCellValue('E3', 'Tanggal');

        $column = 4;
        foreach ($semuaHistorikamarSiswa as $ss) {
            $activeWorksheet->setCellValue('A'.$column ,($column-3));
            $activeWorksheet->setCellValue('B'.$column , $ss['nama_siswa']);
            $activeWorksheet->setCellValue('C'.$column , $ss['nama_kamar']);
            $activeWorksheet->setCellValue('D'.$column , $ss['keterangan']);
            $activeWorksheet->setCellValue('E'.$column , tanggal_indo($ss['created_at']));
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
        $activeWorksheet->getStyle('A3:E'.($column-1))->applyFromArray($styleArray);

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

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=laporan_perpindahan_kamar.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }

    public function kamar_pdf()
    {
        $id_kamar = $this->request->getVar('id_kamar');
        $semuaHistorikamarSiswa = $this->historiKamarSiswaModel->getAllByAdmin($id_kamar);
       
        $options = new Options();
        $dompdf = new Dompdf($options);
        $data = array(
            'title_pdf' => 'Laporan Histori Perpindahan Kamar',
            'semuaHistorikamarSiswa' => $semuaHistorikamarSiswa,
        );
        $filename = 'laporan_histori_perpindahan_kamar';
        $html = view('histori/v_cetak_rekap_histori_kamar', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4','portrait');
        $dompdf->render();
        $dompdf->stream($filename, array("Attachment" => false));
        exit();
    }
}
