<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ArasController extends BaseController
{
    public function index(): string
    {
        $bobotModel = new \App\Models\BobotKriteriaModel();
        $skorModel = new \App\Models\SkorLaptopModel();
        $aras = new \App\Libraries\ArasLibraries();

        $allBobot = $bobotModel->findAll();
        
        // 0. Dinamis: Ambil dari parameter GET (jika kosong, gunakan default)
        $types = [
            'harga' => $this->request->getGet('type_harga') ?: 'cost',
            'berat' => $this->request->getGet('type_berat') ?: 'cost',
            'ram' => $this->request->getGet('type_ram') ?: 'benefit',
            'storage' => $this->request->getGet('type_storage') ?: 'benefit',
            'processor' => $this->request->getGet('type_processor') ?: 'benefit',
            'baterai' => $this->request->getGet('type_baterai') ?: 'benefit'
        ];

        // 1. Hitung rata-rata bobot (dari db karena Responden2.md tidak punya bobot)
        $weights = [
            'harga' => 0, 'berat' => 0, 'ram' => 0, 'storage' => 0, 'processor' => 0, 'baterai' => 0
        ];
        if (count($allBobot) > 0) {
            foreach ($allBobot as $r) {
                $weights['harga'] += $r['harga'];
                $weights['berat'] += $r['berat'];
                $weights['ram'] += $r['ram'];
                $weights['storage'] += $r['storage'];
                $weights['processor'] += $r['processor'];
                $weights['baterai'] += $r['baterai'];
            }
        }

        // 2. Siapkan Alternatif (Gunakan data dari Responden2.md secara langsung)
        require_once APPPATH . 'Libraries/Responden2Parser.php';
        $parsedData = \App\Libraries\Responden2Parser::parse();

        $alternatives = [];
        $i = 1;
        foreach ($parsedData as $pd) {
            $alternatives[] = [
                'id' => 'A' . $i++,
                'nama' => 'Laptop ' . $pd['nama'],
                'spek' => ($pd['labels']['processor'] ?? '') . ' | ' . ($pd['labels']['ram'] ?? ''),
                'scores' => [
                    'harga' => $pd['scores']['harga'] ?? 1,
                    'berat' => $pd['scores']['berat'] ?? 1,
                    'ram' => $pd['scores']['ram'] ?? 1,
                    'storage' => $pd['scores']['storage'] ?? 1,
                    'processor' => $pd['scores']['processor'] ?? 1,
                    'baterai' => $pd['scores']['baterai'] ?? 1
                ],
                'labels' => [
                    'harga' => $pd['labels']['harga'] ?? '',
                    'berat' => $pd['labels']['berat'] ?? '',
                    'ram' => $pd['labels']['ram'] ?? '',
                    'storage' => $pd['labels']['storage'] ?? '',
                    'processor' => $pd['labels']['processor'] ?? '',
                    'baterai' => $pd['labels']['baterai'] ?? ''
                ]
            ];
        }

        // 3. Hitung ARAS
        $results = $aras->calculate($alternatives, $weights, $types);
        
        // Sort by ID for tables
        $sortedById = $results;
        usort($sortedById, function($a, $b) {
            $numA = (int)str_replace('A', '', $a['id']);
            $numB = (int)str_replace('A', '', $b['id']);
            return $numA <=> $numB;
        });

        // Pagination setup
        $pager = \Config\Services::pager();
        $perPage = 10;
        
        $pageX = $this->request->getVar('page_x') ? (int)$this->request->getVar('page_x') : 1;
        $pageR = $this->request->getVar('page_r') ? (int)$this->request->getVar('page_r') : 1;
        $pageD = $this->request->getVar('page_d') ? (int)$this->request->getVar('page_d') : 1;
        $pageSi = $this->request->getVar('page_si') ? (int)$this->request->getVar('page_si') : 1;
        $pageKi = $this->request->getVar('page_ki') ? (int)$this->request->getVar('page_ki') : 1;
        $pageRank = $this->request->getVar('page_rank') ? (int)$this->request->getVar('page_rank') : 1;
        
        $total = count($sortedById);
        
        $pagedX = array_slice($sortedById, ($pageX - 1) * $perPage, $perPage);
        $pagedR = array_slice($sortedById, ($pageR - 1) * $perPage, $perPage);
        $pagedD = array_slice($sortedById, ($pageD - 1) * $perPage, $perPage);
        $pagedSi = array_slice($sortedById, ($pageSi - 1) * $perPage, $perPage);
        $pagedKi = array_slice($sortedById, ($pageKi - 1) * $perPage, $perPage);
        $pagedRank = array_slice($results, ($pageRank - 1) * $perPage, $perPage);

        // Pass to view
        $data = [
            'activeTab' => 'aras',
            'pageTitle' => 'Hasil ARAS Survei',
            
            // Raw arrays if needed, but primarily use paged
            'results' => $results,
            'sortedById' => $sortedById,
            'weights' => $weights,
            'types' => $types,
            'A0' => $results[0]['A0'] ?? [],
            'S0' => $results[0]['S0'] ?? 0,
            'W_norm' => $results[0]['W'] ?? [],
            
            // Paged Arrays
            'pagedX' => $pagedX,
            'pagedR' => $pagedR,
            'pagedD' => $pagedD,
            'pagedSi' => $pagedSi,
            'pagedKi' => $pagedKi,
            'pagedRank' => $pagedRank,
            
            // Pagers
            'pagerX' => $pager->makeLinks($pageX, $perPage, $total, 'custom_pager', 0, 'x'),
            'pagerR' => $pager->makeLinks($pageR, $perPage, $total, 'custom_pager', 0, 'r'),
            'pagerD' => $pager->makeLinks($pageD, $perPage, $total, 'custom_pager', 0, 'd'),
            'pagerSi' => $pager->makeLinks($pageSi, $perPage, $total, 'custom_pager', 0, 'si'),
            'pagerKi' => $pager->makeLinks($pageKi, $perPage, $total, 'custom_pager', 0, 'ki'),
            'pagerRank' => $pager->makeLinks($pageRank, $perPage, $total, 'custom_pager', 0, 'rank'),
            
            // Filters
            'typeFilters' => $types,
        ];

        return view('aras_survei/index', $data);
    }
}
