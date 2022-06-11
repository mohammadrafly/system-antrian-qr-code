<?php

namespace App\Controllers;

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
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
            'antrian' => $antri->getAntrianSaatIni()->getResult(),
            'antrianSaya' => $antri->getAntrianByID()->getResult(),
            'antrianKat' => $antri->getAntrianSaatIniByKat()->getResult(),
            'content' => $model->findAll(), 
            'user' => $pasien->where('id', session()->get('id'))->first(),
            'pages' => 'Dashboard',
            'IniDashboard' => TRUE,
            'QRLogin' => FALSE,
        ];
        return view('dashboard/pasien', $data);
    }

    public function indexBackEnd()
    {
        $model = new Poli();
        $antri = new Antrian();
        $pasien = new User();
        $data = [
            'pasien' => $pasien->countAll(), 
            'antri' => $antri->countAll(),
            'poli' => $model->countAll(),
            'antrian' => $antri->getAntrianSaatIni()->getResult(),
            'antrianSaya' => $antri->getAntrianByID()->getResult(),
            'antrianKat' => $antri->getAntrianSaatIniByKat()->getResult(),
            'content' => $model->findAll(), 
            'pages' => 'Dashboard',
            'IniDashboard' => TRUE,
            'QRLogin' => FALSE,
        ];
        return view('dashboard/index', $data);
    }

    public function update()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|min_length[4]|max_length[20]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 20 Karakter',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
            $model = new User();
            $username = session()->get('username');
            $id = $this->request->getVar('id');
            $data = [
                'name' => $this->request->getVar('name'),
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'phone' => $this->request->getVar('phone'),
                'gender' => $this->request->getVar('gender'),
                'nomor_identitas' => $this->request->getVar('nomor_identitas'),
                'tl' => $this->request->getVar('tl'),
                'address' => $this->request->getVar('address'),
            ];
            $model->update($id, $data);
            session()->setFlashData('success','Detail akun berhasil diupdate! Silahkan Relog untuk melihat detail terbaru anda.');
            return $this->response->redirect(site_url('pasien'));
    }

    public function updatePassword()
    {
        if (!$this->validate([
            'old_password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password lama harus diisi'
                ]
            ],
            'new_password' => [
                'rules' => 'required|min_length[6]|max_length[50]|is_unique[user.password]',
                'errors' => [
                    'required' => 'Password baru harus diisi',
                    'min_length' => 'Password minimal 6 Karakter',
                    'max_length' => 'Password maksimal 50 Karakter',
                    'is_unique' => 'Anda sudah menggunakan sandi ini baru-baru ini. Pilih yang lain.',
                ]
            ],
            'new_password_conf' => [
                'rules' => 'matches[new_password]|required',
                'errors' => [
                    'required' => 'Konfirmasi password baru harus diisi',
                    'matches' => 'Konfirmasi password tidak sesuai dengan password di atas',
                ]
            ],
        ])) {
            session()->setFlashdata('password', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $users = new User();
        $username = session()->get('username');
        $password = $this->request->getVar('old_password');
        $dataAdmin = $users->where(['username' => $username,])->first();

        if ($dataAdmin) {
            if (password_verify($password, $dataAdmin['password'])) {
                $id = session()->get('id');
                $data = [
                    'password' => password_hash($this->request->getVar('new_password'), PASSWORD_BCRYPT),
                ];
                $users->update($id, $data);
                session()->setFlashData('success', 'Password telah diupdate!, Silahkan Relog untuk melihat detail terbaru anda.');
                return $this->response->redirect(site_url('pasien'));
            } else {
                session()->setFlashdata('error', 'Password Salah');
                return redirect()->back()->withInput();
            }
        } else {
            session()->setFlashdata('error', 'Password Salah');
            return redirect()->back()->withInput();
        }
    }

    public function cetakQRCode()
    {   
        if (!$this->validate([
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password lama harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $users = new User();
        $username = session()->get('username');
        $password = $this->request->getVar('password');
        $dataAdmin = $users->where(['username' => $username,])->first();

        if ($dataAdmin) {
            if (password_verify($password, $dataAdmin['password'])) {
                $writer = new PngWriter();
                $user = '|'.$username.'|'.$password.'|';
                // Create QR code
                $qrCode = QrCode::create($user)
                    ->setEncoding(new Encoding('UTF-8'))
                    ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
                    ->setSize(300)
                    ->setMargin(10)
                    ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
                    ->setForegroundColor(new Color(0, 0, 0))
                    ->setBackgroundColor(new Color(255, 255, 255));

                $logo = Logo::create(__DIR__.'/assets/symfony.png')
                    ->setResizeToWidth(50);

                // Create generic label
                $label = Label::create('Label')
                    ->setTextColor(new Color(255, 0, 0));

                $result = $writer->write($qrCode, $logo, $label);

                // Directly output the QR code
                //header('Content-Type: '.$result->getMimeType());
                //echo $result->getString('Test');

                // Save it to a file
                // Directly output the QR code
                header('Content-Type: '.$result->getMimeType());
                echo $result->getString();

                // Save it to a file
                $result->saveToFile(__DIR__.'/qrcode.png');
                $dataUri = $result->getDataUri();
                $setData = [
                    'QRCODE' => $result,
                ];
                session()->setFlashdata('success', 'Anda telah berhasil daftar silahkan login.');
                return view('qrcode/result', $setData);
            } else {
                session()->setFlashdata('error', 'Password Salah');
                return redirect()->back()->withInput();
            }
        } else {
            session()->setFlashdata('error', 'Password Salah');
            return redirect()->back()->withInput();
        }
    }
}
