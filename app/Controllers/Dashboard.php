<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Poli;
use App\Models\Antrian;
use App\Models\User;

class Dashboard extends BaseController
{
    public function index()
    {
        $model = new Poli();
        $antri = new Antrian();
        $pasien = new User();
        $data = [
            'pasien' => $pasien->countAll(), 
            'antri' => $antri->countAll(),
            'poli' => $model->countAll(),
            'antrian' => $antri->getAntrian()->getResult(),
            'content' => $model->findAll(), 
            'pages' => 'Dashboard',
            'IniDashboard' => TRUE,
        ];
        return view('dashboard/index', $data);
    }
}
