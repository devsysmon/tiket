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

	<div class="row">
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
			<h1 class="page-title txt-color-blueDark">
				<i class="fa fa-users fa-fw "></i> 
					Tree
			</h1>
		</div>
	</div>

	<!-- widget grid -->
	<section id="widget-grid" class="">
		<!-- row -->
		<div class="row">
			
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
					<header>
						<span class="widget-icon"> <i class="fa fa-sitemap"></i> </span>
						<h2>Simple View </h2>

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

							<div class="tree smart-form" style="width: 100%; height: 450px; overflow: scroll;">
								<ul>
									<li>
										<span><i class="fa fa-lg fa-plus-circle"></i> CLASS</span>
										<ul>
											<?php $__currentLoopData = $keys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<li style="display:none">
													<span><i class="fa fa-lg fa-plus-circle"></i> 
														<?php echo e(explode('\\', $row['class'])[7]); ?>

													</span> (<?php echo e(count($row['data'])); ?>) | <a class="btn btn-info btn-xs" href="javascript:void(0);" onclick="read('<?php echo e(str_replace('\\', '/', $row['class'])); ?>')">action</a>
													<ul>
														<?php $__currentLoopData = $row['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<li style="display:none">
																<a class="btn btn-info btn-xs" href="javascript:void(0);" onclick="read2('<?php echo e(str_replace('\\', '/', $row)); ?>')">
																	<span><i class="icon-leaf"></i><?php echo e(explode('\\', $row)[8]); ?></span>
																</a>
															</li>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</ul>
												</li>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
					<header>
						<span class="widget-icon"> <i class="fa fa-sitemap"></i> </span>
						<h2>Simple View </h2>

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
							<div class="tree smart-form" id="show_data" style="width: 100%; height: 450px; overflow: scroll;">
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
		
		// function read() {
			// yourFunction();
		// }
		
		// function yourFunction(){
			// $.ajax({
				// url: "<?=base_url()?>tester/read",
				// dataType: 'json',
				// method: 'post',
				// data: {no: no},
				// timeout: 3000,
			// }).done(function (response) {
				// console.log(response);
				// no = response.count;
				
				// // $("#menu").append('<li>'.response.value.'</li>');
				// $("#menu").prepend('<li>'+response.value+'</li>');
			// });
			
			// setTimeout(yourFunction, 2000);
		// }

		// yourFunction();
		var myVar;
		var no = 0;
		var total = 0;
		function yourFunction(key) {
			$.ajax({
				url: "<?=base_url()?>tree/read_detail",
				dataType: 'json',
				method: 'post',
				data: {no: no, key: key},
				timeout: 3000,
			}).done(function (response) {
				console.log(response);
				no = parseInt(response.count);
				total = parseInt(response.total);
				
				// $("#menu").append('<li>'.response.value.'</li>');
				$("#menu").prepend('<li>'+response.value+'</li>');
			});
			
			if(no<total || total==0) {
				myVar = setTimeout(function() {
					yourFunction(key);
				}, 1500)
			} else {
				alert("STOPED");
				clearTimeout(myVar);
			}
		}
		
		function yourFunction2(key) {
			$.ajax({
				url: "<?=base_url()?>tree/read",
				dataType: 'html',
				method: 'post',
				data: {key: key},
				timeout: 3000,
			}).done(function (response) {
				console.log(response);
				// no = response.count;
				
				// $("#menu").append('<li>'.response.value.'</li>');
				$("#menu").prepend('<li>'+response+'</li>');
			});
		}
		
		function read(key) {
			cleardata();
			yourFunction(key);
		}
		
		function read2(key) {
			cleardata();
			yourFunction2(key);
		}
		
		function cleardata() {
			clearTimeout(myVar);
			no = 0;
			$("#menu").html("");
		}
		// load related plugins
		pagefunction();


	</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\2021\INSAN\new_insan\application\views/pages/tree/index.blade.php ENDPATH**/ ?>