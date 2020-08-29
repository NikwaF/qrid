	<?php 
	echo '';
	echo '<h2 style="font-size: 22px">KANTOR UNIT PENGELOLA KEGIATAN KECAMATAN CERMEE>';
	echo '';
	
	?>
	<body onload="this.print()">
	<hr id="bulanan" style="border-width: 2px; border-color: #000">
	
	<h5>Data Operator</h5>
	<table style="width: 100%; font-size: 10px; border-collapse: collapse" border="1" class="table table-condensed">
		<tr>
			<th width="5%">No</th>
			<th width="15%">No. Karyawan</th>
			<th width="10%">Nama Lengkap</th>
			<th width="7%">Terdaftar pada</th>
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
			<td style="text-align: center"><?=$d->nik?></td>
			<td style="text-align: center"><?=$d->nama?></td>
			<td style="text-align: center"><?= tgl_indo($d->registered_date)?></td>
		</tr>	
		<?php
			$no++;
			}
		}
		?>
	</table>