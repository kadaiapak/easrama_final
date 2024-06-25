<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;

    protected $allowedFields = [
    'id',
    'no_pendaftaran',
    'username',
    'foto',
    'nama',
    'jk',
    'no_hp',
    'no_wa',
    'id_kamar',
    'id_kelas',
    'alamat',
    'kelurahan_desa',
    'kecamatan',
    'kabupaten_kota',
    'provinsi',
    'tanggal_pendaftaran',
    'bulan_pendaftaran',
    'tahun_pendaftaran',
    'status',
    'created_at',
    'updated_at'
    ];

    // untuk mendapatkan nomor pendaftar terakhir agar bisa digunakan untuk nomor pendaftaran siswa baru
    // $routes->post('/daftar/simpan', 'UserDaftar::simpan');
    // akses oleh semua
    public function getNomorPendaftarTerakhir()
    {
        $builder = $this->db->table('siswa');
        $builder->select('id');
        $builder->orderBy('id', 'DESC');
        $result = $builder->get();
        return $result->getRowArray();
    }

    public function cekVerifikasiSantri($username)
    {       
        $builder = $this->db->table('siswa');
        $builder->select('status');
        $builder->where('username', $username);
        $result = $builder->get();
        return $result->getRowArray();
    }

    public function getAllPendaftarByAdmin($tahun = null)
    {
        $builder = $this->db->table('siswa');
        $builder->select('siswa.*');
        $builder->where('status',1);
        if($tahun != null) {
            $builder->where('tahun_pendaftaran',$tahun);
        }
        $builder->orderBy('id', 'DESC');
        $result = $builder->get();
        return $result->getResultArray();
    }

    public function getAllSiswaTerdaftarByAdmin($tahun = null)
    {
        $builder = $this->db->table('siswa');
        $builder->select('siswa.*');
        $builder->where('status',3);
        if($tahun != null) {
            $builder->where('tahun_pendaftaran',$tahun);
        }
        $builder->orderBy('id', 'DESC');
        $result = $builder->get();
        return $result->getResultArray();
    }

    public function getForEdit($id = null) 
    {
        $builder = $this->db->table('siswa');
        $builder->select('siswa.*, kamar.nama as nama_kamar, kelas.nama as nama_kelas');
        $builder->where('siswa.id', $id);
        $builder->join('kamar', 'siswa.id_kamar = kamar.id', 'left');
        $builder->join('kelas', 'siswa.id_kelas = kelas.id', 'left');
        $result = $builder->get();
        return $result->getRowArray();
    }

    public function getAllPendaftarExportExcel($tahun = null) 
    {
        $builder = $this->db->table('siswa');
        $builder->select('siswa.*');
        $builder->where('status',1);
        if($tahun != null) {
            $builder->where('tahun_pendaftaran',$tahun);
        }
        $builder->orderBy('id', 'DESC');
        $result = $builder->get();
        return $result->getResultArray();
    }

    public function getAllSiswaBelumAdaKamar()
    {
        $builder = $this->db->table('siswa');
        $builder->select('*');
        $builder->where('status', 3);
        $builder->where('id_kamar', null);
        $builder->orderBy('id', 'DESC');
        $result = $builder->get();
        return $result->getResultArray();
    }

    public function getAllSiswaSudahAdaKamar($id_kamar = null)
    {
        $builder = $this->db->table('siswa');
        $builder->select('siswa.*, kamar.nama as nama_kamar, kelas.nama as nama_kelas');
        $builder->groupStart();
        $builder->where('siswa.status', 3);
        $builder->where('id_kamar is NOT NULL', NULL, FALSE);
        $builder->groupEnd();
        if($id_kamar != null) {
            $builder->where('siswa.id_kamar', $id_kamar);
        }
        $builder->join('kamar', 'siswa.id_kamar = kamar.id');
        $builder->join('kelas', 'siswa.id_kelas = kelas.id', 'left');
        $builder->orderBy('id_kamar', 'ASC');
        $result = $builder->get();
        return $result->getResultArray();
    }

    public function getAllSiswaBelumAdaKelas()
    {
        $builder = $this->db->table('siswa');
        $builder->select('*');
        $builder->where('status', 3);
        $builder->where('id_kelas', null);
        $builder->orderBy('id', 'DESC');
        $result = $builder->get();
        return $result->getResultArray();
    }

    public function getAllSiswaSudahAdaKelas($id_kelas = null)
    {
        $builder = $this->db->table('siswa');
        $builder->select('siswa.*, kelas.nama as nama_kelas, kamar.nama as nama_kamar');
        $builder->groupStart();
        $builder->where('siswa.status', 3);
        $builder->where('id_kelas is NOT NULL', NULL, FALSE);
        $builder->groupEnd();
        if($id_kelas != null) {
            $builder->where('siswa.id_kelas', $id_kelas);
        }
        $builder->join('kelas', 'siswa.id_kelas = kelas.id');
        $builder->join('kamar', 'siswa.id_kamar = kamar.id', 'left');
        $builder->orderBy('id_kelas', 'ASC');
        $result = $builder->get();
        return $result->getResultArray();
    }
    

    public function getAllMasterSiswa($tahun = null, $status = null)
    {
        $builder = $this->db->table('siswa');
        $builder->select('siswa.*, kelas.nama as nama_kelas, kamar.nama as nama_kamar');
        if($status != null && $status != 4){
        $builder->groupStart();
        $builder->where('siswa.status', $status);
        $builder->groupEnd(); 
        }elseif ($status == null) {
        $builder->groupStart();
        $builder->where('siswa.status', 3);
        $builder->groupEnd(); 
        }
        if($tahun != null && $tahun != 'a'){
            $builder->where('tahun_pendaftaran', $tahun);
        }
        $builder->join('kelas', 'siswa.id_kelas = kelas.id', 'left');
        $builder->join('kamar', 'siswa.id_kamar = kamar.id', 'left');
        $builder->orderBy('id_kelas', 'DESC');
        $result = $builder->get();
        return $result->getResultArray();
    }

    public function getDaftarPenghuniKamarBySantri($username = null)
    {
        $build = $this->db->query(
            'SELECT siswa.nama as nama_siswa, siswa.no_wa as nowa_siswa
            FROM siswa
            WHERE id_kamar = (SELECT id_kamar FROM siswa WHERE username = "'.$username.'")');
        $result = $build->getResultArray();
        return $result;
    }

    public function getDaftarPelajaranBySantri($username = null)
    {
        $build = $this->db->query(
            'SELECT pelajaran_kelas.*, pelajaran.nama as mata_pelajaran, hari.nama as nama_hari, user.nama_asli as nama_guru
            FROM pelajaran_kelas
            JOIN pelajaran ON pelajaran_kelas.id_pelajaran = pelajaran.id
            JOIN hari ON pelajaran_kelas.hari = hari.id
            LEFT JOIN user ON pelajaran_kelas.guru = user.user_id
            WHERE id_kelas = (SELECT id_kelas FROM siswa WHERE username = "'.$username.'")
            ORDER BY hari ASC,
            jam_pelajaran ASC');
        $result = $build->getResultArray();
        return $result;
    }

    // untuk menampilkan semua berita
    // get UserBerita->semua_berita()
    // get UserBerita->semua_pengumuman()

    // untuk menampilkan semua berita oleh admin
    // akses oleh admin dan superadmin
    // get Berita->index() 
    // public function getAllByAdmin($whereLevel = null, $kategori = null)
    // {
    //     $builder = $this->db->table('berita');
    //     $builder->select('berita.*, user.nama_asli as nama_user, kategori.kategori_nama as nama_kategori');
    //     if($whereLevel != null){
    //         $builder->where('berita_penulis', $whereLevel);
    //     }
    //     if($kategori != null){
    //         $builder->where('berita_kategori', $kategori);
    //     }else {
    //         $builder->where('berita_kategori !=', '2');
    //     }
    //     $builder->join('user', 'berita.berita_penulis = user.user_id');
    //     $builder->join('kategori', 'berita.berita_kategori = kategori.kategori_id');
    //     $builder->orderBy('berita_id', 'DESC');
    //     $result = $builder->get();
    //     return $result->getResultArray();
    // }

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

    // public function getAllBeritaPengumuman($limit = ''){
    //     $builder = $this->db->table('berita');
    //     $builder->select('berita.*, user.nama_asli as nama_user');
    //     $builder->where('berita_kategori', 2);
    //     $builder->where('berita_tampil', 1);
    //     $builder->join('user', 'berita.berita_penulis = user.user_id');
    //     if($limit){
    //         $builder->limit($limit);
    //     }
    //     $builder->orderBy('created_at','DESC');
    //     $result = $builder->get();
    //     return $result->getResultArray();
    // }

    // public function getDetailForEditByAdmin($slug = null)
    // {
    //     $builder = $this->db->table('berita');
    //     $builder->select('berita.*');
    //     $builder->where('berita_slug', $slug);
    //     $result = $builder->get();
    //     return $result->getRowArray();
    // }

    // untuk menampilkan detail berita di halaman admin
    // akses oleh admin dan superadmin
    // get Berita->detail($id) 
    // public function getDetailByAdmin($id = null)
    // {
    //     $builder = $this->db->table('berita');
    //     $builder->select('berita.*, user.nama_asli as nama_penulis, kategori.kategori_nama as nama_kategori');
    //     $builder->join('user', 'berita.berita_penulis = user.user_id');
    //     $builder->join('kategori', 'berita.berita_kategori = kategori.kategori_id');
    //     $builder->where('berita_id', $id);
    //     $result = $builder->get();
    //     return $result->getRowArray();
    // }

    // public function getDetailForUser($slug = null) {
    //     $builderdua = $this->db->table('berita');
    //     $builderdua->set('berita_tayang', 'berita_tayang+1', FALSE);
    //     $builderdua->where('berita_slug', $slug);
    //     $builderdua->update();

    //     $builder = $this->db->table('berita');
    //     $builder->select('berita.*, user.nama_asli as nama_user ');
    //     $builder->join('user', 'berita.berita_penulis = user.user_id');
    //     $builder->join('kategori', 'berita.berita_kategori = kategori.kategori_id');
    //     $builder->where('berita_slug', $slug);
    //     $result = $builder->get();
    //     return $result->getRowArray();
    // }

    // public function cekGambar($id = null)
    // {
    //     $builder = $this->db->table('berita');
    //     $builder->select('berita_sampul');
    //     $builder->where('berita_id', $id);
    //     $result = $builder->get();
    //     return $result->getRowArray();
    // }
}