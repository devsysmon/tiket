<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;

class Master_inventory extends CI_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}
	
	/**
	 * View method
	 */
	public function index() {	
		$this->data['merk'] = $this->db->query('SELECT * FROM master_merk GROUP BY merk')->result();
		
	
		return view('pages/master_inventory/index', $this->data);
	}
	
	public function add() {
		
		$this->data['id'] = '';
		$this->data['idatm'] = '';
		$this->data['cabang'] = '';
		$this->data['lokasi'] = '';
		$this->data['alamat'] = '';
		$this->data['kategori'] = '';
		$this->data['status'] = '';
		
		return view('pages/master_inventory/form', $this->data);
	}
	
	public function edit($id) {
		$this->db->where("id", $id);
		$row = $this->db->get("master_inventory")->row();
		
		// echo "<pre>";
		// print_r($row);
		
		$this->data['id'] = $row->id;
		$this->data['idatm'] = $row->idatm;
		$this->data['cabang'] = $row->cabang;
		$this->data['lokasi'] = $row->lokasi;
		$this->data['alamat'] = $row->alamat;
		$this->data['kategori'] = $row->kategori;
		$this->data['status'] = $row->status;
		
		
		return view('pages/master_inventory/form', $this->data);
	}
	
	/**
	 * Process method
	 */
	public function insert() {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$id = trim($this->input->post("id"));
		$kode_part = trim($this->input->post("kode_part"));
		$nama_part = trim($this->input->post("nama_part"));
		$part_no = trim($this->input->post("part_no"));
		$stock = trim($this->input->post("stock"));
		$merk = trim($this->input->post("merk"));
		$price = trim($this->input->post("price"));
		
		$data = array();
		if($id==null){
			$data['kode_part'] = $kode_part;
			$data['nama_part'] = $nama_part;
			$data['part_no'] = $part_no;
			$data['stock'] = $stock;
			$data['merk'] = $merk;
			$data['price'] = $price;
			$result = $this->db->insert('master_inventory', $data);
		} else {
			$data['kode_part'] = $kode_part;
			$data['nama_part'] = $nama_part;
			$data['part_no'] = $part_no;
			$data['stock'] = $stock;
			$data['merk'] = $merk;
			$data['price'] = $price;
			$this->db->where('id', $id);
			$result = $this->db->update('master_inventory', $data);
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
		$result = $this->db->update('master_inventory', $data);
		
		if($result) {
			echo "<script>alert('SUCCESS');</script>";
		} else {
			echo "<script>alert('FAILED');</script>";
		}
		
		redirect('master_inventory');
	}
	
	public function delete($id) {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$this->db->where('id', $id);
        $result = $this->db->delete('master_inventory');
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
	} 
	
	/**
	 * Additional method
	 */
	public function get_data($merk) {
		$merk = urldecode($merk);
		$valid_columns = array(
            0=>'id',
            1=>'kode_part',
            2=>'nama_part',
            3=>'merk',
            4=>'part_no',
            5=>'stock',
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
		if($merk!=="0") {
			$this->db->where('merk', urldecode($merk));
		}
        $employees = $this->db->get("master_inventory");
        $data = array();
		
		$no = 0;
		foreach($employees->result() as $rows) {
			$no++;
			$url = base_url().'master_inventory';
            $data[]= array(
                $no,
                $rows->kode_part,
                $rows->nama_part,
                $rows->merk,
                $rows->part_no,
                $rows->stock,
                number_format($rows->price, 0, ",", "."),
                '<a onclick="updateModal(
					\''.$rows->id.'\',
					\''.$rows->kode_part.'\',
					\''.$rows->nama_part.'\',
					\''.$rows->merk.'\',
					\''.$rows->part_no.'\',
					\''.$rows->stock.'\',
					\''.$rows->price.'\'
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
		$query = $this->db->select("COUNT(*) as num")->get("master_inventory");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
	}
}
