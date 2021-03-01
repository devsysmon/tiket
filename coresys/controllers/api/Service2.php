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
				LEFT JOIN master_lokasi_detail ON(master_lokasi_detail.id_atm=master_atm.id)
				LEFT JOIN trans_clean ON(trans_clean.id_detail=master_lokasi_detail.id AND date='".date("Y-m-d")."')
				LEFT JOIN trans_jadwal ON(trans_jadwal.id_lokasi=master_lokasi_detail.id_lokasi)
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
		
		// DATA PAGI
		$query = $this->db->query("
			SELECT * FROM master_atm
				LEFT JOIN master_lokasi_detail ON(master_lokasi_detail.id_atm=master_atm.id)
				LEFT JOIN trans_clean ON(trans_clean.id_detail=master_lokasi_detail.id AND date='".date("Y-m-d")."' AND jenis_pekerjaan='PAGI')
				LEFT JOIN trans_jadwal ON(trans_jadwal.id_lokasi=master_lokasi_detail.id_lokasi)
				WHERE trans_jadwal.id_petugas='".$id_user."'
		");
		$num_pagi1 = $query->num_rows();
		$query2 = $this->db->query("
			SELECT * FROM master_atm
				LEFT JOIN master_lokasi_detail ON(master_lokasi_detail.id_atm=master_atm.id)
				LEFT JOIN trans_jadwal ON(trans_jadwal.id_lokasi=master_lokasi_detail.id_lokasi)
				WHERE master_lokasi_detail.id IN (SELECT id_detail FROM trans_clean WHERE date='".date("Y-m-d")."' AND jenis_pekerjaan='PAGI') AND trans_jadwal.id_petugas='".$id_user."'
		");
		$num_pagi2 = $query2->num_rows();
		$num_pagi = ($num_pagi1-$num_pagi2);
		
		// DATA SORE
		$query = $this->db->query("
			SELECT * FROM master_atm
				LEFT JOIN master_lokasi_detail ON(master_lokasi_detail.id_atm=master_atm.id)
				LEFT JOIN trans_clean ON(trans_clean.id_detail=master_lokasi_detail.id AND date='".date("Y-m-d")."' AND jenis_pekerjaan='SORE')
				LEFT JOIN trans_jadwal ON(trans_jadwal.id_lokasi=master_lokasi_detail.id_lokasi)
				WHERE trans_jadwal.id_petugas='".$id_user."'
		");
		$num_sore1 = $query->num_rows();
		$query2 = $this->db->query("
			SELECT * FROM master_atm
				LEFT JOIN master_lokasi_detail ON(master_lokasi_detail.id_atm=master_atm.id)
				LEFT JOIN trans_jadwal ON(trans_jadwal.id_lokasi=master_lokasi_detail.id_lokasi)
				WHERE master_lokasi_detail.id IN (SELECT id_detail FROM trans_clean WHERE date='".date("Y-m-d")."' AND jenis_pekerjaan='SORE') AND trans_jadwal.id_petugas='".$id_user."'
		");
		$num_sore2 = $query2->num_rows();
		$num_sore = ($num_sore1-$num_sore2);
		
		// ALL JOB DONE
		$query = $this->db->query("SELECT * FROM trans_clean WHERE date='".date("Y-m-d")."' AND id_petugas='".$id_user."'");
		$num2 = $query->num_rows();
		
		// echo $num2."<br>";
		
		
		
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
			$status_pekerjaan = "";
			$status_jam_kerja = 'false';
		}
		
		
		
		$result['status_pekerjaan'] = $status_pekerjaan;
		$result['data_job'] = $num_pagi+$num_sore;
		$result['data_done'] = $num2;
		
		echo json_encode($result);
	}
	
	function new_job_get() {
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		$result = array();
		
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');
		
		$this->db->select('*,master_lokasi_detail.id as id_detail');
		$this->db->from('master_lokasi_detail');
		$this->db->where('id_lokasi', $id_lokasi);
		$this->db->join('master_atm', 'master_lokasi_detail.id_atm = master_atm.id');
		
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
					master_lokasi_detail.id as id_detail
					FROM 
						master_lokasi_detail
							LEFT JOIN master_atm ON(master_lokasi_detail.id_atm = master_atm.id)
							WHERE 
								id_lokasi='$id_lokasi' AND
								master_lokasi_detail.id NOT IN (SELECT id_detail FROM trans_clean WHERE jenis_pekerjaan='$status_pekerjaan' AND date='$date')
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
	
	function new_job_detail_get() {
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		$result = array();
		
		$id = $this->input->get('id');
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');
		
		$query = "
			SELECT 
				*,  
				master_lokasi_detail.id as id_detail
				FROM 
					master_lokasi_detail
						LEFT JOIN master_atm ON(master_lokasi_detail.id_atm = master_atm.id)
						WHERE 
							id_lokasi='$id_lokasi' AND
							master_lokasi_detail.id = '$id'
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
		
		echo json_encode($result);
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
					master_lokasi_detail.id as id_detail
					FROM 
						master_lokasi_detail
							LEFT JOIN master_atm ON(master_lokasi_detail.id_atm = master_atm.id)
							WHERE 
								id_lokasi='$id_lokasi' AND
								master_atm.idatm = '$id_atm' AND
								master_lokasi_detail.id NOT IN (SELECT id_detail FROM trans_clean WHERE id_petugas='$id_user' AND date='".date('Y-m-d')."' AND jenis_pekerjaan='$status_pekerjaan')
								
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
				if($row->name=="CHECK LIST KEBERSIHAN") {
					$data['kebersihan'][$i]['item'] = $r->list;
				} else {
					$data['perlengkapan'][$i]['item'] = $r->list;
				}
				
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
	
	function save_job_get() {
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		
		date_default_timezone_set("Asia/Jakarta");

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
		} elseif ($hour >=$sore_dari && $hour<=$sore_hingga) {
			$status_pekerjaan = "SORE";
		}
		
		$result = array();
		
		$id_user = $this->input->get('id_user');
		$id_detail = $this->input->get('id_detail');
		$data_save = $this->input->get('data_save');
		$data_problem = $this->input->get('data_problem');
		
		$data_simpan['date'] = date("Y-m-d");
		$data_simpan['id_petugas'] = $id_user;
		$data_simpan['id_detail'] = $id_detail;
		$data_simpan['action'] = $data_save;
		$data_simpan['jenis_pekerjaan'] = $status_pekerjaan;
		
		// echo "<pre>";
		// print_r($data_problem);
		// print_r($data_simpan);
		
		$this->db->select('*');
		$this->db->from('trans_clean');
		$this->db->where('date', date("Y-m-d"));
		$this->db->where('id_petugas', $id_user);
		$this->db->where('id_detail', $id_detail);
		$this->db->where('jenis_pekerjaan', $status_pekerjaan);
		$query = $this->db->get();
		$num_rows = $query->num_rows();
		
		if ($num_rows == 0) {
			$this->db->insert('trans_clean', $data_simpan);
			$insert_id = $this->db->insert_id();
			
			if(count(json_decode($data_problem))>0) {
				$data_simpan_problem['id_clean'] = $insert_id;
				$data_simpan_problem['problem'] = $data_problem;
				$this->db->insert('trans_activity', $data_simpan_problem);
			}
			
			$result['data'] = "success";
		} else {
			$result['data'] = "success";
		}
		
		$data_send = $this->input->get();
		$result['data_send'] = $data_send;
		
		echo json_encode($result);
	}
}