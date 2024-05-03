<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


    /* Accounts Page */
$route['accounts'] = 'Accounts/index';
$route['user'] = 'Accounts/user';
$route['create_acc'] = 'Accounts/createAccount';


    /* Services Page */
$route['services'] = 'Services/index';


    /* Orders Page */
$route['orders'] = 'Orders/index';


    /* Records Page */
$route['records'] = 'Records/index';
