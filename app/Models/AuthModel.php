<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';

    protected $useTimestamps = true;
    protected $allowedFields = ['nama_asli',
    'username',
    'password',
    'user_foto',
    'user_uuid',
    'level',
    'terakhir_login'];

    public function login($username)
    {
        $builder = $this->db->table('user');
        $builder->select('user.*,user_level.user_level_nama');
        $builder->join('user_level', 'user_level.user_level_id = user.level');
        $builder->where('username', $username);
        $query = $builder->get();
        return $query->getRowArray(); 
    }
}