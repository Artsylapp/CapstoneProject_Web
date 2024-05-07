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


}