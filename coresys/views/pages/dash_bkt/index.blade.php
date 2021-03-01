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
</style>
<style>
	hanzmobview{
	  margin: 0 auto;
	}
	hanzmobview{
	  display: inline;
	}

	@media screen and (max-width: 1024px){
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
	
		<article class="col-sm-12 col-md-12 col-lg-12" style="margin: 0px 0px -50px 0px;">
			<div class="jarviswidget jarviswidget-color-purple" id="wid-id-2" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-sortable="false" 
			data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false">
				<header style="background: linear-gradient(to bottom, #00c6ff, #0072ff);">
					<h2 style="color:white;font-size:14px; font-weight: bold;">Dashboard - Bank Kalteng
					</h2>
				</header>
				<div>
					<div class="widget-body no-padding" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">
					
					<style>
					#chartdiv {
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
					var chart = am4core.create("chartdiv", am4charts.XYChart);

					// Add data
					chart.data = [{
					  "date": "2021-02-05",
					  "tdone": 9,
					  "tpending": 8,
					  "totticket": 17,
					  "ttoday": 8
					},{
					  "date": "2021-02-06",
					  "tdone": 12,
					  "tpending": 8,
					  "totticket": 19,
					  "ttoday": 6
					},{
					  "date": "2021-02-07",
					  "tdone": 13,
					  "tpending": 7,
					  "totticket": 20,
					  "ttoday": 5
					},{
					  "date": "2021-02-08",
					  "tdone": 9,
					  "tpending": 8,
					  "totticket": 5,
					  "ttoday": 8
					},{
					  "date": "2021-02-09",
					  "tdone": 9,
					  "tpending": 8,
					  "totticket": 5,
					  "ttoday": 8
					},{
					  "date": "2021-02-10",
					  "tdone": 9,
					  "tpending": 8,
					  "totticket": 5,
					  "ttoday": 8
					},{
					  "date": "2021-02-11",
					  "tdone": 9,
					  "tpending": 8,
					  "totticket": 5,
					  "ttoday": 8
					},{
					  "date": "2021-02-12",
					  "tdone": 9,
					  "tpending": 8,
					  "totticket": 5,
					  "ttoday": 8
					},{
					  "date": "2021-02-13",
					  "tdone": 9,
					  "tpending": 8,
					  "totticket": 5,
					  "ttoday": 8
					},{
					  "date": "2021-02-14",
					  "tdone": 9,
					  "tpending": 8,
					  "totticket": 5,
					  "ttoday": 8
					},{
					  "date": "2021-02-15",
					  "tdone": 9,
					  "tpending": 8,
					  "totticket": 5,
					  "ttoday": 8
					},{
					  "date": "2021-02-16",
					  "tdone": 9,
					  "tpending": 8,
					  "totticket": 5,
					  "ttoday": 8
					},{
					  "date": "2021-02-17",
					  "tdone": 9,
					  "tpending": 8,
					  "totticket": 5,
					  "ttoday": 8
					},{
					  "date": "2021-02-18",
					  "tdone": 9,
					  "tpending": 8,
					  "totticket": 5,
					  "ttoday": 8
					},{
					  "date": "2021-02-19",
					  "tdone": 9,
					  "tpending": 8,
					  "totticket": 15,
					  "ttoday": 8
					},{
					  "date": "2021-02-20",
					  "tdone": 9,
					  "tpending": 8,
					  "totticket": 5,
					  "ttoday": 8
					},{
					  "date": "2021-02-21",
					  "tdone": 9,
					  "tpending": 8,
					  "totticket": 5,
					  "ttoday": 8
					},{
					  "date": "2021-02-22",
					  "tdone": 9,
					  "tpending": 8,
					  "totticket": 5,
					  "ttoday": 8
					},{
					  "date": "2021-02-23",
					  "tdone": 9,
					  "tpending": 8,
					  "totticket": 4,
					  "ttoday": 7
					},{
					  "date": "2021-02-24",
					  "tdone": 9,
					  "tpending": 8,
					  "totticket": 17,
					  "ttoday": 8
					}];

					// Create axes
					var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
					//dateAxis.renderer.grid.template.location = 0;
					//dateAxis.renderer.minGridDistance = 30;

					var valueAxis1 = chart.yAxes.push(new am4charts.ValueAxis());
					valueAxis1.title.text = "Interval Tickets";

					var valueAxis2 = chart.yAxes.push(new am4charts.ValueAxis());
					valueAxis2.title.text = "Total Tickets";
					valueAxis2.renderer.opposite = true;
					valueAxis2.renderer.grid.template.disabled = true;

					// Create series
					var series1 = chart.series.push(new am4charts.ColumnSeries());
					series1.dataFields.valueY = "totticket";
					series1.dataFields.dateX = "date";
					series1.yAxis = valueAxis1;
					series1.name = "Total Tickets";
					series1.tooltipText = "{name}\n[bold font-size: 20]${valueY}M[/]";
					series1.fill = chart.colors.getIndex(0);
					series1.strokeWidth = 0;
					series1.clustered = false;
					series1.columns.template.width = am4core.percent(45);

					var series2 = chart.series.push(new am4charts.ColumnSeries());
					series2.dataFields.valueY = "ttoday";
					series2.dataFields.dateX = "date";
					series2.yAxis = valueAxis1;
					series2.name = "Tickets Today";
					series2.tooltipText = "{name}\n[bold font-size: 20]${valueY}M[/]";
					series2.fill = chart.colors.getIndex(0).lighten(0.5);
					series2.strokeWidth = 0;
					series2.clustered = false;
					series2.toBack();

					var series3 = chart.series.push(new am4charts.LineSeries());
					series3.dataFields.valueY = "tdone";
					series3.dataFields.dateX = "date";
					series3.name = "Tickets Done";
					series3.strokeWidth = 2;
					series3.tensionX = 0.7;
					series3.yAxis = valueAxis2;
					series3.tooltipText = "{name}\n[bold font-size: 20]{valueY}[/]";

					var bullet3 = series3.bullets.push(new am4charts.CircleBullet());
					bullet3.circle.radius = 3;
					bullet3.circle.strokeWidth = 2;
					bullet3.circle.fill = am4core.color("#fff");

					var series4 = chart.series.push(new am4charts.LineSeries());
					series4.dataFields.valueY = "tpending";
					series4.dataFields.dateX = "date";
					series4.name = "Tickets Pending";
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

					<img style="position:absolute;float: left; margin: 0px 0px 0px 10px;" src="<?=base_url()?>seipkon/assets/img/logobank/kalteng.png" height="50" width="160" >
					<div id="chartdiv" style="margin: 0px 0px 0px 0px;"></div>			
					
			<div class="jarviswidget jarviswidget-color-purple" id="wid-id-2"
			data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false" 
			data-widget-colorbutton="false" data-widget-deletebutton="false" style="margin: -25px 0px 0px 0px;">
				<header style="background: linear-gradient(to bottom, #00c6ff, #0072ff);height:5px;">
				</header>
				<div>
					<div class="widget-body no-padding" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">
					<div class="row">
				<div class="col-sm-12">
				
				
					<div class="row">
					
						<article class="col-sm-12 col-md-12 col-lg-12" style="margin: 0px 0px 0px 0px;">
							<div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
							
								<div style="background: linear-gradient(to bottom, #8e9eab, #eef2f3);height:75px;">
									<div class="widget-body no-padding">
										<div class="col-xs-12 col-sm-4 col-md-2" style="margin: 10px 0px 0px 0px;">
											<div class="panel zoomsmall" style="background: linear-gradient(to bottom, #ff512f, #f09819);color;white; height:55px;">
												<div class="panel-heading">
													<a href="#" class="">
													<img style="float: left; margin: 0px 5px 0px -5px;" src="<?=base_url()?>assets/img/new-ticket.png" height="35" width="35" />
													<span class="menu-item-parent">
													<p class="small" style="">
														<small style="color:white;font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Tickets</small><br>
														<small style="color:white;font-size:24px; font-weight: bold;"><?=$data_summary['total_ticket']?></small>
													</p>
													</span>
													</a>
												</div>
											</div>
										</div>
										<div class="col-xs-12 col-sm-4 col-md-2" style="margin: 10px 0px 0px 0px;">
											<div class="panel zoomsmall" style="background: linear-gradient(to top, #add100, #7b920a);color;white; height:55px;">
												<div class="panel-heading">
													<a href="#" class="">
													<img style="float: left; margin: 0px 5px 0px -5px;" src="<?=base_url()?>assets/img/filewhite.png" height="35" width="35" />
													<span class="menu-item-parent">
													<p class="small" style="">
														<small style="color:white;font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Ticket Done</small><br>
														<small style="color:white;font-size:24px; font-weight: bold;"><?=$data_summary['total_ticket_done']?></small>
													</p>
													</span>
													</a>
												</div>
											</div>
										</div>
										<div class="col-xs-12 col-sm-4 col-md-2" style="margin: 10px 0px 0px 0px;">
											<div class="panel zoomsmall" style="background: linear-gradient(to bottom, #e52d27, #b31217);color;white; height:55px;">
												<div class="panel-heading">
													<a href="#" class="">
													<img style="float: left; margin: 0px 5px 0px -5px;" src="<?=base_url()?>assets/img/filewhite.png" height="35" width="35" />
													<span class="menu-item-parent">
													<p class="small" style="">
														<small style="color:white;font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Ticket Pending</small><br>
														<small style="color:white;font-size:24px; font-weight: bold;"><?=$data_summary['total_ticket_pending']?></small>
													</p>
													</span>
													</a>
												</div>
											</div>
										</div>
										<div class="col-xs-12 col-sm-4 col-md-2" style="margin: 10px 0px 0px 0px;">
											<div class="panel zoomsmall" style="background: linear-gradient(to bottom, #9d50bb, #6e48aa);color;white; height:55px;">
												<div class="panel-heading">
													<a href="#" class="">
													<img style="float: left; margin: 0px 5px 0px -5px;" src="<?=base_url()?>assets/img/filewhite.png" height="35" width="35" />
													<span class="menu-item-parent">
													<p class="small" style="">
														<small style="color:white;font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Tickets Today</small><br>
														<small style="color:white;font-size:24px; font-weight: bold;"><?=$data_summary['total_today_ticket']?></small>
													</p>
													</span>
													</a>
												</div>
											</div>
										</div>
										<div class="col-xs-12 col-sm-4 col-md-2" style="margin: 10px 0px 0px 0px;">
											<div class="panel zoomsmall" style="background: linear-gradient(to bottom, #1d976c, #3bff84);color;white; height:55px;">
												<div class="panel-heading">
													<a href="#" class="">
													<img style="float: left; margin: 0px 5px 0px -5px;" src="<?=base_url()?>assets/img/filewhite.png" height="35" width="35" />
													<span class="menu-item-parent">
													<p class="small" style="">
														<small style="color:white;font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Done Today</small><br>
														<small style="color:white;font-size:24px; font-weight: bold;"><?=$data_summary['total_today_ticket_done']?></small>
													</p>
													</span>
													</a>
												</div>
											</div>
										</div>
										<div class="col-xs-12 col-sm-4 col-md-2" style="margin: 10px 0px 0px 0px;">
											<div class="panel zoomsmall" style="background: linear-gradient(to bottom, #e52d27, #b31217);color;white; height:55px;">
												<div class="panel-heading">
													<a href="#" class="">
													<img style="float: left; margin: 0px 5px 0px -5px;" src="<?=base_url()?>assets/img/filewhite.png" height="35" width="35" />
													<span class="menu-item-parent">
													<p class="small" style="">
														<small style="color:white;font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Pending Today</small><br>
														<small style="color:white;font-size:24px; font-weight: bold;"><?=$data_summary['total_today_ticket_pending']?></small>
													</p>
													</span>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</article>										
								
						<div class="col-sm-12 col-md-12 col-lg-8" style="margin: -20px 0px 0px 0px;">
							<div class="well well-light well-sm no-margin no-padding">
								<div class="row">
									<article class="col-sm-12 col-md-12 col-lg-12" style="margin: 0px 0px -30px 0px;">
										<div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
											<header style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
												<span class="widget-icon"> <img style="float: left; margin: 7px 5px 0px 8px;" src="<?=base_url()?>assets/img/cal.png" height="18" width="18" /> </span>
												<h2 style="color:white;font-size:14px; font-weight: bold;">List Item Managed - Bank Kalteng
												</h2>
											</header>
											<div>
												<div class="widget-body no-padding">
												<table class="table table-bordered table-condensed">
													<thead>
														<tr>
															<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">REGIONAL</th>
															<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">DIEBOLD</th>
															<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">NCR</th>
															<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">CRM</th>
															<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">YIHUA</th>
															<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">TOTAL</th>
															<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">CSE</th>
														</tr>
													</thead>
													<tbody>
														<?php 
															foreach($data_atm as $r) { ?>
																<tr>
																	<th style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);font-size:12px">
																	<?=$r['regional']?>
																	</th>
																	<td style="background: #ffffff"><span id=""><?=$r['diebold']?></span></td>
																	<td style="background: #ffffff"><span id=""><?=$r['ncr']?></span></td>
																	<td style="background: #ffffff"><span id=""><?=$r['crm']?></span></td>
																	<td style="background: #ffffff"><span id=""><?=$r['yihua']?></span></td>
																	<td style="background: #ffffff"><span id=""><?=$r['total']?></span></td>
																	<td style="background: #ffffff"><span id=""><?=$r['pic']?></span></td>
																</tr>
														<?php 
															}
														?>
													</tbody>
													<tfoot>
														<tr>
															<th colspan="7" style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;height:1px;"></th>
														</tr>
													</tfoot>
												</table>
												</div>
											</div>
										</div>
									</article>									
								</div>
								<div class="row">
									<article class="col-sm-12 col-md-12 col-lg-12" style="margin: 0px 0px -30px 0px;">
										<div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
											<header style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
												<span class="widget-icon"> <img style="float: left; margin: 7px 5px 0px 8px;" src="<?=base_url()?>assets/img/cal.png" height="18" width="18" /> </span>
												<h2 style="color:white;font-size:14px; font-weight: bold;">Maintenance Sumarry & Information
												</h2>
											</header>
											<div>
												<div class="widget-body no-padding">
												<table class="table table-bordered table-condensed">
													<thead>
														<tr>
															<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">ID TICKET</th>
															<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">TANGGAL</th>
															<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">ID ATM</th>
															<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">ACT / PROBLEM TYPE</th>
															<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">STATUS</th>
															<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">CSE</th>
														</tr>
													</thead>
													<tbody>
														<?php 
															if(count($data_ticket)>0) {
																foreach($data_ticket as $r) { ?>
																	<tr>
																		<th style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);font-size:12px"><?=$r['idticket']?></th>
																		<td style="background: #ffffff"><span id=""><?=$r['date']?></span></td>
																		<td style="background: #ffffff"><span id=""><?=$r['idatm']?></span></td>
																		<td style="background: #ffffff"><span id=""><?=$r['problem']?></span></td>
																		<td style="background: #ffffff"><span id=""><?=$r['status']?></span></td>
																		<td style="background: #ffffff"><span id=""><?=$r['cse']?></span></td>
																	</tr>
														<?php 
																}
															} else {
																echo '<tr><td style="background: #ffffff" colspan="6" align="center"><span id="">No Ticket Displayed</span></td></tr>';
															}
														?>
													</tbody>
													<tfoot>
														<tr>
															<th colspan="7" style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;height:1px;"></th>
														</tr>
													</tfoot>
												</table>
												</div>
											</div>
										</div>
									</article>									
								</div>	
							</div>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-4" style="margin: -20px 0px 0px 0px;">
							<div class="well well-light well-sm no-margin no-padding">
								<div class="row">
									<div class="col-sm-12">
										<div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
											<header style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
												<span class="widget-icon"> <img style="float: left; margin: 7px 5px 0px 8px;" src="<?=base_url()?>assets/img/calendar2.png" height="18" width="18" /> </span>
												<h2 style="color:white;font-size:14px; font-weight: bold;">Grafik Maintenance Tickets
												</h2>
											</header>
											<div>
												<div class="widget-body no-padding">
												<style>
												#chartdiv1 {
												  width: 100%;
												  height: 250px;
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
												var chart = am4core.create("chartdiv1", am4charts.PieChart);

												// Add data
												chart.data = [ {
												  "Ticket": "Total",
												  "tvalue": 15
												}, {
												  "Ticket": "Done",
												  "tvalue": 7
												}, {
												  "Ticket": "Pending",
												  "tvalue": 10
												} ];

												// Set inner radius
												chart.innerRadius = am4core.percent(50);

												// Add and configure Series
												var pieSeries = chart.series.push(new am4charts.PieSeries());
												pieSeries.dataFields.value = "tvalue";
												pieSeries.dataFields.category = "Ticket";
												pieSeries.slices.template.stroke = am4core.color("#fff");
												pieSeries.slices.template.strokeWidth = 2;
												pieSeries.slices.template.strokeOpacity = 1;

												// This creates initial animation
												pieSeries.hiddenState.properties.opacity = 1;
												pieSeries.hiddenState.properties.endAngle = -90;
												pieSeries.hiddenState.properties.startAngle = -90;

												}); // end am4core.ready()
												</script>

												<!-- HTML -->
												<div id="chartdiv1"></div>
												</div>
											</div>
										</div>
									
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<hr>
										<div class="" style="margin: -105px 0px 0px 0px;">
											<ul class="nav nav-tabs tabs-pull-right">
												<li class="pull-left active">
													<a href="#a1" data-toggle="tab">Detail Data</a>
												</li>
											</ul>
											<div class="tab-content padding-top-10">
												<div class="tab-pane fade in active" id="a1">

													<div class="row">
													<style>
													#chartdiv2 {
													  width: 90%;
													  height: 250px;
													}
													</style>
													<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
													<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
													<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

													<script>
													am4core.ready(function() {

														// Themes begin
														am4core.useTheme(am4themes_animated);
														// Themes end

														// Create chart instance
														var chart = am4core.create("chartdiv2", am4charts.XYChart3D);

														$.get("<?=base_url()?>dash_bkt/get_week_data", function(data) {
															chart.data = JSON.parse(data);
															
															// Create axes
															let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
															categoryAxis.dataFields.category = "country";
															categoryAxis.renderer.labels.template.rotation = 270;
															categoryAxis.renderer.labels.template.hideOversized = false;
															categoryAxis.renderer.minGridDistance = 10;
															categoryAxis.renderer.labels.template.horizontalCenter = "right";
															categoryAxis.renderer.labels.template.verticalCenter = "middle";
															categoryAxis.tooltip.label.rotation = 270;
															categoryAxis.tooltip.label.horizontalCenter = "right";
															categoryAxis.tooltip.label.verticalCenter = "middle";

															let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
															valueAxis.title.text = "Total Maintenance";
															valueAxis.title.fontWeight = "bold";

															// Create series
															var series = chart.series.push(new am4charts.ColumnSeries3D());
															series.dataFields.valueY = "visits";
															series.dataFields.categoryX = "country";
															series.name = "Visits";
															series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
															series.columns.template.fillOpacity = .8;

															var columnTemplate = series.columns.template;
															columnTemplate.strokeWidth = 2;
															columnTemplate.strokeOpacity = 1;
															columnTemplate.stroke = am4core.color("#FFFFFF");

															columnTemplate.adapter.add("fill", function(fill, target) {
															  return chart.colors.getIndex(target.dataItem.index);
															})

															columnTemplate.adapter.add("stroke", function(stroke, target) {
															  return chart.colors.getIndex(target.dataItem.index);
															})

															chart.cursor = new am4charts.XYCursor();
															chart.cursor.lineX.strokeOpacity = 0;
															chart.cursor.lineY.strokeOpacity = 0;
														});
													}); // end am4core.ready()
													</script>

													<div id="chartdiv2" style="margin: 0px 0px 0px 20px;"></div>	
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<hr>
										<div class="" style="margin: -65px 0px 0px 0px;">
											<ul class="nav nav-tabs tabs-pull-right">
												<li class="pull-left active">
													<a href="#a1" data-toggle="tab">Detail Data</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				
				</div>
			</div>
				
						
					
					</div>
				</div>
				<div style="background: linear-gradient(to bottom, #00c6ff, #0072ff);height:1px;margin: 0px 0px 0px 0px;">
				</div>
			</div>
	
	
					
					</div>
				</div>
			</div>
		</article>	
	</div>

