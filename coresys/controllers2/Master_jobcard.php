<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class Master_jobcard extends CI_Controller {
	var $terpakai, $sisa, $kebutuhan, $kekurangan, $status;
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}

	public function index() {
		return view('pages/master_jobcard/index', $this->data);
	}
	
	/**
	 * Process method
	 */
	public function insert() {
		// echo "<pre>";
		// print_r($_REQUEST);
		// print_r($_FILES);
		
		
			$id = trim($this->input->post("id"));
		
		$ticket = function($id, $field) {
			// error_reporting(0);
			$atm = $this->db->query("SELECT $field FROM master_ticket WHERE ticket_id='$id' ORDER BY id DESC")->row();
			$atm = (array) $atm;
			return $atm[$field];
		};
		
		$atm = function($id, $field) {
			// error_reporting(0);
			$atm = $this->db->query("SELECT $field FROM master_atm WHERE id='$id' ORDER BY id DESC")->row();
			$atm = (array) $atm;
			return $atm[$field];
		};
		
		if($id==null) {
			$id = trim($this->input->post("id"));
			$ticket_id = trim($this->input->post("ticket_id"));
			$foto_jobcard = $this->_uploadImage($ticket_id);
			$remark = trim($this->input->post("remark"));
			
			$data['ticket_id'] = $ticket_id;
			$data['atm_id'] = $ticket($ticket_id, 'atm_id');
			$data['client_id'] = $atm($ticket($ticket_id, 'atm_id'), 'id_bank');
			$data['foto_jobcard'] = $foto_jobcard;
			$data['remark'] = $remark;
			
			$res = $this->db->insert('trans_jobcard', $data);
			
			if($res) {
				$result['status'] = 'success';
			} else {
				$result['status'] = 'failed';
			}
			echo json_encode($result);
		} else {
			$id = trim($this->input->post("id"));
			$ticket_id = trim($this->input->post("ticket_id"));
			$remark = trim($this->input->post("remark"));
			$old_image = trim($this->input->post("old_image"));
			
			$data['ticket_id'] = $ticket_id;
			$data['atm_id'] = $ticket($ticket_id, 'atm_id');
			$data['client_id'] = $atm($ticket($ticket_id, 'atm_id'), 'id_bank');
			if (!empty($_FILES["image"]["name"])) {
				$data['foto_jobcard'] = $this->_uploadImage($ticket_id);
			} else {
				$data['foto_jobcard'] = $old_image;
			}
			$data['remark'] = $remark;
			
			$this->db->where('ticket_id', $ticket_id);
			$res = $this->db->update('trans_jobcard', $data);
			
			if($res) {
				$result['status'] = 'success';
			} else {
				$result['status'] = 'failed';
			}
			echo json_encode($result);
		}
	}
	
	public function delete($id) {
		$this->db->where('id', $id);
        $result = $this->db->delete('trans_jobcard');
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
	} 
	
	/**
	 * Additional method
	 */
	
	private function _uploadImage($name) {
		$config['upload_path']          = './upload/jobcard/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = $name;
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			return 'upload/jobcard/'.$this->upload->data("file_name");
		}
		
		return "default.jpg";
	}
	
	function select_ticket() {
		$search = $this->input->post('search');
		// if($search!="") {
		$search = "%".strtolower($search)."%";
		// }
		$query = "SELECT * FROM master_ticket WHERE (ticket_id LIKE '$search') AND ticket_id NOT IN (SELECT ticket_id FROM trans_jobcard) AND status='CLOSED'";
		$result = $this->db->query($query)->result();
		
		$atm = function($id, $field) {
			error_reporting(0);
			$atm = $this->db->query("SELECT $field FROM master_atm WHERE id='$id' ORDER BY id DESC")->row();
			$atm = (array) $atm;
			return $atm[$field];
		};
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				$list[$key]['id'] = $row->ticket_id;
				$list[$key]['text'] = $row->ticket_id.' - '.$atm($row->atm_id, 'lokasi'); 
				$key++;
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
	}
	 
	public function get_data() {
		$valid_columns = array(
            0=>'id',
            1=>'ticket_id'
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
        $result = $this->db->get("trans_jobcard");
        $data = array();
		
		$ticket = function($id, $field) {
			// error_reporting(0);
			$atm = $this->db->query("SELECT $field FROM master_ticket WHERE ticket_id='$id' ORDER BY id DESC")->row();
			$atm = (array) $atm;
			return $atm[$field];
		};
		
		$atm = function($id, $field) {
			// error_reporting(0);
			$atm = $this->db->query("SELECT $field FROM master_atm WHERE id='$id' ORDER BY id DESC")->row();
			$atm = (array) $atm;
			return $atm[$field];
		};
		
		$client = function($id, $field) {
			// error_reporting(0);
			$atm = $this->db->query("SELECT $field FROM master_client WHERE id='$id' ORDER BY id DESC")->row();
			$atm = (array) $atm;
			return $atm[$field];
		};
		
		$no = $start;
		foreach($result->result() as $rows) {
			$no++;
			$url = base_url().'master_jobcard';
            $data[]= array(
                $no,
                $rows->ticket_id,
                $client($atm($ticket($rows->ticket_id, 'atm_id'), 'id_bank'), 'nama'),
                $atm($ticket($rows->ticket_id, 'atm_id'), 'lokasi'),
                '<a onclick="openPicture(\''.$rows->ticket_id.'\', \''.base_url().$rows->foto_jobcard.'\')"><img src="'.base_url().$rows->foto_jobcard.'?'.microtime().'" width="50"></a>',
                $rows->remark,
                // $rows->username,
                // str_repeat("*", strlen($rows->password)),
                '<center>
				<a onclick="updateModal(
					\''.$rows->id.'\',
					\''.$rows->ticket_id.'\',
					\''.$rows->ticket_id.' - '.$atm($rows->atm_id, 'lokasi').'\',
					\''.$rows->foto_jobcard.'\',
					\''.$rows->remark.'\',
				)" class="btn btn-warning mr-1"><img style="float: left; margin: 3px 5px 0px 0px; height:15px; width:15px; " src="'.base_url().'seipkon/assets/img/edit.png"/>Edit</a>
                <a onclick="deleteAction2(\''.$url.'/delete/'.$rows->id.'\')" class="btn btn-danger mr-1"><img style="float: left; margin: 3px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'seipkon/assets/img/delete.png"/>Delete</a></center>'
            );     
        }
		
        $total_data = $this->totalDatas();
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_data,
            "recordsFiltered" => $total_data,
            "data" => $data
        );
        echo json_encode($output);
        exit();
	}
	
	public function totalDatas() {
		$query = $this->db->select("COUNT(*) as num")->get("master_location");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
	}
}