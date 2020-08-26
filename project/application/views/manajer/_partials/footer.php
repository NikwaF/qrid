<div class="menubar-scroll-panel">
			<!-- BEGIN MAIN MENU -->

			<ul id="main-menu" class="gui-controls">
				<!-- BEGIN DASHBOARD -->
				<li>
					<a href="<?= base_url(); ?>wali/dashboard" class="<?php if($this->uri->segment(2) == "dashboard") { echo "active"; } ?>">
						<div class="gui-icon"><i class="md md-home"></i></div>
						<span class="title">Beranda</span>
					</a>
				</li>
				<li>
					<a href="<?= base_url(); ?>wali/absensi" class="<?php if($this->uri->segment(2) == "absensi") { echo "active"; } ?>">
						<div class="gui-icon"><i class="md md-info"></i></div>
						<span class="title">Kelola Absensi</span>
					</a>
				</li>
				<li>
					<a href="<?= base_url(); ?>wali/tugas" class="<?php if($this->uri->segment(2) == "tugas") { echo "active"; } ?>">
						<div class="gui-icon"><i class="md md-info"></i></div>
						<span class="title">Kelola Tugas</span>
					</a>
				</li>
				<li>
					<a href="<?= base_url(); ?>wali/jemput" class="<?php if($this->uri->segment(2) == "jemput") { echo "active"; } ?>">
						<div class="gui-icon"><i class="md md-info"></i></div>
						<span class="title">Kelola Jemput</span>
					</a>
				</li>
			</ul>
			</div><!--end .menubar-scroll-panel-->
		</div><!--end #menubar-->
		<!-- END MENUBAR -->

	</div><!--end #base-->
	<!-- END BASE -->


	<!-- BEGIN JAVASCRIPT -->	
	<script src="<?= base_url(); ?>assets/js/modules/materialadmin/libs/jquery/jquery-1.11.2.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/modules/materialadmin/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/modules/materialadmin/libs/bootstrap/bootstrap.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/modules/materialadmin/libs/spin.js/spin.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/modules/materialadmin/libs/autosize/jquery.autosize.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/modules/materialadmin/libs/moment/moment.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/modules/materialadmin/libs/sweetalert/dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/myjavascript.js"></script>
	<script src="<?= base_url(); ?>assets/js/modules/materialadmin/libs/DataTables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/modules/materialadmin/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/modules/materialadmin/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/modules/materialadmin/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/modules/materialadmin/libs/d3/d3.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/modules/materialadmin/libs/d3/d3.v3.js"></script>
	<script src="<?= base_url(); ?>assets/js/modules/materialadmin/libs/rickshaw/rickshaw.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/modules/materialadmin/core/source/App.js"></script>
	<script src="<?= base_url(); ?>assets/js/modules/materialadmin/core/source/AppNavigation.js"></script>
	<script src="<?= base_url(); ?>assets/js/modules/materialadmin/core/source/AppOffcanvas.js"></script>
	<script src="<?= base_url(); ?>assets/js/modules/materialadmin/core/source/AppCard.js"></script>
	<script src="<?= base_url(); ?>assets/js/modules/materialadmin/core/source/AppForm.js"></script>
	<script src="<?= base_url(); ?>assets/js/modules/materialadmin/core/source/AppNavSearch.js"></script>
	<script src="<?= base_url(); ?>assets/js/modules/materialadmin/core/source/AppVendor.js"></script>
	<script src="<?= base_url(); ?>assets/js/modules/materialadmin/core/demo/Demo.js"></script>
	<script src="<?= base_url(); ?>assets/js/modules/materialadmin/core/demo/DemoTableDynamic.js"></script>


	<!-- END JAVASCRIPT -->



	</body>
</html>
