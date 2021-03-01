<?php $__env->startSection('stylesheet'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="inbox-nav-bar no-content-padding" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">

		<h1 class="page-title txt-color-blueDark hidden-tablet"><img style="float: left; margin: 5px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/registry.png" height="28" width="28" />
		<small style="color:white;font-size:24px; margin: -30px 40px 10px 0px; font-weight: bold;">Registry</small>
		</h1>

		<div class="btn-group hidden-desktop visible-tablet">
			<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
				Inbox <i class="fa fa-caret-down"></i>
			</button>
			<ul class="dropdown-menu pull-left">
				<li>
					<a href="javascript:void(0);" class="inbox-load">Inbox <i class="fa fa-check"></i></a>
				</li>
				<li>
					<a href="javascript:void(0);">Sent</a>
				</li>
				<li>
					<a href="javascript:void(0);">Trash</a>
				</li>
				<li class="divider"></li>
				<li>
					<a href="javascript:void(0);">Spam</a>
				</li>
			</ul>

		</div>

		<div class="inbox-checkbox-triggered">

			<div class="btn-group">
				<a href="javascript:void(0);" rel="tooltip" title="" data-placement="bottom" data-original-title="Mark Important" class="btn btn-default"><strong><i class="fa fa-exclamation fa-lg text-danger"></i></strong></a>
				<a href="javascript:void(0);" rel="tooltip" title="" data-placement="bottom" data-original-title="Move to folder" class="btn btn-default"><strong><i class="fa fa-folder-open fa-lg"></i></strong></a>
				<a href="javascript:void(0);" rel="tooltip" title="" data-placement="bottom" data-original-title="Delete" class="deletebutton btn btn-default"><strong><i class="fa fa-trash-o fa-lg"></i></strong></a>
			</div>
			<span class="btn-group">
				<a href="#" data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle"><span class="caret single"></span></a>
				<ul class="dropdown-menu">
					<li>
						<a href="#">Action</a>
					</li>
					<li>
						<a href="#">Another action</a>
					</li>
					<li>
						<a href="#">Something else here</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="#">Separated link</a>
					</li>
				</ul>
			</span>
		
		</div>

		<a href="javascript:void(0);" id="compose-mail-mini" class="btn btn-primary pull-right hidden-desktop visible-tablet"> <strong><i class="fa fa-file fa-lg"></i></strong> </a>

		<div class="btn-group pull-right inbox-paging">
			<a href="javascript:void(0);" class="btn btn-default btn-sm"><strong><i class="fa fa-chevron-left"></i></strong></a>
			<a href="javascript:void(0);" class="btn btn-default btn-sm"><strong><i class="fa fa-chevron-right"></i></strong></a>
		</div>
		<span class="pull-right"><strong>1-30</strong> of <strong>3,452</strong></span>

	</div>

	<div id="inbox-content" class="inbox-body no-content-padding">

		<div class="inbox-side-bar" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">

			<a href="javascript:void(0);" id="compose-mail" class="btn btn-primary btn-block"> <strong>Read & Sincronize Data</strong> </a>

			<h6> Folder <a href="javascript:void(0);" rel="tooltip" title="" data-placement="right" data-original-title="Refresh" class="pull-right txt-color-darken"><i class="fa fa-refresh"></i></a></h6>

			<ul class="inbox-menu-lg">
				<li class="active">
					<a class="inbox-load" href="javascript:void(0);"> Inbox (14) </a>
				</li>
				<li style="background-image: linear-gradient(to top, #ff0844 0%, #ffb199 100%);">
					<a href="javascript:void(0);">Sent</a>
				</li>
				<li>
					<a href="javascript:void(0);">Draft</a>
				</li>
				<li>
					<a href="javascript:void(0);">Trash</a>
				</li>
			</ul>

			<h6> Quick Access <a href="javascript:void(0);" rel="tooltip" title="" data-placement="right" data-original-title="Add Another" class="pull-right txt-color-darken"><i class="fa fa-plus"></i></a></h6>

			<ul class="inbox-menu-sm">
				<li>
					<a href="javascript:void(0);"> Images (476)</a>
				</li>
				<li>
					<a href="javascript:void(0);">Documents (4)</a>
				</li>
			</ul>

			<div class="air air-bottom inbox-space">

				3.5GB of <strong>10GB</strong><a href="javascript:void(0);" rel="tooltip" title="" data-placement="top" data-original-title="Empty Spam" class="pull-right txt-color-darken"><i class="fa fa-trash-o fa-lg"></i></a>

				<div class="progress progress-micro">
					<div class="progress-bar progress-primary" style="width: 34%;"></div>
				</div>
			</div>

		</div>

		<div class="table-wrap custom-scroll animated fast fadeInRight">
			<!-- ajax will fill this area -->
			LOADING...

		</div>


	</div>
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

		pageSetUp();

		// PAGE RELATED SCRIPTS

		// pagefunction
		
		var pagefunction = function() {

			// fix table height
			tableHeightSize();

			$(window).resize(function() {
				tableHeightSize()
			})
			function tableHeightSize() {

				if ($('body').hasClass('menu-on-top')) {
					var menuHeight = 68;
					// nav height

					var tableHeight = ($(window).height() - 224) - menuHeight;
					if (tableHeight < (320 - menuHeight)) {
						$('.table-wrap').css('height', (320 - menuHeight) + 'px');
					} else {
						$('.table-wrap').css('height', tableHeight + 'px');
					}

				} else {
					var tableHeight = $(window).height() - 224;
					if (tableHeight < 320) {
						$('.table-wrap').css('height', 320 + 'px');
					} else {
						$('.table-wrap').css('height', tableHeight + 'px');
					}

				}

			}

			/*
			 * LOAD INBOX MESSAGES
			 */
			loadInbox();
			function loadInbox() {
				loadURL("<?=BASE_URL?>ajax/email/email-list.html", $('#inbox-content > .table-wrap'))
			}
		
			/*
			 * Buttons (compose mail and inbox load)
			 */
			$(".inbox-load").click(function() {
				loadInbox();
			});
		
			// compose email
			$("#compose-mail").click(function() {
				loadURL("<?=BASE_URL?>ajax/email-compose.html", $('#inbox-content > .table-wrap'));
			});
			
		};
		
		// end pagefunction

		// destroy generated instances 
		// pagedestroy is called automatically before loading a new page
		// only usable in AJAX version!

		/*var pagedestroy = function(){
			
			// destroy summernote
			if (".summernote") {
				$(".summernote").summernote( 'destroy' );
			}
			
			// clear misc. click events
			//$(".inbox-load").off();

			//loadInbox = undefined;
			//tableHeightSize = undefined;

			// debug msg
			if (debugState){
				root.console.log("✔ Summernote editor destroyed");
			} 

		}*/

		// end destroy
		
		// load delete row plugin and run pagefunction

		loadScript("<?=BASE_URL?>js/plugin/delete-table-row/delete-table-row.min.js", pagefunction);
		
	</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\2021\INSAN\new_insan\application\views/pages/master_registry/index.blade.php ENDPATH**/ ?>