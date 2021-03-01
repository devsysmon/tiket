<?php 
    class MY_Controller extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
        }
    
        public function is_logged_in()
        {
            $user = $this->session->userdata('user_data');
            return "AAA";
        }
		
		public function logout() {
			$this->session->sess_destroy();
		}
		
		public function rest_api() {
        {
            $API = "http://www.pt-bijak.co.id/rest_api/api";
            return isset($API);
        }
    }