<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  /* Other Utilities */
$route['default_controller'] = 'Main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

  /* Main Home Page */
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
$route['ser_add']['GET'] = 'Services/ser_add';
$route['ser_edit'] = 'Services/ser_edit';
$route['ser_delete'] = 'Services/ser_delete';
$route['ser_desc']['POST'] = 'Services/ser_desc';


    /* Orders Page */
$route['orders'] = 'Orders/index';
$route['orders_create'] = 'Orders/orders_create';
$route['orders_assign'] = 'Orders/orders_assign';
$route['orders_placement'] = 'Orders/orders_placement';
$route['orders_going'] = 'Orders/orders_going';
$route['orders_cancel'] = 'Orders/orders_cancel';


    /* Records Page */
$route['records'] = 'Records/index';

