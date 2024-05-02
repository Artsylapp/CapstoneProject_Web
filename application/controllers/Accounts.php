<?php
    	/* ACCOUNTS SEGMENT */
class Accounts extends CI_Controller {

    	/* CONSTRUCTOR */
	public function __construct(){
        parent::__construct();

    }

	/* ACCOUNTS SEGMENT */
    public function index() //account home page
    {

    }

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

	public function createAccount()
	{	
		$this->load->view('page/include/header');
		$this->load->view('page/include/acc_side');
		$this->load->view('page/accounts/create_acc');
	}
}