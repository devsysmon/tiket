@extends('layouts_seipkon.master')

@section('stylesheet')
@endsection

@section('javascript')
	
	<script>
		var table;
		$(document).ready(function(e){
			var base_url = "<?php echo base_url();?>"; // You can use full url here but I prefer like this
			console.log(base_url + 'master_user/get_data');
			table = $('#datatable').DataTable({
				"pageLength" : 10,
				"serverSide": true,
				"order": [[1, "asc" ]],
				"columnDefs": [{"orderable": false, "targets": 0}],
				"ajax":{
					url :  base_url + 'master_user/get_data',
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
	</script>
@endsection

@section('content')
	<div class="container-fluid">
		<!-- Breadcromb Row Start -->
		<br>
		<a href="<?=base_url()?>report" class="btn btn-primary pull-right" style="margin-top: -5px"><img style="float: left; margin: 2px 5px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/navigation-180.png" height="25" width="20" /><b>Back To Report</b></a>
		<div class="row">
			<div class="col-md-12">
				<div class="breadcromb-area">
					
					<div class="datatables-example-heading">
						
						<img style="float: left; margin: 0px 15px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/report.png" height="45" width="45" /><h3>Cleaning Report</h3>
					</div>
					<div class="table-responsive advance-table">
						
						<?php 
							$array = array(
								"Body ATM Bersih dan tidak berdebu", 
								"ATM Berfungsi / Online", 
								"Brosur ATM tertata rapih",
								"Layar monitor bersih dan terlihat jelas tampilannya",
								"Pin pad ATM bersih dan tidak berdebu",
								"Boot ATM bersih, tidak ada noda atau debu",
								"Sticker ATM tidak terkelupas, pudar atau hilang",
								"Tertera sticker kartu, receipt printer, uang keluar, nominal pecahan uang",
								"Terdapat sticker larangan memakai helm, masker, kacamata gelap, topi, rokok",
								"Terdapat informasi ketersediaan mesin ATM BNI terdekat",
								"Lampu boot ATM menyala",
								"Lampu ruangan ATM menyala dengan baik",
								"Tempat sampah bersih dan tidak ada sampah",
								"Teras ruangan ATM bersih dan tidak rusak",
								"Dinding kaca ruangan bersih",
								"Dinding tembok ruangan bersih",
								"Atap ruangan tidak terbuka dan bocor",
								"AC ruangan ATM bersih, dingin, dan tidak bocor",
								"Peralatan, Kabel rapih dan tidak berantakan",
								"Pintu ATM bersih dan berfungsi dengan baik",
								"Pegangan pintu terpasang dengan baik",
								"Terdapat sticker tarik dan dorong",
								"Teras luar bersih",
								"Dinding luar bersih",
								"Lampu luar menyala",
								"Sticker dinding kaca dan pintu kaca menempel dengan baik",
								"Neon box menyala dan bersih",
								"Box panel listrik terkunci",
								"Token listrik masih tersedia atau tidak",
								"Kamera CCTV",
								"DVR CCTV",
								"UPS",
								"Integrated Transformer",
								"AC",
								"Sticker Kaca",
								"Sticker Mesin",
								"Neon Sign"
							);
						
							if(count($array_report)==0) echo "<center>NO DATA</center>"; 
							echo '<table class="table display table-bordered">';
							$nox = 0;
							$last_key = "";
							$dum_arr = array();
							foreach ($array_report as $k => $r){
								$no = 0;
								echo '<tr>';
								foreach($r as $s) {
									if($no==0) {
										if($nox==0) {
											
										} else if($nox==1) {
										} else {
											echo '<td>'.($nox-1).'</td>';
										}
									}
									
									if($no==0) {
										if($nox==0) {
											echo '<td rowspan=2 colspan=2 style="font-size:14px; text-align:center;"><b>ITEM CLEANING</b></td>';
										} else if($nox>1) {
											echo '<td>'.$array[$nox-2].'</td>';
										}
									}
									
									if($nox==0) { 
										if($s == $last_key) {
											$dum_arr[] = $s;
										}
										
										if(!in_array($s, $dum_arr)) {
											echo '<th colspan=2 style="text-align: center">'.$s.'</th>';
										}
										
										$last_key = $s;
									} else {
										echo '<td style="text-align: center">'.$s.'</td>';
									}
									$no++;
								}
								echo '</tr>';
								$nox++;
							}
							echo '</table>';
							
							// if(count($array_report)==0) echo "<center>NO DATA</center>"; 
							// echo '<table class="table display table-bordered">';
							// $nox = 0;
							// $last_key = "";
							// $dum_arr = array();
							// foreach ($array_report as $r){
								// echo '<tr>';
								// $no = 0;
								// foreach ($r as $c){
									// if($no==0) {
										// if($nox==0) {
										// } else if($nox==1) {
										// } else {
											// echo '<td>'.($nox-1).'</td>';
										// }
									// }
									
									// if($nox==0) { 
										// if($c == $last_key) {
											// $dum_arr[] = $c;
										// }
										
										// if(!in_array($c, $dum_arr)) {
											// echo '<td colspan=2>'.$c.'</td>';
										// }
										
										// $last_key = $c;
									// } else {
										// echo '<td>'.$c.'</td>';
									// }
									
									// if($no==0) {
										// if($nox==0) {
											// echo '<td rowspan=2 colspan=2 style="font-size:14px; text-align:center;"><b>ITEM CLEANING</b></td>';
										// } else if($nox==1) {
											// // JANGAN DIISI
										// } else if($nox==2) {
											// echo '<td>Body ATM Bersih dan tidak berdebu</td>';
										// } else if($nox==3) {
											// echo '<td>ATM Berfungsi / Online</td>';
										// } else if($nox==4) {
											// echo '<td>Brosur ATM tertata rapih</td>';
										// } else if($nox==5) {
											// echo '<td>Layar monitor bersih dan terlihat jelas tampilannya</td>';
										// } else if($nox==6) {
											// echo '<td>Pin pad ATM bersih dan tidak berdebu</td>';
										// } else if($nox==7) {
											// echo '<td>Boot ATM bersih, tidak ada noda atau debu</td>';
										// } else if($nox==8) {
											// echo '<td>Sticker ATM tidak terkelupas, pudar atau hilang</td>';
										// } else if($nox==9) {
											// echo '<td>Tertera sticker kartu, receipt printer, uang keluar, nominal pecahan uang</td>';
										// } else if($nox==10) {
											// echo '<td>Terdapat sticker larangan memakai helm, masker, kacamata gelap, topi, rokok</td>';
										// } else if($nox==11) {
											// echo '<td>Terdapat informasi ketersediaan mesin ATM BNI terdekat</td>';
										// } else if($nox==12) {
											// echo '<td>Lampu boot ATM menyala</td>';
										// } else if($nox==13) {
											// echo '<td>Lampu ruangan ATM menyala dengan baik</td>';
										// } else if($nox==14) {
											// echo '<td>Tempat sampah bersih dan tidak ada sampah</td>';
										// } else if($nox==15) {
											// echo '<td>Teras ruangan ATM bersih dan tidak rusak</td>';
										// } else if($nox==16) {
											// echo '<td>Dinding kaca ruangan bersih </td>';
										// } else if($nox==17) {
											// echo '<td>Dinding tembok ruangan bersih</td>';
										// } else if($nox==18) {
											// echo '<td>Atap ruangan tidak terbuka dan bocor</td>';
										// } else if($nox==19) {
											// echo '<td>AC ruangan ATM bersih, dingin, dan tidak bocor</td>';
										// } else if($nox==20) {
											// echo '<td>Peralatan, Kabel rapih dan tidak berantakan</td>';
										// } else if($nox==21) {
											// echo '<td>Pintu ATM bersih dan berfungsi dengan baik</td>';
										// } else if($nox==22) {
											// echo '<td>Pegangan pintu terpasang dengan baik</td>';
										// } else if($nox==23) {
											// echo '<td>Terdapat sticker tarik dan dorong</td>';
										// } else if($nox==24) {
											// echo '<td>Teras luar bersih</td>';
										// } else if($nox==25) {
											// echo '<td>Dinding luar bersih</td>';
										// } else if($nox==26) {
											// echo '<td>Lampu luar menyala</td>';
										// } else if($nox==27) {
											// echo '<td>Sticker dinding kaca dan pintu kaca menempel dengan baik</td>';
										// } else if($nox==28) {
											// echo '<td>Neon box menyala dan bersih</td>';
										// } else if($nox==29) {
											// echo '<td>Box panel listrik terkunci</td>';
										// } else if($nox==30) {
											// echo '<td>Token listrik masih tersedia atau tidak</td>';
										// } else if($nox==31) {
											// echo '<td>Kamera CCTV</td>';
										// } else if($nox==32) {
											// echo '<td>DVR CCTV</td>';
										// } else if($nox==33) {
											// echo '<td>UPS</td>';
										// } else if($nox==34) {
											// echo '<td>Integrated Transformer</td>';
										// } else if($nox==35) {
											// echo '<td>AC</td>';
										// } else if($nox==36) {
											// echo '<td>Sticker Kaca</td>';
										// } else if($nox==37) {
											// echo '<td>Sticker Mesin</td>';
										// } else if($nox==38) {
											// echo '<td>Neon Sign</td>';
										// } else {
											// echo '<td>'.$nox.'</td>';
										// }
									// }
									// echo '<td>'.$c.'</td>';
									
									// $no++;
								// }
								// echo '</tr>';
								// $nox++;
							// }
							// echo '</table>';
						?>
					</div>
				
			
				</div>
				
			</div>
		
		</div>
		<!-- End Breadcromb Row -->
		
		
		<!-- End Advance Table Row -->
	</div>
@endsection