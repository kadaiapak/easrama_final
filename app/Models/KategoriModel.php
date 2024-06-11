<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'kategori_id';
    protected $useTimestamps = true;

    protected $allowedFields = [
    'kategori_nama',
    'kategori_slug',
    'kategori_is_active',
    ];

    public function getAll($limit = null)
    {
        $builder = $this->db->table('kategori');
        $builder->select('*');
        $builder->where('ukormawa_tampil', 1);
        if($limit){
            $builder->limit($limit);
        }
        $result = $builder->get();
        return $result->getResultArray();
    }

    public function getAllByAdmin($limit = null)
    {
        $builder = $this->db->table('kategori');
        $builder->select('*');
        if($limit){
            $builder->limit($limit);
        }
        $result = $builder->get();
        return $result->getResultArray();
    }

    public function getDetailForEdit($id = null)
    {
        $builder = $this->db->table('kategori');
        $builder->select('*');
        $builder->where('kategori_id', $id);
        $result = $builder->get();
        return $result->getRowArray();
    }
}