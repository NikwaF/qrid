<?php defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends CI_Controller
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
        if (!isset($_SESSION['nik'])) {
            redirect('auth');
        } else {
        // $data['judul'] = 'Dashboard';
        //$data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $query_user = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $id_pegawai = $query_user['id'];
        $data['data'] = $this->list_kehadiran();
        $data['title'] = 'ABSENSI UPK CERMEE  | Informasi';

        $this->load->view('admin/_partials/header', $data);
        $this->load->view('admin/informasi_absen', $data);
        $this->load->view('admin/_partials/footer');
        }
    }


    private function list_kehadiran(){
      $userdata = $this->db->get_where('tbl_users', ['nik' => $_SESSION['nik']])->row();

      $kehadiran = $this->db->get_where('tbl_kehadiran', ['id_user' => $userdata->id])->result();
      $data = [];

      foreach($kehadiran as $kh){
        $qr_code = $this->db->get_where('tbl_qrcode', ['tanggal' => $kh->attendance_date])->row();
        $tmp = [
          'tanggal' => tgl_indo($kh->attendance_date),
        ];
        if($kh->status === 'Ijin'){
          $ijin = $this->db->get_where('tbl_pengajuan', ['id_user' => $kh->id_user, 'pengajuan_date' => $kh->attendance_date])->row();
          $tmp['jam'] = '-';
          $tmp['status'] = $ijin->jenis_pengajuan;
        } else {
          $tmp['jam'] = $kh->in_time .' - ' .$kh->out_time;
          $masuk = strtotime($kh->in_time);
          $jadwal = strtotime($qr_code->jam_masuk);
          if($masuk > $jadwal){
            $tmp['status'] = 'Hadir (Terlambat)';
          } else{
            $tmp['status'] = 'Hadir';
          }
        }
        array_push($data, $tmp);
      }

       return $data;
      }	

}
