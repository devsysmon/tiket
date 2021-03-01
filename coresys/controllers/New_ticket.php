<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class New_ticket extends MY_Controller {
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
	
	public function input_by_txt() {
		$ticket = file(base_url()."assets/ticket_sulteng_februari.txt");
		echo "<pre>";
		// print_r($ticket);
		
		// $data = array();
		$code = 0;
		$prev = "";
		foreach($ticket as $key => $line) {
			if($key==0) {
				$param = explode(PHP_EOL, $line);
				$param = explode("	", $param[0]);
			} else { 
				$param2 = explode(PHP_EOL, $line);
				$param2 = explode("	", $param2[0]);
				
				// print_r(date("Y-m-d", strtotime($param2[6])));
				// print_r($param2);
				
				// $leading = $kode->kode_ticket.date('ymd');
				$bank = $param2[22];
				$kode = $this->db->query("SELECT * FROM master_client WHERE nama='".$bank."'")->row();
				$date = date("ymd", strtotime($param2[6]));
				$date1 = date("ym", strtotime($param2[6]));
				$date2 = date("Y-m-d", strtotime($param2[6]));
				$leading = $kode->kode_ticket.$date;
				$check = $date1;
				$res = $this->db->query("SELECT ticket_id FROM master_ticket WHERE ticket_id LIKE '%$check%' ORDER BY SUBSTRING(ticket_id, 10) DESC");
				if($res->num_rows()==0) {
					if($code==0) {
						$code = 1;
					} else {
						$code = $code + 1;
					}
				} else {
					if($code==0) {
						$kode = $res->row()->ticket_id;
						echo "KODE : ".$kode;
						echo "<br>QUERY : "."SELECT ticket_id FROM master_ticket WHERE ticket_id LIKE '%$check%' ORDER BY ticket_id DESC<br>";
						$kode = intval(substr($kode, strlen($leading))) + 1;
						$code = $kode;
					} else {
						$code = $code + 1;
					}
				}
				$ticket = str_pad($code, 4, '0', STR_PAD_LEFT);
				$ticket = $leading.$ticket;
				$data = array(
					"ticket_id" => $ticket,
					"atm_id" => $param2[1],
					"service_type" => $param2[2]." - ATM",
					"problem_type" => $param2[3],
					"reported_problem" => $param2[4],
					"reported_by" => $param2[5],
					"entry_date" => date("Y-m-d H:i:s", strtotime($param2[6])),
					"email_date" => date("Y-m-d H:i:s", strtotime($param2[7])),
					"accept_time" => $param2[8],
					"arrival_time" => $date2." ".$param2[9],
					"start_job" => $date2." ".$param2[10],
					"end_job" => $date2." ".$param2[11],
					"leave_time" => $param2[12],
					"pic" => $param2[13],
					"status" => $param2[14],
					"action_taken" => $param2[15],
					"remark" => $param2[16],
					"replacement_part" => $param2[17],
					"replacement_consume" => $param2[18]
				);
				$data2[] = array(
					"ticket_id" => $ticket,
					"atm_id" => $param2[1],
					"service_type" => $param2[2]." - ATM",
					"problem_type" => $param2[3],
					"reported_problem" => $param2[4],
					"reported_by" => $param2[5],
					"entry_date" => date("Y-m-d H:i:s", strtotime($param2[6])),
					"email_date" => date("Y-m-d H:i:s", strtotime($param2[7])),
					"accept_time" => $param2[8],
					"arrival_time" => $date2." ".$param2[9],
					"start_job" => $date2." ".$param2[10],
					"end_job" => $date2." ".$param2[11],
					"leave_time" => $param2[12],
					"pic" => $param2[13],
					"status" => $param2[14],
					"action_taken" => $param2[15],
					"remark" => $param2[16],
					"replacement_part" => $param2[17],
					"replacement_consume" => $param2[18]
				);
				$prev = $date;
				
				
				$this->db->where('ticket_id', $ticket);
				$q = $this->db->get('master_ticket');
				if ( $q->num_rows() > 0 ) {
					$this->db->where('ticket_id', $ticket);
					$this->db->update('master_ticket', $data);
				} else {
					$this->db->set('ticket_id', $ticket);
					$this->db->insert('master_ticket', $data);
				}
			}
		}
		
		
		print_r($data2);
		// // $param = array();
		// foreach($atm as $key => $line) {
			
			// if($key==0) {
				// $param = explode(PHP_EOL, $line);
				// $param = explode("	", $param[0]);
			// } else {
				// $param2 = explode(PHP_EOL, $line);
				// $param2 = explode("	", $param2[0]);
				// $idatm = $this->db->query("SELECT * FROM master_atm WHERE idatm='".$param2[1]."'");
				
				// if($idatm->num_rows()==0) {
					// $query = array();
					// foreach($param as $k => $field) {
						// $query[$field] = $param2[$k];
					// }
					// $query['id_serial'] = $this->db->query('SELECT id FROM master_serial WHERE id NOT IN (SELECT id_serial FROM master_atm) ORDER BY id ASC LIMIT 0,1')->row()->id;
					// $this->db->insert('master_atm', $query);
					// $insert_id = $this->db->insert_id();
					// if($insert_id!="") {
						// $real_reqion = $this->db->query("SELECT id FROM master_location WHERE name='".$region."'")->row()->id;
						// $data['id_lokasi'] = $real_reqion;
						// $data['id_atm'] = $insert_id;
						// $this->db->insert('master_location_detail', $data);				
					// }
				// } else {
					// echo "IDATM INI SUDAH TERSIMPAN";
				// }
			// }
		// }
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
		$bank_id = $this->db->query("SELECT id_bank FROM master_atm WHERE idatm='$idatm'")->row()->id_bank;
        $email_date = trim($this->input->post("email_date"));
        $ticket_id = trim($this->input->post("ticket_id"));
        $service_type = explode(" - ", explode(" / ", $this->input->post("service_type"))[0])[0];
		$problem_type = explode(" / ", $this->input->post("service_type"))[1];
        $reported_problem = trim($this->input->post("reported_problem"));
        $reported_by = trim($this->input->post("reported_by"));
        $pic = trim($this->input->post("pic"));

        $data['id'] = $id;
        $data['ticket_id'] = $ticket_id;
        $data['bank_id'] = $bank_id;
        $data['atm_id'] = $idatm;
        $data['service_type'] = $service_type;
        $data['problem_type'] = $problem_type;
        $data['reported_problem'] = $reported_problem;
        $data['reported_by'] = $reported_by;
        $data['entry_date'] = date("Y-m-d H:i:s");
        $data['email_date'] = $email_date;
        $data['pic'] = $pic;
		
		// print_r($data);

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
        $id = trim($this->input->post("id"));
		// $id = '478';
		// $id = '247';
		$kode = $this->db->query("SELECT * FROM master_atm LEFT JOIN master_client ON(master_atm.id_bank=master_client.id) WHERE master_atm.idatm='".$id."'")->row();
		
        $leading = $kode->kode_ticket.date('ymd');
        $check = date('ym');
        $res = $this->db->query("SELECT ticket_id FROM master_ticket WHERE ticket_id LIKE '%$check%' ORDER BY SUBSTRING(ticket_id, 10) DESC");
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
		$query = "SELECT *, master_atm.id as id FROM master_atm LEFT JOIN master_client ON (master_atm.id_bank=master_client.id) 
		WHERE (master_atm.idatm LIKE '$search' OR master_client.nama LIKE '$search' OR master_client.nama_lengkap LIKE '$search')";
		$result = $this->db->query($query)->result();
		
		
		$bank = function($id) {
			$nama = $this->db->query("SELECT nama FROM master_client WHERE id='$id'")->row()->nama;
			return $nama;
		};
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				$list[$key]['id'] = $row->idatm;
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
		
		$query = "SELECT *, trouble_sub_category.id as id FROM trouble_category 
					LEFT JOIN trouble_sub_category ON (trouble_sub_category.id_category=trouble_category.id)
		WHERE sub_category_name LIKE '$search'";	
		
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				$list[$key]['id'] = $row->category_name." / ".$row->sub_category_name;
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
        $atm_id = $this->input->post('atm_id');
		
		$id_bank = $this->db->query("SELECT id_bank FROM master_atm WHERE idatm='$atm_id'")->row()->id_bank;
		// if($search!="") {
		$search = "%".strtolower($search)."%";
		// }
		$query = "SELECT * FROM master_staff 
					LEFT JOIN master_user ON (master_staff.nik=master_user.username) 
					LEFT JOIN trans_schedule ON (trans_schedule.id_petugas=master_user.id)
					LEFT JOIN master_atm ON (master_atm.id_lokasi=trans_schedule.id_lokasi)
					WHERE master_user.level='cse' AND (master_staff.nama LIKE '$search')";
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				$list[$key]['id'] = $row->id;
				$list[$key]['text'] = $row->nik." - ".$row->nama." - ".$id_bank; 
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
            1=>'id'
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
			$atm = $this->db->query("SELECT $field FROM master_atm WHERE (id='$id' OR idatm='$id')")->row();
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