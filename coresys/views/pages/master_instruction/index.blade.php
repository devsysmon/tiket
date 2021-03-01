@extends('layouts.master')

@section('stylesheet')
@endsection

@section('breadcrumb')
@endsection

@section('content')
<!-- Widget ID (each widget will need unique ID)-->
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
				<h2 style="color:white;font-size:14px; font-weight: bold;">Documentation
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
						<!--<li class="zoomsmall" <?php if(explode("/", $that->uri->uri_string())[0]=="") { echo $style_active; } else { echo $style_default; } ?>>
						<a href="#tab-r3" data-toggle="tab">
							<img style="float: left; margin: 2px 5px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/atm2.png" height="15" width="15" />
							<small style="color:black;font-size:14px; margin: 0px 0px 0px 0px;">Monitoring ATM
							</small>			
						</a>
						</li>-->
						<li class="zoomsmall" <?php if(explode("/", $that->uri->uri_string())[0]=="") { echo $style_active; } else { echo $style_default; } ?>>
						<a href="#tab-r4" data-toggle="tab">
							<img style="float: left; margin: 2px 5px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/cube.png" height="15" width="15" />
							<small style="color:black;font-size:14px; margin: 0px 0px 0px 0px;">Data Master Client 
							</small>			
						</a>
						</li>
						<li class="zoomsmall" <?php if(explode("/", $that->uri->uri_string())[0]=="") { echo $style_active; } else { echo $style_default; } ?>>
						<a href="#tab-r5" data-toggle="tab">
							<img style="float: left; margin: 2px 5px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/userpro.png" height="15" width="15" />
							<small style="color:black;font-size:14px; margin: 0px 0px 0px 0px;"> Data Master Staff
							</small>			
						</a>
						</li>
						<li <?php if(explode("/", $that->uri->uri_string())[0]=="") { echo $style_active; } else { echo $style_default; } ?>>
						<a href="#tab-r6" data-toggle="tab">
							<img style="float: left; margin: 2px 5px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/folset.png" height="15" width="15" />
							<small style="color:black;font-size:14px; margin: 0px 0px 0px 0px;"> Master Inventory
							</small>				
						</a>
						</li>
						<li class="zoomsmall" <?php if(explode("/", $that->uri->uri_string())[0]=="") { echo $style_active; } else { echo $style_default; } ?>>
						<a href="#tab-r7" data-toggle="tab">
							<img style="float: left; margin: 2px 5px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/taskyellow.png" height="15" width="15" />
							<small style="color:black;font-size:14px; margin: 0px 0px 0px 0px;"> Work Schedulers
							</small>			
						</a>
						</li>
						<li class="zoomsmall" <?php if(explode("/", $that->uri->uri_string())[0]=="") { echo $style_active; } else { echo $style_default; } ?>>
						<a href="#tab-r8" data-toggle="tab">
							<img style="float: left; margin: 2px 5px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/new-ticket.png" height="15" width="15" />
							<small style="color:black;font-size:14px; margin: 0px 0px 0px 0px;"> Data Maintenance
							</small>			
						</a>
						</li>
						<li class="zoomsmall" <?php if(explode("/", $that->uri->uri_string())[0]=="") { echo $style_active; } else { echo $style_default; } ?>>
						<a href="#tab-r9" data-toggle="tab">
							<img style="float: left; margin: 2px 5px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/graphraw.png" height="15" width="15" />
							<small style="color:black;font-size:14px; margin: 0px 0px 0px 0px;"> Master Reports
							</small>			
						</a>
						</li>
						<li class="zoomsmall" <?php if(explode("/", $that->uri->uri_string())[0]=="") { echo $style_active; } else { echo $style_default; } ?>>
						<a href="#tab-r10" data-toggle="tab">
							<img style="float: left; margin: 2px 5px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/graphround.png" height="15" width="15" />
							<small style="color:black;font-size:14px; margin: 0px 0px 0px 0px;"> Statistic & Traffic
							</small>			
						</a>
						</li>
						<li class="zoomsmall" <?php if(explode("/", $that->uri->uri_string())[0]=="") { echo $style_active; } else { echo $style_default; } ?>>
						<a href="#tab-r11" data-toggle="tab">
							<img style="float: left; margin: 2px 5px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/colormix.png" height="15" width="15" />
							<small style="color:black;font-size:14px; margin: 0px 0px 0px 0px;"> Standarisasi Jam
							</small>			
						</a>
						</li>
						<li class="zoomsmall" <?php if(explode("/", $that->uri->uri_string())[0]=="") { echo $style_active; } else { echo $style_default; } ?>>
						<a href="#tab-r12" data-toggle="tab">
							<img style="float: left; margin: 2px 5px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/userguide.png" height="15" width="15" />
							<small style="color:black;font-size:14px; margin: 0px 0px 0px 0px;"> User Guide
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
																	<td style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);width:560px;"><img style="float: left; margin: 0px 0px 0px 0px;" src="<?=base_url()?>assets/img/slice/1.png" height="300" width="560" /></td>
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
<!-- end widget -->
@endsection			

