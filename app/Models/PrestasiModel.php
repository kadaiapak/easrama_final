<?php

namespace App\Models;

use CodeIgniter\Model;

class PrestasiModel extends Model
{
    protected $table = 'prestasi';
    protected $primaryKey = 'prestasi_id';
    protected $useTimestamps = true;

    protected $allowedFields = [
    'prestasi_id',
    'prestasi_judul',
    'prestasi_slug',
    'prestasi_sampul',
    'prestasi_deskripsi',
    'prestasi_penyelenggara',
    'prestasi_tahun',
    'prestasi_tanggal_mulai',
    'prestasi_tanggal_selesai',
    'prestasi_tingkat',
    'prestasi_peringkat',
    'prestasi_juara',
    'prestasi_nim',
    'prestasi_nama',
    'prestasi_departemen',
    'prestasi_sertifikat',
    'prestasi_penulis'
    ];

    // public function getPaginated($num, $keyword = null, $kategori = null){
    //     if($kategori != null){
    //         $this->builder()
    //         ->select('berita.*, user.nama_asli as nama_user')
    //         ->where('berita_kategori', $kategori)
    //         ->where('berita_tampil', 1)
    //         ->join('user', 'berita.berita_penulis = user.user_id');
    //     }else {
    //         $this->builder()
    //         ->select('berita.*, user.nama_asli as nama_user')
    //         ->where('berita_tampil', 1)
    //         ->join('user', 'berita.berita_penulis = user.user_id');
    //     }
        
    //     return[
    //         'berita' => $this->paginate($num),
    //         'pager' => $this->pager,
    //     ];
    // }

    public function getAllByAdmin()
    {
        $builder = $this->db->table('prestasi');
        $builder->select('prestasi.*, user.nama_asli as nama_user, departemen.departemen_nama as nama_departemen');
        $builder->join('user', 'prestasi.prestasi_penulis = user.user_id');
        $builder->join('departemen', 'prestasi.prestasi_departemen = departemen.departemen_id');
        $result = $builder->get();
        return $result->getResultArray();
    }

    public function getAll($limit = '')
    {
        $builder = $this->db->table('prestasi');
        $builder->select('prestasi.*, user.nama_asli as nama_user, departemen.departemen_nama as nama_departemen');
        $builder->join('user', 'prestasi.prestasi_penulis = user.user_id');
        $builder->join('departemen', 'prestasi.prestasi_departemen = departemen.departemen_id');
        if($limit) {
            $builder->limit($limit);
        }
        $result = $builder->get();
        return $result->getResultArray();
    }

    // public function getAllBeritaPenting(){
    //     $builder = $this->db->table('berita');
    //     $builder->select('berita.*, user.nama_asli as nama_user');
    //     $builder->join('user', 'berita.berita_penulis = user.user_id');
    //     $builder->where('berita_is_penting', 1);
    //     $builder->where('berita_tampil', 1);
    //     $result = $builder->get();
    //     return $result->getRowArray();
    // }

    // public function getAllBeritaUmum($limit = 4){
    //     $builder = $this->db->table('berita');
    //     $builder->select('berita.*, user.nama_asli as nama_user');
    //     $builder->where('berita_kategori', 1);
    //     $builder->where('berita_tampil', 1);
    //     $builder->join('user', 'berita.berita_penulis = user.user_id');
    //     if($limit){
    //         $builder->limit($limit);
    //     }
    //     $result = $builder->get();
    //     return $result->getResultArray();
    // }


    public function getDetailForEdit($slug = null) {
        $builder = $this->db->table('prestasi');
        $builder->select('prestasi.*, user.nama_asli as nama_user ');
        $builder->join('user', 'prestasi.prestasi_penulis = user.user_id');
        $builder->where('prestasi_slug', $slug);
        $result = $builder->get();
        return $result->getRowArray();
    }

    public function getDetailForUser($slug = null) {
        $builder = $this->db->table('prestasi');
        $builder->select('prestasi.*, user.nama_asli as nama_user ');
        $builder->join('user', 'prestasi.prestasi_penulis = user.user_id');
        $builder->where('prestasi_slug', $slug);
        $result = $builder->get();
        return $result->getRowArray();
    }
    
}