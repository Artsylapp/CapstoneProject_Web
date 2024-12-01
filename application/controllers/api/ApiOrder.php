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
            $totalCost = isset($order_service['total_cost']['cost']) ? $order_service['total_cost']['cost'] : 'N/A';

            
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
                'masseur' => $masseurs,
                'customer' => $customers,
                'workstation' => $workstation,
                'totalCost' => $totalCost,
                'paid_amount' => $order->orders_tbl_paid_amount,
                'date' => $order->orders_tbl_date,
                'time_end' => $order->orders_tbl_time_end,
            ];
            
        }

        // Prepare OrderResponse object
        $orderResponse = [
            'error' => false,
            'message' => 'Booking Retrieved Successfully!',
            'orders' => $parsedOrders
        ];

        // Convert the array to JSON and send it as an object
        header('Content-Type: application/json');
        // No need to cast to object if $orderResponse is an array
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
            $totalCost = isset($order_service['total_cost']['cost']) ? $order_service['total_cost']['cost'] : 'N/A';
            
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
                'masseur' => $masseurs,
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

        // Convert the array to JSON and send it as an object
        header('Content-Type: application/json');
        // No need to cast to object if $orderResponse is an array
        $this->response($orderResponse, 200); // Send success response with HTTP status code 200
    }

    // Orders - Update Booking Payment
    public function orderUpdate_post()
    {
        // Get order ID and payment amount from POST request
        $id = $this->post('orderId');
        $amount = $this->post('orderPayment');

        if (empty($id) || empty($amount)) {
            // Respond with validation error
            $this->response(['error' => true, 'message' => 'Invalid order ID or payment amount.'], 400);
            return;
        }

        // Retrieve the order details based on $id
        $booking = $this->Order_model->getOrder($id);

        if (!empty($booking)) {
            // Get the current paid amount
            $currentPaidAmount = $booking[0]->orders_tbl_paid_amount;

            // Calculate the new amount
            $newPaidAmount = $currentPaidAmount + $amount;

            // Prepare the data for update
            $data = [
                'id' => $id,
                'paidAmount' => $newPaidAmount,
                'status' => 'COMPLETED'
            ];

            // Update the paid amount in the database
            $success = $this->Order_model->updatePaidAmount($data);

            if ($success) {
                // Respond with success message
                $orderResponse = [
                    'error' => false,
                    'message' => 'Payment updated successfully.',
                    'newPaidAmount' => $newPaidAmount
                ];
                $this->response($orderResponse, 200);
            } else {
                // Respond with error message
                $this->response(['error' => true, 'message' => 'Failed to update payment.'], 500);
            }
        } else {
            // Respond with booking not found message
            $this->response(['error' => true, 'message' => 'Booking not found.'], 404);
        }
    }

}
