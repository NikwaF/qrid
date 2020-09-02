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
        $jam_now = strtotime("now");
        $tanggal = date('Y-m-d');

        $this->db->select('id,jam_masuk, jam_pulang');
        $this->db->where(['tanggal' => $tanggal]);
        $absen = $this->db->get('tbl_qrcode')->row();

        $data['pesan'] = null;

        if($absen == null){
           $data['status'] = 0;
        } else{ 
            $user_data = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row();

            $this->db->select('id');
            $this->db->where(['id_user' => $user_data->id, 'attendance_date' => $tanggal, 'status' => 'Ijin']);
            $ijin_gak = $this->db->get('tbl_kehadiran')->row();

            if($ijin_gak !== null){
                $data['status'] = 99;
            } else{
                $jam_masuk = strtotime($absen->jam_masuk);
                $jam_masuk_mulai = $jam_masuk - 60*60; 
                $jam_masuk_toleransi = $jam_masuk + 60*15;
                $jam_pulang = strtotime($absen->jam_pulang);
                $max_jam_pulang = $jam_pulang  + 60*60;
                
                if($jam_now < $jam_masuk_mulai){
                    // belum waktu absen
                    $data['status'] = 1;
                    $data['pesan'] = date('H:i', $jam_masuk_mulai). ' sampai jam '.date('H:i', $jam_masuk);
                }
        
                if($jam_now >= $jam_masuk_mulai && $jam_now <= $jam_masuk){
                    // bisa absen , tidak telat
                    $data['status'] = 2;
                }
        
                if($jam_now >= $jam_masuk && $jam_now <= $jam_masuk_toleransi){
                    // bisa absen , telat
                    $data['status'] = 3;
                }
        
                if($jam_now > $jam_masuk && $jam_now > $jam_masuk_toleransi){
                    // tidak bisa absen ,telat , absen tidak bisa 
                    $data['status'] = 4;
                    $data['pesan'] = date('H:i', $jam_masuk_mulai). ' sampai jam '.date('H:i', $jam_masuk_toleransi);
                    
                    if($jam_now > $jam_pulang && $jam_now <= $max_jam_pulang){
                        $data['status'] = 2;
                        $data['pesan'] = null;
                    }
    
                    if($jam_now > $max_jam_pulang){
                        $data['status'] = 0;
                        $data['pesan'] = null;
                    }
                }
            }
        }

        // $data['judul'] = 'Dashboard';
        // $data['user_session'] = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row_array();
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
        $data['title'] = 'SI Monitoring | Absensi';
        $jam_now = strtotime("now");
        $tanggal = date('Y-m-d');

        $timeout = $this->input->post('noijazah');
        $time_out = explode('-', $timeout);
        $timenow = date('Y-m-d');
        $timeis = date('H:i:s');


        // query si user. jika tidak ada = flashmessage user tidak ditemukan 
        // cek kehadiran, apakah sudah ada atau belum . jika sudah ada berarti dia sudah absen masuk , dan sekarang lagi mau absen pulang 
        // cek status = Masuk / Pulang . if pulang dont do anything
        $user_data = $this->db->get_where('tbl_users', ['nik' => $this->session->userdata('nik')])->row();
        if($user_data === null){
            $this->session->set_flashdata('message', '<div class="alert alert-outline alert-danger">Data tidak ditemukan!<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
            redirect('user/absensi');
        }
        
        // $qr = $this->db->get_where('tbl_qrcode', ['tanggal' => $tanggal, 'jam_masuk' => $time_out[0].':00', 'jam_pulang' => $time_out[1].':00'])->row();
        $qr = $this->db->get_where('tbl_qrcode', ['tanggal' => $tanggal])->row();

        $jam_masuk = strtotime($qr->jam_masuk);
        $jam_masuk_mulai = $jam_masuk - 60*60; 
        $jam_masuk_toleransi = $jam_masuk + 60*15;
        $jam_pulang = strtotime($qr->jam_pulang);
        $jam_pulang_maximal = $jam_pulang + 60*60; 

        $kehadiran = $this->db->get_where('tbl_kehadiran', ['attendance_date' => $tanggal, 'id_user' => $user_data->id])->row();

        if($kehadiran == null){
            if($jam_now >= $jam_pulang){
                $this->session->set_flashdata('message', '<div class="alert alert-outline alert-danger">Maaf anda sudah telat untuk absen masuk.<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                redirect('user/absensi');
            }

            $data = [
                'id_user' => $user_data->id,
                'in_time' => date('H:i:s'),
                'attendance_date' => $tanggal,
                'status' => 'Masuk',
            ];

            $this->db->insert('tbl_kehadiran', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-outline alert-success">Berhasil! Tanggal '.$tanggal.' Sudah absen masuk.<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
            redirect('user/absensi');
        } else {
            if(strtotime("now") < $jam_pulang){
                $this->session->set_flashdata('message', '<div class="alert alert-outline alert-danger">Belum jam pulang woi!<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                redirect('user/absensi');
            }

            $data = [
                'out_time' => date('H:i:s'),
                'status' => 'Pulang',
            ];

            $this->db->where('id', $kehadiran->id);
            $this->db->update('tbl_kehadiran', $data);
            $gaji_default = $this->db->get_where('tbl_slip_gaji', ['id_role' => $user_data->id_role])->row();

            $jam_absen = strtotime($kehadiran->in_time);
            $penggajian = ['id_user' => $user_data->id, 'tgl_absen' => $tanggal, 'nominal' => $gaji_default->nominal];

            if($jam_absen > $jam_masuk){
                $denda = $this->db->get('denda_gaji')->row();
                $penggajian['nominal'] = intval($gaji_default->nominal) - intval($denda->nominal); 
            } 

            $udah_gaji = $this->db->get_where('tbl_gaji_pegawai', ['id_user' => $user_data->id, 'tgl_absen' => $tanggal])->row();
            if($udah_gaji === null){
                $this->db->insert('tbl_gaji_pegawai', $penggajian);
            }

            $this->session->set_flashdata('message', '<div class="alert alert-outline alert-success">Berhasil! Tanggal '.$tanggal.' Sudah absen pulang.<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
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
        $test = $this->db->query("SELECT * FROM tbl_qrcode WHERE tanggal = '$date_now' ORDER BY id DESC LIMIT 1")->row_array();
        $data['qrcode'] = $test['thumbnail'];

        $this->load->view('user/showqr', $data);
        }
    }

}
