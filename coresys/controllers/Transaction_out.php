<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;

class Transaction_out extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}
	
	/**
	 * View method
	 */
	public function index() {	
		$this->data['merk'] = $this->db->query('SELECT * FROM master_merk GROUP BY merk')->result();
		$this->data['part'] = $this->db->query('SELECT * FROM master_inventory')->result();
		$this->data['get_part'] = function($merk = 0) {
			$this->db->where('merk', $merk);
			$array = $this->db->query('SELECT * FROM master_inventory')->result();

			return $array;
	   };
		
	
		return view('pages/master_transaction_out/index', $this->data);
	}

	public function get_part() {
		$array = $this->db->query('SELECT * FROM master_inventory WHERE merk="'.$_REQUEST['merk'].'"')->result();

		echo json_encode($array);
	}
	
	public function get_part2() {
		$merk = $this->input->post('merk');
		$search = $this->input->post('search');
		$search = "%".strtolower($search)."%";
		$query = "SELECT * FROM master_inventory WHERE merk='$merk' AND (kode_part LIKE '$search' OR nama_part LIKE '$search')";
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				$list[$key]['id'] = $row->id;
				$list[$key]['text'] = $row->merk." / ".$row->nama_part; 
				$key++;
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
	}
	
	public function get_area() {
		$merk = $this->input->post('merk');
		$search = $this->input->post('search');
		$search = "%".strtolower($search)."%";
		$query = "SELECT *, master_location.id as ids FROM master_location 
			LEFT JOIN trans_schedule ON (trans_schedule.id_lokasi=master_location.id)
			LEFT JOIN master_staff ON (master_staff.id=trans_schedule.id_petugas)
		WHERE (name LIKE '$search' OR name LIKE '$search')";
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				$list[$key]['id'] = $row->ids;
				if($row->nama=="") {
					$list[$key]['text'] = $row->name; 
				} else {
					$list[$key]['text'] = $row->name." (PIC : ".$row->nama.")"; 
				}
				$key++;
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
	}
	
	public function get_part_detail() {
		$merk = $this->input->post('merk');
		$part = $this->input->post('part');
		$search = $this->input->post('search');
		$search = "%".strtolower($search)."%";
		$query = "
			SELECT *, a.id as ids FROM master_inventory_part a 
			LEFT JOIN master_transaction_in b ON (a.id_detail=b.id) 
			LEFT JOIN master_inventory c ON (b.kode_part=c.id) 
			WHERE c.merk='".$merk."' AND c.id='".$part."' AND a.status='available' AND (a.sn_part LIKE '$search')
		";
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				$list[$key]['id'] = $row->ids;
				$list[$key]['text'] = $row->nama_part." / ".$row->sn_part; 
				$key++;
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
	}

	public function get_cust() {
		$array = $this->db->query('SELECT * FROM master_atm')->result();

		echo json_encode($array);
	}
	
	public function add() {
		
		$this->data['id'] = '';
		
		return view('pages/master_transaction_out/form', $this->data);
	}
	
	public function edit($id) {
		$this->db->where("id", $id);
		$row = $this->db->get("master_transaction_out")->row();
		
		// echo "<pre>";
		// print_r($row);
		
		$this->data['id'] = $row->id;
		
		
		return view('pages/master_transaction_out/form', $this->data);
	}
	
	/**
	 * Process method
	 */
	public function insert() {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$id = trim($this->input->post("id"));
		$kode_part = trim($this->input->post("kode_part"));
		$pid = trim($this->input->post("pid"));
		$tgl_keluar = trim($this->input->post("tgl_keluar"));
		$quantity = trim($this->input->post("quantity"));
		
		$data = array();
		if($id==null){
			$res = $this->db->query("SELECT * FROM master_transaction_out WHERE tgl_keluar='$tgl_keluar' AND kode_part='$kode_part'");
			// if($res->num_rows() > 0) {
				// $data['tgl_keluar'] = $res->row()->tgl_keluar;
				// $data['kode_part'] = $res->row()->kode_part;
				// $data['id_location'] = $res->row()->id_location;
				// $data['quantity'] = $res->row()->quantity + $quantity;

				// $this->db->where('id', $res->row()->id);
				// $result = $this->db->update('master_transaction_out', $data);
				// if($result) {
					// $id_detail = $this->db->insert_id();
					// $this->insert_temp($id_detail);
				// }
			// } else {
				$data['tgl_keluar'] = $tgl_keluar;
				$data['kode_part'] = $kode_part;
				$data['id_location'] = $pid;
				$data['quantity'] = $quantity;
				$result = $this->db->insert('master_transaction_out', $data);
				if($result) {
					$id_detail = $this->db->insert_id();
					$this->insert_temp($id_detail);
				}
			// }
		} else {
			$data['tgl_keluar'] = $tgl_keluar;
			$data['kode_part'] = $kode_part;
			$data['id_location'] = $pid;
			$data['quantity'] = $quantity;
			$this->db->where('id', $id);
			$result = $this->db->update('master_transaction_out', $data);
		}
		
		$this->sync_availability();
		
		if($result) {
			echo "success";
		} else {
			echo "failed";
		}
	}
	
	public function sync_availability() {
		$q = "SELECT * FROM master_inventory_part WHERE sn_part IN (SELECT sn_part FROM master_inventory_part_out) AND status='available'";
		$result = $this->db->query($q)->result();
		if(count($result)>0) {
			$data = array();
			foreach($result as $r) {
				$data['status'] = "used";
				$this->db->where('id', $r->id);
				$this->db->update('master_inventory_part', $data);
			}
		} else {
			$q = "SELECT * FROM master_inventory_part WHERE sn_part NOT IN (SELECT sn_part FROM master_inventory_part_out) AND status='used'";
			$result = $this->db->query($q)->result();
			
			$data = array();
			foreach($result as $r) {
				$data['status'] = "available";
				$this->db->where('id', $r->id);
				$this->db->update('master_inventory_part', $data);
			}
		}
		
		// echo "<pre>";
		// print_r($result);
	}
	
	public function insert_temp($id_detail) {
		if(isset($_SESSION['temp'])) {
			$data_temp = $_SESSION['temp'];
			foreach($data_temp as $k => $r) {
				$arr = array();
				foreach($r as $x => $y) {
					$arr[] = array(
						'id_detail' => $id_detail,
						'kode_part' => $y['kode_part'],
						'status_part' => $y['status_part'],
						'part_no' => $y['part_no'],
						'sn_part' => $y['sn_part'],
						'price' => $y['price']
					);
				}
				$result = $this->db->insert_batch('master_inventory_part_out', $arr);
				if($result) {
					unset($_SESSION['temp']);
				} else {
					echo "failed";
				}
			}
		}
	}
	
	public function update() {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$id = trim($this->input->post("id"));
		$idatm = trim($this->input->post("idatm"));
		$cabang = trim($this->input->post("cabang"));
		$lokasi = trim($this->input->post("lokasi"));
		$alamat = trim($this->input->post("alamat"));
		$kategori = trim($this->input->post("kategori"));
		$status = trim($this->input->post("status"));
		
		$data = array();
		$data['idatm'] = $idatm;
		$data['cabang'] = $cabang;
		$data['lokasi'] = $lokasi;
		$data['alamat'] = $alamat;
		$data['kategori'] = $kategori;
		$data['status'] = $status;
		$this->db->where("id", $id);
		$result = $this->db->update('master_transaction_out', $data);
		
		if($result) {
			echo "<script>alert('SUCCESS');</script>";
		} else {
			echo "<script>alert('FAILED');</script>";
		}
		
		redirect('master_transaction_out');
	}
	
	public function delete($id) {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$this->db->where('id', $id);
        $result = $this->db->delete('master_transaction_out');
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
	} 
	
	/**
	 * Additional method
	 */
	 
	public function deletetemp($id) {
		array_splice($_SESSION['temp'], $id, 1);
	}
	 
	public function count_data_temp() {
		if(isset($_SESSION['temp'])) {
			echo count($_SESSION['temp']);
		} else {
			echo 0;
		}
	}
	
	public function clear_temp() {
		$_SESSION['temp'] = array();
	}
	 
	public function add_data_temp() {
		
		// echo "<pre>";
		// print_r($_REQUEST);
		$id = trim($this->input->post("kode_part2"));
		$sql = "SELECT * FROM master_inventory_part WHERE id='$id'";
		$part = $this->db->query($sql)->row();
		$nama_part = $this->db->query("SELECT * FROM master_inventory_part 
			LEFT JOIN master_transaction_in ON (master_transaction_in.id=master_inventory_part.id_detail)
			LEFT JOIN master_inventory ON (master_inventory.id=master_transaction_in.kode_part)
			WHERE master_inventory_part.id='$id'")->row()->nama_part;
		
		$data = array(
			"nama_part" => $nama_part,
			"kode_part" => $part->kode_part,
			"status_part" => $part->status_part,
			"part_no" => $part->part_no,
			"sn_part" => $part->sn_part,
			"price" => $part->price,
		);
		
		
		$array = ($_SESSION['temp']==null ? array() : $_SESSION['temp']);
		if(count($array)==0) {
			$newdata = array($data);
			array_push($array, $newdata);
			$_SESSION['temp'] = $array;
		} else {
			$status = "";
			foreach($array as $k => $r) {
				foreach($r as $x => $y) {
					if($y['sn_part']==$part->sn_part) {
						$status = "EXIST";
					}
				}
			}
			
			if($status=="") {
				$newdata = array($data);
				array_push($array, $newdata);
				$_SESSION['temp'] = $array;
			} else {
				echo $status;
			}
		}
	}
	
	public function get_data_temp() {
		$data_temp = $_SESSION['temp'];
		
		$total_employees = count($data_temp);
		
		$url = base_url().'transaction_out';
		$data = array();
		$no = 0;
		foreach($data_temp as $k => $r) {
			$no++;
			$arr = array();
			foreach($r as $x => $y) {
				$arr = array(
					$no,
					$y['nama_part'],
					$y['sn_part'],
					// number_format($y['price'], 0, '.', '.'),
					'<center><a onclick="deleteTemp(\''.$url.'/deletetemp/'.$k.'\')" class="btn btn-danger mr-1">Delete</a></center>'
				);
			}
			array_push($data, $arr);
			// print_r($data);
		}
		$output = array(
            "draw" => 0,
            "recordsTotal" => $total_employees,
            "recordsFiltered" => $total_employees,
            "data" => $data
        );
        echo json_encode($output);
        exit();
	}

	public function get_data($merk) {
		$merk = urldecode($merk);
		$valid_columns = array(
            0=>'id',
            1=>'tgl_terima',
            2=>'kode_part',
            3=>'quantity'
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
		// $this->db->where('merk', urldecode($merk));
		if($merk!=="0") {
			$where = "WHERE b.merk='".urldecode($merk)."'";
		} else {
			$where = "";
		}
		$query = "SELECT *, a.id as ids, c.name as pid, e.nama as cse FROM master_transaction_out a 
		LEFT JOIN master_inventory b ON(a.kode_part=b.id) 
		LEFT JOIN master_location c ON(a.id_location=c.id) 
		LEFT JOIN trans_schedule d ON (d.id_lokasi=c.id)
		LEFT JOIN master_staff e ON (e.id=d.id_petugas)
		$where";
        $employees = $this->db->query($query);
        $data = array();
		
		$no = 0;
		foreach($employees->result() as $rows) {
			$no++;
			$url = base_url().'transaction_out';
            $data[]= array(
                $no,
                $rows->tgl_keluar,
                $rows->nama_part,
                $rows->quantity,
                $rows->pid,
                $rows->cse,
                '<a onclick="updateModal(
					\''.$rows->ids.'\',
					\''.$rows->tgl_keluar.'\',
					\''.$rows->kode_part.'\',
				)" class="btn btn-warning mr-1"><img style="float: left; margin: 3px 5px 0px 0px; height:15px; width:15px; " src="'.base_url().'seipkon/assets/img/edit.png"/>Edit</a>
                 <a onclick="deleteAction(\''.$url.'/delete/'.$rows->ids.'\')" class="btn btn-danger mr-1"><img style="float: left; margin: 3px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'seipkon/assets/img/delete.png"/>Delete</a>'
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
		$query = $this->db->select("COUNT(*) as num")->get("master_transaction_in");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
	}
}
