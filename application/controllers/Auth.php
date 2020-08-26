<?php
/*
  1.fungsi register
  2.fungsi login
  3.fungsi logout

  MODEL = M_auth -> autentikasi
*/
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
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
        redirect('user/dashboard');
	} else {
		
		$this->form_validation->set_rules('nik', 'Nomer Karyawan', 'required|trim');
        $this->form_validation->set_rules('passcode', 'passcode', 'required|trim');
        if ($this->form_validation->run() == false) { // kondisi ketika rules form login tidak terpenuhi
            $data['judul'] = 'ABSENSI UPK CERMEE  | Login Karyawan';
            $this->load->view('auth/_partials/header', $data);
            $this->load->view('auth/v_login');
            $this->load->view('auth/_partials/footer');
        } else {
            //jika validasi sukses
            $this->_login();
        }
	}
        
    }

    private function _login()
    {
        // menangkap inputan dari text field dari form login
        $email = $this->input->post('nik');
        $sandi = $this->input->post('passcode');

        // query untuk mencari data email yang sesuai di db dari text field email
        $user = $this->db->get_where('tbl_users', ['nik' => $email])->row_array();
        if ($user != null) { // jike usernya ada
            if ($sandi == $user['passcode']) { // jika passwordnya benar
          // menyimpan session email & id level user
            if($user['level'] == "karyawan") {
          $data = [
            'nik'      => $user['nik'],
            'level'   => $user['level'],
            'divisi'   => $user['divisi'],
            'nama'       => $user['nama']
          ];
            $this->session->set_userdata($data);
            redirect('user/dashboard');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
          Role tidak diterima</div>');
            redirect('auth');
        }
        } else { // jika password salah
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
          Password salah</div>');
            redirect('auth');
        }
        } else { // jika email belum terdaftar
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
      Email ini belum terdaftar</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('nik');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('divisi');
        $this->session->unset_userdata('nama');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    Anda telah logout!</div>');
        redirect('auth');
    }
}
