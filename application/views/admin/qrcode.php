<!-- BEGIN BASE-->
<div id="base">
	<!-- BEGIN OFFCANVAS LEFT -->
	<div class="offcanvas">
	</div><!--end .offcanvas-->
	<!-- END OFFCANVAS LEFT -->

	<!-- BEGIN CONTENT-->
	<div id="content">
	<?php
			$this->load->library('ciqrcode');
			$params['data'] = 11111;
			$params['level'] = 'H';
			$params['size'] = 4;
			$params['savename'] = FCPATH."upload/qr_image/1111code.png";
            $this->ciqrcode->generate($params);
		 ?>
		<section>
			<div class="section-body">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<h4 class="text-center"><b>QR CODE</b></h4>
								
							</div>
						</div>
					</div>
				</div><!--end .row -->
				<div class="row">

				</div><!--end .row -->
			</div><!--end .section-body -->
		</section>

	</div><!--end #content-->
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
