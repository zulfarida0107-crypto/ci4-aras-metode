<?php

namespace App\Models;

use CodeIgniter\Model;

class RespondenModel extends Model
{
    protected $table            = 'responden';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['timestamp', 'nama', 'usia', 'status'];

    // Fitur Timestamps Otomatis
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Aturan Validasi
    protected $validationRules = [
        'nama'   => 'required|min_length[3]|max_length[100]',
        'usia'   => 'required|integer|is_natural_no_zero',
        'status' => 'required|in_list[Mahasiswa,Bekerja,Lainnya]',
    ];

    protected $validationMessages = [
        'nama' => [
            'required'   => 'Nama responden harus diisi.',
            'min_length' => 'Nama terlalu pendek, minimal 3 karakter.'
        ],
        'usia' => [
            'required'           => 'Usia harus diisi.',
            'is_natural_no_zero' => 'Usia harus berupa angka di atas 0.'
        ],
        'status' => [
            'required' => 'Status pekerjaan/studi harus dipilih.',
            'in_list'  => 'Status harus berupa Mahasiswa, Bekerja, atau Lainnya.'
        ],
    ];

    protected $skipValidation = false;
}