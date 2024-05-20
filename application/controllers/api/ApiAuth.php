<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
use chriskacerguis\RestServer\RestController;

class ApiAuth extends RestController{

    public function __construct(){
        parent::__construct();
        $this->load->model('Account_model');
    }

    public function index(){
        $data = [
            'company_tbl_name' => $this->post('accounts_name'),
            'company_tbl_pass' => $this->post('accounts_pass'),
        ];
        $this->response($data, 200);
    }

    public function loginauth_post(){
        $login = [
            'company_tbl_name' => $this->post('login_name'),
            'company_tbl_pass' => $this->post('login_password'),
        ];
        $this->response($login, 200);

        $data = $this->Account_model->loginAuth($login);
    }
}