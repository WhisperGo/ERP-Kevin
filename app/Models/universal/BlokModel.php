<?php 
namespace App\Models\universal;

use CodeIgniter\Model;

class BlokModel extends Model
{
    protected $table = 'blok';
    protected $primaryKey = 'id_blok';
    protected $allowedFields = ['nama_b','statuss'];
    


}