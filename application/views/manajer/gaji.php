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
				<h2 class="text-dark">Gaji</h2>
			</div>
			<div class="section-body">

				<!-- BEGIN DATATABLE 1 -->

				<div class="row">
					<div class="col-md-8">
						<a href="<?= base_url(); ?>cetak/cetak_gaji" target="_blank" class="btn ink-reaction btn-raised btn-dark"><i class="fa fa-print"></i> Print Gaji Karyawan</a>
						<a href="<?= base_url(); ?>manajer/gaji/tambah" class="btn ink-reaction btn-raised btn-dark"><i class="fa fa-plus"></i> Add Gaji</a>
					</div>
					<!--end .col -->
				</div>
				<!--end .row -->

				<div class="row" style="margin-top: 15px;">
					<div class="card">
						<div class="card-body">
							<div class="col-lg-12">
								<div class="table-responsive">
									<table id="datatable1" class="table table-striped table-hover">
										<thead>
											<tr>
												<th>ID</th>
												<th>Jabatan</th>
												<th>Nominal</th>
												<th>Aksi</th>
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
													<td class="text-uppercase">
														<?= $b['jabatan']; ?>
													</td>
													<td>
														Rp <?= number_format($b['nominal'],0,',','.'); ?>
													</td>
													<td>
													    <a href="<?= base_url(); ?>manajer/gaji/edit/<?= $b['id']; ?>" class="btn btn-outline-danger btn-icon rounded-circle">
															<div><i class="fa fa-edit"></i></div>
														</a>
														<a href="<?= base_url(); ?>manajer/gaji/hapus/<?= $b['id']; ?>" class="btn btn-outline-danger btn-icon rounded-circle" title="Hapus Produk">
															<div><i class="fa fa-trash"></i></div>
														</a>
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
