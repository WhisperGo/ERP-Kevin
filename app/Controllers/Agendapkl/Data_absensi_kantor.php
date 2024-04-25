<?php

namespace App\Controllers\Agendapkl;

use App\Models\Agendapkl\M_absensi_kantor;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Data_absensi_kantor extends BaseController
{

    public function index()
    {
        if (session()->get('level') == 6) {
            $model = new M_absensi_kantor();

            $idInstruktur = session()->get('id');
            $data['jojo'] = $model->tampil_siswa('siswa', $idInstruktur);
            $data['title'] = 'Data Absensi Kantor';

            echo view('agendapkl/partial/header_datatable', $data);
            echo view('agendapkl/partial/side_menu');
            echo view('agendapkl/partial/top_menu');
            echo view('agendapkl/data_absensi_kantor/view', $data);
            echo view('agendapkl/partial/footer_datatable');
        } else {
            return redirect()->to('landing_page_erp');
        }
    }

    public function detail($id)
    {
        if (session()->get('level') == 4 || session()->get('level') == 5 || session()->get('level') == 6) {
            $model = new M_absensi_kantor();

            $wheree = array('siswa' => $id);
            $m = $model->getWhere2('data_absensi_kantor', $wheree);
            $iduser = $m['user'];
            $where = array('siswa.user' => $iduser);

            $on = 'data_absensi_kantor.siswa=siswa.user';
            $on2 = 'data_absensi_kantor.keterangan=data_keterangan.id_keterangan';
            $data['jojo'] = $model->join3w('data_absensi_kantor', 'siswa', 'data_keterangan', $on, $on2, $wheree);
            $data['title'] = 'Data Absensi Kantor';

            session()->set('id_balik_absensi_kantor', $id);

            echo view('agendapkl/partial/header_datatable', $data);
            echo view('agendapkl/partial/side_menu');
            echo view('agendapkl/partial/top_menu');
            echo view('agendapkl/data_absensi_kantor/detail', $data);
            echo view('agendapkl/partial/footer_datatable');
        } else {
            return redirect()->to('landing_page_erp');
        }
    }

    public function create()
    {
        if (session()->get('level') == 6) {
            $model = new M_absensi_kantor();
            $data['keterangan'] = $model->tampil('data_keterangan');
            $data['title'] = 'Data Absensi Kantor';
            echo view('agendapkl/partial/header_datatable', $data);
            echo view('agendapkl/partial/side_menu');
            echo view('agendapkl/partial/top_menu');
            echo view('agendapkl/data_absensi_kantor/create', $data);
            echo view('agendapkl/partial/footer_datatable');
        } else {
            return redirect()->to('landing_page_erp');
        }
    }

    public function aksi_create()
    {
        if (session()->get('level') == 6) {
            $c = $this->request->getPost('keterangan');
            date_default_timezone_set('Asia/Jakarta');

            $model = new M_absensi_kantor();

            //Yang ditambah ke agenda
            $data2 = array(
                'siswa' => session()->get('id_balik_absensi_kantor'),
                'tanggal' => date('Y-m-d H:i:s'),
                'keterangan' => $c,
            );
            $model->simpan('data_absensi_kantor', $data2);
            echo view('agendapkl/partial/header_datatable');
            echo view('agendapkl/partial/side_menu');
            echo view('agendapkl/partial/top_menu');
            echo view('agendapkl/partial/footer_datatable');
            return redirect()->to('agendapkl/data_absensi_kantor/detail/' . session()->get('id_balik_absensi_kantor'));
        } else {
            return redirect()->to('landing_page_erp');
        }
    }

    public function create_all()
    {
        if (session()->get('level') == 6) {
            $model = new M_absensi_kantor();
            $idInstruktur = session()->get('id');
            $data['siswa'] = $model->tampil_siswa('siswa', $idInstruktur);
            $data['keterangan'] = $model->tampil('data_keterangan');
            $data['title'] = 'Data Absensi Kantor';
            echo view('agendapkl/partial/header_datatable', $data);
            echo view('agendapkl/partial/side_menu');
            echo view('agendapkl/partial/top_menu');
            echo view('agendapkl/data_absensi_kantor/create_all', $data);
            echo view('agendapkl/partial/footer_datatable');
        } else {
            return redirect()->to('landing_page_erp');
        }
    }

    public function aksi_create_all()
    {
        if (session()->get('level') == 6) {
            date_default_timezone_set('Asia/Jakarta');

            $model = new M_absensi_kantor();

            // Get the array of submitted user and keterangan
            $userSiswaArray = $this->request->getPost('user_siswa');
            $keteranganArray = $this->request->getPost('keterangan');

            // Looping untuk mengambil data absensi setiap siswa dan menyimpannya ke database
            foreach ($userSiswaArray as $index => $idSiswa) {
                $keterangan = !empty($keteranganArray[$index]) ? $keteranganArray[$index] : 4; // Set default value to 4 if keterangan is empty

                // Yang ditambah ke agenda
                $data2 = array(
                    'siswa' => $idSiswa,
                    'tanggal' => date('Y-m-d H:i:s'),
                    'keterangan' => $keterangan,
                );
                $model->simpan('data_absensi_kantor', $data2);
            }

            return redirect()->to('agendapkl/data_absensi_kantor');
        } else {
            return redirect()->to('landing_page_erp');
        }
    }

    public function edit($id)
    {
        if (session()->get('level') == 6) {
            $model = new M_absensi_kantor();
            $data['keterangan'] = $model->tampil('data_keterangan');
            $where = array('id_absensi' => $id);
            $data['jojo'] = $model->getWhere('data_absensi_kantor', $where);
            $data['title'] = 'Data Absensi Kantor';
            echo view('agendapkl/partial/header_datatable', $data);
            echo view('agendapkl/partial/side_menu');
            echo view('agendapkl/partial/top_menu');
            echo view('agendapkl/data_absensi_kantor/edit', $data);
            echo view('agendapkl/partial/footer_datatable');
        } else {
            return redirect()->to('landing_page_erp');
        }
    }

    public function aksi_edit()
    {
        if (session()->get('level') == 6) {
            $c = $this->request->getPost('keterangan');
            $id = $this->request->getPost('id');
            date_default_timezone_set('Asia/Jakarta');

            $model = new M_absensi_kantor();

            //Yang ditambah ke karyawan
            $where = array('id_absensi' => $id);
            $data2 = array(
                'siswa' => session()->get('id_balik_absensi_kantor'),
                'keterangan' => $c,
                'updated_at' => date('Y-m-d H:i:s')
            );

            $model->qedit('data_absensi_kantor', $data2, $where);
            return redirect()->to('agendapkl/data_absensi_kantor/detail/' . session()->get('id_balik_absensi_kantor'));
        } else {
            return redirect()->to('landing_page_erp');
        }
    }
    public function delete($id)
    {
        if (session()->get('level') == 6) {
            $model = new M_absensi_kantor();
            $where = array('id_absensi' => $id);

            $data = array(
                'deleted_at' => date('Y-m-d H:i:s')
            );

            $model->qedit('data_absensi_kantor', $data, $where);
            return redirect()->to('agendapkl/data_absensi_kantor/detail/' . session()->get('id_balik_absensi_kantor'));
        } else {
            return redirect()->to('landing_page_erp');
        }
    }

    //=========================================================================================================

    public function menu_print_absensi_kantor()
    {
        if (session()->get('level') == 6) {
            $model = new M_absensi_kantor();

            $idInstruktur = session()->get('id');
            $data['nama'] = $model->tampil_siswa('siswa', $idInstruktur);
            $title['title'] = 'Menu Absensi';

            echo view('agendapkl/partial/header_datatable', $title);
            echo view('agendapkl/partial/side_menu');
            echo view('agendapkl/partial/top_menu');
            echo view('agendapkl/data_absensi_kantor/menu_print', $data);
            echo view('agendapkl/partial/footer_datatable');
        } else {
            return redirect()->to('landing_page_erp');
        }
    }

    public function export_windows()
    {
        if (session()->get('level') == 6) {
            $model = new M_absensi_kantor();

            $idSiswa = $this->request->getPost('nama');
            $awal = $this->request->getPost('awal');
            $akhir = $this->request->getPost('akhir');

            // Get data absensi kantor berdasarkan filter
            $data['absensi'] = $model->getDataByFilter($idSiswa, $awal, $akhir);
            $title['title'] = 'Laporan Absensi Kantor';
            echo view('agendapkl/partial/header_datatable', $title);
            echo view('agendapkl/data_absensi_kantor/print_windows_view', $data);
            echo view('agendapkl/partial/footer_datatable');
        } else {
            return redirect()->to('landing_page_erp');
        }
    }

    public function export_pdf()
    {
        if (session()->get('level') == 6) {
            $model = new M_absensi_kantor();

            $idSiswa = $this->request->getPost('nama');
            $awal = $this->request->getPost('awal');
            $akhir = $this->request->getPost('akhir');

            // Get data absensi kantor berdasarkan filter
            $data['absensi'] = $model->getDataByFilter($idSiswa, $awal, $akhir);

            // Load the dompdf library
            $dompdf = new Dompdf();

            // Set the HTML content for the PDF
            $data['title'] = 'Laporan Absensi Kantor';
            $dompdf->loadHtml(view('agendapkl/data_absensi_kantor/print_pdf_view', $data));
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $dompdf->stream('laporan_absensi_kantor.pdf', ['Attachment' => 0]);
        } else {
            return redirect()->to('landing_page_erp');
        }
    }

    public function export_excel()
    {
        if (session()->get('level') == 6) {
            $model = new M_absensi_kantor();

            $idSiswa = $this->request->getPost('nama');
            $awal = $this->request->getPost('awal');
            $akhir = $this->request->getPost('akhir');

            $absensi = $model->getDataByFilter($idSiswa, $awal, $akhir);

            $spreadsheet = new Spreadsheet();

            // Get the active worksheet and set the default row height for header row
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->getDefaultRowDimension()->setRowHeight(20);

            // Set the title and period in merged cells
            $sheet->mergeCells('A1:E1');
            $sheet->setCellValue('A1', 'Laporan Absensi Kantor');
            $sheet->mergeCells('A3:D3');
            $sheet->setCellValue('A3', 'Periode: ' . $awal . ' - ' . $akhir);

            // Set the header row values
            $sheet->setCellValueByColumnAndRow(1, 4, 'No');
            $sheet->setCellValueByColumnAndRow(2, 4, 'NIS');
            $sheet->setCellValueByColumnAndRow(3, 4, 'Nama Siswa');
            $sheet->setCellValueByColumnAndRow(4, 4, 'Tanggal');
            $sheet->setCellValueByColumnAndRow(5, 4, 'Keterangan');

            // Fill the data into the worksheet
            $row = 5;
            $no = 1;
            foreach ($absensi as $riz) {
                $sheet->setCellValueByColumnAndRow(1, $row, $no++);
                $sheet->setCellValueByColumnAndRow(2, $row, $riz['nis']);
                $sheet->setCellValueByColumnAndRow(3, $row, $riz['nama_siswa']);
                $sheet->setCellValueByColumnAndRow(4, $row, date('d F Y', strtotime($riz['tanggal'])));
                $sheet->setCellValueByColumnAndRow(5, $row, $riz['nama_keterangan']);

                // Apply background color based on the value of "Keterangan"
                $keterangan = $riz['nama_keterangan'];
                $color = '';
                switch ($keterangan) {
                    case 'Hadir':
                        $color = '92D050'; // Green
                        break;
                    case 'Izin':
                        $color = 'FFC000'; // Yellow
                        break;
                    case 'Sakit':
                        $color = '00B0F0'; // Blue
                        break;
                    case 'Alpa':
                        $color = 'C00000'; // Red
                        break;
                        // Add more cases for other values if needed
                }

                if (!empty($color)) {
                    $sheet->getStyle('E' . $row)->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()->setARGB($color);
                }

                $row++;
            }

            // Apply the Excel styling
            $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('A1')->getFont()->setSize(14)->setBold(true);
            $sheet->getStyle('A3')->getFont()->setBold(true);
            $sheet->getStyle('A1:E1')->getFont()->setBold(true);
            $sheet->getStyle('A1:E1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFFFF00');

            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => 'FF000000'],
                    ],
                ],
            ];

            $lastRow = count($absensi) + 4; // Add 4 for the header rows
            $sheet->getStyle('A4:E' . $lastRow)->applyFromArray($styleArray);

            $sheet->getColumnDimension('A')->setAutoSize(true);
            $sheet->getColumnDimension('B')->setAutoSize(true);
            $sheet->getColumnDimension('C')->setAutoSize(true);
            $sheet->getColumnDimension('D')->setAutoSize(true);
            $sheet->getColumnDimension('E')->setAutoSize(true);

            // Create the Excel writer and save the file
            $writer = new Xlsx($spreadsheet);
            $filename = 'laporan_absensi_kantor.xlsx';
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-Control: max-age=0');
            $writer->save('php://output');
        } else {
            return redirect()->to('landing_page_erp');
        }
    }
}