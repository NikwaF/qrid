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
        // $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $this->db->select('a.in_time, a.out_time,a.attendance_date,b.nama,a.id,a.status');
        $this->db->from('tbl_kehadiran a');
        $this->db->join('tbl_users b', 'a.id_user = b.id');
        $data['data'] = $this->db->get()->result_array();
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
        // $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $this->db->select('a.pengajuan_date, a.reason, a.jenis_pengajuan, a.id, b.nama');
        $this->db->from('tbl_pengajuan a');
        $this->db->join('tbl_users b','a.id_user = b.id');

        $data['data'] = $this->db->get()->result_array();
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
        // $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['data'] = $this->db->query("SELECT * FROM tbl_users WHERE (id_role = 3 OR id_role = 2) AND nik !=".$this->session->userdata('nik'))->result_array();

		$this->form_validation->set_rules('nik', 'nama lengkap', 'trim|required');
		$this->form_validation->set_rules('request', 'request karyawan', 'trim|required');
		$this->form_validation->set_rules('reason', 'reason karyawan', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/_partials/header', $data);
            $this->load->view('admin/add_request', $data);
            $this->load->view('admin/_partials/footer');
        } else {
            $userdata = $this->db->get_where('tbl_users', ['id' => $this->input->post('nik')])->row();
            $get_pengajuan = $this->db->get_where('tbl_pengajuan', ['pengajuan_date' => date('Y-m-d'), 'id_user' => $this->input->post('nik')])->row();

            if($get_pengajuan !== null){
                $this->session->set_flashdata('message', '<div class="alert alert-outline alert-danger">Pegawai sudah diajukan requestnya!<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                redirect('admin/presensi/ajukan');
            } else{ 
                $data = [
                    'id_user' => $this->input->post('nik'),
                    'jenis_pengajuan' => $this->input->post('request'),
                    'reason' => $this->input->post('reason'),
                    'pengajuan_date' => date('Y-m-d')
                ];
                $this->db->trans_start();
                $this->db->insert('tbl_pengajuan', $data);
                $this->db->insert('tbl_kehadiran', ['id_user' => $this->input->post('nik'), 'in_time'=> date('H:i:s'), 'out_time' =>  date('H:i:s'), 'attendance_date' => date('Y-m-d'), 'status' => 'Ijin']);
                $gaji = $this->db->get_where('tbl_slip_gaji',['id_role' => $userdata->id_role])->row();
                $this->db->insert('tbl_gaji_pegawai', ['id_user' => $this->input->post('nik'), 'tgl_absen'=> date('Y-m-d'), 'nominal' =>  $gaji->nominal]);
                $this->db->trans_complete();
                $this->session->set_flashdata('message', '<div class="alert alert-outline alert-success">Data berhasil ditambahkan!<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                redirect('admin/presensi/ajukan');
            }
        }
    }

    public function tambah_qr()
    {
        if(!isset($_SESSION['nik'])) {
			redirect('authw');
		}
        $data['title'] = 'SI ABSENSI UPK CERMEE | Add QR Code';
        $post = $this->input->post();
        // echo json_encode($post);
        // return;
        // $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();

		$this->form_validation->set_rules('tanggal', 'tanggal', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/_partials/header', $data);
            $this->load->view('admin/add_qrcode', $data);
            $this->load->view('admin/_partials/footer');
        } else {
            $get_qr =$this->db->get_where('tbl_qrcode', ['tanggal' => $post['tanggal']])->row();
            if($get_qr !== null){
                $this->session->set_flashdata('message', '<div class="alert alert-outline alert-danger">Absen QR Code hari ini sudah ada!<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                redirect('admin/presensi/showqr');
            }
            
            $uniq = md5(rand(11111,99999));
            $data = [
                'jam_masuk' => $post['jam_masuk'],
                'jam_pulang' => $post['jam_pulang'],
                'thumbnail' => $uniq.".png",
                'tanggal' => $post['tanggal'],
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => $this->session->userdata('nik')
            ];
            $timeout = $this->input->post('timeout');
            $params['data'] = $post['jam_masuk'].'-'.$post['jam_pulang'];
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
        $pengajuan = $this->db->get_where('tbl_pengajuan', ['id' => $id])->row();
        if($pengajuan === null){
            $this->session->set_flashdata('message', '<div class="alert alert-outline alert-danger">Oopss ada yang salah<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
            redirect('admin/presensi/ajukan');
        }
        $this->db->trans_start();
        $this->db->where(['id_user' => $pengajuan->id_user, 'tgl_absen' => $pengajuan->pengajuan_date]);
        $this->db->delete('tbl_gaji_pegawai');
        $this->db->where(['id_user' => $pengajuan->id_user, 'attendance_date' => $pengajuan->pengajuan_date, 'status' => 'Ijin']);
        $this->db->delete('tbl_kehadiran');        
        $this->db->where('id',$id);
        $this->db->delete('tbl_pengajuan');        
        $this->db->trans_complete();
        $this->session->set_flashdata('message', '<div class="alert alert-outline alert-success">Berhasil menghapus data<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
        redirect('admin/presensi/ajukan');
    }


}

/* End of file Jenis.php */
/* Location: ./application/controllers/administrator/Jenis.php */
