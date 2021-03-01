@extends('layouts.master')

@section('stylesheet')
@endsection

@section('breadcrumb')
@endsection

@section('content')

<div class="jarviswidget" id="wid-id-5" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">

<header style="background: linear-gradient(to bottom, #00c6ff, #0072ff);">
	<h2 style="color:white; margin: -1px 0px 0px 10px;"><b>List Calculation Tickets</b></h2>
</header>
<!-- widget div-->
	<div>
		<div class="widget-body">
			<div class="row">
				<article class="col-sm-12 col-md-12 col-lg-12">
					<div class="jarviswidget well" id="wid-id-3" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
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
									<span class="widget-icon"> <i class="fa fa-comments"></i> </span>
									<h2>Default Tabs with border </h2>
				
								</header>
								<div>
									<div class="widget-body no-padding">
				
										<ul id="myTab1" class="nav nav-tabs bordered">
											<li class="active" style="background: linear-gradient(to bottom, #ff512f, #f09819);">
												<a href="#s1" data-toggle="tab">
													<img style="float: left; margin: 0px 5px 0px -5px;" src="<?=base_url()?>assets/img/new-ticket.png" height="20" width="20" />
													<small style="color:light;font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Tickets Overall</small>
												</a>
											</li>
											<li style="background: linear-gradient(to top, #add100, #7b920a);">
												<a href="#s2" data-toggle="tab">
													<img style="float: left; margin: 0px 5px 0px -5px;" src="<?=base_url()?>assets/img/new-ticket.png" height="20" width="20" />
													<small style="color:light;font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Tickets Done</small>
												</a>
											</li>
											<li style="background: linear-gradient(to bottom, #e52d27, #b31217);">
												<a href="#s3" data-toggle="tab">
													<img style="float: left; margin: 0px 5px 0px -5px;" src="<?=base_url()?>assets/img/new-ticket.png" height="20" width="20" />
													<small style="color:light;font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Tickets Pending</small>
												</a>
											</li>
											<li style="background: linear-gradient(to bottom, #9d50bb, #6e48aa);">
												<a href="#s4" data-toggle="tab">
													<img style="float: left; margin: 0px 5px 0px -5px;" src="<?=base_url()?>assets/img/new-ticket.png" height="20" width="20" />
													<small style="color:light;font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Tickets Open Today</small>
												</a>
											</li>
											<li style="background: linear-gradient(to bottom, #1d976c, #3bff84);">
												<a href="#s5" data-toggle="tab">
													<img style="float: left; margin: 0px 5px 0px -5px;" src="<?=base_url()?>assets/img/new-ticket.png" height="20" width="20" />
													<small style="color:light;font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Tickets Done Today</small>
												</a>
											</li>
											<li style="background: linear-gradient(to bottom, #e52d27, #b31217);">
												<a href="#s6" data-toggle="tab">
													<img style="float: left; margin: 0px 5px 0px -5px;" src="<?=base_url()?>assets/img/new-ticket.png" height="20" width="20" />
													<small style="color:light;font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Tickets Pending Today</small>
												</a>
											</li>
											
										</ul>
				
										<div id="myTabContent1" class="tab-content no-padding">
											<div class="tab-pane fade in active" id="s1">
												<p class="" style="background: linear-gradient(to bottom, #ff512f, #f09819);height:10px; margin: 0px 0px 0px 0px;">
												</p>
												<table class="table table-bordered table-condensed">
													<thead>
														<tr>
															<th style="background: linear-gradient(to bottom, #8e9eab, #eef2f3);color:black;">Screnshoot Picture</th>
															<th style="background: linear-gradient(to bottom, #8e9eab, #eef2f3);color:black;">Fitur/Fungsional</th>
														
														</tr>
													</thead>
													<tbody>
														<tr>
															<td style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);width:560px;">
															
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
													
							
								
						
															</td>
														</tr>
														
													</tbody>
													<tfoot>
														<tr>
															<th colspan="7" style="background: linear-gradient(to bottom, #8e9eab, #eef2f3);color:black;height:1px;"></th>
														</tr>
													</tfoot>
												</table>
												
											</div>
											<div class="tab-pane fade" id="s2">
												<p class="" style="background: linear-gradient(to top, #add100, #7b920a);height:10px; margin: 0px 0px 0px 0px;">
												</p>
												<p>
													Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee.
												</p>
											</div>
											<div class="tab-pane fade" id="s3">
												<p class="" style="background: linear-gradient(to bottom, #e52d27, #b31217);height:10px; margin: 0px 0px 0px 0px;">
												</p>
												<p>
													Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
												</p>
											</div>
											<div class="tab-pane fade" id="s4">
												<p class="" style="background: linear-gradient(to bottom, #9d50bb, #6e48aa);height:10px; margin: 0px 0px 0px 0px;">
												</p>
												<p>
													Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table.
												</p>
											</div>
											<div class="tab-pane fade" id="s5">
												<p class="" style="background: linear-gradient(to bottom, #1d976c, #3bff84);height:10px; margin: 0px 0px 0px 0px;">
												</p>
												<p>
													Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table.
												</p>
											</div>
											<div class="tab-pane fade" id="s6">
												<p class="" style="background: linear-gradient(to bottom, #e52d27, #b31217);height:10px; margin: 0px 0px 0px 0px;">
												</p>
												<p>
													Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table.
												</p>
											</div>
											
										</div>
				
									</div>
									<!-- end widget content -->
				
								</div>
								<!-- end widget div -->
				
							</div>
							
				
				</article>
			</div>
		</div>
	</div>
	<!-- end widget div -->

</div>

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