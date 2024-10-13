<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Services extends CI_Controller {
        
        /* CONSTRUCTOR */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Company_model');
        $this->load->model('Service_model');
        $this->load->library('session');
    }

    //services hub
    public function index() 
    {
        $data['services'] = $this->Service_model->getServices();

        $info = array(
            'title' => 'Services',
            'services' => $data['services'],
        );

        $this->load->view('page/include/header', $info);
        $this->load->view('page/services/hub');
        $this->load->view('page/include/footer');
    }

    //services - create service page
    public function ser_create() 
    {
        $info = array(
            'title' => 'Create Service',
        );

        $this->load->view('page/include/header', $info);
        $this->load->view('page/services/ser_create');
        $this->load->view('page/include/footer');
    }

    //services - add service function
    public function ser_add() 
    {
        $data = array(
            'services_tbl_name' => $this->input->post('create_Customer'),
            'services_tbl_description' => $this->input->post('create_Description'),
            'services_tbl_price' => $this->input->post('create_Price'),
            'services_tbl_designation' => $this->input->post('optradio'),
        );

        $this->Service_model->createService($data);
        redirect('Services');
    }

    //services - edit service page
    public function ser_edit() 
    {   
        $data = $this->Service_model->getService($this->uri->segment(3));

        $info = array(
            'title' => 'Edit Service',
            'services' => $data,
        );

        $this->load->view('page/include/header', $info);
        $this->load->view('page/services/ser_edit');
        $this->load->view('page/include/footer');
    }

    // services - update service function
    public function ser_update()
    {
        $data = array(
            // 'services_tbl_id' => $this->uri->segment(3),
            'services_tbl_name' => $this->input->post('edit_Customer'),
            'services_tbl_description' => $this->input->post('edit_Description'),
            'services_tbl_price' => $this->input->post('edit_Price')
        );

        $this->Service_model->updateService($data, $this->uri->segment(3));
        redirect('Services');
    }

    // services - delete service page
    public function ser_delete() //services - delete service
    {   
        $data = $this->Service_model->getService($this->uri->segment(3));

        $info = array(
            'title' => 'Delete Service',
            'services' => $data,
        );

        $this->load->view('page/include/header', $info);
        $this->load->view('page/services/ser_delete');
        $this->load->view('page/include/footer');        
    }

    // services - remove service function
    public function ser_remove()
    {   
        $this->Service_model->deleteService($this->uri->segment(3));
        redirect($this->config->base_url("services"));
    }

}