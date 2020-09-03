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
				<h2 class="text-dark">Informasi Terkini</h2>
			</div>
			<div class="section-body">

				<div class="row">
					<div class="card">
						<div class="card-body">
							<div class="col-lg-12">
								<div class="table-responsive">
									<table id="datatable1" class="table table-striped table-hover">
										<thead>
											<tr>
                        <th class="text-center">Status</th>
												<th class="text-center">Tanggal</th>
												<th class="text-center">Keterangan</th>
											</tr>
										</thead>
										<tbody>
<?php  if(count($data) == 0): ?>
<tr><td colspan="3" class="text-center">Belum ada data</td></tr>
<?php else: ?>
<?php foreach($data as $dt): ?>
<tr>       t
<td class="text-center"><?= $dt['jam'] !== '-' ? '<i style="font-size:35px;color:green" class="fa fa-check-circle" aria-hidden="true"></i>' : '<i style="font-size:35px;color:red;" class="fa fa-external-link-square" aria-hidden="true"></i>'?></td>
<td class="text-center"><?=  $dt['tanggal'];?></td>
<td class="text-center"><?= $dt['status']; ?></td>
</tr>
<?php endforeach; ?>
<?php endif; ?>
                   
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
					<span class="text-lg text-bold text-dark ">MATERIAL&nbsp;ADMIN</span>
				</a>
			</div>
		</div>
