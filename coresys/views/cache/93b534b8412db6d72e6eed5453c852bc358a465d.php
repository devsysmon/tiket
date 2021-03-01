<?php $__env->startSection('stylesheet'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
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
@media  screen and (max-width: 1024px){
hanzmobview{
    display: none;
  }
.art-one{
  padding: 10px;
  }

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


<section id="widget-grid">
	<div class="row hrow-gap">
	
		<article class="col-sm-12 col-md-12 col-lg-12" style="margin: 0px 0px 0px 0px;">
			<div class="jarviswidget jarviswidget-color-purple" id="wid-id-2" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false" 
			data-widget-colorbutton="false" data-widget-deletebutton="false">
				<header style="background: linear-gradient(to bottom, #00c6ff, #0072ff);">
					<span class="widget-icon"> <img style="float: left; margin: 10px 5px 0px 10px;" src="<?=base_url()?>assets/img/start.png" height="15" width="15" /> </span>
					<h2 style="color:white;font-size:14px; font-weight: bold;">Client Dashboard Monitoring
					</h2>

				</header>
				<div>
					<div class="widget-body no-padding" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">
					<span class="ribbon-button-alignment pull-right" style="margin: -38px 10px 0px 0px; "> 
						<section>
							<label class="label">
							<small style="color:white;font-size:12px; font-weight: bold;">Select Client/Bank</small>
							</label>
							<label class="select">
								<select>
									<option value="0">Pilih Client/Bank</option>
									<option value="1">Client/Bank1</option>
									<option value="2">Client/Bank2</option>
									<option value="3">Client/Bank3</option>
								</select> <i></i> </label>
						</section>
					</span>
					<!-- Styles -->
					<style>
					#chartdiv1 {
					  width: 100%;
					  height: 400px;
					}
					</style>

					<!-- Resources -->
					<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
					<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
					<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

					<!-- Chart code -->
					<script>
					am4core.ready(function() {

					// Themes begin
					am4core.useTheme(am4themes_animated);
					// Themes end

					// Create chart instance
					var chart = am4core.create("chartdiv1", am4charts.XYChart);

					// Add data
					chart.data = [{
					  "date": "2013-01-16",
					  "market1": 71,
					  "market2": 75,
					  "sales1": 5,
					  "sales2": 8
					}, {
					  "date": "2013-01-17",
					  "market1": 74,
					  "market2": 78,
					  "sales1": 4,
					  "sales2": 6
					}, {
					  "date": "2013-01-18",
					  "market1": 78,
					  "market2": 88,
					  "sales1": 5,
					  "sales2": 2
					}, {
					  "date": "2013-01-19",
					  "market1": 85,
					  "market2": 89,
					  "sales1": 8,
					  "sales2": 9
					}, {
					  "date": "2013-01-20",
					  "market1": 82,
					  "market2": 89,
					  "sales1": 9,
					  "sales2": 6
					}, {
					  "date": "2013-01-21",
					  "market1": 83,
					  "market2": 85,
					  "sales1": 3,
					  "sales2": 5
					}, {
					  "date": "2013-01-22",
					  "market1": 88,
					  "market2": 92,
					  "sales1": 5,
					  "sales2": 7
					}, {
					  "date": "2013-01-23",
					  "market1": 85,
					  "market2": 90,
					  "sales1": 7,
					  "sales2": 6
					}, {
					  "date": "2013-01-24",
					  "market1": 85,
					  "market2": 91,
					  "sales1": 9,
					  "sales2": 5
					}, {
					  "date": "2013-01-25",
					  "market1": 80,
					  "market2": 84,
					  "sales1": 5,
					  "sales2": 8
					}, {
					  "date": "2013-01-26",
					  "market1": 87,
					  "market2": 92,
					  "sales1": 4,
					  "sales2": 8
					}, {
					  "date": "2013-01-27",
					  "market1": 84,
					  "market2": 87,
					  "sales1": 3,
					  "sales2": 4
					}, {
					  "date": "2013-01-28",
					  "market1": 83,
					  "market2": 88,
					  "sales1": 5,
					  "sales2": 7
					}, {
					  "date": "2013-01-29",
					  "market1": 84,
					  "market2": 87,
					  "sales1": 5,
					  "sales2": 8
					}, {
					  "date": "2013-01-30",
					  "market1": 81,
					  "market2": 85,
					  "sales1": 4,
					  "sales2": 7
					}];

					// Create axes
					var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
					//dateAxis.renderer.grid.template.location = 0;
					//dateAxis.renderer.minGridDistance = 30;

					var valueAxis1 = chart.yAxes.push(new am4charts.ValueAxis());
					valueAxis1.title.text = "Sales";

					var valueAxis2 = chart.yAxes.push(new am4charts.ValueAxis());
					valueAxis2.title.text = "Total Tickets";
					valueAxis2.renderer.opposite = true;
					valueAxis2.renderer.grid.template.disabled = true;

					// Create series
					var series1 = chart.series.push(new am4charts.ColumnSeries());
					series1.dataFields.valueY = "sales1";
					series1.dataFields.dateX = "date";
					series1.yAxis = valueAxis1;
					series1.name = "Target Sales";
					series1.tooltipText = "{name}\n[bold font-size: 20]${valueY}M[/]";
					series1.fill = chart.colors.getIndex(0);
					series1.strokeWidth = 0;
					series1.clustered = false;
					series1.columns.template.width = am4core.percent(40);

					var series2 = chart.series.push(new am4charts.ColumnSeries());
					series2.dataFields.valueY = "sales2";
					series2.dataFields.dateX = "date";
					series2.yAxis = valueAxis1;
					series2.name = "Actual Sales";
					series2.tooltipText = "{name}\n[bold font-size: 20]${valueY}M[/]";
					series2.fill = chart.colors.getIndex(0).lighten(0.5);
					series2.strokeWidth = 0;
					series2.clustered = false;
					series2.toBack();

					var series3 = chart.series.push(new am4charts.LineSeries());
					series3.dataFields.valueY = "market1";
					series3.dataFields.dateX = "date";
					series3.name = "Market Days";
					series3.strokeWidth = 2;
					series3.tensionX = 0.7;
					series3.yAxis = valueAxis2;
					series3.tooltipText = "{name}\n[bold font-size: 20]{valueY}[/]";

					var bullet3 = series3.bullets.push(new am4charts.CircleBullet());
					bullet3.circle.radius = 3;
					bullet3.circle.strokeWidth = 2;
					bullet3.circle.fill = am4core.color("#fff");

					var series4 = chart.series.push(new am4charts.LineSeries());
					series4.dataFields.valueY = "market2";
					series4.dataFields.dateX = "date";
					series4.name = "Market Days ALL";
					series4.strokeWidth = 2;
					series4.tensionX = 0.7;
					series4.yAxis = valueAxis2;
					series4.tooltipText = "{name}\n[bold font-size: 20]{valueY}[/]";
					series4.stroke = chart.colors.getIndex(0).lighten(0.5);
					series4.strokeDasharray = "3,3";

					var bullet4 = series4.bullets.push(new am4charts.CircleBullet());
					bullet4.circle.radius = 3;
					bullet4.circle.strokeWidth = 2;
					bullet4.circle.fill = am4core.color("#fff");

					// Add cursor
					chart.cursor = new am4charts.XYCursor();

					// Add legend
					chart.legend = new am4charts.Legend();
					chart.legend.position = "top";

					// Add scrollbar
					chart.scrollbarX = new am4charts.XYChartScrollbar();
					chart.scrollbarX.series.push(series1);
					chart.scrollbarX.series.push(series3);
					chart.scrollbarX.parent = chart.bottomAxesContainer;

					}); // end am4core.ready()
					</script>

					<!-- HTML -->
					<div id="chartdiv1" style="margin: 0px 0px 0px 0px;"></div>			
					</div>
				</div>
			</div>
		</article>	
		<article class="col-sm-12 col-md-12 col-lg-12" style="margin: -55px 0px 0px 0px;">
			<div class="jarviswidget jarviswidget-color-purple" id="wid-id-2"
			data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false" 
			data-widget-colorbutton="false" data-widget-deletebutton="false">
				<header style="background: linear-gradient(to bottom, #00c6ff, #0072ff);height:5px;">
				</header>
				<div>
					<div class="widget-body no-padding" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">
						<div class="col-sm-3" style="margin: 15px 0px 0px 0px;">
							<h4 class="alert alert-info zoomsmall" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );border-radius: 5px 5px 5px 5px;">
							<p class="small" align="justify" style="color:white;font-size:10px; margin: 0px 0px 0px 0px;height:50px;">
							<img style="float: left; margin: 2px 10px 0px 0px;" src="<?=base_url()?>assets/img/filerack.png" 
							height="45" width="45"/>
							<b style="letter-spacing: -1px;font-size:14px; margin: 0px 0px 0px 0px;">
							CASH MANAGEMENT
							</b><br>
							<small style="color:white;font-size:10px; margin: 0px 0px 0px 0px;">
							CIT, CR, CPC, & LOGISTICS</small></p>
							</h4>
						</div>	
						<div class="col-sm-3" style="margin: 15px 0px 0px 0px;">
							<h4 class="alert alert-info zoomsmall" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );border-radius: 5px 5px 5px 5px;">
							<p class="small" align="justify" style="color:white;font-size:10px; margin: 0px 0px 0px 0px;height:50px;">
							<img style="float: left; margin: 2px 10px 0px 0px;" src="<?=base_url()?>assets/img/filerack.png" 
							height="45" width="45"/>
							<b style="letter-spacing: -1px;font-size:14px; margin: 0px 0px 0px 0px;">
							CASH MANAGEMENT
							</b><br>
							<small style="color:white;font-size:10px; margin: 0px 0px 0px 0px;">
							CIT, CR, CPC, & LOGISTICS</small></p>
							</h4>
						</div>	
						<div class="col-sm-3" style="margin: 15px 0px 0px 0px;">
							<h4 class="alert alert-info zoomsmall" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );border-radius: 5px 5px 5px 5px;">
							<p class="small" align="justify" style="color:white;font-size:10px; margin: 0px 0px 0px 0px;height:50px;">
							<img style="float: left; margin: 2px 10px 0px 0px;" src="<?=base_url()?>assets/img/filerack.png" 
							height="45" width="45"/>
							<b style="letter-spacing: -1px;font-size:14px; margin: 0px 0px 0px 0px;">
							CASH MANAGEMENT
							</b><br>
							<small style="color:white;font-size:10px; margin: 0px 0px 0px 0px;">
							CIT, CR, CPC, & LOGISTICS</small></p>
							</h4>
						</div>	
						<div class="col-sm-3" style="margin: 15px 0px 0px 0px;">
							<h4 class="alert alert-info zoomsmall" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );border-radius: 5px 5px 5px 5px;">
							<p class="small" align="justify" style="color:white;font-size:10px; margin: 0px 0px 0px 0px;height:50px;">
							<img style="float: left; margin: 2px 10px 0px 0px;" src="<?=base_url()?>assets/img/filerack.png" 
							height="45" width="45"/>
							<b style="letter-spacing: -1px;font-size:14px; margin: 0px 0px 0px 0px;">
							CASH MANAGEMENT
							</b><br>
							<small style="color:white;font-size:10px; margin: 0px 0px 0px 0px;">
							CIT, CR, CPC, & LOGISTICS</small></p>
							</h4>
						</div>	
					</div>
				</div>
				<div style="background: linear-gradient(to bottom, #00c6ff, #0072ff);height:5px">
				</div>
			</div>
		</article>	
	</div>
	<div class="row hrow-gap">
		<article class="col-sm-12" style="margin: -42px 0px 0px 0px;">
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV_SERVER\htdocs\atmserv-assindo\coresys\views/pages/dashboard_merchant/index.blade.php ENDPATH**/ ?>