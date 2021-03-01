<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trans_schedule extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}

	/**
	 * View method
	 */
	public function index()
	{	
		return view('pages/trans_schedule/index', $this->data);
	}
	
	public function add() {
		return view('pages/trans_schedule/add');
	}
	
	public function edit() {
		return view('pages/trans_schedule/edit');
	}
	
	public function detail_petugas($id, $field) {
		$this->db->where('id', $id);
		$res = $this->db->get('master_staff')->row();
		
		return $res->$field;
	}
	
	public function detail_lokasi($id, $field) {
		$this->db->where('id', $id);
		$res = $this->db->get('master_location')->row();
		
		return $res->$field;
	}
	
	/**
	 * Process method
	 */
	public function insert() {
		$petugas = trim($this->input->post("petugas"));
		$lokasi = trim($this->input->post("lokasi"));
		
		$data['id_petugas'] = $petugas;
		$data['id_lokasi'] = $lokasi;
		
		$res = $this->db->insert('trans_schedule', $data);
			
		if($res) {
			$result['status'] = 'success';
		} else {
			$result['status'] = 'failed';
		}
		echo json_encode($result);
	}
	
	public function update() {
		
	}
	
	public function delete($id) {
		$this->db->where('id', $id);
        $result = $this->db->delete('trans_schedule');
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
	} 
	
	/**
	 * Additional method
	 */
	 
	function select_petugas() {
		$search = $this->input->post('search');
		// if($search!="") {
		$search = "%".strtolower($search)."%";
		// }
		$query = "SELECT * FROM master_staff LEFT JOIN master_user ON(master_staff.nik=master_user.username) WHERE master_user.level='CSE' AND master_staff.id NOT IN (SELECT id_petugas FROM trans_schedule) AND (master_staff.nik LIKE '$search' OR master_staff.nama LIKE '$search' OR master_user.username LIKE '$search')";
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				$list[$key]['id'] = $row->id;
				$list[$key]['text'] = $row->nik.' - '.$row->nama; 
				$key++;
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
	}
	 
	function select_lokasi() {
		$search = $this->input->post('search');
		// if($search!="") {
		$search = "%".strtolower($search)."%";
		// }
		$query = "SELECT * FROM master_location WHERE id NOT IN (SELECT id_lokasi FROM trans_schedule) AND id IN (SELECT id_lokasi FROM master_location_detail) AND (name LIKE '$search')";
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				$list[$key]['id'] = $row->id;
				$list[$key]['text'] = $row->name; 
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
            1=>'id_petugas',
            2=>'id_lokasi'
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
        $employees = $this->db->get("trans_schedule");
        $data = array();
		
		$no = $start;
		foreach($employees->result() as $rows) {
			$no++;
			$url = base_url().'trans_schedule';
			$url2 = 'master_location_detail/index';
            $data[]= array(
                $no,
                $this->detail_petugas($rows->id_petugas, 'nama'),
                $this->detail_lokasi($rows->id_lokasi, 'name'),
                // $rows->username,
                // str_repeat("*", strlen($rows->password)),
                '<a href="'.$url2.'/'.$rows->id_lokasi.'" class="btn btn-success mr-1"><img style="float: left; margin: 3px 5px 0px 0px; height:15px; width:15px; " src="'.base_url().'seipkon/assets/img/search.png"/>Detail</a> 
				<a onclick="deleteAction2(\''.$url.'/delete/'.$rows->id.'\')" class="btn btn-danger mr-1"><img style="float: left; margin: 3px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'seipkon/assets/img/delete.png"/>Delete</a>	'
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
		$query = $this->db->select("COUNT(*) as num")->get("trans_schedule");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
	}
}
