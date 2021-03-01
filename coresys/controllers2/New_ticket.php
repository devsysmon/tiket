<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class New_ticket extends CI_Controller {
    var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
    }
    
    /**
	 * View method
	 */
    public function index() {
        return view('pages/new_ticket/index', $this->data);
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
        $idatm = trim($this->input->post("idatm"));
        $email_date = trim($this->input->post("email_date"));
        if(!empty($this->input->post("problem_type"))) {
            $problem_type = implode(", ", $this->input->post("problem_type"));
        } else {
            $problem_type = "";
        }
        $pic = trim($this->input->post("pic"));

        $data['id'] = $id;
        $data['ticket_id'] = $this->get_ticket2();
        $data['atm_id'] = $idatm;
        $data['problem_type'] = $problem_type;
        $data['entry_date'] = date("Y-m-d H:i:s");
        $data['email_date'] = $email_date;
        $data['pic'] = $pic;

        $res = $this->db->insert('master_ticket', $data);
        
        if($res) {
            $result['status'] = 'success';
        } else {
            $result['status'] = 'failed';
        }

        echo json_encode($result);
    }
    
    public function update() {}

    public function delete($id) {
		$this->db->where('id', $id);
        $result = $this->db->delete('master_ticket');
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
	} 

    /**
	 * Additional method
	 */

    function get_ticket() {
        $leading = "T".date('Ym');
        $check = date('Ym');
        $res = $this->db->query("SELECT ticket_id FROM master_ticket WHERE ticket_id LIKE '%$check%' ORDER BY ticket_id DESC");
        if($res->num_rows()==0) {
            $kode = 1;
        } else {
            $kode = $res->row()->ticket_id;
            $kode = intval(substr($kode, strlen($leading))) + 1;
        }
        $ticket = str_pad($kode, 4, '0', STR_PAD_LEFT);
        $ticket = $leading.$ticket;

        echo $ticket;
    }

    function get_ticket2() {
        $leading = "T".date('Ym');
        $check = date('Ym');
        $res = $this->db->query("SELECT ticket_id FROM master_ticket WHERE ticket_id LIKE '%$check%' ORDER BY ticket_id DESC");
        if($res->num_rows()==0) {
            $kode = 1;
        } else {
            $kode = $res->row()->ticket_id;
            $kode = intval(substr($kode, strlen($leading))) + 1;
        }
        $ticket = str_pad($kode, 4, '0', STR_PAD_LEFT);
        $ticket = $leading.$ticket;

        return $ticket;
    }

    function select_atm() {
        $search = $this->input->post('search');
		// if($search!="") {
		$search = "%".strtolower($search)."%";
		// }
		$query = "SELECT * FROM master_atm WHERE (idatm LIKE '$search')";
		$result = $this->db->query($query)->result();
		
		
		$bank = function($id) {
			$nama = $this->db->query("SELECT nama FROM master_client WHERE id='$id'")->row()->nama;
			return $nama;
		};
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				$list[$key]['id'] = $row->id;
				$list[$key]['text'] = $row->idatm." / ".$bank($row->id_bank)." / ".$row->lokasi; 
				$key++;
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
    }

    function select_problem() {
		$search = $this->input->post('search');
		$search = "%".strtolower($search)."%";
		
		$query = "SELECT * FROM trouble_category 
					LEFT JOIN trouble_sub_category ON (trouble_sub_category.id_category=trouble_category.id)
		WHERE sub_category_name LIKE '$search'";	
		
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				$list[$key]['id'] = $row->sub_category_name;
				$list[$key]['text'] = $row->category_name." / ".$row->sub_category_name; 
				$key++;
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
	}

    function select_pic() {
        $search = $this->input->post('search');
		// if($search!="") {
		$search = "%".strtolower($search)."%";
		// }
		$query = "SELECT * FROM master_petugas WHERE (nama LIKE '$search')";
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				$list[$key]['id'] = $row->id;
				$list[$key]['text'] = $row->nik." - ".$row->nama; 
				$key++;
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
    }

    function select_part() {
        $search = $this->input->post('search');
		// if($search!="") {
		$search = "%".strtolower($search)."%";
		// }
		$query = "SELECT * FROM master_inventory WHERE (kode_part LIKE '$search' OR nama_part LIKE '$search')";
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				$list[$key]['id'] = $row->id;
				$list[$key]['text'] = $row->kode_part." - ".$row->nama_part; 
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
        $this->db->select('*');
        $this->db->from('master_ticket');
        // $this->db->join('trouble_category', 'trouble_category.id = trouble_sub_category.id_category');
        $employees = $this->db->get();
        $data = array();
		
		$atm = function($id, $field) {
			error_reporting(0);
			$atm = $this->db->query("SELECT $field FROM master_atm WHERE id='$id'")->row();
			$atm = (array) $atm;
			return $atm[$field];
		};
		
		$bank = function($id) {
			$nama = $this->db->query("SELECT nama FROM master_client WHERE id='$id'")->row()->nama;
			
			return $nama;
		};
		
		$no = $start;
		foreach($employees->result() as $rows) {
			$no++;
			$url = base_url().'new_ticket';
            $data[]= array(
                $no,
                $atm($rows->atm_id, 'idatm'),
                $bank($atm($rows->atm_id, 'id_bank')),
                $atm($rows->atm_id, 'cabang'),
                $atm($rows->atm_id, 'lokasi'),
                $rows->ticket_id,
                $rows->problem_type,
                $rows->entry_date,
                '<center>
                    <a onclick="deleteAction(\''.$url.'/delete/'.$rows->id.'\')" class="btn btn-danger mr-1">
                        <img style="float: left; margin: 3px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'seipkon/assets/img/delete.png"/>
                        Delete
                    </a>
				 </center>'
				 
				 
                    // <a onclick="updateModal(
                                            // \''.$rows->id.'\'
                                        // )" class="btn btn-warning mr-1">
                        // <img style="float: left; margin: 3px 5px 0px 0px; height:15px; width:15px; " src="'.base_url().'seipkon/assets/img/edit.png"/>
                        // Edit
                    // </a>
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
        $query = $this->db->select("COUNT(*) as num")->get("master_ticket");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
    }
}