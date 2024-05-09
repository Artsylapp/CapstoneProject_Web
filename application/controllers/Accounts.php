<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    	/* ACCOUNTS SEGMENT */
class Accounts extends CI_Controller {

			/* CONSTRUCTOR */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Account_model');
	}

	public function index()
  	{
		$info = array(
			'title' => 'Accounts',
		);

		$this->load->view('page/include/header', $info);
		$this->load->view('page/include/sidebar');
		$this->load->view('page/accounts/hub');
		$this->load->view('page/include/footer');
	}

	public function user()
	{	
		$info = array(
			'title' => 'User',
		);

		$this->load->view('page/include/header', $info);
		$this->load->view('page/include/sidebar');
		$this->load->view('page/accounts/user');
		$this->load->view('page/include/footer');
	}

	public function acc_create()
	{	
		$info = array(
			'title' => 'Create Account',
		);

		$this->load->view('page/include/header', $info);
		$this->load->view('page/include/acc_side');
		$this->load->view('page/accounts/acc_create');
		$this->load->view('page/include/footer');
	}

	public function acc_add(){

		
		$data = array(
			'accounts_tbl_name' => $this->input->post('create_Account'),
			'accounts_tbl_address' => $this->input->post('create_Address'),
			'accounts_tbl_contact' => $this->input->post('create_Contact'),
			// 'accounts_tbl_type' => $this->input->post('optradio') // 1 = Admin, 2 = Masseur radio button
        );

		$this->Account_model->createAccount($data);
		redirect('Accounts'); // redirect to accounts hub
		// print_r($_POST);
	}

    public function acc_edit()
	{	
		$data = $this->Account_model->getAccount($this->uri->segment(3));

		$info = array(
			'title' => 'Edit Account',
			'accounts' => $data,
		);

		$this->load->view('page/include/header', $info);
		$this->load->view('page/include/acc_side');
		$this->load->view('page/accounts/acc_edit');
		$this->load->view('page/include/footer');

		// echo "<pre>";
		// print_r($data);
		
	}

	public function acc_update()
	{
		$data = array(
			'accounts_tbl_id' => $this->uri->segment(3),
			'accounts_tbl_name' => $this->input->post('update_Account'),
			'accounts_tbl_address' => $this->input->post('update_Address'),
			'accounts_tbl_contact' => $this->input->post('update_Contact'),
			// 'accounts_tbl_type' => $this->input->post('optradio') // 1 = Admin, 2 = Masseur radio button
		);

		$this->Account_model->updateAccount($data);
		redirect('Accounts'); // redirect to accounts hub
		// print_r($data);

	}

    public function acc_delete()
	{	
		$data = $this->Account_model->getAccount($this->uri->segment(3));
		$info = array(
			'title' => 'Delete Account',
			'accounts' => $data,
		);

		$this->load->view('page/include/header', $info);
		$this->load->view('page/include/acc_delete');
		$this->load->view('page/accounts/acc_delete');
		$this->load->view('page/include/footer');

		// echo "<pre>";
		// print_r($data);
	}

	public function acc_remove()
	{
		$this->Account_model->deleteAccount($this->uri->segment(3));
		redirect('Accounts'); // redirect to accounts hub
	}

	public function acc_select()
	{
		$data = $this->Account_model->getAccounts();
		$info = array(
			'title' => 'Select Account',
			'selection_mode' => $this->uri->segment(3),
			'accounts' => $data,
		);
		
		$this->load->view('page/include/header', $info);
		$this->load->view('page/include/sidebar');
		$this->load->view('page/accounts/acc_select');
		$this->load->view('page/include/footer');
	}

}
