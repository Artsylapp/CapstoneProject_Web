<?php
public function orderUpdateStatus_post() {
    
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