
<link rel="stylesheet" href="<?php echo base_url();?>seipkon/assets/fullcalendar/dist/fullcalendar.css">
<link rel="stylesheet" href="<?php echo base_url();?>seipkon/assets/fullcalendar/dist/scheduler.min.css">


<div style="padding: 20px;" id="calendar"></div>

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

<script src="<?=base_url()?>seipkon/assets/plugins/daterangepicker/js/moment.min.js"></script>
<script src="<?php echo base_url();?>seipkon/assets/fullcalendar/dist/fullcalendar.js"></script>
<script src="<?php echo base_url();?>seipkon/assets/fullcalendar/dist/scheduler.min.js"></script>

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
	
	/*
	 * ALL PAGE RELATED SCRIPTS CAN GO BELOW HERE
	 * eg alert("my home function");
	 * 
	 * var pagefunction = function() {
	 *   ...
	 * }
	 * loadScript("<?=BASE_URL?>js/plugin/_PLUGIN_NAME_.js", pagefunction);
	 * 
	 */
	
	// PAGE RELATED SCRIPTS
	
	// pagefunction	
	var pagefunction = function() {
		$('#calendar').fullCalendar({
			defaultView: 'timelineMonth',
			header: {
				right: 'timelineMonth'
			},
			defaultDate: moment('<?php echo $default_dateZ;?>'),
			resourceColumns: [
				{
				  labelText: 'Employee',
				  field: 'title'
				},
				{
				  labelText: 'Present',
				  field: 'employee_present'
				}
			],
			resources: <?=$resourcess?>,
			events: <?=$eventss?>,
		});
		
		var default_date = '<?=$default_dateZ?>';
		$('.from').val(default_date);
		
		$('.from').on('focus', function() {
			$(".view_bank").hide("slow");
			$(".view_atm").hide("slow");
		});
	
		$('.from').datepicker({
			autoclose: true,
			minViewMode: 1,
			format: 'yyyy-mm',
			todayHighlight: true
		}).on('changeDate', function(selected){
			var bulan = ("0" + (selected.date.getMonth() + 1)).slice(-2);
			var tahun = selected.date.getFullYear(); 
			// console.log(selected);
			// console.log(bulan+" "+tahun);
			
			$(".view_bank").show("slow");
		}); 
	};
	
	// load related plugins
	
	loadScript("<?=BASE_URL?>js/plugin/datatables/jquery.dataTables.min.js", function(){
		loadScript("<?=BASE_URL?>js/plugin/datatables/dataTables.colVis.min.js", function(){
			loadScript("<?=BASE_URL?>js/plugin/datatables/dataTables.tableTools.min.js", function(){
				loadScript("<?=BASE_URL?>js/plugin/datatables/dataTables.bootstrap.min.js", function(){
					loadScript("<?=base_url()?>seipkon/assets/jqueryconfirm/dist/jquery-confirm.min.js", function(){
						loadScript("<?=BASE_URL?>js/plugin/datatable-responsive/datatables.responsive.min.js", pagefunction)
					});
				});
			});
		});
	});


</script>
<?php /**PATH D:\xampp\htdocs\2021\INSAN\new_insan\application\views/pages/report_attendance/export.blade.php ENDPATH**/ ?>