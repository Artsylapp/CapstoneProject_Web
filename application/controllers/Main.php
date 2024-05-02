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


	/* ACCOUNTS SEGMENT */
	public function accounts()
	{	
		$this->load->view('page/include/header');
		$this->load->view('page/include/sidebar');
		$this->load->view('page/accounts/hub');
	}

	public function user()
	{	
		$this->load->view('page/include/header');
		$this->load->view('page/include/sidebar');
		$this->load->view('page/accounts/user');
	}

	public function acc_create()
	{	
		$this->load->view('page/include/header');
		$this->load->view('page/include/acc_side');
		$this->load->view('page/accounts/acc_create');
	}

	/* SERVICES SEGMENT */
	public function services()
	{
		$this->load->view('page/include/header');
		$this->load->view('page/include/sidebar');
		$this->load->view('page/services/hub');
	}

	/* ORDERS SEGMENT */
	public function orders()
	{
		$this->load->view('page/include/header');
		$this->load->view('page/include/orders_side');
		$this->load->view('page/orders/hub');
	}

	/* RECORDS SEGMENT */
	public function records()
	{
		$this->load->view('page/include/header');
		$this->load->view('page/include/sidebar');
		$this->load->view('page/records/hub');
	}
}
