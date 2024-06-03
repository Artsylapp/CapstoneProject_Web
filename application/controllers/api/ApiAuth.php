<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
use chriskacerguis\RestServer\RestController;

class ApiAuth extends RestController {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Company_model');
    }

    // To authenticate user from the Android App
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

        if ($auth == true && $auth[0]->company_tbl_pass == $comp_pass && $auth[0]->company_tbl_name == $comp_name) {
            $loginData = [
                'error' => false,
                'message' => 'Login Successful',
                'user' => [
                    'username' => $auth[0]->company_tbl_name,
                    'password' => $auth[0]->company_tbl_pass,
                ]
            ];
            $this->response($loginData, 200);
            
        } else {
            $this->response([
                'error' => true,
                'message' => "Invalid Name or Password"
            ], 401);

        }
    }


}