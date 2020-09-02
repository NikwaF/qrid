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
		$mnth = "September";
	} elseif ($month == 10) {
		$mnth = "Oktober";
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
			<th width="5%">NIK</th>
			<th width="10%">Nama Lengkap</th>
			<th width="7%">Absen Masuk</th>
			<th width="7%">Absen Pulang</th>
			<th width="8%">Waktu Absen</th>
			<th width="10%">Status Absen</th>
		</tr>
		<?php 
		if (count($data) === 0) {
			echo "<tr><td colspan='8' style='text-align: center'> - Tidak ada data - </td></tr>";
		} else {
			$no = 1;
			foreach($data as $b) {
		?>
		<tr>
												<td>
													<?= $no++ ?>
												</td>
												<td>
													<?= $b['nik']; ?>
												</td>
												<td>
													<?= $b['nama']; ?>
												</td>
												<td>
													<?= $b['in_time']; ?>
												</td>
												<td>
													<?= $b['out_time']; ?>
												</td>
												<td>
													<?= tgl_indo($b['attendance_date']); ?>
												</td>
												<td>
													<?= $b['status'] === 'Pulang' || $b['status'] === 'Masuk' ? 'Hadir' : 'Izin tidak masuk' ?>
												</td>
											</tr>
		<?php
			$no++;
			}
		}
		?>
	</table>