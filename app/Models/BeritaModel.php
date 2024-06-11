<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table = 'berita';
    protected $primaryKey = 'berita_id';
    protected $useTimestamps = true;

    protected $allowedFields = [
    'berita_id',
    'berita_sampul',
    'berita_judul',
    'berita_isi',
    'berita_slug',
    'berita_kategori',
    'berita_subkategori',
    'berita_penulis',
    'berita_tampil',
    'berita_tayang',
    'berita_is_penting',
    'berita_is_deleted',
    'deteled_at'
    ];

    // untuk menampilkan semua berita
    // get UserBerita->semua_berita()
    // get UserBerita->semua_pengumuman()
    public function getPaginated($num, $keyword = null, $kategori = null){
        if($kategori != null){
            $this->builder()
            ->select('berita.*, user.nama_asli as nama_user')
            ->where('berita_kategori', $kategori)
            ->where('berita_tampil', 1)
            ->join('user', 'berita.berita_penulis = user.user_id');
        }else {
            $this->builder()
            ->select('berita.*, user.nama_asli as nama_user')
            ->where('berita_tampil', 1)
            ->join('user', 'berita.berita_penulis = user.user_id');
        }
        
        return[
            'berita' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }

    // untuk menampilkan semua berita oleh admin
    // akses oleh admin dan superadmin
    // get Berita->index() 
    public function getAllByAdmin($whereLevel = null, $kategori = null)
    {
        $builder = $this->db->table('berita');
        $builder->select('berita.*, user.nama_asli as nama_user, kategori.kategori_nama as nama_kategori');
        if($whereLevel != null){
            $builder->where('berita_penulis', $whereLevel);
        }
        if($kategori != null){
            $builder->where('berita_kategori', $kategori);
        }else {
            $builder->where('berita_kategori !=', '2');
        }
        $builder->join('user', 'berita.berita_penulis = user.user_id');
        $builder->join('kategori', 'berita.berita_kategori = kategori.kategori_id');
        $builder->orderBy('berita_id', 'DESC');
        $result = $builder->get();
        return $result->getResultArray();
    }

    public function getAllBeritaPenting(){
        $builder = $this->db->table('berita');
        $builder->select('berita.*, user.nama_asli as nama_user');
        $builder->join('user', 'berita.berita_penulis = user.user_id');
        $builder->where('berita_is_penting', 1);
        $builder->where('berita_tampil', 1);
        $result = $builder->get();
        return $result->getRowArray();
    }

    public function getAllBeritaUmum($limit = 4){
        $builder = $this->db->table('berita');
        $builder->select('berita.*, user.nama_asli as nama_user');
        $builder->where('berita_kategori', 1);
        $builder->where('berita_tampil', 1);
        $builder->join('user', 'berita.berita_penulis = user.user_id');
        if($limit){
            $builder->limit($limit);
        }
        $result = $builder->get();
        return $result->getResultArray();
    }

    public function getAllBeritaPengumuman($limit = ''){
        $builder = $this->db->table('berita');
        $builder->select('berita.*, user.nama_asli as nama_user');
        $builder->where('berita_kategori', 2);
        $builder->where('berita_tampil', 1);
        $builder->join('user', 'berita.berita_penulis = user.user_id');
        if($limit){
            $builder->limit($limit);
        }
        $builder->orderBy('created_at','DESC');
        $result = $builder->get();
        return $result->getResultArray();
    }

    public function getDetailForEditByAdmin($slug = null)
    {
        $builder = $this->db->table('berita');
        $builder->select('berita.*');
        $builder->where('berita_slug', $slug);
        $result = $builder->get();
        return $result->getRowArray();
    }

    // untuk menampilkan detail berita di halaman admin
    // akses oleh admin dan superadmin
    // get Berita->detail($id) 
    public function getDetailByAdmin($id = null)
    {
        $builder = $this->db->table('berita');
        $builder->select('berita.*, user.nama_asli as nama_penulis, kategori.kategori_nama as nama_kategori');
        $builder->join('user', 'berita.berita_penulis = user.user_id');
        $builder->join('kategori', 'berita.berita_kategori = kategori.kategori_id');
        $builder->where('berita_id', $id);
        $result = $builder->get();
        return $result->getRowArray();
    }

    public function getDetailForUser($slug = null) {
        $builderdua = $this->db->table('berita');
        $builderdua->set('berita_tayang', 'berita_tayang+1', FALSE);
        $builderdua->where('berita_slug', $slug);
        $builderdua->update();

        $builder = $this->db->table('berita');
        $builder->select('berita.*, user.nama_asli as nama_user ');
        $builder->join('user', 'berita.berita_penulis = user.user_id');
        $builder->join('kategori', 'berita.berita_kategori = kategori.kategori_id');
        $builder->where('berita_slug', $slug);
        $result = $builder->get();
        return $result->getRowArray();
    }

    public function cekGambar($id = null)
    {
        $builder = $this->db->table('berita');
        $builder->select('berita_sampul');
        $builder->where('berita_id', $id);
        $result = $builder->get();
        return $result->getRowArray();
    }
}