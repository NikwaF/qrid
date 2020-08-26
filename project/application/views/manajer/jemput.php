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
				<h2 class="text-primary">Daftar Jemput</h2>
			</div>
			<div class="section-body">

				<!-- BEGIN DATATABLE 1 -->
				<!--end .row -->

				<div class="row">
					<div class="card">
						<div class="card-body">
						<?= $this->session->userdata('message'); ?>
							<div class="col-lg-12">
								<div class="table-responsive">
									<table id="datatable1" class="table table-striped table-hover">
										<thead>
											<tr>
												<th>No</th>
												<th>NIS</th>
												<th>Nama Lengkap</th>
												<th>Wali Kelas</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i=1;
											foreach ($data as $c) {

												$query = $this->db->get_where('tbl_siswa', ['siswa_nis' => $c['nis']])->row_array();
												$nama = $query['siswa_nama'];
												?>
												<tr>
													<td>
														<?= $i++ ?>
													</td>
													<td>
														<?= $c['nis'] ?>
													</td>
													<td>
														<?= $nama ?>
													</td>
													<td>
														<?= $c['wali_kelas'] ?>
													</td>
													<td>
														<?= $c['status'] ?>
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
