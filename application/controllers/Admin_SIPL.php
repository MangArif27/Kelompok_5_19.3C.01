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
			view('page._dashboard');
		}
	}
	public function login()
	{
		//$this->load->view('welcome_message');
		view('partials._login');
	}
	public function registrasi()
	{
		//$this->load->view('welcome_message');
		view('partials._registrasi');
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
			if ($this->session->userdata('level') == 'Admin' || $this->session->userdata('level') == 'User' )
			{
				redirect('Dashboard');
			}
			else if ($this->session->userdata('level') == 'Pending')
			{
				$this->session->unset_userdata($user_data);
				$this->session->set_flashdata('message_login_error', 'Login Gagal, akun anda belum disetujui oleh admin!');
				redirect('Login');
			}
		}
		$this->session->unset_userdata($user_data);
		$this->session->set_flashdata('message_login_error', 'Login Gagal, pastikan username dan passwrod benar!');
		redirect('Login');
	}
	public function prosesregistrasi()
	{
		//$this->load->view('welcome_message');
		$date = date("Y-m-d");
		$config['upload_path']         = FCPATH.'assets/images/';  // folder upload
		$config['allowed_types']        = 'gif|jpg|jpeg|png'; // jenis file
		$config['overwrite']            = true;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('Photo')) //sesuai dengan name pada form
		{
			$this->upload->display_errors();
		}
		else {
			$UploadPhoto = $this->upload->data();
			$Photo =$UploadPhoto['file_name'];
		}
		$configscan['upload_path']         = FCPATH.'assets/images/';  // folder upload
		$configscan['allowed_types']        = 'gif|jpg|jpeg|png'; // jenis file
		$configscan['overwrite']            = true;
		$this->load->library('upload', $configscan);
		if ( ! $this->upload->do_upload('ScanIdentitas')) //sesuai dengan name pada form
		{
			$this->upload->display_errors();
		}
		else {
			$UploadScanIdentitas = $this->upload->data();
			$ScanIdentitas = $UploadScanIdentitas['file_name'];
		}
		$data_member = array(
			'no_identitas' =>$this->input->post('NoIdentitas'),
			'nama' =>$this->input->post('Nama'),
			'jenis_kelamin' =>$this->input->post('JenisKelamin'),
			'alamat' =>$this->input->post('Alamat'),
			'no_handphone' =>$this->input->post('NoHandphone'),
			'email' =>$this->input->post('Email'),
			'photo' => $Photo,
			'scan_identitas' => $ScanIdentitas,
			'password' => md5($this->input->post('Password')),
			'level' => "Pending",
			'button' => "btn-danger",
			'tgl_registrasi' => $date
		);
		$this->m_user->auth_registrasi($data_member);
		$this->session->set_flashdata('message_login_success', 'Registrasi berhasil, akun anda sedang di validasi oleh admin !');
		redirect('Login');
	}
	function prosesupdate($id)
	{
		$NoInduk = array(
			'no_identitas' => $id,
		);
		$Level = $this->input->post('Level');
		if($Level=="Admin")
		{
			$Button = "btn-success";
		}
		else if($Level=="User")
		{
			$Button = "btn-warning";
		}
		else
		{
			$Button = "btn-danger";
		}
		$data = array(
			'jenis_kelamin' =>$this->input->post('JenisKelamin'),
			'alamat' =>$this->input->post('Alamat'),
			'no_handphone' =>$this->input->post('NoHandphone'),
			'email' => $this->input->post('Email'),
			'photo' => $Photo,
			'scan_identitas' => $ScanIdentitas,
			'password' => md5($this->input->post('Password')),
			'level' => $this->input->post('Level'),
			'button' => $Button,
		);
		$this->m_user->update_user($NoInduk,$data,'user');
		redirect('Data-Pengguna');
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect('Login');
	}
}
