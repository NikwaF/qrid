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
				<h2 class="text-dark">Add QR Code</h2>
			</div>
			<div class="section-body">

				<!-- BEGIN HORIZONTAL FORM - BASIC ELEMENTS-->
				<div class="card">
					<div class="card-body">
						<form class="form-horizontal" role="form" action="<?= base_url('admin/presensi/tambah_qr'); ?>" method="post">
							<div class="form-group" style="margin-bottom: 20px;">
								<label for="nama_barang" class="col-sm-2 control-label">Timeout Keterlambatan</label>
								<div class="col-sm-10">
									<input type="timeout" class="form-control" id="timeout" name="timeout" placeholder="Timeout Keterlambatan (cth: 24:00:00)" value="<?= set_value('timeout') ?>">
									<?= form_error('timeout','<div class="bg-info text-dark"><small>','</small></div>'); ?>
								</div>
							</div>
							
							<div class="form-group" style="margin-bottom: 20px;">
								<label for="nama_barang" class="col-sm-2 control-label">Tanggal Posting</label>
								<div class="col-sm-10">
									<input type="tanggal" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal Posting (cth: 2020-08-06)" value="<?= set_value('timeout') ?>">
									<?= form_error('tanggal','<div class="bg-info text-dark"><small>','</small></div>'); ?>
								</div>
							</div>

							<div class="form-layout-footer" style="float: right;">
								<button type="submit" class="btn btn-dark bd-0">Add QR</button>
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
