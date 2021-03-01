<?php $__env->startSection('stylesheet'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
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
			<div class="navbar navbar-default" style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );border-radius: 5px 5px 0px 0px;">
				<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
				<a href="#dashboard_merchant_internal" class="btn btn-default btn-circle btn-sm zoomsmall">
				<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/blackbut.png" height="24" width="24" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Client Dashboard</small><br>
						<small style="color:white;font-size:12px;">Client Dashboard Monitoring</small>
					</p>
				</a>
				</div>
				<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
				<a href="#master_client" class="btn btn-default btn-circle btn-sm zoomsmall active">
				<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/blackbook.png" height="24" width="24" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Client & Customer </small><br>
						<small style="color:white;font-size:12px;">Data Client & Customer </small>
					</p>
				</a>
				</div>
				<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
				<a href="#master_atm" class="btn btn-default btn-circle zoomsmall">
				<img style="float: left; margin: -1px 10px 0px 4px;" src="<?=base_url()?>seipkon/assets/img/atm2.png" height="24" width="24" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Data Mesin ATM</small><br>
						<small style="color:white;font-size:12px;">Data Mesin ATM</small>
					</p>
				</a>
				</div>
				<div class="col-sm-2" style="margin: 5px 0px 0px 0px;">
				<a href="#master_lokasi" class="btn btn-default btn-circle btn-sm zoomsmall">
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
	</div>


	<!-- widget grid -->
	<section id="widget-grid" class="">

		<!-- row -->
		<div class="row">
			
			<!-- NEW WIDGET START -->
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin: -20px 0px 0px 0px;">

				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-colorbutton="false" 								  data-widget-togglebutton="false"								  data-widget-fullscreenbutton="false"							  data-widget-deletebutton="false"							  data-widget-sortable="false"
				data-widget-editbutton="false">
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
					<header style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%);">
						<span class="widget-icon"><img style="float: left; margin: 8px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/atm2.png" height="18" width="18" /></span>
						<h2 style="color:white; margin: -1px 0px 0px 10px;"><b>Data Client & Customer</b></h2>
						<a onclick="createModal()" class="btn btn-default btn-xs pull-right zoomsmall" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%); border-radius: 4px; margin: 5px 5px 0px 0px;">
						<img style="float: left; margin: 0px 5px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/adddata.png" height="20" width="20" />
						<b>Tambah Data Client</b>						
						</a>
					</header>

					<!-- widget div-->
					<div>

				

						<!-- widget content -->
						<div class="widget-body no-padding">

							<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
								<thead>			                
									<tr>
										<th>ID</th>
										<th>Logo Client</th>
										<th>Nama Client/Bank</th>
										<th width="30%">Alamat Kantor/Cabang</th>
										<th>Area Service Point</th>
										<th>Client P.I.C</th>
										<th width="160px">Opsi/Fungsional</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
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

		<!-- end row -->
		
		<div class="container content_form" hidden>
			<form action="<?=base_url()?>master_client/insert" style="margin-bottom: 10px" autocomplete="off" id="data" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" class="id form-control" />
				<div class="form-group">
					<label class="control-label" for="client">Nama Client/Customer</label>
					<input type="text" name="client" placeholder="Nama Client" class="client form-control" required />
				</div>
				<div class="form-group">
					<label class="control-label" for="cabang">Alamat Kantor/Cabang</label>
					<input type="text" name="cabang" placeholder="Cabang" class="cabang form-control" required />
				</div>
				<div class="form-group">
					<label class="control-label" for="alamat">Area Service Point</label>
					<input type="text" name="alamat" placeholder="Area ATM Service Point" class="alamat form-control">
				</div>
				<div class="form-group">
					<label class="control-label" for="pic">Client P.I.C</label>
					<input type="text" name="pic" placeholder="PIC" class="pic form-control" required />
				</div>
				<div class="form-group">
					<label class="control-label" for="pic">Logo</label>
					<input type="file" name="logo" placeholder="logo" class="logo form-control" required />
				</div>
				<!--<div class="form-group">
					<label class="control-label" for="username">Username</label>
					<input type="text" name="username" placeholder="Username" class="username form-control"/>
				</div>
				<div class="form-group">
					<label class="control-label" for="password">Password</label>
					<input type="password" name="password" placeholder="Password" class="password form-control"/>
				</div>-->
			</form>
		</div>
		
		<div class="container content_form2" hidden>
			<form action="<?=base_url()?>master_client/insert" class="formName">
				<div class="form-group">
					<label>Masukan Data Client & Customer</label>
					<input type="text" placeholder="Data Lokasi" class="name form-control" required />
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
		 * loadScript("<?=BASE_URL?>js/plugin/_PLUGIN_NAME_.js", pagefunction);
		 * 
		 */
		
		// PAGE RELATED SCRIPTS
		
		// pagefunction	
		var table;
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
				var responsiveHelper_dt_basic = undefined;
				var responsiveHelper_datatable_fixed_column = undefined;
				var responsiveHelper_datatable_col_reorder = undefined;
				var responsiveHelper_datatable_tabletools = undefined;
				
				var breakpointDefinition = {
					tablet : 1024,
					phone : 480
				};
				
				var base_url = "<?php echo base_url();?>";
				table = $('#dt_basic').DataTable({
					"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
					"autoWidth" : true,
					"preDrawCallback" : function() {
						// Initialize the responsive datatables helper once.
						if (!responsiveHelper_dt_basic) {
							responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
						}
					},
					"rowCallback" : function(nRow) {
						responsiveHelper_dt_basic.createExpandIcon(nRow);
					},
					"drawCallback" : function(oSettings) {
						responsiveHelper_dt_basic.respond();
					},
					"pageLength" : 10,
					"serverSide": true,
					"order": [[1, "asc" ]],
					"columnDefs": [{"orderable": false, "targets": 0}],
					"ajax":{
						url :  base_url + 'master_client/get_data',
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
				});

			/* END BASIC */

		};
		
		function createModal() {
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
							var formData = new FormData(self.$content.find('form')[0]);
							
							var client 	 = this.$content.find('.client').val();
							var cabang 	 = this.$content.find('.cabang').val();
							var alamat 	 = this.$content.find('.alamat').val();
							var pic 	 = this.$content.find('.pic').val();
							// var username = this.$content.find('.username').val();
							// var password = this.$content.find('.password').val();
							
							if(!client){ $.alert('Please provide a valid client'); return false; }
							if(!cabang){ $.alert('Please provide a valid cabang'); return false; }
							if(!alamat){ $.alert('Please provide a valid alamat'); return false; }
							if(!pic){ $.alert('Please provide a valid picture file'); return false; }
							// if(!username){ $.alert('provide a valid username'); return false; }
							// if(!password){ $.alert('provide a valid password'); return false; }
							
							var data = {
								id			: null,
								client		: client,
								alamat		: alamat,
								pic			: pic
								// username	: username,
								// password	: password
							};
							
							console.table(url);
							console.table(data);
							
							// self.showLoading();
							
							$.ajax({
								url: url,
								type: 'POST',
								data: formData,
								success: function (data) {
									response = JSON.parse(data);
									if(response.status=="exist") {
										self.hideLoading();
										$.alert('Bank sudah tersedia!');
									} else {
										self.close();
										
										$.confirm({
											title: false,
											content: 'SUCCESS',
											autoClose: 'ok|1000',
											buttons: {
												ok: function () {}
											}
										});
										
										table.ajax.reload( null, false );
									}
								},
								cache: false,
								contentType: false,
								processData: false
							});
							
							// $.ajax({
								// url: url,
								// dataType: 'json',
								// method: 'post',
								// data: data,
								// timeout: 3000,
							// }).done(function (response) {
								// console.log(response);
								// if(response.status=="exist") {
									// self.hideLoading();
									// $.alert('Bank sudah tersedia!');
								// } else {
									// self.close();
									
									// $.confirm({
										// title: false,
										// content: 'SUCCESS',
										// autoClose: 'ok|1000',
										// buttons: {
											// ok: function () {}
										// }
									// });
									
									// table.ajax.reload( null, false );
								// }
							// }).fail(function(){
								// self.hideLoading();
								// $.alert('Something went wrong.');
							// });
							
							return false;
						}
					},
					cancel: function () {},
				},
				onContentReady: function () {
					// bind to events
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
		
		function updateModal(id, client, cabang, alamat, pic, username, password) {
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
							var formData = new FormData(self.$content.find('form')[0]);
							
							var client 	 = this.$content.find('.client').val();
							var cabang 	 = this.$content.find('.cabang').val();
							var alamat 	 = this.$content.find('.alamat').val();
							var pic 	 = this.$content.find('.pic').val();
							// var username = this.$content.find('.username').val();
							// var password = this.$content.find('.password').val();
							
							if(!client){ $.alert('Please provide a valid client'); return false; }
							if(!cabang){ $.alert('Please provide a valid cabang'); return false; }
							if(!alamat){ $.alert('Please provide a valid alamat'); return false; }
							if(!pic){ $.alert('Please provide a valid picture file'); return false; }
							// if(!username){ $.alert('provide a valid username'); return false; }
							// if(!password){ $.alert('provide a valid password'); return false; }
							
							var data = {
								id			: id,
								client		: client,
								alamat		: alamat,
								pic			: pic,
								username	: username,
								password	: password
							};
							
							console.table(url);
							console.table(data);
							
							self.showLoading();
							
							$.ajax({
								url: url,
								type: 'POST',
								data: formData,
								success: function (data) {
									response = JSON.parse(data);
									if(response.status=="exist") {
										self.hideLoading();
										$.alert('Bank sudah tersedia!');
									} else {
										self.close();
										
										$.confirm({
											title: false,
											content: 'SUCCESS',
											autoClose: 'ok|1000',
											buttons: {
												ok: function () {}
											}
										});
										
										table.ajax.reload( null, false );
									}
								},
								cache: false,
								contentType: false,
								processData: false
							});
							
							// $.ajax({
								// url: url,
								// dataType: 'json',
								// method: 'post',
								// data: data,
								// timeout: 3000,
							// }).done(function (response) {
								// console.log(response);
								// if(response.status=="exist") {
									// self.hideLoading();
									// $.alert('Bank sudah tersedia!');
								// } else {
									// self.close();
									
									// $.confirm({
										// title: false,
										// content: 'SUCCESS',
										// autoClose: 'ok|1000',
										// buttons: {
											// ok: function () {}
										// }
									// });
									
									// table.ajax.reload( null, false );
								// }
							// }).fail(function(){
								// self.hideLoading();
								// $.alert('Something went wrong.');
							// });
							
							return false;
						}
					},
					cancel: function () {},
				},
				onContentReady: function () {
					// bind to events
					var jc = this;
					jc.$content.find('.id').val(id);
					jc.$content.find('.client').val(client);
					jc.$content.find('.cabang').val(cabang);
					jc.$content.find('.alamat').val(alamat);
					jc.$content.find('.pic').val(pic);
					// jc.$content.find('.username').val(username);
					// jc.$content.find('.password').val(password);
					
					
					this.$content.find('form').on('submit', function (e) {
						// if the user submits the form by pressing enter in the field.
						e.preventDefault();
						jc.$$formSubmit.trigger('click'); // reference the button and click it
					});
				}
			});
		}
		
		
			
		function deleteAction2(url) {
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
					cancel: function () {}
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
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>