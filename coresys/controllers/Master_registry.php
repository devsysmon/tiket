<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_registry extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}
	
	/**
	 * View method
	 */
	public function index() {	
		return view('pages/master_registry/index', $this->data);
	}
	
	public function add() {
		
		$this->data['id'] = '';
		$this->data['nik'] = '';
		$this->data['nama'] = '';
		$this->data['alamat'] = '';
		$this->data['jk'] = '';
		$this->data['hp'] = '';
		$this->data['username'] = '';
		$this->data['password'] = '';
		
		return view('pages/master_registry/form', $this->data);
	}
	
	public function edit($id) {
		$this->db->where("id", $id);
		$row = $this->db->get("master_registry")->row();
		
		// echo "<pre>";
		// print_r($row);
		
		$this->data['id'] = $row->id;
		$this->data['nik'] = $row->nik;
		$this->data['nama'] = $row->nama;
		$this->data['alamat'] = $row->alamat;
		$this->data['jk'] = $row->jk;
		$this->data['hp'] = $row->hp;
		$this->data['username'] = $row->username;
		$this->data['password'] = $row->password;
		
		return view('pages/master_registry/form', $this->data);
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
		$result = $this->db->insert('master_registry', $data);
		
		if($result) {
			echo "<script>alert('SUCCESS');</script>";
		} else {
			echo "<script>alert('FAILED');</script>";
		}
		
		redirect('master_registry');
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
		$result = $this->db->update('master_registry', $data);
		
		if($result) {
			echo "<script>alert('SUCCESS');</script>";
		} else {
			echo "<script>alert('FAILED');</script>";
		}
		
		redirect('master_registry');
	}
	
	public function delete($id) {
		$this->db->where('id', $id);
        $result = $this->db->delete('master_registry');
		
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
            0=>'nik',
            1=>'nama',
            2=>'alamat',
            //4=>'jk',
            5=>'hp',
            6=>'username',
            7=>'password'
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
        $employees = $this->db->get("master_registry");
        $data = array();
		
		$no = 0;
		foreach($employees->result() as $rows) {
			$no++;
			$url = base_url().'master_registry';
            $data[]= array(
                $no,
                $rows->nik,
                $rows->nama,
                $rows->alamat,
                //$rows->jk,
                $rows->hp,
                // $rows->username,
                // str_repeat("*", strlen($rows->password)),
                '<a href="'.$url.'/edit/'.$rows->id.'" class="btn btn-warning mr-1"><img style="float: left; margin: 3px 5px 0px 0px; height:15px; width:15px; " src="'.base_url().'seipkon/assets/img/edit.png"/>Edit</a>
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
		$query = $this->db->select("COUNT(*) as num")->get("master_registry");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
	}
}
