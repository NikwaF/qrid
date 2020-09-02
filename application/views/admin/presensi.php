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
						<a href="<?= base_url(); ?>admin/presensi/tambah_qr" class="btn ink-reaction btn-raised btn-dark" style="margin-bottom: 10px;"><i class="fa fa-plus"></i> Add QR</a>
						<a href="<?= base_url(); ?>admin/presensi/ajukan" class="btn ink-reaction btn-raised btn-dark" style="margin-bottom: 10px;"><i class="fa fa-plus"></i> Request Permission</a>
						<a href="<?= base_url(); ?>admin/presensi/showqr" class="btn ink-reaction btn-raised btn-dark" style="margin-bottom: 10px;"><i class="fa fa-info"></i> Show QRList</a>
					</div>
					<!--end .col -->
				</div>
				<!--end .row -->

				<div class="row">
					<div class="card">
						<div class="card-body">
							<div class="col-lg-12">
								<div class="table-responsive text-center">
									<table id="datatable1" class=" table table-striped table-hover">
										<thead class="text-center">
											<tr>
												<th>ID</th>
												<th>Nama Karyawan</th>
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
														<?php
														if($b['out_time'] == null) {
														    echo '<center>-</center>'; 
														} else {
														$keluar = $b['out_time'];
														echo "<center>$keluar</center>"; 
														}
														?>
													</td>
													<td>
													<?=tgl_indo($b['attendance_date']) ?>
													</td>
													<td>
														<?= $b['status'] === 'Pulang' || $b['status'] === 'Masuk' ? 'Hadir' : '-' ?>
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
				<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
					<i class="fa fa-bars"></i>
				</a>
			</div>
			<div class="expanded">
				<a href="dashboard.html">
					<span class="text-lg text-bold text-dark ">MATERIAL&nbsp;ADMIN</span>
				</a>
			</div>
		</div>
