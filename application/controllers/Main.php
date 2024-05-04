<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {

	/* CONSTRUCTOR */
	public function __construct(){
        parent::__construct();

    }

	public function index()
	{
		$this->load->view('page/include/header');
		$this->load->view('page/include/sidebar');
		$this->load->view('page/homepage');
	}

	public function home() //main home page
	{
		$this->load->view('page/include/header');
		$this->load->view('page/include/sidebar');
		$this->load->view('page/homepage');
	}
}
