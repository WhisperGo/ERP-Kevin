<?php 
namespace App\Models\universal;

use CodeIgniter\Model;

class M_tahun extends Model
{
    protected $table = 'tahun';
    protected $primaryKey = 'id_tahun';
    protected $allowedFields = ['nama_t','status'];
 


}