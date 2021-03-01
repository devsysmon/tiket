<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;

class Master_atm extends CI_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}
	
	/**
	 * View method
	 */
	public function index() {	
		$result = $this->db->get("master_atm")->result();
		
		foreach($result as $r) {
			$qrCode = new QrCode($r->idatm);
			$qrCode->setSize(300);
			
			$qrCode->writeFile(realpath(__DIR__ . '/../../upload/qrcode').'/'.$r->idatm.'.png');
		}
		
		$this->data['client'] = $this->db->get('master_client')->result();
	
		return view('pages/master_atm/index', $this->data);
	}
	
	public function add() {
		
		$this->data['id'] = '';
		$this->data['idatm'] = '';
		$this->data['cabang'] = '';
		$this->data['lokasi'] = '';
		$this->data['alamat'] = '';
		$this->data['kategori'] = '';
		$this->data['status'] = '';
		
		return view('pages/master_atm/form', $this->data);
	}
	
	public function edit($id) {
		$this->db->where("id", $id);
		$row = $this->db->get("master_atm")->row();
		
		// echo "<pre>";
		// print_r($row);
		
		$this->data['id'] = $row->id;
		$this->data['idatm'] = $row->idatm;
		$this->data['cabang'] = $row->cabang;
		$this->data['lokasi'] = $row->lokasi;
		$this->data['alamat'] = $row->alamat;
		$this->data['kategori'] = $row->kategori;
		$this->data['status'] = $row->status;
		
		
		return view('pages/master_atm/form', $this->data);
	}
	
	/**
	 * Process method
	 */
	public function insert() {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$id = trim($this->input->post("id"));
		$id_serial = $this->db->query('SELECT id FROM master_serial WHERE id NOT IN (SELECT id_serial FROM master_atm) ORDER BY id ASC LIMIT 0,1')->row()->id;
		$id_bank = trim($this->input->post("id_bank"));
		$idatm = trim($this->input->post("idatm"));
		$cabang = trim($this->input->post("cabang"));
		$lokasi = trim($this->input->post("lokasi"));
		$alamat = trim($this->input->post("alamat"));
		$sn_mesin = trim($this->input->post("sn_mesin"));
		$status = trim($this->input->post("status"));
		
		// BELOM
		$foto = trim($this->input->post("foto"));
		$latitude = trim($this->input->post("latitude"));
		$longitude = trim($this->input->post("longitude"));
		
		$data = array();
		if($id==null){
			$data['id_serial'] = $id_serial;
			$data['id_bank'] = $id_bank;
			$data['idatm'] = $idatm;
			$data['cabang'] = $cabang;
			$data['lokasi'] = $lokasi;
			$data['alamat'] = $alamat;
			$data['sn_mesin'] = $sn_mesin;
			$data['status'] = $status;
			$data['latitude'] = $latitude;
			$data['longitude'] = $longitude;
			$result = $this->db->insert('master_atm', $data);
			
			$qrCode = new QrCode($idatm);
			$qrCode->setSize(300);
			$qrCode->writeFile(realpath(__DIR__ . '/../../upload/qrcode').'/'.$idatm.'.png');
		} else {
			$data['id_bank'] = $id_bank;
			$data['idatm'] = $idatm;
			$data['cabang'] = $cabang;
			$data['lokasi'] = $lokasi;
			$data['alamat'] = $alamat;
			$data['sn_mesin'] = $sn_mesin;
			$data['status'] = $status;
			$data['latitude'] = $latitude;
			$data['longitude'] = $longitude;
			$this->db->where('id', $id);
			$result = $this->db->update('master_atm', $data);
			
			$qrCode = new QrCode($idatm);
			$qrCode->setSize(300);
			$qrCode->writeFile(realpath(__DIR__ . '/../../upload/qrcode').'/'.$idatm.'.png');
		}
		
		if($result) {
			echo "success";
		} else {
			echo "failed";
		}
	}
	
	public function update() {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$id = trim($this->input->post("id"));
		$idatm = trim($this->input->post("idatm"));
		$cabang = trim($this->input->post("cabang"));
		$lokasi = trim($this->input->post("lokasi"));
		$alamat = trim($this->input->post("alamat"));
		$kategori = trim($this->input->post("kategori"));
		$status = trim($this->input->post("status"));
		
		$data = array();
		$data['idatm'] = $idatm;
		$data['cabang'] = $cabang;
		$data['lokasi'] = $lokasi;
		$data['alamat'] = $alamat;
		$data['kategori'] = $kategori;
		$data['status'] = $status;
		$this->db->where("id", $id);
		$result = $this->db->update('master_atm', $data);
		
		if($result) {
			echo "<script>alert('SUCCESS');</script>";
		} else {
			echo "<script>alert('FAILED');</script>";
		}
		
		redirect('master_atm');
	}
	
	public function delete($id) {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$this->db->where('id', $id);
        $result = $this->db->delete('master_atm');
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
	} 
	
	/**
	 * Additional method
	 */
	public function get_data($id_bank) {
		$valid_columns = array(
            0=>'idatm',
            1=>'cabang',
            2=>'lokasi',
            3=>'alamat',
            4=>'kategori',
            5=>'status',
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
		if($id_bank!=="0") {
			$this->db->where('id_bank', $id_bank);
		}
        $employees = $this->db->get("master_atm");
        $data = array();
		
		$bank = function($id) {
			$nama = $this->db->query("SELECT nama FROM master_client WHERE id='$id'")->row()->nama;
			
			return $nama;
		};
		
		$no = 0;
		foreach($employees->result() as $rows) {
			$no++;
			$url = base_url().'master_atm';
            $data[]= array(
                $no,
                $rows->idatm,
                $bank($rows->id_bank),
                '<a href="'.base_url().'upload/qrcode/'.$rows->idatm.'.png" target="_blank"><img src="'.base_url().'upload/qrcode/'.$rows->idatm.'.png" width="200" height="200"></img></a>',
                $rows->cabang,
                $rows->lokasi,
                $rows->sn_mesin,
                '<a onclick="updateModal(
					\''.$rows->id.'\',
					\''.$rows->id_bank.'\',
					\''.$rows->idatm.'\',
					\''.$rows->cabang.'\',
					\''.$rows->lokasi.'\',
					\''.$rows->sn_mesin.'\',
					\''.$rows->status.'\',
					\''.$rows->latitude.'\',
					\''.$rows->longitude.'\',
					\''.$rows->alamat.'\'
				)" class="btn btn-warning mr-1"><img style="float: left; margin: 3px 5px 0px 0px; height:15px; width:15px; " src="'.base_url().'seipkon/assets/img/edit.png"/>Edit</a>
                 <a onclick="deleteAction(\''.$url.'/delete/'.$rows->id.'\')" class="btn btn-danger mr-1"><img style="float: left; margin: 3px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'seipkon/assets/img/delete.png"/>Delete</a>'
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
		$query = $this->db->select("COUNT(*) as num")->get("master_atm");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
	}
}
