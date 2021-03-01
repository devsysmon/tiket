@extends('layouts.master')

@section('content')
	<link rel="stylesheet" href="<?=base_url()?>seipkon/assets/css/animate.min.css">
	<!-- Bootstrap CSS -->
	<!--Codehim Clock CSS-->
	<link rel="stylesheet" href="<?=base_url()?>seipkon/assets/css/codehim-clock.css" />
	<link rel="stylesheet" href="<?=base_url()?>seipkon/assets/css/jClocksGMT.css">
	
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

	@media screen and (max-width: 1024px){
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
				<div class="navbar navbar-default" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );border-radius: 5px 5px 0px 0px;">
					<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
					<a href="report_attendance" class="btn btn-default btn-circle btn-sm zoomsmall">
					<img style="float: left; margin: -1px 10px 0px 6px;" src="<?=base_url()?>seipkon/assets/img/cal.png" height="24" width="24" />
						<p class="small" style="margin: -5px 0px 0px 0px;">
							<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Attendance Report</small><br>
							<small style="color:white;font-size:12px;">Absensi & Persensi Report</small>
						</p>
					</a>
					</div>
					<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
					<a href="inventory_report" class="btn btn-default btn-circle btn-sm zoomsmall">
					<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/report.png" height="24" width="24" />
						<p class="small" style="margin: -5px 0px 0px 0px;">
							<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Inventory Report</small><br>
							<small style="color:white;font-size:12px;">Report Logistics & Inventory </small>
						</p>
					</a>
					</div>
					<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
					<a href="report_maintenance" class="btn btn-default btn-circle zoomsmall active">
					<img style="float: left; margin: -1px 10px 0px 6px;" src="<?=base_url()?>seipkon/assets/img/filewhite.png" height="24" width="24" />
						<p class="small" style="margin: -5px 0px 0px 0px;">
							<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Maintenance Report</small><br>
							<small style="color:white;font-size:12px;">Maintenance Service Report</small>
						</p>
					</a>
					</div>
					<div class="col-sm-2" style="margin: 5px 0px 0px 0px;">
					<a href="report_jobcard" class="btn btn-default btn-circle btn-sm zoomsmall">
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
					<header style="background: linear-gradient(to bottom, #00c6ff, #0072ff);">
						<h2 style="color:white; margin: -1px 0px 0px 10px;"><b>Standard Jam & Waktu </b></h2>
					</header>

					<!-- widget div-->
					<div>

						<!-- widget content -->
						<div class="widget-body no-padding">
							<div id="chartdiv" style="width: 100%; height: 340px; background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);"></div>
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
	
@endsection

@section('javascript')

<!-- Resources -->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<script>
	am4core.ready(function() {

		// Themes begin
		am4core.useTheme(am4themes_animated);
		// Themes end

		// Create chart instance
		var chart = am4core.create("chartdiv", am4charts.XYChart);
		chart.paddingRight = 20;

		// Add data
		chart.data = [ 
			<?php 
				$kunjungan = $kunjungan;
				foreach($kunjungan as $kunjungan) {
			?>
					{
					  "year": "<?php echo date('d-m-Y',strtotime($kunjungan->hari)) ?>",
					  "value": <?php echo $kunjungan->total; ?>
					}, 
			<?php } ?>
		];

		// Create axes
		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "year";
		categoryAxis.renderer.minGridDistance = 50;
		categoryAxis.renderer.grid.template.location = 0.5;
		categoryAxis.startLocation = 0.5;
		categoryAxis.endLocation = 0.5;

		// Pre zoom
		chart.events.on("datavalidated", function() {
			categoryAxis.zoomToIndexes(Math.round(chart.data.length * 0.4), Math.round(chart.data.length * 0.55));
		});

		// Create value axis
		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.baseValue = 0;

		// Create series
		var series = chart.series.push(new am4charts.LineSeries());
		series.dataFields.valueY = "value";
		series.dataFields.categoryX = "year";
		series.strokeWidth = 2;
		series.tensionX = 0.77;

		var range = valueAxis.createSeriesRange(series);
		range.value = 0;
		range.endValue = 1000;
		range.contents.stroke = am4core.color("#FF0000");
		range.contents.fill = range.contents.stroke;

		// Add scrollbar
		var scrollbarX = new am4charts.XYChartScrollbar();
		scrollbarX.series.push(series);
		chart.scrollbarX = scrollbarX;

		chart.cursor = new am4charts.XYCursor();

	});
</script>


@endsection