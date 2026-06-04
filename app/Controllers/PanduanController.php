<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PanduanController extends BaseController
{
    public function index(): string
    {
        $data = [
            'activeTab' => 'panduan',
            'pageTitle' => 'Panduan Metode ARAS'
        ];

        return view('panduan/index', $data);
    }
}
