<?php

namespace App\Models\Agendapkl;
use CodeIgniter\Model;

class M_absensi_sekolah extends Model
{		
	protected $table      = 'data_absensi_sekolah';
	protected $primaryKey = 'id_absensi';
	protected $allowedFields = ['siswa', 'tanggal', 'keterangan'];
	protected $useSoftDeletes = true;
	protected $useTimestamps = true;

	public function tampil($table1)	
	{
		return $this->db->table($table1)->get()->getResult();
	}
	public function tampil_siswa($table1, $idGuru)
	{
		return $this->db->table($table1)
		->where('guru_pembimbing', $idGuru)
		->get()
		->getResult();
	}
	public function tampil_rpl($table1)	
	{
		return $this->db->table($table1)
		->where('jurusan', 2)
		->orderBy($table1 . '.created_at', 'desc')
		->get()
		->getResult();
	}
	public function tampil_bdp($table1)	
	{
		return $this->db->table($table1)
		->where('jurusan', 4)
		->orderBy($table1 . '.created_at', 'desc')
		->get()
		->getResult();
	}
	public function tampil_akl($table1)	
	{
		return $this->db->table($table1)
		->where('jurusan', 3)
		->orderBy($table1 . '.created_at', 'desc')
		->get()
		->getResult();
	}
	public function hapus($table, $where)
	{
		return $this->db->table($table)->delete($where);
	}
	public function simpan($table, $data)
	{
		return $this->db->table($table)->insert($data);
	}
	public function qedit($table, $data, $where)
	{
		return $this->db->table($table)->update($data, $where);
	}
	public function getWhere($table, $where)
	{
		return $this->db->table($table)->getWhere($where)->getRow();
	}
	public function getWhere2($table, $where)
	{
		return $this->db->table($table)->getWhere($where)->getRowArray();
	}
	public function join2($table1, $table2, $on)
	{
		return $this->db->table($table1)
		->join($table2, $on, 'left')
		->where('data_absensi_sekolah.deleted_at', null)
		->get()
		->getResult();
	}
	public function join3w($table1, $table2, $table3, $on, $on2, $where)
	{
		return $this->db->table($table1)
		->join($table2, $on, 'left')
		->join($table3, $on2, 'left')
		->where('data_absensi_sekolah.deleted_at', null)
		->orderBy('data_absensi_sekolah.created_at', 'desc')
		->where($where)
		->get()
		->getResult();
	}
	public function getJurusan($idAbsensi)
	{
		return $this->db->table('siswa')
		->select('jurusan')
		->where('user', $idAbsensi)
		->get()
		->getRow();
	}

	//Filter print
	public function getDataByFilter($idSiswa, $awal, $akhir)
	{
		$builder = $this->db->table('data_absensi_sekolah');

    // Join dengan tabel data_siswa
		$builder->join('siswa', 'siswa.user = data_absensi_sekolah.siswa');

    // Join dengan tabel data_keterangan
		$builder->join('data_keterangan', 'data_keterangan.id_keterangan = data_absensi_sekolah.keterangan');

    // Menambahkan kondisi filter berdasarkan id siswa dan rentang tanggal
		$builder->where('data_absensi_sekolah.siswa', $idSiswa);
		$builder->where('data_absensi_sekolah.tanggal >=', $awal);
		$builder->where('data_absensi_sekolah.tanggal <=', $akhir);
		$builder->where('data_absensi_sekolah.deleted_at', null); 
		$builder->orderBy('data_absensi_sekolah.created_at', 'desc');

		$query = $builder->get();

		return $query->getResultArray();
	}

	//CI4 Model
	public function deletee($id)
	{
		return $this->delete($id);
	}
}