<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_require_part extends CI_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}
	
	/**
	 * View method
	 */
	public function index($id) {	
		$this->data['sparepart'] = $this->db->query("SELECT * FROM master_inventory WHERE kode_part NOT IN (SELECT kode_part FROM master_require_part)")->result();
		$this->data['id'] = $id;
	
		return view('pages/master_require_part/index', $this->data);
	}
	
	public function add() {
		return view('pages/master_require_part/add');
	}
	
	public function edit() {
		return view('pages/master_require_part/edit');
	}
	
	public function tes($id) {
		$this->db->where('id', $id);
		$res = $this->db->get('master_location')->row();
		
		echo strtoupper($res->name);
	}
	
	public function tes2($id, $field) {
		$this->db->where('id', $id);
		$res = $this->db->get('master_atm')->row();
		
		return $res->$field;
	}
	
	/**
	 * Process method
	 */
	public function insert() {
		// echo "<pre>";
		// print_r();
		
		$id = trim($this->input->post("id"));
		$kode_part = trim($this->input->post("kode_part"));
		$quantity = trim($this->input->post("quantity"));
		
		$data['id_lokasi'] = $id;
		$data['kode_part'] = $kode_part;
		$data['quantity'] = $quantity;
		
		$this->db->where('kode_part', $kode_part);
		$res = $this->db->get('master_require_part');
		$num = $res->num_rows();
		
		if($num>0) {
			$result['status'] = 'exist';
		} else {
			$res = $this->db->insert('master_require_part', $data);
			
			if($res) {
				$result['status'] = 'success';
			} else {
				$result['status'] = 'failed';
			}
		}
		echo json_encode($result);
	}
	
	public function update() {
		
	}
	
	public function delete($id) {
		$this->db->where('id', $id);
        $result = $this->db->delete('master_require_part');
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
	} 
	
	/**
	 * Additional method
	 */
	 
	function select_part() {
		$search = $this->input->post('search');
		// if($search!="") {
		$search = "%".strtolower($search)."%";
		// }
		$query = "SELECT * FROM master_inventory WHERE kode_part NOT IN (SELECT kode_part FROM master_require_part) AND (kode_part LIKE '$search' OR nama_part LIKE '$search')";
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				$list[$key]['id'] = $row->kode_part;
				$list[$key]['text'] = $row->kode_part.' - '.$row->nama_part; 
				$key++;
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
	}
	 
	public function get_data() {
		$id = $this->uri->segment(3);
		$valid_columns = array(
            0=>'master_require_part.id',
            1=>'kode_part'
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
        $this->db->select('master_require_part.*, master_inventory.nama_part');
        $this->db->from('master_require_part');
        $this->db->join('master_inventory', 'master_inventory.kode_part = master_require_part.kode_part');
        $employees = $this->db->get();
        $data = array();
		
		$no = $start;
		foreach($employees->result() as $rows) {
			$no++;
			$url = base_url().'master_require_part';
			$url2 = base_url().'master_detail_lokasi';
            $data[]= array(
                $no,
                $rows->kode_part,
                $rows->nama_part,
                $rows->quantity,
                '<center>
					<a onclick="deleteAction2(\''.$url.'/delete/'.$rows->id.'\')" class="btn btn-danger mr-1"><img style="float: left; margin: 3px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'seipkon/assets/img/delete.png"/>Delete</a>
				 </center>'
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
		$query = $this->db->select("COUNT(*) as num")->get("master_require_part");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
	}
}
