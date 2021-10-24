<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class page extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_user');
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
	public function data_pengguna()
	{
		//$this->load->view('welcome_message');
		$data['user'] = $this->m_user->tmpl_user()->result();
		view('page._data_pengguna', $data);
	}
	public function data_wbp()
	{
		//$this->load->view('welcome_message');
		view('page._data_wbp');
	}
	public function histori_pendaftar()
	{
		//$this->load->view('welcome_message');
		view('page._data_pendaftaran_layanan');
	}
	public function cetak_ticket()
	{
		//$this->load->view('welcome_message');
		view('page._cetak_ticket');
	}
	public function  profile()
	{
		//$this->load->view('welcome_message');
		view('page._profile');
	}
	public function  about()
	{
		//$this->load->view('welcome_message');
		view('page._tentang_aplikasi');
	}
}
