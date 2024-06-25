<?php

namespace App\Models;

use CodeIgniter\Model;

class PelajaranKelasModel extends Model
{
    protected $table = 'pelajaran_kelas';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;

    protected $allowedFields = [
    'hari',
    'jam_pelajaran',
    'id_kelas',
    'id_pelajaran',
    'guru',
    'created_at',
    'updated_at',
    ];

    public function getAllPelajaranKelasByAdmin($id_kelas = null)
    {
        $builder = $this->db->table('pelajaran_kelas');
        $builder->select('pelajaran_kelas.*, kelas.nama as nama_kelas, pelajaran.nama as nama_pelajaran, hari.nama as nama_hari, user.nama_asli as nama_guru');
        if($id_kelas != null){
            $builder->where('id_kelas', $id_kelas);
        }
        $builder->join('kelas','pelajaran_kelas.id_kelas = kelas.id');
        $builder->join('pelajaran','pelajaran_kelas.id_pelajaran = pelajaran.id');
        $builder->join('hari','pelajaran_kelas.hari = hari.id', 'LEFT');
        $builder->join('user','pelajaran_kelas.guru = user.user_id', 'LEFT');
        $builder->orderBy('id_kelas','ASC');
        $builder->orderBy('jam_pelajaran','ASC');
        $result = $builder->get();
        return $result->getResultArray();
    }

    public function getDetailForEdit($id = null)
    {
        $builder = $this->db->table('pelajaran_kelas');
        $builder->select('pelajaran_kelas.*, kelas.nama as nama_kelas, pelajaran.nama as nama_pelajaran');
        $builder->join('kelas','pelajaran_kelas.id_kelas = kelas.id');
        $builder->join('pelajaran','pelajaran_kelas.id_pelajaran = pelajaran.id');
        if($id != null){
            $builder->where('pelajaran_kelas.id =', $id);
        }
        $result = $builder->get();
        return $result->getRowArray();
    }

    public function cekBisaDihapus($id_pelajaran)
    {
        $builder = $this->db->table('pelajaran_kelas');
        $builder->select('pelajaran_kelas.*, kelas.nama as nama_kelas, pelajaran.nama as nama_pelajaran');
        $builder->join('kelas','pelajaran_kelas.id_kelas = kelas.id');
        $builder->join('pelajaran','pelajaran_kelas.id_pelajaran = pelajaran.id');
        $builder->where('id_pelajaran =', $id_pelajaran);
        $result = $builder->get();
        return $result->getResultArray();
    }

    public function getJadwalMengajarByGuru($user_id)
    {
        $build = $this->db->query(
            'SELECT pelajaran_kelas.*, pelajaran.nama as mata_pelajaran, hari.nama as nama_hari, user.nama_asli as nama_guru, kelas.nama as nama_kelas
            FROM pelajaran_kelas
            JOIN pelajaran ON pelajaran_kelas.id_pelajaran = pelajaran.id
            JOIN hari ON pelajaran_kelas.hari = hari.id
            JOIN kelas ON pelajaran_kelas.id_kelas = kelas.id
            LEFT JOIN user ON pelajaran_kelas.guru = user.user_id
            WHERE guru = "'.$user_id.'"
            ORDER BY hari ASC,
            jam_pelajaran ASC');
        $result = $build->getResultArray();
        return $result;
    }
}