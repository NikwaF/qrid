<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cetak extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		if(!isset($_SESSION['nik'])) {
			redirect('autha');
		}
		
		echo "Halaman Cetak";
	}
	
	public function presensi() {
		if(!isset($_SESSION['nik'])) {
			redirect('autha');
		}
		
		//view tampilan website\
		$a['data']		= $this->db->query("SELECT u.nama, t.id_karyawan, t.in_time, t.out_time, t.attendance_date, t.status FROM tbl_kehadiran t, tbl_users u WHERE u.nik = t.id_karyawan ORDER BY t.id ASC")->result();
		$this->load->view('cetak/presensi', $a);
	}

	public function cetak_gaji() {
		if(!isset($_SESSION['nik'])) {
			redirect('autha');
		}
		
		//view tampilan website\
		$a['data']		= $this->db->query("SELECT p.nik as nik_karyawan, p.nama as nama_lengkap, p.level as level, COUNT(t.id_karyawan) as total_absen, SUM(nominal) as total_gaji_kerja, CASE WHEN COUNT(t.id_karyawan) < 30 THEN 'Absen Tidak Mencukupi Kriteria' ELSE 'Absen Mencukupi Kriteria' END AS info_absen FROM tbl_users p LEFT JOIN tbl_gaji_pegawai t ON p.id=t.id_karyawan WHERE p.level IN ('karyawan', 'admin') GROUP BY p.id")->result();
		$this->load->view('cetak/gaji', $a);
	}

	public function cetak_karyawan() {
		if(!isset($_SESSION['nik'])) {
			redirect('autha');
		}
		
		//view tampilan website\
		$a['data']		= $this->db->query("SELECT * FROM tbl_users WHERE level = 'karyawan'")->result();
		$this->load->view('cetak/karyawan', $a);
	}

	public function cetak_operator() {
		if(!isset($_SESSION['nik'])) {
			redirect('autha');
		}
		
		//view tampilan website\
		$a['data']		= $this->db->query("SELECT * FROM tbl_users WHERE level = 'admin'")->result();
		$this->load->view('cetak/operator', $a);
	}
	
	public function kunjung_bulan() {
		if(!isset($_SESSION['nik'])) {
			redirect('autha');
		}
		
		//view tampilan website\
		$a['bulan']		= str_pad($this->uri->segment(3), 2, '0', STR_PAD_LEFT);
		
		$this->load->view('cetak/kunjung_bulan', $a);
	}

	public function kunjung_bulans() {
		if(! $this->session->userdata('validated')){
            redirect('apps/login');
        }
		
		//view tampilan website\
		$a['bulan']		= str_pad($this->uri->segment(3), 2, '0', STR_PAD_LEFT);
		
		$this->load->view('cetak/kunjung_bulans', $a);
	}
	
	public function kunjung_hari_ini() {
		if(! $this->session->userdata('validated')){
            redirect('apps/login');
        }
		
		//view tampilan website\
		//$a['bulan']		= str_pad($this->uri->segment(3), 2, '0', STR_PAD_LEFT);
		
		$this->load->view('cetak/kunjung_hari_ini');
	}
	
	
	public function l_peminjam() {
		if(! $this->session->userdata('validated')){
            redirect('apps/login');
        }
		
		$tipe			= $this->uri->segment(3);
		
		$m['page']		= "peminjaman";
		
		if ($tipe == "hariini") {
			$m['data']	= $this->db->query("SELECT * FROM t_trans WHERE tgl_pinjam = LEFT(NOW(), 10)")->result();
			$m['judul']	= "Hari Ini (".date('d F Y').")";
		} else if ($tipe == "bulnini") {
			$m['data']	= $this->db->query("SELECT * FROM t_trans WHERE MID(tgl_pinjam, 6, 2) = MONTH(NOW())")->result();
			$m['judul']	= "Bulan Ini (".date('F Y').")";
		}
		
		$this->load->view('cetak/peminjaman', $m);
	}
	
	public function data_buku() {
		if(! $this->session->userdata('validated')){
            redirect('apps/login');
        }
		
		$m['data']	= $this->db->query("SELECT * FROM t_buku")->result();
		$this->load->view('cetak/buku', $m);
	}
	
	public function data_anggota() {
		if(! $this->session->userdata('validated')){
            redirect('apps/login');
        }
		
		$m['data']	= $this->db->query("SELECT * FROM t_anggota WHERE stat = '1'")->result();
		$this->load->view('cetak/anggota', $m);
	}
}