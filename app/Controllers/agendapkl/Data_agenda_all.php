<?php

namespace App\Controllers\Agendapkl;

use App\Models\agendapkl\M_agenda;
use Dompdf\Dompdf;

class Data_agenda_all extends BaseController
{

    public function index()
    {
        if (session()->get('level') == 3 && session()->get('jabatan') == 2) {
            $model = new M_agenda();

            $data['title'] = 'Data Agenda';

            echo view('agendapkl/partial/header_datatable', $data);
            echo view('agendapkl/partial/side_menu');
            echo view('agendapkl/partial/top_menu');
            echo view('agendapkl/data_agenda_all/menu', $data);
            echo view('agendapkl/partial/footer_datatable');
        } else {
            return redirect()->to('landing_page_erp');
        }
    }

    public function rpl()
    {
        if (session()->get('level') == 3 && session()->get('jabatan') == 2) {
            $model = new M_agenda();

            $data['jojo'] = $model->tampil_rpl('siswa');
            $data['title'] = 'Data Agenda';

            echo view('agendapkl/partial/header_datatable', $data);
            echo view('agendapkl/partial/side_menu');
            echo view('agendapkl/partial/top_menu');
            echo view('agendapkl/data_agenda_all/view', $data);
            echo view('agendapkl/partial/footer_datatable');
        } else {
            return redirect()->to('landing_page_erp');
        }
    }

    public function bdp()
    {
        if (session()->get('level') == 3 && session()->get('jabatan') == 2) {
            $model = new M_agenda();

            $data['jojo'] = $model->tampil_bdp('siswa');
            $data['title'] = 'Data Agenda';

            echo view('agendapkl/partial/header_datatable', $data);
            echo view('agendapkl/partial/side_menu');
            echo view('agendapkl/partial/top_menu');
            echo view('agendapkl/data_agenda_all/view', $data);
            echo view('agendapkl/partial/footer_datatable');
        } else {
            return redirect()->to('landing_page_erp');
        }
    }

    public function akl()
    {
        if (session()->get('level') == 3 && session()->get('jabatan') == 2) {
            $model = new M_agenda();

            $data['jojo'] = $model->tampil_akl('siswa');
            $data['title'] = 'Data Agenda';

            echo view('agendapkl/partial/header_datatable', $data);
            echo view('agendapkl/partial/side_menu');
            echo view('agendapkl/partial/top_menu');
            echo view('agendapkl/data_agenda_all/view', $data);
            echo view('agendapkl/partial/footer_datatable');
        } else {
            return redirect()->to('landing_page_erp');
        }
    }

    public function detail($id)
    {
        if (session()->get('level') == 3 && session()->get('jabatan') == 2) {
            $model = new M_agenda();

            $wheree = array('siswa' => $id);
            $m = $model->getWhere2('data_agenda', $wheree);
            $iduser = $m['user'];
            $where = array('siswa.user' => $iduser);

            session()->set('id_balik_agenda_all', $id);

            $on = 'data_agenda.siswa=siswa.user';
            $data['jojo'] = $model->join2w('data_agenda', 'siswa', $on, $wheree);
            $data['title'] = 'Data Agenda';

            echo view('agendapkl/partial/header_datatable', $data);
            echo view('agendapkl/partial/side_menu');
            echo view('agendapkl/partial/top_menu');
            echo view('agendapkl/data_agenda_all/detail', $data);
            echo view('agendapkl/partial/footer_datatable');
        } else {
            return redirect()->to('landing_page_erp');
        }
    }

    public function agenda($id)
    {
        if (session()->get('level') == 3 && session()->get('jabatan') == 2) {
            $model = new M_agenda();

            $wheree = array('id_agenda' => $id);
            $m = $model->getWhere2('data_agenda', $wheree);
            $iduser = $m['id_agenda'];
            $where = array('data_agenda.id_agenda' => $iduser);

            $on = 'data_agenda.siswa=siswa.user';
            $data['jojo'] = $model->join2w('data_agenda', 'siswa', $on, $wheree);
            $data['title'] = 'Data Agenda';

            echo view('agendapkl/partial/header_datatable', $data);
            echo view('agendapkl/partial/side_menu');
            echo view('agendapkl/partial/top_menu');
            echo view('agendapkl/data_agenda_all/agenda', $data);
            echo view('agendapkl/partial/footer_datatable');
        } else {
            return redirect()->to('landing_page_erp');
        }
    }

    public function approve_g($id)
    {
        if (session()->get('level') == 3 && session()->get('jabatan') == 2) {
            date_default_timezone_set('Asia/Jakarta');

            $model = new M_agenda();

            $where2 = array('id_agenda' => $id);
            $data2 = array(
                'approve_g' => '1'
            );
            $model->qedit('data_agenda', $data2, $where2);
            return redirect()->to('agendapkl/data_agenda_all/detail/' . session()->get('id_balik_agenda_all'));
        } else {
            return redirect()->to('landing_page_erp');
        }
    }

