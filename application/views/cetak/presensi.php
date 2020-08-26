	<?php 
	echo '';
	echo '<h2 style="font-size: 22px">KANTOR UNIT PENGELOLA KEGIATAN KECAMATAN CERMEE</h2>';
	echo '';
	
	?>
	<body onload="this.print()">
	<hr id="bulanan" style="border-width: 2px; border-color: #000">
	
	<h5>Laporan Presensi Hari ini</h5>
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