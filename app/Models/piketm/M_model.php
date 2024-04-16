<?php 
namespace App\Models\piketm;
use CodeIgniter\Model;

class M_model extends Model
{  

    // protected $db;

    // public function __construct()
    // {
    //     parent::__construct();

    //     // Menggunakan koneksi dbpiket
    //     $this->db = db_connect('dbpiket');
    // }
    
    public function tampil($table){
        return $this->db->table($table)->get()->getResult();
    }
    public function tampil2($table){
        return $this->db->table($table)->get()->getRow();
    }
    public function tampil1($table,$where){
        return $this->db->table($table)->getWhere($where)->getResult();
    }
    
    public function hapus($table, $where){
        return $this->db->table($table)->delete($where);
    }

    public function simpan($table, $data){
        return $this->db->table($table)->insert($data);
    }

    public function getWhere($table, $where){
        return $this->db->table($table)->getWhere($where)->getRow();
    }

    public function getWhere2($table, $where)
    {
        return $this->db->table($table)->getWhere($where)->getRowArray();
    }

    public function qedit($table, $data, $where){
        return $this->db->table($table)->update($data, $where);
    }
    
    public function join2($table1, $table2, $on){
        return $this->db->table($table1)->join($table2, $on, 'left')->get()->getResult();
    }
    public function join3($table1, $table2, $table3, $on, $on2){
        return $this->db->table($table1)->join($table2, $on, 'left')->join($table3, $on2, 'left')->get()->getResult();
    }
    public function join4($table1, $table2, $table3, $table4, $on, $on2, $on3){
        return $this->db->table($table1)->join($table2, $on, 'left')->join($table3, $on2, 'left')->join($table4, $on3, 'left')->get()->getResult();
    }
    // public function joinW($table1, $table2, $table3, $table4, $on, $on2, $on3, $where){
    //     return $this->db->table($table1)->join($table2, $on, 'left')->join($table3, $on2, 'left')->join($table4, $on3, 'left')->getWhere($where)->getResult();
    // }
    
    public function joinW($table1, $table2, $on, $where){
        return $this->db->table($table1)->join($table2, $on, 'left')->getWhere($where)->getRow();
    }
    
    public function joinW2($table1, $table2,$table3, $on, $on2, $where){
        return $this->db->table($table1)->join($table2, $on, 'left')->join($table3, $on2, 'left')->getWhere($where)->getRow();
    }
    
    public function join5($table1, $table2, $table3, $table4, $table5, $on, $on2, $on3, $on4){
        return $this->db->table($table1)->join($table2, $on, 'left')->join($table3, $on2, 'left')->join($table4, $on3, 'left')->join($table5, $on4, 'left')->get()->getResult();
    }

    public function tampilW($table1, $table2, $on, $where){
        return $this->db->table($table1)->join($table2, $on, 'left')->getWhere($where)->getResult();
    }
    
    public function tampilWR($table1, $table2, $on, $where){
        return $this->db->table($table1)->join($table2, $on, 'left')->getWhere($where)->getRow();
    }
    
    public function tampilW2($table1, $table2, $table3, $on, $on2, $where){
        return $this->db->table($table1)->join($table2, $on, 'left')->join($table3, $on2, 'left')->getWhere($where)->getResult();
    }
    // protected $table='surat_keluar';

    // public function getSurat($id = false)
	// {
	// 	if ($id === false){
	// 		return $this->findAll();		}
    
	// else{
	// 	return $this->getWhere(['id_surat'=>$id]);
	// }
    // }

    // public function upstatus($status, $kode_surat){
    //     return $this->db->set('status', $status);
    //     return $this->db->getWhere('kode_surat', $kode_surat);
    //     return $this->db->update('surat_keluar');

    // }
    
    // public function upstatus1($status, $penyetujuan, $kode_surat){
    //     return $this->db->set('status', $status);
    //     return $this->db->set('penyetujuan', $penyetujuan);
    //     return $this->db->getWhere('kode_surat', $kode_surat);
    //     return $this->db->update('surat_keluar');
    // }

    // public function filter2 ($table,$awal,$akhir)
	// {
	// 	return $this->db->query("
	// 		SELECT *
	// 		FROM ".$table."
	// 		WHERE ".$table.".tgl_surat
	// 		BETWEEN '".$awal."'
	// 		and '".$akhir."'"

	// 	    )->getResult();
	// }

    public function joinGW($table1, $table2, $on, $where){
        $builder = $this->db->table($table1);
        $builder->select('*');
        $builder->join($table2, $on);
        $builder->where('id_surat', $where);
        return $builder->get()->getResult();
    }