    // public function create()
    // {
    //     if (session()->get('level') == 3 && session()->get('jabatan') == 2) {
    //         $model = new M_agenda();
    //         $data['title'] = 'Data Agenda';
    //         echo view('agendapkl/partial/header_datatable', $data);
    //         echo view('agendapkl/partial/side_menu');
    //         echo view('agendapkl/partial/top_menu');
    //         echo view('agendapkl/data_agenda/create', $data);
    //         echo view('agendapkl/partial/footer_datatable');
    //     } else {
    //         return redirect()->to('landing_page_erp');
    //     }
    // }

    // public function aksi_create()
    // {
    //     if (session()->get('level') == 3 && session()->get('jabatan') == 2) {
    //         $a = $this->request->getPost('jam_masuk');
    //         $b = $this->request->getPost('jam_keluar');
    //         $renper1 = $this->request->getPost('rencana1');
    //         $renper2 = $this->request->getPost('rencana2');
    //         $renper3 = $this->request->getPost('rencana3');
    //         $renper4 = $this->request->getPost('rencana4');
    //         $renper5 = $this->request->getPost('rencana5');
    //         $reape1 = $this->request->getPost('realisasi1');
    //         $reape2 = $this->request->getPost('realisasi2');
    //         $reape3 = $this->request->getPost('realisasi3');
    //         $reape4 = $this->request->getPost('realisasi4');
    //         $reape5 = $this->request->getPost('realisasi5');
    //         $pk1 = $this->request->getPost('penugasan1');
    //         $pk2 = $this->request->getPost('penugasan2');
    //         $pk3 = $this->request->getPost('penugasan3');
    //         date_default_timezone_set('Asia/Jakarta');

    //         $model = new M_agenda();

    //         //Yang ditambah ke agenda
    //         $data2 = array(
    //             'siswa' => session()->get('id'),
    //             'tanggal' => date('Y-m-d H:i:s'),
    //             'jam_masuk' => $a,
    //             'jam_keluar' => $b,
    //             'renper_1' => $renper1,
    //             'renper_2' => $renper2,
    //             'renper_3' => $renper3,
    //             'renper_4' => $renper4,
    //             'renper_5' => $renper5,
    //             'reape_1' => $reape1,
    //             'reape_2' => $reape2,
    //             'reape_3' => $reape3,
    //             'reape_4' => $reape4,
    //             'reape_5' => $reape5,
    //             'pk_1' => $pk1,
    //             'pk_2' => $pk2,
    //             'pk_3' => $pk3,
    //             'user_create' => session()->get('id'),
    //             'created_at' => date('Y-m-d H:i:s')
    //         );
    //         $model->simpan('data_agenda', $data2);
    //         echo view('agendapkl/partial/header_datatable');
    //         echo view('agendapkl/partial/side_menu');
    //         echo view('agendapkl/partial/top_menu');
    //         echo view('agendapkl/partial/footer_datatable');
    //         return redirect()->to('agendapkl/data_agenda');
    //     } else {
    //         return redirect()->to('landing_page_erp');
    //     }
    // }
    // public function edit($id)
    // {
    //     if (session()->get('level') == 3 && session()->get('jabatan') == 2) {
    //         $model = new M_agenda();
    //         $where = array('id_agenda' => $id);
    //         $data['jojo'] = $model->getWhere('data_agenda', $where);
    //         $data['title'] = 'Data Agenda';
    //         echo view('agendapkl/partial/header_datatable', $data);
    //         echo view('agendapkl/partial/side_menu');
    //         echo view('agendapkl/partial/top_menu');
    //         echo view('agendapkl/data_agenda/edit', $data);
    //         echo view('agendapkl/partial/footer_datatable');
    //     } else {
    //         return redirect()->to('landing_page_erp');
    //     }
    // }

    // public function aksi_edit()
    // {
    //     if (session()->get('level') == 3 && session()->get('jabatan') == 2) {
    //         $pm1 = $this->request->getPost('pm1');
    //         $pm2 = $this->request->getPost('pm2');
    //         $pm3 = $this->request->getPost('pm3');
    //         $senyum = $this->request->getPost('senyum');
    //         $keramahan = $this->request->getPost('keramahan');
    //         $penampilan = $this->request->getPost('penampilan');
    //         $komunikasi = $this->request->getPost('komunikasi');
    //         $realisasi_kerja = $this->request->getPost('realisasi_kerja');
    //         $catatan1 = $this->request->getPost('catatan1');
    //         $catatan2 = $this->request->getPost('catatan2');
    //         $catatan3 = $this->request->getPost('catatan3');
    //         $id = $this->request->getPost('id');
    //         date_default_timezone_set('Asia/Jakarta');

    //         $model = new M_agenda();

    //         //Yang ditambah ke karyawan
    //         $where = array('id_agenda' => $id);
    //         $data2 = array(
    //             'pm_1' => $pm1,
    //             'pm_2' => $pm2,
    //             'pm_3' => $pm3,
    //             'senyum' => $senyum,
    //             'keramahan' => $keramahan,
    //             'penampilan' => $penampilan,
    //             'komunikasi' => $komunikasi,
    //             'realisasi_kerja' => $realisasi_kerja,
    //             'catatan_1' => $catatan1,
    //             'catatan_2' => $catatan2,
    //             'catatan_3' => $catatan3,
    //             'user_update' => session()->get('id'),
    //             'updated_at' => date('Y-m-d H:i:s')
    //         );

