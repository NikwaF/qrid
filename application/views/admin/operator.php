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
						<a href="<?= base_url(); ?>admin/administrator/tambah" class="btn ink-reaction btn-raised btn-primary" style="margin-bottom: 10px;"><i class="fa fa-plus"></i> Add Operator</a>
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
												<th>Level</th>
												<th>Status</th>
												<th>Terdaftar sejak</th>
												<th>Menu</th>
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
													<td class="text-capitalize">
														<?= $b['nama']; ?>
													</td>
													<td class="text-uppercase">
														<?= $b['id_role'] == 2 ? 'Admin' : 'Manajer'; ?>
													</td>
													<td class="text-uppercase">
														<?= $b['status'] == 1 ? 'AKTIF' : 'TIDAK AKTIF'; ?>
													</td>
													<td>
														<?= tgl_indo($b['registered_date']); ?>
													</td>
													<td>
													    <a href="<?= base_url(); ?>admin/administrator/edit/<?= $b['id']; ?>" class="btn btn-outline-dark btn-icon rounded-circle">
															<div><i class="fa fa-edit"></i></div>
														</a>
														<a href="<?= base_url(); ?>admin/administrator/hapus/<?= $b['id']; ?>" class="btn btn-outline-dark btn-icon rounded-circle tombol-hapus" title="Hapus Produk">
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
