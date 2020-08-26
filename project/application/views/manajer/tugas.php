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
				<h2 class="text-primary">Daftar Tugas</h2>
			</div>
			<div class="section-body">

				<!-- BEGIN DATATABLE 1 -->

				<div class="row">
					<div class="col-md-8">
						<a href="<?= base_url(); ?>wali/tugas/tambah" class="btn ink-reaction btn-raised btn-primary" style="margin-bottom: 10px;"><i class="fa fa-plus"></i> Tambah Tugas</a>
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
												<th>No</th>
												<th>Kelas</th>
												<th>Tugas</th>
												<th>Tugas oleh</th>
												<th>Tanggal</th>
												<th>Menu</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i=1;
											foreach ($data as $c) {
												?>
												<tr>
													<td>
														<?= $i++ ?>
													</td>
													<td>
														<?= $c['kelas'] ?>
													</td>
													<td>
														<?= $c['judul'] ?>
													</td>
													<td>
														<?= $c['author'] ?>
													</td>
													<td>
														<?= $c['post_date'] ?>
													</td>
													<td>
														<a href="<?= base_url(); ?>wali/tugas/edit/<?= $c['id'] ?>" class="modal-effect btn btn-outline-primary btn-icon rounded-circle" data-toggle="modal" data-effect="effect-fall" title="Detail Customers">
															<div><i class="fa fa-info"></i></div>
														</a>
														<a href="<?= base_url(); ?>wali/tugas/hapus/<?= $c['id'] ?>" class="btn btn-outline-danger btn-icon rounded-circle tombol-hapus" title="Delete Customer">
															<div><i class="fa fa-close"></i></div>
														</a>
													</td>
												</tr>
											<?php } ?>
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
					<span class="text-lg text-bold text-primary ">MATERIAL&nbsp;ADMIN</span>
				</a>
			</div>
		</div>
