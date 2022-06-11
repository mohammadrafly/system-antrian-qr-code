<?php

namespace App\Controllers;
use App\Models\Antrian;

class Home extends BaseController
{
    public function index()
    {
        $antri = new Antrian();
        $data = [
            'antrian' => $antri->getAntrianSaatIni()->getResult(),
            'Login' => FALSE,
            'QRCodeLogin' => TRUE,
            'pages' => 'Masuk'
        ];
        return view('index', $data);
    }

    public function login()
    {
        $data = [
            'Login' => FALSE,
            'QRCodeLogin' => TRUE,
            'pages' => 'Masuk'
        ];
        return view('auth/login', $data);
    }

    public function loginWUsername()
    {
        $data = [
            'Login' => TRUE,
            'QRCodeLogin' => FALSE,
            'pages' => 'Masuk'
        ];
        return view('auth/login-username', $data);
    }

    public function register()
    {
        $data = [
            'Login' => FALSE,
            'QRCodeLogin' => FALSE,
            'pages' => 'Daftar'
        ];
        return view('auth/register', $data);
    }
}
