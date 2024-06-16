<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
use chriskacerguis\RestServer\RestController;

class ApiOrder extends RestController {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Order_model');
    }

    // To get all ongoing orders from the database to Android App
    public function index_get() {
        $orders = new Order_model; // Assuming Order_model is your model class
        $results = $orders->getOngoingOrders('ON-GOING'); // Fetch only "ON-GOING" orders

        // Prepare parsed orders data with detailed breakdown
        $parsedOrders = [];
        foreach ($results as $order) {
            // Decode JSON string into associative array
            $order_details = json_decode($order->orders_tbl_details, true); // Use -> for object access

            if ($order_details === null && json_last_error() !== JSON_ERROR_NONE) {
                // Prepare OrderResponse object
                $orderResponse = [
                    'error' => true,
                    'message' => 'Orders failed retrieved'
                ];
                
                $this->response($orderResponse, 500); // Send error response with HTTP status code 500
                return; // Exit the method
            }

            // Prepare individual variables from the JSON
            $services = isset($order_details['services']) ? $order_details['services'] : [];
            $masseurs = isset($order_details['masseurs']) ? $order_details['masseurs'] : [];
            $locations = isset($order_details['locations']) ? $order_details['locations'] : [];
            $totalCost = isset($order_details['orders_tbl_cost']) ? $order_details['orders_tbl_cost'] : 'N/A';

            // Append parsed details to the response array
            $parsedOrders[] = [
                'orders_tbl_id' => $order->orders_tbl_id,
                'services' => $services,
                'masseurs' => $masseurs,
                'locations' => $locations,
                'totalCost' => $totalCost,
                'orders_tbl_status' => $order->orders_tbl_status
            ];
        }

        // Prepare OrderResponse object
        $orderResponse = [
            'error' => false,
            'message' => 'Orders retrieved successfully',
            'orders' => $parsedOrders
        ];

        $this->response($orderResponse, 200);
    }

    // To get all finished orders from the database to Android App
    public function orderCompleted_get() {
        $orders = new Order_model; // Assuming Order_model is your model class
        $results = $orders->getCompletedOrders(); // Fetch completed orders
    
        // Prepare parsed orders data with detailed breakdown
        $parsedOrders = [];
        foreach ($results as $order) {
            // Decode JSON string into associative array
            $order_details = json_decode($order->orders_tbl_details, true); // Use -> for object access
    
            if ($order_details === null && json_last_error() !== JSON_ERROR_NONE) {
                // Handle JSON decoding error
                $orderResponse = [
                    'error' => true,
                    'message' => 'Failed to retrieve completed orders'
                ];
                $this->response($orderResponse, 500); // Send error response with HTTP status code 500
                return; // Exit the method
            }
    
            // Prepare individual variables from the JSON
            $services = isset($order_details['services']) ? $order_details['services'] : [];
            $masseurs = isset($order_details['masseurs']) ? $order_details['masseurs'] : [];
            $locations = isset($order_details['locations']) ? $order_details['locations'] : [];
            $totalCost = isset($order_details['orders_tbl_cost']) ? $order_details['orders_tbl_cost'] : 'N/A';
    
            // Append parsed details to the response array
            $parsedOrders[] = [
                'orders_tbl_id' => $order->orders_tbl_id,
                'services' => $services,
                'masseurs' => $masseurs,
                'locations' => $locations,
                'totalCost' => $totalCost,
                'orders_tbl_status' => $order->orders_tbl_status
            ];
        }
    
        // Prepare OrderResponse object for successful retrieval
        $orderResponse = [
            'error' => false,
            'message' => 'Finished Orders retrieved successfully',
            'orders' => $parsedOrders
        ];
    
        $this->response($orderResponse, 200); // Send success response with HTTP status code 200
    }

    // Orders - Cancel booking
    public function orderCancelled_get($id)
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
                $orderResponse = [
                    'error' => false,
                    'message' => 'Booking cancelled successfully.'
                ];
                $this->response($orderResponse, 200);
            } else {
                $this->session->set_flashdata('error', 'Failed to cancel booking.');
                $this->response($orderResponse, 500);
            }
            
        } else {
            $orderResponse = [
                'error' => true,
                'message' => 'Booking not found.'
            ];
            $this->response($orderResponse, 500);
        }
    }
}
