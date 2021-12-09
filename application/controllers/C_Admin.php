<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Admin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper("file");
		$this->load->model('m_user');
		$this->load->model('m_about');
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
	public function Login()
	{
		//$this->load->view('welcome_message');
		$data['about'] = $this->m_about->search_about()->result();
		view('partials._login', $data);
	}
	public function Registrasi()
	{
		//$this->load->view('welcome_message');
		view('partials._registrasi');
	}
	function ProsesLogin(){
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
					'login' => "login",
					'created' => $data->created
				);
				$this->session->set_userdata($user_data);
			}
			$NoInduk = array(
				'no_identitas' =>$username,
			);
			$date = date("Y-m-d H:m:s");
			$data_update = array(
				'updated' => $date,
			);
			if ($this->session->userdata('level') == 'Admin' || $this->session->userdata('level') == 'User' )
			{
				$this->m_user->update_user($NoInduk,$data_update);
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
	function logout()
	{
		$this->session->sess_destroy();
		redirect('Login');
	}
	public function ProsesRegistrasi()
	{
		$NoIdentitas = $this->input->post('NoIdentitas');
		$check = $this->m_user->search_user($NoIdentitas);
		if($check->num_rows() > 0){
			$this->session->set_flashdata('message_login_error', 'Maaf Nomor Identitas yang anda masukan sudah teregistrasi !');
			redirect('Login');
		}
		else {
		//$this->load->view('welcome_message');
		$date = date("Y-m-d H:m:s");
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
			'created' => $date,
			'updated' => $date
		);
			$this->m_user->auth_registrasi($data_member);
			$this->session->set_flashdata('message_login_success', 'Registrasi berhasil, akun anda sedang di validasi oleh admin !');
			redirect('Login');
		}
	}
	function ProsesUpdate()
	{
		$NoInduk = array(
			'no_identitas' =>$this->uri->segment(4),
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
		$date = date("Y-m-d H:m:s");
		$data = array(
			'jenis_kelamin' =>$this->input->post('JenisKelamin'),
			'alamat' =>$this->input->post('Alamat'),
			'no_handphone' =>$this->input->post('NoHandphone'),
			'email' => $this->input->post('Email'),
			'level' => $this->input->post('Level'),
			'button' => $Button,
			'updated' => $date,
		);
		$this->m_user->update_user($NoInduk,$data,'user');
		$this->session->set_flashdata('message_pengguna_success', 'Selamat, update data berhasil dilakukan !');
		redirect('Data-Pengguna');
	}
	public function ProsesTambahPengguna()
	{
		$NoIdentitas = $this->input->post('NoIdentitas');
		$check = $this->m_user->search_user($NoIdentitas);
		if($check->num_rows() > 0){
			$this->session->set_flashdata('message_pengguna_error', 'Maaf Nomor Identitas yang anda masukan sudah teregistrasi !');
			redirect('Data-Pengguna');
		}
		else {
		//$this->load->view('welcome_message');
		$date = date("Y-m-d H:m:s");
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
			'level' => $this->input->post('Level'),
			'button' => $Button,
			'created' => $date,
			'updated' => $date
		);
			$this->m_user->auth_registrasi($data_member);
			$this->session->set_flashdata('message_pengguna_success', 'Selamat, Berhasil menambahkan pengguna baru !');
			redirect('Data-Pengguna');;
		}
	}
	function DeletePengguna(){
		$NoIdentitas = $this->uri->segment(4);
		$check = $this->m_user->search_user($NoIdentitas);
		if($check->num_rows() == 1){
			foreach($check->result() as $data){
				$chek_data = array(
					'no_identitas' => $data->no_identitas,
					'photo' => $data->photo,
					'scan_identitas' => $data->scan_identitas,
				);
				$this->session->set_userdata($chek_data);
			}
		}
		$NoInduk = array(
			'no_identitas' => $this->session->userdata('no_identitas')
		);
		$this->m_user->delete_user($NoInduk);
		$this->session->set_flashdata('message_pengguna_success', 'Selamat, hapus data berhasil dilakukan !');
    redirect('Data-Pengguna');
  }
	function ProsesUpdateAbout()
	{
		$Id = array(
			'id_upt' =>$this->uri->segment(4),
		);
		$data = array(
			'nama_apk' =>$this->input->post('Nama_Apk'),
			'nama_upt' =>$this->input->post('Nama_Upt'),
			'alamat' =>$this->input->post('Alamat'),
			'no_tlp' => $this->input->post('No_Telp'),
			'email' => $this->input->post('Email'),
			'website' => $this->input->post('Website'),
			'tentang_apk' => $this->input->post('summernote')
		);
		$this->m_about->update_about($Id,$data);
		$this->session->set_flashdata('message_pengguna_success', 'Selamat, update data berhasil dilakukan !');
		redirect('Tentang-Aplikasi');
	}
}
