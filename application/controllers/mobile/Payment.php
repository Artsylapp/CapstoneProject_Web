<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

    /* CONSTRUCTOR */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url', 'form']); // Load URL and Form helpers
        $this->load->library('session'); // Load the session library
        $this->load->model('mobile/Payment_model'); // Load the Booking_model
    }

    public function index()
    {
        $booking_id = $this->input->get('booking_id');
        $this->session->set_userdata('from', 'payments');

        echo'hello world';

        // $this->load->view('mobile/payment'); // Load the appropriate view
        // echo '<pre>';
        // print_r($data);
        // print_r($booking_id);

    }

}
