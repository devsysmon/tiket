@extends('layouts_seipkon.master')

@section('stylesheet')
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>bootstrap/form-validation.css"/>
@endsection

@section('javascript')
	<script src="<?=base_url()?>bootstrap/form-validation.js"></script>
	
	<script>
		$(document).ready(function(e){
			var base_url = "<?php echo base_url();?>"; // You can use full url here but I prefer like this
			// console.log(base_url + 'master_atm/get_data');
			$('#datatable').DataTable({
				"pageLength" : 10,
				"serverSide": true,
				"order": [[0, "asc" ]],
				"ajax":{
					url :  base_url + 'master_atm/get_data',
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
			}); // End of DataTable
		}); // End Document Ready Function
	</script>
@endsection

@section('content')
	<div class="container-fluid">
		<!-- Breadcromb Row Start -->
		<!--<div class="row">
			<div class="col-md-12">
				<div class="breadcromb-area">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="seipkon-breadcromb-left">
								<h3><?=strtoupper(explode("/", $that->uri->uri_string())[1])?> <?=strtoupper(str_replace("_", " ", explode("/", $that->uri->uri_string())[0]))?></h3>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="seipkon-breadcromb-right">
								<ul>
									<li><a href="<?=base_url()?>dashboard">home</a></li>
									<li><a href="<?=(isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url().explode("/", $that->uri->uri_string())[0])?>"><?=ucwords(explode("/", str_replace("_", " ", $that->uri->uri_string()))[0])?></a></li>
									<li><?=ucwords(explode("/", $that->uri->uri_string())[1])?> <?=ucwords(str_replace("_", " ", explode("/", $that->uri->uri_string())[0]))?></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>-->
		<!-- End Breadcromb Row -->

		<!-- Validation Form Row Start -->
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="page-box">
					<div class="form-example">
						<img style="float: left; margin: -5px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/adddata.png" height="35" width="30" /><h3>Data Petugas/Staff</h3>
						<div class="form-validation-box">
							<div class="form-wrap">
								<form data-parsley-validate method="post" action="<?=base_url().explode("/", $that->uri->uri_string())[0].'/'.(strtoupper(explode("/", $that->uri->uri_string())[1])=="ADD" ? "insert" : "update")?>">
									<input type="hidden" class="form-control" id="id" name="id" placeholder="" value="<?=$id?>">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">ID Staff :</label>
												<input type="text" placeholder="" class="form-control" id="nik" name="nik" value="<?=$nik?>" required>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">Nama :</label>
												<input type="text" placeholder="" class="form-control" id="nama" name="nama" value="<?=$nama?>" required>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">Area Service Point :</label>
												<input type="text" placeholder="" class="form-control" id="alamat" name="alamat" value="<?=$nama?>" required>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">Jenis Kelamin :</label>
												<div id="slWrapper" class="parsley-select wd-250">
													<select class="form-control" data-placeholder="Choose one" data-parsley-class-handler="#slWrapper" data-parsley-errors-container="#slErrorContainer" id="jk" name="jk" required>
														<option value="">Choose...</option>
														<option <?=($jk=="LAKI-LAKI" ? "selected" : "")?>>LAKI-LAKI</option>
														<option <?=($jk=="PEREMPUAN" ? "selected" : "")?>>PEREMPUAN</option>
													</select>
													<div id="slErrorContainer"></div>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">No Handphone :</label>
												<input type="text" placeholder="" class="form-control" id="hp" name="hp" value="<?=$hp?>" required>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">Username :</label>
												<input type="text" placeholder="" class="form-control" id="username" name="username" value="<?=$username?>" required>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">Password :</label>
												<input type="password" placeholder="Password" class="form-control" id="password" name="password" value="<?=$password?>" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<div class="row">
													<div class="col-md-12">
														<div class="form-layout-submit">
															<button type="submit" class="btn btn-info"><img style="float: left; margin: 2px 5px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/navigation.png" height="25" width="20" /><?=(strtoupper(explode("/", $that->uri->uri_string())[1])=="ADD" ? "Submit" : "Update")?></button>
															<a href="<?=(isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url().explode("/", $that->uri->uri_string())[0])?>" class="btn btn-danger"><img style="float: left; margin: 2px 5px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/delete.png" height="20" width="20" />cancel</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Validation Form Row -->

	</div>
@endsection