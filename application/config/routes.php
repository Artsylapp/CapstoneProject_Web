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
$route['temporary'] = 'Main/temporary';

  /*Locations Page */
$route['locations'] = 'locations/index';
$route['loc_create'] = 'locations/loc_create';
$route['loc_edit'] = 'locations/loc_edit';
$route['loc_delete'] = 'locations/acc_delete';

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

/* Booking page Page */
$route['booking/cancel/(:num)'] = 'Orders/cancel_booking/$1';
$route['booking/save'] = 'Orders/save_booking';


    /* Records Page */
$route['records'] = 'Records/index';


  /* REST API */
// $route['api/auth'] = 'api/ApiAuth/index';
$route['api/login'] = 'api/ApiAuth/index';

$route['api/order'] = 'api/ApiOrder/index';
$route['api/order/edit/(:num)'] = 'api/ApiOrder/orderEdit/$1';
$route['api/order/update'] = 'api/ApiOrder/orderUpdate';
$route['api/order/delete'] = 'api/ApiOrder/orderDelete';
$route['api/order/updatestatus'] = 'api/ApiOrder/orderUpdateStatus';
$route['api/order/ongoing'] = 'api/ApiOrder/orderOngoing';
$route['api/order/completed'] = 'api/ApiOrder/orderCompleted';



$route['api/account'] = 'api/ApiAccounts/index';
$route['api/account/add'] = 'api/ApiAccounts/insertUser';
$route['api/account/edit/(:num)'] = 'api/ApiAccounts/editUser/$1';
$route['api/account/update/(:num)'] = 'api/ApiAccounts/updateUser/$1';
$route['api/account/delete/(:num)'] = 'api/ApiAccounts/deleteUser/$1';