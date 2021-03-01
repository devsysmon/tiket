<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Amp\Loop;
use Amp\WindowsRegistry\KeyNotFoundException;
use Amp\WindowsRegistry\WindowsRegistry;

use Amp\Parallel\Worker;
use Amp\Promise;

class Tree extends CI_Controller {
    var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
    }
    
    /**
	 * View method
	 */
	 
	public function index() {
		Loop::run(function () {
			$keys = ["HKEY_LOCAL_MACHINE\SOFTWARE\Wincor Nixdorf\ProTopas\CurrentVersion\CCERRMAP\CLASS"];
			$reader = new WindowsRegistry;
			while ($key = \array_shift($keys)) {
				$result = yield $reader->listKeys($key);
				while ($key = \array_shift($result)) {
					$result2 = yield $reader->listKeys($key);
					$res[] = array(
						"class" => $key,
						"data" => $result2
					);
					// print_r($result);
				}
			}
			
			// echo "<pre>";
			// print_r($this->data['result']);
			$this->data['keys'] = $res;
		});
		
		// print_r($this->data['keys']);
		
		return view('pages/tree/index', $this->data);
	}
	
	public function read() {
		Loop::run(function () {
			$key = str_replace('/', '\\', $_POST['key']);
			$reader = new WindowsRegistry;
			$property = array('DDC_MDS_STATUS', 'DDC_STATUS', 'INFO', 'M_DATA', 'M_STATUS', 'REBOOT', 'SEVERITY', 'SYSMSG_NUMBER', 'TD_STATUS');
			foreach ($property as $prop) {
				$nameserver = (yield $reader->read("{$key}\\{$prop}"));
				
				echo $prop." => ".($nameserver)."<br>";
			}
		});
	}
	
	public function read_detailX() {
		Loop::run(function () {
			$key = str_replace('/', '\\', $_POST['key']);
			$reader = new WindowsRegistry;
			$keys = yield $reader->listKeys($key);
			while ($key2 = \array_shift($keys)) {
				$property = array('DDC_MDS_STATUS', 'DDC_STATUS', 'INFO', 'M_DATA', 'M_STATUS', 'REBOOT', 'SEVERITY', 'SYSMSG_NUMBER', 'TD_STATUS');
				foreach ($property as $prop) {
					$nameserver = (yield $reader->read("{$key2}\\{$prop}"));
					
					echo $prop." => ".($nameserver)."<br>";
				}
				
				echo "<br>";
			}
		});
	}
	
	public function read_detail() {
		Loop::run(function () {
			$no = $_POST['no']+1;
			// $_POST['key'] = 'HKEY_LOCAL_MACHINE/SOFTWARE/Wincor Nixdorf/ProTopas/CurrentVersion/CCERRMAP/CLASS/0007';
			$key = str_replace('/', '\\', $_POST['key']);
			$reader = new WindowsRegistry;
			$keys = yield $reader->listKeys($key);
			$line = (count($keys)-($no-1)).". ". explode('\\', $keys[$no])[8]."<br>";
			
			$property = array('DDC_MDS_STATUS', 'DDC_STATUS', 'INFO', 'M_DATA', 'M_STATUS', 'REBOOT', 'SEVERITY', 'SYSMSG_NUMBER', 'TD_STATUS');
			foreach ($property as $prop) {
				$nameserver = (yield $reader->read("{$keys[$no]}\\{$prop}"));
				$line .= "&nbsp;&nbsp;&nbsp;&nbsp;".$prop." => ".($nameserver)."<br>";
			}
			// while ($key2 = \array_shift($keys)) {
				// // echo $key2."<br>";
				
				// // $property = array('DDC_MDS_STATUS', 'DDC_STATUS', 'INFO', 'M_DATA', 'M_STATUS', 'REBOOT', 'SEVERITY', 'SYSMSG_NUMBER', 'TD_STATUS');
				// // foreach ($property as $prop) {
					// // // echo "{$key2}\\{$prop}<br><br>";
					// // $nameserver = (yield $reader->read("{$key2}\\{$prop}"));
					// // $responses = Promise\wait(Promise\all($nameserver));
					
					// // echo $prop." => ".($nameserver)."<br>";
				// // }
				
				// // echo "<br>";
			// }
			
			$data['total'] = count($keys);
			$data['count'] = $no;
			$data['value'] = $line;
			
			echo json_encode($data);
			exit();
		});
		
	}
	
	public function tes() {

		$urls = [
			'https://secure.php.net',
			'https://amphp.org',
			'https://github.com',
		];

		$promises = [];
		foreach ($urls as $url) {
			$promises[$url] = Worker\enqueueCallable('file_get_contents', $url);
		}

		$responses = Promise\wait(Promise\all($promises));

		foreach ($responses as $url => $response) {
			\printf("Read %d bytes from %s\n", \strlen($response), $url);
		}
	}
}