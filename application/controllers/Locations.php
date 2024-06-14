<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Locations extends CI_Controller {
        
        /* CONSTRUCTOR */
    public function __construct(){
        parent::__construct();
        $this->load->model('Company_model');
        $this->load->model('Locations_model');
        $this->load->library('session');
    }

    public function index() //locations hub
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

    public function loc_create() //Locations - create location
    {
        $info = array(
            'title' => 'Creating Locations',
        );


        $this->load->view('page/include/header', $info);
        $this->load->view('page/include/sidebar');
        $this->load->view('page/Locations/loc_create');
        $this->load->view('page/include/footer');
    }

    public function loc_add() //Locations - add location
    {
        $data = array(
            'location_tbl_name' => $this->input->post('create_Customer'),
            'location_tbl_type' => $this->input->post('optradio'),
            'location_tbl_status' => 'Open',
        );

        $this->Locations_model->createlocation($data);
        redirect('Locations'); // redirect to Locations hub
        // print_r($data);
    }


    public function loc_edit() //Locations - edit location
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

        // echo"<pre>";
        // print_r($data);
    }

    public function loc_update()
    {
        $data = array(
            'location_tbl_id' => $this->uri->segment(3),
            'location_tbl_name' => $this->input->post('edit_Customer'),
            'location_tbl_type' => $this->input->post('optradio'),
        );

        $this->Locations_model->updatelocation($data, $this->uri->segment(3));
        redirect('Locations');
        // print_r($data);
    }

    public function loc_delete() //Locations - delete location
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

    public function loc_remove()
    {   
        $this->Locations_model->deletelocation($this->uri->segment(3));
        redirect($this->config->base_url("locations")); //redirect to Locations selection page
    }

}