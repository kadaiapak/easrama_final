<?php

namespace App\Models;

use CodeIgniter\Model;

class VideoProfilModel extends Model
{
    protected $table = 'video_profil';
    protected $primaryKey = 'vp_id';
    protected $useTimestamps = true;

    protected $allowedFields = [
    'vp_id',
    'vp_judul',
    'vp_deskripsi',
    'vp_youtube_link',
    'vp_youtube_title',
    'vp_is_active',
    'vp_penulis'
    ];

    public function getPaginated($num, $keyword = null, $kategori = null){
        if($kategori != null){
            $this->builder()
            ->select('video_profil.*, user.nama_asli as nama_user')
            ->where('berita_subkategori', $kategori)
            ->where('berita_tampil', 1)
            ->join('user', 'video_profil.vp_penulis = user.user_id');
        }else {
            $this->builder()
            ->select('video_profil.*, user.nama_asli as nama_user')
            ->where('berita_tampil', 1)
            ->join('user', 'video_profil.vp_penulis = user.user_id');
        }
        
        return[
            'video_profil' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }

    public function getAllByAdmin()
    {
        $builder = $this->db->table('video_profil');
        $builder->select('video_profil.*, user.nama_asli as nama_user');
        $builder->join('user', 'video_profil.vp_penulis = user.user_id');
        $result = $builder->get();
        return $result->getResultArray();
    }

    public function getLastActive()
    {
        $builder = $this->db->table('video_profil');
        $builder->select('video_profil.*, user.nama_asli as nama_user');
        $builder->join('user', 'video_profil.vp_penulis = user.user_id');
        $builder->where('vp_is_active', 1);
        $builder->orderBy('vp_id', 'ASC');
        $result = $builder->get();
        return $result->getRowArray();
    }

    public function getDetail($slug = null)
    {
        $builder = $this->db->table('video_profil');
        $builder->select('video_profil.*, user.nama_asli as nama_user ');
        $builder->join('user', 'video_profil.vp_penulis = user.user_id');
        $builder->where('vp_id', $slug);
        $result = $builder->get();
        return $result->getRowArray();
    }
}