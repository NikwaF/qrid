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
				<h2 class="text-dark">Operator List</h2>
			</div>
			<div class="section-body">

				<!-- BEGIN DATATABLE 1 -->

				<div class="row">
					<div class="col-md-8">
						<a href="<?= base_url(); ?>cetak/cetak_operator" class="btn ink-reaction btn-raised btn-dark" style="margin-bottom: 10px;"><i class="fa fa-print"></i> Print Operator</a>
					</div>
					<!--end .col -->
				</div>
				<!--end .row -->

				<div class="row">
					<div class="card">
						<div class="card-body">
							<div class="col-lg-12">
								<div class="table-responsive">
									<table id="datatable1" class="table table-striped table-hover">
										<thead>
											<tr>
												<th>ID</th>
												<th>Nomer Karyawan</th>
												<th>Nama Lengkap</th>
												<th>Status</th>
												<th>Terdaftar sejak</th>
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
														<?= $b['nik']; ?>
													</td>
													<td>
														<?= $b['nama']; ?>
													</td>
													<td>
														<?= $b['status'] == 1 ? 'AKTIF' : 'TIDAK AKTIF'; ?>
													</td>
													<td>
														<?= tgl_indo($b['registered_date']); ?>
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
