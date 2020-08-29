<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if($this->session->userdata('role') == 1) {
            redirect('authw/logout');
    } elseif($this->session->userdata('role') == 2) {
        redirect('autha/logout');
    }
  }

  function index()
  {
		if(!isset($_SESSION['nik'])) {
			redirect('auth');
		} else {
    // $data['judul'] = 'Dashboard';
    $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
    $data['title'] = 'ABSENSI UPK CERMEE  | Karyawan';

    $this->load->view('user/_partials/header', $data);
    $this->load->view('user/dashboard',$data);
    $this->load->view('user/_partials/footer');
		}
}
}
