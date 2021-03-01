<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Service extends REST_Controller {
	function __construct($config = 'rest') {
        parent::__construct($config);
		$this->load->database();
		
		$this->methods['index_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['index_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['index_delete']['limit'] = 50; // 50 requests per hour per user/key
    }
	
	function index_get() {
		echo "A";
	}
	
	function dashboard2_get() {
		$id_user = $this->input->get('id_user');
		
		$query = $this->db->query("
			SELECT * FROM master_atm
				LEFT JOIN master_location_detail ON(master_location_detail.id_atm=master_atm.id)
				LEFT JOIN trans_clean ON(trans_clean.id_detail=master_location_detail.id AND date='".date("Y-m-d")."')
				LEFT JOIN trans_jadwal ON(trans_jadwal.id_lokasi=master_location_detail.id_lokasi)
				WHERE trans_jadwal.id_petugas='".$id_user."'
		");
		$num1 = $query->num_rows();
		
		// echo $num1."<br>";
		
		$query = $this->db->query("SELECT * FROM trans_clean WHERE date='".date("Y-m-d")."' AND id_petugas='".$id_user."'");
		$num2 = $query->num_rows();
		
		// echo $num2."<br>";
		
		
		$result['data_job'] = ($num1-$num2);
		$result['data_done'] = $num2;
		
		echo json_encode($result);
	}
	
	function dashboard_get() {
		$id_user = $this->input->get('id_user');
		
		$query1 = $this->db->query("SELECT * FROM master_ticket WHERE entry_date LIKE '%".date("Y-m-d")."%' AND pic='".$id_user."'");
		$num1 = $query1->num_rows();
		
		$query2 = $this->db->query("SELECT * FROM master_ticket WHERE entry_date LIKE '%".date("Y-m-d")."%' AND pic='".$id_user."'");
		$num2 = $query2->num_rows();
		
		
		$result['data_job'] = $num1;
		$result['data_done'] = $num2;
		
		echo json_encode($result);
	}
	
	function new_jobX_get() {
		// ini_set('display_errors', 1);
		// ini_set('display_startup_errors', 1);
		// error_reporting(E_ALL);
		$result = array();
		
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');

		$query = "
			SELECT master_atm.*, master_ticket.*, master_ticket.id as ids, master_client.nama as nama_bank FROM master_ticket
			LEFT JOIN master_atm ON(master_atm.idatm=master_ticket.atm_id)
			LEFT JOIN master_client ON(master_client.id=master_atm.id_bank)
			WHERE master_ticket.pic='".$id_user."' AND accept_time IS NULL
		";
		
		$query = $this->db->query($query);
		$num_rows = $query->num_rows();
		$res = $query->result_array();

		if ($num_rows > 0) {
			$list = array();
			$key=0;
			foreach($res as $r) {
				$list[$key]['id'] = $r['ids'];
				$list[$key]['ticket_id'] = $r['ticket_id'];
				$list[$key]['idatm'] = $r['idatm'];
				$list[$key]['nama_bank'] = $r['nama_bank'];
				$list[$key]['cabang'] = $r['cabang'];
				$list[$key]['lokasi'] = $r['lokasi'];
				$list[$key]['alamat'] = $r['alamat'];
				
				$key++;
			}
			
			$result['data'] = $list;
		}

		echo json_encode($result);
	}

	function new_job_get() {
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		$result = array();
		
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');

		$query = "
			SELECT master_atm.*, master_ticket.*, master_ticket.id as ids, master_client.nama as nama_bank FROM master_ticket
			LEFT JOIN master_atm ON(master_atm.id=master_ticket.atm_id)
			LEFT JOIN master_client ON(master_client.id=master_atm.id_bank)
			WHERE master_ticket.pic='".$id_user."' AND accept_time IS NOT NULL AND end_job IS NULL
		";
		
		$query = $this->db->query($query);
		$num_rows = $query->num_rows();
		$res = $query->result_array();

		if ($num_rows > 0) {
			$list = array();
			$key=0;
			foreach($res as $r) {
				$list[$key]['id'] = $r['ids'];
				$list[$key]['ticket'] = $r['ticket_id'];
				$list[$key]['idatm'] = $r['idatm'];
				$list[$key]['nama_bank'] = $r['nama_bank'];
				$list[$key]['cabang'] = $r['cabang'];
				$list[$key]['lokasi'] = $r['lokasi'];
				$list[$key]['alamat'] = $r['alamat'];
				
				$key++;
			}
			
			$result['data'] = $list;
		}

		echo json_encode($result);
	}
	
	function job_list_get() {
		$result = array();
		
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');

		$query = "
			SELECT *, master_ticket.id as id FROM master_ticket LEFT JOIN master_atm ON(master_atm.id=master_ticket.atm_id) 
			WHERE master_ticket.pic='".$id_user."' AND accept_time IS NOT NULL AND end_job IS NULL
		";
		
		$query = $this->db->query($query);
		$num_rows = $query->num_rows();
		$res = $query->result_array();
		
		echo json_encode($res);
	}
	
	function job_pending_get() {
		$result = array();
		
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');

		$query = "
			SELECT *, master_ticket.id as id FROM master_ticket LEFT JOIN master_atm ON(master_atm.id=master_ticket.atm_id) 
			WHERE master_ticket.pic='".$id_user."' AND accept_time IS NOT NULL AND end_job IS NOT NULL AND 
			(master_ticket.status='pending-sparepart' OR master_ticket.status='pending-pekerjaan' OR master_ticket.status='pending')
		";
		
		$query = $this->db->query($query);
		$num_rows = $query->num_rows();
		$res = $query->result_array();
		
		echo json_encode($res);
	}

	function acc_newjob_get() {
		$id = $this->input->get('id');
		$date = $this->input->get('date');
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');
		
		$tz = $this->validate_date($date);
		
		if($tz=="WIB") {
			$this->db->set('accept_time', $date);
			$this->db->set('updated', 'true');
			$this->db->where('id', $id);
			$res = $this->db->update('master_ticket');

			if($res) {
				echo "success";
			} else {
				echo "failed";
			}
		} else {
			echo "INVALID TIME DEVICE!";
		}
	}
	
	function arrive_job_get() {
		$id = $this->input->get('id');
		$date = $this->input->get('date');
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');
		
		$tz = $this->validate_date($date);
		
		if($tz=="WIB") {
			$this->db->set('arrival_time', $date);
			$this->db->set('updated', 'true');
			$this->db->where('id', $id);
			$res = $this->db->update('master_ticket');

			if($res) {
				echo "success";
			} else {
				echo "failed";
			}
		} else {
			echo "INVALID TIME DEVICE!";
		}
	}
	
	function stop_waiting_get() {
		$id = $this->input->get('id');
		$date = $this->input->get('date');
		$time = $this->input->get('time');
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');
		
		$tz = $this->validate_date($date);
		
		if($tz=="WIB") {
			$this->db->set('waiting_time', $time);
			$this->db->set('updated', 'true');
			$this->db->where('id', $id);
			$res = $this->db->update('master_ticket');

			if($res) {
				echo "success";
			} else {
				echo "failed";
			}
		} else {
			echo "INVALID TIME DEVICE!";
		}
	}
	
	function start_job_get() {
		$id = $this->input->get('id');
		$date = $this->input->get('date');
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');
		
		$tz = $this->validate_date($date);
		
		if($tz=="WIB") {
			$this->db->set('start_job', $date);
			$this->db->set('updated', 'true');
			$this->db->where('id', $id);
			$res = $this->db->update('master_ticket');

			if($res) {
				echo "success";
			} else {
				echo "failed";
			}
		} else {
			echo "INVALID TIME DEVICE!";
		}
	}
	
	function validate_date($value) {
		$value = date("Y-m-d G", strtotime($value));
		// echo "zona waktu dari server: " . date('Y-m-d G:i:s') . " \n";
		// echo $value. " \n";
 
		$tz = 'Asia/Jakarta';
		$dt = new DateTime("now", new DateTimeZone($tz));
		$timestamp_wib = $dt->format('Y-m-d G');
		 
		$tz = 'Asia/Makassar';
		$dt = new DateTime("now", new DateTimeZone($tz));
		$timestamp_wita = $dt->format('Y-m-d G');
		 
		$tz = 'Asia/Jayapura';
		$dt = new DateTime("now", new DateTimeZone($tz));
		$timestamp_wit = $dt->format('Y-m-d G');
		
		if($value==$timestamp_wib) {
			return "WIB";
		} else if($value==$timestamp_wita) {
			return "WITA";
		} else if($value==$timestamp_wit) {
			return "WIT";
		} else {
			return false;
		}
	}

	function new_job_getXXX() {
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		$result = array();
		
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');
		
		$this->db->select('*,master_location_detail.id as id_detail');
		$this->db->from('master_location_detail');
		$this->db->where('id_lokasi', $id_lokasi);
		$this->db->join('master_atm', 'master_location_detail.id_atm = master_atm.id');
		
		$date=date("Y-m-d");
		
		date_default_timezone_set("Asia/Jakarta");
		
		$status_jam_kerja = 'false';
		$b = time();
		$hour = date("G",$b);
		
		$time = $this->waktu();
		$pagi_dari = date("G", strtotime($time->pagi_dari));
		$pagi_hingga = date("G", strtotime($time->pagi_hingga));
		$sore_dari = date("G", strtotime($time->sore_dari));
		$sore_hingga = date("G", strtotime($time->sore_hingga));
		
		$status_pekerjaan = "";
		if ($hour>=$pagi_dari && $hour<=$pagi_hingga) {
			$status_pekerjaan = "PAGI";
			$status_jam_kerja = 'true';
		} elseif ($hour >=$sore_dari && $hour<=$sore_hingga) {
			$status_pekerjaan = "SORE";
			$status_jam_kerja = 'true';
		} else {
			$status_jam_kerja = 'false';
		}
		
		if($status_jam_kerja=='true') {
			$query = "
				SELECT 
					*,  
					master_location_detail.id as id_detail
					FROM 
						master_location_detail
							LEFT JOIN master_atm ON(master_location_detail.id_atm = master_atm.id)
							WHERE 
								id_lokasi='$id_lokasi' AND
								master_location_detail.id NOT IN (SELECT id_detail FROM trans_clean WHERE jenis_pekerjaan='$status_pekerjaan' AND date='$date')
			";
			
			$query = $this->db->query($query);
			$num_rows = $query->num_rows();
			$res = $query->result_array();
			
			date_default_timezone_set("Asia/Jakarta");

			$b = time();
			$hour = date("G",$b);
			$status_pekerjaan = "";
			if ($hour>=$pagi_dari && $hour<=$pagi_hingga) {
				$status_pekerjaan = "Pekerjaan Pagi";
			} elseif ($hour >=$sore_dari && $hour<=$sore_hingga) {
				$status_pekerjaan = "Pekerjaan Sore";
			}
			
			$last_query = str_replace(array("\n","\r"), ' ', $this->db->last_query());
			$last_query = str_replace(array("\t"), '', $last_query);
			$result['query'] = $last_query;
			
			if ($num_rows > 0) {
				$list = array();
				$key=0;
				foreach($res as $r) {
					$list[$key]['id'] = $r['id_detail'];
					$list[$key]['idatm'] = $r['idatm'];
					$list[$key]['cabang'] = $r['cabang'];
					$list[$key]['lokasi'] = $r['lokasi'];
					$list[$key]['alamat'] = $r['alamat'];
					$list[$key]['status_pekerjaan'] = strtoupper($status_pekerjaan);
					
					$key++;
				}
				
				$result['data'] = $list;
			}
			
			$data_send = $this->input->get();
			$result['data_send'] = $data_send;
		}
		
		echo json_encode($result);
	}
	
	function job_detail_get() {
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		$result = array();
		
		$id = $this->input->get('id');
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');

		$query = "
			SELECT master_atm.*, master_ticket.*, master_ticket.id as ids, master_client.nama as nama_bank FROM master_ticket
			LEFT JOIN master_atm ON(master_atm.id=master_ticket.atm_id)
			LEFT JOIN master_client ON(master_client.id=master_atm.id_bank)
			WHERE master_ticket.pic='".$id_user."' AND master_ticket.id='".$id."'
		";
		
		$query = $this->db->query($query);
		$num_rows = $query->num_rows();
		$res = $query->result_array();

		if ($num_rows > 0) {
			$list = array();
			$key=0;
			foreach($res as $r) {
				$list[$key]['id'] = $r['ids'];
				$list[$key]['ticket'] = $r['ticket_id'];
				$list[$key]['idatm'] = $r['idatm'];
				$list[$key]['nama_bank'] = $r['nama_bank'];
				$list[$key]['cabang'] = $r['cabang'];
				$list[$key]['lokasi'] = $r['lokasi'];
				$list[$key]['alamat'] = $r['alamat'];
				
				$key++;
			}
			
			$result['data'] = $list;
		}

		echo json_encode($result);
	}
	
	function new_job_detail_get() {
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		$result = array();
		
		$id = $this->input->get('id');
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');
		
		// $query2 = "
			// SELECT 
				// *,  
				// master_location_detail.id as id_detail
				// FROM 
					// master_location_detail
						// LEFT JOIN master_atm ON(master_location_detail.id_atm = master_atm.id)
						// WHERE 
							// id_lokasi='$id_lokasi' 
							// AND master_location_detail.id = '$id'
		// ";
		$query = "
			SELECT master_atm.*, master_ticket.*, master_ticket.id as ids, master_client.nama as nama_bank FROM master_ticket
			LEFT JOIN master_atm ON(master_atm.idatm=master_ticket.atm_id)
			LEFT JOIN master_client ON(master_client.id=master_atm.id_bank)
			WHERE master_ticket.pic='$id_user' AND master_ticket.id='$id'
		";
		
		$query = $this->db->query($query);
		$num_rows = $query->num_rows();
		$res = $query->result_array();
		
		echo json_encode($res);
	}
	
	function new_job_detail2_get() {
		// print_r($_REQUEST);
		
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		$result = array();
		
		$id_atm = $this->input->get('id_atm');
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');
		
		date_default_timezone_set("Asia/Jakarta");
		
		$status_jam_kerja = 'false';
		$b = time();
		$hour = date("G",$b);
		
		$time = $this->waktu();
		$pagi_dari = date("G", strtotime($time->pagi_dari));
		$pagi_hingga = date("G", strtotime($time->pagi_hingga));
		$sore_dari = date("G", strtotime($time->sore_dari));
		$sore_hingga = date("G", strtotime($time->sore_hingga));
		
		$status_pekerjaan = "";
		if ($hour>=$pagi_dari && $hour<=$pagi_hingga) {
			$status_pekerjaan = "PAGI";
			$status_jam_kerja = 'true';
		} elseif ($hour >=$sore_dari && $hour<=$sore_hingga) {
			$status_pekerjaan = "SORE";
			$status_jam_kerja = 'true';
		} else {
			$status_jam_kerja = 'false';
		}
		
		if($status_jam_kerja=='true') {
			$query = "
				SELECT 
					*,  
					master_location_detail.id as id_detail
					FROM 
						master_location_detail
							LEFT JOIN master_atm ON(master_location_detail.id_atm = master_atm.id)
							WHERE 
								id_lokasi='$id_lokasi' AND
								master_atm.idatm = '$id_atm' AND
								master_location_detail.id NOT IN (SELECT id_detail FROM trans_clean WHERE id_petugas='$id_user' AND date='".date('Y-m-d')."' AND jenis_pekerjaan='$status_pekerjaan')
								
			";
			
			$query = $this->db->query($query);
			$num_rows = $query->num_rows();
			$res = $query->result_array();
			
			date_default_timezone_set("Asia/Jakarta");

			$b = time();
			$hour = date("G",$b);
			$status_pekerjaan = "";
			if ($hour>=0 && $hour<=11) {
				$status_pekerjaan = "Pekerjaan Pagi";
			} elseif ($hour >=12 && $hour<=17) {
				$status_pekerjaan = "Pekerjaan Sore";
			}
			
			
			$last_query = str_replace(array("\n","\r"), ' ', $this->db->last_query());
			$result['query'] = $last_query;
			
			if ($num_rows > 0) {
				$list = array();
				$key=0;
				foreach($res as $r) {
					$list[$key]['id'] = $r['id_detail'];
					$list[$key]['idatm'] = $r['idatm'];
					$list[$key]['cabang'] = $r['cabang'];
					$list[$key]['lokasi'] = $r['lokasi'];
					$list[$key]['alamat'] = $r['alamat'];
					$list[$key]['status_pekerjaan'] = strtoupper($status_pekerjaan);
					
					$key++;
				}
				
				$result['data'] = $list;
			}
			
			$data_send = $this->input->get();
			$result['data_send'] = $data_send;
		}
		
		echo json_encode($result);
	}
	
	function get_list_service_get() {
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		$result = array();
		$data = array();
		
		$query = "
			SELECT 
				*
				FROM 
					master_item
		";
		
		$query = $this->db->query($query);
		$res = $query->result();
		
		foreach($res as $row) {
			// if($row->name=="CHECK LIST KEBERSIHAN") {
				// $data['kebersihan'] = "A";
			// } else {
				// $data['perlengkapan'] = "B";
			// }
			
			$query = "
				SELECT 
					*
					FROM 
						master_item_detail
							WHERE 
								id_detail='$row->id'
			";
			$query = $this->db->query($query);
			$res = $query->result();
			$i = 0;
			foreach($res as $r) {
				// if($row->name=="CHECK LIST ACTION TAKEN") {
					$data['checklist'][$i]['id'] = $r->id;
					$data['checklist'][$i]['item'] = $r->list;
				// } else {
					// $data['perlengkapan'][$i]['id'] = $r->list;
					// $data['perlengkapan'][$i]['item'] = $r->list;
				// }
				
				$i++;
			}
		}
		
		$result['data'] = $data;
		
		echo json_encode($result);
	}
	
	function waktu_get() {
		$time = $this->waktu();
		$pagi_dari = date("G", strtotime($time->pagi_dari));
		$pagi_hingga = date("G", strtotime($time->pagi_hingga));
		$sore_dari = date("G", strtotime($time->sore_dari));
		$sore_hingga = date("G", strtotime($time->sore_hingga));
	}
	
	function waktu() {
		$query = $this->db->query("SELECT * FROM master_setting");
		$res = $query->row();
		
		return $res;
	}
	
	function save_job_post() {
		// print_r($this->input->post());
		
		$id_user = $this->input->post('id_user');
		$id_detail = $this->input->post('id_detail');
		$data_save = $this->input->post('data_save');
		$saved = json_decode($data_save, true);
		
		if($saved['status']!=='pending-sparepart' || $saved['status']!=='pending-pekerjaan') {
			$this->db->set('end_job', date("Y-m-d H:i:s"));
		}
		$this->db->set('status', $saved['status']);
		$this->db->set('action_taken', json_encode($saved));
		$this->db->set('remark', $saved['remark']);
		$this->db->set('updated', 'true');
		$this->db->where('id', $id_detail);
		$res = $this->db->update('master_ticket');
		
		if($res) {
			echo "success";
		} else {
			echo "failed";
		}
	}
	
	function save_pending_job_post() {
		// print_r($this->input->post());
		
		$id_user = $this->input->post('id_user');
		$id_detail = $this->input->post('id_detail');
		$data_save = $this->input->post('data_save');
		$saved = json_decode($data_save, true);
		
		// $this->db->set('end_job', date("Y-m-d H:i:s"));
		$this->db->set('status', $saved['status']);
		$this->db->set('action_taken', json_encode($saved));
		$this->db->set('remark', $saved['remark']);
		$this->db->set('updated', 'true');
		$this->db->where('id', $id_detail);
		$res = $this->db->update('master_ticket');
		
		if($res) {
			echo "success";
		} else {
			echo "failed";
		}
	}
	
	function save_job_get() {
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		
		date_default_timezone_set("Asia/Jakarta");
		
		// print_r($_REQUEST);

		// $b = time();
		// $hour = date("G",$b);
		
		// $time = $this->waktu();
		// $pagi_dari = date("G", strtotime($time->pagi_dari));
		// $pagi_hingga = date("G", strtotime($time->pagi_hingga));
		// $sore_dari = date("G", strtotime($time->sore_dari));
		// $sore_hingga = date("G", strtotime($time->sore_hingga));
		
		// $status_pekerjaan = "";
		// if ($hour>=$pagi_dari && $hour<=$pagi_hingga) {
			// $status_pekerjaan = "PAGI";
		// } elseif ($hour >=$sore_dari && $hour<=$sore_hingga) {
			// $status_pekerjaan = "SORE";
		// }
		
		// $result = array();
		
		$id_user = $this->input->get('id_user');
		$id_detail = $this->input->get('id_detail');
		$data_save = $this->input->get('data_save');
		
		// echo $id_user." ".$id_detail." ".$data_save;
		
		// print_r($this->input->get());
		
		// $this->db->set('end_job', date("Y-m-d H:i:s"));
		// $this->db->set('action_taken', $data_save);
		// $this->db->set('updated', 'true');
		// $this->db->where('id', $id_detail);
		// $res = $this->db->update('master_ticket');

		// if($res) {
			// echo "success";
		// } else {
			// echo "failed";
		// }
		// $data_problem = $this->input->get('data_problem');
		
		// $data_simpan['date'] = date("Y-m-d");
		// $data_simpan['id_petugas'] = $id_user;
		// $data_simpan['id_detail'] = $id_detail;
		// $data_simpan['action'] = $data_save;
		// $data_simpan['jenis_pekerjaan'] = $status_pekerjaan;
		
		// // echo "<pre>";
		// // print_r($data_problem);
		// // print_r($data_simpan);
		
		// $this->db->select('*');
		// $this->db->from('trans_clean');
		// $this->db->where('date', date("Y-m-d"));
		// $this->db->where('id_petugas', $id_user);
		// $this->db->where('id_detail', $id_detail);
		// $this->db->where('jenis_pekerjaan', $status_pekerjaan);
		// $query = $this->db->get();
		// $num_rows = $query->num_rows();
		
		// if ($num_rows == 0) {
			// $this->db->insert('trans_clean', $data_simpan);
			// $insert_id = $this->db->insert_id();
			
			// if(count(json_decode($data_problem))>0) {
				// $data_simpan_problem['id_clean'] = $insert_id;
				// $data_simpan_problem['problem'] = $data_problem;
				// $this->db->insert('trans_activity', $data_simpan_problem);
			// }
			
			// $result['data'] = "success";
		// } else {
			// $result['data'] = "success";
		// }
		
		// $data_send = $this->input->get();
		// $result['data_send'] = $data_send;
		
		// echo json_encode($result);
	}
	
	function get_absen_location_get() {
		$this->db->select('*');
		$this->db->from('master_absen_location');
		$query = $this->db->get();
		
		echo json_encode($query->result());
	}
	
	function get_data_ticket_get() {
		$id_user = $this->input->get('id_user');
		// $date = $this->input->get('date');
		
		$where_condition = array(
			'pic' => $id_user, 
			// 'entry_date' => $title, 
		);
		
		$this->db->select('*');
		$this->db->from('master_ticket');
		$this->db->where($where_condition);
		$query1 = $this->db->get();
		
		$param = array();
		foreach($query1->result() as $r) {
			$param[] = $r->atm_id;
		}
		
		$this->db->select('*');
		$this->db->from('master_atm');
		$this->db->where_in('id', $param);
		$query2 = $this->db->get();
		
		$data = array(
			"data_ticket" => $query1->result(),
			"data_atm" => $query2->result(),
		);
		
		echo json_encode($data);
	}
	
	function get_data_jobcard_get() {
		$this->db->select('*');
		$this->db->from('trans_jobcard');
		$query = $this->db->get();
		
		echo json_encode($query->result());
	}
	
	function get_data_action_get() {
		$this->db->select('*');
		$this->db->from('master_item');
		$query = $this->db->get();
		
		echo json_encode($query->result());
	}
	
	function get_data_action_detail_get() {
		$this->db->select('*');
		$this->db->from('master_item_detail');
		$query = $this->db->get();
		
		echo json_encode($query->result());
	}
	
	function check_sparepart_post() {
		$id_user = $this->input->post('id_user');
		$id_detail = $this->input->post('id_detail');
		$serial = $this->input->post('serial');
		$status = $this->input->post('status');
		$remark = $this->input->post('remark');
		
		
		$query = $this->db->query("
			SELECT 
				master_inventory_part_out.id as id_part,
				master_transaction_out.kode_part,
				master_transaction_out.id_location
			FROM master_inventory_part_out 
			LEFT JOIN master_transaction_out ON (master_transaction_out.id=master_inventory_part_out.id_detail)
			LEFT JOIN trans_schedule ON (trans_schedule.id_lokasi=master_transaction_out.id_location)
			WHERE master_inventory_part_out.sn_part='$serial' AND trans_schedule.id_petugas='$id_user'
		");
		$result = $query->row();
		
		if($query->num_rows()==0) {
			echo "0";
		} else {
			$check = $this->db->query("SELECT * FROM servicepoint_used WHERE id_part='$result->id_part'");
			if($check->num_rows()) {
				echo "2";
			} else {
				$ticket = $this->db->query("SELECT * FROM master_ticket WHERE id='$id_detail'")->row();
				$data['id_location'] = $result->id_location;
				$data['id_ticket'] = $id_detail;
				$data['id_petugas'] = $id_user;
				$data['kode_part'] = $result->kode_part;
				$data['id_atm'] = $ticket->atm_id;
				$data['id_part'] = $result->id_part;
				
				$res = $this->db->insert('servicepoint_used', $data);
				echo $res;
			}
		}
		
		// echo "<pre>";
		// print_r("SELECT * FROM master_inventory_part WHERE sn_part='$serial'");
		// print_r($query->num_rows());
		// print_r($_REQUEST);
		// if($query->num_rows()==0) {
			// echo "0";
		// } else {
			// echo "1";
		// }
		
		$this->sync_used();
	}
	
	public function sync_used() {
		$q = "SELECT * FROM master_inventory_part_out WHERE id IN (SELECT id_part FROM servicepoint_used) AND status='available'";
		$result = $this->db->query($q)->result();
		if(count($result)>0) {
			$data = array();
			foreach($result as $r) {
				$data['status'] = "used";
				$this->db->where('id', $r->id);
				$this->db->update('master_inventory_part_out', $data);
			}
		} 
		$q = "SELECT * FROM master_inventory_part_out WHERE id NOT IN (SELECT id_part FROM servicepoint_used) AND status='used'";
		$result = $this->db->query($q)->result();
		if(count($result)>0) {
			$data = array();
			foreach($result as $r) {
				$data['status'] = "available";
				$this->db->where('id', $r->id);
				$this->db->update('master_inventory_part_out', $data);
			}
		}
	}
}