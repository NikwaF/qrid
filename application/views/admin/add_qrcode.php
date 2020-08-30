<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />
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
						<form class="form-horizontal" action="<?= base_url('admin/presensi/tambah_qr'); ?>" method="post">
						<div class="row">
							<div class="form-group" style="margin-bottom: 20px;">
								<label for="nama_barang" class="col-sm-2 control-label">Tanggal Posting</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="tanggal" autocomplete="off" name="tanggal" placeholder="Tanggal Posting (cth: 2020-08-06)" value="<?= set_value('timeout') ?>">
									<?= form_error('tanggal','<div class="bg-info text-dark"><small>','</small></div>'); ?>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="form-group" style="margin-bottom: 20px;">
								<label for="nama_barang" class="col-sm-2 control-label">Jam masuk</label>
								<div class="col-sm-10">
									<input type="text" class="form-control"  autocomplete="off" name="jam_masuk" placeholder="" value="<?= set_value('jam_masuk') ?>">
									<?= form_error('jam_masuk','<div class="bg-info text-dark"><small>','</small></div>'); ?>
								</div>
							</div>
						</div>						

						<div class="row">
							<div class="form-group" style="margin-bottom: 20px;">
								<label for="nama_barang" class="col-sm-2 control-label">Jam Pulang</label>
								<div class="col-sm-10">
									<input type="text" class="form-control"  autocomplete="off" name="jam_pulang" placeholder="" value="<?= set_value('jam_pulang') ?>">
									<?= form_error('jam_pulang','<div class="bg-info text-dark"><small>','</small></div>'); ?>
								</div>
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

			<script
			  src="https://code.jquery.com/jquery-3.5.1.min.js"
			  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
			  crossorigin="anonymous"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>				

				
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<script>


$('input[name="jam_masuk"]').timepicker({
    timeFormat: 'HH:mm',
    interval: 15,
    minTime: '07',
    maxTime: '8:00pm',
    defaultTime: '07:00',
    startTime: '07:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});

$('input[name="jam_pulang"]').timepicker({
    timeFormat: 'HH:mm',
    interval: 15,
    minTime: '07',
    maxTime: '8:00pm',
    defaultTime: '14:00',
    startTime: '15:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});

$('#tanggal').datepicker({
	todayHighlight: true,
	format: 'yyyy-mm-dd'
});


</script>