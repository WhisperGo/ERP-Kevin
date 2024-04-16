<?php

namespace App\Controllers;
use App\Models\M_login;

class Master extends BaseController
{
    
    public function index()
    {
        if(session()->get('id')>0) {
           $model=new M_login();
           $id=session()->get('id');
           $on='user.level=level.id_level';
           $where=array('user.id_user'=>$id);
           $data['jojo']=$model->joinlogin('user', 'level', $on, $where);
           $data['title']='Dashboard';

           echo view('partial_dashboard/header_dashboard', $data);
           echo view('partial/top_menu');
           echo view('partial/side_menu2');
       
           echo view('login/dashboard', $data);
           echo view('partial_dashboard/footer_dashboard');

       }else{
        return redirect()->to('login');
    }
}

}