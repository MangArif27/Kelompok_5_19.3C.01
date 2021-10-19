<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_SIPL extends CI_Controller {
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
	public function index()
	{
		//$this->load->view('welcome_message');
		if($this->session->userdata('login') !== 'login'){
			redirect('Proses/Logout','refresh');
		}
		else {
			$session['level'] = $this->session->userdata('level');
			view('page._dashboard', $session);
		}
	}
	public function login()
	{
		//$this->load->view('welcome_message');
		view('partials._login');
	}
	function proseslogin(){
		$username = htmlspecialchars($this->input->post('NoIdentitas',TRUE),ENT_QUOTES);
		$password = htmlspecialchars($this->input->post('Password',TRUE),ENT_QUOTES);

		$check = $this->m_user->auth_login($username,$password);
		if($check->num_rows() == 1){
			foreach($check->result() as $data){
				$user_data = array(
					'no_identitas' => $data->no_identitas,
					'nama' => $data->nama,
					'alamat' => $data->alamat,
					'no_handphone' => $data->no_handphone,
					'email' => $data->email,
					'photo' => $data->photo,
					'scan_identitas' => $data->scan_identitas,
					'jenis_kelamin' => $data->jenis_kelamin,
					'level' => $data->level,
					'button' => $data->button,
					'tgl_registrasi' => $data->tgl_registrasi,
					'login' => "login"
				);
				$this->session->set_userdata($user_data);
			}
			if ($this->session->userdata('level') == 'Admin')
			{
				redirect('Dashboard'.$session);
			}
			else
			{
				redirect('Dashboard'.$session);
			}
		}
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect('Login');
	}
}
