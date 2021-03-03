<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Costing_job extends MY_Controller {
    var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
    }
	
	public function index() {
        return view('pages/costing_job/index', $this->data);
    }
	
	public function dataList() {
		$result = $this->db->query("SELECT * FROM finance_akomodation LEFT JOIN master_ticket ON (master_ticket.ticket_id=finance_akomodation.ticket_id)")->result();
		
		// echo "<pre>";
		
		$data = array();
		$res = array();
		foreach($result as $r) {
			$data['name'] = $r->ticket_id;
			$data['est'] = $r->ticket_id;
			$data['contacts'] = $r->ticket_id;
			$data['status'] = $r->ticket_id;
			$data['target-actual'] = $r->ticket_id;
			$data['actual'] = $r->ticket_id;
			$data['tracker'] = $r->ticket_id;
			$data['starts'] = $r->ticket_id;
			$data['ends'] = $r->ticket_id;
			$data['comments'] = $r->ticket_id;
			$data['detail'] = $r->detail;
			$data['action'] = "<button class='btn btn-xs btn-success pull-right' onclick='costing_acceptence(\"".$r->id."\")'>COSTING APPROVEMENT</button> ";
		}
		
		$res['data'] = array($data);
		
		header('Content-Type: application/json');
		echo json_encode($res);
	}
}    