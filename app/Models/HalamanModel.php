<?php

namespace App\Models;

use CodeIgniter\Model;

class HalamanModel extends Model
{
    protected $table = 'halaman';
    protected $primaryKey = 'halaman_id';
    protected $useTimestamps = true;

    protected $allowedFields = [
    'menu_id',
    'penulis',
    'halaman_nama',
    'halaman_slug',
    'halaman_cover',
    'halaman_isi',
    'halaman_judul_isi',
    'halaman_is_active',
    'created_at',
    'updated_at'
    ];

    public function getAllByAdmin()
    {
        $builder = $this->db->table('halaman');
        $builder->select('halaman.*, menu.nama_menu as nama_menu, user.nama_asli as nama_penulis');
        $builder->join('menu', 'halaman.menu_id = menu.kode_menu');
        $builder->join('user', 'halaman.penulis = user.user_id');
        $result = $builder->get();
        return $result->getResultArray();
    }

    public function getDetailByAdmin($id)
    {
        $builder = $this->db->table('halaman');
        $builder->select('halaman.*, user.nama_asli as nama_user, menu.nama_menu as nama_menu');
        $builder->join('user', 'halaman.penulis = user.user_id');
        $builder->join('menu', 'halaman.menu_id = menu.kode_menu');
        $builder->where('halaman_id', $id);
        $result = $builder->get();
        return $result->getRowArray();
    }

    public function getDetailForUser($slug = null) {
        $builder = $this->db->table('halaman');
        $builder->select('halaman.*, user.nama_asli as nama_user');
        $builder->join('user', 'halaman.penulis = user.user_id');
        $builder->where('halaman_slug', $slug);
        $result = $builder->get();
        return $result->getRowArray();
    }

    public function getDetailforEdit($slug = null)
    {
        $builder = $this->db->table('halaman');
        $builder->select('*');
        $builder->where('halaman_slug', $slug);
        $result = $builder->get();
        return $result->getRowArray();
    }

    public function cekGambar($id = null)
    {
        $builder = $this->db->table('halaman');
        $builder->select('halaman_cover');
        $builder->where('halaman_id', $id);
        $result = $builder->get();
        return $result->getRowArray();
    }
}