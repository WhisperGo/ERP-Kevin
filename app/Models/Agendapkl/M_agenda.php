<?php

namespace App\Models\Agendapkl;

use CodeIgniter\Model;

class M_agenda extends Model
{
	protected $table      = 'data_agenda';
	protected $primaryKey = 'id_agenda';
	protected $allowedFields = ['siswa', 'tanggal', 'jam_masuk', 'jam_keluar', 'renper_1', 'renper_2', 'renper_3', 'renper_4', 'renper_5', 'reape_1', 'renper_2', 'renper_3', 'reape_4', 'reape_5', 'pk_1', 'pk_2', 'pk_3', 'pm_1', 'pm_2', 'pm_3', 'senyum', 'keramahan', 'penampilan', 'komunikasi', 'realisasi_kerja', 'catatan_1', 'catatan_2', 'catatan_3'];
	protected $useSoftDeletes = true;
	protected $useTimestamps = true;

	public function tampil($table1)
	{
		return $this->db->table($table1)->get()->getResult();
	}
	public function tampil_siswa($table1, $idInstruktur)
	{
		return $this->db->table($table1)
			->where('instruktur', $idInstruktur)
			->orderBy($table1 . '.created_at', 'desc')
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
			->where('data_agenda.deleted_at', null)
			->get()
			->getResult();
	}
	public function join2w($table1, $table2, $on, $where)
	{
		return $this->db->table($table1)
			->join($table2, $on, 'left')
			->where('data_agenda.deleted_at', null)
			->orderBy('data_agenda.created_at', 'desc')
			->getWhere($where)
			->getResult();
	}
	public function join_gaji($table1, $table2, $table3, $on, $on2, $where)
	{
		return $this->db->table($table1)
			->join($table2, $on, 'left')
			->join($table3, $on2, 'left')
			->where($where)
			->where('gaji.deleted_at', null)
			->get()
			->getResult();
	}
	public function getLogoPDF()
	{
		$builder = $this->db->table('perusahaan');
		$builder->select('id_perusahaan, logo_pdf_perusahaan');
		$builder->where('deleted_at IS NULL');
		$query = $builder->get();
		return $query->getResultArray();
	}
	public function getPerusahaan()
	{
		$builder = $this->db->table('perusahaan');
		$builder->select('*');
		$builder->where('deleted_at', null);
		$query = $builder->get();
		return $query->getResultArray();
	}

	//Filter print
	public function getDataByFilter($idSiswa, $awal, $akhir)
	{
		$builder = $this->db->table('data_agenda');

		// Join dengan tabel siswa
		$builder->join('siswa', 'siswa.user = data_agenda.siswa');

		// Menambahkan kondisi filter berdasarkan id siswa dan rentang tanggal
		$builder->where('data_agenda.siswa', $idSiswa);
		$builder->where('data_agenda.tanggal >=', $awal);
		$builder->where('data_agenda.tanggal <=', $akhir);
		$builder->where('data_agenda.updated_at !=', null);
		$builder->where('data_agenda.deleted_at', null);

		$query = $builder->get();
		$builder->groupBy('data_agenda.tanggal');
		return $query->getResultArray();
	}

	public function getDataByFilter2($idAgenda)
	{
		$builder = $this->db->table('data_agenda');

		// Menambahkan kondisi filter berdasarkan id_agenda
		$builder->where('id_agenda', $idAgenda);

		// Eksekusi query
		$query = $builder->get();
		$result = $query->getRowArray();

		// Set nilai $idSiswa dan $tanggal
		$idSiswa = $result['siswa'];
		$tanggal = $result['tanggal'];

		// Join dengan tabel siswa
		$builder->join('siswa', 'siswa.user = data_agenda.siswa');

		// Menambahkan kondisi filter berdasarkan id siswa dan tanggal
		$builder->where('data_agenda.siswa', $idSiswa);
		$builder->where('data_agenda.tanggal', $tanggal);
		$builder->where('data_agenda.deleted_at', null);

		$query = $builder->get();
		return $query->getResultArray();
	}

	//CI4 Model
	public function deletee($id)
	{
		return $this->delete($id);
	}
}
