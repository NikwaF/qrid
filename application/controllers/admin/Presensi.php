<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('ciqrcode');
    }

    public function index()
    {
        if(!isset($_SESSION['nik'])) {
			redirect('authw');
		}
        $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['data'] = $this->db->get('tbl_kehadiran')->result_array();
        $data['title'] = 'ABSENSI UPK CERMEE | Presensi Report';

        $this->load->view('admin/_partials/header', $data);
        $this->load->view('admin/presensi', $data);
        $this->load->view('admin/_partials/footer');
    }

    public function showqr() {
        if(!isset($_SESSION['nik'])) {
			redirect('authw');
		}
        $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['data'] = $this->db->get('tbl_qrcode')->result_array();
        $data['title'] = 'SI Absensi | QR List';

        $this->load->view('admin/_partials/header', $data);
        $this->load->view('admin/qrlist', $data);
        $this->load->view('admin/_partials/footer');
    }

    public function ajukan() {
        if(!isset($_SESSION['nik'])) {
			redirect('authw');
		}
        $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['data'] = $this->db->get('tbl_pengajuan')->result_array();
        $data['title'] = 'SI Absensi | Request Permission';

        $this->load->view('admin/_partials/header', $data);
        $this->load->view('admin/pengajuan', $data);
        $this->load->view('admin/_partials/footer');
    }

    public function tambah_pengajuan()
    {
        if(!isset($_SESSION['nik'])) {
			redirect('authw');
		}
        $data['title'] = 'SI Absensi | Add Request';
        $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['data'] = $this->db->query("SELECT * FROM tbl_users WHERE level = 'karyawan'")->result_array();

		$this->form_validation->set_rules('nik', 'nama lengkap', 'trim|required');
		$this->form_validation->set_rules('request', 'request karyawan', 'trim|required');
		$this->form_validation->set_rules('reason', 'reason karyawan', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/_partials/header', $data);
            $this->load->view('admin/add_request', $data);
            $this->load->view('admin/_partials/footer');
        } else {
            $data = [
                'nik' => trim($this->input->post('nik')),
                'pengajuan' => $this->input->post('request'),
                'reason' => $this->input->post('reason'),
                'pengajuan_date' => date('Y-m-d h:i:s')
            ];
            $this->db->insert('tbl_pengajuan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-outline alert-success">Data berhasil ditambahkan!<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
            redirect('admin/presensi/ajukan');
        }
    }

    public function tambah_qr()
    {
        if(!isset($_SESSION['nik'])) {
			redirect('authw');
		}
        $data['title'] = 'SI ABSENSI UPK CERMEE | Add QR Code';
        $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();

		$this->form_validation->set_rules('timeout', 'timeout', 'trim|required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/_partials/header', $data);
            $this->load->view('admin/add_qrcode', $data);
            $this->load->view('admin/_partials/footer');
        } else {
            $uniq = md5(rand(11111,99999));
            $data = [
                'timeout' => trim($this->input->post('timeout')),
                'thumbnail' => $uniq.".png",
                'created_at' => trim($this->input->post('tanggal')),
                'created_by' => $this->session->userdata('nik')
            ];
            $timeout = $this->input->post('timeout');
            $unix =  $this->input->post('timeout').'-'.rand(111,999).'code.png';     
            $params['data'] = $timeout;
			$params['level'] = 'H';
			$params['size'] = 4;
			$params['savename'] = FCPATH."upload/qr_image/".$uniq.".png";
            $this->ciqrcode->generate($params);
            $this->db->insert('tbl_qrcode', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-outline alert-success">Data berhasil ditambahkan!<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
            redirect('admin/presensi/showqr');
        }
    }

    public function hapusQR($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_qrcode');
        redirect('admin/presensi/showqr');
    }

    public function hapus_request($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_pengajuan');
        redirect('admin/presensi/ajukan');
    }


}

/* End of file Jenis.php */
/* Location: ./application/controllers/administrator/Jenis.php */