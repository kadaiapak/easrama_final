<?php

namespace App\Controllers;
use App\Models\VideoProfilModel;

class VideoProfil extends BaseController
{
    protected $videoProfilModel;
    public function __construct()
    {
        helper('form');
        $this->videoProfilModel = new VideoProfilModel();
    }

    public function index()
    {
        $semuaVideoProfil = $this->videoProfilModel->getAllByAdmin();
        $data = [
            'judul' => 'Video Profil',
            'semua_video_profil' => $semuaVideoProfil
        ];
        return view('video_profil/v_video_profil', $data);
    }
    
    public function tambah()
    {
        $data = [
            'judul' => 'Tambah Video Profil',
        ];
        return view('video_profil/v_tambah_video_profil', $data);
    }

    public function simpan()
    {
        if(!$this->validate([
            'vp_judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tuliskan judul video !',
                ]
            ],
            'vp_deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isikan deskripsi !',
                ]
            ],
            'vp_youtube_link' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isikan link video youtube'
                ]
            ],
            'vp_youtube_title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tuliskan title video youtube'
                ]
            ],
            'vp_is_active' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih apakah video profil diaktifkan atau tidak'
                ]
            ]
        ])){
            return redirect()->back()->withInput();
        }

        $data = array(
            'vp_judul' => $this->request->getVar('vp_judul'),
            'vp_deskripsi' => $this->request->getVar('vp_deskripsi'),
            'vp_youtube_link' => $this->request->getVar('vp_youtube_link'),
            'vp_youtube_title' => $this->request->getVar('vp_youtube_title'),
            'vp_is_active' => $this->request->getVar('vp_is_active'),
            'vp_penulis' => session()->get('user_id'),
        );
        $this->videoProfilModel->insert($data);
        return redirect()->to('/admin/video-profil')->with('sukses','Data berhasil disimpan!');
    }

    public function edit($id = null)
    {
        if($id == '') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $detailVideoProfil = $this->videoProfilModel->getDetail($id);
        if (empty($detailVideoProfil)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul berita ' .$id. ' tidak ditemukan');
        }
        if($detailVideoProfil['vp_penulis'] == session()->get('user_id') OR session()->get('level') == 1)
        {
            $data = [
                'judul' => 'Edit Video Profil',
                'detail_video_profil' => $detailVideoProfil 
            ];
            return view('video_profil/v_edit_video_profil', $data);
        } else {
           return redirect()->back();
        }
    }

    public function update($id = ''){

        if($id == ''){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        if(!$this->validate([
            'vp_judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tuliskan judul video !',
                ]
            ],
            'vp_deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isikan deskripsi !',
                ]
            ],
            'vp_youtube_link' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isikan link video youtube'
                ]
            ],
            'vp_youtube_title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tuliskan title video youtube'
                ]
            ],
            'vp_is_active' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih apakah video profil diaktifkan atau tidak'
                ]
            ]
        ])){
            return redirect()->back()->withInput();
        }
        $data = array(
            'vp_judul' => $this->request->getVar('vp_judul'),
            'vp_deskripsi' => $this->request->getVar('vp_deskripsi'),
            'vp_youtube_link' => $this->request->getVar('vp_youtube_link'),
            'vp_youtube_title' => $this->request->getVar('vp_youtube_title'),
            'vp_is_active' => $this->request->getVar('vp_is_active'),
            'vp_penulis' => session()->get('user_id'),
        );
        $this->videoProfilModel->where('vp_id', $id)->set($data)->update();
        return redirect()->to('/admin/video-profil')->with('sukses','Data berhasil diubah!');
    }

    public function hapus()
    {
        $this->videoProfilModel->delete();
        return redirect()->to('/admin/berita')->with('sukses','Data berhasil dihapus!');
    }
}
