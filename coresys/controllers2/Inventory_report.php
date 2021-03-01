<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class Inventory_report extends CI_Controller {
	var $terpakai, $sisa, $kebutuhan, $kekurangan, $status;
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}

	public function index() {
		$this->db->select('*, master_lokasi_detail.id as id_detail');
		$this->db->from('master_atm');
		$this->db->join('master_lokasi_detail', 'master_atm.id=master_lokasi_detail.id_atm');
		$query = $this->db->get();
		$result = $query->result();
		
		$this->data['data_atm'] = $result;
		
		return view('pages/inventory_report/index', $this->data);
	}
	
	public function index2() {
		echo "<center><a href='".base_url()."excel/generate/output' target='_blank'>OUTPUT</a></center>";
		echo "<center><a href='".base_url()."excel/generate/preview' target='_blank'>PREVIEW</a></center>";
	}
	
	public function func() {
		$this->terpakai = function($kode_part) {
			$qty = $this->db->query("SELECT kode_part, SUM(quantity) as qty FROM master_transaction_out WHERE kode_part='$kode_part' GROUP BY kode_part");
			$num = $qty->num_rows();
			
			if($num>0) {
				$res = $qty->row()->qty;
				return $res;
			} else {
				return 0;
			}
		};
		
		$this->sisa = function($kode_part) {
			$stok = $this->db->query("SELECT kode_part, SUM(stock) as qty FROM master_inventory WHERE kode_part='$kode_part' GROUP BY kode_part");
			$stok_keluar = $this->db->query("SELECT kode_part, SUM(quantity) as qty FROM master_transaction_out WHERE kode_part='$kode_part' GROUP BY kode_part");
			$stok_masuk = $this->db->query("SELECT kode_part, SUM(quantity) as qty FROM master_transaction_in WHERE kode_part='$kode_part' GROUP BY kode_part");
			$num_stok = $stok->num_rows();
			$num_stok_keluar = $stok_keluar->num_rows();
			$num_stok_masuk = $stok_masuk->num_rows();
			
			if($num_stok>0) {
				if($num_stok_keluar>0) {
					if($num_stok_keluar>0)  {
						$res = ($stok->row()->qty + $stok_masuk->row()->qty) - $stok_keluar->row()->qty;	
					} else {
						$res = $stok->row()->qty - $stok_keluar->row()->qty;						
					}
				} else {
					$res = $stok->row()->qty;
				}
				return $res;
			} else {
				return 0;
			}
		};
		
		$this->kebutuhan = function($kode_part) {
			$qty = $this->db->query("SELECT kode_part, SUM(quantity) as qty FROM master_kebutuhan_part WHERE kode_part='$kode_part' GROUP BY kode_part");
			$num = $qty->num_rows();
			
			if($num>0) {
				$res = $qty->row()->qty;
				return $res;
			} else {
				return 0;
			}
		};
		
		$this->kekurangan = function($sisa, $kebutuhan) {
			$res = $sisa-$kebutuhan;
			if($res==0) {
				$res = "-";
			} else if($res>0) {
				$res = "($res)";
			} else {
				$res = $res*-1;
			}
			return $res;
		};
		
		$this->status = function($sisa, $kebutuhan) {
			$res = $sisa-$kebutuhan;
			if($res==0) {
				$res = "LENGKAP";
			} else if($res>0) {
				$res = "LENGKAP";
			} else {
				$res = "TIDAK LENGKAP";
			}
			return $res;
		};
		
		return [
			"terpakai"=>$this->terpakai,
			"sisa"=>$this->sisa,
			"kebutuhan"=>$this->kebutuhan,
			"kekurangan"=>$this->kekurangan,
			"status"=>$this->status
		];
	}
	
	public function get_preview($data) {
		$func = $this->func();
		
		$htmlString = '
			<style>
				#table_bawah {
					width: 100%;
					margin-top: 20px;
					background-color: #ebebeb;
					font-size: 10px;
				}
				
				#table_bawah {
				  font-family: Arial, Helvetica, sans-serif;
				  border-collapse: collapse;
				  width: 100%;
				}

				#table_bawah th {
				  border: 1px solid #ddd;
				  padding: 8px;
				}

				#table_bawah td {
				  border: 1px solid #ddd;
				  padding: 5px;
				}

				#table_bawah tr:nth-child(even){background-color: #f2f2f2;}

				#table_bawah tr:hover {background-color: #ddd;}

				#table_bawah th {
				  padding-top: 12px;
				  padding-bottom: 12px;
				  text-align: center;
				  background-color: #4CAF50;
				  color: white;
				}
			</style>
			<h2>INVENTORY STOK SPAREPART ATM LAPORAN STOK PART</h2>
		';
		
		$htmlButton = '
			<br><button style=" border-radius: 5px; float: right; margin-left: 2px" type="button" onclick="preview_report2()" class="btn btn-info"><img style="float: left; margin: 0px 5px 0px 0px;" src="'.base_url().'seipkon/assets/img/xls.png" height="25" width="25" /><b style="color:white;font-size:16px; margin: 0px 0px 0px 0px;">Export To XLS</b></button>
			<button style=" border-radius: 5px; float: right" type="button" onclick="preview_report()" class="btn btn-info"><img style="float: left; margin: 0px 5px 0px 0px;" src="'.base_url().'seipkon/assets/img/pdf.png" height="25" width="25" /><b style="color:white;font-size:16px; margin: 0px 0px 0px 0px;">Export To PDF</b></button><br><br>
		';
		
		$htmlString .= '<div class="w3-responsive">';
		$htmlString .= '<table id="table_bawah" class="w3-table-all w3-card-4 w3-tiny">';
		$htmlString .= '<tr class="w3-light-green">';
		$htmlString .= '<th>NO</th>';
		$htmlString .= '<th>KODE PART</th>';
		$htmlString .= '<th>NAMA PART</th>';
		$htmlString .= '<th>MERK</th>';
		$htmlString .= '<th>PART NO</th>';
		$htmlString .= '<th>PART TERPAKAI</th>';
		$htmlString .= '<th>SISA STOK</th>';
		$htmlString .= '<th>KEKURANGAN PART</th>';
		$htmlString .= '<th>KEBUTUHAN STOK</th>';
		$htmlString .= '<th>STATUS PART</th>';
		$htmlString .= '<th>STATUS STOK</th>';
		$htmlString .= '</tr>';
		
		$no = 0;
		foreach($data as $r) {
			$no++;
			$htmlString .= '<tr>';
			$htmlString .= '<td>'.$no.'</td>';
			$htmlString .= '<td>'.$r->kode_part.'</td>';
			$htmlString .= '<td>'.$r->nama_part.'</td>';
			$htmlString .= '<td>'.$r->merk.'</td>';
			$htmlString .= '<td>'.$r->part_no.'</td>';
			$htmlString .= '<td>'.$func['terpakai']($r->kode_part).'</td>';
			$htmlString .= '<td>'.$func['sisa']($r->kode_part).'</td>';
			$htmlString .= '<td>'.$func['kekurangan']($func['sisa']($r->kode_part), $func['kebutuhan']($r->kode_part)).'</td>';
			$htmlString .= '<td>'.$func['kebutuhan']($r->kode_part).'</td>';
			$htmlString .= '<td>'.$r->kondisi.'</td>';
			$htmlString .= '<td>'.$func['status']($func['sisa']($r->kode_part), $func['kebutuhan']($r->kode_part)).'</td>';
			$htmlString .= '</tr>';
		}
		
		$htmlString .= '</table>'.$htmlButton;
		$htmlString .= '</div>';
		
		return $htmlString;
	}
	
	public function get_data_inv() {
		$result = $this->db->get("master_inventory");
		return $result->result();
	}
	
	public function generate($act) {
		$func = $this->func();
		$reader = IOFactory::createReader('Xlsx');
		$spreadsheet = $reader->load('Book1.xlsx');
		
		$data = $this->get_data_inv();
		
		$spreadsheet->getActiveSheet()->setCellValue('A1', 'INVENTORY STOK SPAREPART ATM');
		$spreadsheet->getActiveSheet()->setCellValue('A2', 'LAPORAN STOK PART');
		
		$baseRow = 7;
		$i = 0;
		$row = 0;
		foreach($data as $r) {
			$row = $baseRow + $i;
			$spreadsheet->getActiveSheet()->insertNewRowBefore($row+1, 1);
			$spreadsheet->getActiveSheet()->setCellValue('A'.$row,($i+1));
			
			$spreadsheet->getActiveSheet()->setCellValue('B'.$row, $r->kode_part)
										  ->setCellValue('C'.$row, $r->nama_part)
										  ->setCellValue('D'.$row, $r->merk)
										  ->setCellValue('E'.$row, $r->part_no)
										  ->setCellValue('F'.$row, $func['terpakai']($r->kode_part))
										  ->setCellValue('G'.$row, $func['sisa']($r->kode_part))
										  ->setCellValue('I'.$row, $func['kekurangan']($func['sisa']($r->kode_part), $func['kebutuhan']($r->kode_part)))
										  ->setCellValue('J'.$row, $func['kebutuhan']($r->kode_part))
										  ->setCellValue('K'.$row, $func['status']($func['sisa']($r->kode_part), $func['kebutuhan']($r->kode_part)));
										  
			$i++;
		}
		
		
		$spreadsheet->getActiveSheet()->removeRow($row+1,1);
		
		if($act=="output") {
			$filename = 'report_inventory_'.date("Y_m_d");
			$this->output($filename, $spreadsheet);
		} else {
			echo $this->get_preview($data);
		}
	}
	
	public function output($filename, $spreadsheet) {
		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		
		exit;
	}
}