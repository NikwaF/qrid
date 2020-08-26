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
				<h2 class="text-primary">Pengajuan Jemput</h2>
			</div>
			<div class="section-body">

				<div class="row">

					<div class="card">
						<div class="card-body">
						<?= $this->session->flashdata('message'); ?>
							<form method="POST">
								<div class="form-group">
									<label for="exampleEmail1">Nomer Induk Siswa</label>
									<input type="number" class="form-control" readonly name="nis" value="<?= $this->session->userdata('nis') ?>"/>
								</div>
								<div class="form-group">
									<label for="exampleEmail1">Tanggal</label>
									<input type="text" class="form-control" readonly name="tanggal" value="<?= date('d-m-Y') ?>"/>
								</div>
								<div class="form-group">
									<?php
										if($status_tombol == "YA") {
									?>
									<button type="submit" class="btn btn-info" name="submit">Jemput</button>
										<?php } elseif ($status_tombol == "TIDAK") { ?>
									<div class="alert alert-info"><b>Maaf!</b> Anda telah melakukan penjemputan hari ini</div>
										<?php } ?>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--end .row -->
				<!-- END DATATABLE 1 -->
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
