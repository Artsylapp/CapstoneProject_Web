<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Records extends CI_Controller {

        /* CONSTRUCTOR */
    public function __construct(){
        parent::__construct();

    }

	public function index()
	{
		$info = array(
			'title' => 'Records',
		);

		$this->load->view('page/include/header', $info);
		$this->load->view('page/include/sidebar');
		$this->load->view('page/records/hub');
	}
}