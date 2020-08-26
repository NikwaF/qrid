<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') == "karyawan") {
            redirect('auth/logout');
        } elseif($this->session->userdata('level') == "manajer") {
            redirect('autha/logout');
        }
    }

    public function index()
    {
        if(!isset($_SESSION['nik'])) {
			redirect('authw');
		} else {
        $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['data'] = $this->db->get_where('tbl_users', ['level' => 'admin'])->result_array();
        $data['title'] = 'ABSENSI UPK CERMEE | Operator List';

        $this->load->view('admin/_partials/header', $data);
        $this->load->view('admin/operator', $data);
        $this->load->view('admin/_partials/footer');
		}
    }
    
    public function daftar_divisi()
    {
        if(!isset($_SESSION['nik'])) {
			redirect('authw');
		} else {
        $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['data'] = $this->db->get('tbl_divisi')->result_array();
        $data['title'] = 'SI Absensi | Divisi List';

        $this->load->view('admin/_partials/header', $data);
        $this->load->view('admin/divisi', $data);
        $this->load->view('admin/_partials/footer');
		}
    }

    public function tambah()
    {
        if(!isset($_SESSION['nik'])) {
			redirect('authw');
		} else {
        $data['title'] = 'ABSENSI UPK CERMEE| Add Operator';
        $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();

		$this->form_validation->set_rules('nama', 'nama lengkap', 'trim|required');
		$this->form_validation->set_rules('nik', 'nomer karyawan', 'trim|required');
		$this->form_validation->set_rules('level', 'level karyawan', 'trim|required');
		$this->form_validation->set_rules('passcode', 'password', 'trim|required');        

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/_partials/header', $data);
            $this->load->view('admin/add_operator', $data);
            $this->load->view('admin/_partials/footer');
        } else {
            $data = [
                'id_level' => 1,
                'nik' => trim($this->input->post('nik')),
                'passcode' => $this->input->post('passcode'),
                'nama' => $this->input->post('nama'),
                'level' => $this->input->post('level'),
                'status' => 'aktif',
                'registered_date' => date('Y-m-d')
            ];
            $this->db->insert('tbl_users', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-outline alert-success">Data berhasil ditambahkan!<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
            redirect('admin/administrator');
        }
		}
    }

    public function tambah_divisi()
    {
        if(!isset($_SESSION['nik'])) {
			redirect('authw');
		} else {
        $data['title'] = 'ABSENSI UPK CERMEE | Add Division';
        $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();

		$this->form_validation->set_rules('nama', 'nama divisi', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/_partials/header', $data);
            $this->load->view('admin/add_divisi', $data);
            $this->load->view('admin/_partials/footer');
        } else {
            $data = [
                'nama' => ucwords($this->input->post('nama')),
            ];
            $this->db->insert('tbl_divisi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-outline alert-success">Data berhasil ditambahkan!<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
            redirect('admin/administrator');
        }
		}
    }

    public function edit()
    {
        if(!isset($_SESSION['nik'])) {
			redirect('authw');
		} else {
        $data['title'] = 'ABSENSI UPK CERMEE | Edit Operator';
        $id = $this->uri->segment(4);
        $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['edit'] = $this->db->get_where('tbl_users', ['id' => $id])->row_array();

        $this->form_validation->set_rules('id', 'id karyawan', 'trim|required');
		$this->form_validation->set_rules('nik', 'nik karyawan', 'trim|required');
		$this->form_validation->set_rules('passcode', 'password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/_partials/header', $data);
            $this->load->view('admin/edit_operator', $data);
            $this->load->view('admin/_partials/footer');
        } else {
            $data = [
                'nik' => trim($this->input->post('nik')),
                'passcode' => trim($this->input->post('passcode')),
            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('tbl_users', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-outline alert-success">Data berhasil diubah!<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
            redirect('admin/administrator');
        }
		}
    }
    
    public function edit_divisi()
    {
        if(!isset($_SESSION['nik'])) {
			redirect('authw');
		} else {
        $data['title'] = 'ABSENSI UPK CERMEE | Edit Divisi';
        $id = $this->uri->segment(4);
        $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['data'] = $this->db->get_where('tbl_divisi', ['id' => $id])->row_array();
        $data['divisi'] = $this->db->get('tbl_divisi')->result_array();

        $this->form_validation->set_rules('id', 'id divisi', 'trim|required');
		$this->form_validation->set_rules('nama', 'nama divisi', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/_partials/header', $data);
            $this->load->view('admin/edit_divisi', $data);
            $this->load->view('admin/_partials/footer');
        } else {
            $data = [
                'nama' => trim($this->input->post('nama'))
            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('tbl_divisi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-outline alert-success">Data berhasil diubah!<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
            redirect('admin/administrator/divisi');
        }
		}
    }

    public function hapus($id)
    {
        if (!isset($_SESSION['nik'])) {
            redirect('authw');
        } else {
        $this->db->where('id', $id);
		$this->db->delete('tbl_users');
        redirect('admin/administrator');
        }
    }
    
    public function hapus_divisi($id)
    {
        if (!isset($_SESSION['nik'])) {
            redirect('authw');
        } else {
        $this->db->where('id', $id);
		$this->db->delete('tbl_divisi');
        redirect('admin/administrator/divisi');
        }
    }


}

/* End of file Jenis.php */
/* Location: ./application/controllers/administrator/Jenis.php */