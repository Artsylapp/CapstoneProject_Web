<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {

	/* CONSTRUCTOR */
	public function __construct(){
        parent::__construct();
		$this->load->model('Company_model');
		$this->load->library('session');
    }

	public function index()
	{
		$info = array(
			'title' => 'Home',
		);

		$this->load->view('page/include/header', $info);
		$this->load->view('page/include/sidebar');
		$this->load->view('page/homepage');
		$this->load->view('page/include/footer');
	}

	public function login_page(){

		if($this->session->has_userdata('logged_in') == TRUE){
			redirect('main');
		}

		$info = array(
			'title' => 'Login',
		);

		$this->load->view('page/login_page', $info);

	}

	public function login_auth() {
		$info = array(
			'title' => 'LoginAuth',
		);
	
		// Adjust validation rules
		$this->form_validation->set_rules('com_u', 'Company Name', 'trim|required');
		$this->form_validation->set_rules('com_p', 'Password', 'trim|required');
	
		if ($this->form_validation->run() == FALSE) {
			// log_message('debug', 'Validation failed: ' . validation_errors());
			$this->session->set_flashdata('error', TRUE);
			// $this->session->set_flashdata('invalid', 'Validation Error: ' . validation_errors());
			$this->session->set_flashdata('invalid',validation_errors());
			redirect('main/login_page');
			return;
		}
	
		$user = $this->input->post('com_u');
		$pass = $this->input->post('com_p');
	
		// Ensure getCompanyWeb method returns results
		$auth = $this->Company_model->getCompanyWeb($user);
		if ($auth == FALSE) {
			// log_message('debug', 'Authentication failed: Invalid Username');
			$this->session->set_flashdata('error', TRUE);
			$this->session->set_flashdata('invalid', 'Invalid Username or Password');
			redirect('main/login_page');
		} else {
			// Assuming company_tbl_name is the username and company_tbl_pass is the password
			$authUser = $auth[0]->company_tbl_name;
			$authPass = $auth[0]->company_tbl_pass;
	
			// Debugging: Log retrieved data
			// log_message('debug', 'Retrieved Username: ' . $authUser);
			// log_message('debug', 'Retrieved Password: ' . $authPass);
	
			// Compare usernames and verify password
			if ($user === $authUser && $pass === $authPass) {
				$companyData = [
					'comp_Id' => $auth[0]->company_tbl_id,
					'comp_Name' => $auth[0]->company_tbl_name,
				];
	
				$this->session->set_userdata('logged_in', true);
				$this->session->set_userdata($companyData);
				$this->session->set_flashdata('status', 'Login Successful');
				
				// log_message('debug', 'Authentication successful: User logged in');
				redirect("main");
			} else {
				log_message('debug', 'Authentication failed: Invalid Password');
				$this->session->set_flashdata('error', TRUE);
				$this->session->set_flashdata('invalid', 'Invalid Username or Password');
				redirect('main/login_page');
			}
		}
	}
	
	
	
	
	
	
	

	public function logout(){

        $this->session->sess_destroy();
		redirect('main/login_page');

	}

	public function manage_hub(){

		$info = array(
			'title' => 'Home',
		);

		$this->load->view('page/include/header', $info);
		$this->load->view('page/include/sidebar');
		$this->load->view('page/manage_hub');
		$this->load->view('page/include/footer');

	}

	public function temporary(){
		
		$info = array(
			'title' => 'temporary',
		);

		$this->load->view('page/include/header', $info);
		$this->load->view('page/include/sidebar');
		$this->load->view('page/temp_page');
		$this->load->view('page/include/footer');

	}

}
