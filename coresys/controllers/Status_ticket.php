<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_ticket extends MY_Controller {
    var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
    }
    
    /**
	 * View method
	 */
    public function index() {
        return view('pages/status_ticket/index', $this->data);
    }

    function diff($a1, $a2) {
        $awal  = date_create($a1);
        $akhir = date_create($a2); // waktu sekarang
        $diff  = date_diff($awal, $akhir);

        // return $diff;
        return sprintf('%02d', $diff->h).':'.sprintf('%02d', $diff->i).':'.sprintf('%02d', $diff->s);
    }

    function check_data() {
		$sql = "
			SELECT 
				COUNT(*) as cnt
			FROM master_ticket 
			WHERE updated='true'";
            $row = $this->db->query($sql)->row()->cnt;
		
		echo $row;
    }
    
    function update_status() {
		$sql = "UPDATE `master_ticket` SET `updated`='false' WHERE 1";
		$res = $this->db->query($sql);
		
		if (!$res) {
			echo "failed";
		} else {
			echo "success";
		}
	}

    public function show_table() {
        $date = (isset($_GET['date']) ? $_GET['date'] : date("Y-m-d"));
        $query = "SELECT * FROM master_ticket WHERE entry_date LIKE '%".$date."%'";
        $res = $this->db->query($query);

        // print_r($res);

        $list = array();
		$i = 0;
		foreach($res->result() as $r) {
			$list[$i]['id'] = $r->id;
			$list[$i]['ticket_id'] = $r->ticket_id;
			$list[$i]['status'] = $r->status;
			$list[$i]['atm_id'] = $r->atm_id;
            $list[$i]['action_taken'] = $r->action_taken;
            
			$list[$i]['entry_date'] = $r->entry_date;
			$list[$i]['selisih1'] = $this->diff($r->entry_date, $r->accept_time);
			$list[$i]['accept_time'] = $r->accept_time;
			$list[$i]['selisih2'] = $this->diff($r->accept_time, $r->end_job);
			$list[$i]['end_job'] = $r->end_job;
			$list[$i]['problem'] = $r->problem_type;
			$list[$i]['pic'] = $r->pic;
			$i++;
        }
        
        $table = '';
		$table_ctnt = '';
		$table_status = '';
		
		
		$atm = function($id, $field) {
			error_reporting(0);
			$atm = $this->db->query("SELECT $field FROM master_atm WHERE (id='$id' OR idatm='$id')")->row();
			$atm = (array) $atm;
			return $atm[$field];
		};
		
		$bank = function($id) {
			$nama = $this->db->query("SELECT nama FROM master_client WHERE id='$id'")->row()->nama;
			
			return $nama;
		};
		
		$pic = function($id) {
			$nama = $this->db->query("SELECT nama FROM master_staff WHERE id='$id'")->row()->nama;
			
			return $nama;
		};
		
		$no = 1; 
		foreach ($list as $d) {
			if($d['accept_time']=="" && $d['action_taken']=="") {
				$table_status = '<span class="badge_style b_pending">Waiting PIC</span>';
			} else if($d['accept_time']!=="" && $d['action_taken']=="") {
				$table_status = '<span class="badge_style b_medium">Job Accepted</span>';
			}  else if($d['accept_time']!=="" && $d['action_taken']!=="") {
				if($d['status']=="done") {
					$table_status = '<span class="badge_style b_done">JOB DONE</span> <a href="'.base_url().'report_jobcard/get_data_report/'.$d['ticket_id'].'" target="_blank"><span class="badge_style b_done">Detail</span></a>';
				} else if($d['status']=="pending-sparepart") {
					$table_status = '<span class="badge_style b_away">JOB PENDING SPAREPART</span>';
				} else if($d['status']=="pending-pekerjaan") {
					$table_status = '<span class="badge_style b_suspend">Refer to SLM</span>';
				} else {
					$table_status = '<span class="badge_style b_away">DONE</span>';
				}
            }

            $table_ctnt .= '
				<tr>
					<td>'.$no.'</td>
					<td>
                        <table class="table display table-bordered" style="width: 100%">
							<tr>
								<td style="width: 120px">Ticket</td>
								<td style="width: 10px"> : </td>
								<td>'.$d['ticket_id'].'</td>
							</tr>
							<tr>
								<td>Bank</td>
								<td> : </td>
								<td>'.$bank($atm($d['atm_id'], 'id_bank')).'</td>
							</tr>
							<tr>
								<td>Lokasi</td>
								<td> : </td>
								<td>'.$atm($d['atm_id'], 'lokasi').'</td>
							</tr>
							<tr>
								<td>Problem</td>
								<td> : </td>
								<td>'.$d['problem'].'</td>
							</tr>
						</table>
					</td>
					<td style="vertical-align: top">
                        <table class="table display table-bordered" style="width: 100%">
							<tr>
								<td style="width: 120px">Entry Date</td>
								<td style="width: 10px"> : </td>
								<td>'.date("d-m-Y", strtotime($d['entry_date'])).'</td>
							</tr>
							<tr>
								<td>Entry Time</td>
								<td> : </td>
								<td>'.date("H:i:s", strtotime($d['entry_date'])).'</td>
							</tr>
							<tr>
								<td>Response</td>
								<td> : </td>
								<td><span id="demo1'.$d['id'].'">'.$d['selisih1'].'</span></td>
							</tr>
							<tr>
								<td>PIC</td>
								<td> : </td>
								<td>'.$pic($d['pic']).'</td>
							</tr>
						</table>
					</td>
					<td style="vertical-align: top">
                        <table class="table display table-bordered" style="width: 100%">
							<tr>
								<td>Close Date</td>
								<td> : </td>
								<td>'.($d['end_job']=="" ? "-" : date("d-m-Y", strtotime($d['end_job']))).'</td>
							</tr>
							<tr>
								<td>Close Time</td>
								<td> : </td>
								<td>'.($d['end_job']=="" ? "-" : date("H:i:s", strtotime($d['end_job']))).'</td>
							</tr>
							<tr>
								<td>Resolution</td>
								<td> : </td>
								<td><span id="demo2'.$d['id'].'">'.($d['end_job']=="" ? "-" : $d['selisih2']).'</span></td>
							</tr>
							<tr>
								<td>Status Job</td>
								<td> : </td>
								<td>'.$d['status'].'</td>
							</tr>
						</table>
					</td>
					<td style="text-align: center">'.$table_status.'</td>
				</tr>
			';
			
			$no++; 
        }

        $table_arry = '';
		foreach ($list as $d) { 
			$table_arry .= '
				{
					id: "'.$d['id'].'",
					entry_date: "'.$d['entry_date'].'",
					distance1: new Date("'.date('M j, Y H:i:s', strtotime($d['entry_date'])).'").getTime(),
					accept_time: "'.$d['accept_time'].'",
					distance2: new Date("'.date('M j, Y H:i:s', strtotime($d['accept_time'])).'").getTime(),
					end_apply: "'.$d['end_job'].'"
				},
			';
        } 
        
        $table .= '<br>
			<div style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%);">
				<h4 style="color:white; padding: 16px">ISSUE TICKETS/PROBLEM TANGGAL : '.date("d-m-Y", strtotime($date)).'</h4>
				<div class="view" style="margin-bottom: 20px">
					<div class="wrapper" style="margin-top: 0px">
						<table class="table display table-bordered" style="width: 100%">
							<tbody>
                                <tr>
                                    <td  style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%); text-align: center;"><b style="color:white;font-size:14px; margin: 0px 0px 0px 0px;">No</b></td>
                                    <td style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%); text-align: center;"><b style="color:white;font-size:14px; margin: 0px 0px 0px 0px;">Ticket Description</b></td>
                                    <td colspan="2"  style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%); text-align: center;"><b style="color:white;font-size:14px; margin: 0px 0px 0px 0px;">Repair Time</b></td>
                                    <td style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%); text-align: center;"><b style="color:white;font-size:14px; margin: 0px 0px 0px 0px;">Status Ticket</b></td>
                                </tr>
								'.$table_ctnt.'
							</tbody>
						</table>
					</div>
				</div>
				
				<script>
					var countdowns = [
						'.$table_arry.'
                    ];
                    
                    console.log(countdowns);
					
					var timer = setInterval(function() {
						// Get todays date and time
						var now = Date.now();

						var index = countdowns.length - 1;

						// we have to loop backwards since we will be removing
						// countdowns when they are finished
						while(index >= 0) {
							var countdown = countdowns[index];
							
							// console.log(countdown.accept_time);

							// Find the distance between now and the count down date
							
							if(countdown.accept_time=="") {
								var distance1 = now - countdown.distance1;
								// Time calculations for days, hours, minutes and seconds
								var days1 = Math.floor(distance1 / (1000 * 60 * 60 * 24));
								var hours1 = Math.floor((distance1 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
								var minutes1 = Math.floor((distance1 % (1000 * 60 * 60)) / (1000 * 60));
								var seconds1 = Math.floor((distance1 % (1000 * 60)) / 1000);

								var timerElement1 = document.getElementById("demo1" + countdown.id);
								// If the count down is over, write some text 
								if (distance1 < 0) {
									timerElement1.innerHTML = "EXPIRED";
									// this timer is done, remove it
									countdowns.splice(index, 1);
								} else {
									timerElement1.innerHTML =  days1 + "d " + hours1 + "h " + minutes1 + "m " + seconds1 + "s "; 
								}
							}
							
							if(countdown.end_apply=="" && countdown.accept_time!="") {
								var distance2 = now - countdown.distance2;
								// Time calculations for days, hours, minutes and seconds
								var days2 = Math.floor(distance2 / (1000 * 60 * 60 * 24));
								var hours2 = Math.floor((distance2 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
								var minutes2 = Math.floor((distance2 % (1000 * 60 * 60)) / (1000 * 60));
								var seconds2 = Math.floor((distance2 % (1000 * 60)) / 1000);
								
								var timerElement2 = document.getElementById("demo2" + countdown.id);
								// If the count down is over, write some text 
								if (distance2 < 0) {
									timerElement2.innerHTML = "EXPIRED";
									// this timer is done, remove it
									countdowns.splice(index, 1);
								} else {
									timerElement2.innerHTML =  days2 + "d " + hours2 + "h " + minutes2 + "m " + seconds2 + "s "; 
								}
							}

							index -= 1;
						}

						// if all countdowns have finished, stop timer
						if (countdowns.length < 1) {
							clearInterval(timer);
						}
					}, 1000);
				</script>
			</div>
		';
		
		echo $table;
    }
}