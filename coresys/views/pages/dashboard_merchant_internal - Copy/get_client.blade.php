@extends('layouts.master')

@section('stylesheet')
@endsection


@section('content')
<style>
.hrow-gap1{
margin: 20px 0px 0px 0px;
}
.hrow-gap2{
margin: -30px 0px 0px 0px;
}
.hrow-gap3{
margin: -30px 0px 0px 0px;
}

hanzmobview{
  display: inline;
}
@media screen and (max-width: 1024px){
hanzmobview{
    display: none;
  }
.art-one{
  padding: 10px;
  }

}

.padding-0{
    padding-right:0;
    padding-left:0;
}
</style>
<div class="row art-one">
<hanzmobview>
	<article class="btn-group col-sm-12">
		<div class="navbar navbar-default" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );border-radius: 5px 5px 0px 0px;">
			<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
			<a href="<?=base_url()?>dashboard_merchant_internal" class="btn btn-default btn-circle btn-sm zoomsmall active">
			<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/blackbut.png" height="24" width="24" />
				<p class="small" style="margin: -5px 0px 0px 0px;">
					<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Client Dashboard</small><br>
					<small style="color:white;font-size:12px;">Client Dashboard Monitoring</small>
				</p>
			</a>
			</div>
			<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
			<a href="<?=base_url()?>master_client" class="btn btn-default btn-circle btn-sm zoomsmall ">
			<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/blackbook.png" height="24" width="24" />
				<p class="small" style="margin: -5px 0px 0px 0px;">
					<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Client & Customer </small><br>
					<small style="color:white;font-size:12px;">Data Client & Customer </small>
				</p>
			</a>
			</div>
			<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
			<a href="<?=base_url()?>master_atm" class="btn btn-default btn-circle zoomsmall">
			<img style="float: left; margin: -1px 10px 0px 4px;" src="<?=base_url()?>seipkon/assets/img/atm2.png" height="24" width="24" />
				<p class="small" style="margin: -5px 0px 0px 0px;">
					<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Data Mesin ATM</small><br>
					<small style="color:white;font-size:12px;">Data Mesin ATM</small>
				</p>
			</a>
			</div>
			<div class="col-sm-2" style="margin: 5px 0px 0px 0px;">
			<a href="<?=base_url()?>master_location" class="btn btn-default btn-circle btn-sm zoomsmall">
			<img style="float: left; margin: -2px 10px 0px 3px;" src="<?=base_url()?>seipkon/assets/img/whiteloc.png" height="28" width="28" />
				<p class="small" style="margin: -5px 0px 0px 0px;">
					<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Area & Location</small><br>
					<small style="color:white;font-size:12px;">Area & Location Coverage</small>
				</p>
			</a>
			</div>			
		</div>
	</article>
</hanzmobview>
</div>

<div class="row">
	<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin: -20px 0px 0px 0px;">
		<div id="ribbon" style="background: linear-gradient(to bottom, #00c6ff, #0072ff);">
			<span class="ribbon-button-alignment pull-left" style="margin: 0px 0px 0px 0px; "><small style="color:white;font-size:14px; font-weight: bold;">Client Dashboard Monitoring (<?=$client->nama_lengkap?>)</small>
			</span> 
			<span class="ribbon-button-alignment pull-right" style="margin: 0px 0px 0px 0px; "> 
				<section>
					<label class="label">
					<small style="color:white;font-size:12px; font-weight: bold;">Select Client/Bank</small>
					</label>
					<label class="select">
						<select id="select_client">
							<option value="">Pilih Client/Bank</option>
							<?php 
								foreach($data_client as $r) {
									if($r->id==$id) {
										echo '<option value="'.$r->id.'" selected>'.$r->nama.'</option>';
									} else {
										echo '<option value="'.$r->id.'">'.$r->nama.'</option>';
									}
								}
							?>
						</select> 
					</label>
				</section>
				
			</span>
		</div>
	</article>

