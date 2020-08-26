<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (!isset($_SESSION['nik'])) {
            redirect('auth');
        }
        // $data['judul'] = 'Dashboard';
        $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['title'] = 'SI Monitoring | Absensi';

        $this->load->view('user/_partials/header', $data);
        $this->load->view('user/presensi', $data);
        $this->load->view('user/_partials/footer');
    }

    public function cek()
    {
        $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['title'] = 'SI Monitoring | Absensi';
        $timeout = $this->input->post('noijazah');
        $timenow = date('Y-m-d');
        $timeis = date('h:i:s');

        $query_user = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $query_count = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->num_rows();
        $id_user = $query_user['id'];

        $query_qrcode = $this->db->query("SELECT * FROM tbl_qrcode WHERE timeout = '$timeout' AND created_at = '$timenow'")->row_array();
        $query_absen = $this->db->get_where('tbl_kehadiran', ['id_karyawan' => $this->session->userdata('nik')])->num_rows();

        if ($query_count == 1) {
            if ($timeis < $timeout) {
                if ($query_absen == 0) {
                    $data = [
                        'id_user' => $id_user,
                        'id_karyawan' => $this->session->userdata('nik'),
                        'in_time' => date('h:i:s'),
                        'attendance_date' => date('Y-m-d'),
                        'status' => 1,
                    ];
                    $this->db->insert('tbl_kehadiran', $data);
                    echo 'sudah absen masuk';
                    $this->session->set_flashdata('message', '<div class="alert alert-outline alert-success">Berhasil! Sudah absen masuk.<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                    redirect('user/absensi');
                } else if ($query_absen == 1) {
                    $data = [
                        'out_time' => date('h:i:s'),
                        'status' => 2,
                    ];
                    $this->db->where('id_karyawan', $this->session->userdata('nik'));
                    $this->db->update('tbl_kehadiran', $data);
                    echo 'sudah absen pulang';
                    $this->session->set_flashdata('message', '<div class="alert alert-outline alert-success">Berhasil! Sudah absen pulang.<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                    redirect('user/absensi');
                }
            } else {
                echo 'udah telat';
                $this->session->set_flashdata('message', '<div class="alert alert-outline alert-success">Maaf! Anda telah telat.<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
            redirect('user/absensi');
            }
        } else if (!$query_count) {
            echo 'gak ada akun';
            $this->session->set_flashdata('message', '<div class="alert alert-outline alert-success">Data tidak ditemukan!<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
            redirect('user/absensi');
        }
    }

    public function showqr()
    {
        $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['title'] = 'SI Monitoring | QR Absensi';
        $date_now = date('Y-m-d');
        $test = $this->db->query("SELECT * FROM tbl_qrcode WHERE created_at = '$date_now' ORDER BY id DESC LIMIT 1")->row_array();
        $data['qrcode'] = $test['thumbnail'];

        $this->load->view('user/showqr', $data);
    }

}
