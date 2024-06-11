<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoriKamarSiswaModel extends Model
{
    protected $table = 'histori_kamar_siswa';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;

    protected $allowedFields = [
    'id_siswa',
    'id_kamar',
    'keterangan',
    'created_at',
    'updated_at',
    ];

    public function getAllByAdmin($id_kamar = null){
        $builder = $this->db->table('histori_kamar_siswa');
        $builder->select('histori_kamar_siswa.*, siswa.nama as nama_siswa, kamar.nama as nama_kamar');
        if($id_kamar != null){
            $builder->where('histori_kamar_siswa.id_kamar', $id_kamar);
        }
        $builder->join('siswa','histori_kamar_siswa.id_siswa = siswa.id');
        $builder->join('kamar','histori_kamar_siswa.id_kamar = kamar.id', 'left');
        $builder->orderBy('nama_siswa');
        $result = $builder->get();
        return $result->getResultArray();
    }
}