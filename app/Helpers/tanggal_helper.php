<?php 
    function tanggal_indo($tanggal)
    {
        switch (date('m', strtotime($tanggal))) {
            case '01':
                $bulan = 'Januari';
                break;
            case '02':
                $bulan = 'Februari';
                break;
            case '03':
                $bulan = 'Maret';
                break;
            case '04':
                $bulan = 'April';
                break;
            case '05':
                $bulan = 'Mei';
                break;
            case '06':
                $bulan = 'Juni';
                break;
            case '07':
                $bulan = 'Juli';
                break;
            case '08':
                $bulan = 'Agustus';
                break;
            case '09':
                $bulan = 'September';
                break;
            case '10':
                $bulan = 'Oktober';
                break;
            case '11':
                $bulan = 'November';
                break;
            case '12':
                $bulan = 'Desember';
                break;
            default:
            $bulan = 'Tidak diketahui';
                break;
        }
        return date('d', strtotime($tanggal)).' '.$bulan.' '.date('Y', strtotime($tanggal));
    }

    // function main_menu($id)
    // {
    //     $ci = get_instance();
    //     $main_menu = $ci->db->select('m.*, a.akses,a.tambah,a.edit,a.hapus')
    //     ->from('menu m')
    //     ->join('akses a', 'a.kode_menu = m.kode_menu', 'left')
    //     ->join('pemisah_menu', 'm.pemisah = pemisah_menu.id', 'left')
    //     ->where(['a.level_user' => $ci->session->role_id, 'm.aktif' => '1','show' => '1', 'level' => 'main_menu', 'm.pemisah' => $id] )
    //     ->order_by('m.no_urut', 'ASC')
    //     ->get()->result_array();

    //     return $main_menu;
    // }

    // @desc    -digunakan untuk memanggil sub menu
    // @used by
    //  - setiap controller
    // function sub_menu()
    // {
    //     $ci = get_instance();

    //     $sub_menu = $ci->db->select('m.*, a.akses, a.tambah, a.edit, a.hapus')
    //     ->from('menu m')
    //     ->join('akses a','a.kode_menu = m.kode_menu', 'left')
    //     ->where(['a.level_user' => $ci->session->role_id, 'm.aktif' => '1','show' => '1', 'level' => 'sub_menu'])
    //     ->order_by('m.no_urut', 'ASC')
    //     ->get()->result_array();

    //     return $sub_menu;
    // }

    // @desc    -digunakan untuk memanggil single
    // @used by
    //  - setiap controller
    // function single_menu($id)
    // {
    //     $ci = get_instance();

    //     $single_menu = $ci->db->select('m.*, a.akses, a.tambah, a.edit, a.hapus')
    //     ->from('menu m')
    //     ->join('akses a','a.kode_menu = m.kode_menu', 'left')
    //     ->join('pemisah_menu', 'm.pemisah = pemisah_menu.id', 'left')
    //     ->where(['a.level_user' => $ci->session->role_id, 'm.aktif' => '1','show' => '1', 'level' => 'single_menu', 'm.pemisah' => $id])
    //     ->order_by('m.no_urut', 'ASC')
    //     ->get()->result_array();

    //     return $single_menu;
    // }

    // function pemisahMenu()
    // {
    //     $ci = get_instance();
    //     $pemisah_menu = $ci->db->get('pemisah_menu')->result_array();
    //     return $pemisah_menu;
    // }
?>