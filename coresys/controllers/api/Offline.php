<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Offline extends REST_Controller {
	function __construct($config = 'rest') {
        parent::__construct($config);
		$this->load->database();
		
		$this->methods['index_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['index_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['index_delete']['limit'] = 50; // 50 requests per hour per user/key
    }
	
	function index_get() {
		echo "test";
	}

	function info_get() {
		$id_user = $this->input->get('id_user');
		
		// $query = "
			// SELECT *, master_ticket.id as ids FROM master_ticket
			// LEFT JOIN master_atm ON(master_atm.id=master_ticket.atm_id)
			// WHERE master_ticket.pic='".$id_user."' AND accept_time IS NULL
		// ";
		
		// $query = $this->db->query($query);
		// $num_rows = $query->num_rows();
		// $res = $query->result_array();

		// $result = array();
		// if ($num_rows > 0) {
			// $list = array();
			// $key=0;
			// foreach($res as $r) {
				// $list[$key]['id'] = $r['ids'];
				// $list[$key]['idatm'] = $r['idatm'];
				// $list[$key]['cabang'] = $r['cabang'];
				// $list[$key]['lokasi'] = $r['lokasi'];
				// $list[$key]['alamat'] = $r['alamat'];
				
				// $key++;
			// }
			
			// $result['data'] = $list;
		// } else {
			// $result['data'] = array();
		// }
		
		$query1 = $this->db->query("SELECT * FROM master_ticket WHERE entry_date LIKE '%".date("Y-m-d")."%' AND pic='".$id_user."'"); $num1 = $query1->num_rows();
		
		$query2 = $this->db->query("SELECT * FROM master_ticket WHERE entry_date LIKE '%".date("Y-m-d")."%' AND pic='".$id_user."'"); $num2 = $query2->num_rows();
		
		
		$result['data_job'] = $num1;
		$result['data_done'] = $num2;
		
		echo json_encode($result);
	}
}