<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analytics extends CI_Controller{

    public function __construct()
	{
		parent::__construct();
		$this->load->model('Analytics_model');
		$this->load->library('session');
	}
    
    public function index(){

		$info = array(
			'title' => 'Analytics',
		);

		$this->load->view('page/include/header', $info);
		$this->load->view('page/analytics');
		$this->load->view('page/include/footer');
    }

	public function getAnalytics(){
		$data = $this->Analytics_model->getAnalytics();
		echo json_encode($data);

		// debug
		// echo"<pre>";
		// print_r($data);
		// echo"<pre>";
	}

}