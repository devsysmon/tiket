<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}
	
	/**
	 * Default method
	 */
	public function index()
	{	
		return view('pages/dashboard', $this->data);
	}
	
	public function get_data_mesin() {
		$query = $this->db->query("SELECT * FROM master_atm");
		$num = $query->num_rows();
		
		echo $num;
	}
	
	public function get_data_user() {
		$query = $this->db->query("SELECT * FROM master_petugas");
		$num = $query->num_rows();
		
		echo $num;
	}
	
	public function get_data_client() {
		$query = $this->db->query("SELECT * FROM master_client");
		$num = $query->num_rows();
		
		echo $num;
	}
	
	public function get_total_ticket() {
		$query = $this->db->query("SELECT * FROM master_ticket");
		$num = $query->num_rows();
		
		echo $num;
	}
	
	public function total_job_done() {
		$query = $this->db->query("SELECT * FROM master_ticket WHERE status='CLOSED'");
		$num = $query->num_rows();
		
		echo ($num);
		
	}
	
	public function total_job_pending() {
		$query = $this->db->query("SELECT * FROM master_ticket WHERE status='PENDING'");
		$num = $query->num_rows();
		
		echo ($num);
		
	}
	
	public function total_job_onprogress() {
		$query = $this->db->query("SELECT * FROM master_ticket WHERE status='OPEN'");
		$num = $query->num_rows();
		
		echo ($num);
		
	}
	
	public function ticket_today() {
		$query = $this->db->query("SELECT * FROM master_ticket WHERE entry_date='".date("Y-m-d")."'");
		$num = $query->num_rows();
		
		echo ($num);
		
	}
	
	public function job_done_today() {
		$query = $this->db->query("SELECT * FROM master_ticket WHERE status='CLOSED' AND entry_date='".date("Y-m-d")."'");
		$num = $query->num_rows();
		
		echo ($num);
		
	}
	
	public function job_pending_today() {
		$query = $this->db->query("SELECT * FROM master_ticket WHERE status='PENDING' AND entry_date='".date("Y-m-d")."'");
		$num = $query->num_rows();
		
		echo ($num);
		
	}
	
	public function get_data_sore() {
		$query = $this->db->query("
			SELECT * FROM master_atm
				LEFT JOIN master_lokasi_detail ON(master_lokasi_detail.id_atm=master_atm.id)
				LEFT JOIN trans_clean ON(trans_clean.id_detail=master_lokasi_detail.id AND date='".date("Y-m-d")."' AND jenis_pekerjaan='SORE')
		");
		$num = $query->num_rows();
		
		$query2 = $this->db->query("
			SELECT * FROM master_atm
				LEFT JOIN master_lokasi_detail ON(master_lokasi_detail.id_atm=master_atm.id)
				WHERE master_lokasi_detail.id IN (SELECT id_detail FROM trans_clean WHERE date='".date("Y-m-d")."' AND jenis_pekerjaan='SORE')
		");
		$num2 = $query2->num_rows();
		// echo $this->db->last_query();
		
		echo ($num-$num2);
	}
	
	public function get_data_pagi_done() {
		$query = $this->db->query("
			SELECT * FROM master_atm
				LEFT JOIN master_lokasi_detail ON(master_lokasi_detail.id_atm=master_atm.id)
				LEFT JOIN trans_clean ON(trans_clean.id_detail=master_lokasi_detail.id AND  date='".date("Y-m-d")."' AND jenis_pekerjaan='PAGI')
		");
		$num = $query->num_rows();
		
		$query2 = $this->db->query("
			SELECT * FROM master_atm
				LEFT JOIN master_lokasi_detail ON(master_lokasi_detail.id_atm=master_atm.id)
				WHERE master_lokasi_detail.id IN (SELECT id_detail FROM trans_clean WHERE date='".date("Y-m-d")."' AND jenis_pekerjaan='PAGI')
		");
		$num2 = $query2->num_rows();
		// echo $this->db->last_query();
		
		echo (($num2/$num)*100)."%";
		
	}
	
	public function get_data_sore_done() {
		$query = $this->db->query("
			SELECT * FROM master_atm
				LEFT JOIN master_lokasi_detail ON(master_lokasi_detail.id_atm=master_atm.id)
				LEFT JOIN trans_clean ON(trans_clean.id_detail=master_lokasi_detail.id AND date='".date("Y-m-d")."' AND jenis_pekerjaan='SORE')
		");
		$num = $query->num_rows();
		
		$query2 = $this->db->query("
			SELECT * FROM master_atm
				LEFT JOIN master_lokasi_detail ON(master_lokasi_detail.id_atm=master_atm.id)
				WHERE master_lokasi_detail.id IN (SELECT id_detail FROM trans_clean WHERE date='".date("Y-m-d")."' AND jenis_pekerjaan='SORE')
		");
		$num2 = $query2->num_rows();
		// echo $this->db->last_query();
		
		echo (($num2/$num)*100)."%";
	}
	
	public function get_data_atm() {
		$query = $this->db->query("SELECT * FROM master_atm")->result();
		
		$key = 0;
		$res = array();
		foreach($query as $r) {
			$res[$key]['idatm'] = $r->idatm;
			$res[$key]['latlng'] = json_encode(array("lat"=>$r->latitude, "lng"=>$r->longitude));
			
			$key++;
		}
		
		// echo json_encode($query);
		echo json_encode($res);
	}
}
