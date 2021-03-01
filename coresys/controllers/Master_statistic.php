<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class Master_statistic extends MY_Controller {
	var $terpakai, $sisa, $kebutuhan, $kekurangan, $status;
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}

	public function index() {
		$this->db->select('*, master_location_detail.id as id_detail');
		$this->db->from('master_atm');
		$this->db->join('master_location_detail', 'master_atm.id=master_location_detail.id_atm');
		$query = $this->db->get();
		$result = $query->result();
		
		$this->data['kunjungan'] = $this->kunjungan();
		$this->data['data_atm'] = $result;
		
		return view('pages/master_statistic/index', $this->data);
	}
	
		// Total kunjungan
	public function kunjungan()
	{
		$this->db->select('hari, COUNT(*) AS total');
		$this->db->from('kunjungan');
		$this->db->group_by('hari');
		$this->db->order_by('hari', 'desc');
		$this->db->limit(14);
		$query = $this->db->get();
		return $query->result();
	}
}