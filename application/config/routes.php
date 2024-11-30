<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['locations'] = 'Locations/index';
$route['loc_create'] = 'Locations/loc_create';
$route['loc_edit'] = 'Locations/loc_edit';
$route['loc_delete'] = 'Locations/acc_delete';

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
$route['ser_archived'] = 'Services/ser_archived';
$route['ser_create'] = 'Services/ser_create';
$route['ser_edit'] = 'Services/ser_edit';
$route['ser_delete'] = 'Services/ser_delete';
$route['ser_desc'] = 'Services/ser_desc';
$route['ser_add']['POST'] = 'Services/ser_add';
$route['ser_update']['POST'] = 'Services/ser_update';
$route['ser_remove'] = 'Services/ser_remove';

/* Booking page Page */
$route['booking'] = 'Orders/index';

$route['booking/create'] = 'Orders/orders_create'; //redirects to page/orders/orders_create
$route['booking/view/(:num)'] = 'Orders/orders_view/$1';
$route['booking/cancel/(:num)'] = 'Orders/orders_cancel/$1';
$route['booking/cancel_booking/(:num)'] = 'Orders/cancel_booking/$1';

// $route['booking/assign'] = 'Orders/orders_assign';
$route['orders_assign'] = 'Orders/orders_assign'; //redirects to page/orders/orders_assign

// $route['booking/placement'] = 'Orders/orders_placement';
$route['orders_placement'] = 'Orders/orders_placement';  //redirects to page/orders/orders_placement

// $route['booking/finalize'] = 'Orders/orders_finalize';
$route['orders_finalize'] = 'Orders/orders_finalize';  //redirects to page/orders/orders_finalize


$route['booking/save'] = 'Orders/save_booking';
$route['booking/MPayment/(:num)'] = 'Orders/manualpayment/$1';
$route['booking/ongoing'] = 'Orders/orders_going';


/* Records Page */
$route['records'] = 'Records/index';
$route['records/view/(:num)'] = 'Records/records_view/$1';
$route['records/pdf'] = 'Records/recordsToPDF';

/* Analytics Page */
$route['analytics'] = 'Analytics/index';
$route['getYearData'] = 'Analytics/getYearAnalytics';
$route['getRevenueData'] = 'Analytics/getRevenueAnalytics';
$route['getAnalyticsData'] = 'Analytics/getAnalyticsData';


/* Mobile REST API */
$route['api/login'] = 'api/ApiAuth/index';
// $route['api/order'] = 'api/ApiOrder/index';
$route['api/order/edit/(:num)'] = 'api/ApiOrder/orderEdit/$1';
$route['api/order/update'] = 'api/ApiOrder/orderUpdate';
$route['api/order/delete'] = 'api/ApiOrder/orderDelete';
$route['api/order/updatestatus'] = 'api/ApiOrder/orderUpdateStatus';
$route['api/order/ongoing'] = 'api/ApiOrder/index';//
$route['api/order/completed'] = 'api/ApiOrder/orderCompleted';
$route['api/order/finished'] = 'api/ApiOrder/orderFinished';
$route['api/order/update'] = 'api/ApiOrder/orderUpdate';


/* Mobile webview */
$route['mobile/payemnt'] = 'mobile/Payment/index';
$route['mobile/scanner'] = 'mobile/MoneyRecognition/upload_money_image';