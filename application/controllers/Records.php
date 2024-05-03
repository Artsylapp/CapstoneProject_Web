<?php
class Records extends CI_Controller {

        /* CONSTRUCTOR */
    public function __construct(){
        parent::__construct();

    }

    	/* RECORDS SEGMENT */
	public function records()
	{
		$this->load->view('page/include/header');
		$this->load->view('page/include/sidebar');
		$this->load->view('page/records/hub');
	}
}