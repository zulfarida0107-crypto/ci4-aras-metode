<?php

namespace App\Models;

use CodeIgniter\Model;

class EksperimenHasilModel extends Model
{
    protected $table            = 'eksperimen_hasil';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_eksperimen', 'bobot_json', 'criteria_types_json', 'alternatives_json', 'hasil_json'
    ];

    // Timestamps (Hanya menggunakan created_at)
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = ''; 

    protected $validationRules = [
        'nama_eksperimen'     => 'required|string|min_length[3]|max_length[100]',
        'bobot_json'          => 'required',
        'criteria_types_json' => 'required',
        'alternatives_json'   => 'required',
        'hasil_json'          => 'required',
    ];

    protected $skipValidation = false;

    // Otomatisasi konversi JSON menggunakan Callbacks
    protected $beforeInsert = ['encodeJsonFields'];
    protected $beforeUpdate = ['encodeJsonFields'];
    protected $afterFind    = ['decodeJsonFields'];

    protected function encodeJsonFields(array $data)
    {
        $jsonFields = ['bobot_json', 'criteria_types_json', 'alternatives_json', 'hasil_json'];
        foreach ($jsonFields as $field) {
            if (isset($data['data'][$field]) && is_array($data['data'][$field])) {
                $data['data'][$field] = json_encode($data['data'][$field]);
            }
        }
        return $data;
    }

    protected function decodeJsonFields(array $data)
    {
        $jsonFields = ['bobot_json', 'criteria_types_json', 'alternatives_json', 'hasil_json'];
        
        // Jika data tunggal (find)
        if (isset($data['data']) && !empty($data['data'])) {
            foreach ($jsonFields as $field) {
                if (isset($data['data'][$field])) {
                    $data['data'][$field] = json_decode($data['data'][$field], true);
                }
            }
        } else {
            // Jika data banyak (findAll)
            foreach ($data as $key => $row) {
                foreach ($jsonFields as $field) {
                    if (isset($row[$field])) {
                        $data[$key][$field] = json_decode($row[$field], true);
                    }
                }
            }
        }
        return $data;
    }
}