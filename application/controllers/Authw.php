<?php
/*
  1.fungsi register
  2.fungsi login
  3.fungsi logout

  MODEL = M_auth -> autentikasi
*/
defined('BASEPATH') or exit('No direct script access allowed');

class Authw extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth', 'autentikasi');
    }

    public function index()
    {
	if(!empty($_SESSION['nik'])) {
		// membuat rules untuk form login
        redirect('admin/dashboard');
	} else {
		
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim');
        $this->form_validation->set_rules('passcode', 'passcode', 'required|trim');
        if ($this->form_validation->run() == false) { // kondisi ketika rules form login tidak terpenuhi
            $data['judul'] = 'ABSENSI UPK CERMEE  | Login Administrator';
            $this->load->view('authw/_partials/header', $data);
            $this->load->view('authw/v_login');
            $this->load->view('authw/_partials/footer');
        } else {
            //jika validasi sukses
            $this->_login();
        }
	}
        
    }

    private function _login()
    {
        // menangkap inputan dari text field dari form login
        $nik = $this->input->post('nik');
        $sandi = $this->input->post('passcode');

        // query untuk mencari data nik yang sesuai di db dari text field nik
        $user = $this->db->get_where('tbl_users', ['nik' => $nik])->row_array();
        if ($user != null) { // jike usernya ada
            if ($sandi == $user['passcode']) { // jika passwordnya benar
          // menyimpan session email & id level user
            if($user['id_role'] == 2) {
          $data = [
            'nik'      => $user['nik'],
            'role'   => $user['id_role'],
            'level'   => 'admin',
            'nama'       => $user['nama']
          ];
            $this->session->set_userdata($data);
            redirect('admin/dashboard');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
          Role tidak diterima</div>');
            redirect('authw');
        }
        } else { // jika password salah
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
          Password salah</div>');
            redirect('authw');
        }
        } else { // jika email belum terdaftar
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
      Email ini belum terdaftar</div>');
            redirect('authw');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('nik');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('level');

        $this->session->unset_userdata('nama');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    Anda telah logout!</div>');
        redirect('authw');
    }
}
