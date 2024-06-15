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
        $orders = new Order_model;
        $query = $orders->getOrders('ON-GOING'); // Fetch only "ON-GOING" orders
    
        $results = [];
        foreach ($query as $order) {
            $results[] = $order;
        }
    
        // Prepare OrderResponse object
        $orderResponse = [
            'error' => false,
            'message' => 'Orders retrieved successfully',
            'orders' => $results
        ];
    
        $this->response($orderResponse, 200);
    }
    

    // To get a specific order from the database to Android App
    public function orderEdit_get($id)
    {
        $orders = new Order_model;
        $results = $orders->getOrder($id);
        
        // Prepare OrderResponse object
        $orderResponse = [
            'error' => false,
            'message' => 'Order retrieved successfully',
            'orders' => [$results] // Wrap result in array to match data class structure
        ];
        
        $this->response($orderResponse, 200);
    }

    // To get data from App and update a specific order from the Android App to the database
    public function orderUpdate_post()
    {
        $orders = new Order_model;
        $data = [
            'orders_tbl_id' => $this->post('orderId'),
            'orders_tbl_services' => $this->post('orderService'),
            'orders_tbl_empName' => $this->post('orderEmpName'),
            'orders_tbl_status' => $this->post('orderStatus')
        ];
        $results = $orders->updateOrder($data);
        
        // Prepare OrderResponse object
        $orderResponse = [
            'error' => false,
            'message' => 'Order updated successfully',
            'orders' => [$results] // Wrap result in array to match data class structure
        ];
        
        $this->response($orderResponse, 200);
    }

    // To get order ID from App and delete a specific order from the Android App to the database
    public function orderDelete_post()
    {
        $id = $this->post('orderId');
        $orders = new Order_model;
        $results = $orders->deleteOrder($id);
        
        // Prepare OrderResponse object
        $orderResponse = [
            'error' => false,
            'message' => 'Order deleted successfully',
            'orders' => [$results] // Wrap result in array to match data class structure
        ];
        
        $this->response($orderResponse, 200);
    }

    public function orderUpdateStatus_post()
    {
        $orders = new Order_model;
        $data = [
            'orders_tbl_id' => $this->post('orderId'),
            'orders_tbl_status' => $this->post('orderStatus')
        ];
        
        $results = $orders->updateOrder($data);
        
        // Prepare OrderResponse object
        $orderResponse = [
            'error' => false,
            'message' => 'Order status updated Successfully!',
            'orders' => [$results] // Wrap result in array to match data class structure
        ];
        
        $this->response($orderResponse, 200);
    }

    public function orderOngoing_get()
    {
        $orders = new Order_model;
        $results = $orders->getOngoingOrders();
        
        // Prepare OrderResponse object
        $orderResponse = [
            'error' => false,
            'message' => 'Ongoing Orders retrieved successfully',
            'orders' => $results
        ];
        
        $this->response($orderResponse, 200);
    }

    public function orderCompleted_get()
    {
        $orders = new Order_model;
        $results = $orders->getCompletedOrders();
        
        // Prepare OrderResponse object
        $orderResponse = [
            'error' => false,
            'message' => 'Finished Orders retrieved successfully',
            'orders' => $results
        ];
        
        $this->response($orderResponse, 200);
    }

}
