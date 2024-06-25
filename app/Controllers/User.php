<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\UserLevelModel;
use App\Models\AuthModel;



class User extends BaseController
{
    protected $userModel;
    protected $userLevelModel;
    protected $authModel;

    public function __construct()
    {
        helper('form');
        $this->userModel = new UserModel();
        $this->userLevelModel = new UserLevelModel();
        $this->authModel = new AuthModel();
    }

    public function index()
    {
        $semuaUser = $this->userModel->getAll();
        $rekapUser = $this->userModel->getRekapUser();
        $data = [
            'judul' => 'User',
            'rekap_user' => $rekapUser,
            'semua_user' => $semuaUser,
        ];
        return view('user/v_user', $data);
    }
    
    public function tambah()
    {   
        $level = $this->userLevelModel->findAll();
        $data = [
            'judul' => 'Tambah User',
            'level' => $level
        ];
        return view('user/v_tambah_user', $data);
    }

    public function simpan()
    {
        if(!$this->validate([
            'nama_asli' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Tuliskan Nama Lengkap',
                    'alpha_space' => 'Nama hanya boleh huruf dan spasi',
                ]
            ],
            'username' => [
                'rules' => 'required|alpha_numeric|is_unique[user.username]',
                'errors' => [
                    'required' => 'Inputkan email user',
                    'alpha_numeric' => 'Username hanya huruf dan angka tanpa spasi dan spesial karakter',
                    'is_unique' => 'Username sudah dipakai',
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]|cek_spasi',
                'errors' => [
                    'required' => 'Tuliskan Password',
                    'min_length' => 'Password tidak kuat',
                    'cek_spasi' => 'Password tidak boleh ada spasi'
                ]
            ],
            'passwordconf' => [
                'rules' => 'required|min_length[6]|matches[password]',
                'errors' => [
                    'required' => 'Tuliskan Konfirmasi Password',
                    'min_length' => 'Password tidak kuat',
                    'matches' => 'Password dan password konfirmasi tidak cocok',
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Level User'
                ]
            ],
        ])){
            return redirect()->back()->withInput();
        }
        $password = password_hash($this->request->getVar('password'), PASSWORD_BCRYPT);
        $data = array(
            'nama_asli' => $this->request->getVar('nama_asli'),
            'username' => $this->request->getVar('username'),
            'password' => $password,
            'user_foto' => 'no-photo.jpg',
            'level' => $this->request->getVar('level'),
            'is_aktif' => 1,
        );
        $this->userModel->insert($data);
        return redirect()->to('/user')->with('sukses','Data berhasil disimpan!');
    }

    public function detail($id = '')
    {
        if($id == '') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $data = [
            'judul' => 'Detail User',
            'detailUser' => $this->userModel->find($id)
        ];
        return view('user/v_detail_user', $data);
    }

    public function edit($id = '')
    {
        if($id == '') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $semuaUserLevel = $this->userLevelModel->getAllWhere();
        $data = [
            'judul' => 'Edit User',
            'detailUser' => $this->userModel->find($id),
            'semuaUserLevel' => $semuaUserLevel
        ];
        return view('user/v_edit_user', $data);
    }

    public function edit_password($id = '')
    {
        if($id == '') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $data = [
            'judul' => 'Edit Password',
            'detailUser' => $this->userModel->find($id),
        ];
        return view('user/v_edit_password_user', $data);
    }

    public function update($id = ''){
        if($id == ''){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        if(!$this->validate([
            'nama_asli' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Inputkan nama asli'
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Inputkan username'
                ]
            ],
        ])){
            return redirect()->back()->withInput();
        }
        $data = array(
            'nama_asli' => $this->request->getVar('nama_asli'),
            'username' => $this->request->getVar('username'),
            'level' => $this->request->getVar('level'),
        );
        $this->userModel->update($id, $data);
        return redirect()->to('/user')->with('sukses','Data berhasil diubah!');
    }

    public function update_password($id = ''){
        if($id == ''){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        if(!$this->validate([
            'password_lama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'PASSWORD LAMA tidak boleh kosong'
                ]
            ],
            'password_baru' => [
                'rules' => 'required|min_length[6]|cek_spasi',
                'errors' => [
                    'required' => 'Tuliskan PASSWORD BARU',
                    'min_length' => 'Password tidak kuat',
                    'cek_spasi' => 'Password tidak boleh ada spasi'
                ]
            ],
            'conf_password_baru' => [
                'rules' => 'required|min_length[6]|matches[password_baru]',
                'errors' => [
                    'required' => 'Tuliskan KONFIRMASI PASSWORD BARU',
                    'min_length' => 'Password tidak kuat',
                    'matches' => 'PASSWORD dan PASSWORD KONFIRMASI tidak cocok',
                ]
            ],
        ])){
            return redirect()->back()->withInput();
        }
        $username = $this->request->getVar('username');
        $cek = $this->authModel->login($username);
        if($cek){
            $password = $this->request->getVar('password_lama');
            if(password_verify($password, $cek['password'])){
                $hash_password_baru = password_hash($this->request->getVar('password_baru'), PASSWORD_BCRYPT);
                $data = array(
                    'password' => $hash_password_baru,
                );
                $this->userModel->update($id, $data);
                return redirect()->to('/user')->with('sukses','Data berhasil diubah!');
            }else {
                return redirect()->to('/user')->with('gagal','Username atau Password salah!');
            }
        }
    }

    // callback function untuk validation rules
    function cek_spasi($str)
    {
        $pattern = '/ /';
        $result = preg_match($pattern, $str);

        if ($result){
            $this->form_validation->set_message('username_check', 'The %s field can not have a " "');
            return FALSE;
        }
        else{
            return TRUE;
        }
    }

}
