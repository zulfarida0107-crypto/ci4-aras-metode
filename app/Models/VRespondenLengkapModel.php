<?php

namespace App\Models;

use CodeIgniter\Model;

class VRespondenLengkapModel extends Model
{
    protected $table            = 'v_responden_lengkap';
    protected $primaryKey       = 'id'; // Menggunakan id dari responden
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    
    // Kosongkan allowedFields agar mencegah perubahan data secara tidak sengaja melalui View
    protected $allowedFields    = [];
    protected $useTimestamps    = false;
}