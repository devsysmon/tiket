@extends('layouts_seipkon.master')

@section('stylesheet')
@endsection

@section('javascript')
	<!-- jQuery -->
      <script src="<?=base_url()?>seipkon/assets/js/jquery-3.1.0.min.js"></script>
      <!-- Bootstrap JS -->
      <script src="<?=base_url()?>seipkon/assets/plugins/bootstrap/bootstrap.min.js"></script>
      <!-- Perfect Scrollbar JS -->
      <script src="<?=base_url()?>seipkon/assets/plugins/perfect-scrollbar/jquery-perfect-scrollbar.min.js"></script>
      <!-- Toggles JS -->
      <script src="<?=base_url()?>seipkon/assets/plugins/masked-input/js/jquery.maskedinput.min.js"></script>
      <!-- Select2 JS -->
      <script src="<?=base_url()?>seipkon/assets/plugins/select2/js/select2.full.js"></script>
      <!-- Jquery parsley JS -->
      <script src="<?=base_url()?>seipkon/assets/plugins/parsley/js/parsley.min.js"></script>
      <!-- Custom JS -->
      <script src="<?=base_url()?>seipkon/assets/js/seipkon.js"></script>
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
						<img style="float: left; margin: -5px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/adddata.png" height="35" width="30" /><h3>Data User Access</h3>
						<div class="form-validation-box">
							<div class="form-wrap">
								<form data-parsley-validate method="post" action="<?=base_url().explode("/", $that->uri->uri_string())[0].'/'.(strtoupper(explode("/", $that->uri->uri_string())[1])=="ADD" ? "insert" : "update")?>">
									<input type="hidden" class="form-control" id="id" name="id" placeholder="" value="<?=$id?>">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">Username:</label>
												<input type="text" placeholder="Username" class="form-control" id="username" name="username" value="<?=$username?>" required>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">Password:</label>
												<input type="password" placeholder="Password" class="form-control" id="password" name="password" value="<?=$password?>" required>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">Level:</label>
												<div id="slWrapper" class="parsley-select wd-250">
													<select class="form-control" data-placeholder="Choose one" data-parsley-class-handler="#slWrapper" data-parsley-errors-container="#slErrorContainer" id="level" name="level" required>
														<option value="">Choose...</option>
														<option <?=($level=="ADMIN" ? "selected" : "")?>>ADMIN</option>
														<option <?=($level=="USER" ? "selected" : "")?>>USER</option>
													</select>
													<div id="slErrorContainer"></div>
												</div>
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