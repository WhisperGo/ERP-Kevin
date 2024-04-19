<?php

namespace App\Controllers\agendapkl;

use App\Models\agendapkl\M_siswa;

class Data_siswa_all extends BaseController
{
    public function index()
    {
        if (session()->get('level') == 3 || session()->get('jabatan') == 2) {
            $model = new M_siswa();

            $db = \Config\Database::connect();
            $id_user = session()->get('id');
            $query = $db->table('guru')
                ->select('rombel.jurusan') // Pilih kolom jurusan dari tabel rombel
                ->join('rombel', 'rombel.id_rombel = guru.rombel') // Bergabung dengan tabel rombel berdasarkan kolom rombel pada tabel guru dan id_rombel pada tabel rombel
                ->where('guru.user', $id_user) // Sesuaikan pengecekan berdasarkan kolom user pada tabel guru
                ->get();

            if ($query->getNumRows() > 0) {
                $row = $query->getRow();
                $jurusan = $row->jurusan;

                $on2 = 'siswa.instruktur=data_instruktur.id_instruktur';
                $on3 = 'siswa.jurusan=jurusan.id_jurusan';
                $data['jojo'] = $model->join3w('siswa', 'data_instruktur', 'jurusan', $on2, $on3, $jurusan);
                $data['title'] = 'Data Siswa';

                echo view('agendapkl/partial/header_datatable', $data);
                echo view('partial/side_menu2');
                echo view('agendapkl/partial/top_menu');
                echo view('agendapkl/data_siswa_all/view', $data);
                echo view('agendapkl/partial/footer_datatable');
            } else {
                return redirect()->to('landing_page_erp');
            }
        }
    }

    public function edit($id)
    {
        if (session()->get('level') == 3 || session()->get('jabatan') == 2) {
            $model = new M_siswa();
            $where = array('user' => $id);
            $where2 = array('id_user' => $id);
            $data['jojo'] = $model->getWhere('siswa', $where);
            $data['rizkan'] = $model->getWhere('user', $where2);
            $data['instruktur'] = $model->tampil('data_instruktur');
            $data['title'] = 'Data Siswa';
            echo view('agendapkl/partial/header_datatable', $data);
            echo view('partial/side_menu2');
            echo view('agendapkl/partial/top_menu');
            echo view('agendapkl/data_siswa_all/edit', $data);
            echo view('agendapkl/partial/footer_datatable');
        } else {
            return redirect()->to('landing_page_erp');
        }
    }

    public function aksi_edit()
    {
        if (session()->get('level') == 3 || session()->get('jabatan') == 2) {
            $n = $this->request->getPost('instruktur');
            $id = $this->request->getPost('id');
            $id2 = $this->request->getPost('id2');
            date_default_timezone_set('Asia/Jakarta');

            $model = new M_siswa();

            //Yang ditambah ke karyawan
            $where2 = array('id_siswa' => $id2);
            $data2 = array(
                'instruktur' => $n,
                'updated_at' => date('Y-m-d H:i:s')
            );

            $model->qedit('siswa', $data2, $where2);
            return redirect()->to('agendapkl/data_siswa_all');
        } else {
            return redirect()->to('landing_page_erp');
        }
    }
}
