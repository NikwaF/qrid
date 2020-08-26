<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    if($this->session->userdata('level') == "admin") {
            redirect('authw/logout');
        } elseif($this->session->userdata('level') == "karyawan") {
            redirect('auth/logout');
        }
  }

  function index()
  {
		if(!isset($_SESSION['nik'])) {
			redirect('authw');
		} else {
    // $data['judul'] = 'Dashboard';
    $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
    $data['title'] = 'ABSENSI UPK CERMEE | Manager';

    $this->load->view('manajer/_partials/header', $data);
    $this->load->view('manajer/dashboard',$data);
    $this->load->view('manajer/_partials/footer');
		}
}
}
