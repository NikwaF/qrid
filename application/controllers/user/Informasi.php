<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') == "admin") {
            redirect('authw/logout');
        } elseif($this->session->userdata('level') == "manajer") {
            redirect('autha/logout');
        }
    }

    public function index()
    {
        if (!isset($_SESSION['nik'])) {
            redirect('auth');
        } else {
        // $data['judul'] = 'Dashboard';
        $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $query_user = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $id_pegawai = $query_user['id'];
        $data['data'] = $this->db->get_where('tbl_gaji_pegawai', ['id_karyawan' => $id_pegawai])->result_array();
        $data['title'] = 'ABSENSI UPK CERMEE  | Informasi';

        $this->load->view('user/_partials/header', $data);
        $this->load->view('user/informasi', $data);
        $this->load->view('user/_partials/footer');
        }
    }
}
