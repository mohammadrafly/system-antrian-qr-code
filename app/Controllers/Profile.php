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
use App\Models\User;

class Profile extends BaseController
{
    public function index($username)
    {
        $model = new User();
        $data = [
            'content' => $model->where('username', $username)->first(),
            'pages' => 'Edit Profile',
            'IniDashboard' => FALSE
        ];
        return view('profile/index', $data);
    }

    public function update()
    {
        if (!$this->validate([
            'name' => [
                'rules' => 'required|min_length[4]|max_length[20]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 20 Karakter',
                ]
            ],
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
            return $this->response->redirect(site_url('dashboard/profile/'.$username));
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
            session()->setFlashdata('error_password', $this->validator->listErrors());
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
                session()->setFlashData('password_success', 'Password telah diupdate!, Silahkan Relog untuk melihat detail terbaru anda.');
                return $this->response->redirect(site_url('dashboard/profile/'.$username));
            } else {
                session()->setFlashdata('password_error', 'Password Salah');
                return redirect()->back()->withInput();
            }
        } else {
            session()->setFlashdata('password_error', 'Password Salah');
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
            session()->setFlashdata('error_password', $this->validator->listErrors());
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

                $logo = Logo::create(__DIR__.'\logo-p.png')
                    ->setResizeToWidth(50);

                $result = $writer->write($qrCode, $logo);

                // Directly output the QR code
                //header('Content-Type: '.$result->getMimeType());
                //echo $result->getString('Test');

                // Save it to a file
                $result->saveToFile('qrcode.png');

                header('Content-Type: '.$result->getMimeType());
                echo $result->getString();

                $setData = [
                    'QRCODE' => $result,
                    'WesRegister' => TRUE
                ];
                session()->setFlashdata('success', 'Anda telah berhasil daftar silahkan login.');
                return view('qrcode/result', $setData);
            } else {
                session()->setFlashdata('error', 'Password Salah');
                return redirect()->back()->withInput();
            }
        } else {
            session()->setFlashdata('password_error', 'Password Salah');
            return redirect()->back()->withInput();
        }
    }
}
