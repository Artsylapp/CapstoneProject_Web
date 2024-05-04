<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Services extends CI_Controller {
        
        /* CONSTRUCTOR */
    public function __construct(){
        parent::__construct();

    }

    public function index() //services hub
    {
        $this->load->view('page/include/header');
        $this->load->view('page/include/sidebar');
        $this->load->view('page/services/hub');
    }

    public function ser_create() //services - create service
    {
        $this->load->view('page/include/header');
        $this->load->view('page/include/sidebar');
        $this->load->view('page/services/ser_create');
    }

    public function ser_edit() //services - edit service
    {
        $this->load->view('page/include/header');
        $this->load->view('page/include/sidebar');
        $this->load->view('page/services/ser_edit');
    }

    public function ser_delete() //services - delete service
    {
        $this->load->view('page/include/header');
        $this->load->view('page/include/sidebar');
        $this->load->view('page/services/ser_delete');
    }

    public function ser_desc() //services - display service
    {
        $this->load->view('page/include/header');
        $this->load->view('page/include/sidebar');
        $this->load->view('page/services/ser_desc');
    }

    public function ser_select_edit() //services - select edit
    {
        $this->load->view('page/include/header');
        $this->load->view('page/include/sidebar');
        $this->load->view('page/services/ser_select_edit');
    }

    public function ser_select_delete() //services - select delete
    {
        $this->load->view('page/include/header');
        $this->load->view('page/include/sidebar');
        $this->load->view('page/services/ser_select_delete');
    }

    public function ser_select_desc() //services - select desc
    {
        $this->load->view('page/include/header');
        $this->load->view('page/include/sidebar');
        $this->load->view('page/services/ser_select_desc');
    }
}