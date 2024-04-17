<?php 
namespace App\Models\universal;

use CodeIgniter\Model;

class RombelModel extends Model
{
    protected $table = 'rombel';
    protected $primaryKey = 'id_rombel';
    protected $allowedFields = ['kelas','jurusan'];
    
}