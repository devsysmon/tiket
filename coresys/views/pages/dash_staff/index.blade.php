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

<!--<div class="row art-one">
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
</div>-->

<section id="widget-grid">

<div class="row">
	<article class="col-sm-12 col-md-12 col-lg-12" style="margin: 0px 0px 0px 0px;">
		<div class="jarviswidget jarviswidget-color-purple" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-sortable="false" 
		data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false">
		<header style="background: linear-gradient(to bottom, #00c6ff, #0072ff);">
			<span class="widget-icon"> <img style="float: left; margin: 10px 5px 0px 10px;" src="<?=base_url()?>assets/img/userflow.png" height="15" width="15" /> </span>
			<h2 style="color:white;font-size:14px; font-weight: bold;">Dashboard Staff</h2>
		</header>
		<div>
			<div class="widget-body no-padding" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">
			
			<div class="row">
				<div class="col-sm-12">
					<div class="well well-sm">
						<div class="row">
							<div class="col-sm-12 col-md-12 col-lg-8">
								<div class="well well-light well-sm no-margin no-padding">
									<div class="row">
										<article class="col-sm-12 col-md-12 col-lg-12" style="margin: 0px 0px -30px 0px;">
											<div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
												<header style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
													<span class="widget-icon"> <img style="float: left; margin: 7px 5px 0px 8px;" src="<?=base_url()?>assets/img/cal.png" height="18" width="18" /> </span>
													<h2 style="color:white;font-size:14px; font-weight: bold;">Staff Sumarry
													</h2>
												</header>
												<div>
													<div class="widget-body no-padding">
													<table class="table table-bordered table-condensed">
														<thead>
															<tr>
																<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">Type/Method Of Transaction</th>
																<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">Job Runsheet</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<th style="background: #ffffff;font-size:12px">
																	<ul id="legend">Said To Contain (STC)</ul>
																</th>
																<td style="background: #ffffff"><span id="">12</span></td>
															</tr>
															<tr>
																<th style="background: #ffffff;font-size:12px">Bulk Bundle Count (BBC)</th>
																<td style="background: #ffffff"><span id="">34</span></td>
															</tr>
															<tr>
																<th style="background: #ffffff;font-size:12px">Count on Site (COS)</th>
																<td style="background: #ffffff"><span id="">3</span></td>
															</tr>
														</tbody>
														<tfoot>
															<tr>
																<th colspan="2" style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;height:1px;"></th>
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
													<h2 style="color:white;font-size:14px; font-weight: bold;">Transaction Sumarry
													</h2>
												</header>
												<div>
													<div class="widget-body no-padding">
													<table class="table table-bordered table-condensed">
														<thead>
															<tr>
																<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">Type/Method Of Transaction</th>
																<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">Job Runsheet</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<th style="background: #ffffff;font-size:12px">
																	<ul id="legend">Said To Contain (STC)</ul>
																</th>
																<td style="background: #ffffff"><span id="">12</span></td>
															</tr>
															<tr>
																<th style="background: #ffffff;font-size:12px">Bulk Bundle Count (BBC)</th>
																<td style="background: #ffffff"><span id="">34</span></td>
															</tr>
															<tr>
																<th style="background: #ffffff;font-size:12px">Count on Site (COS)</th>
																<td style="background: #ffffff"><span id="">3</span></td>
															</tr>
														</tbody>
														<tfoot>
															<tr>
																<th colspan="2" style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;height:1px;"></th>
															</tr>
														</tfoot>
													</table>
													</div>
												</div>
											</div>
										</article>									
									</div>	
									<div class="row">
										<div class="col-sm-12">
										<div class="jarviswidget well" id="wid-id-0">
											<div>
												<div class="widget-body no-padding">
													<div class="row art-one">
													<hanzmobview>
														<article class="btn-group col-sm-12">
															<div class="navbar navbar-default" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );border-radius: 0px 0px 0px 0px;">
																<div class="col-sm-4" style="margin: 5px 0px 0px 0px;">
																<a href="<?=base_url()?>dashboard_merchant_internal" class="btn btn-default btn-circle btn-sm zoomsmall active">
																<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/blackbut.png" height="24" width="24" />
																	<p class="small" style="margin: -5px 0px 0px 0px;">
																		<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Client Dashboard</small><br>
																		<small style="color:white;font-size:12px;">Client Dashboard Monitoring</small>
																	</p>
																</a>
																</div>
																<div class="col-sm-4" style="margin: 5px 0px 0px 0px;">
																<a href="<?=base_url()?>master_client" class="btn btn-default btn-circle btn-sm zoomsmall ">
																<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/blackbook.png" height="24" width="24" />
																	<p class="small" style="margin: -5px 0px 0px 0px;">
																		<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Client & Customer </small><br>
																		<small style="color:white;font-size:12px;">Data Client & Customer </small>
																	</p>
																</a>
																</div>
																<div class="col-sm-2" style="margin: 5px 0px 0px 0px;">
																<a href="<?=base_url()?>master_atm" class="btn btn-default btn-circle zoomsmall">
																<img style="float: left; margin: -1px 10px 0px 4px;" src="<?=base_url()?>seipkon/assets/img/atm2.png" height="24" width="24" />
																	<p class="small" style="margin: -5px 0px 0px 0px;">
																		<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Data Mesin ATM</small><br>
																		<small style="color:white;font-size:12px;">Data Mesin ATM</small>
																	</p>
																</a>
																</div>		
															</div>
														</article>
													</hanzmobview>
													</div>
													
													
													<table id="example" class="display projects-table table table-striped table-bordered table-hover" cellspacing="0" width="100%">
														<thead>
															<tr>
																<th></th><th>Projects</th>
																<!--<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> EST</th>
																<th>Contacts</th>
																<th>Status</th>
																<th><i class="fa fa-circle txt-color-darken font-xs"></i> Target/ <i class="fa fa-circle text-danger font-xs"></i> Actual</th>-->
																<th><i class="fa fa-fw fa-calendar text-muted hidden-md hidden-sm hidden-xs"></i> Starts</th>
																<th><i class="fa fa-fw fa-calendar text-muted hidden-md hidden-sm hidden-xs"></i> Ends</th>
																<th>Tracker</th>
															</tr>
														</thead>
													</table>
												</div>
											</div>
										</div>
										</div>
									</div>
								</div>
								<div class="tab-content padding-top-10">
									<div class="tab-pane fade in active" id="a1">
										<div class="row">
										<article class="col-sm-12 col-md-12 col-lg-6">
										<div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
											<header style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
												<span class="widget-icon"> <img style="float: left; margin: 7px 5px 0px 8px;" src="<?=base_url()?>assets/img/calendar2.png" height="18" width="18" /> </span>
												<h2 style="color:white;font-size:14px; font-weight: bold;">Cash Delivery
												</h2>
											</header>
											<div>
												<div class="widget-body no-padding">
												123
													
													
												</div>
											</div>
										</div>
										</article>									
										<article class="col-sm-12 col-md-12 col-lg-6">
										<div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
											<header style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
												<span class="widget-icon"> <img style="float: left; margin: 7px 5px 0px 8px;" src="<?=base_url()?>assets/img/calendar2.png" height="18" width="18" /> </span>
												<h2 style="color:white;font-size:14px; font-weight: bold;">Cash Pick-Up
												</h2>
											</header>
											<div>
												<div class="widget-body no-padding">
												123
													
													
												</div>
											</div>
										</div>
										</article>
										
										</div>
									</div>
								</div>
											
								
							</div>
							
							<div class="col-sm-12 col-md-12 col-lg-4">
								<div class="well well-light well-sm no-margin no-padding">
									<div class="row">
										<div class="col-sm-12">
											<div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
												<header style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
													<span class="widget-icon"> <img style="float: left; margin: 7px 5px 0px 8px;" src="<?=base_url()?>assets/img/calendar2.png" height="18" width="18" /> </span>
													<h2 style="color:white;font-size:14px; font-weight: bold;">Cash Delivery
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
													  "country": "Lithuania",
													  "litres": 501.9
													}, {
													  "country": "UK",
													  "litres": 99
													}, {
													  "country": "Germany",
													  "litres": 60
													}, {
													  "country": "Belgium",
													  "litres": 50
													} ];

													// Set inner radius
													chart.innerRadius = am4core.percent(50);

													// Add and configure Series
													var pieSeries = chart.series.push(new am4charts.PieSeries());
													pieSeries.dataFields.value = "litres";
													pieSeries.dataFields.category = "country";
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

														// Add data
														chart.data = [{
														  "country": "SENIN",
														  "visits": 125
														},{
														  "country": "SELASA",
														  "visits": 182
														},{
														  "country": "RABU",
														  "visits": 130
														},{
														  "country": "KAMIS",
														  "visits": 114
														},{
														  "country": "JUMAT",
														  "visits": 98
														},{
														  "country": "SABTU",
														  "visits": 98
														},{
														  "country": "MINGGU",
														  "visits": 124
														}];

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
												<div class="tab-content padding-top-10">
													<div class="tab-pane fade in active" id="a1">
														<div class="row">
														<article class="col-sm-12 col-md-12 col-lg-6">
														<div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
															<header style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
																<span class="widget-icon"> <img style="float: left; margin: 7px 5px 0px 8px;" src="<?=base_url()?>assets/img/calendar2.png" height="18" width="18" /> </span>
																<h2 style="color:white;font-size:14px; font-weight: bold;">Cash Delivery
																</h2>
															</header>
															<div>
																<div class="widget-body no-padding">
																123
																	
																	
																</div>
															</div>
														</div>
														</article>									
														<article class="col-sm-12 col-md-12 col-lg-6">
														<div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
															<header style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
																<span class="widget-icon"> <img style="float: left; margin: 7px 5px 0px 8px;" src="<?=base_url()?>assets/img/calendar2.png" height="18" width="18" /> </span>
																<h2 style="color:white;font-size:14px; font-weight: bold;">Cash Pick-Up
																</h2>
															</header>
															<div>
																<div class="widget-body no-padding">
																123
																	
																	
																</div>
															</div>
														</div>
														</article>
														
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<article class="col-sm-12 col-md-12 col-lg-12" style="margin: 0px 0px -30px 0px;">
											<div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
												<header style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
													<span class="widget-icon"> <img style="float: left; margin: 7px 5px 0px 8px;" src="<?=base_url()?>assets/img/cal.png" height="18" width="18" /> </span>
													<h2 style="color:white;font-size:14px; font-weight: bold;">Transaction Sumarry
													</h2>
												</header>
												<div>
													<div class="widget-body no-padding">
													<table class="table table-bordered table-condensed">
														<thead>
															<tr>
																<th style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">Type/Method Of Transaction</th>
																<th style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">Job Runsheet</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<th style="background: #ffffff;font-size:12px">
																	<ul id="legend">Said To Contain (STC)</ul>
																</th>
																<td style="background: #ffffff"><span id="">12</span></td>
															</tr>
															<tr>
																<th style="background: #ffffff;font-size:12px">Bulk Bundle Count (BBC)</th>
																<td style="background: #ffffff"><span id="">34</span></td>
															</tr>
															<tr>
																<th style="background: #ffffff;font-size:12px">Count on Site (COS)</th>
																<td style="background: #ffffff"><span id="">3</span></td>
															</tr>
														</tbody>
														<tfoot>
															<tr>
																<th colspan="2" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;height:1px;"></th>
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
						</div>
					</div>
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