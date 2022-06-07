<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Antrian;
use Dompdf\Dompdf;

class Antrians extends BaseController
{
    public function index($date)
    {
        $model = new Antrian();
        $data = [
            'content' => $model->getAntrianByDate($date)->getResult(),
            'pages' => 'Antrian',
            'IniDashboard' => FALSE
        ];
        return view('antrian/index', $data);
    }

    public function edit($id)
    {
        $model = new Antrian();
        $data = [
            'content' => $model->where('id' ,$id)->first(),
            'pages' => 'Edit Status Antrian',
            'IniDashboard' => FALSE
        ];
        return view('antrian/edit', $data);
    }

    public function update()
    {
        $model = new Antrian();
        $id = $this->request->getVar('id');
        $date = date('Y-m-d');
        $data = [
            'status' => $this->request->getVar('status'),
        ];
        //dd($data);
        $model->update($id,$data);
        session()->setFlashData('success','Status Antrian telah diupdate.');
        return $this->response->redirect(site_url('dashboard/antrian/'.$date));
    }

    public function addPasien($id)
    {
        $model = new Antrian();
        $result = $model->getAntrian()->getResult();
        foreach ($result as $row): {
            $no = $row->nomor_antrian;
        } endforeach;
        $user = session()->get('id');
        $date = date('Y-m-d');
        $no = $no + 1;
        $data = [
            'nomor_antrian' => $no,
            'user' => $user,
            'poli' => $id,
            'date' => $date,
        ];
        $check = $model->where('user', $user)->first();
        if($check == null) {
            if($model->save($data)) {
                session()->setFlashData('success','Permintaan berhasil, silahkan tunggu!');
            return $this->response->redirect(site_url('dashboard'));
            } else {
                session()->setFlashData('error','Terjadi error!');
                return $this->response->redirect(site_url('dashboard'));
            }
        } else {
            session()->setFlashData('error','Maaf Anda hanya bisa melakukan permintaan ini 1 x 24 jam.');
            return $this->response->redirect(site_url('dashboard'));
        }   
    }

    public function cetakAntrian($id)
    {
        $model = new Antrian();
        $data = [
            'content' => $model->where('id', $id)->first(),
        ];
        return view('antrian/cetak', $data);        
    }

    public function cetakAntrianProses($id)
    {
        $model = new Antrian();
        $data = [
            'content' => $model->where('id', $id)->first(),
        ];
        $filename = date('y-m-d-H-i-s'). '-qadr-labs-report';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $dompdf->loadHtml(view('antrian/cetak', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);
    }
}
