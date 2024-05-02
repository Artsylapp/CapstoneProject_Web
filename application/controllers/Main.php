<?php
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

	public function home()
	{
		$this->load->view('page/include/header');
		$this->load->view('page/include/sidebar');
		$this->load->view('page/homepage');
	}

	public function accounts()
	{	
		$this->load->view('page/include/header');
		$this->load->view('page/include/sidebar');
		$this->load->view('page/accounts/hub');
	}

	public function services()
	{
		$this->load->view('page/include/header');
		$this->load->view('page/include/sidebar');
		$this->load->view('page/services/hub');
	}

	public function orders()
	{
		$this->load->view('page/include/header');
		$this->load->view('page/include/orders_side');
		$this->load->view('page/orders/hub');
	}

	public function records()
	{
		$this->load->view('page/include/header');
		$this->load->view('page/include/sidebar');
		$this->load->view('page/records/hub');
	}
}
