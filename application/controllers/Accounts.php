<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    	/* ACCOUNTS SEGMENT */
class Accounts extends CI_Controller {

			/* CONSTRUCTOR */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Account_model');
		$this->load->library('session');
	}

	// Helper function to format the contact number
	private function formatContactNumber($contact)
	{
			// Remove any non-digit characters (like spaces or hyphens)
			$contact = preg_replace('/\D/', '', $contact);

			// Check if the contact number is valid and exactly 11 digits long
			if (strlen($contact) == 11 && preg_match('/^09\d{9}$/', $contact)) {
					// Format the number like "0912 3456 789"
					return substr($contact, 0, 4) . ' ' . substr($contact, 4, 3) . ' ' . substr($contact, 7, 4);
			}
			
			return $contact; // Return the original contact number if invalid
	}

	// Accounts - load accounts hub
	public function index()
  	{
		$data = $this->Account_model->getAccounts();

		// Format the contact numbers
    foreach ($data as &$account) {
			$account->accounts_tbl_contact = $this->formatContactNumber($account->accounts_tbl_contact);
		}

		$info = array(
			'title' => 'Accounts',
			'accounts' => $data,
		);

		$this->load->view('page/include/header', $info);
		$this->load->view('page/accounts/hub');
		$this->load->view('page/include/footer');
	}

	// Accounts - redirect to account page
	public function user()
	{	
		$info = array(
			'title' => 'User',
		);

		$this->load->view('page/include/header', $info);
		$this->load->view('page/accounts/user');
		$this->load->view('page/include/footer');
	}

	// Accounts - redirect to create account page view
	public function acc_create()
	{	
		$info = array(
			'title' => 'Create Account',
		);

		$this->load->view('page/include/header', $info);
		$this->load->view('page/accounts/acc_create');
		$this->load->view('page/include/footer');
	}

	// Accounts - create account function with phone number and name validation
	public function acc_add()
	{
			// Get contact number and name from form input
			$contact = $this->input->post('create_Contact');
			$name = $this->input->post('create_Account');
			
			// Validate phone number: should start with 09 and be exactly 11 digits long
			if (!preg_match('/^09\d{9}$/', $contact)) {
					$info['error'] = 'Invalid phone number. It should start with 09 and be exactly 11 digits long.';
					
					// Load view and show error message
					$this->load->view('page/include/header', $info);
					$this->load->view('page/accounts/acc_create');
					$this->load->view('page/include/footer');
					return; // Exit function early if validation fails
			}

			// Check if an account with the same name already exists
			$existing_account = $this->Account_model->getAccountByName($name);
			
			if ($existing_account) {
					// If account with the same name exists, show error message
					$info['error'] = 'An account with this name already exists. Please choose a different name.';
					
					// Load view and show error message
					$this->load->view('page/include/header', $info);
					$this->load->view('page/accounts/acc_create');
					$this->load->view('page/include/footer');
					return; // Exit function early if validation fails
			}

			// If validation passes, create account
			$data = array(
					'accounts_tbl_name' => $name,
					'accounts_tbl_address' => $this->input->post('create_Address'),
					'accounts_tbl_contact' => $contact,
					'accounts_tbl_empType' => $this->input->post('optradio'), // 1 = Admin, 2 = Masseur radio button
					'accounts_tbl_status' => "AVAILABLE",
			);

			// Create the account in the database
			$this->Account_model->createAccount($data);

			// Redirect to accounts hub
			redirect('Accounts');
	}


	// Accounts - redirect to edit account page view
  public function acc_edit()
	{	
		$data = $this->Account_model->getAccount($this->uri->segment(3));

		$info = array(
			'title' => 'Edit Account',
			'accounts' => $data,
		);

		$this->load->view('page/include/header', $info);
		$this->load->view('page/accounts/acc_edit');
		$this->load->view('page/include/footer');
		
	}

	public function acc_update()
	{
			// Get the contact number from the form input
			$contact = $this->input->post('update_Contact');
			$accountName = $this->input->post('update_Account'); // Get the account name from the form

			// Check if the account name already exists
			if ($this->Account_model->getAccountbyName($accountName)) {
					// If the account name already exists, set error message
					$info['error'] = 'Account with this name already exists. Please choose a different name.';

					// Load the view with error message
					$data = array(
							'title' => 'Update Account',
							'accounts' => $this->Account_model->getAccount($this->uri->segment(3)),
					);
					$this->load->view('page/include/header', $data);
					$this->load->view('page/accounts/acc_edit', $info);
					$this->load->view('page/include/footer');
					
					return; // Stop further processing if account exists
			}

			// Validate phone number: should start with 09 and be exactly 11 digits long
			if (!preg_match('/^09\d{9}$/', $contact)) {
					// If invalid, set error message
					$info['error'] = 'Invalid phone number. It should start with 09 and be exactly 11 digits long.';

					// Load the view with error message
					$data = array(
							'title' => 'Update Account',
							'accounts' => $this->Account_model->getAccount($this->uri->segment(3)),
					);
					$this->load->view('page/include/header', $data);
					$this->load->view('page/accounts/acc_edit', $info);
					$this->load->view('page/include/footer');
					
					return; // Stop further processing if validation fails
			}

			// If phone number is valid, proceed to update the account
			$data = array(
					'accounts_tbl_id' => $this->uri->segment(3),
					'accounts_tbl_name' => $this->input->post('update_Account'),
					'accounts_tbl_address' => $this->input->post('update_Address'),
					'accounts_tbl_contact' => $contact,
					'accounts_tbl_empType' => $this->input->post('optradio_update'),
			);

			// Call the model to update the account with the provided data
			$this->Account_model->updateAccount($data);

			// Redirect to the Accounts hub after update
			redirect('Accounts');
	}



	// Accounts - redirect to delete account page
    public function acc_delete()
	{	
		$data = $this->Account_model->getAccount($this->uri->segment(3));
		$info = array(
			'title' => 'Delete Account',
			'accounts' => $data,
		);

		$this->load->view('page/include/header', $info);
		$this->load->view('page/accounts/acc_delete');
		$this->load->view('page/include/footer');

		// echo "<pre>";
		// print_r($data);
	}

	// Accounts - delete account function
	public function acc_remove()
	{
		$this->Account_model->deleteAccount($this->uri->segment(3));
		redirect('Accounts'); // redirect to accounts hub
	}

}
