<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
    
    class MY_Controller extends CI_Controller {
        public function __construct() {
			parent::__construct();
            
			if(!$this->session->userdata('user_data')) {
				redirect('');
			}
			
			
			$this->data['user_access'] = $this->session->userdata('user_data');
			$this->data['access_crud'] = function($user_access, $accepted_access) {
				if(strtolower($user_access['level'])!=="super") {
					if (in_array(strtolower($user_access['level']),  $accepted_access)) {
						echo "";
					} else {
						echo "hidden";
					}
				}
			};
        }
	}