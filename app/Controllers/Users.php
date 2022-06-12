<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class Users extends BaseController
{
    public function index()
    {
        $model = new User();
        $data = [
            'content' => $model->getUserWithoutAdmin()->getResult(),
            'pages' => 'Data User',
            'IniDashboard' => FALSE
        ];
        return view('user/index', $data);
    }

    public function add()
    {
        $data = [
            'pages' => 'Tambah User',
            'IniDashboard' => FALSE
        ];
        return view('user/add', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|min_length[4]|max_length[10]|is_unique[user.username]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 4 Karakter',
                    'max_length' => '{field} maksimal 10 Karakter',
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]|max_length[50]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 5 Karakter',
                    'max_length' => '{field} maksimal 50 Karakter',
                ]
            ],
            'conf_password' => [
                'rules' => 'required|min_length[5]|max_length[50]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 5 Karakter',
                    'max_length' => '{field} maksimal 50 Karakter',
                ]
            ],
            'name' => [
                'rules' => 'required|min_length[5]|max_length[50]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 5 Karakter',
                    'max_length' => '{field} maksimal 50 Karakter',
                ]
            ],
            'nomor_identitas' => [
                'rules' => 'required|min_length[10]|max_length[50]|is_unique[user.nomor_identitas]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 10 Karakter',
                    'max_length' => '{field} maksimal 50 Karakter',
                ]
            ],
            'phone' => [
                'rules' => 'required|min_length[11]|max_length[13]|is_unique[user.nomor_identitas]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 11 Karakter',
                    'max_length' => '{field} maksimal 13 Karakter',
                ]
            ],
            'tl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'gender' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'foto_ktp' => [
                'rules' => 'mime_in[foto_ktp,image/jpg,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'mime_in'  => 'Maaf file yang anda upload memiliki format yang tidak diizinkan! silahkan upload dengan format JPG, JPEG, dan PNG.',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $model = new User();
        $img    = $this->request->getFile('foto_ktp');
        $randName = $img->getRandomName();
        if ($img->isValid() && ! $img->hasMoved()) {
            $img->move('foto_ktp',$randName);
            $data = [
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'name' => $this->request->getVar('name'),
                'nomor_identitas' => $this->request->getVar('nomor_identitas'),
                'phone' => $this->request->getVar('phone'),
                'tl' => $this->request->getVar('tl'),
                'address' => $this->request->getVar('address'),
                'gender' => $this->request->getVar('gender'),
                'role' => $this->request->getVar('role'),
                'status_account' => $this->request->getVar('status_account'),
                'foto_ktp' => $randName,
            ];
            if ($model->save($data)) {
                session()->setFlashData('success','User telah ditambah.');
                return $this->response->redirect(site_url('dashboard/user'));
            } else {
                session()->setFlashData('error','Terjadi error.');
                return $this->response->redirect(site_url('dashboard/user'));
            }
        } else {
            $data = [
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'name' => $this->request->getVar('name'),
                'nomor_identitas' => $this->request->getVar('nomor_identitas'),
                'phone' => $this->request->getVar('phone'),
                'tl' => $this->request->getVar('tl'),
                'address' => $this->request->getVar('address'),
                'gender' => $this->request->getVar('gender'),
                'role' => $this->request->getVar('role'),
                'status_account' => $this->request->getVar('status_account'),
            ];
            if ($model->save($data)) {
                session()->setFlashData('success','User telah ditambah.');
                return $this->response->redirect(site_url('dashboard/user'));
            } else {
                session()->setFlashData('error','Terjadi error.');
                return $this->response->redirect(site_url('dashboard/user'));
            }
        }
    }

    public function edit($id)
    {
        $model = new User();
        $data = [
            'content' => $model->where('id', $id)->first(),
            'pages' => 'Edit User',
            'IniDashboard' => FALSE
        ];
        return view('user/edit', $data);
    }

    public function update()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|min_length[4]|max_length[10]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 4 Karakter',
                    'max_length' => '{field} maksimal 10 Karakter',
                ]
            ],
            'name' => [
                'rules' => 'required|min_length[5]|max_length[50]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 5 Karakter',
                    'max_length' => '{field} maksimal 50 Karakter',
                ]
            ],
            'nomor_identitas' => [
                'rules' => 'required|min_length[10]|max_length[50]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 10 Karakter',
                    'max_length' => '{field} maksimal 50 Karakter',
                ]
            ],
            'phone' => [
                'rules' => 'required|min_length[11]|max_length[13]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 11 Karakter',
                    'max_length' => '{field} maksimal 13 Karakter',
                ]
            ],
            'tl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'gender' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'status_account' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'foto_ktp' => [
                'rules' => 'mime_in[foto_ktp,image/jpg,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'mime_in'  => 'Maaf file yang anda upload memiliki format yang tidak diizinkan! silahkan upload dengan format JPG, JPEG, dan PNG.',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $model = new User();
        $img = $this->request->getFile('foto_ktp');
        $id = $this->request->getVar('id');
        $randName = $img->getRandomName();
        if ($img->isValid() && ! $img->hasMoved()) {
            $img->move('foto_ktp',$randName);
            $data = [
                'username' => $this->request->getVar('username'),
                'name' => $this->request->getVar('name'),
                'nomor_identitas' => $this->request->getVar('nomor_identitas'),
                'phone' => $this->request->getVar('phone'),
                'tl' => $this->request->getVar('tl'),
                'address' => $this->request->getVar('address'),
                'gender' => $this->request->getVar('gender'),
                'role' => $this->request->getVar('role'),
                'status_account' => $this->request->getVar('status_account'),
                'foto_ktp' => $randName,
            ];
            if ($model->update($id,$data)) {
                session()->setFlashData('success','User telah diupdate.');
                return $this->response->redirect(site_url('dashboard/user'));
            } else {
                session()->setFlashData('error','Terjadi error.');
                return $this->response->redirect(site_url('dashboard/user'));
            }
        } else {
            $data = [
                'username' => $this->request->getVar('username'),
                'name' => $this->request->getVar('name'),
                'nomor_identitas' => $this->request->getVar('nomor_identitas'),
                'phone' => $this->request->getVar('phone'),
                'tl' => $this->request->getVar('tl'),
                'address' => $this->request->getVar('address'),
                'gender' => $this->request->getVar('gender'),
                'role' => $this->request->getVar('role'),
                'status_account' => $this->request->getVar('status_account'),
            ];
            if ($model->update($id,$data)) {
                session()->setFlashData('success','User telah diupdate.');
                return $this->response->redirect(site_url('dashboard/user'));
            } else {
                session()->setFlashData('error','Terjadi error.');
                return $this->response->redirect(site_url('dashboard/user'));
            }
        }
    }

    public function delete($id)
    {
        $model = new User();
        $model->where('id', $id)->delete($id);
        session()->setFlashData('success', 'User berhasil dihapus!');
        return $this->response->redirect(site_url('dashboard/user'));
    }
}
