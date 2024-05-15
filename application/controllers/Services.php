<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Services extends CI_Controller {
        
        /* CONSTRUCTOR */
    public function __construct(){
        parent::__construct();
        $this->load->model('Company_model');
        $this->load->model('Service_model');
        $this->load->library('session');
    }

    public function index() //services hub
    {
        $data['services'] = $this->Service_model->getServices();

        $info = array(
            'title' => 'Edit Services',
            'services' => $data['services'],
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
            'services_tbl_name' => $this->input->post('create_Customer'),
            'services_tbl_description' => $this->input->post('create_Description'),
            'services_tbl_price' => $this->input->post('create_Price')
        );

        $this->Service_model->createService($data);
        redirect('Services'); // redirect to services hub
        // print_r($data);
    }


    public function ser_edit() //services - edit service
    {   
        $data = $this->Service_model->getService($this->uri->segment(3));

        $info = array(
            'title' => 'Edit Services',
            'services' => $data,
        );

        $this->load->view('page/include/header', $info);
        $this->load->view('page/include/sidebar');
        $this->load->view('page/services/ser_edit');
        $this->load->view('page/include/footer');

        // echo"<pre>";
        // print_r($data);
    }

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
        // print_r($data);
    }

    public function ser_delete() //services - delete service
    {   
        $data = $this->Service_model->getService($this->uri->segment(3));

        $info = array(
            'title' => 'Deleting Services',
            'services' => $data,
        );


        $this->load->view('page/include/header', $info);
        $this->load->view('page/include/sidebar');
        $this->load->view('page/services/ser_delete');
        $this->load->view('page/include/footer');        
    }

    public function ser_remove()
    {   
        $this->Service_model->deleteService($this->uri->segment(3));
        redirect($this->config->base_url("services")); //redirect to services selection page
    }

}