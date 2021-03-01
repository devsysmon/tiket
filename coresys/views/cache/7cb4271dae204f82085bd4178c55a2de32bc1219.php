<?php $__env->startSection('stylesheet'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
	<!--<div class="row">
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		</div>
		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
			<ul id="sparks" class="">
				<li class="sparks-info">
					<h5> Data 01 <span class="txt-color-blue">1234</span></h5>
					<div class="sparkline txt-color-blue hidden-mobile hidden-md hidden-sm">
						1300, 1877, 2500, 2577, 2000, 2100, 3000, 2700, 3631, 2471, 2700, 3631, 2471
					</div>
				</li>
				<li class="sparks-info">
					<h5> Data 02 <span class="txt-color-purple"><i class="fa fa-arrow-circle-up"></i>&nbsp;45%</span></h5>
				
				</li>
				<li class="sparks-info">
					<h5> Data 03 <span class="txt-color-greenDark"><i class="fa fa-shopping-cart"></i>&nbsp;2447</span></h5>
				</li>
			</ul>
		</div>
	</div>-->
	<!-- widget grid -->
	<section id="widget-grid" class="">

		<!-- row -->
		<div class="row">
			<article class="col-sm-12">
				<!-- new widget -->
				<div class="jarviswidget" id="wid-id-0" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
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
						<span class="widget-icon"> <i class="glyphicon glyphicon-stats txt-color-darken"></i> </span>
						<h2>Graph Sample </h2>

						<ul class="nav nav-tabs pull-right in" id="myTab">
						</ul>

					</header>

					<!-- widget div-->
					<div class="no-padding">
						<!-- widget edit box -->
						<div class="jarviswidget-editbox">

							test
						</div>
						<!-- end widget edit box -->

						<div class="widget-body">
							<!-- content -->
							<div id="myTabContent" class="tab-content">
								<div class="tab-pane fade active in padding-10 no-padding-bottom" id="s1">
									<div class="widget-body-toolbar bg-color-white smart-form" id="rev-toggles">

										<div class="inline-group">

											<label for="gra-0" class="checkbox">
												<input type="checkbox" name="gra-0" id="gra-0" checked="checked">
												<i></i> ATM </label>
											<label for="gra-1" class="checkbox">
												<input type="checkbox" name="gra-1" id="gra-1" checked="checked">
												<i></i> Ticket Open </label>
											<label for="gra-2" class="checkbox">
												<input type="checkbox" name="gra-2" id="gra-2" checked="checked">
												<i></i> Ticket Close </label>
										</div>

										<div class="btn-group hidden-phone pull-right hidden-xs">
											<a class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown"><i class="fa fa-cog"></i> More <span class="caret"> </span> </a>
											<ul class="dropdown-menu pull-right">
												<li>
													<a href="javascript:void(0);"><i class="fa fa-file-text-alt"></i> Export to PDF</a>
												</li>
												<li>
													<a href="javascript:void(0);"><i class="fa fa-question-sign"></i> Help</a>
												</li>
											</ul>
										</div>

									</div>

									<div class="padding-10">
										<div id="flotcontainer" class="chart-large has-legend-unique"></div>
									</div>
								</div>
								<!-- end s1 tab pane -->

								<div class="tab-pane fade" id="s2">
									<div class="widget-body-toolbar bg-color-white">

										<form class="form-inline" role="form">

											<div class="form-group">
												<label class="sr-only" for="s123">Show From</label>
												<input type="email" class="form-control input-sm" id="s123" placeholder="Show From">
											</div>
											<div class="form-group">
												<input type="email" class="form-control input-sm" id="s124" placeholder="To">
											</div>

											<div class="btn-group hidden-phone pull-right hidden-xs">
												<a class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown"><i class="fa fa-cog"></i> More <span class="caret"> </span> </a>
												<ul class="dropdown-menu pull-right">
													<li>
														<a href="javascript:void(0);"><i class="fa fa-file-text-alt"></i> Export to PDF</a>
													</li>
													<li>
														<a href="javascript:void(0);"><i class="fa fa-question-sign"></i> Help</a>
													</li>
												</ul>
											</div>

										</form>

									</div>
									<div class="padding-10">
										<div id="statsChart" class="chart-large has-legend-unique"></div>
									</div>

								</div>
								<!-- end s2 tab pane -->

								<div class="tab-pane fade" id="s3">

									<div class="widget-body-toolbar bg-color-white smart-form" id="rev-toggles">

										<div class="inline-group">

											<label for="gra-0" class="checkbox">
												<input type="checkbox" name="gra-0" id="gra-0" checked="checked">
												<i></i> Target </label>
											<label for="gra-1" class="checkbox">
												<input type="checkbox" name="gra-1" id="gra-1" checked="checked">
												<i></i> Actual </label>
											<label for="gra-2" class="checkbox">
												<input type="checkbox" name="gra-2" id="gra-2" checked="checked">
												<i></i> Signups </label>
										</div>

										<div class="btn-group hidden-phone pull-right hidden-xs">
											<a class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown"><i class="fa fa-cog"></i> More <span class="caret"> </span> </a>
											<ul class="dropdown-menu pull-right">
												<li>
													<a href="javascript:void(0);"><i class="fa fa-file-text-alt"></i> Export to PDF</a>
												</li>
												<li>
													<a href="javascript:void(0);"><i class="fa fa-question-sign"></i> Help</a>
												</li>
											</ul>
										</div>

									</div>

									<div class="padding-10">
										<div id="flotcontainer" class="chart-large has-legend-unique"></div>
									</div>
								</div>
								<!-- end s3 tab pane -->
							</div>

							<!-- end content -->
						</div>

					</div>
					<!-- end widget div -->
				</div>
				<!-- end widget -->

			</article>
		</div>
		<div class="row">
			<article class="col-sm-12" style="margin: -25px 0px 0px 0px;">
				<div id="cc" class="easyui-layout" style="width:100%;height:350px;">
					<div data-options="region:'east',split:true,hideCollapsedContent:false" title="East" style="width:400px;">
					<!-- NEW WIDGET START -->
								<!-- Widget ID (each widget will need unique ID)-->
								<div class="jarviswidget" id="wid-id-2" data-widget-colorbutton="false" data-widget-fullscreenbutton="false" data-widget-editbutton="false" data-widget-sortable="false">
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

										<h2>Bar Chart </h2>				
										
									</header>

									<!-- widget div-->
									<div>
										
										<!-- widget edit box -->
										<div class="jarviswidget-editbox">
											<!-- This area used as dropdown edit box -->
											<input class="form-control" type="text">	
										</div>
										<!-- end widget edit box -->
										
										<!-- widget content -->
										<div class="widget-body">
											
											<!-- this is what the user will see -->
											<canvas id="barChart" height="120"></canvas>

										</div>
										<!-- end widget content -->
										
									</div>
									<!-- end widget div -->
									
								</div>
								<!-- end widget -->

							<!-- WIDGET END -->
							
					
					</div>
					<div data-options="region:'west',split:true,collapsed:true,
							hideExpandTool: true,
							expandMode: null,
							hideCollapsedContent: false,
							collapsedSize: 68,
							collapsedContent: function(){
								return $('#titlebar');
							}" title="West" style="width:100px;">
					</div>
					<?php 
						if(!isset($table_view) || $table_view=='atm') {
							$title = "Summary ATM";
						} else if(!isset($table_view) || $table_view=='ticket') {
							$title = "Summary Ticket Problem";
						} else if(!isset($table_view) || $table_view=='attend') {
							$title = "Summary Attendance";
						} else if(!isset($table_view) || $table_view=='part') {
							$title = "Summary Request Sparepart";
						}
					?>
					<div data-options="region:'center',title:'<?=$title?>'">
						<?php if(!isset($table_view) || $table_view=='atm') { ?>
							<?php echo $__env->make('pages.dashboard.table_atm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						<?php } else if(!isset($table_view) || $table_view=='ticket') { ?>
							<?php echo $__env->make('pages.dashboard.table_ticket', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						<?php } else if(!isset($table_view) || $table_view=='attend') { ?>
							<?php echo $__env->make('pages.dashboard.table_attend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						<?php } else if(!isset($table_view) || $table_view=='part') { ?>
							<?php echo $__env->make('pages.dashboard.table_part', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						<?php } ?>
					</div>
				</div>
				<div id="titlebar" style="padding:2px">
					<a href="<?=base_url()?>?view=atm" class="easyui-linkbutton" style="width:100%" data-options="iconCls:'icon-large-picture',size:'large',iconAlign:'top'">ATM</a>
					<a href="<?=base_url()?>?view=ticket" class="easyui-linkbutton" style="width:100%" data-options="iconCls:'icon-large-shapes',size:'large',iconAlign:'top'">TICKET</a>
					<a href="<?=base_url()?>?view=attend" class="easyui-linkbutton" style="width:100%" data-options="iconCls:'icon-large-smartart',size:'large',iconAlign:'top'">ATTEND</a>
					<a href="<?=base_url()?>?view=part" class="easyui-linkbutton" style="width:100%" data-options="iconCls:'icon-large-chart',size:'large',iconAlign:'top'">PART</a>
				</div>
			</article>
		</div>
				

	</section>
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

		 var flot_updating_chart, flot_statsChart, flot_multigraph, calendar;

		pageSetUp();
		
		/*
		 * PAGE RELATED SCRIPTS
		 */

		// pagefunction
		
		var pagefunction = function() {
			
			/*
			 * RUN PAGE GRAPHS
			 */

			// load all flot plugins
			loadScript("<?=BASE_URL?>js/plugin/flot/jquery.flot.cust.min.js", function(){
				loadScript("<?=BASE_URL?>js/plugin/flot/jquery.flot.resize.min.js", function(){
					loadScript("<?=BASE_URL?>js/plugin/flot/jquery.flot.time.min.js", function(){
						loadScript("<?=BASE_URL?>js/plugin/flot/jquery.flot.tooltip.min.js", generatePageGraphs);
					});
				});
			});

			
			function generatePageGraphs() {
				// TAB THREE GRAPH //
				/* TAB 3: Revenew  */
			
				$(function () {
			
					var trgt = [
						[1354586000000, 153],
						[1364587000000, 658],
						[1374588000000, 198],
						[1384589000000, 663],
						[1394590000000, 801],
						[1404591000000, 1080],
						[1414592000000, 353],
						[1424593000000, 749],
						[1434594000000, 523],
						[1444595000000, 258],
						[1454596000000, 688],
						[1464597000000, 364]
					],
						prft = [
							[1354586000000, 53],
							[1364587000000, 65],
							[1374588000000, 98],
							[1384589000000, 83],
							[1394590000000, 980],
							[1404591000000, 808],
							[1414592000000, 720],
							[1424593000000, 674],
							[1434594000000, 23],
							[1444595000000, 79],
							[1454596000000, 88],
							[1464597000000, 36]
						],
						sgnups = [
							[1354586000000, 647],
							[1364587000000, 435],
							[1374588000000, 784],
							[1384589000000, 346],
							[1394590000000, 487],
							[1404591000000, 463],
							[1414592000000, 479],
							[1424593000000, 236],
							[1434594000000, 843],
							[1444595000000, 657],
							[1454596000000, 241],
							[1464597000000, 341]
						],
						toggles = $("#rev-toggles"),
						target = $("#flotcontainer");
			
					var data = [{
						label: "Target Profit",
						data: trgt,
						bars: {
							show: true,
							align: "center",
							barWidth: 30 * 30 * 60 * 1000 * 80
						}
					}, {
						label: "Actual Profit",
						data: prft,
						color: '#3276B1',
						lines: {
							show: true,
							lineWidth: 3
						},
						points: {
							show: true
						}
					}, {
						label: "Actual Signups",
						data: sgnups,
						color: '#71843F',
						lines: {
							show: true,
							lineWidth: 1
						},
						points: {
							show: true
						}
					}]
			
					var options = {
						grid: {
							hoverable: true
						},
						tooltip: true,
						tooltipOpts: {
							//content: '%x - %y',
							//dateFormat: '%b %y',
							defaultTheme: false
						},
						xaxis: {
							mode: "time"
						},
						yaxes: {
							tickFormatter: function (val, axis) {
								return "$" + val;
							},
							max: 1200
						}
			
					};
			
					flot_multigraph = null;
			
					function plotNow() {
						var d = [];
						toggles.find(':checkbox').each(function () {
							if ($(this).is(':checked')) {
								d.push(data[$(this).attr("name").substr(4, 1)]);
							}
						});
						if (d.length > 0) {
							if (flot_multigraph) {
								flot_multigraph.setData(d);
								flot_multigraph.draw();
							} else {
								flot_multigraph = $.plot(target, d, options);
							}
						}
			
					};
			
					toggles.find(':checkbox').on('change', function () {
						plotNow();
					});

					plotNow()
			
				});
			
			}
		
		};
		
		// end pagefunction

		// destroy generated instances 
		// pagedestroy is called automatically before loading a new page
		// only usable in AJAX version!

		var pagedestroy = function(){
			
			// destroy calendar
			calendar.fullCalendar('destroy');
			calendar = null;

			//destroy flots
			flot_updating_chart.shutdown();  
			flot_updating_chart=null;
			flot_statsChart.shutdown(); 
			flot_statsChart = null;

			flot_multigraph.shutdown(); 
			flot_multigraph = null;

			// destroy vector map objects
			$('#vector-map').find('*').addBack().off().remove();

			// destroy todo
			$("#sortable1, #sortable2").sortable("destroy");
			$('.todo .checkbox > input[type="checkbox"]').off();

			// destroy misc events
			$("#rev-toggles").find(':checkbox').off();
			$('#chat-container').find('*').addBack().off().remove();

			// debug msg
			if (debugState){
				root.console.log("✔ Calendar, Flot Charts, Vector map, misc events destroyed");
			} 

		}

		// end destroy
		
		// run pagefunction on load
		pagefunction();
		
		
	</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\2021\JAN-W3\ATMSERV-ASSINDO\coresys\views/pages/dashboard.blade.php ENDPATH**/ ?>