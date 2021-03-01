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
	</style>

	<!-- widget grid -->
	<section id="widget-grid" class="">
		<!-- row -->
		<div class="row">
			
			<article class="col-sm-12 col-md-12 col-lg-6">

				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-blue" id="wid-id-1" data-widget-editbutton="true">
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
					<header style="">
						<span class="widget-icon">
						<img style="float: left; margin: 9px 5px 0px 10px;" src="<?=base_url()?>seipkon/assets/img/colormix.png" height="15" width="15" />
						</span>
						<b style="float: left; margin: 5px 0px 0px 15px;">Monitoring Device Status ATM </b>
					</header>

					<!-- widget div-->
					<div>

						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->

						</div>
						<!-- end widget edit box -->

						<!-- widget content -->
						<div class="widget-body">

							<div class="tree smart-form">
								<ul>
									<li>
										<span style="width:140px; height:30px"><img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/atm2.png" height="30" width="30" />
										<p class="small" style="">
											<small style="color:black;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">
											ATM-001</small><br>
											<small style="color:black;font-size:12px;">ID ATM : 112233</small>
										</p>
										</span>
										<ul>
											<li>
												<a style="cursor: pointer;" onclick="read('20161029.jrn')"><span style="width:150px; height:30px">
												<img style="float: left; margin: 5px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/clean.png" height="20" width="20" /> 
												<p class="small" style="">
													<small style="color:black;font-size:12px; margin: 0px 0px 0px 0px;">
													Status Device ATM :</small><br>
													<small style="color:black;font-size:12px; font-weight:bold ;">Card Reader</small>
												</p></span></a>
											</li>
											<li>
												<a style="cursor: pointer;" onclick="read('20161029.jrn')"><span style="width:150px; height:30px">
												<img style="float: left; margin: 5px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/clean.png" height="20" width="20" /> 
												<p class="small" style="">
													<small style="color:black;font-size:12px; margin: 0px 0px 0px 0px;">
													Status Device ATM :</small><br>
													<small style="color:black;font-size:12px; font-weight:bold ;">Receipt Printer</small>
												</p></span></a>
											</li>
											<li>
												<a style="cursor: pointer;" onclick="read('20161029.jrn')"><span style="width:150px; height:30px">
												<img style="float: left; margin: 5px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/clean.png" height="20" width="20" /> 
												<p class="small" style="">
													<small style="color:black;font-size:12px; margin: 0px 0px 0px 0px;">
													Status Device ATM :</small><br>
													<small style="color:black;font-size:12px; font-weight:bold ;">PIN-PAD Security</small>
												</p></span></a>
											</li>
											<li>
												<a style="cursor: pointer;" onclick="read('20161029.jrn')"><span style="width:150px; height:30px">
												<img style="float: left; margin: 5px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/clean.png" height="20" width="20" /> 
												<p class="small" style="">
													<small style="color:black;font-size:12px; margin: 0px 0px 0px 0px;">
													Status Device ATM :</small><br>
													<small style="color:black;font-size:12px; font-weight:bold ;">Cash Dispenser</small>
												</p></span></a>
											</li>
											<li>
												<a style="cursor: pointer;" onclick="read('20161029.jrn')"><span style="width:150px; height:30px">
												<img style="float: left; margin: 5px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/clean.png" height="20" width="20" /> 
												<p class="small" style="">
													<small style="color:black;font-size:12px; margin: 0px 0px 0px 0px;">
													Status Device ATM :</small><br>
													<small style="color:black;font-size:12px; font-weight:bold ;">Cassette</small>
												</p></span></a>
											</li>										
										</ul>
									</li>
								</ul>
							</div>

						</div>
						<!-- end widget content -->

					</div>
					<!-- end widget div -->

				</div>
				<!-- end widget -->

			</article>
			<!-- WIDGET END -->
			
			
			
			<article class="col-sm-12 col-md-12 col-lg-6">

				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-blue" id="wid-id-1" data-widget-editbutton="false">
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
					<header style="">
						<span class="widget-icon">
						<img style="float: left; margin: 9px 5px 0px 10px;" src="<?=base_url()?>seipkon/assets/img/colormix.png" height="15" width="15" />
						</span>
						<b style="float: left; margin: 5px 0px 0px 15px;">Log EJ Device Status ATM </b>
					</header>

					<!-- widget div-->
					<div>

						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->

						</div>
						<!-- end widget edit box -->

						<!-- widget content -->
						<div class="widget-body">
							<div id="show_data" style="width: 100%; height: 300px; overflow: scroll;">
								<ul id="menu">
								</ul>
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

		<div class="row">
			
			<article class="col-sm-12 col-md-12 col-lg-6">

				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-blue" id="wid-id-1" data-widget-editbutton="true">
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
					<header style="">
						<span class="widget-icon">
						<img style="float: left; margin: 9px 5px 0px 10px;" src="<?=base_url()?>seipkon/assets/img/colormix.png" height="15" width="15" />
						</span>
						<b style="float: left; margin: 5px 0px 0px 15px;">Monitoring Status Supply ATM </b>
					</header>

					<!-- widget div-->
					<div>

						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->

						</div>
						<!-- end widget edit box -->

						<!-- widget content -->
						<div class="widget-body">

							<div class="tree smart-form">
								<ul>
									<li>
										<span style="width:140px; height:30px"><img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/atm2.png" height="30" width="30" />
										<p class="small" style="">
											<small style="color:black;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">
											ATM-001</small><br>
											<small style="color:black;font-size:12px;">ID ATM : 112233</small>
										</p>
										</span>
										<ul>
											<li>
												<a style="cursor: pointer;" onclick="read('20161101.jrn')"><span style="width:180px; height:20px">
												<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/clean.png" height="20" width="20" /> 
													<small style="color:black;font-size:12px; margin: 10px 0px 0px 0px;font-weight:bold ;">
													Bill Cassette Supply</small>
												</span></a>
											</li>
											<li>
												<a style="cursor: pointer;" onclick="read('20161101.jrn')"><span style="width:180px; height:20px">
												<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/clean.png" height="20" width="20" /> 
													<small style="color:black;font-size:12px; margin: 10px 0px 0px 0px;font-weight:bold ;">
													Reject Cassette Supply</small>
												</span></a>
											</li>										
											<li>
												<a style="cursor: pointer;" onclick="read('20161101.jrn')"><span style="width:180px; height:20px">
												<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/clean.png" height="20" width="20" /> 
													<small style="color:black;font-size:12px; margin: 10px 0px 0px 0px;font-weight:bold ;">
													Receipt Printer Supply</small>
												</span></a>
											</li>									
											<li>
												<a style="cursor: pointer;" onclick="read('20161101.jrn')"><span style="width:180px; height:20px">
												<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/clean.png" height="20" width="20" /> 
													<small style="color:black;font-size:12px; margin: 10px 0px 0px 0px;font-weight:bold ;">
													Card Bin Supply </small>
												</span></a>
											</li>									
										</ul>
									</li>
								</ul>
							</div>
						</div>
						<!-- end widget content -->

					</div>
					<!-- end widget div -->

				</div>
				<!-- end widget -->

			</article>
			<!-- WIDGET END -->
			
			
			
			<article class="col-sm-12 col-md-12 col-lg-6">

				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-blue" id="wid-id-2" data-widget-editbutton="false">
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
					<header style="">
						<span class="widget-icon">
						<img style="float: left; margin: 9px 5px 0px 10px;" src="<?=base_url()?>seipkon/assets/img/colormix.png" height="15" width="15" />
						</span>
						<b style="float: left; margin: 5px 0px 0px 15px;">Log Status Supply ATM </b>
					</header>

					<!-- widget div-->
					<div>

						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->

						</div>
						<!-- end widget edit box -->

						<!-- widget content -->
						<div class="widget-body">
							<div id="show_data2" style="width: 100%; height: 300px; overflow: scroll;">
								<ul id="menu">
								</ul>
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


	</section>
	<!-- end widget grid -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
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
		var table;
		var pagefunction = function() {
			loadScript("<?=BASE_URL?>js/plugin/bootstraptree/bootstrap-tree.min.js");
		};
		
		
		
		// var run = function(no = 0){
			// $.ajax({
				// url: "<?=base_url()?>tester/read",
				// dataType: 'html',
				// method: 'post',
				// data: {no: no},
				// timeout: 3000,
			// }).done(function (response) {
				// setInterval(run(response), 5000);
			// });
		// }
		 // setInterval(run, 5000);
		 var no = 0;
		 
		 // const interval = setInterval(function() {
			// $.ajax({
				// url: "<?=base_url()?>tester/read",
				// dataType: 'html',
				// method: 'post',
				// data: {no: no},
				// timeout: 3000,
			// }).done(function (response) {
				// no = response;
			// });
		 // }, 1000);

		// clearInterval(interval);
		
		function read() {
			yourFunction();
		}
		
		function yourFunction(){
			$.ajax({
				url: "<?=base_url()?>tester/read",
				dataType: 'json',
				method: 'post',
				data: {no: no},
				timeout: 3000,
			}).done(function (response) {
				console.log(response);
				no = response.count;
				
				// $("#menu").append('<li>'.response.value.'</li>');
				$("#menu").prepend('<li>'+response.value+'</li>');
			});
			
			setTimeout(yourFunction, 2000);
		}

		// yourFunction();
		
		// load related plugins
		pagefunction();


	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>