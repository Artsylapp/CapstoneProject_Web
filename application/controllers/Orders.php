<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Orders extends CI_Controller {
        
        /* CONSTRUCTOR */
    public function __construct(){
        parent::__construct();

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
        $info = array(
            'title' => 'Orders',
        );

        $this->load->view('page/include/header', $info);
        $this->load->view('page/include/transaction_side');
        $this->load->view('page/orders/orders_create');
    }

    public function orders_going()
    {
        $info = array(
            'title' => 'Orders',
        );

        $this->load->view('page/include/header', $info);
        $this->load->view('page/include/transaction_side');
        $this->load->view('page/orders/orders_create');
    }

    public function orders_cancel()
    {
        $info = array(
            'title' => 'Orders',
        );

        $this->load->view('page/include/header', $info);
        $this->load->view('page/include/transaction_side');
        $this->load->view('page/orders/orders_create');
    }

    public function orders_select()
    {
        $info = array(
            'title' => 'Orders',
        );

        $mode = $this->uri->segment(3);
		$data['selection_mode'] = $mode;

        $this->load->view('page/include/header', $data, $info);
        $this->load->view('page/include/sidebar');
        $this->load->view('page/orders/orders_select');
    }

}