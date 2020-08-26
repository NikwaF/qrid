<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // $data['judul'] = 'Dashboard';
        $data['user_session'] = $this->db->get_where('tbl_siswa', ['siswa_nis' => $this->session->userdata('nis')])->row_array();
        $b = $this->db->get_where('tbl_siswa', ['siswa_nis' => $this->session->userdata('nis')])->row_array();
        $id_kelas = $b['siswa_kelas_id'];
        $s = $this->db->get_where('tbl_kelas', ['kelas_id' => $id_kelas])->row_array();
        $kelas_id = $s['kelas_nama'];

        $data['data'] = $this->db->get_where('tbl_tugas', ['kelas' => $kelas_id])->result_array();
        $data['title'] = 'SI Monitoring | Daftar Tugas';

        $this->load->view('user/_partials/header', $data);
        $this->load->view('user/tugas', $data);
        $this->load->view('user/_partials/footer');
    }


}

/* End of file Jenis.php */
/* Location: ./application/controllers/administrator/Jenis.php */