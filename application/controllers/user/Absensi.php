  <?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') == "admin") {
            redirect('authw/logout');
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
        $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['title'] = 'ABSENSI UPK CERMEE  | Absensi';

        $this->load->view('user/_partials/header', $data);
        $this->load->view('user/presensi', $data);
        $this->load->view('user/_partials/footer');
        }
    }

    public function cek()
    {
        if (!isset($_SESSION['nik'])) {
            redirect('auth');
        } else {
        $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['title'] = 'SI Monitoring | Absensi';
        $timeout = $this->input->post('noijazah');
        $timenow = date('Y-m-d');
        $timeis = date('H:i:s');

        $query_user = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $query_count = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->num_rows();
        $id_user = $query_user['id'];
        $jabatan = $query_user['level'];
        $query_slip = $this->db->query("SELECT * FROM tbl_slip_gaji WHERE jabatan = '$jabatan'")->row_array();
        $totalgaji = $query_slip['nominal'];

        $query_qrcode = $this->db->query("SELECT * FROM tbl_qrcode WHERE timeout = '$timeout' AND created_at = '$timenow'")->row_array();
        $usersku = $this->session->userdata('nik');
        $query_absen = $this->db->query("SELECT * FROM tbl_kehadiran WHERE attendance_date = '$timenow' AND id_karyawan = '$usersku'")->num_rows();
        $query_gaji = $this->db->query("SELECT * FROM tbl_gaji_pegawai WHERE id_karyawan = '$id_user' AND tgl_absen = '$timenow'")->num_rows();

        if ($query_count == 1) {
            if ($timeis < $timeout) {
                if ($query_absen == 0) {
                    $data = [
                        'id_user' => $id_user,
                        'id_karyawan' => $this->session->userdata('nik'),
                        'in_time' => date('H:i:s'),
                        'attendance_date' => date('Y-m-d'),
                        'status' => 'Masuk',
                    ];
                    $this->db->insert('tbl_kehadiran', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-outline alert-success">Berhasil! Tanggal '.$timenow.' Sudah absen masuk.<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                    redirect('user/absensi');
                } else if ($query_absen == 1) {
                    $data = [
                        'out_time' => date('H:i:s'),
                        'status' => 'Pulang',
                    ];
                    $this->db->where('id_karyawan', $this->session->userdata('nik'));
                    $this->db->update('tbl_kehadiran', $data);
                    if($query_gaji == 0) {
                        $data = [
                        'id_karyawan' => $id_user,
                        'tgl_absen' => date('Y-m-d'),
                        'nominal' => $totalgaji
                    ];
                    $this->db->insert('tbl_gaji_pegawai', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-outline alert-success">Berhasil! Tanggal '.$timenow.' Sudah absen pulang.<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                    redirect('user/absensi');
                    }
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-outline alert-danger">Maaf! Anda telah telat.<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                redirect('user/absensi');
            }
        } else if (!$query_count) {
            $this->session->set_flashdata('message', '<div class="alert alert-outline alert-danger">Data tidak ditemukan!<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
            redirect('user/absensi');
        }
    }
    }

    public function showqr()
    {
        if (!isset($_SESSION['nik'])) {
            redirect('auth');
        } else {
        $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['title'] = 'ABSENSI UPK CERMEE  | QR Absensi';
        $date_now = date('Y-m-d');
        $test = $this->db->query("SELECT * FROM tbl_qrcode WHERE created_at = '$date_now' ORDER BY id DESC LIMIT 1")->row_array();
        $data['qrcode'] = $test['thumbnail'];

        $this->load->view('user/showqr', $data);
        }
    }

}
