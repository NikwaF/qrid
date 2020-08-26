<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends CI_Controller
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
			redirect('authw');
		}
        $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['data'] = $this->db->get_where('tbl_slip_gaji')->result_array();
        $data['title'] = 'ABSENSI UPK CERMEE | Kelola Gaji';

        $this->load->view('manajer/_partials/header', $data);
        $this->load->view('manajer/gaji', $data);
        $this->load->view('manajer/_partials/footer');
    }

    public function tambah()
    {
        if(!isset($_SESSION['nik'])) {
			redirect('authw');
		}
        $data['title'] = 'ABSENSI UPK CERMEE | Add Gaji';
        $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();

		$this->form_validation->set_rules('nominal', 'nominal', 'trim|required');
        $this->form_validation->set_rules('divisi', 'divisi karyawan', 'trim|required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('manajer/_partials/header', $data);
            $this->load->view('manajer/add_gaji', $data);
            $this->load->view('manajer/_partials/footer');
        } else {
            $data = [
                'id_karyawan' => $this->session->userdata('nik'),
                'jabatan' => $this->input->post('jabatan'),
                'nominal' => $this->input->post('nominal')
            ];
            $this->db->insert('tbl_slip_gaji', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-outline alert-success">Data berhasil ditambahkan!<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
            redirect('manajer/gaji');
        }
    }

    public function edit()
    {
        if(!isset($_SESSION['nik'])) {
			redirect('authw');
		}
        $data['title'] = 'ABSENSI UPK CERMEE | Edit Gaji';
        $id = $this->uri->segment(4);
        $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['edit'] = $this->db->get_where('tbl_slip_gaji', ['id' => $id])->row_array();

        $this->form_validation->set_rules('nominal', 'nominal', 'trim|required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');      

        if ($this->form_validation->run() == false) {
            $this->load->view('manajer/_partials/header', $data);
            $this->load->view('manajer/edit_gaji', $data);
            $this->load->view('manajer/_partials/footer');
        } else {
            $data = [
                'jabatan' => $this->input->post('jabatan'),
                'nominal' => $this->input->post('nominal')
            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('tbl_slip_gaji', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-outline alert-success">Data berhasil diubah!<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
            redirect('manajer/gaji');
        }
    }
    

    public function hapus($id)
    {
        $this->db->where('id', $id);
		$this->db->delete('tbl_slip_gaji');
        redirect('manajer/gaji');
    }
    
}

/* End of file Jenis.php */
/* Location: ./application/controllers/administrator/Jenis.php */