<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Services extends CI_Controller {
        
        /* CONSTRUCTOR */
    public function __construct(){
        parent::__construct();
        $this->load->model('Service_model');
    }

    public function index() //services hub
    {
        $info = array(
            'title' => 'Services',
        );

        $this->load->view('page/include/header', $info);
        $this->load->view('page/include/sidebar');
        $this->load->view('page/services/hub');
        $this->load->view('page/include/footer');
    }

    public function ser_create() //services - create service
    {
        $info = array(
            'title' => 'Creating Services',
        );


        $this->load->view('page/include/header', $info);
        $this->load->view('page/include/sidebar');
        $this->load->view('page/services/ser_create');
        $this->load->view('page/include/footer');
    }

    public function ser_add() //services - add service
    {
        $data = array(
            'name' => $this->input->post('create_Customer'),
            'description' => $this->input->post('create_Description'),
            'price' => $this->input->post('create_Price')
        );

        $this->Service_model->createService($data);
        // print_r($data);
        // redirect('Services/ser_create'); // or redirect('Services');
    }

    public function ser_edit() //services - edit service
    {
        $info = array(
            'title' => 'Edit Services',
        );


        $this->load->view('page/include/header',$info);
        $this->load->view('page/include/sidebar');
        $this->load->view('page/services/ser_edit');
        $this->load->view('page/include/footer');
    }

    public function ser_delete() //services - delete service
    {
        $info = array(
            'title' => 'Deleting Services',
        );


        $this->load->view('page/include/header',$data ,$info);
        $this->load->view('page/include/sidebar');
        $this->load->view('page/services/ser_delete');
        $this->load->view('page/include/footer');
    }

    public function ser_desc() //services - display service
    {
        $info = array(
            'title' => 'View Description',
        );


        $this->load->view('page/include/header',$data ,$info);
        $this->load->view('page/include/sidebar');
        $this->load->view('page/services/ser_desc');
        $this->load->view('page/include/footer');
    }

    public function ser_select() //services - selection page
    {
        $mode = $this->uri->segment(3);
        $info = array(
            'title' => 'Edit Services',
            'selection_mode' => 'edit',
        );

        

        $this->load->view('page/include/header',$data ,$info);
        $this->load->view('page/include/sidebar');
        $this->load->view('page/services/ser_select');
        $this->load->view('page/include/footer');
    }

    public function ser_select_delete() //services - select delete
    {   
        $info = array(
            'title' => 'Delete Services',
        );

        $this->load->view('page/include/header', $info);
        $this->load->view('page/include/sidebar');
        $this->load->view('page/services/ser_select_delete');
        $this->load->view('page/include/footer');
    }

    public function ser_select_desc() //services - select desc
    {
        $info = array(
            'title' => 'Services Description',
        ); 
        $this->load->view('page/include/header', $info);
        $this->load->view('page/include/sidebar');
        $this->load->view('page/services/ser_select_desc');
        $this->load->view('page/include/footer');
    }
}