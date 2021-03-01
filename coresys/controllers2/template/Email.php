<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

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
	public function index()
	{
		return view('template/inbox');
	}
	
	public function email_list()
	{
		return view('template/email-list');
	}
	
	public function email_compose()
	{
		return view('template/email-compose');
	}
	
	public function email_opened()
	{
		return view('template/email-opened');
	}
	
	public function email_reply()
	{
		return view('template/email-reply');
	}
}
