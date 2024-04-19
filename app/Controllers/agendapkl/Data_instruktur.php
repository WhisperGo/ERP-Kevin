<?php

namespace App\Controllers\agendapkl;
use App\Models\agendapkl\M_instruktur;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Data_instruktur extends BaseController
{
    public function index()
    {
     if(session()->get('level')== 1 || session()->get('level')==2 || session()->get('level')==3 && session()->get('jabatan')==2 ) {
        $model=new M_instruktur();
        $data['jojo']=$model->tampil('data_instruktur');
        $data['title']='Data Instruktur';
        echo view('agendapkl/partial/header_datatable', $data);
        echo view('partial/side_menu2');
        echo view('agendapkl/partial/top_menu');
        echo view('agendapkl/data_instruktur/view', $data);
        echo view('agendapkl/partial/footer_datatable');
    }else {
        return redirect()->to('landing_page_erp');
    }
}

public function create()
{
    if(session()->get('level')== 1 || session()->get('level')==2 || session()->get('level')==3 && session()->get('jabatan')==2 ) {
        $model=new M_instruktur();
        $data['title']='Data Instruktur';
        echo view('agendapkl/partial/header_datatable', $data);
        echo view('partial/side_menu2');
        echo view('agendapkl/partial/top_menu');
        echo view('agendapkl/data_instruktur/create', $data); 
        echo view('agendapkl/partial/footer_datatable');
    }else {
        return redirect()->to('landing_page_erp');
    }
}

public function aksi_create()
{ 
    if(session()->get('level')== 1 || session()->get('level')==2 || session()->get('level')==3 && session()->get('jabatan')==2 ) {
        $a= $this->request->getPost('username');
        $b= $this->request->getPost('password');
        $d= $this->request->getPost('nama');
        $e= $this->request->getPost('nama_pt');
        $g= $this->request->getPost('telepon');
        date_default_timezone_set('Asia/Jakarta');
        
        $foto= $this->request->getFile('foto');
        if($foto && $foto->isValid() && ! $foto->hasMoved())
        {
            $imageName = $foto->getName();
            $foto->move('images/',$imageName);
        }else{
            $imageName='default.png';
        }

        //Yang ditambah ke user
        $data1=array(
            'username'=>$a,
            'password'=>md5($b),
            'foto'=>$imageName,
            'level'=>6,
        );

        $model=new M_instruktur();
        $model->simpan('user', $data1);
        $where=array('username'=>$a);

        $m=$model->getWhere2('user', $where);
        $iduser = $m['id_user'];

        //Yang ditambah ke karyawan
        $data2=array(
            'nama_instruktur'=>$d,
            'nama_perusahaan'=>$e,
            'telepon'=>$g,
            'user'=>$iduser,
        );
        $model->simpan('data_instruktur', $data2);
        return redirect()->to('agendapkl/data_instruktur');
    }else {
        return redirect()->to('landing_page_erp');
    }
}
public function edit($id)
{ 
    if(session()->get('level')== 1 || session()->get('level')==2 || session()->get('level')==3 && session()->get('jabatan')==2 ) {
        $model=new M_instruktur();
        $where=array('user'=>$id);
        $where2=array('id_user'=>$id);
        $data['jojo']=$model->getWhere('data_instruktur',$where);
        $data['rizkan']=$model->getWhere('user',$where2);
        $data['title']='Data Instruktur';
        echo view('agendapkl/partial/header_datatable', $data);
        echo view('partial/side_menu2');
        echo view('agendapkl/partial/top_menu');
        echo view('agendapkl/data_instruktur/edit',$data);
        echo view('agendapkl/partial/footer_datatable');    
    }else {
        return redirect()->to('landing_page_erp');
    }
}

public function aksi_edit()
{ 
    if(session()->get('level')== 1 || session()->get('level')==2 || session()->get('level')==3 && session()->get('jabatan')==2 ) {
        $a= $this->request->getPost('username');
        $d= $this->request->getPost('nama');
        $e= $this->request->getPost('nama_pt');
        $g= $this->request->getPost('telepon');
        $id= $this->request->getPost('id');
        $id2= $this->request->getPost('id2');
        date_default_timezone_set('Asia/Jakarta');

        $foto= $this->request->getFile('foto');
        if (!empty($foto->getName())) {
            if ($foto->isValid() && !$foto->hasMoved()) {
                if (file_exists("images/" . $id)) {
                    unlink("images/" . $id);
                }
                $imageName = $foto->getName();
                $foto->move('images/', $imageName);
            }
        } else {
            $imageName = $this->request->getPost('old_foto');
        }


        //Yang ditambah ke user
        $where=array('id_user'=>$id);
        $data1=array(
            'username'=>$a,
            'foto'=>$imageName,
        );
        $model=new M_instruktur();
        $model->qedit('user', $data1, $where);

        //Yang ditambah ke karyawan
        $where2=array('user'=>$id2);
        $data2=array(
            'nama_instruktur'=>$d,
            'nama_perusahaan'=>$e,
            'telepon'=>$g,
            'updated_at'=>date('Y-m-d H:i:s')
        );

        $model->qedit('data_instruktur', $data2, $where2);
        return redirect()->to('agendapkl/data_instruktur');
    }else {
        return redirect()->to('landing_page_erp');
    }
}
public function delete($id)
{ 
    if(session()->get('level')== 1 || session()->get('level')==2 || session()->get('level')==3 && session()->get('jabatan')==2 ) {
        $model=new M_instruktur();
        $where=array('user'=>$id);
        $where2=array('id_user'=>$id);

        $data=array(
            'deleted_at'=>date('Y-m-d H:i:s')
        );

        $model->qedit('data_instruktur', $data, $where);
        $model->qedit('user', $data, $where2);
        return redirect()->to('agendapkl/data_instruktur');
    }else {
        return redirect()->to('landing_page_erp');
    }
}

//==================================================================================

public function import_excel()
{
    if(session()->get('level')== 1) {
        $model = new M_instruktur();
        $file = $this->request->getFile('file_excel');
        $spreadsheet = IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet();
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        for ($row = 2; $row <= $highestRow; $row++) {

            $data1 = [
                'username' => $sheet->getCellByColumnAndRow(1, $row)->getValue(),
                'password' => md5($sheet->getCellByColumnAndRow(2, $row)->getValue()),
                'email' => $sheet->getCellByColumnAndRow(3, $row)->getValue(),
                'level' => 5,
                'foto' => 'default.png',
                'user_create'=>session()->get('id')
            ];

            $model->simpan('user', $data1);
            $where=array('username'=>$sheet->getCellByColumnAndRow(1, $row)->getValue());

            $user=$model->getWhere2('user', $where);
            $iduser = $user['id_user'];

            $data2=array(
                'nama_instruktur'=>$sheet->getCellByColumnAndRow(4, $row)->getValue(),
                'nama_perusahaan'=>$sheet->getCellByColumnAndRow(5, $row)->getValue(),
                'jenis_kelamin'=>$sheet->getCellByColumnAndRow(6, $row)->getValue(),
                'telpon'=>$sheet->getCellByColumnAndRow(7, $row)->getValue(),
                'user_instruktur'=>$iduser,
                'user_create'=>session()->get('id'),
            );
            $model->simpan('data_instruktur', $data2);
        }

        return redirect()->back()->with('success', 'Data Excel Telah Berhasil Diimport');
    }else {
        return redirect()->to('landing_page_erp');
    }
}
}