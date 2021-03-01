<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_item_detail extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}
	
	/**
	 * View method
	 */
	public function index($id) {	
		$this->data['atm'] = $this->db->query("SELECT * FROM master_item WHERE id NOT IN (SELECT id_detail FROM master_item_detail)")->result();
		$this->data['id'] = $id;
	
		return view('pages/master_item_detail/index', $this->data);
	}
	
	public function add() {
		return view('pages/master_item_detail/add');
	}
	
	public function edit() {
		return view('pages/master_item_detail/edit');
	}
	
	public function tes($id) {
		$this->db->where('id', $id);
		$res = $this->db->get('master_item')->row();
		
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
		$id_detail = trim($this->input->post("id_detail"));
		$list = trim($this->input->post("list"));
		
		if($id==null) {
			$data['id_detail'] = $id_detail;
			$data['list'] = $list;
			
			$this->db->where('list', $list);
			$res = $this->db->get('master_item_detail');
			$num = $res->num_rows();
			
			if($num>0) {
				$result['status'] = 'exist';
			} else {
				$res = $this->db->insert('master_item_detail', $data);
				
				if($res) {
					$result['status'] = 'success';
				} else {
					$result['status'] = 'failed';
				}
			}
			echo json_encode($result);
		} else {
			$data['id_detail'] = $id_detail;
			$data['list'] = $list;
			
			$this->db->where('list', $list);
			$res = $this->db->get('master_item_detail');
			$num = $res->num_rows();
			
			if($num>0) {
				$result['status'] = 'exist';
			} else {
				$this->db->where('id', $id);
				$res = $this->db->update('master_item_detail', $data);
				
				if($res) {
					$result['status'] = 'success';
				} else {
					$result['status'] = 'failed';
				}
			}
			echo json_encode($result);
		}
	}
	
	public function update() {
		
	}
	
	public function delete($id) {
		$this->db->where('id', $id);
        $result = $this->db->delete('master_item_detail');
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
	} 
	
	/**
	 * Additional method
	 */
	 
	function select_atm() {
		$search = $this->input->post('search');
		// if($search!="") {
		$search = "%".strtolower($search)."%";
		// }
		$query = "SELECT * FROM master_atm WHERE id NOT IN (SELECT id_atm FROM master_item_detail) AND (idatm LIKE '$search' OR cabang LIKE '$search' OR lokasi LIKE '$search')";
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				$list[$key]['id'] = $row->id;
				$list[$key]['text'] = $row->idatm.' - '.$row->lokasi; 
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
            0=>'id',
            1=>'id_detail',
            2=>'list'
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
		
		$this->db->where('id_detail',$id);
		$this->db->limit($length,$start);
        $employees = $this->db->get("master_item_detail");
        $data = array();
		
		$no = $start;
		foreach($employees->result() as $rows) {
			$no++;
			$url = base_url().'master_item_detail';
			$url2 = base_url().'master_item_detail';
            $data[]= array(
                $no,
                $rows->list,
                // $rows->username,
                // str_repeat("*", strlen($rows->password)),
                '<center>
					<a href="#" onclick="updateModal(
						\''.$rows->id.'\',
						\''.$rows->list.'\'
					)" class="btn btn-warning mr-1"><img style="float: left; margin: 3px 5px 0px 0px; height:15px; width:15px; " src="'.base_url().'seipkon/assets/img/edit.png"/>Edit</a>
					<a href="#" onclick="deleteAction2(\''.$url.'/delete/'.$rows->id.'\')" class="btn btn-danger mr-1"><img style="float: left; margin: 3px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'seipkon/assets/img/delete.png"/>Delete</a>
				 </center>'
            );     
        }
		
        $total_employees = $this->totalDatas($id);
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_employees,
            "recordsFiltered" => $total_employees,
            "data" => $data
        );
        echo json_encode($output);
        exit();
	}
	
	public function totalDatas($id) {
		$this->db->where('id_detail',$id);
		$query = $this->db->select("COUNT(*) as num")->get("master_item_detail");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
	}
}
