<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ArasController extends BaseController
{
    public function index(): string
    {
        $data = [
            'activeTab' => 'aras',
            'pageTitle' => 'Hasil ARAS Survei'
        ];

        return view('layout/header', $data) . 
               view('layout/sidebar', $data) . 
               view('aras/index', $data) . 
               view('layout/footer', $data);
    }
}
