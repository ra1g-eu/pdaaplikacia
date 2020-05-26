<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['grafy'] = 'Chart/index';

$route['studprax/(:any)'] = 'studprax/edit_studprax/$1';
$route['studprax'] = 'studprax/index';

$route['adminsys/register'] = 'User_authentication/new_user_registration';
$route['adminsys/login'] = 'User_authentication/index';
$route['adminsys/profile'] = 'User_authentication/user_login_process';
$route['adminsys/logout'] = 'User_authentication/logout';

$route['company/(:any)'] = 'company/edit_cmpn/$1';
$route['company'] = 'company/index';

$route['crp/(:any)'] = 'crp/edit_crp/$1';
$route['crp'] = 'crp/index';

$route['students/(:num)'] = 'students';
$route['students/(:any)'] = 'students/edit_student/$1';
$route['students'] = 'students/index';

$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
