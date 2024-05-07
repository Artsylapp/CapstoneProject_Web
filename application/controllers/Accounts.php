	<?php
			/* ACCOUNTS SEGMENT */
	class Accounts extends CI_Controller {

    	/* CONSTRUCTOR */
		public function __construct()
	{
		parent::__construct();
	}

	public function index(){

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

    public function acc_edit()
	{	
		$this->load->view('page/include/header');
		$this->load->view('page/include/acc_side');
		$this->load->view('page/accounts/acc_edit');
	}

    public function acc_delete()
	{	
		$this->load->view('page/include/header');
		$this->load->view('page/include/acc_delete');
		$this->load->view('page/accounts/acc_delete');
	}

	public function acc_select()
	{	
		$mode = $this->uri->segment(3);
		$data['selection_mode'] = $mode;
		
		$this->load->view('page/include/header',$data);
		$this->load->view('page/include/sidebar');
		$this->load->view('page/accounts/acc_select');
	}

}
