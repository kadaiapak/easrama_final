<?php

namespace App\Models;

use CodeIgniter\Model;

class PelajaranModel extends Model
{
    protected $table = 'pelajaran';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;

    protected $allowedFields = [
    'nama',
    'slug',
    'keterangan',
    'kapasitas',
    'status',
    'created_at',
    'updated_at',
    ];

    public function getAllByAdmin()
    {
        $builder = $this->db->table('pelajaran');
        $builder->select('*');
        $result = $builder->get();
        return $result->getResultArray();
    }

    public function getDetailForEdit($slug = null)
    {
        $builder = $this->db->table('pelajaran');
        $builder->select('*');
        $builder->where('slug', $slug);
        $result = $builder->get();
        return $result->getRowArray();
    }
}