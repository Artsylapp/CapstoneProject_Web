<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Orders extends CI_Controller {
    
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
            'title' => 'Booking',
            'orders' => $data['orders'],
        );

        $this->load->view('page/include/header', $info);
        $this->load->view('page/include/sidebar');
        $this->load->view('page/orders/hub');
        $this->load->view('page/include/footer');
    }

    // Orders - create order
    public function orders_create()
    {
        $data['services'] = $this->Service_model->getServices();
        $info = array(
            'title' => 'Select Services',
            'mode' => 'create',
            'services' => $data['services'],
        );
        $this->load->view('page/include/header', $info);
        $this->load->view('page/include/transaction_side', $info);
        $this->load->view('page/orders/orders_create');
    }

    // Orders - Assign masseur
    public function orders_assign()
    {
        $data = $this->Account_model->getAccounts();
        $info = array(
            'title' => 'Assign Masseur',
            'mode' => 'assign',
            'accounts' => $data,
        );
        $this->load->view('page/include/header', $info);
        $this->load->view('page/include/transaction_side', $info);
        $this->load->view('page/orders/orders_assign', $info);
    }

    // Orders - Assign location
    public function orders_placement() {
        $data = $this->Locations_model->getLocations();
        $info = array(
            'title' => 'Assign Location',
            'mode' => 'place',
            'locations' => $data,
        );
        $this->load->view('page/include/header', $info);
        $this->load->view('page/include/transaction_side', $info);
        $this->load->view('page/orders/orders_placement', $info);
    }

    // Orders - Cancel order
    public function orders_cancel()
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
        $this->load->view('page/orders/orders_delete', $info); // Pass $info to the view
        $this->load->view('page/include/footer');        
    }

    // Orders - Save the booking details
    public function save_booking()
    {
        $this->load->model('Booking_model');
        
        // Retrieve the JSON input
        $data = json_decode(file_get_contents('php://input'), true);
        print_r($data);

        if ($data) {
            // Pass the data to the model
            $this->Booking_model->saveBooking($data);
            echo json_encode(['status' => 'success']);

            log_message('info', 'Booking saved successfully.'. $data);
        } else {
            // Handle the error
            echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
        }
    }
    
    // Orders - Cancel booking
    public function cancel_booking($id)
    {
        $booking = $this->Order_model->getOrder($id);
        if (!empty($booking)) {
            $booking_details = json_decode($booking[0]->orders_tbl_details, true);
    
            $data = array(
                'id' => $id,
                'masseurs' => isset($booking_details['masseurs']) ? array_keys($booking_details['masseurs']) : [],
                'locations' => isset($booking_details['locations']) ? array_keys($booking_details['locations']) : []
            );
    
            $success = $this->Booking_model->updateBooking($data);
            if ($success) {
                $this->session->set_flashdata('message', 'Booking cancelled successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to cancel booking.');
            }
        } else {
            $this->session->set_flashdata('error', 'Booking not found.');
        }
        redirect(base_url("orders"));
    }

    // Orders - Updating masseur status and booking status
    public function orders_view() // Orders - delete order
    {
        // Get the order details based on the ID
        $data = $this->Order_model->getOrder($this->uri->segment(3));

        // Ensure $data is not empty and get the first element
        $booking = !empty($data) ? $data[0] : null;

        // checking if the booking is not empty
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
        $this->load->view('page/orders/orders_view', $info); // Pass $info to the view
        $this->load->view('page/include/footer');        
    }   
}
