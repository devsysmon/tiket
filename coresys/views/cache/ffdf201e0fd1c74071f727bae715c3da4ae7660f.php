<?php $__env->startSection('stylesheet'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<style>
		/*	start styles for the ContextMenu	*/
		.context_menu {
			background-color: #ebebeb;
			border: 1px solid black;
		}

		.context_menu_item {
			padding: 3px 6px;
		}

		.context_menu_item:hover {
			background-color: #CCCCCC;
		}

		.context_menu_separator {
			background-color: gray;
			height: 1px;
			margin: 0;
			padding: 0;
		}
		
		.controls {
			margin-top: 10px;
			border: 1px solid transparent;
			border-radius: 2px 0 0 2px;
			box-sizing: border-box;
			-moz-box-sizing: border-box;
			height: 40px;
			color: rgb(86, 86, 86);
			font-family: Roboto, Arial, sans-serif;
			-moz-user-select: none;
			font-size: 18px;
			background-color: rgb(255, 255, 255);
			padding: 0px 17px;
			border-bottom-right-radius: 2px;
			border-top-right-radius: 2px;
			background-clip: padding-box;
			box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px;
			min-width: 64px;
			border-left: 0px none;
			outline: currentcolor none medium;
		}
		
		#searchInput {
			background-color: #fff;
			font-family: Roboto;
			font-size: 15px;
			font-weight: 300;
			margin-left: 12px;
			padding: 0 11px 0 13px;
			text-overflow: ellipsis;
			width: 50%;
		}

		#searchInput:focus {
			border-color: #4d90fe;
		}

		ul#geoData {
			text-align: left;
			font-weight: bold;
			margin-top: 10px;
		}

		ul#geoData span {
			font-weight: normal;
		}
		
		.pac-container {
			z-index: 99999999 !important;
		}
		
		.fc-event, .fc-event-dot {
			background-color: white;
			border: 1px solid #3a87ad;
		}
	</style>
	<style>
	hanzmobview{
	  margin: 0 auto;
	}
	hanzmobview{
	  display: inline;
	}

	@media  screen and (max-width: 1024px){
	hanzmobview{
		display: none;
	  }
	article{
	  padding: 20px;
	  }
	}
	</style>
	<div class="row">
		<hanzmobview>
			<article class="btn-group col-sm-12">
				<div class="navbar navbar-default" style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );border-radius: 5px 5px 0px 0px;">
					<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
					<a href="report_attendance.ins" class="btn btn-default btn-circle btn-sm zoomsmall active">
					<img style="float: left; margin: -1px 10px 0px 6px;" src="<?=base_url()?>seipkon/assets/img/cal.png" height="24" width="24" />
						<p class="small" style="margin: -5px 0px 0px 0px;">
							<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Attendance Report</small><br>
							<small style="color:white;font-size:12px;">Absensi & Persensi Report</small>
						</p>
					</a>
					</div>
					<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
					<a href="inventory_report.ins" class="btn btn-default btn-circle btn-sm zoomsmall ">
					<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/report.png" height="24" width="24" />
						<p class="small" style="margin: -5px 0px 0px 0px;">
							<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Inventory Report</small><br>
							<small style="color:white;font-size:12px;">Report Logistics & Inventory </small>
						</p>
					</a>
					</div>
					<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
					<a href="report_maintenance.ins" class="btn btn-default btn-circle zoomsmall">
					<img style="float: left; margin: -1px 10px 0px 6px;" src="<?=base_url()?>seipkon/assets/img/filewhite.png" height="24" width="24" />
						<p class="small" style="margin: -5px 0px 0px 0px;">
							<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Tecnical Report</small><br>
							<small style="color:white;font-size:12px;">Tecnical Service Report</small>
						</p>
					</a>
					</div>
					<div class="col-sm-2" style="margin: 5px 0px 0px 0px;">
					<a href="jobcard_report.ins" class="btn btn-default btn-circle btn-sm zoomsmall">
					<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/filerack2.png" height="24" width="24" />
						<p class="small" style="margin: -5px 0px 0px 0px;">
							<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Jobcard Report</small><br>
							<small style="color:white;font-size:12px;">Jobcard Maintenance Report</small>
						</p>
					</a>
					</div>			
				</div>
			</article>
		</hanzmobview>
	</div>
	<!-- widget grid -->
	<section id="widget-grid" class="">
		<!-- row -->
		<div class="row">
			
			<!-- NEW WIDGET START -->
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin: -20px 0px 0px 0px;">

				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" 	
					data-widget-colorbutton="false" 
					data-widget-togglebutton="false"
					data-widget-fullscreenbutton="false"
					data-widget-deletebutton="false"
					data-widget-sortable="false">
					<!-- widget options:
					usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

					data-widget-colorbutton="false"
					data-widget-editbutton="false"
					data-widget-togglebutton="false"
					data-widget-deletebutton="false"
					data-widget-fullscreenbutton="false"
					data-widget-custombutton="false"
					data-widget-collapsed="true"
					data-widget-sortable="false"

					-->
					<header>
						<span class="widget-icon"> <i class="fa fa-cube"></i> </span>
						<h2>Data Transaction Out</h2>
					</header>

					<!-- widget div-->
					<div>

						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->
							<center>
								<div class="" style="border-radius: 5px; width: 20%">
									<div class="form-group">
										<label class="control-label">Pilih Bulan:</label>
										<input type="text" class="form-control input-sm from" placeholder="Pilih Bulan" >
									</div>
									
									<button style=" border-radius: 5px;" type="button" onclick="preview()" class="btn btn-sm btn-info pull-right"><b>Preview</b></button>
								</div>
							</center>
						</div>
						<!-- end widget edit box -->

						<!-- widget content -->
						<div class="widget-body no-padding">

							<div style="padding: 20px;" id="table_preview">
								<center>
									<div class="" style="border-radius: 5px; width: 20%">
										<div class="form-group">
											<label class="control-label">Pilih Bulan:</label>
											<input type="text" class="form-control input-sm from1" placeholder="Pilih Bulan" >
										</div>
										
										<button style=" border-radius: 5px;" type="button" onclick="preview1()" class="btn btn-sm btn-info pull-right"><b>Preview</b></button>
									</div>
								</center><br><br>
							</div>

						</div>
						<!-- end widget content -->

					</div>
					<!-- end widget div -->

				</div>
				<!-- end widget -->

			</article>
			<!-- WIDGET END -->
			
			

		</div>

		<!-- end row -->

		<div class="container content_form" hidden>
			<form action="<?=base_url()?>trouble_sub_category/insert" class="formName">
				<div class="form-group">
					<label>Nama Kategori</label>
					<select class="form-control category" id="category" required="">
						<option value="">Pilih Kategori</option>
					</select>
				</div>
				<div class="form-group">
					<label>Masukan Nama Sub Kategori</label>
					<input type="text" placeholder="Nama Sub Kategori" class="name form-control" required />
				</div>
			</form>
		</div>

	</section>
	<!-- end widget grid -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	<?php 
		$default_date = date("Y-m-d");
	?>
	<script type="text/javascript">

		/* DO NOT REMOVE : GLOBAL FUNCTIONS!
		 *
		 * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
		 *
		 * // activate tooltips
		 * $("[rel=tooltip]").tooltip();
		 *
		 * // activate popovers
		 * $("[rel=popover]").popover();
		 *
		 * // activate popovers with hover states
		 * $("[rel=popover-hover]").popover({ trigger: "hover" });
		 *
		 * // activate inline charts
		 * runAllCharts();
		 *
		 * // setup widgets
		 * setup_widgets_desktop();
		 *
		 * // run form elements
		 * runAllForms();
		 *
		 ********************************
		 *
		 * pageSetUp() is needed whenever you load a page.
		 * It initializes and checks for all basic elements of the page
		 * and makes rendering easier.
		 *
		 */

		pageSetUp();
		
		/*
		 * ALL PAGE RELATED SCRIPTS CAN GO BELOW HERE
		 * eg alert("my home function");
		 * 
		 * var pagefunction = function() {
		 *   ...
		 * }
		 * loadScript("<?=BASE_URL?>js/plugin/_PLUGIN_NAME_.js", pagefunction);
		 * 
		 */
		
		// PAGE RELATED SCRIPTS
		
		// pagefunction	
		var pagefunction = function() {
			$('.from').val("");
			
			$('.from').on('focus', function() {
				$(".view_bank").hide("slow");
				$(".view_atm").hide("slow");
			});
		
			$('.from1').datepicker({
				autoclose: true,
				minViewMode: 1,
				format: 'mm/yyyy',
				todayHighlight: true
			}).on('changeDate', function(selected){
				var bulan = ("0" + (selected.date.getMonth() + 1)).slice(-2);
				var tahun = selected.date.getFullYear(); 
				// console.log(selected);
				// console.log(bulan+" "+tahun);
				
				$(".view_bank").show("slow");
			}); 
		
			$('.from').datepicker({
				autoclose: true,
				minViewMode: 1,
				format: 'mm/yyyy'
			}).on('changeDate', function(selected){
				var bulan = ("0" + (selected.date.getMonth() + 1)).slice(-2);
				var tahun = selected.date.getFullYear(); 
				// console.log(selected);
				// console.log(bulan+" "+tahun);
				
				$(".view_bank").show("slow");
			}); 
		};
		
		function preview1() {
			var bulan = $('.from1').val();
			if(!bulan) {
				alert("Please select month!");
			} else {
				$.get('<?=base_url()?>report_maintenance/generate/preview', function(response) {
					$("#table_preview").html(response);
				});
			}
		}
		
		function preview() {
			var bulan = $('.from').val();
			if(!bulan) {
				alert("Please select month!");
			} else {
				$.get('<?=base_url()?>report_maintenance/generate/preview', function(response) {
					$("#table_preview").html(response);
				});
			}
		}
		
		
		function preview_report() {
			var bulan = $('.from').val();
			var id_bank = $(".data_bank option:selected").val();
			var id_atm = $(".data_atm option:selected").val();
			// alert(id_bank+" "+id_atm+" "+bulan);
			if(!bulan) {
				alert("Please select month!");
			} else if(!id_bank) {
				alert("Please select bank!");
			} else if(!id_atm) {
				alert("Please select atm!");
			} else {
				window.open("<?=base_url()?>report/laporan_pdf/"+id_bank+"/"+id_atm+"/"+bulan, "_blank");
			}
		}
		
		function preview_report2() {
			window.open("<?=base_url()?>report_maintenance/generate/output", "_blank");
		}
		
		// load related plugins
		
		loadScript("<?=BASE_URL?>js/plugin/datatables/jquery.dataTables.min.js", function(){
			loadScript("<?=BASE_URL?>js/plugin/datatables/dataTables.colVis.min.js", function(){
				loadScript("<?=BASE_URL?>js/plugin/datatables/dataTables.tableTools.min.js", function(){
					loadScript("<?=BASE_URL?>js/plugin/datatables/dataTables.bootstrap.min.js", function(){
						loadScript("<?=base_url()?>seipkon/assets/jqueryconfirm/dist/jquery-confirm.min.js", function(){
							loadScript("<?=BASE_URL?>js/plugin/datatable-responsive/datatables.responsive.min.js", pagefunction)
						});
					});
				});
			});
		});


	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\2021\INSAN\new_insan\application\views/pages/report_maintenance/index.blade.php ENDPATH**/ ?>