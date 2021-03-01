<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_client extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->library('session');
		
		
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
		if($this->session->userdata('user_data')) {
			redirect('dashboard');
		}
		
		return view('pages/login_client');
	}
	
	public function logout() {
		$this->session->sess_destroy();
		
		redirect('');
	}
	
	public function proses() {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$this->db->where("username", $_REQUEST['username']);
		// $this->db->like('username', $_REQUEST['username']);
		// $this->db->join('master_staff', 'master_staff.nik = master_user.username', 'left'); 
		$row = $this->db->get('master_client');
		$num = $row->num_rows();
		$res = $row->row();
		
		if($num>0) {
			$hash = $res->password;

			if (password_verify($_REQUEST['password'], $hash)) {
				$session['id'] = $res->id;
				$session['name'] = $res->nama_lengkap;
				$session['level'] = "client_".$_REQUEST['username'];
				$this->session->set_userdata(array("user_data"=>$session));
				
				echo $_REQUEST['username'];
			} else {
				echo 'Invalid password.';
			}
		} else {
			echo 'Username not found.';
		}
	}
}
