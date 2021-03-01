<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Attend extends REST_Controller {
	function __construct($config = 'rest') {
        parent::__construct($config);
		$this->load->database();
		
		$this->methods['index_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['index_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['index_delete']['limit'] = 50; // 50 requests per hour per user/key
    }
	
	function index_get() {
		  echo date("G:i:s");
		  echo "<br>";
		  echo date("H:i:s");
	}
	
	function check_time_get() {
		$employee_id = $this->input->get('id_user');
		$attendance_date = date("Y-m-d");
		$res = $this->db->query("SELECT * FROM master_attendance_time WHERE employee_id='$employee_id' AND attendance_date='$attendance_date'")->row();
		
		$data['clock_in_time'] = ($res==null ? "-" : ($res->clock_in!=null ? $this->time_format($res->clock_in) : "-"));
		$data['clock_out_time'] = ($res==null ? "-" : ($res->clock_out!=null ? $this->time_format($res->clock_out) : "-"));
		
		echo json_encode($data);
	}
	
	function time_format($val) {
		$ts = new DateTime($val);
		return $ts->format('H:i:s');
	}

	function clock_in_get() {
		$employee_id = $this->input->get('id_user');
		$today_date = date("Y-m-d");
		$curtime = date('Y-m-d H:i:s');
		$ip_address = $this->input->get('ip_address');
		$latitude = $this->input->get('latitude');
		$longitude = $this->input->get('longitude');
		
		$query = "";
		
		$check = $this->db->query("SELECT attendance_date FROM master_attendance_time WHERE employee_id='$employee_id' AND attendance_date='$today_date' ORDER BY time_attendance_id DESC LIMIT 1");
		if($check->num_rows() < 1) {
			$total_rest = '';
		} else {
			$total_rest = '';
		}

		$data = array(
			'employee_id' => $employee_id,
			'attendance_date' => $today_date,
			'clock_in' => $curtime,
			'clock_in_ip_address' => $ip_address,
			'clock_in_latitude' => $latitude,
			'clock_in_longitude' => $longitude,
			'time_late' => $curtime,
			'early_leaving' => $curtime,
			'overtime' => $curtime,
			'total_rest' => $total_rest,
			'attendance_status' => 'Present',
			'clock_in_out' => '1'
		);
		
		if($check->num_rows() < 1) {
			$this->db->insert('master_attendance_time', $data);
			echo "CLOCK IN, BERHASIL";
		} else {
			echo "ANDA SUDAH MELAKUKAN CLOCK IN";
		}
	}
	
	function clock_out_get() {
		$employee_id = $this->input->get('id_user');
		$today_date = date("Y-m-d");
		$curtime = date('Y-m-d H:i:s');
		$ip_address = $this->input->get('ip_address');
		$latitude = $this->input->get('latitude');
		$longitude = $this->input->get('longitude');
		
		$check = $this->db->query("SELECT * FROM master_attendance_time where `employee_id` = '$employee_id' and `attendance_date` = '$today_date' ORDER BY time_attendance_id DESC LIMIT 1");
		$num = $check->num_rows();
		
		$total_work_cin =  new DateTime($check->row()->clock_in);
		$total_work_cout =  new DateTime($curtime);
		
		$interval_cin = $total_work_cout->diff($total_work_cin);
		$hours_in   = $interval_cin->format('%h');
		$minutes_in = $interval_cin->format('%i');
		$total_work = $hours_in .":".$minutes_in;
		
		$data = array(
			'employee_id' => $employee_id,
			'clock_out' => $curtime,
			'clock_out_ip_address' => $ip_address,
			'clock_out_latitude' => $latitude,
			'clock_out_longitude' => $longitude,
			'clock_in_out' => '0',
			'early_leaving' => $curtime,
			'overtime' => $curtime,
			'total_work' => $total_work
		);
		
		if($num==0) {
			echo "HARAP MELAKUKAN CLOCK IN, TERLEBIH DAHULU!";
		} else {
			$id = $check->row()->time_attendance_id;
			$this->db->where('time_attendance_id', $id);
			$this->db->update('master_attendance_time', $data);
			echo "CLOCK OUT, BERHASIL";
		}
	}
	
	function get_zone_get() {
		$tzo = $this->input->get('tzo');
		$ts = new DateTime('now', new DateTimeZone('GMT'));	
		// $ts->add(DateInterval::createFromDateString('420 minutes'));
		// $ts->add(DateInterval::createFromDateString('480 minutes'));
		$ts->add(DateInterval::createFromDateString($tzo.' minutes'));

		// echo gmdate("Y-m-d H:i:s", time()+60*60*8);
		// echo "<pre>";
		// print_r($ts);

		$this->get_zone_f($ts->format('Y-m-d H:i:s'));
	}
	
	function get_zone_f($value) {
		echo "zona waktu dari server: " . date('Y-m-d G:i:s') . " \n";
 
		$tz = 'Asia/Jakarta';
		$dt = new DateTime("now", new DateTimeZone($tz));
		$timestamp_wib = $dt->format('Y-m-d G:i:s');
		 
		$tz = 'Asia/Makassar';
		$dt = new DateTime("now", new DateTimeZone($tz));
		$timestamp_wita = $dt->format('Y-m-d G:i:s');
		 
		$tz = 'Asia/Jayapura';
		$dt = new DateTime("now", new DateTimeZone($tz));
		$timestamp_wit = $dt->format('Y-m-d G:i:s');
		
		
		
		if($value==$timestamp_wib) {
			echo "WIB  : $timestamp_wib \n";
		} else if($value==$timestamp_wita) {
			echo "WITA : $timestamp_wita \n";
		} else if($value==$timestamp_wit) {
			echo "WIT : $timestamp_wit \n";
		}
	}
}