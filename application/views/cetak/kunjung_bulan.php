	<?php 
	echo '';
	echo '<h2 style="font-size: 22px">KANTOR UNIT PENGELOLA KEGIATAN KECAMATAN CERMEE</h2>';
	echo '';
	
	?>
	<body onload="this.print()">
	<hr id="bulanan" style="border-width: 2px; border-color: #000">
	<?php 
	$month = $this->uri->segment(3); 
	if($month == 1) {
		$mnth = "Januari";
	} elseif ($month == 2) {
		$mnth = "Februari";
	} elseif ($month == 3) {
		$mnth = "Maret";
	} elseif ($month == 4) {
		$mnth = "April";
	} elseif ($month == 5) {
		$mnth = "Mei";
	} elseif ($month == 6) {
		$mnth = "Juni";
	} elseif ($month == 7) {
		$mnth = "Juli";
	} elseif ($month == 8) {
		$mnth = "Agustus";
	} elseif ($month == 9) {
		$mnth = "Oktober";
	} elseif ($month == 10) {
		$mnth = "September";
	} elseif ($month == 11) {
		$mnth = "November";
	} elseif ($month == 12) {
		$mnth = "Desember";
	}
	?>
	<h5>Laporan Presensi Bulan "<?=$mnth?>"</h5>
	<table style="width: 100%; font-size: 10px; border-collapse: collapse" border="1" class="table table-condensed">
		<tr>
			<th width="5%">No</th>
			<th width="15%">No. Karyawan</th>
			<th width="10%">Nama Lengkap</th>
			<th width="7%">Absen Masuk</th>
			<th width="7%">Absen Pulang</th>
			<th width="8%">Waktu Absen</th>
			<th width="10%">Status Absen</th>
		</tr>
		<?php 
		$data 	= $this->db->query("SELECT u.nama, u.divisi, t.id_karyawan, t.in_time, t.out_time, t.attendance_date, t.status FROM tbl_kehadiran t, tbl_users u WHERE u.nik = t.id_karyawan AND MID(t.attendance_date, 6, 2) = '$bulan'")->result();
		if (empty($data)) {
			echo "<tr><td colspan='8' style='text-align: center'> - Tidak ada data - </td></tr>";
		} else {
			$no = 1;
			foreach($data as $d) {
		?>
		<tr>
			<td style="text-align: center"><?=$no?></td>
			<td style="text-align: center"><?=$d->id_karyawan?></td>
			<td style="text-align: center"><?=$d->nama?></td>
			<td style="text-align: center"><?=$d->in_time?></td>
			<td style="text-align: center"><?=$d->out_time?></td>
			<td style="text-align: center"><?=$d->attendance_date?></td>
			<td style="text-align: center">
			<?php
			if($d->status == 'Masuk') {
				echo 'masuk';
			} else if($d->status == 'Pulang') {
				echo 'pulang';
			} ?>
			</td>
		</tr>	
		<?php
			$no++;
			}
		}
		?>
	</table>