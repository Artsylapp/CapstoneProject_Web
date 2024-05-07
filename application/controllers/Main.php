<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {

	/* CONSTRUCTOR */
	public function __construct(){
        parent::__construct();

    }

	public function index()
	{
		$info = array(
			'title' => 'Home',
		);

		$this->load->view('page/include/header', $info);
		$this->load->view('page/include/sidebar');
		$this->load->view('page/homepage');
		$this->load->view('page/include/footer');
	}

}
