<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Records extends CI_Controller {

    /* CONSTRUCTOR */
	public function __construct()
    {
		parent::__construct();
		$this->load->model('Company_model');
		$this->load->model('Order_model');
		$this->load->model('Service_model');
		$this->load->model('Account_model');
		$this->load->model('Locations_model');
		$this->load->model('Booking_model');
		$this->load->library('session');
	}

    // Orders hub main page
	public function index()
    {
		$data['orders'] = $this->Order_model->getOrders();
		$info = array(
			'title' => 'Records',
			'orders' => $data['orders'],
		);
	
		$this->load->view('page/include/header', $info);
		$this->load->view('page/records/hub');
		$this->load->view('page/include/footer');
	}

    // Orders - delete order
	public function records_view() 
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

        // Pass the single object
        $info = array(
            'title' => 'Record Info',
            'booking' => $booking, 
            'services' => $services,
            'masseurs' => $masseurs,
            'locations' => $locations,
            'totalCost' => $totalCost,
        );

        $this->load->view('page/include/header', $info);
        $this->load->view('page/records/records_view', $info); 
        $this->load->view('page/include/footer');        
    }

    // Export PDF in php
    // public function exportPDF()
    // {
    //     $this->load->library('pdf');
    //     $this->pdf->load_view('page/records/records_view');
    //     $this->pdf->render();
    //     $this->pdf->stream("records.pdf");
    // }

    // Records to PDF
    public function recordsToPDF()
    {
        $data['orders'] = $this->Order_model->getCompletedOrders();

        // echo'<pre>';
        // print_r($data['orders']);

        if (!empty($data['orders'])) {
            echo'<pre>';
            echo json_encode($data['orders'], JSON_PRETTY_PRINT);
            echo'</pre>';
        } else {
            echo json_encode(['error' => 'No orders found']);
        }
            
    }

}