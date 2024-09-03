<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['admin'] = "adminpanel/login/loginMe";
$route['404_override'] = 'error';

$route['datalowongan'] = 'karir/datalowongan';


$route['dataartikel'] = 'artikel/listArtikel';
$route['editartikel/(:num)'] = 'artikel/detail/$1';

$route['artikel/(:any)'] = 'home/getArtikel/$1';

$route['tambahKategori'] = 'artikel/saveKategori';
$route['tambahArtikel'] = 'artikel/saveArtikel';

$route['formulir'] = 'karir/formulir';
$route['datapelamar'] = 'karir/datapelamar';


$route['formulir-kunjungan'] = 'kunjunganindustri/formulir';
$route['datakunjungan'] = 'kunjunganindustri/datakunjungan';
$route['dataprodukkunjungan'] = 'kunjunganindustri/dataprodukkunjungan';
$route['info-kunjungan'] = 'kunjunganindustri/infoKunjungan';
$route['list-kunjungan'] = 'kunjunganindustri/listInfo';



$route['list-kuisioner'] = 'kuisioner';
$route['kuisioner-kunjungan'] = 'kuisioner/kuisionerKunjungan';


$route['kalenderkunjungan'] = 'kunjunganindustri/kalender';

$route['privasi'] = 'home/privasi';
$route['syaratketentuan'] = 'home/syaratKetentuan';



/*********** USER DEFINED ROUTES *******************/

$route['loginMe'] = 'adminpanel/login/loginMe';
$route['dashboard'] = 'adminpanel/user';
$route['logout'] = 'adminpanel/user/logout';

$route['userListing'] = 'adminpanel/user/userListing';
$route['userListing/(:num)'] = "adminpanel/user/userListing/$1";

$route['addNew'] = "adminpanel/user/addNew";

$route['addNewUser'] = "adminpanel/user/addNewUser";
$route['editOld'] = "adminpanel/user/editOld";
$route['editOld/(:num)'] = "adminpanel/user/editOld/$1";
$route['editUser'] = "adminpanel/user/editUser";
$route['deleteUser'] = "adminpanel/user/deleteUser";
$route['loadChangePass'] = "adminpanel/user/loadChangePass";
$route['changePassword'] = "adminpanel/user/changePassword";
$route['pageNotFound'] = "adminpanel/user/pageNotFound";
$route['checkEmailExists'] = "adminpanel/user/checkEmailExists";

$route['forgotPassword'] = "adminpanel/login/forgotPassword";
$route['resetPasswordUser'] = "adminpanel/login/resetPasswordUser";
$route['resetPasswordConfirmUser'] = "adminpanel/login/resetPasswordConfirmUser";
$route['resetPasswordConfirmUser/(:any)'] = "adminpanel/login/resetPasswordConfirmUser/$1";
$route['resetPasswordConfirmUser/(:any)/(:any)'] = "adminpanel/login/resetPasswordConfirmUser/$1/$2";
$route['createPasswordUser'] = "adminpanel/login/createPasswordUser";

/* End of file routes.php */
/* Location: ./application/config/routes.php */