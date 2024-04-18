<?php

namespace App\Controllers\landing_page_erp;

use App\Models\landing_page_erp\M_model;

class Home extends BaseController
{
    protected function isLoggedIn()
    {
        return session()->has('id');
    }

    public function index()
    {
        if ($this->isLoggedIn()) {
            return redirect()->to('landing_page_erp/home/dashboard');
        }
        // $data['title']='Login | ERP - SPH';
        // echo view ('partial_login/header_login', $data);
        echo view('landing_page_erp/login');
        // echo view('partial_login/footer_login');
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
            session()->set('jenjang', $cek['jenjang']);
            return redirect()->to('landing_page_erp/Home/dashboard');
        }else {
            return redirect()->to('landing_page_erp');
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('landing_page_erp');
    }
    public function dashboard()
    {
        if(session()->get('id')>0) {
            echo view('landing_page_erp/dashboard');
        }else{
            return redirect()->to('landing_page_erp');
        }
    }
}