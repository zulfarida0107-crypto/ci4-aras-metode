<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RespondenController extends BaseController
{
    public function index(): string
    {
        $vRespondenModel = new \App\Models\VRespondenLengkapModel();
        $bobotModel = new \App\Models\BobotKriteriaModel();
        
        $search = $this->request->getGet('search');
        $status = $this->request->getGet('status'); // array
        $usia = $this->request->getGet('usia');

        // Get Tipe Kriteria filters
        $typeFilters = [
            'harga' => $this->request->getGet('type_harga'),
            'berat' => $this->request->getGet('type_berat'),
            'ram' => $this->request->getGet('type_ram'),
            'storage' => $this->request->getGet('type_storage'),
            'processor' => $this->request->getGet('type_processor'),
            'baterai' => $this->request->getGet('type_baterai')
        ];

        // Filter valid ones (not empty)
        $activeTypeFilters = array_filter($typeFilters, function($val) {
            return !empty($val);
        });

        $matchingIds = null;
        if (!empty($activeTypeFilters)) {
            require_once APPPATH . 'Libraries/Responden2Parser.php';
            $parsedData = \App\Libraries\Responden2Parser::parse();
            $matchingIds = [];
            foreach ($parsedData as $pd) {
                $match = true;
                foreach ($activeTypeFilters as $k => $v) {
                    if (isset($pd['types'][$k]) && strtolower($pd['types'][$k]) !== strtolower($v)) {
                        $match = false;
                        break;
                    }
                }
                if ($match) {
                    $matchingIds[] = $pd['id'];
                }
            }
            // Jika tidak ada yang match, kita set array [-1] agar query mengembalikan kosong
            if (empty($matchingIds)) {
                $matchingIds = [-1];
            }
        }

        $buildQuery = function() use ($search, $status, $usia, $matchingIds) {
            $model = new \App\Models\VRespondenLengkapModel();
            $model->select('v_responden_lengkap.*, responden.created_at');
            $model->join('responden', 'responden.id = v_responden_lengkap.id');
            
            if (!empty($search)) {
                $model->like('v_responden_lengkap.nama', $search);
            }
            if (!empty($status) && is_array($status)) {
                $model->whereIn('v_responden_lengkap.status', $status);
            }
            if (!empty($usia)) {
                if ($usia == '18-22') {
                    $model->where('v_responden_lengkap.usia >=', 18)->where('v_responden_lengkap.usia <=', 22);
                } elseif ($usia == '23-30') {
                    $model->where('v_responden_lengkap.usia >=', 23)->where('v_responden_lengkap.usia <=', 30);
                } elseif ($usia == '>30') {
                    $model->where('v_responden_lengkap.usia >', 30);
                }
            }
            if ($matchingIds !== null) {
                $model->whereIn('v_responden_lengkap.id', $matchingIds);
            }
            $model->orderBy('v_responden_lengkap.id', 'ASC');
            return $model;
        };

        $modelIdentitas = $buildQuery();
        $modelBobot = $buildQuery();
        $modelPenilaian = $buildQuery();

        // Paginate
        $respondenIdentitas = $modelIdentitas->paginate(10, 'identitas');
        $respondenBobot = $modelBobot->paginate(10, 'bobot');
        $respondenPenilaian = $modelPenilaian->paginate(10, 'penilaian');
        
        $pager = \Config\Services::pager();

        // 2. Global averages for all data (not just paginated)
        $allBobot = $bobotModel->findAll();
        $totalRespondenAll = count($allBobot);
        $avgWeights = [
            'harga' => 0, 'berat' => 0, 'ram' => 0, 'storage' => 0, 'processor' => 0, 'baterai' => 0
        ];
        
        if ($totalRespondenAll > 0) {
            foreach ($allBobot as $r) {
                $avgWeights['harga'] += $r['harga'];
                $avgWeights['berat'] += $r['berat'];
                $avgWeights['ram'] += $r['ram'];
                $avgWeights['storage'] += $r['storage'];
                $avgWeights['processor'] += $r['processor'];
                $avgWeights['baterai'] += $r['baterai'];
            }
            $rawSum = array_sum($avgWeights);
            foreach ($avgWeights as $k => $v) {
                $avgWeights[$k] = $rawSum > 0 ? ($v / $rawSum) : 0;
            }
        }
        
        // Normalize each respondent's individual weights for view
        $normalizeWeights = function(&$array) {
            foreach ($array as &$r) {
                $r_sum = $r['harga'] + $r['berat'] + $r['ram'] + $r['storage'] + $r['processor'] + $r['baterai'];
                $r['w_harga'] = $r_sum > 0 ? ($r['harga'] / $r_sum) : 0;
                $r['w_berat'] = $r_sum > 0 ? ($r['berat'] / $r_sum) : 0;
                $r['w_ram'] = $r_sum > 0 ? ($r['ram'] / $r_sum) : 0;
                $r['w_storage'] = $r_sum > 0 ? ($r['storage'] / $r_sum) : 0;
                $r['w_processor'] = $r_sum > 0 ? ($r['processor'] / $r_sum) : 0;
                $r['w_baterai'] = $r_sum > 0 ? ($r['baterai'] / $r_sum) : 0;
            }
        };

        $normalizeWeights($respondenIdentitas);
        $normalizeWeights($respondenBobot);
        $normalizeWeights($respondenPenilaian);

        $data = [
            'activeTab' => 'responden',
            'pageTitle' => 'Data Responden',
            'respondenIdentitas' => $respondenIdentitas,
            'respondenBobot' => $respondenBobot,
            'respondenPenilaian' => $respondenPenilaian,
            'pager'     => $pager,
            'currentPageIdentitas' => $pager->getCurrentPage('identitas'),
            'currentPageBobot' => $pager->getCurrentPage('bobot'),
            'currentPagePenilaian' => $pager->getCurrentPage('penilaian'),
            'perPage'   => 10,
            'avgWeights' => $avgWeights,
            'totalResponden' => $totalRespondenAll,
            'typeFilters' => $typeFilters
        ];

        return view('responden/index', $data);
    }

    public function export()
    {
        $vRespondenModel = new \App\Models\VRespondenLengkapModel();
        $responden = $vRespondenModel->orderBy('id', 'ASC')->findAll();

        $filename = 'data_bobot_kriteria_' . date('Ymd') . '.csv';
        
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; "); 
        
        $file = fopen('php://output', 'w');
        
        $header = ['ID', 'Nama', 'Usia', 'Status', 'Harga', 'Berat', 'RAM', 'Storage', 'Processor', 'Baterai'];
        fputcsv($file, $header);
        
        foreach ($responden as $r) {
            fputcsv($file, [
                $r['id'], $r['nama'], $r['usia'], $r['status'],
                $r['harga'], $r['berat'], $r['ram'], $r['storage'], $r['processor'], $r['baterai']
            ]);
        }
        fclose($file);
        exit;
    }
}
