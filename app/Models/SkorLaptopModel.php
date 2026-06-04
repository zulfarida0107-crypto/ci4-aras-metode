<?php

namespace App\Models;

use CodeIgniter\Model;

class SkorLaptopModel extends Model
{
    protected $table            = 'skor_laptop';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'responden_id', 
        'harga_label', 'berat_label', 'ram_label', 'storage_label', 'processor_label', 'baterai_label',
        'harga_skor', 'berat_skor', 'ram_skor', 'storage_skor', 'processor_skor', 'baterai_skor'
    ];

    protected $useTimestamps    = false;

    protected $validationRules = [
        'responden_id'   => 'required|integer|is_natural_no_zero',
        'harga_label'    => 'permit_empty|string|max_length[50]',
        'berat_label'    => 'permit_empty|string|max_length[50]',
        'ram_label'      => 'permit_empty|string|max_length[50]',
        'storage_label'  => 'permit_empty|string|max_length[50]',
        'processor_label'=> 'permit_empty|string|max_length[50]',
        'baterai_label'  => 'permit_empty|string|max_length[50]',
        'harga_skor'     => 'permit_empty|integer',
        'berat_skor'     => 'permit_empty|integer',
        'ram_skor'       => 'permit_empty|integer',
        'storage_skor'   => 'permit_empty|integer',
        'processor_skor' => 'permit_empty|integer',
        'baterai_skor'   => 'permit_empty|integer',
    ];

    protected $skipValidation = false;
}