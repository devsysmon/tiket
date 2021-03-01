<?php $__env->startSection('stylesheet'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="row">
		<!-- col -->
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
			<h1 class="page-title txt-color-blueDark">
				<!-- PAGE HEADER -->
				<i class="fa-fw fa fa-puzzle-piece"></i> 
					App Views 
				<span>>  
					Projects
				</span>
			</h1>
		</div>
		<!-- end col -->
		
		<!-- right side of the page with the sparkline graphs -->
		<!-- col -->
		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
			<!-- sparks -->
			<ul id="sparks">
				<li class="sparks-info">
					<h5> My Income <span class="txt-color-blue">$47,171</span></h5>
					<div class="sparkline txt-color-blue hidden-mobile hidden-md hidden-sm">
						1300, 1877, 2500, 2577, 2000, 2100, 3000, 2700, 3631, 2471, 2700, 3631, 2471
					</div>
				</li>
				<li class="sparks-info">
					<h5> Site Traffic <span class="txt-color-purple"><i class="fa fa-arrow-circle-up" data-rel="bootstrap-tooltip" title="Increased"></i>&nbsp;45%</span></h5>
					<div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm">
						110,150,300,130,400,240,220,310,220,300, 270, 210
					</div>
				</li>
				<li class="sparks-info">
					<h5> Site Orders <span class="txt-color-greenDark"><i class="fa fa-shopping-cart"></i>&nbsp;2447</span></h5>
					<div class="sparkline txt-color-greenDark hidden-mobile hidden-md hidden-sm">
						110,150,300,130,400,240,220,310,220,300, 270, 210
					</div>
				</li>
			</ul>
			<!-- end sparks -->
		</div>
		<!-- end col -->
		
	</div>
	<!-- end row -->

	<!--
		The ID "widget-grid" will start to initialize all widgets below 
		You do not need to use widgets if you dont want to. Simply remove 
		the <section></section> and you can use wells or panels instead 
		-->

	<!-- widget grid -->
	<section id="widget-grid" class="">

		<!-- row -->
		<div class="row">
		
			<!-- NEW WIDGET START -->
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-colorbutton="false" 
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
					<header>
						<span class="widget-icon"> <i class="fa fa-cube"></i> </span>
						<h2>Data Mesin ATM </h2>
					</header>

					<!-- widget div-->
					<div>

						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->
							<a onclick="createModalAdd()" class="btn btn-primary pull-right" style="border-radius: 5px;">
								<img style="float: left; margin: 0px 5px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/adddata.png" height="20" width="20" />
								<b>ADD Client</b>
							</a>
						</div>
						<!-- end widget edit box -->

						<!-- widget content -->
						<div class="widget-body no-padding">

							<table id="example" class="display projects-table table table-striped table-bordered table-hover" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th></th>
										<th>Nama Client</th>
										<th>IP Client</th>
										<th>Status</th>
										<th>Aksi </th>
									</tr>
								</thead>
							</table>

						</div>
						<!-- end widget content -->

					</div>
					<!-- end widget div -->

				</div>
				<!-- end widget -->

			</article>
			<!-- WIDGET END -->
			
		</div>

		<!-- end row -->

		<!-- row -->

		<div class="row">

			<!-- a blank row to get started -->
			<div class="col-sm-12">
				<!-- your contents here -->
			</div>
				
		</div>

		<!-- end row -->
		
		<div class="content_form" style="width: '100%'" hidden>
			<form action="" class="formName" enctype="multipart/form-data">
				<input type="hidden" class="form-control" name="id" value="">
				<div class="col-md-12">
					<div class="form-group">
						<label class="control-label">Host Name :</label>
						<input required type="text" name="client" id="client" value="" class="form-control">
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label class="control-label">IP Client :</label>
						<input required type="text" name="ip" id="ip" data-inputmask="'alias': 'ip'" data-mask="" class="form-control">
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label class="control-label">Data Center :</label>
						<select name="stasiun" class="form-control" style="width: 100%;">
						<?php $__currentLoopData = $stasiun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($row->id_blok); ?>"><?php echo e($row->name_blok); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>
				</div>
			</form>
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
		 * OR you can load chain scripts by doing
		 * 
		 * loadScript(".../plugin.js", function(){
		 * 	 loadScript("../plugin.js", function(){
		 * 	   ...
		 *   })
		 * });
		 */

		// pagefunction
		var table;
		var base_url = "<?=base_url()?>monitor_atm/";
		var pagefunction = function() {

			/* Formatting function for row details - modify as you need */
			function format ( d ) {
				// `d` is the original data object for the row
				return '<table cellpadding="5" cellspacing="0" border="0" class="table table-hover table-condensed">'+
					'<tr>'+
						'<td style="width:100px">Project Title:</td>'+
						'<td></td>'+
					'</tr>'+
					'<tr>'+
						'<td>Deadline:</td>'+
						'<td></td>'+
					'</tr>'+
					'<tr>'+
						'<td>Extra info:</td>'+
						'<td>And any further details here (images etc)...</td>'+
					'</tr>'+
					'<tr>'+
						'<td>Comments:</td>'+
						'<td></td>'+
					'</tr>'+
					'<tr>'+
						'<td>Action:</td>'+
						'<td></td>'+
					'</tr>'+
				'</table>';
			}

			// clears the variable if left blank
			table = $('#example').DataTable( {
				"bStateSave": true,
				"ajax": {
					url :  "<?=base_url()?>monitor_atm/get_data",
					type : 'POST',
					dataFilter: function(data) {
						console.log(data);
						var json = jQuery.parseJSON( data );
						json.recordsTotal = json.recordsTotal;
						json.recordsFiltered = json.recordsFiltered;
						json.data = json.data;

						return JSON.stringify( json );
					}
				},
				"bDestroy": true,
				"iDisplayLength": 15,
				"columns": [
					{
						"class":          'details-control',
						"orderable":      false,
						"data":           null,
						"defaultContent": ''
					},
					{ "data": "name_client" },
					{ "data": "ip_client" },
					{ "data": "status" },
					{ "data": "aksi" },
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
			
			
			
			var interval = setInterval(function() {
				table.ajax.reload( null, false );
			}, 5000);

		};
		
		// end pagefunction
		
		function createModalAdd() {
			var content = $('.content_form').clone().html();
			
			$.confirm({
				title: 'Tambah Client',
				theme: 'light',
				content: content,
				buttons: {
					formSubmit: {
						text: 'Submit',
						btnClass: 'btn-blue',
						action: function () {
							var self = this;
							
							var url = self.$content.find('form')[0].action;
							var form = self.$content.find('form')[0];
							var formData = new FormData(form);
							
							self.showLoading();
							
							$.ajax({
								url: base_url + "save",
								dataType: 'html',
								method: 'post',
								processData: false,
								contentType: false,
								cache: false,
								data: formData,
								timeout: 3000,
							}).done(function (response) {
								if(response=="success") {
									window.location.reload();
									self.close();
								} else {
									self.hideLoading();
								}
							}).fail(function(e){
								console.log(e);
								alert('Something went wrong.');
							});
							
							table.ajax.reload( null, false );
						}
					},
					cancel: function () {
						//close
					},
				},
				onContentReady: function () {
					var jc = this;
					this.$content.find('.name').focus();
					this.$content.find('form').on('submit', function (e) {
						// if the user submits the form by pressing enter in the field.
						e.preventDefault();
						jc.$$formSubmit.trigger('click'); // reference the button and click it
					});
				}
			});
		}

		// destroy generated instances 
		// pagedestroy is called automatically before loading a new page
		// only usable in AJAX version!

		var pagedestroy = function(){
			
			/*
			Example below:

			$("#calednar").fullCalendar( 'destroy' );
			if (debugState){
				root.console.log("✔ Calendar destroyed");
			} 

			For common instances, such as Jarviswidgets, Google maps, and Datatables, are automatically destroyed through the app.js loadURL mechanic

			*/
			//$('#example').find('*').addBack().off().remove();
		
		}

		// end destroy
		
		// load related plugins & run pagefunction
		loadScript("<?=BASE_URL?>js/plugin/datatables/jquery.dataTables.min.js", function(){
			loadScript("<?=BASE_URL?>js/plugin/datatables/dataTables.colVis.min.js", function(){
				loadScript("<?=BASE_URL?>js/plugin/datatables/dataTables.tableTools.min.js", function(){
					loadScript("<?=BASE_URL?>js/plugin/datatables/dataTables.bootstrap.min.js", function(){
						loadScript("<?=BASE_URL?>js/plugin/datatable-responsive/datatables.responsive.min.js", pagefunction)
					});
				});
			});
		});
		
	</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>