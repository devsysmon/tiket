<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_news extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}
	
	/**
	 * View method
	 */
	public function index() {	
		return view('pages/master_news/index', $this->data);
	}
	
	/**
	 * Process method
	 */
	public function insert() {
		$id = trim($this->input->post("id"));
		$title = trim($this->input->post("title"));
		$information = trim($this->input->post("information"));
		
		$data = array();
		if($id==null){
			$data['title'] = $title;
			$data['information'] = $information;
			$result = $this->db->insert('master_news', $data);
		} else {
			$data['title'] = $title;
			$data['information'] = $information;
			$this->db->where('id', $id);
			$result = $this->db->update('master_news', $data);
		}
		
		if($result) {
			echo "success";
		} else {
			echo "failed";
		}
	}
	
	public function insertX() {
		// echo "<pre>";
		// print_r($_REQUEST);
		// print_r($_FILES);
		$errors= array();
		if(isset($_FILES['file'])) {
			if($_FILES['file']['name']!=="") {
				$file_name 	= $_FILES['file']['name'];
				$file_size 	= $_FILES['file']['size'];
				$file_tmp 	= $_FILES['file']['tmp_name'];
				$file_type	= $_FILES['file']['type'];
				$file	= explode('.', strtolower($file_name));
				$file_ext	= end($file);
				
				$extensions= array("jpeg","jpg","png","doc","docx","xls","xlsx");
				
				if(in_array($file_ext,$extensions)=== false){
					$errors[]="extension not allowed.<br>";
				}
				
				if(empty($errors)==true){
					$file_name = "upload/news/".reset($file).".".$file_ext;
					// $url_file = base_url().$file_name;
					$url_file = array(
						"file_name"	=> reset($file).".".$file_ext,
						"full_name" => $file_name,
						"full_link" => base_url().$file_name
					);
					move_uploaded_file($file_tmp, $file_name);
					
					// echo $url_file;
				} else {
					echo $errors[0];
				}
			}
		}
		
		$result = false;
		if(empty($errors)==true){
			$id = trim($this->input->post("id"));
			$title = trim($this->input->post("title"));
			$information = trim($this->input->post("information"));
			
			$data = array();
			if($id==null){
				$data['title'] = $title;
				$data['information'] = $information;
				if($_FILES['file']['name']!=="") {
					$data['document'] = json_encode($url_file);
				}
				$result = $this->db->insert('master_news', $data);
			} else {
				$data['title'] = $title;
				$data['information'] = $information;
				if($_FILES['file']['name']!=="") {
					$data['document'] = json_encode($url_file);
				}
				$this->db->where('id', $id);
				$result = $this->db->update('master_news', $data);
			}
		}
		
		if($result) {
			echo "success";
		} else {
			echo "failed";
		}
	}
	
	public function delete($id) {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$this->db->where('id', $id);
		$row = $this->db->get('master_news')->row();
		
		if($row->document!=="") {
			// echo $row->document."<br>";
			if(file_exists($row->document)) {
				unlink($row->document);
			} else {
				// echo "BBB";
			}
			// unlink($row->document);
		}
		$this->db->where('id', $id);
        $result = $this->db->delete('master_news');
		
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
            0=>'id',
            1=>'title',
            2=>'information',
            3=>'document',
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
        $employees = $this->db->get("master_news");
        $data = array();
		error_reporting(0);
		$no = 0;
		foreach($employees->result() as $rows) {
			$no++;
			$url = base_url().'master_news';
            $data[]= array(
                $no,
                $rows->title,
                $rows->information,
                "<a href='".json_decode($rows->document, true)['full_link']."' target='_blank'>".json_decode($rows->document, true)['file_name']."</a>",
                '<a onclick="updateModal(
					\''.$rows->id.'\',
					\''.$rows->title.'\',
					\''.$rows->information.'\'
				)" class="btn btn-warning mr-1"><img style="float: left; margin: 3px 5px 0px 0px; height:15px; width:15px; " src="'.base_url().'seipkon/assets/img/edit.png"/>Edit</a>
                 <a onclick="deleteAction2(\''.$url.'/delete/'.$rows->id.'\')" class="btn btn-danger mr-1"><img style="float: left; margin: 3px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'seipkon/assets/img/delete.png"/>Delete</a>'
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
		$query = $this->db->select("COUNT(*) as num")->get("master_atm");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
	}
}