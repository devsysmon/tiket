<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_merchant_internal extends CI_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}
	
	/**
	 * View method
	 */
	public function index() {	
	
		$this->data['data_client'] = $this->db->query("SELECT * FROM master_client")->result();
		$this->data['data_cabang'] = $this->db->query("SELECT * FROM master_client GROUP BY cabang")->result();
		$this->data['kunjungan'] = $this->kunjungan();
		
	
		return view('pages/dashboard_merchant_internal/index', $this->data);
	}
	
	public function index2() {	
		$client = $this->uri->segment(3);
		$cabang = $this->uri->segment(4);
		
		// echo "<pre style='background-color: white'>";
		// echo $client." ".$cabang;
		$this->data['client'] = $client;
		$this->data['cabang'] = $cabang;
		// $this->data['logo'] = json_decode($this->db->query("SELECT logo FROM master_client WHERE nama='$client' AND cabang='$cabang'")->row()->logo);
		$logo = json_decode($this->db->query("SELECT logo FROM master_client WHERE nama='$client'")->row()->logo);
		$this->data['logo'] = '<img style="float: left; margin: 0px 0px 0px 30px; width: 155px; height: 60px; " src="'.$logo->full_link.'" height="25" width="25" />';
	
		// print_r($this->data['logo']->full_link);
		
		// echo '<img style="float: left; margin: 0px 0px 0px 30px;" src="'.$this->data['logo'].'" height="25" width="25" />';
	
		return view('pages/dashboard_merchant/index2', $this->data);
	}
	
	public function get_cabang() {
		$client = $this->uri->segment(3);
		$query = "
			SELECT *
			FROM master_client
			WHERE nama='$client'
		";
		
		$query = $this->db->query($query);
		
		$data[0] = array(
			"id" => "",
			"cabang" => "Pilih Cabang"
		);
		foreach($query->result() as $rows) {
			$data[]= array(
				"id" => $rows->id,
				"cabang" => $rows->cabang
			);  
		}
		
		echo json_encode($data);
        exit();
	}
	
	public function get_data_detail() {
		$client = $this->uri->segment(3);
		$cabang = $this->uri->segment(4);
		
		$array = array(
			"Body ATM Bersih dan tidak berdebu", 
			"ATM Berfungsi / Online", 
			"Brosur ATM tertata rapih",
			"Layar monitor bersih dan terlihat jelas tampilannya",
			"Pin pad ATM bersih dan tidak berdebu",
			"Boot ATM bersih, tidak ada noda atau debu",
			"Sticker ATM tidak terkelupas, pudar atau hilang",
			"Tertera sticker kartu, receipt printer, uang keluar, nominal pecahan uang",
			"Terdapat sticker larangan memakai helm, masker, kacamata gelap, topi, rokok",
			"Terdapat informasi ketersediaan mesin ATM BNI terdekat",
			"Lampu boot ATM menyala",
			"Lampu ruangan ATM menyala dengan baik",
			"Tempat sampah bersih dan tidak ada sampah",
			"Teras ruangan ATM bersih dan tidak rusak",
			"Dinding kaca ruangan bersih",
			"Dinding tembok ruangan bersih",
			"Atap ruangan tidak terbuka dan bocor",
			"AC ruangan ATM bersih, dingin, dan tidak bocor",
			"Peralatan, Kabel rapih dan tidak berantakan",
			"Pintu ATM bersih dan berfungsi dengan baik",
			"Pegangan pintu terpasang dengan baik",
			"Terdapat sticker tarik dan dorong",
			"Teras luar bersih",
			"Dinding luar bersih",
			"Lampu luar menyala",
			"Sticker dinding kaca dan pintu kaca menempel dengan baik",
			"Neon box menyala dan bersih",
			"Box panel listrik terkunci",
			"Token listrik masih tersedia atau tidak",
			"Kamera CCTV",
			"DVR CCTV",
			"UPS",
			"Integrated Transformer",
			"AC",
			"Sticker Kaca",
			"Sticker Mesin",
			"Neon Sign"
		);
		
		$query = "
			SELECT *, trans_activity.id as ids
			FROM trans_activity
			LEFT JOIN trans_clean ON(trans_clean.id=trans_activity.id_clean)
			LEFT JOIN master_lokasi_detail ON(master_lokasi_detail.id=trans_clean.id_detail)
			LEFT JOIN master_atm ON(master_atm.id=master_lokasi_detail.id_atm)
			LEFT JOIN master_client ON(master_client.id=master_atm.id_bank)
			WHERE trans_activity.status!='solved' AND master_client.nama='$client' AND master_client.cabang='$cabang'
		";
		
		$query = $this->db->query($query);
		
		// echo "<pre>";
		// print_r($query->result());
		$data = array();
		foreach($query->result() as $rows) {
			$no = 0;
			$prob = '<table style="width:100%">';
			$prob .= 	'<tr>
							<th><b>No.</b></th>
							<th>Checklist</th>
							<th>Status</th>
						</tr>';
			$n = 0;
			foreach(json_decode($rows->action) as $r) {
				$no++;
				if($no>=30) {
					$n++;
					// $prob .= '- '.$array[$no-1].'<br>';
					
					$prob .= 	'<tr>
									<td><b>'.$n.'.</b></td>
									<td>'.$array[$no-1].'</td>
									<td>'.($r->value==0 ? "NOT OK" : "OK").'</td>
								</tr>';
				}
			}
			$prob .= '</table>';
			
			// echo $prob."<br><br>";
			
            $data[]= array(
                "id" => $rows->ids,
                "date" => date("d M Y", strtotime($rows->date)),
                "idatm" => $rows->idatm,
                "cabang" => $rows->cabang,
                "lokasi" => $rows->lokasi,
                "problem" => $prob
            );     
        }
		
		// print_r($data);
		
		echo json_encode($data);
        exit();
	}
	
	public function get_data_problem() {
		$client = $this->uri->segment(3);
		$cabang = $this->uri->segment(4);
		
		$query = "
			SELECT *, trans_activity.id as ids
			FROM trans_activity
			LEFT JOIN trans_clean ON(trans_clean.id=trans_activity.id_clean)
			LEFT JOIN master_lokasi_detail ON(master_lokasi_detail.id=trans_clean.id_detail)
			LEFT JOIN master_atm ON(master_atm.id=master_lokasi_detail.id_atm)
			LEFT JOIN master_client ON(master_client.id=master_atm.id_bank)
			WHERE trans_activity.status!='solved' AND master_client.nama='$client' AND master_client.cabang='$cabang'
		";
		
		$query = $this->db->query($query);
		
		// echo "<pre>";
		// print_r($query->result());
		$data = array();
		foreach($query->result() as $rows) {
			$prob = '';
			foreach(json_decode($rows->problem) as $r) {
				$prob .= '- '.$r->keterangan.'<br>';
			}
			
			
            $data[]= array(
				"id" => $rows->ids,
                "date" => date("d M Y", strtotime($rows->date)),
                "idatm" => $rows->idatm,
                "cabang" => $rows->cabang,
                "lokasi" => $rows->lokasi,
                "problem" => $prob
            );     
        }
		
		// print_r($data);
		
		echo json_encode($data);
        exit();
	}
	
	public function get_data_todolist($status, $client, $cabang) {
		// $this->db->select("*, trans_activity.id as ids");
		// $this->db->from('trans_activity');
		// $this->db->join('trans_clean', 'trans_clean.id = trans_activity.id_clean');
		// $this->db->join('master_lokasi_detail', 'master_lokasi_detail.id = trans_clean.id_detail');
		// $this->db->join('master_atm', 'master_atm.id = master_lokasi_detail.id_atm');
		// $this->db->where('trans_activity.status', $status);
		// $query = $this->db->get();
		
		$query = "
			SELECT *, trans_activity.id as ids
			FROM trans_activity
			LEFT JOIN trans_clean ON(trans_clean.id=trans_activity.id_clean)
			LEFT JOIN master_lokasi_detail ON(master_lokasi_detail.id=trans_clean.id_detail)
			LEFT JOIN master_atm ON(master_atm.id=master_lokasi_detail.id_atm)
			LEFT JOIN master_client ON(master_client.id=master_atm.id_bank)
			WHERE trans_activity.status='$status' AND master_client.nama='$client' AND master_client.cabang='$cabang'
		";
		
		$query = $this->db->query($query);
		
		// echo "<pre>";
		// print_r($query->result());
		
		foreach($query->result() as $rows) {
			$prob = '';
			foreach(json_decode($rows->problem) as $r) {
				$prob .= '- '.$r->keterangan.'<br>';
			}
			
			
            $data[]= array(
                "id" => $rows->ids,
                "date" => date("d M Y", strtotime($rows->date)),
                "idatm" => $rows->idatm,
                "cabang" => $rows->cabang,
                "lokasi" => $rows->lokasi,
                "problem" => $prob
            );     
        }
		
		// print_r($data);
		
		echo json_encode($data);
        exit();
	}
	
	
	public function get_data_problem_found($status, $client, $cabang) {
		// $this->db->select("COUNT(*) as num");
		// $this->db->from('trans_activity');
		// $this->db->join('trans_clean', 'trans_clean.id = trans_activity.id_clean');
		// $this->db->join('master_lokasi_detail', 'master_lokasi_detail.id = trans_clean.id_detail');
		// $this->db->join('master_atm', 'master_atm.id = master_lokasi_detail.id_atm');
		// $query = $this->db->get();
		
		// $result1 = $query->row();
		
		$query = "
			SELECT COUNT(*) as num
			FROM trans_activity
			LEFT JOIN trans_clean ON(trans_clean.id=trans_activity.id_clean)
			LEFT JOIN master_lokasi_detail ON(master_lokasi_detail.id=trans_clean.id_detail)
			LEFT JOIN master_atm ON(master_atm.id=master_lokasi_detail.id_atm)
			LEFT JOIN master_client ON(master_client.id=master_atm.id_bank)
			WHERE master_client.nama='$client' AND master_client.cabang='$cabang'
		";
		$result1 = $this->db->query($query)->row();
		
		// $this->db->select("COUNT(*) as num");
		// $this->db->from('trans_activity');
		// $this->db->join('trans_clean', 'trans_clean.id = trans_activity.id_clean');
		// $this->db->join('master_lokasi_detail', 'master_lokasi_detail.id = trans_clean.id_detail');
		// $this->db->join('master_atm', 'master_atm.id = master_lokasi_detail.id_atm');
		// $this->db->where('trans_activity.status', $status);
		// $query = $this->db->get();
		
		// $result2 = $query->row();
		
		$query = "
			SELECT COUNT(*) as num
			FROM trans_activity
			LEFT JOIN trans_clean ON(trans_clean.id=trans_activity.id_clean)
			LEFT JOIN master_lokasi_detail ON(master_lokasi_detail.id=trans_clean.id_detail)
			LEFT JOIN master_atm ON(master_atm.id=master_lokasi_detail.id_atm)
			LEFT JOIN master_client ON(master_client.id=master_atm.id_bank)
			WHERE trans_activity.status='$status' AND master_client.nama='$client' AND master_client.cabang='$cabang'
		";
		$result2 = $this->db->query($query)->row();
		if($result2->num==0 && $result1->num==0) {
			echo "0%";
		} else {
			if(isset($result2)) { echo round((($result2->num/$result1->num)*100), 2)."%"; } else { echo "0%"; }
		}
	}
	
	public function solving_problem() {
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		
		$data = array();
		$data['status'] = $status;
		$this->db->where('id', $id);
		$result = $this->db->update('trans_activity', $data);
		
		if($result) {
			echo "success";
		} else {
			echo "failed";
		}
	}
	 
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
        $employees = $this->db->get("dashboard_merchant");
        $data = array();
		
		$no = 0;
		foreach($employees->result() as $rows) {
			$no++;
			$url = base_url().'dashboard_merchant';
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
		$query = $this->db->select("COUNT(*) as num")->get("dashboard_merchant");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
	}
	
		// Total kunjungan
	public function kunjungan()
	{
		$this->db->select('hari, COUNT(*) AS total');
		$this->db->from('kunjungan');
		$this->db->group_by('hari');
		$this->db->order_by('hari', 'desc');
		$this->db->limit(14);
		$query = $this->db->get();
		return $query->result();
	}
}
