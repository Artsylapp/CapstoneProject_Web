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
            'title' => 'Select Services',
            'mode' => 'create',
            'services' => $data['services'],
        );

        $this->load->view('page/include/header', $info);
        $this->load->view('page/include/transaction_side');
        $this->load->view('page/orders/orders_create');
    }

    public function orders_assign() {
        $data = $this->Account_model->getAccounts();
        $selected_services = $this->session->userdata('selected_services');
        $info = array(
            'title' => 'Select Masseur',
            'mode' => 'assign',
            'accounts' => $data,
            'selected_services' => $selected_services ? json_decode($selected_services, true) : [],
        );
    
        $this->load->view('page/include/header', $info);
        $this->load->view('page/include/transaction_side', $info); // Ensure the correct data is passed
        $this->load->view('page/orders/orders_assign', $info);
    }

    public function orders_placement()
    {
        $info = array(
            'mode' => 'place',
            'title' => 'Select Area',
            //'selected_services' => $selected_services ? json_decode($selected_services, true) : [],
            //was kinda hoping selected_services would carry over
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

    public function save_services() {
        $services = $this->input->post('services');
        $this->session->set_userdata('selected_services', $services);
        echo json_encode(['status' => 'success']);
    }

    public function assign() {
        $data['title'] = 'Assign Order';
        $data['services'] = json_decode($this->session->userdata('selected_services'), true);
    
        $this->load->view('header', $data);
        $this->load->view('transaction_side', $data);
        $this->load->view('orders_assign', $data);
        $this->load->view('footer');
    }

}