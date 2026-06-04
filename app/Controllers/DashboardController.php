<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RespondenModel;
use App\Models\BobotKriteriaModel;

class DashboardController extends BaseController
{
    public function index(): string
    {
        $respondenModel = new RespondenModel();
        $bobotModel = new BobotKriteriaModel();

        // 1. Total Responden
        $totalResponden = $respondenModel->countAllResults();
        if ($totalResponden == 0) {
            $totalResponden = 1; // Prevent division by zero later if db is empty
        }

        // 2. Usia Statistik
        $builderResponden = $respondenModel->builder();
        $builderResponden->select('AVG(usia) as rata_usia, MIN(usia) as min_usia, MAX(usia) as max_usia');
        $usiaStats = $builderResponden->get()->getRow();
        
        $rataUsia = $usiaStats->rata_usia ? round($usiaStats->rata_usia) : 0;
        $minUsia = $usiaStats->min_usia ?: 0;
        $maxUsia = $usiaStats->max_usia ?: 0;

        // 3. Distribusi Status
        $builderResponden->select('status, COUNT(status) as total');
        $builderResponden->groupBy('status');
        $statusRaw = $builderResponden->get()->getResultArray();
        
        $statusData = [];
        $statusTerbanyak = ['status' => '-', 'persen' => 0, 'total' => 0];
        
        foreach ($statusRaw as $s) {
            $persen = round(($s['total'] / $totalResponden) * 100);
            $statusData[] = [
                'name' => $s['status'],
                'total' => $s['total'],
                'persen' => $persen
            ];
            
            if ($s['total'] > $statusTerbanyak['total']) {
                $statusTerbanyak = [
                    'status' => $s['status'],
                    'total' => $s['total'],
                    'persen' => $persen
                ];
            }
        }

        // 4. Rata-rata Bobot Kriteria (Dihitung dengan menjumlahkan seluruh nilai / total data)
        $bobotData = $bobotModel->findAll();
        $totalBobotData = count($bobotData) > 0 ? count($bobotData) : 1;
        
        $sums = [
            'harga' => 0, 'berat' => 0, 'ram' => 0, 
            'storage' => 0, 'processor' => 0, 'baterai' => 0
        ];
        
        foreach ($bobotData as $row) {
            $sums['harga'] += $row['harga'];
            $sums['berat'] += $row['berat'];
            $sums['ram'] += $row['ram'];
            $sums['storage'] += $row['storage'];
            $sums['processor'] += $row['processor'];
            $sums['baterai'] += $row['baterai'];
        }
        
        $avgBobot = [
            'harga' => $sums['harga'] / $totalBobotData,
            'berat' => $sums['berat'] / $totalBobotData,
            'ram' => $sums['ram'] / $totalBobotData,
            'storage' => $sums['storage'] / $totalBobotData,
            'processor' => $sums['processor'] / $totalBobotData,
            'baterai' => $sums['baterai'] / $totalBobotData,
        ];

        $totalAvgBobot = array_sum($avgBobot);
        if ($totalAvgBobot == 0) $totalAvgBobot = 1;

        $bobotDisplay = [];
        $kriteriaTertinggi = ['nama' => '-', 'nilai' => 0];
        $bobotMap = [
            'processor' => ['label' => 'Processor', 'type' => 'Benefit'],
            'ram' => ['label' => 'RAM', 'type' => 'Benefit'],
            'baterai' => ['label' => 'Baterai', 'type' => 'Benefit'],
            'storage' => ['label' => 'Storage', 'type' => 'Benefit'],
            'harga' => ['label' => 'Harga', 'type' => 'Cost'],
            'berat' => ['label' => 'Berat', 'type' => 'Cost'],
        ];

        foreach ($avgBobot as $key => $val) {
            $persen = round(($val / $totalAvgBobot) * 100, 1);
            
            $bobotDisplay[$key] = [
                'label' => $bobotMap[$key]['label'],
                'type' => $bobotMap[$key]['type'],
                'persen' => $persen,
                'width' => $persen
            ];
            
            if ($persen > $kriteriaTertinggi['nilai']) {
                $kriteriaTertinggi = [
                    'nama' => $bobotMap[$key]['label'],
                    'nilai' => $persen
                ];
            }
        }
        
        // Sort by highest persen
        usort($bobotDisplay, function($a, $b) {
            return $b['persen'] <=> $a['persen'];
        });

        // 5. Dinamis Top 3 ARAS (Menggunakan data survei dan rata-rata bobot)
        $skorModel = new \App\Models\SkorLaptopModel();
        $skorData = $skorModel->findAll();
        
        $alternatives = [];
        foreach ($skorData as $skor) {
            // Ambil nama responden (sebagai nama alternatif / pilihan laptop)
            $resp = $respondenModel->find($skor['responden_id']);
            $namaAlt = "Laptop Pilihan " . ($resp ? $resp['nama'] : "Anonim");
            $spekAlt = "Harga: {$skor['harga_label']} | RAM: {$skor['ram_label']} | Proc: {$skor['processor_label']}";
            
            $alternatives[] = [
                'id' => $skor['id'],
                'nama' => $namaAlt,
                'spek' => $spekAlt,
                'scores' => [
                    'harga' => $skor['harga_skor'],
                    'berat' => $skor['berat_skor'],
                    'ram' => $skor['ram_skor'],
                    'storage' => $skor['storage_skor'],
                    'processor' => $skor['processor_skor'],
                    'baterai' => $skor['baterai_skor'],
                ],
                'labels' => [
                    'harga' => $skor['harga_label'],
                    'berat' => $skor['berat_label'],
                    'ram' => $skor['ram_label'],
                    'storage' => $skor['storage_label'],
                    'processor' => $skor['processor_label'],
                    'baterai' => $skor['baterai_label'],
                ]
            ];
        }

        $weights = [
            'harga' => $avgBobot['harga'],
            'berat' => $avgBobot['berat'],
            'ram' => $avgBobot['ram'],
            'storage' => $avgBobot['storage'],
            'processor' => $avgBobot['processor'],
            'baterai' => $avgBobot['baterai'],
        ];

        $types = [
            'harga' => 'cost',
            'berat' => 'cost',
            'ram' => 'benefit',
            'storage' => 'benefit',
            'processor' => 'benefit',
            'baterai' => 'benefit'
        ];

        $arasLib = new \App\Libraries\ArasLibraries();
        $fullRanking = $arasLib->calculate($alternatives, $weights, $types);
        $top3 = array_slice($fullRanking, 0, 3);

        $data = [
            'activeTab' => 'dashboard',
            'pageTitle' => 'Dashboard SPK ARAS',
            'totalResponden' => $totalResponden,
            'rataUsia' => $rataUsia,
            'minUsia' => $minUsia,
            'maxUsia' => $maxUsia,
            'statusData' => $statusData,
            'statusTerbanyak' => $statusTerbanyak,
            'kriteriaTertinggi' => $kriteriaTertinggi,
            'bobotDisplay' => $bobotDisplay,
            'top3' => $top3
        ];

        return view('layout/header', $data) . 
               view('layout/sidebar', $data) . 
               view('dashboard/index', $data) . 
               view('layout/footer', $data);
    }
}
