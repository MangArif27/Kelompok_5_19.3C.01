<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/C_Page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'C_Admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Route C_Page
$route['Dashboard'] = 'C_Admin';
$route['Login'] = 'C_Admin/Login';
$route['Registrasi'] = 'C_Admin/Registrasi';
$route['Data-Pengguna'] = 'C_Page/DataPengguna';
$route['Data-WBP'] = 'C_Page/DataWBP';
$route['Histori-Pendaftaran'] = 'C_Page/HistoriPendafataran';
$route['Counter-Cetak-Tiket'] = 'C_Page/CetakTiket';
$route['Layanan-Pendaftaran'] = 'C_Page/LayananPendaftaran';
$route['Profile'] = 'C_Page/Profile';
$route['Tentang-Aplikasi'] = 'C_Page/About';

//Route Proses
$route['Proses/Login'] = 'C_Admin/ProsesLogin';
$route['Proses/Registrasi'] = 'C_Admin/ProsesRegistrasi';
$route['Proses/Logout'] = 'C_Admin/Logout';

$route['Proses/Update/Pengguna/'.$this->uri->segment(4)] = 'C_Admin/ProsesUpdate/'.$this->uri->segment(4);
$route['Proses/Update/Data-WBP/'.$this->uri->segment(4)] = 'C_DataWbp/ProsesUpdate/'.$this->uri->segment(4);

$route['Proses/Tambah/Pengguna'] = 'C_Admin/ProsesTambahPengguna';
$route['Proses/Tambah/Pendaftaran'] = 'C_Layanan/InsertPendaftaran';
$route['Proses/Import/Data-Wbp'] = 'C_DataWbp/Import_DataWbp';


$route['Proses/Delete/Pengguna/'.$this->uri->segment(4)] = 'C_Admin/DeletePengguna/'.$this->uri->segment(4);
$route['Proses/Delete/Data-WBP/'.$this->uri->segment(4)] = 'C_DataWbp/DeleteDataWbp/'.$this->uri->segment(4);
