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
				<h2 class="text-dark text-center">Presensi Harian</h2>
				<?php if($status === 0 || $status === 1 || $status === 4): ?>
					<?php $pesannya = ['Admin belum memberikan jadwal absen', 'Belum jam absen, bisa absen mulai jam '.$pesan, '','','Anda sudah tidak boleh absen, bisa absen mulai jam '.$pesan]; ?>

					<h2 style="color:red;" class="text-dark text-center"><?= $pesannya[$status]; ?></h2>
				<?php else: ?>
					<p class="text-center" style="margin-top: 1rem">
				<a class="btn btn-default" href="<?= base_url()?>user/absensi/showqr" onclick="window.open(this.href, 'mywin',
'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" >Tampilkan QR Code</a></p>
				<?php endif; ?>
			</div>
			<div class="section-body" style="margin-top: 5rem">

				<!-- BEGIN DATATABLE 1 -->
				<!--end .row -->
			<?php if($status === 0 || $status === 1 || $status === 4): ?>
				<?= $this->session->flashdata('message') ?>

			<?php else:  ?>

				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Arahkan Kode QR Ke Kamera!</h3>
							</div>
							<div class="panel-body text-center">
							    <?= $this->session->flashdata('message') ?>
								<canvas></canvas>
								<hr>
								<select></select>
							</div>
						</div>
					</div>

				</div>
				<?php endif; ?>
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
				<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar"
					href="javascript:void(0);">
					<i class="fa fa-bars"></i>
				</a>
			</div>
			<div class="expanded">
				<a href="">
					<span class="text-lg text-bold text-dark ">MATERIAL&nbsp;ADMIN</span>
				</a>
			</div>
		</div>