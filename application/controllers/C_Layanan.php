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
	public function InsertPendaftaran()
	{
		$permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $acak= substr(str_shuffle($permitted_chars), 0, 6);
		$data = array(
			'no_induk' =>$this->input->post('NoInduk'),
			'no_identitas' =>$this->input->post('NoIdentitas'),
			'tgl_pelaksanaan' =>$this->input->post('TglPelaksanaan'),
			'jenis_layanan' =>$this->input->post('JenisLayanan'),
			'tiket' => $acak,
			'status_layanan' => "Proses",
			'button' => "btn-warning",
		);
		$insert_datawbp=$this->m_layanan->insert_pendaftaran($data);
		if ($insert_datawbp) {
			$this->session->set_flashdata('message_pendaftaran_success', 'Selamat, anda berhasil mendaftar !');
			redirect('Layanan-Pendaftaran');
		}
		else {
			$this->session->set_flashdata('message_pendaftaran_error', 'Selamat, pendaftaran anda gagal !');
			redirect('Layanan-Pendaftaran');
		}
	}
}
