<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $table = 'kelas';
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
        $builder = $this->db->table('kelas');
        $builder->select('*');
        $result = $builder->get();
        return $result->getResultArray();
    }

    public function getAllDetailByAdmin()
    {
        $build = $this->db->query(
            "SELECT kelas.*,
            (SELECT COUNT(siswa.id_kelas) FROM siswa 
                WHERE siswa.id_kelas = kelas.id) AS total_siswa
            FROM kelas 
            ORDER BY kelas.id ASC");
        $result = $build->getResultArray();
        return $result;
    }

    public function getDetailForEdit($slug = null)
    {
        $builder = $this->db->table('kelas');
        $builder->select('*');
        $builder->where('slug', $slug);
        $result = $builder->get();
        return $result->getRowArray();
    }
}