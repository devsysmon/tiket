<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_attendance extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}
	
	/**
	 * View method
	 */
	public function index() {	
		return view('pages/master_attendance/index', $this->data);
	}
	
	public function add() {
		
		$this->data['id'] = '';
		$this->data['nik'] = '';
		$this->data['nama'] = '';
		$this->data['alamat'] = '';
		$this->data['jk'] = '';
		$this->data['hp'] = '';
		$this->data['username'] = '';
		$this->data['password'] = '';
		
		return view('pages/master_attendance/form', $this->data);
	}
	
	public function edit($id) {
		$this->db->where("id", $id);
		$row = $this->db->get("master_attendance")->row();
		
		// echo "<pre>";
		// print_r($row);
		
		$this->data['id'] = $row->id;
		$this->data['nik'] = $row->nik;
		$this->data['nama'] = $row->nama;
		$this->data['alamat'] = $row->alamat;
		$this->data['jk'] = $row->jk;
		$this->data['hp'] = $row->hp;
		$this->data['username'] = $row->username;
		$this->data['password'] = $row->password;
		
		return view('pages/master_attendance/form', $this->data);
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
		echo json_encode($output);
		exit();
	}
	
	/**
	 * Process method
	 */
	public function insert() {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$id = trim($this->input->post("id"));
		$nik = trim($this->input->post("nik"));
		$nama = trim($this->input->post("nama"));
		$alamat = trim($this->input->post("alamat"));
		$jk = trim($this->input->post("jk"));
		$hp = trim($this->input->post("hp"));
		$username = trim($this->input->post("username"));
		$password = trim($this->input->post("password"));
		
		$data = array();
		$data['nik'] = $nik;
		$data['nama'] = $nama;
		$data['alamat'] = $alamat;
		$data['jk'] = $jk;
		$data['hp'] = $hp;
		$data['username'] = $username;
		$data['password'] = $password;
		$result = $this->db->insert('master_attendance', $data);
		
		if($result) {
			echo "<script>alert('SUCCESS');</script>";
		} else {
			echo "<script>alert('FAILED');</script>";
		}
		
		redirect('master_attendance');
	}
	
	public function update() {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$id = trim($this->input->post("id"));
		$nik = trim($this->input->post("nik"));
		$nama = trim($this->input->post("nama"));
		$alamat = trim($this->input->post("alamat"));
		$jk = trim($this->input->post("jk"));
		$hp = trim($this->input->post("hp"));
		$username = trim($this->input->post("username"));
		$password = trim($this->input->post("password"));
		
		$data = array();
		$data['nik'] = $nik;
		$data['nama'] = $nama;
		$data['alamat'] = $alamat;
		$data['jk'] = $jk;
		$data['hp'] = $hp;
		$data['username'] = $username;
		$data['password'] = $password;
		$this->db->where("id", $id);
		$result = $this->db->update('master_attendance', $data);
		
		if($result) {
			echo "<script>alert('SUCCESS');</script>";
		} else {
			echo "<script>alert('FAILED');</script>";
		}
		
		redirect('master_attendance');
	}
	
	public function delete($id) {
		$this->db->where('id', $id);
        $result = $this->db->delete('master_attendance');
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
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
				"saturday_in_time" => "08:00",
				"saturday_out_time" => "18:00",
				"sunday_in_time" => "08:00",
				"sunday_out_time" => "18:00",
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
				"saturday_in_time" => "07:00",
				"saturday_out_time" => "19:00",
				"sunday_in_time" => "07:00",
				"sunday_out_time" => "19:00",
			),
		);
		
		return $data[$index];
	}
	
	/**
	 * Additional method
	 */
	public function get_data() {
		$valid_columns = array(
            0=>'time_attendance_id',
        );
		
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search= $this->input->post("search");
        $search = $search['value'];
		$col = 0;
        $dir = "";
        if(!empty($order)) {
            foreach($order as $o) {
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		
		if($dir != "asc" && $dir != "desc") {
            $dir = "desc";
        }
		
		if(!isset($valid_columns[$col])) {
            $order = null;
        } else {
            $order = $valid_columns[$col];
        }
		
        if($order !=null) {
            $this->db->order_by($order, $dir);
        }
		
		if(!empty($search)) {
            $x=0;
            foreach($valid_columns as $sterm) {
                if($x==0) {
                    $this->db->like($sterm,$search);
                } else {
                    $this->db->or_like($sterm,$search);
                }
                $x++;
            }                 
        }
		
		$this->db->limit($length,$start);
        $employees = $this->db->get("master_attendance_time");
        $data = array();
		
		$no = 0;
		foreach($employees->result() as $rows) {
			$no++;
			$url = base_url().'master_attendance';
            $data[]= array(
                $no,
                $rows->employee_id,
                $rows->attendance_date,
                $rows->attendance_status,
                $rows->clock_in,
                $rows->clock_out,
                $rows->employee_id,
                $rows->employee_id,
                $rows->employee_id,
                $rows->employee_id,
                $rows->employee_id,
            );     
        }
		
        $total_employees = $this->totalDatas();
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_employees,
            "recordsFiltered" => $total_employees,
            "data" => $data
        );
        echo json_encode($output);
        exit();
	}
	
	public function totalDatas() {
		$query = $this->db->select("COUNT(*) as num")->get("master_attendance_time");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
	}
}
