<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
		if(!isset($_SESSION['nik'])) {
			redirect('authw');
		}
    // $data['judul'] = 'Dashboard';
    $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
    $data['title'] = 'ABSENSI UPK CERMEE | Administrator';

    $this->load->view('admin/_partials/header', $data);
    $this->load->view('admin/dashboard',$data);
    $this->load->view('admin/_partials/footer');
}
}
