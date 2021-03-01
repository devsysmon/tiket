<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitor_atm extends CI_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}
	
	public function index() {	
		$res = $this->db->query("SELECT * FROM blok ORDER BY name_blok ASC")->result();
		$this->data['stasiun'] = $res;
	
		return view('pages/monitor_atm/index', $this->data);
	}
	
	public function form_add() {
		return view('pages/monitor_atm/form', $this->data);
	}
	
	public function save() {
		echo "<pre>";
		print_r($_REQUEST);
	}
	
	public function get_data() {
		
		// if(!isset($_GET['pn']) || !is_numeric($_GET['pn'])){
			// $page = 1;
		// } else {
			// $page = $_GET['pn'];
		// }
		
		// $numofpages = ceil($totalrows / $limit);
		// $limitvalue = $page * $limit - ($limit);
		
		$this->db->limit(10,0);
		$this->db->select('*');
		$this->db->from('client');
		$result = $this->db->get()->result();
		$no = 0;
		$start = 1;
		
		foreach($result as $row) {
			$ip_client = $row->ip_client;
			$id_client = $row->id_client;
			$status_client = $row->status_client;
			exec("ping -n 1 $ip_client", $output['ke'.$ip_client], $status);
			if($status==0) {
				$cut = explode(":", $output['ke'.$ip_client]['2']);
				$hasil = trim($cut['0'], " .");
				switch ($hasil) {
					case 'Request timed out':
						$log = "Request timed out";
						if ($status_client !== "$log") {
						}
						$status="<button type='button' class='btn btn-success btn-circle'>
						<i class='fa fa-times'></i>
						</button>&nbsp;<font color='#5CB85C'>$log</font>";
					break;
					default:
						$hasil1 = trim($cut['1'], " .");
						switch ($hasil1) {
							case 'Destination net unreachable':
								$log =  "Destination net unreachable";
								if ($status_client !== "$log") {
									
								}
								$status="<button type='button' class='btn btn-success btn-circle'>
								<i class='fa fa-question-circle'></i>
								</button>&nbsp;<font color='#5CB85C'>$log</font>";
							break;
							case 'Destination host unreachable':
								$log = "Destination host unreachable";
								if ($status_client !== "$log") {
									
								}
								$status="<button type='button' class='btn btn-success btn-circle'>
								<i class='fa fa-question-circle'></i>
								</button>&nbsp;<font color='#5CB85C'>$log</font>";
							break;
							default:
								$log = "Connected";
								if ($status_client !== "$log") {
									
								}
								$status = "<button type='button' class='btn btn-warning btn-circle'>
								<i class='fa fa-check'></i>
								</button>&nbsp;<font color='#F0AD4E'>$log</font>";
							break;
						}
					break;
				}
			} else {
				$log = "Disconnected";
				if ($status_client !== "$log") {
				}
				$status="<button type='button' class='btn btn-danger btn-circle'>
				<i class='fa fa-power-off'></i>
				</button>&nbsp;<font color='#D9534F'>$log</font>";
			}
			
			$data[] = array(
                "no" => $no+$start,
				"name_client" => $row->name_client, 
				"ip_client" => $row->ip_client, 
				"status" => $status,
				"aksi" => "
				<button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#modalEdit$id_client'>
					<i class='glyphicon glyphicon-pencil'></i> Edit
				</button>
				<button class='btn btn-danger btn-sm' data-toggle='modal' data-target='#modalDel$id_client'> Hapus
					<i class='glyphicon glyphicon-trash'></i>
				</button>
				"
			);
		}
		
		$output = array(
            "data" => $data
        );
		echo json_encode($output);
        exit();
		
		// $this->output($output);
		// echo json_encode($output);
	}
	
	public function output($return=array()){
		/*Set response header*/
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		/*Final JSON response*/
		exit(json_encode($return));
	}
}
