<?php

namespace App\Models;

use CodeIgniter\Model;

class KamarModel extends Model
{
    protected $table = 'kamar';
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
        $builder = $this->db->table('kamar');
        $builder->select('*');
        $result = $builder->get();
        return $result->getResultArray();
    }

    public function getDetailForEdit($slug = null)
    {
        $builder = $this->db->table('kamar');
        $builder->select('*');
        $builder->where('slug', $slug);
        $result = $builder->get();
        return $result->getRowArray();
    }

    public function getAllDetailByAdmin()
    {
        $build = $this->db->query(
            "SELECT kamar.*,
            (SELECT COUNT(siswa.id_kamar) FROM siswa 
                WHERE siswa.id_kamar = kamar.id) AS total_penghuni
            FROM kamar 
            ORDER BY kamar.id ASC");
        $result = $build->getResultArray();
        return $result;
    }
}