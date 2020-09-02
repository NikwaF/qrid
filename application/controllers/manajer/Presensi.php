<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('ciqrcode');
        if($this->session->userdata('level') == "admin") {
            redirect('authw/logout');
        } elseif($this->session->userdata('level') == "karyawan") {
            redirect('auth/logout');
        }
    }

    public function index()
    {
        if(!isset($_SESSION['nik'])) {
			redirect('autha');
		}
        //$data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['title'] = 'ABSENSI UPK CERMEE  | Presensi Report';

        $this->db->select('a.in_time, a.out_time,a.attendance_date,b.nama,a.id,a.status');
        $this->db->from('tbl_kehadiran a');
        $this->db->join('tbl_users b', 'a.id_user = b.id');
        $data['data'] = $this->db->get()->result_array();

        $this->load->view('manajer/_partials/header', $data);
        $this->load->view('manajer/presensi', $data);
        $this->load->view('manajer/_partials/footer');
    }

}

/* End of file Jenis.php */
/* Location: ./application/controllers/administrator/Jenis.php */
