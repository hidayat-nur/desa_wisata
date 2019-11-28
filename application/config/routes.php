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
|	$route['404_override'] = 'errors/page_missing';
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

$route['default_controller'] = "frontend_home";
$route['404_override'] = 'error_404';
$route['translate_uri_dashes'] = FALSE;

// frontend
$route['destinasiDetails/(:num)'] = "frontend_home/destinasiDetails/$1";
$route['destinasi/(:num)'] = "frontend_home/index/$1";
$route['ruangInfoDetails/(:num)'] = "frontend_home/ruangInfoDetails/$1";

/*********** USER DEFINED ROUTES *******************/
$route['admin'] = 'login';

$route['loginMe'] = 'login/loginMe';
$route['dashboard'] = 'user';
$route['logout'] = 'user/logout';

$route['userListing'] = 'user/userListing';
$route['userListing/(:num)'] = "user/userListing/$1";

$route['daftarDestinasi'] = 'destinasi/daftarDestinasi';
$route['tambahDestinasi'] = "destinasi/tambahDestinasi";
$route['tambahDestinasiProses'] = "destinasi/tambahDestinasiProses";
$route['editDestinasi/(:num)'] = "destinasi/editDestinasi/$1";
$route['editDestinasiProses/(:num)'] = "destinasi/editDestinasiProses/$1";
$route['hapusDestinasi/(:num)'] = "destinasi/hapusDestinasi/$1";
// $route['userListing/(:num)'] = "user/userListing/$1";

$route['daftarEvents'] = 'event/daftarEvents';
$route['tambahEvent'] = "event/tambahEvent";
$route['tambahEventProses'] = "event/tambahEventProses";
$route['editEvent/(:num)'] = "event/editEvent/$1";
$route['editEventProses/(:num)'] = "event/editEventProses/$1";
$route['hapusEvent/(:num)'] = "event/hapusEvent/$1";

$route['daftarRuangInfo'] = 'ruangInfo/daftarRuangInfo';
$route['editRuangInfo/(:num)'] = "ruangInfo/editRuangInfo/$1";
$route['editRuangInfoProses/(:num)'] = "ruangInfo/editRuangInfoProses/$1";

$route['daftarUlasan'] = 'ulasan/daftarUlasan';
$route['tambahUlasan'] = "ulasan/tambahUlasan";
$route['tambahUlasanProses'] = "ulasan/tambahUlasanProses";
$route['editUlasan/(:num)'] = "ulasan/editUlasan/$1";
$route['editUlasanProses/(:num)'] = "ulasan/editUlasanProses/$1";
$route['hapusUlasan/(:num)'] = "ulasan/hapusUlasan/$1";

$route['addNew'] = "user/addNew";
$route['addNewUser'] = "user/addNewUser";
$route['editOld'] = "user/editOld";
$route['editOld/(:num)'] = "user/editOld/$1";
$route['editUser'] = "user/editUser";
$route['deleteUser'] = "user/deleteUser";
$route['profile'] = "user/profile";
$route['profile/(:any)'] = "user/profile/$1";
$route['profileUpdate'] = "user/profileUpdate";
$route['profileUpdate/(:any)'] = "user/profileUpdate/$1";

$route['loadChangePass'] = "user/loadChangePass";
$route['changePassword'] = "user/changePassword";
$route['changePassword/(:any)'] = "user/changePassword/$1";
$route['pageNotFound'] = "user/pageNotFound";
$route['checkEmailExists'] = "user/checkEmailExists";
$route['login-history'] = "user/loginHistoy";
$route['login-history/(:num)'] = "user/loginHistoy/$1";
$route['login-history/(:num)/(:num)'] = "user/loginHistoy/$1/$2";

$route['forgotPassword'] = "login/forgotPassword";
$route['resetPasswordUser'] = "login/resetPasswordUser";
$route['resetPasswordConfirmUser'] = "login/resetPasswordConfirmUser";
$route['resetPasswordConfirmUser/(:any)'] = "login/resetPasswordConfirmUser/$1";
$route['resetPasswordConfirmUser/(:any)/(:any)'] = "login/resetPasswordConfirmUser/$1/$2";
$route['createPasswordUser'] = "login/createPasswordUser";

/* End of file routes.php */
/* Location: ./application/config/routes.php */
