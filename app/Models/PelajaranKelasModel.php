<?php

namespace App\Models;

use CodeIgniter\Model;

class PelajaranKelasModel extends Model
{
    protected $table = 'pelajaran_kelas';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;

    protected $allowedFields = [
    'nama',
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
        $builder->select('pelajaran_kelas.*, kelas.nama as nama_kelas, pelajaran.nama as nama_pelajaran');
        if($id_kelas != null){
            $builder->where('id_kelas', $id_kelas);
        }
        $builder->join('kelas','pelajaran_kelas.id_kelas = kelas.id');
        $builder->join('pelajaran','pelajaran_kelas.id_pelajaran = pelajaran.id');
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
}