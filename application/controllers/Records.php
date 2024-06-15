<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Records extends CI_Controller {

    /* CONSTRUCTOR */
	public function __construct() {
		parent::__construct();
		$this->load->model('Company_model');
		$this->load->model('Order_model');
		$this->load->model('Service_model');
		$this->load->model('Account_model');
		$this->load->model('Locations_model');
		$this->load->model('Booking_model');
		$this->load->library('session');
	}

	public function index() {
		$data['orders'] = $this->Order_model->getOrders();
		$info = array(
			'title' => 'Booking',
			'orders' => $data['orders'],
		);
	
		$this->load->view('page/include/header', $info);
		$this->load->view('page/include/sidebar');
		$this->load->view('page/records/hub');
		$this->load->view('page/include/footer');
	}

	public function records_view() // Orders - delete order
    {
        $data = $this->Order_model->getOrder($this->uri->segment(3));

        // Ensure $data is not empty and get the first element
        $booking = !empty($data) ? $data[0] : null;

        if ($booking) {
            // Parse the JSON string
            $booking_details = json_decode($booking->orders_tbl_details, true);

            // Prepare individual variables from the JSON
            $services = isset($booking_details['services']) ? $booking_details['services'] : [];
            $masseurs = isset($booking_details['masseurs']) ? $booking_details['masseurs'] : [];
            $locations = isset($booking_details['locations']) ? $booking_details['locations'] : [];
            $totalCost = isset($booking_details['orders_tbl_cost']) ? $booking_details['orders_tbl_cost'] : 'N/A';
        } else {
            $services = $masseurs = $locations = [];
            $totalCost = 'N/A';
        }

        $info = array(
            'title' => 'Cancel Booking',
            'booking' => $booking, // Pass the single object
            'services' => $services,
            'masseurs' => $masseurs,
            'locations' => $locations,
            'totalCost' => $totalCost,
        );

        $this->load->view('page/include/header', $info);
        $this->load->view('page/include/sidebar');
        $this->load->view('page/records/records_view', $info); // Pass $info to the view
        $this->load->view('page/include/footer');        
    }

}