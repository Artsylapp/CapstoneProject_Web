<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

    // Get all orders
    public function getOrders()
    {
        $query = $this->db->get('orders_tbl');
        $orders = $query->result();

        // Decode JSON data from database and set object attributes with them.
        foreach ($orders as &$order) {
            $order_details = json_decode($order->orders_tbl_details, true);
            $order->services = $order_details['services'];
            $order->masseurs = $order_details['masseurs'];
            $order->locations = $order_details['locations'];
            $order->totalCost = $order_details['orders_tbl_cost'];
        }

        return $orders;
    }

    // getting all completed orders
    public function getCompletedOrders()
    {
        $this->db->where_in('orders_tbl_status', ['Finished', 'Cancelled']);
        $query = $this->db->get('orders_tbl');
        return $query->result();
    }
    
    // getting order by id
    public function getOrder($id)
    {
        $query = $this->db->get_where('orders_tbl', array('orders_tbl_id' => $id));
        return $query->result();
    }

    // updating order data
    public function updateOrder($data)
    {
        $this->db->where('orders_tbl_id', $data['orders_tbl_id']);
        $this->db->update('orders_tbl', $data);
        return $data;
    }

    // deleting order data by id
    public function deleteOrder($id)
    {
        $this->db->where('orders_tbl_id', $id);
        $this->db->delete('orders_tbl');
    }

    // getting all ongoing orders
    public function getOngoingOrders()
    {
        $query = $this->db->get_where('orders_tbl', array('orders_tbl_status' => 'Ongoing'));
        return $query->result();
    }
}
?>
