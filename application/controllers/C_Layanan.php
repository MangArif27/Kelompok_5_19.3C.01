<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Layanan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper("file");
		$this->load->model('m_layanan');
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
	public function Index()
	{
		//$this->load->view('welcome_message');
		if($this->session->userdata('login') !== 'login'){
			redirect('Proses/Logout','refresh');
		}
		else {
			view('page._dashboard');
		}
	}
}
