<?php
defined('BASEPATH') or exit('No direct script access allowed');
/*
Autentikasi Login Siswa
Get Data Siswa
Get Absensi Siswa
Get Tugas Siswa
Set Jemput
 */

class Apps extends CI_Controller
{

    public function login()
    {
        $user = $this->input->get('user');
        $sandi = $this->input->get('sandi');

        $query_user = $this->db->get_where('tbl_siswa', ['siswa_nis' => $user])->row_array();
        if ($query_user != null) {
            if ($sandi == $query_user['siswa_pass']) {
                $respon = ['msg' => true, 'msg' => 'berhasil login', 'nis' => $query_user['siswa_nis']];
                echo json_encode($respon, JSON_PRETTY_PRINT);
            } else {
                $respon = ['msg' => false, 'msg' => 'sandi salah'];
                echo json_encode($respon, JSON_PRETTY_PRINT);
            }

        } else {
            $respon = ['msg' => false, 'msg' => 'akun belum terdaftar di database'];
            echo json_encode($respon, JSON_PRETTY_PRINT);
        }
    }

    public function get_absensi_siswa()
    {
        $user = $this->input->get('user');
        $query_user = $this->db->get_where('tbl_absensi', ['nis' => $user])->row_array();
        $data_user = $this->db->get_where('tbl_absensi', ['nis' => $user])->result_array();
        $row_user = $this->db->get_where('tbl_absensi', ['nis' => $user]);

        if ($query_user != null) {
            $respon = json_encode($data_user, JSON_PRETTY_PRINT);
            print '<pre>' . print_r($respon, 1) . '</pre>';
        } else {
            $respon = ['msg' => false, 'msg' => 'tidak ada absensi di akun atau akun tidak terdaftar disini'];
            echo json_encode($respon, JSON_PRETTY_PRINT);
        }
    }

    public function get_info_siswa()
    {
        $user = $this->input->get('user');
        $query_user = $this->db->get_where('tbl_siswa', ['siswa_nis' => $user])->row_array();

        if ($query_user != null) {
            $respon = json_encode($query_user, JSON_PRETTY_PRINT);
            print '<pre>' . print_r($respon, 1) . '</pre>';
        } else {
            $respon = ['msg' => false, 'msg' => 'tidak ada absensi di akun atau akun tidak terdaftar disini'];
            echo json_encode($respon, JSON_PRETTY_PRINT);
        }
    }

    public function get_tugas_siswa()
    {
        $user = $this->input->get('user');
        $data_user = $this->db->get_where('tbl_siswa', ['siswa_nis' => $user])->row_array();
        $data_kelas = $this->db->get_where('tbl_kelas', ['kelas_id' => $data_user['siswa_kelas_id']])->row_array();
        $query_user = $this->db->get_where('tbl_tugas', ['kelas' => $data_kelas['kelas_nama']])->result_array();

        if ($query_user != null) {
            $respon = json_encode($query_user, JSON_PRETTY_PRINT);
            print '<pre>' . print_r($respon, 1) . '</pre>';
        } else {
            $respon = ['msg' => false, 'msg' => 'tidak ada tugas di akun ini / akun tidak terdaftar disini'];
            echo json_encode($respon, JSON_PRETTY_PRINT);
        }
    }

    public function set_jemput()
    {
        $user = $this->input->get('user');
        $query_user = $this->db->get_where('tbl_siswa', ['siswa_nis' => $user])->row_array();
        $sekarang = date('d-m-Y');

        $wali = $this->db->get_where('tbl_guru', ['guru_id' => $query_user['wali_kelas_id']])->row_array();
        $wali_kelas_nama = $wali['guru_nama'];

        if ($query_user != null) {
            $query = $this->db->query("SELECT * FROM tbl_jemput WHERE nis = '$user' AND jemput_date = '$sekarang'")->num_rows();
            if ($query > 0) {
                $respon = ['msg' => false, 'msg' => 'maaf, kamu telah melakukan set jemput hari ini'];
                echo json_encode($respon, JSON_PRETTY_PRINT);
            } else {
                $data = [
                    'nis' => $user,
                    'jemput_date' => $sekarang,
                    'wali_kelas' => $wali_kelas_nama,
                    'status' => 'Dijemput',
                ];
                $this->db->insert('tbl_jemput', $data);
                $respon = ['msg' => true, 'msg' => 'berhasil jemput'];
                echo json_encode($respon, JSON_PRETTY_PRINT);
            }

        } else {
            $respon = ['msg' => false, 'msg' => 'tidak ada akun terdaftar di database ini'];
            echo json_encode($respon, JSON_PRETTY_PRINT);
        }
    }

}
