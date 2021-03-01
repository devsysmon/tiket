<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;

class Transaction_out_sp extends MY_Controller {
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
		$this->data['part'] = $this->db->query('SELECT * FROM master_inventory')->result();
		$this->data['get_part'] = function($merk = 0) {
			$this->db->where('merk', $merk);
			$array = $this->db->query('SELECT * FROM master_inventory')->result();

			return $array;
	   };
		
	
		return view('pages/master_transaction_out_sp/index', $this->data);
	}

	public function get_part() {
		$array = $this->db->query('SELECT * FROM master_inventory WHERE merk="'.$_REQUEST['merk'].'"')->result();

		echo json_encode($array);
	}

	public function get_cust() {
		$array = $this->db->query('SELECT * FROM master_atm')->result();

		echo json_encode($array);
	}
	
	public function add() {
		
		$this->data['id'] = '';
		
		return view('pages/master_transaction_out_sp/form', $this->data);
	}
	
	public function edit($id) {
		$this->db->where("id", $id);
		$row = $this->db->get("master_transaction_out_sp")->row();
		
		// echo "<pre>";
		// print_r($row);
		
		$this->data['id'] = $row->id;
		
		
		return view('pages/master_transaction_out_sp/form', $this->data);
	}
	
	/**
	 * Process method
	 */
	public function insert() {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$id = trim($this->input->post("id"));
		$kode_part = trim($this->input->post("kode_part"));
		$pid = trim($this->input->post("pid"));
		$tgl_terpakai = trim($this->input->post("tgl_terpakai"));
		$quantity = trim($this->input->post("quantity"));
		
		$data = array();
		if($id==null){
			$res = $this->db->query("SELECT * FROM master_transaction_out_sp WHERE tgl_terpakai='$tgl_terpakai' AND kode_part='$kode_part'");
			if($res->num_rows() > 0) {
				$data['tgl_terpakai'] = $res->row()->tgl_terpakai;
				$data['kode_part'] = $res->row()->kode_part;
				$data['id_atm'] = $res->row()->id_atm;
				$data['quantity'] = $res->row()->quantity + $quantity;

				$this->db->where('id', $res->row()->id);
				$result = $this->db->update('master_transaction_out_sp', $data);
			} else {
				$data['tgl_terpakai'] = $tgl_terpakai;
				$data['kode_part'] = $kode_part;
				$data['id_atm'] = $pid;
				$data['quantity'] = $quantity;
				$result = $this->db->insert('master_transaction_out_sp', $data);
			}
		} else {
			$data['tgl_terpakai'] = $tgl_terpakai;
			$data['kode_part'] = $kode_part;
			$data['id_atm'] = $pid;
			$data['quantity'] = $quantity;
			$this->db->where('id', $id);
			$result = $this->db->update('master_transaction_out_sp', $data);
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
		$result = $this->db->update('master_transaction_out_sp', $data);
		
		if($result) {
			echo "<script>alert('SUCCESS');</script>";
		} else {
			echo "<script>alert('FAILED');</script>";
		}
		
		redirect('master_transaction_out_sp');
	}
	
	public function delete($id) {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$this->db->where('id', $id);
        $result = $this->db->delete('master_transaction_out_sp');
		
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
            1=>'tgl_terima',
            2=>'kode_part',
            3=>'quantity'
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
		// $this->db->where('merk', urldecode($merk));
		if($merk!=="0") {
			$where = "WHERE b.merk='".urldecode($merk)."'";
		} else {
			$where = "";
		}
		$query = "SELECT *, a.id as ids, c.idatm as pid FROM master_transaction_out_sp a 
		LEFT JOIN master_inventory b ON(a.kode_part=b.kode_part) 
		LEFT JOIN master_atm c ON(a.id_atm=c.id) 
		$where";
        $employees = $this->db->query($query);
        $data = array();
		
		$no = 0;
		foreach($employees->result() as $rows) {
			$no++;
			$url = base_url().'transaction_out_sp';
            $data[]= array(
                $no,
                $rows->tgl_terpakai,
                $rows->kode_part,
                $rows->nama_part,
                $rows->quantity,
                $rows->pid,
                $rows->lokasi,
                $rows->sn_mesin,
                '<a onclick="updateModal(
					\''.$rows->ids.'\',
					\''.$rows->tgl_terpakai.'\',
					\''.$rows->kode_part.'\',
					\''.$rows->pid.'\',
					\''.$rows->quantity.'\'
				)" class="btn btn-warning mr-1"><img style="float: left; margin: 3px 5px 0px 0px; height:15px; width:15px; " src="'.base_url().'seipkon/assets/img/edit.png"/>Edit</a>
                 <a onclick="deleteAction(\''.$url.'/delete/'.$rows->ids.'\')" class="btn btn-danger mr-1"><img style="float: left; margin: 3px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'seipkon/assets/img/delete.png"/>Delete</a>'
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
		$query = $this->db->select("COUNT(*) as num")->get("master_transaction_in");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
	}
}
