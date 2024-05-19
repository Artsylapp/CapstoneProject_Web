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
		$this->load->library('session');
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
	
		$user = $this->input->post('com_u');
		$pass = $this->input->post('com_p');
	
		$auth = $this->Company_model->getCompany($user, $pass);
	
		if ($auth == FALSE) {
			$this->session->set_flashdata('error', TRUE);
			redirect('main/login_page');
		} else {
			$companyData = [
				'comp_Id' => $auth[0]->company_tbl_id,
				'comp_Name' => $auth[0]->company_tbl_name,
			];
			
			$this->session->logged_in = true;
			$this->session->set_userdata($companyData);

			redirect("main");
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

}
