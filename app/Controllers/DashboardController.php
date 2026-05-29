<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index(): string
    {
        $data = [
            'activeTab' => 'dashboard',
            'pageTitle' => 'Dashboard SPK ARAS'
        ];

        return view('layout/header', $data) . 
               view('layout/sidebar', $data) . 
               view('dashboard/index', $data) . 
               view('layout/footer', $data);
    }
}
