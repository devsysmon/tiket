<!DOCTYPE html>

<?php 
	$date = $res->entry_date;
	$date = date("y/m/d", strtotime($date));
	$layanan = $res->problem_type;
	$layanan = explode(' - ', $layanan);
	$pm = "";
	$cm = "";
	$in = "";
	$mk = "";
	$pm = "";
	if($layanan[0]=="PM") {
		$pm = "V";
	}
	if($layanan[0]=="CM") {
		$cm = "V";
	}
	if($layanan[0]=="IN") {
		$in = "V";
	}
	if($layanan[0]=="MK") {
		$mk = "V";
	}
	
	$date_entry = date_create($res->entry_date);
	$time_entry = date_format($date_entry, "H:i");
	$day_entry = date_format($date_entry, "d");
	$month_entry = date_format($date_entry, "m");
	$year_entry = date_format($date_entry, "Y");
	
	$date_arrival = date_create($res->arrival_time);
	$time_arrival = date_format($date_arrival, "H:i");
	$day_arrival = date_format($date_arrival, "d");
	$month_arrival = date_format($date_arrival, "m");
	$year_arrival = date_format($date_arrival, "Y");
	
	$date_start = date_create($res->start_job);
	$time_start = date_format($date_start, "H:i");
	$day_start = date_format($date_start, "d");
	$month_start = date_format($date_start, "m");
	$year_start = date_format($date_start, "Y");
	
	$date_end = date_create($res->end_job);
	$time_end = date_format($date_end, "H:i");
	$day_end = date_format($date_end, "d");
	$month_end = date_format($date_end, "m");
	$year_end = date_format($date_end, "Y");
	
	$date_leave = date_create($res->leave_time);
	$time_leave = date_format($date_leave, "H:i");
	$day_leave = date_format($date_leave, "d");
	$month_leave = date_format($date_leave, "m");
	$year_leave = date_format($date_leave, "Y");
	
	$action_taken = json_decode($res->action_taken, true)['action_taken'];
	$without_breaks = str_replace(array('<ol>', '<li>', '</ol>', '</li>', '<li __plugindomid="pgm1418961401523">'), '-', $action_taken);
	$res_action = array_filter(explode("--", $without_breaks));
	
	// echo "<pre>";
	// print_r(json_decode($res->action_taken, true)['form1']);
?>



