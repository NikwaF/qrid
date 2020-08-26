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
				<h2 class="text-dark">Edit Operator/Manajer</h2>
			</div>
			<div class="section-body">

				<!-- BEGIN HORIZONTAL FORM - BASIC ELEMENTS-->
				<div class="card">
					<div class="card-body">
						<form class="form-horizontal" role="form" action="<?= base_url('admin/administrator/tambah'); ?>" method="post" enctype="multipart/form-data">
							<div class="form-group" style="margin-bottom: 20px;">
								<label for="nama_barang" class="col-sm-2 control-label">Nama Lengkap</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama') ?>">
									<?= form_error('nama','<div class="bg-info text-dark"><small>','</small></div>'); ?>
								</div>
							</div>
							<div class="form-group" style="margin-bottom: 20px;">
								<label for="nama_barang" class="col-sm-2 control-label">NIK</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="nik" name="nik" placeholder="NIK Karyawan" value="<?= set_value('nik') ?>">
									<?= form_error('nik','<div class="bg-info text-dark"><small>','</small></div>'); ?>
								</div>
							</div>
							<div class="form-group" style="margin-bottom: 20px;">
								<label for="nama_barang" class="col-sm-2 control-label">Password</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="passcode" name="passcode" placeholder="Password Karyawan" value="<?= set_value('passcode') ?>">
									<?= form_error('passcode','<div class="bg-info text-dark"><small>','</small></div>'); ?>
								</div>
							</div>
							<div class="form-group" style="margin-bottom: 20px;">
								<label for="nama_barang" class="col-sm-2 control-label">Jabatan</label>
								<div class="col-sm-10">
								    <select class="form-control" name="level" id="level">
								        <option value="#">Pilih salah satu</option>
								        <option value="admin">Admin</option>
								        <option value="manajer">Manajer</option>
								    </select>
									<?= form_error('level','<div class="bg-info text-dark"><small>','</small></div>'); ?>
								</div>
							</div>

							<div class="form-layout-footer" style="float: right;">
								<button type="submit" class="btn btn-primary bd-0">Tambah Data</button>
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
