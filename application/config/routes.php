<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  /* Other Utilities */
$route['default_controller'] = 'Main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

  /* Main Home Page */
$route['home'] = 'Main/index';
$route['manage_hub'] = 'Main/manage_hub';
$route['login'] = 'Main/login_page';
$route['loginAuth'] = 'Main/login_auth';


    /* Accounts Page */
$route['accounts'] = 'Accounts/index';
$route['user'] = 'Accounts/user';
$route['acc_create'] = 'Accounts/acc_create';
$route['acc_edit'] = 'Accounts/acc_edit';
$route['acc_delete'] = 'Accounts/acc_delete';

$route['acc_add']['POST'] = 'Accounts/acc_add';
$route['acc_update']['POST'] = 'Accounts/acc_update';
$route['acc_remove'] = 'Accounts/acc_remove';


    /* Services Page */
$route['services'] = 'Services/index';
$route['ser_create'] = 'Services/ser_create';
$route['ser_edit'] = 'Services/ser_edit';
$route['ser_delete'] = 'Services/ser_delete';
$route['ser_desc'] = 'Services/ser_desc';

$route['ser_add']['POST'] = 'Services/ser_add';
$route['ser_update']['POST'] = 'Services/ser_update';
$route['ser_remove'] = 'Services/ser_remove';


    /* Orders Page */
$route['orders'] = 'Orders/index';
$route['orders_create'] = 'Orders/orders_create';
$route['orders_assign'] = 'Orders/orders_assign';
$route['orders_placement'] = 'Orders/orders_placement';
$route['orders_going'] = 'Orders/orders_going';
$route['orders_cancel'] = 'Orders/orders_cancel';


    /* Records Page */
$route['records'] = 'Records/index';

