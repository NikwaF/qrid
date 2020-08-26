<div class="menubar-scroll-panel">
			<!-- BEGIN MAIN MENU -->

			<ul id="main-menu" class="gui-controls">
				<!-- BEGIN DASHBOARD -->
				<li>
					<a href="<?= base_url(); ?>admin/dashboard" class="<?php if($this->uri->segment(2) == "dashboard") { echo "active"; } ?>">
						<div class="gui-icon"><i class="md md-account-balance"></i></div>
						<span class="title">Beranda</span>
					</a>
				</li>
				<li>
					<a href="<?= base_url(); ?>admin/administrator" class="<?php if($this->uri->segment(2) == "administrator") { echo "active"; } ?>">
						<div class="gui-icon"><i class="md md-account-circle"></i></div>
						<span class="title">Kelola Operator</span>
					</a>
				</li>
				<li>
					<a href="<?= base_url(); ?>admin/informasi" class="<?php if($this->uri->segment(2) == "informasi") { echo "active"; } ?>">
						<div class="gui-icon"><i class="md md-announcement"></i></div>
						<span class="title">Kelola Informasi</span>
					</a>
				</li>
				<li>
					<a href="<?= base_url(); ?>admin/karyawan" class="<?php if($this->uri->segment(2) == "karyawan") { echo "active"; } ?>">
						<div class="gui-icon"><i class="md md-face-unlock"></i></div>
						<span class="title">Kelola Karyawan</span>
					</a>
				</li>
				<li>
					<a href="<?= base_url(); ?>admin/presensi" class="<?php if($this->uri->segment(2) == "presensi") { echo "active"; } ?>">
						<div class="gui-icon"><i class="md md-today"></i></div>
						<span class="title">Kelola Presensi</span>
					</a>
				</li>
			</ul>
			</div><!--end .menubar-scroll-panel-->
		</div><!--end #menubar-->
		<!-- END MENUBAR -->

	</div><!--end #base-->
	<!-- END BASE -->

<script>
        var span = document.getElementById('span');

function time() {
  var d = new Date();
  var s = d.getSeconds();
  var m = d.getMinutes();
  var h = d.getHours();
  span.textContent = h + ":" + m + ":" + s;
}

setInterval(time, 1000);
    </script>
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
	<script type="text/javascript" src="<?= base_url(); ?>asc/js/jquery.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>asc/js/qrcodelib.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>asc/js/webcodecamjquery.js"></script>
<script type="text/javascript">
    var arg = {
        resultFunction: function(result) {
            //$('.hasilscan').append($('<input name="noijazah" value=' + result.code + ' readonly><input type="submit" value="Cek"/>'));
           // $.post("../cek.php", { noijazah: result.code} );
            var redirect = '<?= base_url(); ?>admin/absensi/cek';
            $.redirectPost(redirect, {noijazah: result.code});
        }
    };
    
    var decoder = $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery;
    decoder.buildSelectMenu("select");
    decoder.play();
    /*  Without visible select menu
        decoder.buildSelectMenu(document.createElement('select'), 'environment|back').init(arg).play();
    */
    $('select').on('change', function(){
        decoder.stop().play();
    });

    // jquery extend function
    $.extend(
    {
        redirectPost: function(location, args)
        {
            var form = '';
            $.each( args, function( key, value ) {
                form += '<input type="hidden" name="'+key+'" value="'+value+'">';
            });
            $('<form action="'+location+'" method="POST">'+form+'</form>').appendTo('body').submit();
        }
    });

</script>
	</body>
</html>