@section('javascript')			
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

	// PAGE RELATED SCRIPTS

	function noAnswer() {

		$.smallBox({
			title : "Sure, as you wish sir...",
			content : "",
			color : "#A65858",
			iconSmall : "fa fa-times",
			timeout : 5000
		});

	};
	
	function closedthis() {
		$.smallBox({
			title : "Great! You just closed that last alert!",
			content : "This message will be gone in 5 seconds!",
			color : "#739E73",
			iconSmall : "fa fa-cloud",
			timeout : 5000
		});
	};		

	// pagefunction
	
	var pagefunction = function() {

		/*
		 * Autostart Carousel
		 */
		$('.carousel.slide').carousel({
			interval : 3000,
			cycle : true
		});
		$('.carousel.fade').carousel({
			interval : 3000,
			cycle : true
		});
		
		// Fill all progress bars with animation
		$('.progress-bar').progressbar({
			display_text : 'fill'
		});

		/*
		 * Smart Notifications
		 */
		$('#eg1').click(function(e) {
	
			$.bigBox({
				title : "Big Information box",
				content : "This message will dissapear in 6 seconds!",
				color : "#C46A69",
				//timeout: 6000,
				icon : "fa fa-warning shake animated",
				number : "1",
				timeout : 6000
			});
	
			e.preventDefault();
	
		})
	
		$('#eg2').click(function(e) {
	
			$.bigBox({
				title : "Big Information box",
				content : "Lorem ipsum dolor sit amet, test consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
				color : "#3276B1",
				//timeout: 8000,
				icon : "fa fa-bell swing animated",
				number : "2"
			});
	
			e.preventDefault();
		})
	
		$('#eg3').click(function(e) {
	
			$.bigBox({
				title : "Shield is up and running!",
				content : "Lorem ipsum dolor sit amet, test consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
				color : "#C79121",
				//timeout: 8000,
				icon : "fa fa-shield fadeInLeft animated",
				number : "3"
			});
	
			e.preventDefault();
	
		})
	
		$('#eg4').click(function(e) {
	
			$.bigBox({
				title : "Success Message Example",
				content : "Lorem ipsum dolor sit amet, test consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
				color : "#739E73",
				//timeout: 8000,
				icon : "fa fa-check",
				number : "4"
			}, function() {
				closedthis();
			});
	
			e.preventDefault();
	
		})
	
		$('#eg5').click(function() {
	
			$.smallBox({
				title : "Ding Dong!",
				content : "Someone's at the door...shall one get it sir? <p class='text-align-right'><a href='javascript:void(0);' class='btn btn-primary btn-sm'>Yes</a> <a href='javascript:void(0);'  onclick='noAnswer();' class='btn btn-danger btn-sm'>No</a></p>",
				color : "#296191",
				//timeout: 8000,
				icon : "fa fa-bell swing animated"
			});
	
		});
	
		$('#eg6').click(function() {
	
			$.smallBox({
				title : "Big Information box",
				content : "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
				color : "#5384AF",
				//timeout: 8000,
				icon : "fa fa-bell"
			});
	
		})
	
		$('#eg7').click(function() {
	
			$.smallBox({
				title : "James Simmons liked your comment",
				content : "<i class='fa fa-clock-o'></i> <i>2 seconds ago...</i>",
				color : "#296191",
				iconSmall : "fa fa-thumbs-up bounce animated",
				timeout : 4000
			});
	
		})
	
		/*
		* SmartAlerts
		*/
		
		// With Callback
		
		$("#smart-mod-eg1").click(function(e) {
			$.SmartMessageBox({
				title : "Smart Alert!",
				content : "This is a confirmation box. Can be programmed for button callback",
				buttons : '[No][Yes]'
			}, function(ButtonPressed) {
				if (ButtonPressed === "Yes") {
	
					$.smallBox({
						title : "Callback function",
						content : "<i class='fa fa-clock-o'></i> <i>You pressed Yes...</i>",
						color : "#659265",
						iconSmall : "fa fa-check fa-2x fadeInRight animated",
						timeout : 4000
					});
				}
				if (ButtonPressed === "No") {
					$.smallBox({
						title : "Callback function",
						content : "<i class='fa fa-clock-o'></i> <i>You pressed No...</i>",
						color : "#C46A69",
						iconSmall : "fa fa-times fa-2x fadeInRight animated",
						timeout : 4000
					});
				}
	
			});
			e.preventDefault();
		})
		
		// With Input
		$("#smart-mod-eg2").click(function(e) {
	
			$.SmartMessageBox({
				title : "Smart Alert: Input",
				content : "Please enter your user name",
				buttons : "[Accept]",
				input : "text",
				placeholder : "Enter your user name"
			}, function(ButtonPress, Value) {
				alert(ButtonPress + " " + Value);
			});
	
			e.preventDefault();
		})
		
		// With Buttons
		$("#smart-mod-eg3").click(function(e) {
	
			$.SmartMessageBox({
				title : "Smart Notification: Buttons",
				content : "Lots of buttons to go...",
				buttons : '[Need?][You][Do][Buttons][Many][How]'
			});
	
			e.preventDefault();
		})
		
		// With Select
		$("#smart-mod-eg4").click(function(e) {
	
			$.SmartMessageBox({
				title : "Smart Alert: Select",
				content : "You can even create a group of options.",
				buttons : "[Done]",
				input : "select",
				options : "[Costa Rica][United States][Autralia][Spain]"
			}, function(ButtonPress, Value) {
				alert(ButtonPress + " " + Value);
			});
	
			e.preventDefault();
		});
	
		// With Login
		$("#smart-mod-eg5").click(function(e) {
	
			$.SmartMessageBox({
				title : "Login form",
				content : "Please enter your user name",
				buttons : "[Cancel][Accept]",
				input : "text",
				placeholder : "Enter your user name"
			}, function(ButtonPress, Value) {
				if (ButtonPress == "Cancel") {
					alert("Why did you cancel that? :(");
					return 0;
				}
	
				Value1 = Value.toUpperCase();
				ValueOriginal = Value;
				$.SmartMessageBox({
					title : "Hey! <strong>" + Value1 + ",</strong>",
					content : "And now please provide your password:",
					buttons : "[Login]",
					input : "password",
					placeholder : "Password"
				}, function(ButtonPress, Value) {
					alert("Username: " + ValueOriginal + " and your password is: " + Value);
				});
			});
	
			e.preventDefault();
		});
		
	};
	
	// end pagefunction
	
	// load bootstrap-progress bar script and run pagefunction
	loadScript("<?=BASE_URL?>js/plugin/bootstrap-progressbar/bootstrap-progressbar.min.js", pagefunction);

</script>
@endsection