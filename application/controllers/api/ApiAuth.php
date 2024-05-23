<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
use chriskacerguis\RestServer\RestController;

class ApiAuth extends RestController {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Account_model');
        $this->load->model('Company_model');
    }

    public function index_post() {
        $comp_name = $this->post('username');
        $comp_pass = $this->post('password');
    
        // Validate input
        if (empty($comp_name) || empty($comp_pass)) {
            $this->response([
                'error' => true,
                'message' => "Username and password are required"
            ], 400);
            return;
        }
    
        // Authenticate user
        $auth = $this->Company_model->getCompany($comp_name, $comp_pass);
    
        if ($auth == FALSE) {
            $this->response([
                'error' => true,
                'message' => "Invalid Name or Password"
            ], 401);
        } else {
            $loginData = [
                'error' => false,
                'message' => 'Login Successful!',
                'user' => [
                    'username' => $auth[0]->company_tbl_name,
                    'password' => $auth[0]->company_tbl_pass,
                ]
            ];
            $this->response($loginData, 200);
        }
    }

<<<<<<< HEAD
    // other api functions
=======
>>>>>>> dcc885a5a2d7e8a35fa8c754749d6c4361b6306a

}