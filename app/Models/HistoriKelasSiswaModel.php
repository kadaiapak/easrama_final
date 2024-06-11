<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoriKelasSiswaModel extends Model
{
    protected $table = 'histori_kelas_siswa';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;

    protected $allowedFields = [
    'id_siswa',
    'id_kelas',
    'keterangan',
    'created_at',
    'updated_at',
    ];

    public function getAllByAdmin($id_kelas = null){
        $builder = $this->db->table('histori_kelas_siswa');
        $builder->select('histori_kelas_siswa.*, siswa.nama as nama_siswa, kelas.nama as nama_kelas');
        if($id_kelas != null) {
            $builder->where('histori_kelas_siswa.id_kelas', $id_kelas);
        }
        $builder->join('siswa','histori_kelas_siswa.id_siswa = siswa.id');
        $builder->join('kelas','histori_kelas_siswa.id_kelas = kelas.id', 'left');
        $builder->orderBy('nama_siswa');
        $result = $builder->get();
        return $result->getResultArray();
    }
}