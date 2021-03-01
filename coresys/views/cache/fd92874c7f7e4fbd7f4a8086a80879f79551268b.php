<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title>INSAN</title>
		<meta name="description" content="">
		<meta name="author" content="">
			
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_URL?>css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_URL?>css/font-awesome.min.css">

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_URL?>css/smartadmin-production-plugins.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_URL?>css/smartadmin-production.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_URL?>css/smartadmin-skins.min.css">
		
		<link rel="stylesheet" href="<?php echo base_url();?>seipkon/assets/fullcalendar/dist/fullcalendar.css">
		<link rel="stylesheet" href="<?php echo base_url();?>seipkon/assets/fullcalendar/dist/scheduler.min.css">

		<!-- SmartAdmin RTL Support  -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_URL?>css/smartadmin-rtl.min.css">

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_URL?>css/your_style.css"> -->

		<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_URL?>css/demo.min.css">
		
		<link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>seipkon/assets/jqueryconfirm/dist/jquery-confirm.min.css">
		<link href="<?=base_url()?>seipkon/assets/select2/dist/css/select2.min.css" rel="stylesheet">
		<link href="<?=base_url()?>seipkon/assets/datepicker/datepicker.min.css" rel="stylesheet">

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="<?=BASE_URL?>img/favicon/favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?=BASE_URL?>img/favicon/favicon.ico" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

		<!-- Specifying a Webpage Icon for Web Clip 
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="<?=BASE_URL?>img/splash/sptouch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?=BASE_URL?>img/splash/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?=BASE_URL?>img/splash/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?=BASE_URL?>img/splash/touch-icon-ipad-retina.png">
		
		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		
		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="<?=BASE_URL?>img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="<?=BASE_URL?>img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="<?=BASE_URL?>img/splash/iphone.png" media="screen and (max-device-width: 320px)">
		
		<?php echo $__env->yieldContent('stylesheet'); ?>

		<style>
			.select2-container--open .select2-dropdown {
				z-index: 99999999 !important;
			}
			
			.dataTables_paginate #datatable_previous {
				width: 60px !important;
			}
			
			.dataTables_paginate #datatable_next {
				width: 60px !important;
			}

			.select2-container .select2-selection--single {
				height: 38px;
			}

			.select2-container--default .select2-selection--single .select2-selection__arrow b {
				border-color: #888 transparent transparent transparent;
				border-style: solid;
				border-width: 5px 4px 0 4px;
				height: 0;
				left: 50%;
				margin-left: -4px;
				margin-top: 2px;
				position: absolute;
				top: 50%;
				width: 0;
			}

			.select2-container--default .select2-selection--multiple .select2-selection__choice {
				color: black;
			}

			.select2-container--default .select2-selection--single, .select2-selection .select2-selection--single, .select2-container--default.select2-container--focus .select2-selection--multiple, .select2-container--default .select2-selection--multiple {
				border: 1px solid #ced4da;
				border-radius: 0;
				padding: 5px;
				height: auto;
			}
		</style>
		<style>
			.zoom {
			  transition: transform 0.01s; /* Animation */
			}
			.zoom:hover {
			  transform: scale(1.0); 
			}
			.zoomsmall {
			  transition: transform 0.01s; /* Animation */
			}
			.zoomsmall:hover {
			  transform: scale(1.05); 
			  background:;
			}
			p.small {
			  line-height: 1.0;
			}
			p.big {
			  line-height: 1.5;
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
			}
				ul{
					list-style:none;
					margin: 0;
					padding: 0;
				}
				a, a:hover, a.active, a:active, a:visited, a:focus{
					color:#;
					text-decoration:none;
				}
				.exo-menu{
					width: 100%;
					float: left;
					list-style: none;
				}
				.exo-menu > li {	display: inline-block;float:left;}
				.exo-menu > li > a{
					color: #ccc;
					text-decoration: none;
					text-transform: uppercase;
					border-right: 1px #365670 dotted;
					-webkit-transition: color 0.2s linear, background 0.2s linear;
					-moz-transition: color 0.2s linear, background 0.2s linear;
					-o-transition: color 0.2s linear, background 0.2s linear;
					transition: color 0.2s linear, background 0.2s linear;
				}
				.exo-menu > li > a.active,
				.exo-menu > li > a:hover,
				li.drop-down ul > li > a:hover{
				background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
				z-index: 9999 !important;
				}
				.exo-menu i {
				  float: left;
				  font-size: 8px;
				  margin-right: 0px;
				  line-height: 10px !important;
				}
				li.drop-down,
				.flyout-right,
				.flyout-left{position:relative;}
				li.drop-down:before {
				  content: "";
				  color: #fff;
				  font-family: FontAwesome;
				  font-style: normal;
				  display: inline;
				  right: 6px;
				  top: 0px;
				  font-size: 14px;
				}
				li.drop-down>ul{
					left: 0px;
					min-width: 230px;

				}
				.drop-down-ul{display:none;}
				.flyout-right>ul,
				.flyout-left>ul{
				  top: 0;
				  min-width: 230px;
				  display: none;
				  border-left: 1px solid #ebebeb;
				  }

				li.drop-down>ul>li>a,
				.flyout-right ul>li>a ,
				.flyout-left ul>li>a {
					color: #000;
					display: block;
					padding: 12px 20px;
					text-decoration: none;
					background-color: #fff;
					border-bottom: 1px dotted #000;
					-webkit-transition: color 0.2s linear, background 0.2s linear;
					-moz-transition: color 0.2s linear, background 0.2s linear;
					-o-transition: color 0.2s linear, background 0.2s linear;
					transition: color 0.2s linear, background 0.2s linear;
				}
				.flyout-right ul>li>a ,
				.flyout-left ul>li>a {
					border-bottom: 1px dotted #000;
				}

				/*Blog DropDown*/
				.Blog{
					left:0;
					display:none;
					color:#fefefe;
					padding-top:0px;
					background:#547787;
					padding-bottom:15px;
				}
				.Blog .blog-title{
					color:#fff;
					font-size:15px;
					text-transform:uppercase;

				}
				.Blog .blog-des{
					color:#ccc;
					font-size:90%;
					margin-top:0px;
				}
				.Blog a.view-more{
					margin-top:0px;
				}
				/*Images*/
				.Images{
					left:0;
				   width:100%;
					 display:none;
					color:#fefefe;
					padding-top:0px;
					background:#547787;
					padding-bottom:15px;
				}
				.Images h4 {
				  font-size: 15px;
				  margin-top: 0px;
				  text-transform: uppercase;
				}
				/*common*/
				.flyout-right ul>li>a ,
				.flyout-left ul>li>a,
				.flyout-mega-wrap,
				.mega-menu{
					background-color: #fff;
				}

				/*hover*/
				.Blog:hover,
				.Images:hover,
				.mega-menu:hover,
				.drop-down-ul:hover,
				li.flyout-left>ul:hover,
				li.flyout-right>ul:hover,
				.flyout-mega-wrap:hover,
				li.flyout-left a:hover +ul,
				li.flyout-right a:hover +ul,
				.blog-drop-down >a:hover+.Blog,
				li.drop-down>a:hover +.drop-down-ul,
				.images-drop-down>a:hover +.Images,
				.mega-drop-down a:hover+.mega-menu,
				li.flyout-mega>a:hover +.flyout-mega-wrap{
					display:block;
				}
				/*responsive*/
				 @media (min-width:767px){
					.exo-menu > li > a{
					display:block;
					padding: 10px 22px;
				 }
				.mega-menu, .flyout-mega-wrap, .Images, .Blog,.flyout-right>ul,
				.flyout-left>ul, li.drop-down>ul{
						position:absolute;
				}
				 .flyout-right>ul{
					left: 100%;
					}
					.flyout-left>ul{
					right: 100%;
				}
				 }
				@media (max-width:767px){

					.exo-menu {
						min-height: 58px;
						background-color: #23364B;
						width: 100%;
					}
					
					.exo-menu > li > a{
						width:100% ;
						display:none ;
					
					}
					.exo-menu > li{
						width:100%;
					}
					.display.exo-menu > li > a{
					  display:block ;
						padding: 20px 22px;
					}
					
				.mega-menu, .Images, .Blog,.flyout-right>ul,
				.flyout-left>ul, li.drop-down>ul{
						position:relative;
				}

				}
				a.toggle-menu{
					right: 0px;
					font-size: 27px;
					background-color: #ccc;
					color: #23364B;
					top: 0px;
				}
			</style>
	</head>
	
	<!--

	TABLE OF CONTENTS.
	
	Use search to find needed section.
	
	===================================================================
	
	|  01. #CSS Links                |  all CSS links and file paths  |
	|  02. #FAVICONS                 |  Favicon links and file paths  |
	|  03. #GOOGLE FONT              |  Google font link              |
	|  04. #APP SCREEN / ICONS       |  app icons, screen backdrops   |
	|  05. #BODY                     |  body tag                      |
	|  06. #HEADER                   |  header tag                    |
	|  07. #PROJECTS                 |  project lists                 |
	|  08. #TOGGLE LAYOUT BUTTONS    |  layout buttons and actions    |
	|  09. #MOBILE                   |  mobile view dropdown          |
	|  10. #SEARCH                   |  search field                  |
	|  11. #NAVIGATION               |  left panel & navigation       |
	|  12. #RIGHT PANEL              |  right panel userlist          |
	|  13. #MAIN PANEL               |  main panel                    |
	|  14. #MAIN CONTENT             |  content holder                |
	|  15. #PAGE FOOTER              |  page footer                   |
	|  16. #SHORTCUT AREA            |  dropdown shortcuts area       |
	|  17. #PLUGINS                  |  all scripts and plugins       |
	
	===================================================================
	
	-->
	
	<!-- #BODY -->
	<!-- Possible Classes

		* 'smart-style-{SKIN#}'
		* 'smart-rtl'         - Switch theme mode to RTL
		* 'menu-on-top'       - Switch to top navigation (no DOM change required)
		* 'no-menu'			  - Hides the menu completely
		* 'hidden-menu'       - Hides the main menu but still accessable by hovering over left edge
		* 'fixed-header'      - Fixes the header
		* 'fixed-navigation'  - Fixes the main menu
		* 'fixed-ribbon'      - Fixes breadcrumb
		* 'fixed-page-footer' - Fixes footer
		* 'container'         - boxed layout mode (non-responsive: will not work with fixed-navigation & fixed-ribbon)
	-->
	<body class="fixed-header fixed-navigation fixed-page-footer">

		<!-- HEADER -->
		<header id="header">
			<div id="logo-group" style="#f3f3f3">
				<!-- PLACE YOUR LOGO HERE -->
				<span id="logo" style="margin: 8px 0px 0px 10px;"> <img src="<?=BASE_URL?>img/logo-white.png" alt="PROTOTYPE"> </span>
				<!-- END LOGO PLACEHOLDER -->
				<!--<span id="activity" class="activity-dropdown"> <i class="fa fa-user"></i> <b class="badge"> 21 </b> </span>-->
				<!--<div class="ajax-dropdown">

					
					<div class="btn-group btn-group-justified" data-toggle="buttons">
						<label class="btn btn-default">
							<input type="radio" name="activity" id="ajax/notify/mail.html">
							Msgs (14) </label>
						<label class="btn btn-default">
							<input type="radio" name="activity" id="ajax/notify/notifications.html">
							notify (3) </label>
						<label class="btn btn-default">
							<input type="radio" name="activity" id="ajax/notify/tasks.html">
							Tasks (4) </label>
					</div>

					<div class="ajax-notifications custom-scroll">

						<div class="alert alert-transparent">
							<h4>Click a button to show messages here</h4>
							This blank page message helps protect your privacy, or you can show the first message here automatically.
						</div>

						<i class="fa fa-lock fa-4x fa-border"></i>

					</div>
					
					<span> Last updated on: 12/12/2013 9:43AM
						<button type="button" data-loading-text="<i class='fa fa-refresh fa-spin'></i> Loading..." class="btn btn-xs btn-default pull-right">
							<i class="fa fa-refresh"></i>
						</button> </span>
				

				</div>-->

				<!-- END AJAX-DROPDOWN -->
			</div>

	<div class="content" style="margin: 0px 0px 0px 0px;">
	<hanzmobview>	
		<ul class="exo-menu">
			<li class="drop-down"><a href="#">
			<p class="small zoomsmall" align="justify" style="color:black;font-size:10px; margin: 0px 0px 0px 0px;"><img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/taskyellow.png" height="30" width="30"/>
			<b style="letter-spacing: -1px; color:black;font-size:16px; margin: 0px 0px 0px 0px;">
			Work Schedule</b><br>
			<small style="color:black;font-size:10px; margin: 0px 0px 0px 0px;">Job & Workschedule</small></p>
			</a>
				<ul class="drop-down-ul animated fadeIn">
					<li class="flyout-right"><a href="<?=base_url()?>trans_schedule.ins">
					<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/kworldclock.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Job & Work Schedule</span></div>
					</a>
					</li>
					<li class="flyout-right"><a href="<?=base_url()?>trans_staff.ins">
					<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/kdmconfig.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Switch Schedule</span></div>
					</a>
					</li>
					<li class="flyout-right"><a href="<?=base_url()?>master_item.ins">
					<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/newjob.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">List Job Item</span></div>
					</a>
					</li>
				</ul>	
			
			</li>
			<li class="drop-down"><a href="#">
			<p class="small zoomsmall" align="justify" style="color:black;font-size:10px; margin: 0px 0px 0px 0px; "><img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/kworldclock.png" height="30" width="30"/>
			<b style="letter-spacing: -1px; color:black;font-size:16px; margin: 0px 0px 0px 0px;">
			Core Master Data</b><br>
			<small style="color:black;font-size:10px; margin: 0px 0px 0px 0px;">Master Data System</small></p>
			</a>
				<ul class="drop-down-ul animated fadeIn">
					<li class="flyout-right"><a href="#">
					<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/adddata.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Master Data Client</span></div>
					</a>
						<ul class="animated">  						
							<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
							<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/flipblue.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Client Dashboard</span></div>
							</a>
							</li>
							<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
							<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/blackbook.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Client & Customer</span></div>
							</a>
							</li>
							<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
							<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/atm.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Data Mesin ATM</span></div>
							</a>
							</li>
							<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
							<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/loc.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Area & Location</span></div>
							</a>
							</li>
						</ul>
					</li>
					
					<li class="flyout-right"><a href="#">
					<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/adddata.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Master Data Staff</span></div>
					</a>
						<ul class="animated">  
							<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
							<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/userpro.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Petugas/Staff</span></div>
							</a>
							</li>
							<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
							<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/timecal.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Attendance</span></div>
							</a>
							</li>
							<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
							<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/lock.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">User Access</span></div>
							</a>
							</li>
							<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
							<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/timeroll2.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Setting GeoLocation</span></div>
							</a>
							</li>
						</ul>
					</li>
					
					<li class="flyout-right"><a href="#">
					<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/adddata.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Master Inventory</span></div>
					</a>
						<ul class="animated">  
							<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
							<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/inventory3.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Inventory Stock</span></div>
							</a>
							</li>
							<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
							<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/incoming.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Transaction In</span></div>
							</a>
							</li>
							<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
							<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/outgoing.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Transaction Out</span></div>
							</a>
							</li>
						</ul>
					</li>
					
					<li class="flyout-right"><a href="#">
					<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/adddata.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Master WorkSchedule</span></div>
					</a>
						<ul class="animated">
							<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
							<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/timecal.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Work Schedule</span></div>
							</a>
							</li>
							<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
							<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/kdmconfig.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Switch Schedule</span></div>
							</a>
							</li>
							<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
							<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/newjob.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">List Job Item</span></div>
							</a>
							</li>
							<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
							<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/send.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">News Broadcast</span></div>
							</a>
							</li>
						</ul>
					</li>					
				</ul>	
			</li>					
			<li class="drop-down"><a href="#">
			<p class="small zoomsmall" align="justify" style="color:black;font-size:10px; margin: 0px 0px 0px 0px;"><img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/graphraw.png" height="30" width="30"/>
			<b style="letter-spacing: -1px; color:black;font-size:16px; margin: 0px 0px 0px 0px;">
			Reports Management</b><br>
			<small style="color:black;font-size:10px; margin: 0px 0px 0px 0px;">Reports Management System</small></p>
			</a>
				<ul class="drop-down-ul animated fadeIn">
					<li class="flyout-right"><a href="<?=base_url()?>report_maintenance" >
					<div class="zoomsmall"><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/filewhite.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Maintenance Reports</span></div>
					</a>
					</li>
					<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
					<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/crosscolor.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 6px;">Jobcard Reports</span></div>
					</a>
					</li>
				</ul>	
			</li>
		
		</ul>
	</hanzmobview>
	</div>
			
			<!-- pulled right: nav area -->
			<div class="pull-right">
				
				<!-- collapse menu button -->
				<div id="hide-menu" class="btn-header pull-right">
					<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
				</div>
				<!-- end collapse menu -->
				
				<!-- #MOBILE -->
				<!-- Top menu profile link : this shows only when top menu is active -->
				<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
					<li class="">
						<a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 
							<img src="<?=BASE_URL?>img/avatars/sunny.png" alt="John Doe" class="online" />  
						</a>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"><i class="fa fa-cog"></i> Setting</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="profile.html" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>rofile</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> <u>S</u>hortcut</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="login.html" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>
							</li>
						</ul>
					</li>
				</ul>

				<!-- logout button -->
				<div id="logout" class="btn-header transparent pull-right">
					<span> <a href="login.html" title="Sign Out" data-action="userLogout" data-logout-msg="You can improve your security further after logging out by closing this opened browser"><i class="fa fa-sign-out"></i></a> </span>
				</div>
				<!-- end logout button -->

				<!-- search mobile button (this is hidden till mobile view port) -->
				<div id="search-mobile" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0)" title="Search"><i class="fa fa-search"></i></a> </span>
				</div>
				<!-- end search mobile button -->

				<!-- input: search field -->
				<form action="search.html" class="header-search pull-right">
					<input id="search-fld"  type="text" name="param" placeholder="Find reports and more" data-autocomplete='[
					"ActionScript",
					"AppleScript",
					"Asp",
					"BASIC",
					"C",
					"C++",
					"Clojure",
					"COBOL",
					"ColdFusion",
					"Erlang",
					"Fortran",
					"Groovy",
					"Haskell",
					"Java",
					"JavaScript",
					"Lisp",
					"Perl",
					"PHP",
					"Python",
					"Ruby",
					"Scala",
					"Scheme"]'>
					<button type="submit">
						<i class="fa fa-search"></i>
					</button>
					<a href="javascript:void(0);" id="cancel-search-js" title="Cancel Search"><i class="fa fa-times"></i></a>
				</form>
				<!-- end input: search field -->

				<!-- fullscreen button -->
				<div id="fullscreen" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
				</div>
				<!-- end fullscreen button -->
				
				<!-- #Voice Command: Start Speech -->
				<div id="speech-btn" class="btn-header transparent pull-right hidden-sm hidden-xs">
					<div> 
						<a href="javascript:void(0)" title="Voice Command" data-action="voiceCommand"><i class="fa fa-microphone"></i></a> 
						<div class="popover bottom"><div class="arrow"></div>
							<div class="popover-content">
								<h4 class="vc-title">Voice command activated <br><small>Please speak clearly into the mic</small></h4>
								<h4 class="vc-title-error text-center">
									<i class="fa fa-microphone-slash"></i> Voice command failed
									<br><small class="txt-color-red">Must <strong>"Allow"</strong> Microphone</small>
									<br><small class="txt-color-red">Must have <strong>Internet Connection</strong></small>
								</h4>
								<a href="javascript:void(0);" class="btn btn-success" onclick="commands.help()">See Commands</a> 
								<a href="javascript:void(0);" class="btn bg-color-purple txt-color-white" onclick="$('#speech-btn .popover').fadeOut(50);">Close Popup</a> 
							</div>
						</div>
					</div>
				</div>
				<!-- end voice command -->
	
			</div>
			<!-- end pulled right: nav area -->

		</header>
		<!-- END HEADER -->

		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<aside id="left-panel" style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%);">

			<!-- User info -->
			<div class="login-info" style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%);">
			<!--<span>
					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
						<img src="<?=BASE_URL?>img/avatars/sunny.png" alt="me" class="online" /> 
						<span>
							john.doe 
						</span>
						<i class="fa fa-angle-down"></i>
					</a> 
					
				</span>-->
			</div>
			<!-- end user info -->

			<nav>
				<ul>
					<?php
						function active($that, $currect_page){
							$url_array = explode("/", $that->router->fetch_class());
							$url = end($url_array);  
							if($currect_page == $url){
								echo "class='active'";
							} 
							if(is_array($currect_page)) {
								if(in_array($url, $currect_page)){
									echo "class='active'";
								}
							}
						}
					?>
					<li <?=active($that, 'dashboard')?> style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%);">
						<a href="<?=base_url()?>dashboard.ins" title="" class="menu-item-parent zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/roll.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Dashboard System</small><br>
							<small style="color:white;font-size:10px;">Administrator Dashboard</small>
						</p>
						</span>
						</a>
					</li>
					<li <?=active($that, 'dashboard_merchant')?> style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%);">
						<a href="<?=base_url()?>dashboard_merchant.ins" title="" class="menu-item-parent zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/colorloc.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Client Dashboard</small><br>
							<small style="color:white;font-size:10px;">Client Dashboard Monitoring</small>
						</p>
						</span>
						</a>
					</li>
					<li <?=active($that, 'monitor_atm')?> style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%);">
						<a href="<?=base_url()?>monitor_atm.ins" title="" class="menu-item-parent zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/atm2.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Monitoring ATM</small><br>
							<small style="color:white;font-size:10px;">Monitoring Status & Device</small>
						</p>
						</span>
						</a>
					</li>		
					<li <?=active($that, array('dashboard_merchant_internal', 'master_client', 'master_atm', 'master_location', 'master_location_detail', 'master_require_part'))?> style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%)">
						<a href="#" class="zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/cube.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Data Master Client</small><br>
							<small style="color:white;font-size:10px;">Client, Mesin ATM & Area</small>
						</p>
						</span>
						</a>		
						<ul>
							<li <?=active($that, 'dashboard_merchant_internal')?>>
								<a href="<?=base_url()?>dashboard_merchant_internal.ins" class="zoomsmall">Client Dashboard</a>
							</li>
							<li <?=active($that, 'master_client')?>>
								<a href="<?=base_url()?>master_client.ins" class="zoomsmall">Client & Customer</a>
							</li>
							<li <?=active($that, 'master_atm')?>>
								<a href="<?=base_url()?>master_atm.ins" class="zoomsmall">Data Mesin ATM</a>
							</li>
							<li <?=active($that, array('master_location', 'master_location_detail', 'master_require_part'))?>>
								<a href="<?=base_url()?>master_location.ins" class="zoomsmall">Area & Location</a>
							</li>
						</ul>
					</li>
					<li <?=active($that, array('master_staff', 'master_attendance', 'master_user', 'master_absen_location'))?> style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%)">
						<a href="#" class="zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/userpro.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Data Master Staff</small><br>
							<small style="color:white;font-size:10px;">User, Staff & Petugas</small>
						</p>
						</span>
						</a>
						<ul>
							<li <?=active($that, 'master_staff')?>>
								<a href="<?=base_url()?>master_staff.ins" class="zoomsmall">Petugas / Staff</a>
							</li>
							<li <?=active($that, 'master_attendance')?>>
								<a href="<?=base_url()?>master_attendance.ins" class="zoomsmall">Attendance</a>
							</li>
							<li <?=active($that, 'master_user')?>>
								<a href="<?=base_url()?>master_user.ins" class="zoomsmall">User Access</a>
							</li>
							<li <?=active($that, 'master_absen_location')?>>
								<a href="<?=base_url()?>master_absen_location.ins" class="zoomsmall">Setting Geolocation</a>
							</li>
						</ul>
					</li>
					<li <?=active($that, array('master_inventory', 'transaction_in', 'transaction_out'))?> style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%)">
						<a href="#" class="zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/folset.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Master Inventory</small><br>
							<small style="color:white;font-size:10px;">Inventory & Logistics</small>
						</p>
						</span>
						</a>
						<ul>
							<li <?=active($that, 'master_inventory')?>>
								<a href="<?=base_url()?>master_inventory.ins" class="zoomsmall">Inventory Stock</a>
							</li>
							<li <?=active($that, 'transaction_in')?>>
								<a href="<?=base_url()?>transaction_in.ins" class="zoomsmall">Transaction In</a>
							</li>
							<li <?=active($that, 'transaction_out')?>>
								<a href="<?=base_url()?>transaction_out.ins" class="zoomsmall">Transaction Out</a>
							</li>
						</ul>
					</li>
					<li <?=active($that, array('trans_schedule', 'trans_staff', 'master_item', 'master_news'))?> style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%)">
						<a href="#" class="zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/taskyellow.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Work Schedulers</small><br>
							<small style="color:white;font-size:10px;">Job & Work Schedulers</small>
						</p>
						</span>
						</a>
						<ul>
							<li <?=active($that, 'trans_schedule')?>>
								<a href="<?=base_url()?>trans_schedule.ins" class="zoomsmall">Work Schedule</a>
							</li>
							<li <?=active($that, 'trans_staff')?>>
								<a href="<?=base_url()?>trans_staff.ins" class="zoomsmall">Switch Schedule</a>
							</li>
							<li <?=active($that, 'master_item')?>>
								<a href="<?=base_url()?>master_item.ins" class="zoomsmall">List Job Item</a>
							</li>
							<li <?=active($that, 'master_news')?>>
								<a href="<?=base_url()?>master_news.ins" class="zoomsmall">News Broadcast</a>
							</li>
						</ul>
					</li>		
					<li <?=active($that, array('new_ticket', 'status_ticket', 'master_jobcard', 'trouble_category', 'trouble_sub_category'))?> style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%)">
						<a href="#" class="zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/new-ticket.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Data Maintenance</small><br>
							<small style="color:white;font-size:10px;">Technical & Maintenance  </small>
						</p>
						</span>
						</a>						
						<ul>
							<li <?=active($that, 'new_ticket')?>>
								<a href="<?=base_url()?>new_ticket.ins" class="zoomsmall">New Issue Tickets</a>
							</li>
							<li <?=active($that, 'status_ticket')?>>
								<a href="<?=base_url()?>status_ticket.ins" class="zoomsmall">Status Tickets</a>
							</li>
							<li <?=active($that, 'master_jobcard')?>>
								<a href="<?=base_url()?>master_jobcard.ins" class="zoomsmall">Data Jobcard</a>
							</li>
							<li <?=active($that, 'trouble_category')?>>
								<a href="<?=base_url()?>trouble_category.ins" class="zoomsmall">Trouble Category</a>
							</li>
							<li <?=active($that, 'trouble_sub_category')?>>
								<a href="<?=base_url()?>trouble_sub_category.ins" class="zoomsmall">Sub Trouble Category</a>
							</li>
						</ul>
					</li>		
					<li <?=active($that, array('report_attendance', 'inventory_report', 'report_maintenance', 'jobcard_report'))?> style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%)">
						<a href="#" class="zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/graphraw.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Master Reports</small><br>
							<small style="color:white;font-size:10px;">Reports Management</small>
						</p>
						</span>
						</a>					
						<ul>
							<li <?=active($that, 'report_attendance')?>>
								<a href="<?=base_url()?>report_attendance.ins" class="zoomsmall">Attendance Report</a>
							</li>
							<li <?=active($that, 'inventory_report')?>>
								<a href="<?=base_url()?>inventory_report.ins" class="zoomsmall">Inventory Report</a>
							</li>
							<li <?=active($that, 'report_maintenance')?>>
								<a href="<?=base_url()?>report_maintenance.ins" class="zoomsmall">Technical Report</a>
							</li>
							<li <?=active($that, 'jobcard_report')?>>
								<a href="<?=base_url()?>jobcard_report.ins" class="zoomsmall">Jobcard Report</a>
							</li>
						</ul>
					</li>		
					<li style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%);">
						<a href="<?=base_url()?>master_registry.ins" title="" class="menu-item-parent zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/registry.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Master Registry</small><br>
							<small style="color:white;font-size:10px;">Registry & Bytecode System</small>
						</p>
						</span>
						</a>
					</li>
					<li style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%);">
						<a href="master_statistic.ins" title="" class="menu-item-parent zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/graphround.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Statistics & Traffic</small><br>
							<small style="color:white;font-size:10px;">Traffic & Analyzer System</small>
						</p>
						</span>
						</a>
					</li>	
					<li style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%);">
						<a href="master_stand_time.ins" title="" class="menu-item-parent zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/colormix.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Standarisasi Jam</small><br>
							<small style="color:white;font-size:10px;">Regional & Standar Waktu</small>
						</p>
						</span>
						</a>
					</li>
					<li style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%);">
						<a href="<?=base_url()?>master_instruction.ins" title="" class="menu-item-parent zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/userguide.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">User Guide</small><br>
							<small style="color:white;font-size:10px;">User Guide & Documentation</small>
						</p>
						</span>
						</a>
					</li>	
					<li style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%);">
						<a href="helpdesk.ins" title="" class="menu-item-parent zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/helpdesk.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Helpdesk System</small><br>
							<small style="color:white;font-size:10px;">Complain Management</small>
						</p>
						</span>
						</a>
					</li>		
					
				</ul>
			</nav>

		</aside>
		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon" style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%);">

				<span class="ribbon-button-alignment pull-right"> 
					<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
						<i class="fa fa-refresh"> Refresh & Sincronize Data</i>
					</span> 
				</span>

				<!-- breadcrumb -->
				<?php echo $__env->yieldContent('breadcrumb'); ?>
				<!-- end breadcrumb -->

				<!-- You can also add more buttons to the
				ribbon for further usability

				Example below:

				<span class="ribbon-button-alignment pull-right">
				<span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
				<span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
				<span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
				</span> -->

			</div>
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">

				<?php echo $__env->yieldContent('content'); ?>

			</div>
			<!-- END MAIN CONTENT -->

		</div>
		<!-- END MAIN PANEL -->

		<!-- PAGE FOOTER -->
		<div class="page-footer" style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%);">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<span class="txt-color-white"><?php echo "Copyright © " . (int)date('Y') . " - Prototype Monitoring System"; ?></span>
				</div>
			</div>
		</div>
		<!-- END PAGE FOOTER -->

		<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
		Note: These tiles are completely responsive,
		you can add as many as you like
		-->
		<div id="shortcut">
			<ul>
				<li>
					<a href="invoice.html" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-book fa-4x"></i> <span>All Runsheet <span class="label pull-right bg-color-darken">99</span></span> </span> </a>
				</li>
				<li>
					<a href="inbox.html" class="jarvismetro-tile big-cubes bg-color-orangeDark"> <span class="iconbox"> <i class="fa fa-envelope fa-4x"></i> <span>All Problem Ticket <span class="label pull-right bg-color-darken">14</span></span> </span> </a>
				</li>
				<li>
					<a href="gmap-xml.html" class="jarvismetro-tile big-cubes bg-color-purple"> <span class="iconbox"> <i class="fa fa-clock-o fa-4x"></i> <span>All Interval<span class="label pull-right bg-color-darken">14</span></span> </span> </a>
				</li>
				<li>
					<a href="gallery.html" class="jarvismetro-tile big-cubes bg-color-greenLight"> <span class="iconbox"> <i class="fa fa-picture-o fa-4x"></i> <span>Gallery </span> </span> </a>
				</li>
				<li>
					<a href="profile.html" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span>My Profile </span> </span> </a>
				</li>
			</ul>
		</div>
		<!-- END SHORTCUT AREA -->

		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)
		<script data-pace-options='{ "restartOnRequestAfter": true }' src="<?=BASE_URL?>js/plugin/pace/pace.min.js"></script>-->

		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<script src="<?=BASE_URL?>js/libs/jquery-2.1.1.min.js"></script>

		<script src="<?=BASE_URL?>js/libs/jquery-ui-1.10.3.min.js"></script>

		<!-- IMPORTANT: APP CONFIG -->
		<script src="<?=BASE_URL?>js/app.config.js"></script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
		<script src="<?=BASE_URL?>js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> 

		<!-- BOOTSTRAP JS -->
		<script src="<?=BASE_URL?>js/bootstrap/bootstrap.min.js"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="<?=BASE_URL?>js/notification/SmartNotification.min.js"></script>

		<!-- JARVIS WIDGETS -->
		<script src="<?=BASE_URL?>js/smartwidgets/jarvis.widget.min.js"></script>

		<!-- EASY PIE CHARTS -->
		<script src="<?=BASE_URL?>js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

		<!-- SPARKLINES -->
		<script src="<?=BASE_URL?>js/plugin/sparkline/jquery.sparkline.min.js"></script>

		<!-- JQUERY VALIDATE -->
		<script src="<?=BASE_URL?>js/plugin/jquery-validate/jquery.validate.min.js"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="<?=BASE_URL?>js/plugin/masked-input/jquery.maskedinput.min.js"></script>

		<!-- JQUERY SELECT2 INPUT 
		<script src="<?=BASE_URL?>js/plugin/select2/select2.min.js"></script>-->

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="<?=BASE_URL?>js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

		<!-- browser msie issue fix -->
		<script src="<?=BASE_URL?>js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

		<!-- FastClick: For mobile devices -->
		<script src="<?=BASE_URL?>js/plugin/fastclick/fastclick.min.js"></script>

		<!--[if IE 8]>

		<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		<!-- Demo purpose only 
		<script src="<?=BASE_URL?>js/demo.min.js"></script>-->

		<!-- MAIN APP JS FILE -->
		<script src="<?=BASE_URL?>js/app.min.js"></script>

		<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
		<!-- Voice command : plugin -->
		<script src="<?=BASE_URL?>js/speech/voicecommand.min.js"></script>

		<!-- SmartChat UI : plugin -->
		<script src="<?=BASE_URL?>js/smart-chat-ui/smart.chat.ui.min.js"></script>
		<script src="<?=BASE_URL?>js/smart-chat-ui/smart.chat.manager.min.js"></script>
		
		<script src="<?=base_url()?>seipkon/assets/jqueryconfirm/dist/jquery-confirm.min.js"></script>
		<script src="<?=base_url()?>seipkon/assets/select2/dist/js/select2.min.js"></script>
		<script src="<?=base_url()?>seipkon/assets/datepicker/bootstrap-datepicker.min.js"></script>
		
		<script src="<?=base_url()?>seipkon/assets/plugins/daterangepicker/js/moment.min.js"></script>
		<script src="<?php echo base_url();?>seipkon/assets/fullcalendar/dist/fullcalendar.js"></script>
		<script src="<?php echo base_url();?>seipkon/assets/fullcalendar/dist/scheduler.min.js"></script>
		
		<!-- PAGE RELATED PLUGIN(S) -->
		<?php echo $__env->yieldContent('javascript'); ?>

		<!-- Your GOOGLE ANALYTICS CODE Below -->
		<script type="text/javascript">
			// var _gaq = _gaq || [];
			// _gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
			// _gaq.push(['_trackPageview']);

			// (function() {
				// var ga = document.createElement('script');
				// ga.type = 'text/javascript';
				// ga.async = true;
				// ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				// var s = document.getElementsByTagName('script')[0];
				// s.parentNode.insertBefore(ga, s);
			// })();

		</script>

	</body>

</html><?php /**PATH D:\xampp\htdocs\2021\INSAN\new_insan\application\views/layouts/master.blade.php ENDPATH**/ ?>