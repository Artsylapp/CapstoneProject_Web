<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

use chriskacerguis\RestServer\RestController;

class ApiOrder extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Order_model');
        $this->load->model('Booking_model');
    }

    // To get all ongoing orders from the database to Android
    public function index_get()
    {
        $results = $this->Order_model->getOngoingOrders('ON-GOING'); // Fetch only "ON-GOING" orders

        // Prepare parsed orders data with detailed breakdown
        $parsedOrders = [];
        foreach ($results as $order) {
            // Decode JSON string into associative array
            $order_service = json_decode($order->orders_tbl_service, true); // Use -> for object access
            $order_masseur = json_decode($order->orders_tbl_masseur, true); // Use -> for object access
            $order_customer = json_decode($order->orders_tbl_customer, true); // Use -> for object access


            // error if the json is empty or invalid
            if ($order_service === null && json_last_error() !== JSON_ERROR_NONE) {
                // Prepare OrderResponse object
                $orderResponse = [
                    'error' => true,
                    'message' => 'Orders failed to be retrieved'
                ];
            
                $this->response($orderResponse, 500); // Send error response with HTTP status code 500
                return; // Exit the condition

            } else if ($order_masseur === null && json_last_error() !== JSON_ERROR_NONE) {
                // Prepare OrderResponse object
                $orderResponse = [
                    'error' => true,
                    'message' => 'Orders failed to be retrieved'
                ];
            
                $this->response($orderResponse, 500); // Send error response with HTTP status code 500
                return; // Exit the condition

            } else if ($order_customer === null && json_last_error() !== JSON_ERROR_NONE) {
                // Prepare OrderResponse object
                $orderResponse = [
                    'error' => true,
                    'message' => 'Orders failed to be retrieved'
                ];
            
                $this->response($orderResponse, 500); // Send error response with HTTP status code 500
                return; // Exit the condition
            }
            
            // Prepare individual serice variables from the JSON
            $services = isset($order_service['services']) ? $order_service['services'] : [];
            $masseurs = isset($order_masseur['masseur_detail']) ? $order_masseur['masseur_detail'] : [];
            $customers = isset($order_customer['customer_detail']) ? $order_customer['customer_detail'] : [];
            
            // $price = isset($order_details['price']) ? $order_details['price'] : 'N/A';
            // $amount = isset($order_details['amount']) ? $order_details['amount'] : 'N/A';
            // $type = isset($order_details['type']) ? $order_details['type'] : 'N/A';
            $locations = isset($order_service['locations']) ? $order_service['locations'] : [];
            $totalCost = isset($order_service['orders_tbl_cost']) ? $order_service['orders_tbl_cost'] : 'N/A';
            
            // Simplify locations for single-item case or format for multiple entries
            if (count($locations) === 1) {
                // If there is only one location, show it as a single simplified entry
                $locationKey = key($locations);
                $workstation = "$locationKey"; // Show only the key (e.g., Table 1)
            } else {
                // If there are multiple locations, format them as key-value pairs
                $formattedLocations = [];
                foreach ($locations as $key => $value) {
                    $formattedLocations[] = "$key => $value";
                }
                $workstation = implode(', ', $formattedLocations); // Join as a single string
            }
            
            // Append parsed details to the response array
            $parsedOrders[] = [
                'id' => $order->orders_tbl_id,
                'status' => $order->orders_tbl_status,
                'services' => $services,
                'masseurs' => $masseurs,
                'customer' => $customers,
                'workstation' => $workstation,
                'totalCost' => $totalCost,
                'paid_amount' => $order->orders_tbl_paid_amount,
                'date' => $order->orders_tbl_date,
                'time_end' => $order->orders_tbl_time_end,
            ];
            
        }

        // echo '<pre>';
        // print_r($parsedOrders);
        // print_r($results);

        // Prepare OrderResponse object
        $orderResponse = [
            'error' => false,
            'message' => 'Booking Retrieved Successfully!',
            'orders' => $parsedOrders
        ];

        $this->response($orderResponse, 200); // Send success response with HTTP status code 200
    }


    // To get all finished orders from the database to Android App
    public function orderCompleted_get()
    {
        $orders = new Order_model; // Assuming Order_model is your model class
        $results = $orders->getCompletedOrders(); // Fetch completed orders

        // Prepare parsed orders data with detailed breakdown
        $parsedOrders = [];
        foreach ($results as $order) {
            // Decode JSON string into associative array
            $order_service = json_decode($order->orders_tbl_service, true); // Use -> for object access
            $order_masseur = json_decode($order->orders_tbl_masseur, true); // Use -> for object access
            $order_customer = json_decode($order->orders_tbl_customer, true); // Use -> for object access


            // error if the json is empty or invalid
            if ($order_service === null && json_last_error() !== JSON_ERROR_NONE) {
                // Prepare OrderResponse object
                $orderResponse = [
                    'error' => true,
                    'message' => 'Orders failed to be retrieved'
                ];
            
                $this->response($orderResponse, 500); // Send error response with HTTP status code 500
                return; // Exit the condition

            } else if ($order_masseur === null && json_last_error() !== JSON_ERROR_NONE) {
                // Prepare OrderResponse object
                $orderResponse = [
                    'error' => true,
                    'message' => 'Orders failed to be retrieved'
                ];
            
                $this->response($orderResponse, 500); // Send error response with HTTP status code 500
                return; // Exit the condition

            } else if ($order_customer === null && json_last_error() !== JSON_ERROR_NONE) {
                // Prepare OrderResponse object
                $orderResponse = [
                    'error' => true,
                    'message' => 'Orders failed to be retrieved'
                ];
            
                $this->response($orderResponse, 500); // Send error response with HTTP status code 500
                return; // Exit the condition
            }
            
            // Prepare individual serice variables from the JSON
            $services = isset($order_service['services']) ? $order_service['services'] : [];
            $masseurs = isset($order_masseur['masseur_detail']) ? $order_masseur['masseur_detail'] : [];
            $customers = isset($order_customer['customer_detail']) ? $order_customer['customer_detail'] : [];
            
            // $price = isset($order_details['price']) ? $order_details['price'] : 'N/A';
            // $amount = isset($order_details['amount']) ? $order_details['amount'] : 'N/A';
            // $type = isset($order_details['type']) ? $order_details['type'] : 'N/A';
            $locations = isset($order_service['locations']) ? $order_service['locations'] : [];
            $totalCost = isset($order_service['orders_tbl_cost']) ? $order_service['orders_tbl_cost'] : 'N/A';
            
            // Simplify locations for single-item case or format for multiple entries
            if (count($locations) === 1) {
                // If there is only one location, show it as a single simplified entry
                $locationKey = key($locations);
                $workstation = "$locationKey"; // Show only the key (e.g., Table 1)
            } else {
                // If there are multiple locations, format them as key-value pairs
                $formattedLocations = [];
                foreach ($locations as $key => $value) {
                    $formattedLocations[] = "$key => $value";
                }
                $workstation = implode(', ', $formattedLocations); // Join as a single string
            }
            
            // Append parsed details to the response array
            $parsedOrders[] = [
                'id' => $order->orders_tbl_id,
                'status' => $order->orders_tbl_status,
                'services' => $services,
                'masseurs' => $masseurs,
                'customer' => $customers,
                'workstation' => $workstation,
                'totalCost' => $totalCost,
                'paid_amount' => $order->orders_tbl_paid_amount,
                'date' => $order->orders_tbl_date,
                'time_end' => $order->orders_tbl_time_end,
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
    public function orderUpdate_post()
    {
        // Get order ID and status from POST request
        $id = $this->post('orderId');
        $status = $this->post('orderStatus');

        // Retrieve order based on $id
        $booking = $this->Order_model->getOrder($id);

        if (!empty($booking)) {
            $booking_details = json_decode($booking[0]->orders_tbl_details, true);

            $data = array(
                'id' => $id,
                'status' => $status,
                'masseurs' => isset($booking_details['masseurs']) ? array_keys($booking_details['masseurs']) : [],
                'locations' => isset($booking_details['locations']) ? array_keys($booking_details['locations']) : []
            );

            // Update booking status in the model
            $success = $this->Booking_model->updateBooking($data);

            if ($success) {
                // Respond with success message
                $orderResponse = [
                    'error' => false,
                    'message' => 'Booking cancelled successfully.'
                ];
                $this->response($orderResponse, 200);
            } else {
                // Respond with error message
                $this->response(['error' => true, 'message' => 'Failed to cancel booking.'], 500);
            }
        } else {
            // Respond with booking not found message
            $this->response(['error' => true, 'message' => 'Booking not found.'], 500);
        }
    }
}
