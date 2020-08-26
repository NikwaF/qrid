	<?php 
	echo '';
	echo '<h2 style="font-size: 22px">KANTOR UNIT PENGELOLA KEGIATAN KECAMATAN CERMEE>';
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
	<h5>Laporan Gaji Bulan "<?=$mnth?>"</h5>
	<table style="width: 100%; font-size: 10px; border-collapse: collapse" border="1" class="table table-condensed">
		<tr>
			<th width="5%">No</th>
			<th width="10%">No. Karyawan</th>
			<th width="10%">Nama Lengkap</th>
			<th width="10%">Jabatan</th>
			<th width="10%">Nominal</th>
		</tr>
		<?php 
		if (empty($data)) {
			echo "<tr><td colspan='8' style='text-align: center'> - Tidak ada data - </td></tr>";
		} else {
			$no = 1;
			foreach($data as $d) {
				$jabatan = $d->level;
				$query = $this->db->query("SELECT * FROM tbl_slip_gaji WHERE jabatan = '$jabatan'")->row_array();
				if($query['jabatan'] == "admin") {
					$nominal = $query['nominal'];
				} else if($query['jabatan'] == "karyawan") {
					$nominal = $query['nominal'];
				}
		?>
		<tr>
			<td style="text-align: center"><?=$no?></td>
			<td style="text-align: center"><?=$d->nik?></td>
			<td style="text-align: center"><?=$d->nama?></td>
			<td style="text-align: center"><?=$d->level?></td>
			<td style="text-align: center">Rp <?= number_format($nominal,0,',','.'); ?></td>
		</tr>	
		<?php
			$no++;
			}
		}
		?>
	</table>