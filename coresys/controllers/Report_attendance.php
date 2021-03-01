<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class report_attendance extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}
	
	public function index() {
		$month_year = $this->input->get('month_year');
		if(isset($month_year)){
			$this->data['default_dateZ'] = $month_year;
		} else {
			$this->data['default_dateZ'] = date("Y-m");
		}
		$this->data['resourcess'] = $this->get_resourcess();
		$this->data['eventss'] = $this->get_eventss();
		return view('pages/report_attendance/index', $this->data);
	}
	
	public function export() {
		$month_year = $this->input->get('month_year');
		if(isset($month_year)){
			$this->data['default_dateZ'] = $month_year;
		} else {
			$this->data['default_dateZ'] = date("Y-m");
		}
		$this->data['resourcess'] = $this->get_resourcess();
		$this->data['eventss'] = $this->get_eventss();
		return view('pages/report_attendance/export', $this->data);
		
		$reader = new \PhpOffice\PhpSpreadsheet\Reader\Html();
		$spreadsheet = $reader->loadFromString($htmlString);


		$myWorkSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'My Data');

		$spreadsheet->addSheet($myWorkSheet, 1);

		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="file.xlsx"');
		$writer->save("php://output");
	}
	
	public function AAAAA() {

		$reader = new \PhpOffice\PhpSpreadsheet\Reader\Html();
		$spreadsheet = $reader->loadFromString($htmlString1);


		$myWorkSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'My Data');

		$spreadsheet->addSheet($myWorkSheet, 1);

		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="file.xlsx"');
		$writer->save("php://output");
	}
	
	public function check() {
		$res = $this->db->query('SELECT * FROM master_staff')->result();
		echo "<pre>";
		print_r($res);
		$res = $this->db->query('SELECT * FROM master_attendance_time')->result();
		echo "<pre>";
		print_r($res);
	}
	
	public function shift($index) {
		$data = array(
			"pagi" => array(
				"monday_in_time" => "08:00",
				"monday_out_time" => "18:00",
				"tuesday_in_time" => "08:00",
				"tuesday_out_time" => "18:00",
				"wednesday_in_time" => "08:00",
				"wednesday_out_time" => "18:00",
				"thursday_in_time" => "08:00",
				"thursday_out_time" => "18:00",
				"friday_in_time" => "08:00",
				"friday_out_time" => "18:00",
				"saturday_in_time" => "",
				"saturday_out_time" => "",
				"sunday_in_time" => "",
				"sunday_out_time" => "",
			),
			"malam" => array(
				"monday_in_time" => "07:00",
				"monday_out_time" => "19:00",
				"tuesday_in_time" => "07:00",
				"tuesday_out_time" => "19:00",
				"wednesday_in_time" => "07:00",
				"wednesday_out_time" => "19:00",
				"thursday_in_time" => "07:00",
				"thursday_out_time" => "19:00",
				"friday_in_time" => "07:00",
				"friday_out_time" => "19:00",
				"saturday_in_time" => "",
				"saturday_out_time" => "",
				"sunday_in_time" => "",
				"sunday_out_time" => "",
			),
		);
		
		return $data[$index];
	}
	
	public function attend_list() {
		$karyawan = function($param) {
			if($param=="all") {
				$res = $this->db->query("SELECT * FROM master_staff");
				return $res->result();
			} else if($param=="num_row") {
				$res = $this->db->query("SELECT count(*) as cnt FROM master_staff")->row();
				return $res->cnt;
			}
		};
		
		$first_in_check = function($employee_id, $attendance_date) {
			$sql = 'SELECT * FROM master_attendance_time WHERE employee_id = ? and attendance_date = ? limit 1';
			$binds = array($employee_id, $attendance_date);
			$query = $this->db->query($sql, $binds);

			return $query;
		};
		
		$first_out_check = function($employee_id, $attendance_date) {
			$sql = 'SELECT * FROM master_attendance_time WHERE employee_id = ? and attendance_date = ? order by time_attendance_id desc limit 1';
			$binds = array($employee_id,$attendance_date);
			$query = $this->db->query($sql, $binds);
			
			return $query;
		};
		
		$first_in = function($employee_id, $attendance_date) {
			$sql = 'SELECT * FROM master_attendance_time WHERE employee_id = ? and attendance_date = ?';
			$binds = array($employee_id, $attendance_date);
			$query = $this->db->query($sql, $binds);
			
			return $query->result();
		};
		
		$first_out = function($employee_id, $attendance_date) {
			$sql = 'SELECT * FROM master_attendance_time WHERE employee_id = ? and attendance_date = ? order by time_attendance_id desc limit 1';
			$binds = array($employee_id,$attendance_date);
			$query = $this->db->query($sql, $binds);
			
			return $query->result();
		};
		
		$total_hours_worked_attendance = function($employee_id, $attendance_date) {
			$sql = 'SELECT * FROM master_attendance_time WHERE employee_id = ? and attendance_date = ? and total_work != ""';
			$binds = array($employee_id, $attendance_date);
			$query = $this->db->query($sql, $binds);
			
			return $query;
		};
		
		// $data = function($param, $id, $date) {
			// if($param=="all"
				// $this->db->query("SELECT * FROM master_attendance");
			// }
		// };
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		// print_r($karyawan("all"));
		
		$no = 0;
		foreach($karyawan("all") as $r) {
			$no++;
			$full_name = $r->nama;
			$attendance_date = date("Y-m-d");
			$get_day = strtotime($attendance_date);
			$day = date('l', $get_day);
			
			$d_date = date("d-m-Y", strtotime($attendance_date));
			$office_shift = $this->shift('pagi');
			if(!is_null($office_shift)) {
				if($day == 'Monday') {
					if($office_shift['monday_in_time']=='') {
						$in_time = '00:00:00';
						$out_time = '00:00:00';
					} else {
						$in_time = $office_shift['monday_in_time'];
						$out_time = $office_shift['monday_out_time'];
					}
				} else if($day == 'Tuesday') {
					if($office_shift['tuesday_in_time']=='') {
						$in_time = '00:00:00';
						$out_time = '00:00:00';
					} else {
						$in_time = $office_shift['tuesday_in_time'];
						$out_time = $office_shift['tuesday_out_time'];
					}
				} else if($day == 'Wednesday') {
					if($office_shift['wednesday_in_time']=='') {
						$in_time = '00:00:00';
						$out_time = '00:00:00';
					} else {
						$in_time = $office_shift['wednesday_in_time'];
						$out_time = $office_shift['wednesday_out_time'];
					}
				} else if($day == 'Thursday') {
					if($office_shift['thursday_in_time']=='') {
						$in_time = '00:00:00';
						$out_time = '00:00:00';
					} else {
						$in_time = $office_shift['thursday_in_time'];
						$out_time = $office_shift['thursday_out_time'];
					}
				} else if($day == 'Friday') {
					if($office_shift['friday_in_time']=='') {
						$in_time = '00:00:00';
						$out_time = '00:00:00';
					} else {
						$in_time = $office_shift['friday_in_time'];
						$out_time = $office_shift['friday_out_time'];
					}
				} else if($day == 'Saturday') {
					if($office_shift['saturday_in_time']=='') {
						$in_time = '00:00:00';
						$out_time = '00:00:00';
					} else {
						$in_time = $office_shift['saturday_in_time'];
						$out_time = $office_shift['saturday_out_time'];
					}
				} else if($day == 'Sunday') {
					if($office_shift['sunday_in_time']=='') {
						$in_time = '00:00:00';
						$out_time = '00:00:00';
					} else {
						$in_time = $office_shift['sunday_in_time'];
						$out_time = $office_shift['sunday_out_time'];
					}
				}
				
						
				$attendance_status = '';
				$check = $first_in_check($r->id, $attendance_date);	
				if($check->num_rows() > 0) {
					$attendance = $first_in($r->id, $attendance_date);
					$clock_in = new DateTime($attendance[0]->clock_in);
					$clock_in2 = $clock_in->format('h:i a');
					// print_r($attendance);
					
					$office_time =  new DateTime($in_time.' '.$attendance_date);
					//time diff > total time late
					$office_time_new = strtotime($in_time.' '.$attendance_date);
					$clock_in_time_new = strtotime($attendance[0]->clock_in);
					if($clock_in_time_new <= $office_time_new) {
						$total_time_l = '00:00';
					} else {
						$interval_late = $clock_in->diff($office_time);
						$hours_l   = $interval_late->format('%h');
						$minutes_l = $interval_late->format('%i');			
						$total_time_l = $hours_l ."h ".$minutes_l."m";
					}
					
					$total_hrs = $total_hours_worked_attendance($r->id, $attendance_date);
					$hrs_old_int1 = '';
					$Total = '';
					$Trest = '';
					$total_time_rs = '';
					$hrs_old_int_res1 = '';
					
					foreach ($total_hrs->result() as $hour_work){		
						// total work			
						$timee = $hour_work->total_work.':00';
						$str_time =$timee;
			
						$str_time = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $str_time);
						
						sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);
						
						$hrs_old_seconds = $hours * 3600 + $minutes * 60 + $seconds;
						
						$hrs_old_int1 = $hrs_old_seconds;
						
						$Total = gmdate("H:i", $hrs_old_int1);	
					}
					if($Total=='') {
						$total_work = '00:00';
					} else {
						$total_work = $Total;
					}

					
					$status = $attendance[0]->attendance_status;
					if($total_time_rs=='') {
						$Trest = '00:00';
					} else {
						$Trest = $total_time_rs;
					}
				} else {
					$clock_in2 = '-';
					$total_time_l = '00:00';
					$total_work = '00:00';
					$Trest = '00:00';
					$clkInIp = $clock_in2;
					
					
					if($office_shift['monday_in_time'] == '' && $day == 'Monday') {
						$status = "Liburan";;	
					} else if($office_shift['tuesday_in_time'] == '' && $day == 'Tuesday') {
						$status = "Liburan";;	
					} else if($office_shift['wednesday_in_time'] == '' && $day == 'Wednesday') {
						$status = "Liburan";;	
					} else if($office_shift['thursday_in_time'] == '' && $day == 'Thursday') {
						$status = "Liburan";;	
					} else if($office_shift['friday_in_time'] == '' && $day == 'Friday') {
						$status = "Liburan";;	
					} else if($office_shift['saturday_in_time'] == '' && $day == 'Saturday') {
						$status = "Liburan";;	
					} else if($office_shift['sunday_in_time'] == '' && $day == 'Sunday') {
						$status = "Liburan";;	
					} 
					// else if(in_array($attendance_date, $holiday_arr)) { // holiday
						// $status = "Liburan";;
					// } 
					// else if(in_array($attendance_date, $leave_arr)) { // on leave
						// $status = "Cuti";
					// }  
					else {
						$status = "Absen";
					}
				}  
				
				$check_out = $first_out_check($r->id, $attendance_date);
				if($check_out->num_rows() == 1) {
					$early_time =  new DateTime($out_time.' '.$attendance_date);
					$first_out = $first_out($r->id, $attendance_date);
					$clock_out = new DateTime($first_out[0]->clock_out);
					
					if ($first_out[0]->clock_out!='') {
						$clock_out2 = $clock_out->format('h:i a');
						$clkOutIp = $clock_out2;
						
						// early leaving
						$early_new_time = strtotime($out_time.' '.$attendance_date);
						$clock_out_time_new = strtotime($first_out[0]->clock_out);
					
						if($early_new_time <= $clock_out_time_new) {
							$total_time_e = '00:00';
						} else {			
							$interval_lateo = $clock_out->diff($early_time);
							$hours_e   = $interval_lateo->format('%h');
							$minutes_e = $interval_lateo->format('%i');			
							$total_time_e = $hours_e ."h ".$minutes_e."m";
						}
						
						/* over time */
						$over_time =  new DateTime($out_time.' '.$attendance_date);
						$overtime2 = $over_time->format('h:i a');
						// over time
						$over_time_new = strtotime($out_time.' '.$attendance_date);
						$clock_out_time_new1 = strtotime($first_out[0]->clock_out);
						
						if($clock_out_time_new1 <= $over_time_new) {
							$overtime2 = '00:00';
						} else {			
							$interval_lateov = $clock_out->diff($over_time);
							$hours_ov   = $interval_lateov->format('%h');
							$minutes_ov = $interval_lateov->format('%i');			
							$overtime2 = $hours_ov ."h ".$minutes_ov."m";
						}			
					}
				} else {
					$clock_out2 =  '-';
					$total_time_e = '00:00';
					$overtime2 = '00:00';
					$clkOutIp = $clock_out2;
				}	
				
				$fclckIn = $clock_in2;
				$fclckOut = $clock_out2;
			} else {
				// attendance date
				$d_date = date("d-m-Y", strtotime($attendance_date));
				$status = '<a href="javascript:void(0)" class="badge badge-danger">'.$this->lang->line('xin_office_shift_not_assigned').'</a>';
				$fclckIn = '--';
				$fclckOut = '--';
				$total_time_l = '--';
				$total_time_e = '--';
				$overtime2 = '--';
				$total_work = '--';
				$Trest = '--';
			}
			
			// error_reporting(0);
			$data[] = array(
				$no,
				$full_name,
				// $r->id,
				$d_date,
				$status,
				$fclckIn,
				$fclckOut,
				$total_time_l,
				$total_time_e,
				// $overtime2,
				$total_work,
				// $Trest
			);
		}
		
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $karyawan("num_row"),
			"recordsFiltered" => $karyawan("num_row"),
			"data" => $data
		);
		echo json_encode($data);
		exit();
	}
	
	
	public function generate($act) {
		$data = $this->attend_list();
		
		print_r($data);
	}
	
	public function get_preview($data) {
		
	}
	
	public function get_resourcess() {
		$month_year = $this->input->get('month_year');
		if(isset($month_year)){
			$default_date = $month_year;
		} else {
			$default_date = date("Y-m");
		}
		
		if(isset($month_year)){
			$date = strtotime($this->input->get('month_year').'-01');
			$imonth_year = explode('-',$this->input->get('month_year'));
			$day = date('d', $date);
			$month = date($imonth_year[1], $date);
			$year = date($imonth_year[0], $date);
			$month_year = $this->input->get('month_year');
		} else {
			$date = strtotime(date("Y-m-d"));
			//$date = strtotime('2020-05-01');
			$day = date('d', $date);
			$month = date('m', $date);
			$year = date('Y', $date);
			$month_year = date('Y-m');
		}
		
		$daysInMonth =  date('t');
		$imonth = date('F', $date);
		
		$karyawan = function($param) {
			if($param=="all") {
				$res = $this->db->query("SELECT * FROM master_staff");
				return $res->result();
			} else if($param=="num_row") {
				$res = $this->db->query("SELECT count(*) as cnt FROM master_staff")->row();
				return $res->cnt;
			}
		};
		
		$first_in_check = function($employee_id, $attendance_date) {
			$sql = 'SELECT * FROM master_attendance_time WHERE employee_id = ? and attendance_date = ? limit 1';
			$binds = array($employee_id, $attendance_date);
			$query = $this->db->query($sql, $binds);

			return $query;
		};
		
		$no = 0;
		foreach($karyawan("all") as $r) {
			$pcount = 0;
			for($i = 1; $i <= $daysInMonth; $i++) {
				$i = str_pad($i, 2, 0, STR_PAD_LEFT);
				$eattendance_date = $year.'-'.$month.'-'.$i;
				$check = $first_in_check($r->id, $eattendance_date);
				if($check->num_rows() > 0) {
					$pcount += $check->num_rows();
				} else {
					$pcount += 0;
				}
			}
			if($pcount == 0){
				$pcount = '0';
			}
			
			$someArrayEmp[] = array(
				'id' => $r->id,
				'title'   => $r->nama,
				'employee_present' => $pcount
			);
		}
		
		return json_encode($someArrayEmp);
	}
	
	public function get_eventss() {
		$month_year = $this->input->get('month_year');
		if(isset($month_year)){
			$default_date = $month_year;
		} else {
			$default_date = date("Y-m");
		}
		
		if(isset($month_year)){
			$date = strtotime($this->input->get('month_year').'-01');
			$imonth_year = explode('-',$this->input->get('month_year'));
			$day = date('d', $date);
			$month = date($imonth_year[1], $date);
			$year = date($imonth_year[0], $date);
			$month_year = $this->input->get('month_year');
		} else {
			$date = strtotime(date("Y-m-d"));
			//$date = strtotime('2020-05-01');
			$day = date('d', $date);
			$month = date('m', $date);
			$year = date('Y', $date);
			$month_year = date('Y-m');
		}
		
		$daysInMonth =  date('t');
		$imonth = date('F', $date);
		
		$karyawan = function($param) {
			if($param=="all") {
				$res = $this->db->query("SELECT * FROM master_staff");
				return $res->result();
			} else if($param=="num_row") {
				$res = $this->db->query("SELECT count(*) as cnt FROM master_staff")->row();
				return $res->cnt;
			}
		};
		
		$first_in_check = function($employee_id, $attendance_date) {
			$sql = 'SELECT * FROM master_attendance_time WHERE employee_id = ? and attendance_date = ? limit 1';
			$binds = array($employee_id, $attendance_date);
			$query = $this->db->query($sql, $binds);

			return $query;
		};
		
		$first_in = function($employee_id, $attendance_date) {
			$sql = 'SELECT * FROM master_attendance_time WHERE employee_id = ? and attendance_date = ?';
			$binds = array($employee_id, $attendance_date);
			$query = $this->db->query($sql, $binds);
			
			return $query->result();
		};
		
		$no = 0;
		foreach($karyawan("all") as $r) {
			for($i = 1; $i <= $daysInMonth; $i++) {
				$i = str_pad($i, 2, 0, STR_PAD_LEFT);
				
				$attendance_date = $year.'-'.$month.'-'.$i;
				$tdate = $year.'-'.$month.'-'.$i;
				$get_day = strtotime($attendance_date);
				$day = date('l', $get_day);
				$user_id = $r->id;
				$office_shift = $this->shift('pagi');
				if(!is_null($office_shift)) {
					
					$attendance_status = '';
					$check = $first_in_check($r->id, $attendance_date);
					if($office_shift['monday_in_time'] == '' && $day == 'Monday') {
						$status = 'H';	
					} else if($office_shift['tuesday_in_time'] == '' && $day == 'Tuesday') {
						$status = 'H';
					} else if($office_shift['wednesday_in_time'] == '' && $day == 'Wednesday') {
						$status = 'H';
					} else if($office_shift['thursday_in_time'] == '' && $day == 'Thursday') {
						$status = 'H';
					} else if($office_shift['friday_in_time'] == '' && $day == 'Friday') {
						$status = 'H';
					} else if($office_shift['saturday_in_time'] == '' && $day == 'Saturday') {
						$status = 'H';
					} else if($office_shift['sunday_in_time'] == '' && $day == 'Sunday') {
						$status = 'H';
					} 
					// else if(in_array($attendance_date,$holiday_arr)) { // holiday
						// $status = 'H';
					// } else if(in_array($attendance_date,$leave_arr)) { // on leave
						// $status = 'L';
					// } 
					else if($check->num_rows() > 0){
						$attendance = $first_in($r->id, $attendance_date);
						$status = 'P';					
					} else {
						$status = 'A';
						//$pcount += 0;
					}
					
					$iattendance_date = strtotime($attendance_date);
					$icurrent_date = strtotime(date('Y-m-d'));
					$status = $status;
					if($iattendance_date <= $icurrent_date){
						$status = $status;
					} else {
						$status = '--';
					}
				}
				
				$someArray[] = array(
					'title' => $status,
					'resourceId' => $r->id,
					'start'   => $attendance_date,
					'end'   => $attendance_date,
				);
			}
		}
		
		return json_encode($someArray);
	}
}