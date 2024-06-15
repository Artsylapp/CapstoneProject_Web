<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Locations extends CI_Controller {
        
        /* CONSTRUCTOR */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Company_model');
        $this->load->model('Locations_model');
        $this->load->library('session');
    }

    //Location - locations hub
    public function index() 
    {
        $data['locations'] = $this->Locations_model->getLocations();

        $info = array(
            'title' => 'Edit Locations',
            'locations' => $data['locations'],
        );

        $this->load->view('page/include/header', $info);
        $this->load->view('page/include/sidebar');
        $this->load->view('page/locations/hub');
        $this->load->view('page/include/footer');
    }

    // Location - redirect to create location page
    public function loc_create()
    {
        $info = array(
            'title' => 'Creating Locations',
        );

        $this->load->view('page/include/header', $info);
        $this->load->view('page/include/sidebar');
        $this->load->view('page/Locations/loc_create');
        $this->load->view('page/include/footer');
    }

    // Location - create location function
    public function loc_add()
    {
        $data = array(
            'location_tbl_name' => $this->input->post('create_Customer'),
            'location_tbl_type' => $this->input->post('optradio'),
            'location_tbl_status' => 'Open',
        );

        $this->Locations_model->createlocation($data);
        redirect('Locations'); 
    }

    // Location - redirect ti edit location page
    public function loc_edit()
    {   
        $data = $this->Locations_model->getlocation($this->uri->segment(3));

        $info = array(
            'title' => 'Edit Locations',
            'locations' => $data,
        );

        $this->load->view('page/include/header', $info);
        $this->load->view('page/include/sidebar');
        $this->load->view('page/locations/loc_edit');
        $this->load->view('page/include/footer');
    }

    // Location - update location function
    public function loc_update()
    {
        $data = array(
            'location_tbl_id' => $this->uri->segment(3),
            'location_tbl_name' => $this->input->post('edit_Customer'),
            'location_tbl_type' => $this->input->post('optradio'),
        );

        $this->Locations_model->updatelocation($data, $this->uri->segment(3));
        redirect('Locations');
    }

    // Location - redirect to delete location page
    public function loc_delete()
    {   
        $data = $this->Locations_model->getlocation($this->uri->segment(3));

        $info = array(
            'title' => 'Deleting Locations',
            'locations' => $data,
        );


        $this->load->view('page/include/header', $info);
        $this->load->view('page/include/sidebar');
        $this->load->view('page/locations/loc_delete');
        $this->load->view('page/include/footer');        
    }

    // Location - delete location function
    public function loc_remove()
    {   
        $this->Locations_model->deletelocation($this->uri->segment(3));
        redirect($this->config->base_url("locations")); 
    }

}