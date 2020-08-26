<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if(!isset($_SESSION['nik'])) {
			redirect('authw');
		}
        $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['data'] = $this->db->get('tbl_informasi')->result_array();
        $data['title'] = 'ABSENSI UPK CERMEE | Information List';

        $this->load->view('admin/_partials/header', $data);
        $this->load->view('admin/informasi', $data);
        $this->load->view('admin/_partials/footer');
    }

    public function tambah()
    {
        if(!isset($_SESSION['nik'])) {
			redirect('authw');
		}
        $data['title'] = 'ABSENSI UPK CERMEE | Add Informasi';
        $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();

		$this->form_validation->set_rules('informasi', 'deskripsi lengkap', 'trim|required');      

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/_partials/header', $data);
            $this->load->view('admin/add_informasi', $data);
            $this->load->view('admin/_partials/footer');
        } else {
            $data = [
                'deskripsi' => trim($this->input->post('informasi')),
                'tgl_post' => date('Y-m-d'),
            ];
            $this->db->insert('tbl_informasi', $data);
            echo 'error';
            $this->session->set_flashdata('message', '<div class="alert alert-outline alert-success">Data berhasil ditambahkan!<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
            redirect('admin/informasi');
        }
    }

    public function edit()
    {
        if(!isset($_SESSION['nik'])) {
			redirect('authw');
		}
        $data['title'] = 'SI Absensi | Edit Informasi';
        $id = $this->uri->segment(4);
        $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['edit'] = $this->db->get_where('tbl_informasi', ['id' => $id])->row_array();

        $this->form_validation->set_rules('id', 'id informasi', 'trim|required');
		$this->form_validation->set_rules('informasi', 'deskripsi lengkap', 'trim|required');      

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/_partials/header', $data);
            $this->load->view('admin/edit_informasi', $data);
            $this->load->view('admin/_partials/footer');
        } else {
            $data = [
                'deskripsi' => trim($this->input->post('informasi')),
            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('tbl_informasi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-outline alert-success">Data berhasil diubah!<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
            redirect('admin/informasi');
        }
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
		$this->db->delete('tbl_informasi');
        redirect('admin/informasi');
    }


}

/* End of file Jenis.php */
/* Location: ./application/controllers/administrator/Jenis.php */