</section>
@endsection


@section('javascript')
	<script src="<?=BASE_URL?>js/plugin/datatables/jquery.dataTables.min.js"></script>
	<script src="<?=BASE_URL?>js/plugin/datatables/dataTables.colVis.min.js"></script>
	<script src="<?=BASE_URL?>js/plugin/datatables/dataTables.tableTools.min.js"></script>
	<script src="<?=BASE_URL?>js/plugin/datatables/dataTables.bootstrap.min.js"></script>
	<script src="<?=BASE_URL?>js/plugin/datatable-responsive/datatables.responsive.min.js"></script>

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
	<script type="text/javascript">

			$(document).ready(function() {
			 	
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
				 * loadScript("js/plugin/_PLUGIN_NAME_.js", pagefunction);
				 * 
				 * TO LOAD A SCRIPT:
				 * var pagefunction = function (){ 
				 *  loadScript(".../plugin.js", run_after_loaded);	
				 * }
				 * 
				 * OR
				 * 
				 * loadScript(".../plugin.js", run_after_loaded);
				 */
				
				/* Formatting function for row details - modify as you need */
				function format ( d ) {
				    // `d` is the original data object for the row
				    return '<table cellpadding="5" cellspacing="0" border="0" class="table table-hover table-condensed">'+
				        '<tr>'+
				            '<td style="width:100px">Project Title:</td>'+
				            '<td>'+d.name+'</td>'+
				        '</tr>'+
				        '<tr>'+
				            '<td>Deadline:</td>'+
				            '<td>'+d.ends+'</td>'+
				        '</tr>'+
				        '<tr>'+
				            '<td>Extra info:</td>'+
				            '<td>And any further details here (images etc)...</td>'+
				        '</tr>'+
				        '<tr>'+
				            '<td>Comments:</td>'+
				            '<td>'+d.comments+'</td>'+
				        '</tr>'+
				        '<tr>'+
				            '<td>Action:</td>'+
				            '<td>'+d.action+'</td>'+
				        '</tr>'+
				    '</table>';
				}

				// clears the variable if left blank
			    var table = $('#example').DataTable( {
			        "ajax": "<?=base_url()?>assets/data/dataList.json",
			        "bDestroy": true,
			        "iDisplayLength": 15,
			        "columns": [
			            {
			                "class":          'details-control',
			                "orderable":      false,
			                "data":           null,
			                "defaultContent": ''
			            },
			            { "data": "name" },
			            // { "data": "est" },
			            // { "data": "contacts" },
			            // { "data": "status" },
			            // { "data": "target-actual" },
			            { "data": "starts" },
			            { "data": "ends" },
			            { "data": "tracker" },
			        ],
			        "order": [[1, 'asc']],
			        "fnDrawCallback": function( oSettings ) {
				       runAllCharts()
				    }
			    } );


			     
			    // Add event listener for opening and closing details
			    $('#example tbody').on('click', 'td.details-control', function () {
			        var tr = $(this).closest('tr');
			        var row = table.row( tr );
			 
			        if ( row.child.isShown() ) {
			            // This row is already open - close it
			            row.child.hide();
			            tr.removeClass('shown');
			        }
			        else {
			            // Open this row
			            row.child( format(row.data()) ).show();
			            tr.addClass('shown');
			        }
			    });

			})
		
		</script>

@endsection