<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['home'] = 'Main';
$route['accounts'] = 'Main/accounts';
$route['services'] = 'Main/services';
$route['orders'] = 'Main/orders';
$route['records'] = 'Main/records';
$route['user'] = 'Main/user';
$route['acc_create'] = 'Main/acc_create';