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
				<h2 class="text-dark">Add Request</h2>
			</div>
			<div class="section-body">

				<!-- BEGIN HORIZONTAL FORM - BASIC ELEMENTS-->
				<div class="card">
					<div class="card-body">
						<form class="form-horizontal" role="form"
							action="<?= base_url('admin/presensi/tambah_pengajuan'); ?>" method="post"
							enctype="multipart/form-data">
							<div class="form-group" style="margin-bottom: 20px;">
								<label for="nama_barang" class="col-sm-2 control-label">NIK</label>
								<div class="col-sm-10">
									<select class="form-control" name="nik">
										<option value="#">Pilih salah satu</option>
										<?php foreach($data as $d): ?>
										<option value="<?= $d['id'] ?>"><?= $d['nama'] ?></option>
										<?php endforeach; ?>
									</select>
									<?= form_error('nik','<div class="bg-info text-dark"><small>','</small></div>'); ?>
								</div>
							</div>
							<div class="form-group" style="margin-bottom: 20px;">
								<label for="nama_barang" class="col-sm-2 control-label">Reason</label>
								<div class="col-sm-10">
									<textarea class="form-control" id="reason" name="reason"
										placeholder="Alasan Karyawan"><?= set_value('reason') ?></textarea>
									<?= form_error('reason','<div class="bg-info text-dark"><small>','</small></div>'); ?>
								</div>
							</div>
							<div class="form-group" style="margin-bottom: 20px;">
								<label for="nama_barang" class="col-sm-2 control-label">Permintaan</label>
								<div class="col-sm-10">
									<select class="form-control" name="request">
										<option value="#">Pilih salah satu</option>
										<option value="Izin">Izin</option>
										<option value="Sakit">Sakit</option>
										<option value="Cuti">Cuti</option>
										<option value="Lainnya">Lainnya</option>
									</select>
									<?= form_error('request','<div class="bg-info text-dark"><small>','</small></div>'); ?>
								</div>
							</div>

							<div class="form-layout-footer" style="float: right;">
								<button type="submit" class="btn btn-dark bd-0">Tambah Data</button>
								<a href="javascript:window.history.back()" class="btn btn-dark bd-0">Cancel</a>
							</form>
						</div>
						<!--end .card-body -->
					</div>
					<!--end .card -->
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