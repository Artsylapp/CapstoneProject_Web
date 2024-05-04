<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['home'] = 'Main/index';

    /* Accounts Page */
$route['accounts'] = 'Accounts/index';
$route['user'] = 'Accounts/user';
$route['acc_create'] = 'Accounts/acc_create';
$route['acc_edit'] = 'Accounts/acc_edit';
$route['acc_delete'] = 'Accounts/acc_delete';

    /* Services Page */
$route['services'] = 'Services/index';
$route['ser_create'] = 'Services/ser_create';
$route['ser_edit'] = 'Services/ser_edit';
$route['ser_delete'] = 'Services/ser_delete';
$route['ser_desc'] = 'Services/ser_desc';
$route['ser_select_edit'] = 'Services/ser_select_edit';
$route['ser_select_delete'] = 'Services/ser_select_delete';
$route['ser_select_desc'] = 'Services/ser_select_desc';

    /* Orders Page */
$route['orders'] = 'Orders/index';

    /* Records Page */
$route['records'] = 'Records/index';
