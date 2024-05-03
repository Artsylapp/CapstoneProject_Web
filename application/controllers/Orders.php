<?php
class Orders extends CI_Controller {
        
        /* CONSTRUCTOR */
    public function __construct(){
        parent::__construct();

    }

    public function index() //orders home page
    {
        $this->load->view('page/include/header');
        $this->load->view('page/include/sidebar');
        $this->load->view('page/orderpage');
    }

        /* ORDERS SEGMENT */
    public function orders()
    {
        $this->load->view('page/include/header');
        $this->load->view('page/include/sidebar');
        $this->load->view('page/orders/hub');
    }
}