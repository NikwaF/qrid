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
        // $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $this->db->select('a.id , a.nominal, b.nama_role jabatan');
        $this->db->from('tbl_slip_gaji a');
        $this->db->join('role b', 'a.id_role = b.id_role');
        $data_gaji = $this->db->get()->result_array();
        
        $data['data'] = $data_gaji;
        $data['title'] = 'ABSENSI UPK CERMEE | Kelola Gaji';

        $this->load->view('manajer/_partials/header', $data);
        $this->load->view('manajer/gaji', $data);
        $this->load->view('manajer/_partials/footer');
    }

    private function list_role()
    {
        return $this->db->get_where('role', ['status' => 1])->result();
    }

    public function tambah()
    {
        if(!isset($_SESSION['nik'])) {
			redirect('authw');
        }
        $post = $this->input->post();
        $data['title'] = 'ABSENSI UPK CERMEE | Add Gaji';
        // $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['role'] = $this->list_role();

		$this->form_validation->set_rules('nominal', 'nominal', 'trim|required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('manajer/_partials/header', $data);
            $this->load->view('manajer/add_gaji', $data);
            $this->load->view('manajer/_partials/footer');
        } else {
            //cek jika di slip gaji apa sudah ada nominal dengan jabatan tsb, 1 jabatan 1 row 
            $this->db->select('id');
            $this->db->where('id_role', $post['jabatan']);
            $cek = $this->db->get('tbl_slip_gaji')->row(); 
            $data = [
                'id_role' => $post['jabatan'],
                'nominal' => $post['nominal']
            ];


            if($cek !== null){
                $this->db->where('id', $cek->id);
                $this->db->update('tbl_slip_gaji', ['nominal' => $data['nominal']]);
            } else { 
                $this->db->insert('tbl_slip_gaji', $data);
            }

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
        // $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['edit'] = $this->db->get_where('tbl_slip_gaji', ['id' => $id])->row_array();
        $data['role'] = $this->list_role();

        $this->form_validation->set_rules('nominal', 'nominal', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('manajer/_partials/header', $data);
            $this->load->view('manajer/edit_gaji', $data);
            $this->load->view('manajer/_partials/footer');
        } else {
            $data = [
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