</div>

<section id="widget-grid">
	<span id="testttt"></span>
</section>

<div id="clone_content">
	<div class="row hrow-gap">
		<article class="col-sm-7 padding-0" style="margin: 0px 0px 0px 0px; padding-left: 13px">
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
					<h2>Grafik Statistik Layanan </h2>

					<ul class="nav nav-tabs pull-right in" id="myTab">
						<li class="active">
							<a data-toggle="tab" href="#s1">
							<i class="fa fa-clock-o"></i> <span class="hidden-mobile hidden-tablet">Live Status</span></a>
						</li>

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
								<div class="row no-space">
									<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
										<span class="demo-liveupdate-1"><span class="onoffswitch">
												<input type="checkbox" name="start_interval" class="onoffswitch-checkbox" id="start_interval">
												<label class="onoffswitch-label" for="start_interval"> 
													<span class="onoffswitch-inner" data-swchon-text="ON" data-swchoff-text="OFF"></span> 
													<span class="onoffswitch-switch"></span> </label> </span> </span>
										<div id="updating-chart" class="chart-large txt-color-blue"></div>

									</div>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 show-stats">

										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12"> <span class="text"> My Tasks <span class="pull-right">130/200</span> </span>
												<div class="progress">
													<div class="progress-bar bg-color-blueDark" style="width: 65%;"></div>
												</div> </div>
											<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12"> <span class="text"> Transfered <span class="pull-right">440 GB</span> </span>
												<div class="progress">
													<div class="progress-bar bg-color-blue" style="width: 34%;"></div>
												</div> </div>
											<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12"> <span class="text"> Trouble Found<span class="pull-right">77%</span> </span>
												<div class="progress">
													<div class="progress-bar bg-color-blue" style="width: 77%;"></div>
												</div> </div>
											<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12"> <span class="text"> User Testing <span class="pull-right">7 Days</span> </span>
												<div class="progress">
													<div class="progress-bar bg-color-greenLight" style="width: 84%;"></div>
												</div> </div>

											<span class="show-stat-buttons"> <span class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> <a href="javascript:void(0);" class="btn btn-default btn-block hidden-xs">Generate PDF</a> </span> <span class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> <a href="javascript:void(0);" class="btn btn-default btn-block hidden-xs">Report Trouble</a> </span> </span>

										</div>

									</div>
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

		<article class="col-sm-5 padding-0" style="margin-top: 0px; padding-right: 12px">
			<div class="navbar navbar-default" style="width: 100%">
				<div id="cc" class="easyui-layout" style="height:300px;">
				
					<div data-options="region:'west',split:true,collapsed:true,
							hideExpandTool: true,
							expandMode: null,
							hideCollapsedContent: false,
							collapsedSize: 68,
							collapsedContent: function(){
								return $('#titlebar');
							}
					" title="West" style="width:100px;"></div>
					<div data-options="region:'center',title:'Summary Data'">
						<iframe id="iframe" name="myIframe" frameborder="0" width="100%" height="98%"></iframe>
						<div id="view_child">
							<table class="easyui-datagrid"
								data-options="url:'datagrid_data1.json',method:'get',border:false,singleSelect:true,fit:true,fitColumns:true">
								<thead>
									<tr>
										<th data-options="field:'DIEBOLD',align:'center'" width="100">DIEBOLD</th>
										<th data-options="field:'NCR',align:'center'" width="100">NCR</th>
										<th data-options="field:'CRM',align:'center'" width="100">CRM</th>
										<th data-options="field:'YIHUA',align:'center'" width="100">YIHUA</th>
										<th data-options="field:'TOTAL',align:'center'" width="100">TOTAL</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
				<div id="titlebar" style="padding:2px">
					<a href="javascript:void(0)" onclick="openDataUI()" class="easyui-linkbutton" style="width:100%" data-options="iconCls:'icon-large-picture',size:'large',iconAlign:'top'">ATM</a>
					<a href="javascript:void(0)" onclick="openDataUI('ticket')" class="easyui-linkbutton" style="width:100%" data-options="iconCls:'icon-large-shapes',size:'large',iconAlign:'top'">TICKET</a>
					<a href="javascript:void(0)" onclick="openDataUI('attend')" class="easyui-linkbutton" style="width:100%" data-options="iconCls:'icon-large-smartart',size:'large',iconAlign:'top'">ATTEND</a>
					<a href="javascript:void(0)" onclick="openDataUI('part')" class="easyui-linkbutton" style="width:100%" data-options="iconCls:'icon-large-chart',size:'large',iconAlign:'top'">PART</a>
				</div>
			</div>
		</article>
	</div>
	<div class="row hrow-gap">
		<article class="col-sm-12" style="margin: -32px 0px 0px 0px;">
		<div class="navbar navbar-default">
			<div class="easyui-panel" title="Mapping Area Kelolaan Mesin" style="width:100%;height:300px;">
				<div class="easyui-layout" data-options="fit:true">
					<div data-options="region:'west',split:true" style="width:210px;">
						<div class="easyui-datalist" title="Customer Support Engineer" style="width:200px;height:250px" data-options="url: 'datalist_data1.json',method: 'get',groupField: 'group'">
						</div>
					</div>
					<div data-options="region:'center'" style="">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.5147112103487!2d106.82016851484747!3d-6.195612895514772!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f421963cd607%3A0x503cb9e9306e657a!2sHotel%20Indonesia%20Kempinski%20Jakarta!5e0!3m2!1sid!2sid!4v1611906343720!5m2!1sid!2sid" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					</div>
				</div>
			</div>
		</div>
		</article>
	</div>
