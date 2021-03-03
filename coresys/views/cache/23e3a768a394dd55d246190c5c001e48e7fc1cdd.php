<?php $__env->startSection('stylesheet'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
				<a href="new_ticket" class="btn btn-default btn-circle btn-sm zoomsmall active">
				<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/new-ticket.png" height="24" width="24" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">New Issue Tickets</small><br>
						<small style="color:white;font-size:12px;">New Troubleshoot Ticket</small>
					</p>
				</a>
				</div>
				<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
				<a href="status_ticket" class="btn btn-default btn-circle btn-sm zoomsmall ">
				<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/taskred.png" height="24" width="24" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Status Ticket</small><br>
						<small style="color:white;font-size:12px;">Status Troubleshoot Ticket</small>
					</p>
				</a>
				</div>
				<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
				<a href="trouble_category" class="btn btn-default btn-circle zoomsmall">
				<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/folset7.png" height="24" width="24" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Activity Type</small><br>
						<small style="color:white;font-size:12px;">Activity Type Services</small>
					</p>
				</a>
				</div>
				<div class="col-sm-2" style="margin: 5px 0px 0px 0px;">
				<a href="trouble_sub_category" class="btn btn-default btn-circle btn-sm zoomsmall">
				<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/purpleset.png" height="24" width="24" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Problem Type</small><br>
						<small style="color:white;font-size:12px;">Problem Type Services </small>
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
						<h2 style="color:white; margin: -1px 0px 0px 10px;"><b>Data New Issue Tickets</b></h2>
					</header>

					<!-- widget div-->
					<div>

						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->
							<a onclick="createModal()" class="btn btn-primary pull-right" style="border-radius: 5px;"><img style="float: left; margin: 0px 5px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/adddata.png" height="20" width="20" /><b>Tambah News Broadcast</b></a>
						</div>
						<!-- end widget edit box -->

						<!-- widget content -->
						<div class="widget-body no-padding">

							<table id="example" class="display projects-table table table-striped table-bordered table-hover" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th></th>
										<th>Costing Biaya</th>
										<th>Serial Number</th>
										<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Produk</th>
										<th>Job Order</th>
										<th>Bank</th>
										<th>Cabang</th>
										<th>Lokasi</th>
										<th>CSE</th>
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

		<div class="container content_form" hidden>
			<form action="<?=base_url()?>new_ticket/insert" class="formName">
				<center><h5 style="font-weight: bold">CREATE NEW ISSUE TICKET <br>TICKET NUMBER : <span id="id_ticket">-</span></h5></center><br>
				<input type="hidden" placeholder="" class="ticket_id form-control" required />
				<div class="form-group">
					<label>ID ATM</label>
					<select class="form-control idatm" id="idatm" required="">
						<option value="">-- Select ATM --</option>
					</select>
				</div>
				<div class="form-group">
					<label>EMAIL DATE</label>
					<input type="text" placeholder="Email Date" class="email_date form-control" required />
				</div>
				<div class="form-group">
					<label>REPORTED PROBLEM</label>
					<input type="text" placeholder="Reported Problem" class="reported_problem form-control" required />
				</div>
				<div class="form-group">
					<label>REPORTED BY</label>
					<input type="text" placeholder="Reported By" class="reported_by form-control" required />
				</div>
				<div class="form-group">
					<label>SERVICE TYPE</label>
					<select name="service_type[]" class="easyui-validatebox service_type" style="width: 100%" required>
						<option value="">-- Select type --</option>
					</select>
				</div>
				<div class="form-group">
					<label>PIC</label>
					<select class="form-control pic" id="pic" required="">
						<option value="">-- Select PIC --</option>
					</select>
				</div>
				<div class="form-group">
					<label>PART REPLACEMENT</label>
					<select multiple name="part[]"  class="form-control part" id="part" required="">
						<option value="">-- Select Part --</option>
					</select>
				</div>
			</form>
		</div>

	</section>
	<!-- end widget grid -->
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
		 * loadScript("<?=BASE_URL?>js/plugin/_PLUGIN_NAME_.js", pagefunction);
		 * 
		 */
		
		// PAGE RELATED SCRIPTS
		
		// pagefunction	
		var table;
		var table2;
		var qty_global;
		var pagefunction = function() {
			//console.log("cleared");
			
			/* // DOM Position key index //
			
				l - Length changing (dropdown)
				f - Filtering input (search)
				t - The Table! (datatable)
				i - Information (records)
				p - Pagination (paging)
				r - pRocessing 
				< and > - div elements
				<"#id" and > - div with an id
				<"class" and > - div with a class
				<"#id.class" and > - div with an id and class
				
				Also see: http://legacy.datatables.net/usage/features
			*/	

			/* BASIC ;*/
				function format ( d ) {
				    // `d` is the original data object for the row
					
					// console.log(JSON.parse(d.detail));
					var data_list = JSON.parse(d.detail);
					
					var tableZZ = '<table cellpadding="5" cellspacing="0" border="0" class="table">';
					tableZZ += '<tr>'+
						'<th>Tanggal</th>'+
						'<th>Pengeluaran</th>'+
						'<th>Keterangan</th>'+
						'<th>Biaya</th>'+
					'</tr>';
					var current;
					var i = 0;
					var total = 0;
					$.each(data_list, function(key, value) {
						tableZZ += '<tr>';
						if(value.tanggal!==current) {
							i++;
							tableZZ += '<td>'+value.tanggal+'</td>';
						} else {
							tableZZ += '<td></td>';
						}
				        tableZZ += '<td>'+value.pengeluaran+'</td>'+
				            '<td>'+value.keterangan+'</td>'+
				            '<td align="right">'+value.biaya+'</td>'+
				        '</tr>';
						total = total + parseInt(value.cost);
						current = value.tanggal;
					});
					tableZZ += '<tr>'+
						'<th colspan="3"><center>Total</center></th>'+
						'<th style="text-align: right">'+total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+'</th>'+
					'</tr>';
					tableZZ += '<tr>'+
						'<th colspan="3"></th>'+
						'<th style="text-align: right">'+d.action+'</th>'+
					'</tr>';
					tableZZ += '</table>';
					
					var table = ''+
					'<table cellpadding="5" cellspacing="0" border="0" class="table table-hover table-condensed">'+
				        '<tr>'+
				            '<td style="width:100px">Project Title:</td>'+
				            '<td>'+d.detail+'</td>'+
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
					
				    return tableZZ;
				}

				// clears the variable if left blank
			    var table = $('#example').DataTable( {
			        "ajax": "<?=base_url()?>costing_job/dataList",
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
			            { "data": "est" },
			            { "data": "contacts" },
			            { "data": "status" },
			            { "data": "target-actual" },
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

			/* END BASIC */

		};
		
		function costing_acceptence(id) {
			alert(id);
		}

		var global_id = 0;
		function createModal() {
			var content = $('.content_form').clone().html();

			$.confirm({
				columnClass: 'col-md-6 col-md-offset-3',
				draggable: false,
				title: false,
				theme: 'light',
				content: content,
				buttons: {
					formSubmit: {
						text: 'Submit',
						btnClass: 'btn-blue',
						action: function () {
							var self = this;
							var url = self.$content.find('form')[0].action;
							
							var idatm = this.$content.find('.idatm').val();
							var ticket_id = this.$content.find('.ticket_id').val();
							var email_date = this.$content.find('.email_date').val();
							var service_type = this.$content.find('.service_type').val();
							var reported_problem = this.$content.find('.reported_problem').val();
							var reported_by = this.$content.find('.reported_by').val();
							var pic = this.$content.find('.pic').val();
							if(!service_type){ $.alert('provide a valid service_type'); return false; }
							if(!pic){ $.alert('provide a valid pic'); return false; }

							var data = {
								id: null,
								idatm: idatm,
								ticket_id: ticket_id,
								email_date: email_date,
								service_type: service_type,
								reported_problem: reported_problem,
								reported_by: reported_by,
								pic: pic
							};

							// self.showLoading();

							$.ajax({
								url: url,
								dataType: 'json',
								method: 'post',
								data: data,
								timeout: 3000,
							}).done(function (response) {
								console.log(response);
								
								if(response.status=="exist") {
									self.hideLoading();
									$.alert('Sub kategori sudah tersedia!');
								} else {
									self.close();
									// $.alert('SUCCESS');
									$.confirm({
										title: false,
										content: 'SUCCESS',
										autoClose: 'ok|1000',
										buttons: {
											ok: function () {
												
											}
										}
									});
									table.ajax.reload( null, false );
								}
							}).fail(function(){
								self.hideLoading();
								$.alert('Something went wrong.');
							});
							
							return false;
						}
					},
					cancel: function () {
						//close
					},
				},
				onContentReady: function () {
					var jc = this;

					this.$content.find('.idatm').select2({
						tokenSeparators: [','],
						ajax: {
							dataType: 'json',
							url: '<?php echo base_url().'new_ticket/select_atm'?>',
							delay: 250,
							type: "POST",
							data: function(params) {
								return {
									search: params.term
								}
							},
							processResults: function (data, page) {
								return {
									results: data
								};
							}
						}
					}).on('change', function(e) {
						// Access to full data
						// console.log($(this).select2('data'));
						var data = $(this).select2('data');
						var value = data[0].id;
						var text = data[0].text;
						alert(value);
						// alert(text);
						global_id = value;

						url = "<?=base_url()?>new_ticket/get_ticket";
						$.ajax({
							url: url,
							dataType: 'html',
							method: 'post',
							data: {id: value},
							timeout: 3000,
						}).done(function (response) {
							jc.$content.find('#id_ticket').html(response)
							jc.$content.find('.ticket_id').val(response)
						}).fail(function(){
							$.alert('Something went wrong.');
						});
					});;

					this.$content.find('.service_type').select2({
						tags: false, tokenSeparators: [','], width: '100%',
						ajax: {
							dataType: 'json',
							url: '<?php echo base_url().'new_ticket/select_problem'?>',
							delay: 250,
							type: "POST",
							data: function(params) {
								return {
									search: params.term
								}
							},
							processResults: function (data, page) {
								return {
									results: data
								};
							}
						}, maximumSelectionLength: 3,
						createTag: function (params) { var term = $.trim(params.term);
							if (term === '') { return null; }
							return { id: term, text: term + ' (add new)' };
						}
					});

					this.$content.find('.pic').select2({
						tokenSeparators: [','],
						ajax: {
							dataType: 'json',
							url: '<?php echo base_url().'new_ticket/select_pic'?>',
							delay: 250,
							type: "POST",
							data: function(params) {
								return {
									search: params.term,
									atm_id: global_id
								}
							},
							processResults: function (data, page) {
								return {
									results: data
								};
							}
						}
					});

					this.$content.find('.part').select2({
						tokenSeparators: [','],
						ajax: {
							dataType: 'json',
							url: '<?php echo base_url().'new_ticket/select_part'?>',
							delay: 250,
							type: "POST",
							data: function(params) {
								return {
									search: params.term
								}
							},
							processResults: function (data, page) {
								return {
									results: data
								};
							}
						}
					});

					this.$content.find('.email_date').datepicker({
						autoclose: true,
						minViewMode: 0,
						format: 'yyyy-mm-dd',
						todayHighlight: true
					}).on('changeDate', function(selected){
						var bulan = ("0" + (selected.date.getMonth() + 1)).slice(-2);
						var tahun = selected.date.getFullYear(); 
					}); 

					this.$content.find('form').on('submit', function (e) {
						e.preventDefault();
						jc.$$formSubmit.trigger('click');
					});
				}
			});
		}

		function updateModal(id, category_id, category_name, name) {
			var content = $('.content_form').clone().html();

			$.confirm({
				draggable: false,
				title: false,
				theme: 'light',
				content: content,
				buttons: {
					formSubmit: {
						text: 'Submit',
						btnClass: 'btn-blue',
						action: function () {
							var self = this;
							var url = self.$content.find('form')[0].action;
							
							var category = this.$content.find('.category').val();
							var name = this.$content.find('.name').val();
							if(!category){ $.alert('provide a valid category'); return false; }
							if(!name){ $.alert('provide a valid name'); return false; }
							
							var data = {
								id: id,
								category: category,
								name: name
							};

							self.showLoading();
							
							$.ajax({
								url: url,
								dataType: 'json',
								method: 'post',
								data: data,
								timeout: 3000,
							}).done(function (response) {
								// self.buttons.formSubmit.hide();
								// self.buttons.cancel.hide();
								// self.close();
								
								if(response.status=="exist") {
									self.hideLoading();
									$.alert('Lokasi sudah tersedia!');
								} else {
									self.close();
									// $.alert('SUCCESS');
									$.confirm({
										title: false,
										content: 'SUCCESS',
										autoClose: 'ok|1000',
										buttons: {
											ok: function () {
												
											}
										}
									});
									
									table.ajax.reload( null, false );
								}
							}).fail(function(){
								self.hideLoading();
								$.alert('Something went wrong.');
							});
							
							return false;
						}
					},
					cancel: function () {
						//close
					},
				},
				onContentReady: function () {
					this.$content.find('.category').append('<option value="'+category_id+'">'+category_name+'</option>');
					this.$content.find('.category').val(category_id);
					this.$content.find('.category').select2().trigger('change');
					this.$content.find('.category').select2({
						tokenSeparators: [','],
						ajax: {
							dataType: 'json',
							url: '<?php echo base_url().'new_ticket/select_category'?>',
							delay: 250,
							type: "POST",
							data: function(params) {
								return {
									search: params.term
								}
							},
							processResults: function (data, page) {
								return {
									results: data
								};
							}
						}
					});

					// this.$content.find('.category').val(category);
					// this.$content.find('.category').select2().trigger('change');
					var jc = this;
					jc.$content.find('.name').val(name);
					this.$content.find('form').on('submit', function (e) {
						e.preventDefault();
						jc.$$formSubmit.trigger('click');
					});
				}
			});
		}

		function deleteAction(url) {
			$.confirm({
				title: 'Delete data?',
				content: 'This dialog will automatically trigger \'cancel\' in 6 seconds if you don\'t respond.',
				autoClose: 'cancel|8000',
				buttons: {
					delete: {
						text: 'delete',
						keys: ['enter'],
						action: function () {
							$.ajax({
								url: url,
								dataType: 'html',
								timeout: 3000,
							}).done(function (response) {
								
								if(response=="SUCCESS") {
									table.ajax.reload( null, false );
								}
							}).fail(function(){
								self.hideLoading();
								$.alert('Something went wrong.');
							});
						}
					},
					cancel: function () {
						
					}
				}
			});
		}

		
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV_SERVER\htdocs\git\tiket\coresys\views/pages/costing_job/index.blade.php ENDPATH**/ ?>