<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Orders extends CI_Controller {
    
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
        $this->load->view('page/orders/hub');
        $this->load->view('page/include/footer');
    }

    public function orders_create() {
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

    public function orders_assign() {
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

    public function orders_delete() // Orders - delete order
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


    /* function save_booking() {
        // Read the incoming JSON data
        $data = json_decode(file_get_contents('php://input'), true);
    
        if (!empty($data)) {
            // Debugging output
            log_message('debug', 'Booking Data: ' . print_r($data, true));
            
            // Save the booking data
            $this->Booking_model->saveBooking($data);
    
            // Check for database errors
            if ($this->db->affected_rows() > 0) {
                log_message('info', 'Booking saved successfully.');
            } else {
                log_message('error', 'Failed to save booking: ' . $this->db->last_query());
            }
    
            // Redirect to the orders page
            //redirect(base_url("orders"));
        } else {
            log_message('error', 'No data received for booking.');
            //redirect(base_url("orders"));
        }
    }
    */

    public function save_booking() {
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

    // public function view_booking($id) {
    //     $data['order'] = $this->Order_model->getOrder($id);
    //     $info = array(
    //         'title' => 'View Booking',
    //         'order' => $data['order'],
    //     );
    //     $this->load->view('page/include/header', $info);
    //     $this->load->view('page/include/sidebar');
    //     $this->load->view('page/orders/view_booking');
    //     $this->load->view('page/include/footer');
    // }

    
    public function cancel_booking($id) {
        // Retrieve booking data by ID
        $data = $this->Booking_model->get_booking_data_by_id($id);

        if (!$data) {
            // Handle the case where no data is found
            show_error('No booking found with the given ID.');
            return;
        }

        echo"<pre>";
        print_r($data);

        // Save the booking (or cancel in your case)
        // $this->Booking_model->saveBooking($data);

        // Redirect to the orders page
        // redirect(base_url("orders"));
    }
    
    
}