</div>
<!-- end widget grid -->
@endsection


@section('javascript')
	<script type="text/javascript">
	
		openDataUI();
		function openDataUI(view='default') {
			if(view=='default') {
				$('#iframe').attr('src', '<?=base_url()?>dashboard_merchant_internal/view_child_atm/<?=$id?>');
			} else if(view=='ticket') {
				$('#iframe').attr('src', '<?=base_url()?>dashboard_merchant_internal/view_child_ticket/<?=$id?>');
			} else if(view=='attend') {
				$('#iframe').attr('src', '<?=base_url()?>dashboard_merchant_internal/view_child_attend/<?=$id?>');
			} else if(view=='part') {
				$('#iframe').attr('src', '<?=base_url()?>dashboard_merchant_internal/view_child_part/<?=$id?>');
			}
		}
		
		$('#select_client').on('change', function () {
			var id = $(this).val();
			if(id!=="") {
				window.location.href='<?=base_url()?>dashboard_merchant_internal/get_client/'+id;
			} else {
				window.location.href='<?=base_url()?>dashboard_merchant_internal';
			}
		});
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
				
			$(".js-status-update a").click(function () {
				var selText = $(this).text();
				var $this = $(this);
				$this.parents('.btn-group').find('.dropdown-toggle').html(selText + ' <span class="caret"></span>');
				$this.parents('.dropdown-menu').find('li').removeClass('active');
				$this.parent().addClass('active');
			});
			
			/*
			 * TODO: add a way to add more todo's to list
			 */
			
			// initialize sortable
			
			$("#sortable1, #sortable2").sortable({
				handle: '.handle',
				connectWith: ".todo",
				update: countTasks
			}).disableSelection();
			
			
			// check and uncheck
			$('.todo .checkbox > input[type="checkbox"]').click(function () {
				var $this = $(this).parent().parent().parent();
			
				if ($(this).prop('checked')) {
					$this.addClass("complete");
			
					// remove this if you want to undo a check list once checked
					//$(this).attr("disabled", true);
					$(this).parent().hide();
			
					// once clicked - add class, copy to memory then remove and add to sortable3
					$this.slideUp(500, function () {
						$this.clone().prependTo("#sortable3").effect("highlight", {}, 800);
						$this.remove();
						countTasks();
					});
				} else {
					// insert undo code here...
				}
			
			})
			// count tasks
			function countTasks() {
			
				$('.todo-group-title').each(function () {
					var $this = $(this);
					$this.find(".num-of-tasks").text($this.next().find("li").size());
				});
			
			}
			
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
			
				/* TAB 1: UPDATING CHART */
				// For the demo we use generated data, but normally it would be coming from the server
			
				var data = [],
					totalPoints = 200,
					$UpdatingChartColors = $("#updating-chart").css('color');
			
				function getRandomData() {
					if (data.length > 0)
						data = data.slice(1);
			
					// do a random walk
					while (data.length < totalPoints) {
						var prev = data.length > 0 ? data[data.length - 1] : 50;
						var y = prev + Math.random() * 10 - 5;
						if (y < 0)
							y = 0;
						if (y > 100)
							y = 100;
						data.push(y);
					}
			
					// zip the generated y values with the x values
					var res = [];
					for (var i = 0; i < data.length; ++i)
						res.push([i, data[i]])
					return res;
				}
			
				// setup control widget
				var updateInterval = 1500;
				$("#updating-chart").val(updateInterval).change(function () {
			
					var v = $(this).val();
					if (v && !isNaN(+v)) {
						updateInterval = +v;
						$(this).val("" + updateInterval);
					}
			
				});
			
				// setup plot
				var options = {
					yaxis: {
						min: 0,
						max: 100
					},
					xaxis: {
						min: 0,
						max: 100
					},
					colors: [$UpdatingChartColors],
					series: {
						lines: {
							lineWidth: 1,
							fill: true,
							fillColor: {
								colors: [{
									opacity: 0.4
								}, {
									opacity: 0
								}]
							},
							steps: false
			
						}
					}
				};
			
				flot_updating_chart = $.plot($("#updating-chart"), [getRandomData()], options);
			
				/* live switch */
				$('input[type="checkbox"]#start_interval').click(function () {
					if ($(this).prop('checked')) {
						$on = true;
						updateInterval = 1500;
						update();
					} else {
						clearInterval(updateInterval);
						$on = false;
					}
				});
			
				function update() {

					try {
						if ($on == true) {
							flot_updating_chart.setData([getRandomData()]);
							flot_updating_chart.draw();
							setTimeout(update, updateInterval);
				
						} else {
							clearInterval(updateInterval)
						}
					}
					catch(err) {
						clearInterval(updateInterval);
					}
			
				}
			
				var $on = false;
			
				/*end updating chart*/
			
				/* TAB 2: Social Network  */
			
				$(function () {
					// jQuery Flot Chart
					var twitter = [
						[1, 27],
						[2, 34],
						[3, 51],
						[4, 48],
						[5, 55],
						[6, 65],
						[7, 61],
						[8, 70],
						[9, 65],
						[10, 75],
						[11, 57],
						[12, 59],
						[13, 62]
					],
						facebook = [
							[1, 25],
							[2, 31],
							[3, 45],
							[4, 37],
							[5, 38],
							[6, 40],
							[7, 47],
							[8, 55],
							[9, 43],
							[10, 50],
							[11, 47],
							[12, 39],
							[13, 47]
						],
						data = [{
							label: "Twitter",
							data: twitter,
							lines: {
								show: true,
								lineWidth: 1,
								fill: true,
								fillColor: {
									colors: [{
										opacity: 0.1
									}, {
										opacity: 0.13
									}]
								}
							},
							points: {
								show: true
							}
						}, {
							label: "Facebook",
							data: facebook,
							lines: {
								show: true,
								lineWidth: 1,
								fill: true,
								fillColor: {
									colors: [{
										opacity: 0.1
									}, {
										opacity: 0.13
									}]
								}
							},
							points: {
								show: true
							}
						}];
			
					var options = {
						grid: {
							hoverable: true
						},
						colors: ["#568A89", "#3276B1"],
						tooltip: true,
						tooltipOpts: {
							//content : "Value <b>$x</b> Value <span>$y</span>",
							defaultTheme: false
						},
						xaxis: {
							ticks: [
								[1, "JAN"],
								[2, "FEB"],
								[3, "MAR"],
								[4, "APR"],
								[5, "MAY"],
								[6, "JUN"],
								[7, "JUL"],
								[8, "AUG"],
								[9, "SEP"],
								[10, "OCT"],
								[11, "NOV"],
								[12, "DEC"],
								[13, "JAN+1"]
							]
						},
						yaxes: {
			
						}
					};
			
					flot_statsChart = $.plot($("#statsChart"), data, options);
				});
			
				// END TAB 2
			
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
			
			/*
			 * VECTOR MAP
			 */
			
			data_array = {
				"US": 4977,
				"AU": 4873,
				"IN": 3671,
				"BR": 2476,
				"TR": 1476,
				"CN": 146,
				"CA": 134,
				"BD": 100
			};
			
			// Load Map dependency 1 then call for dependency 2 and then run renderVectorMap function
			loadScript("<?=BASE_URL?>js/plugin/vectormap/jquery-jvectormap-1.2.2.min.js", function(){
				loadScript("<?=BASE_URL?>js/plugin/vectormap/jquery-jvectormap-world-mill-en.js", renderVectorMap);
			});
			

			function renderVectorMap() {
				$('#vector-map').vectorMap({
					map: 'world_mill_en',
					backgroundColor: '#fff',
					regionStyle: {
						initial: {
							fill: '#c4c4c4'
						},
						hover: {
							"fill-opacity": 1
						}
					},
					series: {
						regions: [{
							values: data_array,
							scale: ['#85a8b6', '#4d7686'],
							normalizeFunction: 'polynomial'
						}]
					},
					onRegionLabelShow: function (e, el, code) {
						if (typeof data_array[code] == 'undefined') {
							e.preventDefault();
						} else {
							var countrylbl = data_array[code];
							el.html(el.html() + ': ' + countrylbl + ' visits');
						}
					}
				});
			}
			
			/*
			 * FULL CALENDAR JS
			 */
			
			// Load Calendar dependency then setup calendar
			
			loadScript("<?=BASE_URL?>js/plugin/moment/moment.min.js", function(){
				loadScript("<?=BASE_URL?>js/plugin/fullcalendar/jquery.fullcalendar.min.js", setupCalendar);
			});
			
			function setupCalendar() {
			
				if ($("#calendar").length) {
					var date = new Date();
					var d = date.getDate();
					var m = date.getMonth();
					var y = date.getFullYear();
			
					calendar = $('#calendar').fullCalendar({
			
						editable: true,
						draggable: true,
						selectable: false,
						selectHelper: true,
						unselectAuto: false,
						disableResizing: false,
			
						header: {
							left: 'title', //,today
							center: 'prev, next, today',
							right: 'month, agendaWeek, agenDay' //month, agendaDay,
						},
			
						select: function (start, end, allDay) {
							var title = prompt('Event Title:');
							if (title) {
								calendar.fullCalendar('renderEvent', {
										title: title,
										start: start,
										end: end,
										allDay: allDay
									}, true // make the event "stick"
								);
							}
							calendar.fullCalendar('unselect');
						},
			
						events: [{
							title: 'All Day Event',
							start: new Date(y, m, 1),
							description: 'long description',
							className: ["event", "bg-color-greenLight"],
							icon: 'fa-check'
						}, {
							title: 'Long Event',
							start: new Date(y, m, d - 5),
							end: new Date(y, m, d - 2),
							className: ["event", "bg-color-red"],
							icon: 'fa-lock'
						}, {
							id: 999,
							title: 'Repeating Event',
							start: new Date(y, m, d - 3, 16, 0),
							allDay: false,
							className: ["event", "bg-color-blue"],
							icon: 'fa-clock-o'
						}, {
							id: 999,
							title: 'Repeating Event',
							start: new Date(y, m, d + 4, 16, 0),
							allDay: false,
							className: ["event", "bg-color-blue"],
							icon: 'fa-clock-o'
						}, {
							title: 'Meeting',
							start: new Date(y, m, d, 10, 30),
							allDay: false,
							className: ["event", "bg-color-darken"]
						}, {
							title: 'Lunch',
							start: new Date(y, m, d, 12, 0),
							end: new Date(y, m, d, 14, 0),
							allDay: false,
							className: ["event", "bg-color-darken"]
						}, {
							title: 'Birthday Party',
							start: new Date(y, m, d + 1, 19, 0),
							end: new Date(y, m, d + 1, 22, 30),
							allDay: false,
							className: ["event", "bg-color-darken"]
						}, {
							title: 'Smartadmin Open Day',
							start: new Date(y, m, 28),
							end: new Date(y, m, 29),
							className: ["event", "bg-color-darken"]
						}],
			
						eventRender: function (event, element, icon) {
							if (!event.description == "") {
								element.find('.fc-event-title').append("<br/><span class='ultra-light'>" + event.description +
									"</span>");
							}
							if (!event.icon == "") {
								element.find('.fc-event-title').append("<i class='air air-top-right fa " + event.icon +
									" '></i>");
							}
						}
					});
			
				};
			
				/* hide default buttons */
				$('.fc-header-right, .fc-header-center').hide();
			
			}
			
			// calendar prev
			$('#calendar-buttons #btn-prev').click(function () {
				$('.fc-button-prev').click();
				return false;
			});
			
			// calendar next
			$('#calendar-buttons #btn-next').click(function () {
				$('.fc-button-next').click();
				return false;
			});
			
			// calendar today
			$('#calendar-buttons #btn-today').click(function () {
				$('.fc-button-today').click();
				return false;
			});
			
			// calendar month
			$('#mt').click(function () {
				$('#calendar').fullCalendar('changeView', 'month');
			});
			
			// calendar agenda week
			$('#ag').click(function () {
				$('#calendar').fullCalendar('changeView', 'agendaWeek');
			});
			
			// calendar agenda day
			$('#td').click(function () {
				$('#calendar').fullCalendar('changeView', 'agendaDay');
			});
			
			/*
			 * CHAT
			 */
			
			var filter_input = $('#filter-chat-list'),
				chat_users_container = $('#chat-container > .chat-list-body'),
				chat_users = $('#chat-users'),
				chat_list_btn = $('#chat-container > .chat-list-open-close'),
				chat_body = $('#chat-body');
			
			/*
			 * LIST FILTER (CHAT)
			 */
			
			// custom css expression for a case-insensitive contains()
			jQuery.expr[':'].Contains = function (a, i, m) {
				return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
			};
			
			function listFilter(list) { 
				// header is any element, list is an unordered list
				// create and add the filter form to the header
			
				filter_input.change(function () {
					var filter = $(this).val();
					if (filter) {
						// this finds all links in a list that contain the input,
						// and hide the ones not containing the input while showing the ones that do
						chat_users.find("a:not(:Contains(" + filter + "))").parent().slideUp();
						chat_users.find("a:Contains(" + filter + ")").parent().slideDown();
					} else {
						chat_users.find("li").slideDown();
					}
					return false;
				}).keyup(function () {
					// fire the above change event after every letter
					$(this).change();
			
				});
			
			}
			
			// on dom ready
			listFilter(chat_users);
			
			// open chat list
			chat_list_btn.click(function () {
				$(this).parent('#chat-container').toggleClass('open');
			})
			
			chat_body.animate({
				scrollTop: chat_body[0].scrollHeight
			}, 500);
		
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

@endsection