<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8"/>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	</head>
	<body style="margin:0px;padding:0px;overflow:hidden">
		<iframe class="preview-pane" type="application/pdf" frameborder="0" style="overflow:hidden;overflow-x:hidden;overflow-y:hidden;height:100%;width:100%;position:absolute;top:0px;left:0px;right:0px;bottom:0px" height="100%" width="100%"></iframe>
	</body>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
	<script>
		var demo = "TEXT DEMO";
		var doc = new jsPDF("p", "mm", "a4");
		
		var myImage = new Image();
		myImage.src = '<?=base_url()?>assets/jobcard/bg1.png';
		myImage.onload = function(){
			doc.addImage(myImage, 'PNG', 8, 18, 195, 265, null, 'FAST');
			
			text();
			
			var string = doc.output('bloburi');
			$('.preview-pane').attr('src', string);
		};
		
		
		function text() {
			doc.setFont("times");
			doc.setFontType("normal");
			// TICKET NUMBER
			doc.text(167, 53.6, ''); // NOMOR JOBCARD
			
			doc.setFontSize(8);
			// KETERANGAN PELANGGAN
			doc.text(37, 69.5, '<?=$res->nama?>'); // PERUSAHAAN
			doc.text(37, 76.4, '<?=$res->cabang?>'); // CABANG
			doc.text(37, 83.2, '<?=$res->idatm?>'); // ATM ID
			doc.text(37, 90.2, '<?=$res->alamat?>'); // ALAMAT
			doc.text(37, 96.6, ''); // TELP. & FAX
			
			// KETERANGAN MESIN
			doc.setFontSize(6.5);
			doc.text(181, 67.4, '<?=$res->ticket_id?>'); // NOMOR TICKET
			doc.setFontSize(8);
			doc.text(108, 78.8, '<?=$res->type_mesin?>'); // TYPE
			doc.text(133, 78.8, '<?=$res->merk_mesin?>'); // MODEL NO.
			doc.text(166.7, 78.8, '<?=$res->sn_mesin?>'); // SERIAL NO.
			doc.text(139.5, 85, demo); // KERUSAKAN DILAPORKAN
			doc.text(130.5, 95, demo); // DILAPORKAN OLEH
			
			doc.setFontSize(10);
			doc.text(184.6, 97, '<?=$date?>'); // TANGGAL & JAM
			
			doc.text(48.5, 113.8, "<?=$pm?>"); // JENIS LAYANAN PM
			doc.text(48.5, 120.8, "<?=$in?>"); // JENIS LAYANAN IN
			doc.text(99.7, 113.8, "<?=$cm?>"); // JENIS LAYANAN CM
			doc.text(99.7, 120.8, "<?=$mk?>"); // JENIS LAYANAN MK
			
			doc.setFontSize(8);
			doc.text(163, 113.3, "<?=$layanan[1]?>"); // JENIS KERUSAKAN
			
			doc.setLineWidth(0.3);
			<?php 
				if($layanan[1]=="ATM") {
			?>
					doc.ellipse(158, 120.8, 3.5, 3.5);
			<?php 
				} else if($layanan[1]=="SUP") {
			?>
					doc.ellipse(165.6, 120.8, 3.5, 3.5);
			<?php 
				} else if($layanan[1]=="PWR") {
			?>
					doc.ellipse(173.3, 120.8, 3.5, 3.5);
			<?php 
				} else if($layanan[1]=="COM") {
			?>
					doc.ellipse(181, 120.8, 3.5, 3.5);
			<?php 
				} else if($layanan[1]=="ENV") {
			?>
					doc.ellipse(188.7, 120.8, 3.5, 3.5);
			<?php 
				} else if($layanan[1]=="NON") {
			?>
					doc.ellipse(196.3, 120.8, 3.5, 3.5);
			<?php 
				}
			?>
			
			// PEKERJAAN
			doc.setFontSize(8);
			// WAKTU PENUGASAN
			doc.text(41.8, 144.4, "<?=$time_entry?>"); // JAM
			doc.text(58.5, 144.4, "<?=$day_entry?>"); // TANGGAL
			doc.text(73.5, 144.4, "<?=$month_entry?>"); // TANGGAL
			doc.text(87.5, 144.4, "<?=$year_entry?>"); // TAHUN
			
			
			doc.text(41.8, 150.4, "<?=$time_arrival?>");  // JAM
			doc.text(58.5, 150.4, "<?=$day_arrival?>"); // TANGGAL
			doc.text(73.5, 150.4, "<?=$month_arrival?>"); // TANGGAL
			doc.text(87.5, 150.4, "<?=$year_arrival?>"); // TAHUN
			
			
			doc.text(41.8, 156.4, "<?=$time_start?>");  // JAM
			doc.text(58.5, 156.4, "<?=$day_start?>"); // TANGGAL
			doc.text(73.5, 156.4, "<?=$month_start?>"); // TANGGAL
			doc.text(87.5, 156.4, "<?=$year_start?>"); // TAHUN
			
			
			doc.text(41.8, 162.4, "<?=$time_end?>");  // JAM
			doc.text(58.5, 162.4, "<?=$day_end?>"); // TANGGAL
			doc.text(73.5, 162.4, "<?=$month_end?>"); // TANGGAL
			doc.text(87.5, 162.4, "<?=$year_end?>"); // TAHUN
			
			
			doc.text(41.8, 168.4, "<?=$time_leave?>");  // JAM
			doc.text(58.5, 168.4, "<?=$day_leave?>"); // TANGGAL
			doc.text(73.5, 168.4, "<?=$month_leave?>"); // TANGGAL
			doc.text(87.5, 168.4, "<?=$year_leave?>"); // TAHUN
			
			
			doc.text(41.8, 174.4, ""); // WAKTU MENUNGGU
			doc.text(60, 174.6, ""); // TANGGAL
			
			
			// doc.text(102, 144.4, "# CHECK DISPENSER"); // PEKERJAAN DILAKUKAN
			// doc.text(102, 150.4, "# CHECK DISPENSER"); // PEKERJAAN DILAKUKAN
			// doc.text(102, 156.4, "# CHECK DISPENSER"); // PEKERJAAN DILAKUKAN
			// doc.text(102, 162.4, "# CHECK DISPENSER"); // PEKERJAAN DILAKUKAN
			// doc.text(102, 168.4, "# CHECK DISPENSER"); // PEKERJAAN DILAKUKAN
			// doc.text(102, 174.6, "# CHECK DISPENSER"); // PEKERJAAN DILAKUKAN
			
			var i = 0;
			<?php 
				foreach($res_action as $r) { 		
			?>
					doc.text(102, 145+(i*6), "# <?=$r?>");
					i++;
			<?php 
				} 
			?>
			
			
			// POWER LISTRIK
			doc.text(25, 194.6, "220"); 
			doc.text(25, 199.3, "219"); 
			doc.text(25, 203.6, "1,0"); 
			doc.text(25, 208.4, "ADA"); 
			doc.text(25, 213.1, "ADA"); 
			doc.text(25, 217.8, "18"); 
			doc.text(23, 222.2, "UPS BATTERY MULAI LEMAH"); 
			
			
			var i = 0;
			<?php 
				foreach(json_decode($res->action_taken, true)['action']['form1'] as $r) {
					if($r[0]=="diag") { ?>
						doc.text(76, 189+(i*3.6), "V");
				<?php
					} else if($r[0]=="align") { ?>
						doc.text(82.5, 189+(i*3.6), "V");
				<?php
					} else if($r[0]=="replace") { ?>
						doc.text(91, 189+(i*3.6), "V");
				<?php
					}
				?>
					i++;
			<?php
				}
			?>
			
			var j = 51;
			var i = 0;
			<?php 
				foreach(json_decode($res->action_taken, true)['action']['form2'] as $r) {
					if($r[0]=="diag") { ?>
						doc.text(76+j, 189+(i*3.6), "V");
				<?php
					} else if($r[0]=="align") { ?>
						doc.text(82.5+j, 189+(i*3.6), "V");
				<?php
					} else if($r[0]=="replace") { ?>
						doc.text(91+j, 189+(i*3.6), "V");
				<?php
					}
				?>
					i++;
			<?php
				}
			?>
			
			var j = 102;
			var i = 0;
			<?php 
				foreach(json_decode($res->action_taken, true)['action']['form3'] as $r) {
					if($r[0]=="diag") { ?>
						doc.text(76+j, 189+(i*3.6), "V");
				<?php
					} else if($r[0]=="align") { ?>
						doc.text(82.5+j, 189+(i*3.6), "V");
				<?php
					} else if($r[0]=="replace") { ?>
						doc.text(91+j, 189+(i*3.6), "V");
				<?php
					}
				?>
					i++;
			<?php
				}
			?>
			// for(var i=0; i<10; i++) {
				// doc.text(76, 189+(i*3.2), "V");
				// doc.text(82.5, 189+(i*3.2), "V");
				// doc.text(91, 189+(i*3.2), "V");
			// }
			
			// var j = 51;
			// for(var i=0; i<10; i++) {
				// doc.text(76+j, 189+(i*3.2), "V");
				// doc.text(82.5+j, 189+(i*3.2), "V");
				// doc.text(91+j, 189+(i*3.2), "V");
			// }
			
			// var j = 102;
			// for(var i=0; i<10; i++) {
				// doc.text(76+j, 189+(i*3.2), "V");
				// doc.text(82.5+j, 189+(i*3.2), "V");
				// doc.text(91+j, 189+(i*3.2), "V");
			// }
		}
	</script>
</html>

