<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RespondenController extends BaseController
{
    public function index(): string
    {
        $data = [
            'activeTab' => 'responden',
            'pageTitle' => 'Data Responden'
        ];

        return view('layout/header', $data) . 
               view('layout/sidebar', $data) . 
               view('responden/index', $data) . 
               view('layout/footer', $data);
    }
}
