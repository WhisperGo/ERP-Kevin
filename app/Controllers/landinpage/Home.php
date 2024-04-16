<?php

namespace App\Controllers\landinpage;

use App\Models\landinpage\M_model;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Home extends BaseController
{
    protected function isLoggedIn()
    {
        return session()->has('id');
    }

    public function index()
    {
        if ($this->isLoggedIn()) {
            return redirect()->to('landinpage/home/dashboard');
        }
        // echo view('landinpage/header');
        // echo view('landinpage/menu');
        echo view('landinpage/login');
        // echo view('landinpage/footer');
    }

    public function aksi_login()
    {
        $u=$this->request->getPost('username');
        $p=$this->request->getPost('password');
        $model= new M_model();
        $data=array(
            'username'=>$u,
            'password'=>md5($p)

        );
        $cek=$model->getWhere2('user', $data);
        if ($cek>0) {
            session()->set('id', $cek['id_user']);
            session()->set('username', $cek['username']);
            session()->set('level', $cek['level']);
            session()->set('nama', $cek['nama']);
            return redirect()->to('landinpage/Home/dashboard');
        }else {
            return redirect()->to('landinpage/Home');
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('landinpage/Home');
    }
    public function dashboard()
    {
        if(session()->get('id')>0) {
            echo view('landinpage/dashboard');
        }else{
            return redirect()->to('landinpage/Home');
        }
    }
}