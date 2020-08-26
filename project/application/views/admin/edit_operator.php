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
				<h2 class="text-primary">Add Operator</h2>
			</div>
			<div class="section-body">

				<!-- BEGIN HORIZONTAL FORM - BASIC ELEMENTS-->
				<div class="card">
					<div class="card-body">
						<form class="form-horizontal" role="form" action="<?= base_url('admin/administrator/edit'); ?>" method="post" enctype="multipart/form-data">
						    <input type="hidden" class="form-control" id="id" name="id" value="<?= $user_session['id'] ?>">
							<div class="form-group" style="margin-bottom: 20px;">
								<label for="nama_barang" class="col-sm-2 control-label">Nama Lengkap</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= $user_session['nama'] ?>">
									<?= form_error('nama','<div class="bg-info text-dark"><small>','</small></div>'); ?>
								</div>
							</div>
							<div class="form-group" style="margin-bottom: 20px;">
								<label for="nama_barang" class="col-sm-2 control-label">NIK</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="nik" name="nik" placeholder="NIK Karyawan" value="<?= $user_session['nik'] ?>">
									<?= form_error('nik','<div class="bg-info text-dark"><small>','</small></div>'); ?>
								</div>
							</div>
							<div class="form-group" style="margin-bottom: 20px;">
								<label for="nama_barang" class="col-sm-2 control-label">Password</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="passcode" name="passcode" placeholder="Password Karyawan" value="<?= $user_session['passcode'] ?>">
									<?= form_error('passcode','<div class="bg-info text-dark"><small>','</small></div>'); ?>
								</div>
							</div>
							<div class="form-group" style="margin-bottom: 20px;">
								<label for="nama_barang" class="col-sm-2 control-label">Divisi</label>
								<div class="col-sm-10">
								    <select class="form-control" name="divisi" id="divisi">
								        <option value="#">Pilih salah satu</option>
								        <?php
								        foreach($divisi as $d): ?>
								        <option value="<?= $d['nama'] ?>"><?= $d['nama'] ?></option>
								        <?php endforeach; ?>
								    </select>
									<?= form_error('divisi','<div class="bg-info text-dark"><small>','</small></div>'); ?>
								</div>
							</div>

							<div class="form-layout-footer" style="float: right;">
								<button type="submit" class="btn btn-primary bd-0">Edit Data</button>
								<a href="javascript:window.history.back()" class="btn btn-secondary bd-0">Cancel</a>
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
						<span class="text-lg text-bold text-primary ">MATERIAL&nbsp;ADMIN</span>
					</a>
				</div>
			</div>
