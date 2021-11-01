<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_SIPL extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper("file");
		$this->load->model('m_datawbp','m_user');
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
  public function Impor_DataWbp(){
		if (isset($_FILES["fileExcel"]["name"])) {
			$path = $_FILES["fileExcel"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
					$NoInduk = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$Nama = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$Kejahatan = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
          $Kamar = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
          $TglMasuk = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
          $Status = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
          $Button = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$temp_data[] = array(
						'no_induk'	=> $NoInduk,
						'nama'	=> $Nama,
						'kejahatan'	=> $Kejahatan,
            'kamar' => $Kamar,
            'tgl_masuk' => $TglMasuk,
            'status' => $Status,
            'button' => $Button
					);
				}
			}
			$insert = $this->m_datawbp->insert($temp_data);
			if($insert){
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Data Berhasil di Import ke Database');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-remove"></span> Terjadi Kesalahan');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}else{
			echo "Tidak ada file yang masuk";
		}
	}
}
