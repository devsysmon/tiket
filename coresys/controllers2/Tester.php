<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tester extends CI_Controller {
    var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
    }
    
    /**
	 * View method
	 */
    public function index() {
        return view('pages/tester/index', $this->data);
    }
	
	public function read() {
		$lines = file('20161029.jrn');
		
		$no = $_POST['no'];
		$data = array();
		foreach($lines as $key => $line) {
			if($key==$no) {
				// $no++;
				// echo $line;
				$data['value'] = $line;
			}
		}
		
		$data['count'] = $no+1;
		
		echo json_encode($data);
		exit();
	}
	public function read2() {
		$lines2 = file('20161101.jrn');
		
		$no2 = $_POST['no'];
		$data2 = array();
		foreach($lines2 as $key => $line) {
			if($key==$no2) {
				// $no++;
				// echo $line;
				$data2['value'] = $line;
			}
		}
		
		$data2['count'] = $no2+1;
		
		echo json_encode($data2);
		exit();
	}
}