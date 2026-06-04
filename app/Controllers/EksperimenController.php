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
}
