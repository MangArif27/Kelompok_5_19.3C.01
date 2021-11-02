<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
class C_DataWbp extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper("file");
		$this->load->model('m_datawbp');
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
	public function Import_DataWbp(){
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

		if(isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['file']['name']);
			$extension = end($arr_file);
			if('csv' == $extension) {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}
			$spreadsheet = $reader->load($_FILES['file']['tmp_name']);
			$sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, false);
			$sheetcount=count($sheetData);
			if($sheetcount>1)
			{
				for ($i=0; $i <$sheetcount ; $i++) {
					$NoInduk = $sheetData[$i][0];
					$Nama = $sheetData[$i][1];
					$Kejahatan = $sheetData[$i][2];
					$Kamar = $sheetData[$i][3];
					$TglMasuk = $sheetData[$i][4];
					$Status = $sheetData[$i][5];
					$Button = $sheetData[$i][6];
					$data[]=array(
						'no_induk' => $NoInduk,
						'nama_wbp' => $Nama,
						'kejahatan' => $Kejahatan,
						'kamar' => $Kamar,
						'tgl_masuk' => $TglMasuk,
						'status' => $Status,
						'button' => $Button,
					);
				}
				$insert_datawbp=$this->m_datawbp->insert_datawbp($data);
				if ($insert_datawbp) {
					$this->session->set_flashdata('message_datawbp_success', 'Selamat, Updload Data Berhasil !');
					redirect('Data-WBP');
				}
				else {
					$this->session->set_flashdata('message_datawbp_error', 'Selamat, Maaf Upload Gagal Dilakukan !');
					redirect('Data-WBP');
				}
			}
		}
	}
	function ProsesUpdate()
	{
		$NoInduk = array(
			'no_induk' =>$this->uri->segment(4),
		);
		$Status = $this->input->post('Status');
		if($Status=="Tahanan")
		{
			$Button = "btn-danger";
		}
		else
		{
			$Button = "btn-success";
		}
		$data = array(
			'kejahatan' =>$this->input->post('Kejahatan'),
			'kamar' =>$this->input->post('Kamar'),
			'status' =>$this->input->post('Status'),
			'button' => $Button
		);
		$this->m_datawbp->update_datawbp($NoInduk,$data,'datawbp');
		$this->session->set_flashdata('message_datawbp_success', 'Selamat, update data berhasil dilakukan !');
		redirect('Data-WBP');
	}
	function DeleteDataWbp(){
		$NoInduk = $this->uri->segment(4);
		$this->m_datawbp->delete_datawbp($NoInduk);
		$this->session->set_flashdata('message_datawbp_success', 'Selamat, hapus data berhasil dilakukan !');
    redirect('Data-WBP');
  }
}
