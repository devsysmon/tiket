<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;

class All_return_bad extends MY_Controller {
	var $data = array();
	var $data_temp = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
		
		$this->load->library('session'); 
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
		
	
		return view('pages/all_return_bad/index', $this->data);
	}

	public function get_category() {
		$array = $this->db->query('SELECT * FROM master_inventory WHERE id="'.$_REQUEST['id'].'"')->row();
		
		echo $array->category;
	}
	
	public function get_part() {
		$array = $this->db->query('SELECT * FROM master_inventory WHERE merk="'.$_REQUEST['merk'].'"')->result();

		echo json_encode($array);
	}

	public function get_part2() {
		$merk = $this->input->post('merk');
		$search = $this->input->post('search');
		$search = "%".strtolower($search)."%";
		$query = "SELECT * FROM master_inventory WHERE merk='$merk' AND (kode_part LIKE '$search' OR nama_part LIKE '$search')";
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				$list[$key]['id'] = $row->id;
				$list[$key]['text'] = $row->merk." / ".$row->nama_part; 
				$key++;
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
	}
	
	public function add() {
		
		$this->data['id'] = '';
		
		return view('pages/all_return_bad/form', $this->data);
	}
	
	public function edit($id) {
		$this->db->where("id", $id);
		$row = $this->db->get("all_return_bad")->row();
		
		// echo "<pre>";
		// print_r($row);
		
		$this->data['id'] = $row->id;
		
		
		return view('pages/all_return_bad/form', $this->data);
	}
	
	/**
	 * Process method
	 */
	public function insert() {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$id = trim($this->input->post("id"));
		$kode_part = trim($this->input->post("kode_part"));
		$tgl_terima = trim($this->input->post("tgl_terima"));
		$quantity = trim($this->input->post("quantity"));
		
		$data = array();
		if($id==null){
			$res = $this->db->query("SELECT * FROM all_return_bad WHERE tgl_terima='$tgl_terima' AND kode_part='$kode_part'");
			if($res->num_rows() > 0) {
				$data['tgl_terima'] = $res->row()->tgl_terima;
				$data['kode_part'] = $res->row()->kode_part;
				$data['quantity'] = $res->row()->quantity + $quantity;

				$this->db->where('id', $res->row()->id);
				$result = $this->db->update('all_return_bad', $data);
			} else {
				$data['tgl_terima'] = $tgl_terima;
				$data['kode_part'] = $kode_part;
				$data['quantity'] = $quantity;
				$result = $this->db->insert('all_return_bad', $data);
				if($result) {
					$id_detail = $this->db->insert_id();
					$this->insert_temp($id_detail);
				}
			}
		} else {
			$data['tgl_terima'] = $tgl_terima;
			$data['kode_part'] = $kode_part;
			$data['quantity'] = $quantity;
			$this->db->where('id', $id);
			$result = $this->db->update('all_return_bad', $data);
		}
		
		if($result) {
			echo "success";
		} else {
			echo "failed";
		}
	}
	
	public function count_data_temp() {
		if(isset($_SESSION['temp'])) {
			echo count($_SESSION['temp']);
		} else {
			echo 0;
		}
	}
	
	public function insert_temp($id_detail) {
		if(isset($_SESSION['temp'])) {
			$data_temp = $_SESSION['temp'];
			foreach($data_temp as $k => $r) {
				$arr = array();
				foreach($r as $x => $y) {
					$arr[] = array(
						'id_detail' => $id_detail,
						'kode_part' => $y['kode_part'],
						'status_part' => $y['status_part'],
						'part_no' => $y['part_no'],
						'sn_part' => $y['sn_part'],
						'price' => $y['price']
					);
				}
				$result = $this->db->insert_batch('master_inventory_part', $arr);
				if($result) {
					unset($_SESSION['temp']);
				} else {
					echo "failed";
				}
			}
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
		$result = $this->db->update('all_return_bad', $data);
		
		if($result) {
			echo "<script>alert('SUCCESS');</script>";
		} else {
			echo "<script>alert('FAILED');</script>";
		}
		
		redirect('all_return_bad');
	}
	
	public function delete($id) {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$this->db->where('id', $id);
        $result = $this->db->delete('all_return_bad');
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
	} 
	
	public function deletetemp($id) {
		array_splice($_SESSION['temp'], $id, 1);
	}
	
	/**
	 * Additional method
	 */
	 
	public function clear_temp() {
		$_SESSION['temp'] = array();
	}
	 
	public function add_data_temp() {
		$data = array(
			"kode_part" => $this->input->post("kode_part"),
			"status_part" => $this->input->post("status_part"),
			"part_no" => $this->input->post("part_no"),
			"sn_part" => $this->input->post("sn_part"),
			"price" => $this->input->post("price"),
		);
		
		$array = ($_SESSION['temp']==null ? array() : $_SESSION['temp']);
		$newdata = array($data);
		array_push($array, $newdata);
		
		$_SESSION['temp'] = $array;
	}
	
	public function get_data_temp() {
		$data_temp = $_SESSION['temp'];
		
		$total_employees = count($data_temp);
		
		$url = base_url().'all_return_bad';
		$data = array();
		$no = 0;
		foreach($data_temp as $k => $r) {
			$no++;
			$arr = array();
			foreach($r as $x => $y) {
				$arr = array(
					$no,
					$y['kode_part'],
					$y['status_part'],
					$y['part_no'],
					$y['sn_part'],
					$y['price'],
					'<a onclick="deleteTemp(\''.$url.'/deletetemp/'.$k.'\')" class="btn btn-danger mr-1">Delete</a>'
				);
			}
			array_push($data, $arr);
			// print_r($data);
		}
		$output = array(
            "draw" => 0,
            "recordsTotal" => $total_employees,
            "recordsFiltered" => $total_employees,
            "data" => $data
        );
        echo json_encode($output);
        exit();
	}
	 
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
		// $query = "SELECT *, a.id as ids FROM all_return_bad a LEFT JOIN master_inventory b ON(a.kode_part=b.id) $where";
		$query = "SELECT *, a.id as ids, a.quantity, count(a.id) as cnt FROM all_return_bad a 
				  LEFT JOIN master_inventory b ON(a.kode_part=b.id) 
				  LEFT JOIN master_inventory_part c ON(c.id_detail=a.id)
				  $where GROUP BY a.id";
        $employees = $this->db->query($query);
        $data = array();
		
		$no = 0;
		foreach($employees->result() as $rows) {
			$no++;
			$url = base_url().'all_return_bad';
            $data[]= array(
                $no,
                $rows->tgl_terima,
                $rows->merk,
                $rows->nama_part,
                $rows->quantity,
                '<a onclick="updateModal(
					\''.$rows->ids.'\',
					\''.$rows->tgl_terima.'\',
					\''.$rows->kode_part.'\',
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
		$query = $this->db->select("COUNT(*) as num")->get("all_return_bad");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
	}
}
