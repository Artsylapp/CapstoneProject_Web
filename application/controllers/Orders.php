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
        $this->load->model('Location_model');
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
        $data = $this->Location_model->getLocations();
        $info = array(
            'title' => 'Assign Location',
            'mode' => 'place',
            'locations' => $data,
        );
        $this->load->view('page/include/header', $info);
        $this->load->view('page/include/transaction_side', $info);
        $this->load->view('page/orders/orders_placement', $info);
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

        if ($data) {
            // Pass the data to the model
            $this->Booking_model->saveBooking($data);
            echo json_encode(['status' => 'success']);
        } else {
            // Handle the error
            echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
        }
    }
    
    public function cancel_booking() {
        $this->Booking_model->saveBooking($data);
        redirect(base_url("orders"));
    }
    
}
