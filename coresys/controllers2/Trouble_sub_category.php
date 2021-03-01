<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trouble_sub_category extends CI_Controller {
    var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
    }
    
    /**
	 * View method
	 */
    public function index() {
        return view('pages/trouble_sub_category/index', $this->data);
    }
    
    public function add() {}

    public function edit() {}

    /**
	 * Process method
	 */
    public function insert() {
        // echo "<pre>";
        // print_r($_REQUEST);
        
        $id = trim($this->input->post("id"));
		$category = trim($this->input->post("category"));
		$name = trim($this->input->post("name"));
		
		if($id==null) {
			$data['id_category'] = $category;
			$data['sub_category_name'] = $name;
			
			$this->db->where('sub_category_name', $name);
			$res = $this->db->get('trouble_sub_category');
			$num = $res->num_rows();
			
			if($num>0) {
				$result['status'] = 'exist';
			} else {
				$res = $this->db->insert('trouble_sub_category', $data);
				
				if($res) {
					$result['status'] = 'success';
				} else {
					$result['status'] = 'failed';
				}
			}
			echo json_encode($result);
		} else {
			$data['id_category'] = $category;
			$data['sub_category_name'] = $name;
			
            $this->db->where('id', $id);
            $res = $this->db->update('trouble_sub_category', $data);
            
            if($res) {
                $result['status'] = 'success';
            } else {
                $result['status'] = 'failed';
            }
			echo json_encode($result);
		}
    }
    
    public function update() {}

    public function delete($id) {
		$this->db->where('id', $id);
        $result = $this->db->delete('trouble_sub_category');
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
	} 

    /**
	 * Additional method
	 */
    function select_category() {
        $search = $this->input->post('search');
		// if($search!="") {
		$search = "%".strtolower($search)."%";
		// }
		$query = "SELECT * FROM trouble_category WHERE (category_name LIKE '$search')";
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				$list[$key]['id'] = $row->id;
				$list[$key]['text'] = $row->category_name; 
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
            0=>'id'
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
        $this->db->select('*, trouble_sub_category.id as ids');
        $this->db->from('trouble_sub_category');
        $this->db->join('trouble_category', 'trouble_category.id = trouble_sub_category.id_category');
        $employees = $this->db->get();
        $data = array();
		
		$no = $start;
		foreach($employees->result() as $rows) {
			$no++;
			$url = base_url().'trouble_sub_category';
            $data[]= array(
                $no,
                $rows->category_name,
                $rows->sub_category_name,
                '<center>
                    <a onclick="updateModal(
                                            \''.$rows->ids.'\',
                                            \''.$rows->id_category.'\',
                                            \''.$rows->category_name.'\',
                                            \''.$rows->sub_category_name.'\'
                                        )" class="btn btn-warning mr-1">
                        <img style="float: left; margin: 3px 5px 0px 0px; height:15px; width:15px; " src="'.base_url().'seipkon/assets/img/edit.png"/>
                        Edit
                    </a>
                    <a onclick="deleteAction(\''.$url.'/delete/'.$rows->ids.'\')" class="btn btn-danger mr-1">
                        <img style="float: left; margin: 3px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'seipkon/assets/img/delete.png"/>
                        Delete
                    </a>
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
        $query = $this->db->select("COUNT(*) as num")->get("trouble_sub_category");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
    }
}