    public function filterTGL($table, $awal, $akhir)
    {
      return $this->db->query("
         SELECT *
         FROM ".$table."
         WHERE ".$table.".tanggal BETWEEN '".$awal."' AND '".$akhir."'
         ")->getResult();
  }

  public function filterJOIN($table, $table2, $table3, $on, $on2, $awal, $akhir){
    
    return $this->db->table($table)
    ->join($table2, $on, 'left')
    ->join($table3, $on2, 'left')
    ->where("{$table}.tanggal BETWEEN '{$awal}' AND '{$akhir}'")
    ->get()
    ->getResult();
}

public function filterJOIN2($table, $table2, $on, $awal, $akhir){
    
    return $this->db->table($table)
    ->join($table2, $on, 'left')
    ->where("{$table}.tanggal BETWEEN '{$awal}' AND '{$akhir}'")
    ->get()
    ->getResult();
}

public function filterJOINR($table, $table2, $table3, $on, $on2, $awal, $akhir, $rmbl){
    
    return $this->db->table($table)
    ->join($table2, $on, 'left')
    ->join($table3, $on2, 'left')
    ->where("{$table}.tanggal BETWEEN '{$awal}' AND '{$akhir}'")
    ->where("{$table}.rombel = '{$rmbl}'")
    ->get()
    ->getResult();
}

public function filterJOIN3($table, $table2, $table3, $on, $on2, $hari, $rombel){
    
    $builder = $this->db->table($table);
    $builder->join($table2, $on);
    $builder->join($table3, $on2);
    $builder->where('hari', $hari);
    $builder->where('rombel', $rombel);
    return $builder->get()->getResult();
}

public function filterMURID($table, $hari, $rombel){
    
    $builder = $this->db->table($table);
    $builder->where('jadwal_piket', $hari);
    $builder->where('rombel', $rombel);
    return $builder->get()->getResult();
}

public function filterJOINW($table, $table2, $on, $awal, $akhir, $user){
    
    return $this->db->table($table)
    ->join($table2, $on, 'left')
    ->join($table3, $on2, 'left')
    ->where("{$table}.tanggal BETWEEN '{$awal}' AND '{$akhir}'")
    ->get()
    ->getResult();
}

public function tampilOrderBy ($table, $column, $command)
{
  return $this->db->table($table)->orderBy($column, $command)->get()->getResult();
}

public function tampilOrderByJOIN ($table, $table2, $on)
{
  return $this->db->table($table)->join($table2, $on, 'left')->orderBy('tanggal', 'DESC')->get()->getResult();
}

public function tampilOrderByJOIN1 ($table, $table2, $on, $column, $command)
{
  return $this->db->table($table)->join($table2, $on, 'left')->orderBy($column, $command)->get()->getResult();
}

public function tampilOrderByWhere($table, $column, $command, $where)
{
  return $this->db->table($table)->orderBy($column, $command)->getWhere($where)->getResult();
}

public function OderByC($table1, $table2, $on2, $column, $command)
{
  return $this->db->table($table1)->join($table2, $on)->orderBy($column, $command)->get()->getResult();
}

public function filter1($table, $hari, $rombel, $tgl){
    $builder = $this->db->table($table);
    $builder->select('*');
    $builder->where('hari', $hari);
    $builder->where('rombel', $rombel);
    $builder->where('tanggal', $tgl);
    return $builder->get()->getResult();
}

public function simpanBatch($table, $data)
{  
    
    $this->db->transBegin();

    
    $this->db->table($table)->insertBatch($data);

    
    $this->db->transCommit();
}


public function getSiswaByGuruId($id_user)
{
    $builder = $this->db->table('data_murid');
    $builder->select('*');
    $builder->join('rombel as kelas_siswa', 'data_murid.kelas = kelas_siswa.id_rombel');
    $builder->join('data_guru', 'kelas_siswa.id_rombel=guru.rombel');
    $builder->where('guru.user', $id_user);

    $query = $builder->get();
    return $query->getResult();
}

public function getRombel(){
    return $this->db->table('rombel')
    ->select('rombel.nama_r, rombel.id_rombel,kelas.nama_kelas, jurusan.nama_jurusan')
    ->join('kelas', 'kelas.id_kelas = rombel.kelas')
    ->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan')
    ->get()
    ->getResult();
}

public function PiketRombel($awal, $akhir){
    return $this->db->table('piket')
    ->join('rombel','piket.rombel=rombel.id_rombel')
    ->join('kelas', 'kelas.id_kelas = rombel.kelas')
    ->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan')
    ->where("piket.tanggal BETWEEN '{$awal}' AND '{$akhir}'")
    ->get()
    ->getResult();
}

public function GuruRombel($id){
    return $this->db->table('guru')
    ->join('rombel','guru.rombel=rombel.id_rombel')
    ->join('kelas', 'kelas.id_kelas = rombel.kelas')
    ->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan')
    ->where("guru.rombel", $id)
    ->get()
    ->getResult();
}
// ->select('rombel.nama_r, rombel.id_rombel, kelas.nama_kelas, jurusan.nama_jurusan')
// ->join('kelas', 'kelas.id_kelas = rombel.kelas')
// ->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan')
}