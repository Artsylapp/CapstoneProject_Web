<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Services extends CI_Controller {
        
        /* CONSTRUCTOR */
    public function __construct(){
        parent::__construct();

    }

    public function index() //services home page
    {
        $this->load->view('page/include/header');
        $this->load->view('page/include/sidebar');
        $this->load->view('page/orderpage');
    }

        /* SERVICES SEGMENT */
    public function services()
    {
        $this->load->view('page/include/header');
        $this->load->view('page/include/sidebar');
        $this->load->view('page/services/hub');
    }
}