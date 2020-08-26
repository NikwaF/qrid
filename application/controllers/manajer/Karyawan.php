<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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
        $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['data'] = $this->db->get_where('tbl_users', ['level' => 'karyawan'])->result_array();
        $data['title'] = 'ABSENSI UPK CERMEE | Karyawan List';

        $this->load->view('manajer/_partials/header', $data);
        $this->load->view('manajer/karyawan', $data);
        $this->load->view('manajer/_partials/footer');
    }
    


}

/* End of file Jenis.php */
/* Location: ./application/controllers/administrator/Jenis.php */