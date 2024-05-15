<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Orders extends CI_Controller {
        
        /* CONSTRUCTOR */
    public function __construct(){
        parent::__construct();
        $this->load->model('Company_model');
        $this->load->model('Service_model');
        $this->load->model('Account_model');
        $this->load->library('session');
    }

    public function index()
    {
        $info = array(
            'title' => 'Orders',
        );

        $this->load->view('page/include/header', $info);
        $this->load->view('page/include/sidebar');
        $this->load->view('page/orders/hub');
        $this->load->view('page/include/footer');
    }

    public function orders_create()
    {
        $data['services'] = $this->Service_model->getServices();

        $info = array(
            'title' => 'Edit Services',
            'services' => $data['services'],
        );

        $this->load->view('page/include/header', $info);
        $this->load->view('page/include/transaction_side');
        $this->load->view('page/orders/orders_create');
    }

    public function orders_assign()
    {
        $data = $this->Account_model->getAccounts();
		$info = array(
			'title' => 'Select Account',
			'accounts' => $data,
		);

        $this->load->view('page/include/header', $info);
        $this->load->view('page/include/transaction_side');
        $this->load->view('page/orders/orders_assign');
        $this->load->library('session');
    }

    public function orders_placement()
    {
        $info = array(
            'title' => 'Orders',
        );

        $this->load->view('page/include/header', $info);
        $this->load->view('page/include/transaction_side');
        $this->load->view('page/orders/orders_placement');
    }

    public function orders_going()
    {
        $info = array(
            'title' => 'Orders',
        );

        $this->load->view('page/include/header', $info);
        $this->load->view('page/orders/orders_going');
    }

    public function orders_cancel()
    {
        $info = array(
            'title' => 'Orders',
        );

        $this->load->view('page/include/header', $info);
        $this->load->view('page/orders/orders_cancel');
    }

}