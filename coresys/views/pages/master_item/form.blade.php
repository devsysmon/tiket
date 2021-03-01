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
	<div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor">
		<div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
			<div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
		</div>
		<div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
			<div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
		</div>
	</div>
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h3">[<?=strtoupper(explode("/", $that->uri->uri_string())[1])?> <?=strtoupper(str_replace("_", " ", explode("/", $that->uri->uri_string())[0]))?>]</h3>
		<div class="btn-toolbar mb-2 mb-md-0">
			<a href="<?=$_SERVER['HTTP_REFERER']?>" class="btn btn-warning mr-1">Back</a>
		</div>
	</div>

	<div class="container">
	
		<div class="row">
			<div class="col-md-2 order-md-1"></div>
			<div class="col-md-8 order-md-1">
				<form class="needs-validation" method="post" novalidate="" action="<?=base_url().explode("/", $that->uri->uri_string())[0].'/'.(strtoupper(explode("/", $that->uri->uri_string())[1])=="ADD" ? "insert" : "update")?>">
					<input type="hidden" class="form-control" id="id" name="id" placeholder="" value="<?=$id?>">
				
					<div class="mb-3">
						<label for="nik">Nik</label>
						<input type="text" class="form-control" id="nik" name="nik" placeholder="" required="" value="<?=$nik?>">
						<div class="invalid-feedback">
							Please enter nik.
						</div>
					</div>
					
					<div class="mb-3">
						<label for="nama">Nama</label>
						<input type="text" class="form-control" id="nama" name="nama" placeholder="" required="" value="<?=$nama?>">
						<div class="invalid-feedback">
							Please enter nama.
						</div>
					</div>
					
					<div class="mb-3">
						<label for="alamat">Alamat</label>
						<input type="text" class="form-control" id="alamat" name="alamat" placeholder="" required="" value="<?=$alamat?>">
						<div class="invalid-feedback">
							Please enter alamat.
						</div>
					</div>
					
					
					<div class="mb-3">
						<label for="jk">Jenis Kelamin</label>
						<select class="custom-select d-block w-100" id="jk" name="jk" required="">
							<option value="">Choose...</option>
							<option <?=($jk=="LAKI-LAKI" ? "selected" : "")?>>LAKI-LAKI</option>
							<option <?=($jk=="PEREMPUAN" ? "selected" : "")?>>PEREMPUAN</option>
						</select>
						<div class="invalid-feedback">
							Please select a valid jenis kelamin.
						</div>
					</div>
					
					<div class="mb-3">
						<label for="hp">Handphone</label>
						<input type="text" class="form-control" id="hp" name="hp" placeholder="" required="" value="<?=$hp?>">
						<div class="invalid-feedback">
							Please enter handphone.
						</div>
					</div>
					
					<div class="mb-3">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" name="username" placeholder="" required="" value="<?=$username?>">
						<div class="invalid-feedback">
							Please enter username.
						</div>
					</div>
					
					<div class="mb-3">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="" required="" value="<?=$password?>">
						<div class="invalid-feedback">
							Please enter password.
						</div>
					</div>
					
					<hr class="mb-4">
					<button class="btn btn-primary btn-lg btn-block" type="submit">
						<?=(strtoupper(explode("/", $that->uri->uri_string())[1])=="ADD" ? "SUBMIT" : "UPDATE")?>
					</button>
				</form>
			</div>
		</div>
	</div>
@endsection