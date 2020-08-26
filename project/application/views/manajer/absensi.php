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
				<h2 class="text-primary">Absensi Harian (<?= $this->session->userdata('nama') ?>)</h2>
			</div>
			<div class="section-body">

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
												<th>Jenis Kelamin</th>
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
														<?= $c['siswa_nis'] ?>
													</td>
													<td>
														<?= $c['siswa_nama'] ?>
													</td>
													<td>
														<?php if ($c['siswa_jenkel'] == 'L') {?>
														Laki Laki
														<?php } elseif ($c['siswa_jenkel'] == 'P') {?>
														Perempuan
														<?php } ?>
													</td>
													<td>
														<form method="POST">
															<input type="hidden" name="nis" value="<?= $c['siswa_nis'] ?>">
															<input type="hidden" name="nama" value="<?= $c['siswa_nama'] ?>">
															<select name="absen" type="form-control">
																<option value="Y">Hadir</option>
																<option value="I">Izin</option>
																<option value="A">Alpa</option>
															</select>
															<button class="btn btn-sm btn-info" type="submit" name="submit">Klik</button>
														</form>
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
