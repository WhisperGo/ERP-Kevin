<?php

namespace App\Controllers;

use App\Models\Universal\M_siswa;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Data_pengguna extends BaseController
{

    public function edit($user)
    {
        if (session()->get('level') == 1 ||  session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4 || session()->get('level') == 5 || session()->get('level') == 6) {
            $model = new M_siswa();
            $data['title'] = 'Data Pengguna';
            $data['c'] = $model->tampil('jenjang');
            $data['jur'] = $model->tampil('jurusan');
            $where = array('user' => $user);
            $where2 = array('id_user' => $user);
            $data['jojo'] = $model->getWhere('siswa', $where);
            $data['rizkan'] = $model->getWhere('user', $where2);

            $previousUrl = previous_url(true)->getPath();
            session()->set('previous_url', $previousUrl);

            echo view('partial/header_datatable', $data);
            echo view('data_pengguna/edit', $data);
            echo view('partial/footer_datatable');
        } else {
            return redirect()->to('login');
        }
    }
    public function aksi_edit()
    {
        if (session()->get('level') == 1 ||  session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4 || session()->get('level') == 5 || session()->get('level') == 6) {
            $id = $this->request->getPost('id');
            $id2 = $this->request->getPost('id2');
            $foto = $this->request->getFile('foto');

            $previousUrl = session()->get('previous_url');

            $imageName = null;
            $passwordName = null;
            $passwordName = $this->request->getPost('password');

            if ($foto && $foto->isValid() && !$foto->hasMoved()) {
                $imageName = $foto->getName();
                $foto->move('images/', $imageName);
            }

            $where = array('id_user' => $id);

            if ($imageName) {
                $data1['foto'] = $imageName;
                $data1['updated_at'] = date('Y-m-d H:i:s');
            }

            if ($passwordName) {
                $data1['password'] = md5($passwordName);
                $data1['updated_at'] = date('Y-m-d H:i:s');
            }

            $darrel = new M_siswa();
            $darrel->qedit('user', $data1, $where);

            if ($passwordName) {
                return redirect()->to('login/log_out');
            } else {
                return redirect()->to($previousUrl);
            }
        } else {
            return redirect()->to('login');
        }
    }
}
