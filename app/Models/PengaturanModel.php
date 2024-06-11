<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaturanModel extends Model
{
    protected $table = 'pengaturan';
    protected $primaryKey = 'pengaturan_id';
    protected $allowedFields = [
    'pengaturan_sesi',
    'pengaturan_nama',
    'pengaturan_slug',
    'pengaturan_logo',
    'pengaturan_isi',
    ];

    public function getVisiMisi()
    {
        $builder = $this->db->table('pengaturan');
        $builder->select('*');
        $builder->where('pengaturan_sesi', 'visimisi');
        $result = $builder->get();
        return $result->getResultArray();
    }

    public function getGrafikMahasiswa()
    {
        $builder = $this->db->table('pengaturan');
        $builder->select('*');
        $builder->where('pengaturan_sesi', 'rincian');
        $result = $builder->get();
        return $result->getResultArray();
    }

    public function getDetailGrafikMahasiswa($id = '')
    {
        $builder = $this->db->table('pengaturan');
        $builder->select('*');
        $builder->where('pengaturan_sesi', 'rincian');
        $builder->where('pengaturan_id', $id);
        $result = $builder->get();
        return $result->getRowArray();
    }

    public function getHeaderPrestasi()
    {
        $builder = $this->db->table('pengaturan');
        $builder->select('*');
        $builder->where('pengaturan_sesi','prestasi');
        $result = $builder->get();
        return $result->getRowArray();
    }

    public function getDetailForEdit($id = null)
    {
        $builder = $this->db->table('pengaturan');
        $builder->select('*');
        $builder->where('pengaturan_id', $id);
        $result = $builder->get();
        return $result->getRowArray();
    }

    // public function getAll($limit = null)
    // {
    //     $builder = $this->db->table('kategori');
    //     $builder->select('*');
    //     $builder->where('ukormawa_tampil', 1);
    //     if($limit){
    //         $builder->limit($limit);
    //     }
    //     $result = $builder->get();
    //     return $result->getResultArray();
    // }

    // public function getAllByAdmin($limit = null)
    // {
    //     $builder = $this->db->table('kategori');
    //     $builder->select('*');
    //     if($limit){
    //         $builder->limit($limit);
    //     }
    //     $result = $builder->get();
    //     return $result->getResultArray();
    // }
}