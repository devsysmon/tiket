@extends('layouts.master')

@section('stylesheet')
@endsection

@section('breadcrumb')
@endsection

@section('content')
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
	  padding: 10px;
	  }
	}
	</style>
	<div class="row">
	<hanzmobview>
		<article class="btn-group col-sm-12">
			<div class="navbar navbar-default" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );border-radius: 5px 5px 0px 0px;">
				<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
				<a href="<?=base_url()?>master_staff" class="btn btn-default btn-circle btn-sm zoomsmall active">
				<img style="float: left; margin: -2px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/userpro.png" height="24" width="24" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Petugas/Staff</small><br>
						<small style="color:white;font-size:12px;">Staff Technical Service</small>
					</p>
				</a>
				</div>
				<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
				<a href="<?=base_url()?>master_attendance" class="btn btn-default btn-circle btn-sm zoomsmall">
				<img style="float: left; margin: -2px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/timecal.png" height="24" width="24" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Attendance</small><br>
						<small style="color:white;font-size:12px;">Absensi & Presensi Staff</small>
					</p>
				</a>
				</div>
				<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
				<a href="<?=base_url()?>master_user" class="btn btn-default btn-circle zoomsmall">
				<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/lock.png" height="24" width="24" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">User Access</small><br>
						<small style="color:white;font-size:12px;">Credential Management</small>
					</p>
				</a>
				</div>
				<div class="col-sm-2" style="margin: 5px 0px 0px 0px;">
				<a href="<?=base_url()?>master_absen_location" class="btn btn-default btn-circle btn-sm zoomsmall">
				<img style="float: left; margin: -3px 10px 0px 3px;" src="<?=base_url()?>seipkon/assets/img/browser.png" height="28" width="28" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Absen GeoLocation</small><br>
						<small style="color:white;font-size:12px;">Setting Absensi & Presensi</small>
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
	<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin: -20px 0px 0px 0px;"><!-- widget grid -->
	<section id="widget-grid" class="">
		<!-- row -->
		<div class="row">
			
			<!-- NEW WIDGET START -->
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-colorbutton="false"										  data-widget-togglebutton="false"									  data-widget-fullscreenbutton="false"									  data-widget-deletebutton="false"										  data-widget-sortable="false">
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
						<h2 style="color:white; margin: -1px 0px 0px 10px;"><b>Data Petugas / Staff</b></h2>
					</header>

					<!-- widget div-->
					<div>

						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->
							<a onclick="createModal()" class="btn btn-primary pull-right" style="margin-left: 10px; border-radius: 5px;"><img style="float: left; margin: 0px 5px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/adddata.png" height="20" width="20" />Tambah Data Petugas/Staff</a>
						</div>
						<!-- end widget edit box -->

						<!-- widget content -->
						<div class="widget-body no-padding">

							<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
								<thead>			                
									<tr>
										<th data-hide="phone">No.</th>
										<th data-class="expand">ID Staff</th>
										<th data-hide="phone,tablet">Nama Petugas/Staff</th>
										<th data-hide="phone,tablet">Area Service Point</th>
										<th data-hide="phone,tablet">No Handphone</th>
										<th width="180">Opsi/Fungsional</th>
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

		<div class="container content_form" hidden>
			<form action="<?=base_url()?>master_kebutuhan_part/insert" class="formName" style="margin-bottom: 10px">
				<div class="col-md-12">
					<div class="form-group">
						<label class="control-label">ID Staff :</label>
						<input type="text" placeholder="" class="form-control" id="nik" name="nik" value="" required>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label class="control-label">Nama :</label>
						<input type="text" placeholder="" class="form-control" id="nama" name="nama" value="" required>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label class="control-label">Area Service Point :</label>
						<input type="text" placeholder="" class="form-control" id="alamat" name="alamat" value="" required>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label class="control-label">Jenis Kelamin :</label>
						<div id="slWrapper" class="parsley-select wd-250">
							<select class="form-control" data-placeholder="Choose one" data-parsley-class-handler="#slWrapper" data-parsley-errors-container="#slErrorContainer" id="jk" name="jk" required>
								<option value="">Choose...</option>
								<option>LAKI-LAKI</option>
								<option>PEREMPUAN</option>
							</select>
							<div id="slErrorContainer"></div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label class="control-label">No Handphone :</label>
						<input type="text" placeholder="" class="form-control" id="hp" name="hp" value="" required>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label class="control-label">Email 1 :</label>
						<input type="text" placeholder="" class="form-control" id="email" name="email" value="" required>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label class="control-label">Email 2 :</label>
						<input type="text" placeholder="" class="form-control" id="email2" name="email2" value="" required>
					</div>
				</div>
			</form>
		</div>

	</section>
	<!-- end widget grid -->
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
						url :  base_url + 'master_staff/get_data',	
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
			// console.log(content);
			// alert(content);
			// $.alert({
				// draggable: false,
				// theme: 'dark',
				// title: 'Alert!',
				// content: 'Simple alert!',
			// });
		
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
							var url = '<?=base_url()?>master_staff/insert';
							var form = self.$content.find('form')[0];
							var formData = new FormData(form);
							// formData.append('id_bank', id_bank);
							
							self.showLoading();
							
							$.ajax({
								url: url,
								dataType: 'html',
								method: 'post',
								processData: false,
								contentType: false,
								cache: false,
								data: formData,
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
					// bind to events
					
					this.$content.find('.kode_part').select2({
						tokenSeparators: [','],
						ajax: {
							dataType: 'json',
							url: '<?php echo base_url().'master_kebutuhan_part/select_part'?>',
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
		
		function createModalEdit(id, nik, nama, alamat, jk, hp, username, password) {
			var content = $('.content_form').clone().html();
		
			$.confirm({
				draggable: false,
				title: false,
				theme: 'light',
				content: content,
				columnClass: 'col-md-8 col-md-offset-2',
				buttons: {
					formSubmit: {
						text: 'Submit',
						btnClass: 'btn-blue',
						action: function () {
							var self = this;
							
							var url = '<?=base_url()?>master_staff/update';
							var form = self.$content.find('form')[0];
							var formData = new FormData(form);
							formData.append('id', id);
							
							self.showLoading();
							
							$.ajax({
								url: url,
								dataType: 'html',
								method: 'post',
								processData: false,
								contentType: false,
								cache: false,
								data: formData,
								timeout: 3000,
							}).done(function (response) {
								// self.buttons.formSubmit.hide();
								// self.buttons.cancel.hide();
								// self.close();
								
								console.log(response);
								if(response=="success") {
									self.close();
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
								} else {
									self.hideLoading();
									$.alert('Something wrong!');
								}
							}).fail(function(){
								self.hideLoading();
								$.alert('Something went wrong.');
							});
							
							return false;
						}
					},
					cancel: function () {},
				},
				onContentReady: function () {
					// bind to events
					var jc = this;
					jc.$content.find('#nik').val(nik);
					jc.$content.find('#nama').val(nama);
					jc.$content.find('#alamat').val(alamat);
					jc.$content.find('#jk').val(jk);
					jc.$content.find('#hp').val(hp);
					jc.$content.find('#username').val(username);
					jc.$content.find('#password').val(password);
					
					this.$content.find('form').on('submit', function (e) {
						// if the user submits the form by pressing enter in the field.
						e.preventDefault();
						jc.$$formSubmit.trigger('click'); // reference the button and click it
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

@endsection