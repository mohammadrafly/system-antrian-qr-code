<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Poli;

class Poliklinik extends BaseController
{
    public function index()
    {
        $model = new Poli();
        $data = [
            'content' => $model->findAll(),
            'pages'   => 'Data Poli',
            'IniDashboard' => FALSE
        ];
        return view('poli/index', $data);
    }

    public function add()
    {
        $data = [
            'pages' => 'Tambah Poli',
            'IniDashboard' => FALSE
        ];
        return view('poli/add', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'kode' => [
                'rules' => 'required|min_length[4]|max_length[10]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 4 Karakter',
                    'max_length' => '{field} maksimal 10 Karakter',
                ]
            ],
            'title' => [
                'rules' => 'required|min_length[5]|max_length[50]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 5 Karakter',
                    'max_length' => '{field} maksimal 50 Karakter',
                ]
            ],
            'limits' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $model = new Poli();
        $data = [
            'kode' => $this->request->getVar('kode'),
            'title' => $this->request->getVar('title'),
            'limits' => $this->request->getVar('limits'),
        ];
        $model->save($data);
        session()->setFlashData('success','Poli telah ditambah.');
        return $this->response->redirect(site_url('dashboard/poli'));
    }

    public function edit($id)
    {
        $model = new Poli();
        $data = [
            'content' => $model->where('id', $id)->first(),
            'pages' => 'Edit Poli',
            'IniDashboard' => FALSE
        ];
        return view('poli/edit', $data);
    }

    public function update()
    {
        if (!$this->validate([
            'kode' => [
                'rules' => 'required|min_length[4]|max_length[10]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 4 Karakter',
                    'max_length' => '{field} maksimal 10 Karakter',
                ]
            ],
            'title' => [
                'rules' => 'required|min_length[5]|max_length[50]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 5 Karakter',
                    'max_length' => '{field} maksimal 50 Karakter',
                ]
            ],
            'limits' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error_password', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $model = new Poli();
        $id = $this->request->getVar('id');
        $data = [
            'kode' => $this->request->getVar('kode'),
            'title' => $this->request->getVar('title'),
            'limits' => $this->request->getVar('limits'),
        ];
        $model->update($id,$data);
        session()->setFlashData('success','Poli telah diupdate.');
        return $this->response->redirect(site_url('dashboard/poli'));
    }

    public function delete($id)
    {
        $model = new Poli();
        $model->where('id', $id)->delete($id);
        session()->setFlashData('success', 'Poli berhasil dihapus!');
        return $this->response->redirect(site_url('dashboard/poli'));
    }
}
