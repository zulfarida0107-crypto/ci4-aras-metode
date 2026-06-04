<?php

namespace App\Models;

use CodeIgniter\Model;

class BobotKriteriaModel extends Model
{
    protected $table            = 'bobot_kriteria';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['responden_id', 'harga', 'berat', 'ram', 'storage', 'processor', 'baterai'];

    protected $useTimestamps    = false;

    // Aturan Validasi (Memastikan nilai berada di rentang 1-3 sesuai kuesioner)
    protected $validationRules = [
        'responden_id' => 'required|integer|is_natural_no_zero',
        'harga'        => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[3]',
        'berat'        => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[3]',
        'ram'          => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[3]',
        'storage'      => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[3]',
        'processor'    => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[3]',
        'baterai'      => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[3]',
    ];

    protected $skipValidation = false;
}