    //         $model->qedit('data_agenda', $data2, $where2);
    //         return redirect()->to('agendapkl/data_agenda');
    //     } else {
    //         return redirect()->to('landing_page_erp');
    //     }
    // }
    // public function delete($id)
    // {
    //     if (session()->get('level') == 3 && session()->get('jabatan') == 2) {
    //         $model = new M_agenda();
    //         $where = array('id_agenda' => $id);

    //         $data = array(
    //             'user_delete' => session()->get('id'),
    //             'deleted_at' => date('Y-m-d H:i:s')
    //         );

    //         $model->qedit('data_agenda', $data, $where);
    //         return redirect()->to('agendapkl/data_agenda');
    //     } else {
    //         return redirect()->to('landing_page_erp');
    //     }
    // }

    // ==========================================================================================

    public function menu_print_agenda_all()
    {
        if (session()->get('level') == 3) {
            $model = new M_agenda();

            $title['title'] = 'Menu Agenda';

            echo view('agendapkl/partial/header_datatable', $title);
            echo view('agendapkl/partial/side_menu');
            echo view('agendapkl/partial/top_menu');
            echo view('agendapkl/data_agenda_all/menu_jurusan_print');
            echo view('agendapkl/partial/footer_datatable');
        } else {
            return redirect()->to('landing_page_erp');
        }
    }

    public function menu_print_rpl()
    {
        if (session()->get('level') == 3 && session()->get('jabatan') == 2) {
            $model = new M_agenda();

            $data['nama'] = $model->tampil_rpl('siswa');
            $title['title'] = 'Menu Agenda RPL';

            echo view('agendapkl/partial/header_datatable', $title);
            echo view('agendapkl/partial/side_menu');
            echo view('agendapkl/partial/top_menu');
            echo view('agendapkl/data_agenda_all/menu_print', $data);
            echo view('agendapkl/partial/footer_datatable');
        } else {
            return redirect()->to('landing_page_erp');
        }
    }

    public function menu_print_bdp()
    {
        if (session()->get('level') == 3 && session()->get('jabatan') == 2) {
            $model = new M_agenda();

            $data['nama'] = $model->tampil_bdp('siswa');
            $title['title'] = 'Menu Agenda BDP';

            echo view('agendapkl/partial/header_datatable', $title);
            echo view('agendapkl/partial/side_menu');
            echo view('agendapkl/partial/top_menu');
            echo view('agendapkl/data_agenda_all/menu_print', $data);
            echo view('agendapkl/partial/footer_datatable');
        } else {
            return redirect()->to('landing_page_erp');
        }
    }

    public function menu_print_akl()
    {
        if (session()->get('level') == 3 && session()->get('jabatan') == 2) {
            $model = new M_agenda();

            $data['nama'] = $model->tampil_akl('siswa');
            $title['title'] = 'Menu Agenda AKL';

            echo view('agendapkl/partial/header_datatable', $title);
            echo view('agendapkl/partial/side_menu');
            echo view('agendapkl/partial/top_menu');
            echo view('agendapkl/data_agenda_all/menu_print', $data);
            echo view('agendapkl/partial/footer_datatable');
        } else {
            return redirect()->to('landing_page_erp');
        }
    }

    public function export_pdf()
    {
        if (session()->get('level') == 3 && session()->get('jabatan') == 2) {
            $model = new M_agenda();

            $idSiswa = $this->request->getPost('nama');
            $awal = $this->request->getPost('awal');
            $akhir = $this->request->getPost('akhir');

            // Get data absensi kantor berdasarkan filter
            $data['agenda'] = $model->getDataByFilter($idSiswa, $awal, $akhir);

            // Load the dompdf library
            $dompdf = new Dompdf();

            // Set the HTML content for the PDF
            $data['title'] = 'Agenda PKL';
            $dompdf->loadHtml(view('agendapkl/data_agenda_all/print_pdf_view', $data));
            $dompdf->setPaper('A4', 'potrait');
            $dompdf->render();
            $dompdf->stream('agenda_pkl.pdf', ['Attachment' => 0]);
        } else {
            return redirect()->to('landing_page_erp');
        }
    }

    public function cek_pdf()
    {
        if (session()->get('level') == 3 && session()->get('jabatan') == 2) {
            $model = new M_agenda();

            $id = $this->request->getPost('id_agenda');
            // Get data absensi kantor berdasarkan filter
            $data['agenda'] = $model->getDataByFilter2($id);

            // Load the dompdf library
            $dompdf = new Dompdf();

            // Set the HTML content for the PDF
            $data['title'] = 'Agenda PKL';
            $dompdf->loadHtml(view('agendapkl/data_agenda_all/print_pdf_view', $data));
            $dompdf->setPaper('A4', 'potrait');
            $dompdf->render();
            $dompdf->stream('agenda_pkl.pdf', ['Attachment' => 0]);
        } else {
            return redirect()->to('landing_page_erp');
        }
    }
}
