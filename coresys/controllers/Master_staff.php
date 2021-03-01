<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_staff extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}
	
	/**
	 * View method
	 */
	public function index() {	
		return view('pages/master_staff/index', $this->data);
	}
	
	public function add() {
		
		$this->data['id'] = '';
		$this->data['nik'] = '';
		$this->data['nama'] = '';
		$this->data['alamat'] = '';
		$this->data['jk'] = '';
		$this->data['hp'] = '';
		$this->data['email'] = '';
		$this->data['email2'] = '';
		
		return view('pages/master_staff/form', $this->data);
	}
	
	public function edit($id) {
		$this->db->where("id", $id);
		$row = $this->db->get("master_staff")->row();
		
		// echo "<pre>";
		// print_r($row);
		
		$this->data['id'] = $row->id;
		$this->data['nik'] = $row->nik;
		$this->data['nama'] = $row->nama;
		$this->data['alamat'] = $row->alamat;
		$this->data['jk'] = $row->jk;
		$this->data['hp'] = $row->hp;
		$this->data['email'] = $row->email;
		$this->data['email2'] = $row->email2;
		
		return view('pages/master_staff/form', $this->data);
	}
	
	/**
	 * Process method
	 */
	public function insert() {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$id = trim($this->input->post("id"));
		$nik = trim($this->input->post("nik"));
		$nama = trim($this->input->post("nama"));
		$alamat = trim($this->input->post("alamat"));
		$jk = trim($this->input->post("jk"));
		$hp = trim($this->input->post("hp"));
		$email = trim($this->input->post("email"));
		$email2 = trim($this->input->post("email2"));
		
		$data = array();
		$data['nik'] = $nik;
		$data['nama'] = $nama;
		$data['alamat'] = $alamat;
		$data['jk'] = $jk;
		$data['hp'] = $hp;
		$data['email'] = $email;
		$data['email2'] = $email2;
		$result = $this->db->insert('master_staff', $data);
		
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
		$nik = trim($this->input->post("nik"));
		$nama = trim($this->input->post("nama"));
		$alamat = trim($this->input->post("alamat"));
		$jk = trim($this->input->post("jk"));
		$hp = trim($this->input->post("hp"));
		$username = trim($this->input->post("username"));
		$password = trim($this->input->post("password"));
		
		$data = array();
		$data['nik'] = $nik;
		$data['nama'] = $nama;
		$data['alamat'] = $alamat;
		$data['jk'] = $jk;
		$data['hp'] = $hp;
		$data['username'] = $username;
		$data['password'] = $password;
		$this->db->where("id", $id);
		$result = $this->db->update('master_staff', $data);
		
		if($result) {
			echo "success";
		} else {
			echo "failed";
		}
	}
	
	public function delete($id) {
		$this->db->where('id', $id);
        $result = $this->db->delete('master_staff');
		
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
            1=>'nik'
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
        $employees = $this->db->get("master_staff");
        $data = array();
		
		$no = 0;
		foreach($employees->result() as $rows) {
			$no++;
			$url = base_url().'master_staff';
            $data[]= array(
                $no,
                $rows->nik,
                $rows->nama,
                $rows->alamat,
                $rows->hp,
                '<a onclick="createModalEdit(
					\''.$rows->id.'\',
					\''.$rows->nik.'\',
					\''.$rows->nama.'\',
					\''.$rows->alamat.'\',
					\''.$rows->jk.'\',
					\''.$rows->hp.'\',
					\''.$rows->email.'\',
					\''.$rows->email2.'\',
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
		$query = $this->db->select("COUNT(*) as num")->get("master_staff");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
	}
}
