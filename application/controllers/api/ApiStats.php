<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

class ApiStats extends RestController {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Company_model');
    }

    public function index_get()
    {
        $this->response([
            'error' => false,
            'message' => "Request Successful, but no data to show."
        ], 200);
    }
}