<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class EksperimenController extends BaseController
{
    public function index(): string
    {
        $data = [
            'activeTab' => 'eksperimen',
            'pageTitle' => 'Eksperimen Mandiri'
        ];

        return view('eksperimen/index', $data);
    }

    public function calculate()
    {
        $requestData = $this->request->getJSON(true);
        if (!$requestData || empty($requestData['alternatives'])) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Data tidak valid']);
        }

        $bobotModel = new \App\Models\BobotKriteriaModel();
        $allBobot = $bobotModel->findAll();
        
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
        } else {
            // Default weights if DB is empty
            $weights = ['harga' => 3, 'berat' => 3, 'ram' => 3, 'storage' => 3, 'processor' => 3, 'baterai' => 3];
        }

        $types = isset($requestData['types']) ? $requestData['types'] : [
            'harga' => 'cost',
            'berat' => 'cost',
            'ram' => 'benefit',
            'storage' => 'benefit',
            'processor' => 'benefit',
            'baterai' => 'benefit'
        ];

        $alternatives = [];
        foreach ($requestData['alternatives'] as $index => $alt) {
            $alternatives[] = [
                'id' => 'A' . ($index + 1),
                'nama' => $alt['nama'],
                'spek' => 'Custom Input',
                'scores' => [
                    'harga' => (float)$alt['scores']['harga'],
                    'berat' => (float)$alt['scores']['berat'],
                    'ram' => (float)$alt['scores']['ram'],
                    'storage' => (float)$alt['scores']['storage'],
                    'processor' => (float)$alt['scores']['processor'],
                    'baterai' => (float)$alt['scores']['baterai']
                ],
                'labels' => [
                    'harga' => $alt['scores']['harga'],
                    'berat' => $alt['scores']['berat'],
                    'ram' => $alt['scores']['ram'],
                    'storage' => $alt['scores']['storage'],
                    'processor' => $alt['scores']['processor'],
                    'baterai' => $alt['scores']['baterai']
                ]
            ];
        }

        $aras = new \App\Libraries\ArasLibraries();
        $results = $aras->calculate($alternatives, $weights, $types);

        return $this->response->setJSON([
            'status' => 'success',
            'data' => $results
        ]);
    }
}
