	<?php 
	echo '';
	echo '<h2 style="font-size: 22px">KANTOR UNIT PENGELOLA KEGIATAN KECAMATAN CERMEE</h2>';
	echo '';
	
	?>
	<body onload="this.print()">
	<hr id="bulanan" style="border-width: 2px; border-color: #000">
	
	<h5>Laporan Gaji</h5>
	<table style="width: 100%; font-size: 10px; border-collapse: collapse" border="1" class="table table-condensed">
		<tr>
			<th width="5%">No</th>
			<th width="10%">No. Karyawan</th>
			<th width="10%">Nama Lengkap</th>
			<th width="10%">Jabatan</th>
			<th width="10%">Total Absensi</th>
			<th width="10%">Total Gaji Pegawai</th>
			<th width="10%">Status Pegawai</th>
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
			<td style="text-align: center"><?=$d->nik_karyawan?></td>
			<td style="text-align: center"><?=$d->nama_lengkap?></td>
			<td style="text-align: center"><?=$d->level?></td>
			<td style="text-align: center"><?=$d->total_absen?></td>
			<td style="text-align: center">Rp <?= number_format($d->total_gaji_kerja,0,',','.'); ?></td>
			<td style="text-align: center"><?=$d->info_absen?></td>

		</tr>	
		<?php
			$no++;
			}
		}
		?>
	</table>