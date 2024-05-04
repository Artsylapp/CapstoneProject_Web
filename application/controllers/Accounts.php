<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    	/* ACCOUNTS SEGMENT */
class Accounts extends CI_Controller {

			/* CONSTRUCTOR */
		public function __construct()
	{
		parent::__construct();
	}

	public function index()
  	{
		$info = array(
			'title' => 'Accounts',
		);

		$this->load->view('page/include/header', $info);
		$this->load->view('page/include/sidebar');
		$this->load->view('page/accounts/hub');
	}

	public function user()
	{	
		$info = array(
			'title' => 'User',
		);

		$this->load->view('page/include/header', $info);
		$this->load->view('page/include/sidebar');
		$this->load->view('page/accounts/user');
	}

	public function acc_create()
	{	
		$info = array(
			'title' => 'Create Account',
		);

		$this->load->view('page/include/header', $info);
		$this->load->view('page/include/acc_side');
		$this->load->view('page/accounts/acc_create');
	}

    public function acc_edit()
	{	
		$info = array(
			'title' => 'Edit Account',
		);

		$this->load->view('page/include/header', $info);
		$this->load->view('page/include/acc_side');
		$this->load->view('page/accounts/acc_edit');
	}

    public function acc_delete()
	{	
		$info = array(
			'title' => 'Delete Account',
		);

		$this->load->view('page/include/header', $info);
		$this->load->view('page/include/acc_delete');
		$this->load->view('page/accounts/acc_delete');
	}

	public function acc_select()
	{	
		$mode = $this->uri->segment(3);
		
		$info = array(
			'title' => 'Select Account',
		);
		
		$this->load->view('page/include/header', $info);
		$this->load->view('page/include/sidebar');
		$this->load->view('page/accounts/acc_select');
	}

}
