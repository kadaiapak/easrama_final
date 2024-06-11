<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'kode_menu';
    protected $useTimestamps = true;

    protected $allowedFields = [
    'nama_menu',
    'url',
    'level',
    'jenis',
    'main_menu',
    'is_active',
    'no_urut',
    'created_at',
    'updated_at'
    ];

    public function getAll()
    {
        $builder = $this->db->table('menu');
        $builder->select('menu.*, join_menu.nama_menu as nama_join_menu');
        $builder->join('menu join_menu','menu.main_menu = join_menu.kode_menu','left');
        $builder->orderBy('no_urut', 'ASC');
        $result = $builder->get();
        return $result->getResultArray();
    }

    public function getAllMainMenu()
    {
        $builder = $this->db->table('menu');
        $builder->select('*');
        $builder->where('is_active', 1);
        $builder->where('level', 'main_menu');
        $builder->orderBy('no_urut', 'ASC');
        $result = $builder->get();
        return $result->getResultArray();
    }

    public function getAllMenuUntukTambahHalaman()
    {
        $builder = $this->db->table('menu');
        $builder->select('*');
        $builder->where('is_active', 1);
        $builder->groupStart();
        $builder->where('level', 'sub_menu');
        $builder->orWhere('level', 'single_menu');
        $builder->groupEnd();
        $builder->orderBy('no_urut', 'ASC');
        $result = $builder->get();
        return $result->getResultArray();
    }

    public function getDetailMenuForEdit($id = null)
    {
        $builder = $this->db->table('menu');
        $builder->select('*');
        $builder->groupStart();
        $builder->where('level', 'main_menu');
        $builder->orWhere('level', 'single_menu');
        $builder->groupEnd();
        $builder->where('kode_menu', $id);
        $result = $builder->get();
        return $result->getRowArray();  
    }

    public function getDetailSubMenuForEdit($id = null)
    {
        $builder = $this->db->table('menu');
        $builder->select('*');
        $builder->where('level', 'sub_menu');
        $builder->where('kode_menu', $id);
        $result = $builder->get();
        return $result->getRowArray();  
    }

    // public function delete($id = null)
    // {
    //     $builder = $this->db->table('menu');
    //     $builder->select('*');
    //     $builder->where('level', 'sub_menu');
    //     $builder->where('kode_menu', $id);
    //     $result = $builder->get();
    //     return $result->getRowArray();
    // }

    public function cekApakahBisaDihapus($id)
    {
        $builder = $this->db->table('menu');
        $builder->where('main_menu', $id);
        $builder->selectCount('nama_menu');
        $result = $builder->get();
        return $result->getRowArray();
    }

    // public function getAllByAdmin($limit = null)
    // {
    //     $builder = $this->db->table('kategori');
    //     $builder->select('*');
    //     if($limit){
    //         $builder->limit($limit);
    //     }
    //     $result = $builder->get();
    //     return $result->getResultArray();
    // }

    // public function getDetailForEdit($id = null)
    // {
    //     $builder = $this->db->table('kategori');
    //     $builder->select('*');
    //     $builder->where('kategori_id', $id);
    //     $result = $builder->get();
    //     return $result->getRowArray();
    // }
}