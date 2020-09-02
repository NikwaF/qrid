<!-- BEGIN BASE-->
<div id="base">
	<!-- BEGIN OFFCANVAS LEFT -->
	<div class="offcanvas">
	</div>
	<!--end .offcanvas-->
	<!-- END OFFCANVAS LEFT -->

	<!-- BEGIN CONTENT-->
	<div id="content">
		<section class="style-default-bright">
			<div class="section-header">
				<h2 class="text-dark">Presensi List</h2>
			</div>
			<div class="section-body">

				<!-- BEGIN DATATABLE 1 -->

				<div class="row">
					<div class="col-md-8">
						<a href="<?= base_url(); ?>cetak/presensi" target="_blank" class="btn ink-reaction btn-raised btn-dark"
							><i class="fa fa-plus"></i> Cetak Presensi</a>
						<div class="btn-group">
							<a class="btn btn-success dropdown-toggle" data-toggle="dropdown"
								href="<?=base_URL()?>cetak/kunjung_bulan/<?=date('m')?>">Cetak Bulan <span
									class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?=base_URL()?>cetak/kunjung_bulan/1" target="_blank">Januari</a></li>
								<li><a href="<?=base_URL()?>cetak/kunjung_bulan/2" target="_blank">Februari</a></li>
								<li><a href="<?=base_URL()?>cetak/kunjung_bulan/3" target="_blank">Maret</a></li>
								<li><a href="<?=base_URL()?>cetak/kunjung_bulan/4" target="_blank">April</a></li>
								<li><a href="<?=base_URL()?>cetak/kunjung_bulan/5" target="_blank">Mei</a></li>
								<li><a href="<?=base_URL()?>cetak/kunjung_bulan/6" target="_blank">Juni</a></li>
								<li><a href="<?=base_URL()?>cetak/kunjung_bulan/7" target="_blank">Juli</a></li>
								<li><a href="<?=base_URL()?>cetak/kunjung_bulan/8" target="_blank">Agustus</a></li>
								<li><a href="<?=base_URL()?>cetak/kunjung_bulan/9" target="_blank">September</a></li>
								<li><a href="<?=base_URL()?>cetak/kunjung_bulan/10" target="_blank">Oktober</a></li>
								<li><a href="<?=base_URL()?>cetak/kunjung_bulan/11" target="_blank">November</a></li>
								<li><a href="<?=base_URL()?>cetak/kunjung_bulan/12" target="_blank">Desember</a></li>
							</ul>
						</div>
					</div>
					<!--end .col -->
				</div>
				<!--end .row -->

				<div class="row" style="margin-top: 15px">
					<div class="card">
						<div class="card-body">
							<div class="col-lg-12">
								<div class="table-responsive">
									<table id="datatable1" class="table table-striped table-hover">
										<thead>
											<tr>
												<th>ID</th>
												<th>Nomer Karyawan</th>
												<th>Absen Masuk</th>
												<th>Absen Keluar</th>
												<th>Tanggal Absen</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i=1;
											foreach ($data as $b) {
												?>
											<tr>
												<td>
													<?= $i++ ?>
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
											} ?>
										</tbody>
									</table>
								</div>
								<!--end .table-responsive -->
							</div>
							<!--end .col -->

						</div>

					</div>
				</div>
				<!--end .row -->
				<!-- END DATATABLE 1 -->

				<hr class="ruler-xxl" />

			</div>
			<!--end .section-body -->
		</section>
	</div>
	<!--end #content-->
	<!-- END CONTENT -->

	<!-- BEGIN MENUBAR-->
	<div id="menubar" class="menubar-inverse ">
		<div class="menubar-fixed-panel">
			<div>
				<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar"
					href="javascript:void(0);">
					<i class="fa fa-bars"></i>
				</a>
			</div>
			<div class="expanded">
				<a href="dashboard.html">
					<span class="text-lg text-bold text-dark ">MATERIAL&nbsp;ADMIN</span>
				</a>
			</div>
		</div>
