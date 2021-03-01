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

	<div class="jarviswidget" id="wid-id-5" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">

<header style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
	<h2 style="color:white; margin: -1px 0px 0px 10px;"><b>User Guide & Documentation</b></h2>
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
	<div class="row">
		<article class="col-sm-12">
			<div class="navbar navbar-default">
			<img style="float: left; margin: 10px 10px 0px 10px;" src="<?=base_url()?>seipkon/assets/img/userguide.png" height="40" width="40" />
			<span>
				<p align="justify; margin: 0px 0px 0px 2px;">
					<small style="color:black;font-size:12px;">
					Sistem Monitoring ini merupakan sistem yang berisi jaringan SPD (Sistem Pengolahan Data) yang dilengkapi dengan kanal-kanal komunikasi yang digunakan dalam sistem organisasi data. Elemen proses dari sistem ini bersifat mengumpulkan data, mengolah data, dan menyebar informasi. sistem ini telah terintegrasi dengan Sistem Manajemen Basis-Data (Data Base Management System / DBMS) yang memungkinkan user untuk membuat, memelihara, mengontrol, dan meng-akses basis data dengan cara praktis dan efisien.
					</small>
				</p>
			</span>
			</div>
		</article>
	</div>
	<div class="row">
		<article class="col-sm-12">	
		<div class="jarviswidget" id="wid-id-5" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
		
			<header style="background: linear-gradient(to bottom, #00c6ff, #0072ff);">
				<h2 style="color:white;font-size:14px; font-weight: bold;">Standard Jam & Waktu 
				</h2>
			</header>
			<div>
				<div class="widget-body">
					<div class="tabs-left">
					<ul class="nav nav-tabs tabs-left" id="demo-pill-nav">
						<?php 
							$style_default = 'style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);"';
							
							$style_active = 'style="background-image: linear-gradient( 176.4deg,  rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );"';
						?>
						<li class="active zoomsmall" <?php if(explode("/", $that->uri->uri_string())[0]=="tab-r1") { echo $style_active; } else { echo $style_default; } ?> style="color:white;">
						<a href="#tab-r1" data-toggle="tab">
							<img style="float: left; margin: 2px 5px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/roll.png" height="15" width="15" />
							<small style="color:black;font-size:14px; margin: 0px 0px 0px 0px;">Dashboard System
							</small>
						</a>
						</li>
						<li class="zoomsmall" <?php if(explode("/", $that->uri->uri_string())[0]=="") { echo $style_active; } else { echo $style_default; } ?>>
						<a href="#tab-r2" data-toggle="tab">
							<img style="float: left; margin: 2px 5px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/colorloc.png" height="15" width="15" />
							<small style="color:black;font-size:14px; margin: 0px 0px 0px 0px;">Client Dashboard
							</small>			
						</a>
						</li>
						
						<li class="zoomsmall" <?php if(explode("/", $that->uri->uri_string())[0]=="") { echo $style_active; } else { echo $style_default; } ?>>
						<a href="#tab-r13" data-toggle="tab">
							<img style="float: left; margin: 2px 5px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/helpdesk.png" height="15" width="15" />
							<small style="color:black;font-size:14px; margin: 0px 0px 0px 0px;"> Helpdesk System
							</small>			
						</a>
						</li>
						
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab-r1">
						
						<div class="row">
						
							<div class="col-lg-11" style="margin: 0px 0px 0px -20px;">
			
								<div class="row">
									<article class="col-lg-12" style="margin: 0px 0px 0px 0px;">
									<div class="jarviswidget" id="wid-id-7" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
									<header>
										<ul class="nav nav-tabs pull-left in">
											<li class="active">
												<a data-toggle="tab" href="#hr1"> <i class="fa fa-lg fa-arrow-circle-o-down"></i> <span class="hidden-mobile hidden-tablet"> Documentation</span> </a>
											</li>
											<li>
												<a data-toggle="tab" href="#hr2"> <i class="fa fa-lg fa-arrow-circle-o-up"></i> <span class="hidden-mobile hidden-tablet"> Top Tabs <span class="label bg-color-blue txt-color-white"> label <i class="fa fa-exclamation"></i> </span> </span> </a>
											</li>
					
										</ul>
									</header>
									<div>
										<div class="widget-body">
											<div class="tab-content">
												<div class="tab-pane active" id="hr1">
													<table class="table table-bordered table-condensed">
														<thead>
															<tr>
																<th style="background: linear-gradient(to bottom, #8e9eab, #eef2f3);color:black;">Screnshoot Picture</th>
																<th style="background: linear-gradient(to bottom, #8e9eab, #eef2f3);color:black;">Fitur/Fungsional</th>
															
															</tr>
														</thead>
														<tbody>
															<tr>
																<td style="background: linear-gradient(to bottom, #000000, #434343);width:560px;">
																<div class="widget_card_body">
																<div class="clock-place" style="margin: 10px 0px 0px 0px;"> </div>
																</div>
																<p id="clock_wib" style="margin: 10px 0px 0px 10px;"></p>	
																<p id="clock_wita" style="margin: 10px 0px 0px -60px;"></p>
																<p id="clock_wit" style="margin: 10px 0px 0px -60px;"></p>	
																</td>
																<td style="background: #ffffff">
														<div class="panel-group smart-accordion-default" id="accordion">
															<div class="panel panel-default">
																<div class="panel-heading" style="height:30px;background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
																	<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> <i class="fa fa-lg fa-angle-down pull-right"></i> <i class="fa fa-lg fa-angle-up pull-right"></i>
																	<p class="small" style="margin: -2px 0px 0px -5px;">
																	<small style="color:white;font-size:14px;  font-weight: bold;">Grid Information</small></p></a></h4>
																</div>
																<div id="collapseOne" class="panel-collapse collapse in">
																	<div class="panel-body no-padding">
																		<table class="table table-bordered table-condensed">
																			<thead>
																				<tr>
																					<th>Grid Name/Information</th>
																					<th>View</th>
																				</tr>
																			</thead>
																			<tbody>
																				<tr>
																					<td>Total Mesin ATM</td>
																					<td><img style="margin: -5px 0px 0px 0px;" src="<?=base_url()?>assets/img/clean.png" height="15" width="15" /></td>
																				</tr>
																				<tr>
																					<td>Total CSE Maintenance</td>
																					<td><img style="margin: -5px 0px 0px 0px;" src="<?=base_url()?>assets/img/clean.png" height="15" width="15" /></td>
																				</tr>
																				<tr>
																					<td>Total Clients/Bank</td>
																					<td><img style="margin: -5px 0px 0px 0px;" src="<?=base_url()?>assets/img/clean.png" height="15" width="15" /></td>
																				</tr>
																				<tr>
																					<td>Total Tickets Overall</td>
																					<td><img style="margin: -5px 0px 0px 0px;" src="<?=base_url()?>assets/img/clean.png" height="15" width="15" /></td>
																				</tr>
																				<tr>
																					<td>All Ticket Done</td>
																					<td><img style="margin: -5px 0px 0px 0px;" src="<?=base_url()?>assets/img/clean.png" height="15" width="15" /></td>
																				</tr>
																				<tr>
																					<td>All Ticket Open</td>
																					<td><img style="margin: -5px 0px 0px 0px;" src="<?=base_url()?>assets/img/clean.png" height="15" width="15" /></td>
																				</tr>
																				<tr>
																					<td>All Ticket Pending</td>
																					<td><img style="margin: -5px 0px 0px 0px;" src="<?=base_url()?>assets/img/clean.png" height="15" width="15" /></td>
																				</tr>
																				<tr>
																					<td>Total Tickets Today</td>
																					<td><img style="margin: -5px 0px 0px 0px;" src="<?=base_url()?>assets/img/clean.png" height="15" width="15" /></td>
																				</tr>
																				<tr>
																					<td>Tickets Open Today</td>
																					<td><img style="margin: -5px 0px 0px 0px;" src="<?=base_url()?>assets/img/clean.png" height="15" width="15" /></td>
																				</tr>
																				<tr>
																					<td>Tickets Done Today</td>
																					<td><img style="margin: -5px 0px 0px 0px;" src="<?=base_url()?>assets/img/clean.png" height="15" width="15" /></td>
																				</tr>
																				<tr>
																					<td>Tickets Pending Today</td>
																					<td><img style="margin: -5px 0px 0px 0px;" src="<?=base_url()?>assets/img/clean.png" height="15" width="15" /></td>
																				</tr>
																			</tbody>
																		</table>
																	</div>
																</div>
															</div>
															<div class="panel panel-default">
																<div class="panel-heading" style="height:30px;background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
																	<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed"> <i class="fa fa-lg fa-angle-down pull-right"></i> <i class="fa fa-lg fa-angle-up pull-right"></i><p class="small" style="margin: -2px 0px 0px -5px;">
																	<small style="color:white;font-size:14px;  font-weight: bold;">GraphBar Information</small></p></a></h4>
																</div>
																<div id="collapseTwo" class="panel-collapse collapse">
																	<div class="panel-body no-padding">
																		<table class="table table-bordered table-condensed">
																			<thead>
																				<tr>
																					<th>Graph Name/Information</th>
																					<th>View</th>
																				</tr>
																			</thead>
																			<tbody>
																				<tr>
																					<td>Total Tickets Overall</td>
																					<td><img style="margin: -5px 0px 0px 0px;" src="<?=base_url()?>assets/img/clean.png" height="15" width="15" /></td>
																				</tr>
																				<tr>
																				<tr>
																					<td>Tickets Open Today</td>
																					<td><img style="margin: -5px 0px 0px 0px;" src="<?=base_url()?>assets/img/clean.png" height="15" width="15" /></td>
																				</tr>
																				<tr>
																					<td>Tickets Done Today</td>
																					<td><img style="margin: -5px 0px 0px 0px;" src="<?=base_url()?>assets/img/clean.png" height="15" width="15" /></td>
																				</tr>
																				<tr>
																					<td>Tickets Pending Today</td>
																					<td><img style="margin: -5px 0px 0px 0px;" src="<?=base_url()?>assets/img/clean.png" height="15" width="15" /></td>
																				</tr>
																			</tbody>
																		</table>
																	</div>
																</div>
															</div>
															<div class="panel panel-default">
																<div class="panel-heading" style="height:30px;background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
																	<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed"> <i class="fa fa-lg fa-angle-down pull-right"></i> <i class="fa fa-lg fa-angle-up pull-right"></i><p class="small" style="margin: -2px 0px 0px -5px;">
																	<small style="color:white;font-size:14px;  font-weight: bold;">Round Radial Graph</small></p></a></h4>
																</div>
																<div id="collapseThree" class="panel-collapse collapse">
																	<div class="panel-body no-padding">
																		<table class="table table-bordered table-condensed">
																			<thead>
																				<tr>
																					<th>Graph Name/Information</th>
																					<th>View</th>
																				</tr>
																			</thead>
																			<tbody>
																				<tr>
																					<td>Total Tickets Overall</td>
																					<td><img style="margin: -5px 0px 0px 0px;" src="<?=base_url()?>assets/img/clean.png" height="15" width="15" /></td>
																				</tr>
																				<tr>
																				<tr>
																					<td>Tickets Open Today</td>
																					<td><img style="margin: -5px 0px 0px 0px;" src="<?=base_url()?>assets/img/clean.png" height="15" width="15" /></td>
																				</tr>
																				<tr>
																					<td>Tickets Done Today</td>
																					<td><img style="margin: -5px 0px 0px 0px;" src="<?=base_url()?>assets/img/clean.png" height="15" width="15" /></td>
																				</tr>
																				<tr>
																					<td>Tickets Pending Today</td>
																					<td><img style="margin: -5px 0px 0px 0px;" src="<?=base_url()?>assets/img/clean.png" height="15" width="15" /></td>
																				</tr>
																			</tbody>
																		</table>
																	</div>
																</div>
															
																</div>
															</div>
														</div>
								
									
							
																</td>
															</tr>
															
														</tbody>
														<tfoot>
															<tr>
																<th colspan="7" style="background: linear-gradient(to bottom, #8e9eab, #eef2f3);color:black;height:1px;"></th>
															</tr>
														</tfoot>
													</table>
													
													<div class="tabbable tabs-below" style="margin: -10px 0px 0px 0px;">
													
													<div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
														<header style="background: linear-gradient(to bottom, #8e9eab, #eef2f3);color:black;height:30px;">
															<h2 style="font-size:12px; font-weight: bold;"><p class="small" style="margin: 8px 0px 0px 0px;">
																	<small style="color:black;font-size:12px;  font-weight: bold;">Grid Information</small></p>
															</h2>
														</header>
														<div>
															<div class="widget-body no-padding">
															<b style="color:black;font-size:18px;">Interval Perbedaan Regional Waktu WIB,WITA,WIT</b><br>
									<small style="color:black;font-size:13px;">Standarisasi Waktu : (GMT+07:00,GMT+08:00,GMT+09:00)</small>
															</div>
														</div>
													</div>
													</div>
					
					
												</div>
												
												
												<div class="tab-pane" id="hr2">
					
													<div class="tabbable tabs-below">
													35466</div>
					
												</div>
											</div>
					
										</div>
					
									</div>
						
									</div>

										
									</article>									
								</div>
								
							</div>
							
			
						</div>
						
						</div>
						<div class="tab-pane" id="tab-r2">
							
							
						</div>
						<div class="tab-pane" id="tab-r3">
					
					
						</div>
					</div>
				</div>

				</div>
				
			</div>
		</div>
	</article>
	</div>	
	
	
	
</div>
<!-- end widget content -->

</div>
<!-- end widget div -->

</div>

@endsection

@section('javascript')


<script src="<?=base_url()?>seipkon/assets/js/jquery.clock-wib.js"></script>
<script src="<?=base_url()?>seipkon/assets/js/jClocksGMT.js"></script>
<script src="<?=base_url()?>seipkon/assets/js/jquery.rotate.js"></script>

<script>
	$(document).ready(function(){

		$('#clock_wib').jClocksGMT(
		{
			title: 'W I B', 
			offset: '+7',
			skin: 5 
		});

		$('#clock_wita').jClocksGMT(
		{
			title: 'W I T A', 
			offset: '+8',
			skin: 5 
		});

		$('#clock_wit').jClocksGMT(
		{
			title: 'W I T', 
			offset: '+9',
			skin: 5 
		});


	});
</script>

<script>
$(document).ready(function(){ 
$(".clock-place").CodehimClockWIB({
 });
}); 

</script>


@endsection