<?php

namespace App\Models;

use CodeIgniter\Model;

class Antrian extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'antrian';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user',
        'poli',
        'nomor_antrian',
        'date',
        'status'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getAntrianByDate($date)
    {
        $builder = $this->db->table('antrian')
                ->select('antrian.*, poli.title AS poli_name')
                ->select('antrian.*, user.name AS user_name')
                ->join('poli', 'antrian.poli = poli.id', 'left')
                ->join('user', 'antrian.user = user.id', 'left')
                ->where('antrian.date', $date)
                ->get();
        return $builder;
    }

    public function getAntrian($id)
    {        
        $builder = $this->db->table('antrian')
                    ->limit('1')
                    ->orderBy('nomor_antrian','DESC')
                    ->where('poli', $id)
                    ->where('date', date('Y-m-d'))
                    ->get();
        return $builder;
    }

    public function getAntrianByID()
    {        
        $builder = $this->db->table('antrian')
                    ->limit('1')
                    ->join('poli', 'poli.id = antrian.poli', 'left')
                    ->select('antrian.*, poli.title AS nama_poli')
                    ->orderBy('nomor_antrian','DESC')
                    ->where('date', date('Y-m-d'))
                    ->where('user', session()->get('id'))
                    ->get();
        return $builder;
    }

    public function getAntrianSaatIni()
    {        
        $builder = $this->db->table('antrian')
                    ->limit('1')
                    ->orderBy('nomor_antrian','ASC')
                    ->where('date', date('Y-m-d'))
                    ->where('status !=', 'SELESAI')
                    ->get();
        return $builder;
    }

    public function getAntrianSaatIniByKat()
    {        
        $builder = $this->db->table('antrian')
                    ->limit('4')
                    ->join('poli', 'poli.id = antrian.poli', 'left')
                    ->select('antrian.*, poli.title AS nama_poli')
                    ->orderBy('nomor_antrian','ASC')
                    ->orderBy('poli','DESC')
                    ->where('date', date('Y-m-d'))
                    ->where('status !=', 'SELESAI')
                    ->get();
        return $builder;
    }

    public function LatestDate()
    {
        $builder = $this->db->table('antrian')
                    ->limit('1')
                    ->orderBy('date', 'DESC')
                    ->where('status !=', 'SELESAI')
                    ->where('id', session()->get('id'))
                    ->where('date', date('Y-m-d'))
                    ->get();
        return $builder;
    }
}
