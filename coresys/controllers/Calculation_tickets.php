<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calculation_tickets extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}
	
	/**
	 * View method
	 */
	public function index() {	
		return view('pages/calculation_tickets/index', $this->data);
	}
	
	public function add() {
		
		$this->data['id'] = '';
		$this->data['username'] = '';
		$this->data['password'] = '';
		$this->data['level'] = '';
		
		return view('pages/calculation_tickets/form', $this->data);
	}
	
	public function edit($id) {
		$this->db->where("id", $id);
		$row = $this->db->get("calculation_tickets")->row();
		
		// echo "<pre>";
		// print_r($row);
		
		$this->data['id'] = $row->id;
		$this->data['username'] = $row->username;
		$this->data['password'] = $row->password;
		$this->data['level'] = $row->level;
		
		return view('pages/calculation_tickets/form', $this->data);
	}
	
	/**
	 * Process method
	 */
	public function insert() {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$id = trim($this->input->post("id"));
		$username = trim($this->input->post("username"));
		$password = trim($this->input->post("password"));
		$level = trim($this->input->post("level"));
		
		$data = array();
		$data['username'] = $username;
		$data['password'] = $password;
		$data['level'] = $level;
		$result = $this->db->insert('calculation_tickets', $data);
		
		if($result) {
			echo "<script>alert('SUCCESS');</script>";
		} else {
			echo "<script>alert('FAILED');</script>";
		}
		
		redirect('calculation_tickets');
	}
	
	public function update() {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$id = trim($this->input->post("id"));
		$username = trim($this->input->post("username"));
		$password = trim($this->input->post("password"));
		$level = trim($this->input->post("level"));
		
		$data = array();
		$data['username'] = $username;
		$data['password'] = $password;
		$data['level'] = $level;
		$this->db->where("id", $id);
		$result = $this->db->update('master_user', $data);
		
		if($result) {
			echo "<script>alert('SUCCESS');</script>";
		} else {
			echo "<script>alert('FAILED');</script>";
		}
		
		redirect('master_user');
	}
	
	public function delete($id) {
		$this->db->where('id', $id);
        $result = $this->db->delete('calculation_tickets');
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
	} 
	
	/**
	 * Additional method
	 */
	public function get_data() {
		$valid_columns = array(
            0=>'username',
            1=>'password',
            2=>'level'
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
        $employees = $this->db->get("master_user");
        $data = array();
		
		$no = 0;
		foreach($employees->result() as $rows) {
			$no++;
			$url = base_url().'calculation_tickets';
            $data[]= array(
                $no,
                $rows->username,
                str_repeat("*", strlen($rows->password)),
                $rows->level,
                '<a href="'.$url.'/edit/'.$rows->id.'" class="btn btn-warning mr-1"><img style="float: left; margin: 3px 5px 0px 0px; height:15px; width:15px; " src="'.base_url().'seipkon/assets/img/edit.png"/>Edit
				</a>
                 <a href="#" onclick="deleteAction(\''.$url.'/delete/'.$rows->id.'\')" class="btn btn-danger mr-1"><img style="float: left; margin: 3px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'seipkon/assets/img/delete.png"/>Delete</a>'
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
		$query = $this->db->select("COUNT(*) as num")->get("master_user");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
	}
}
