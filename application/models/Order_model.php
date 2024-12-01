<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends CI_Model
{

    // Get all orders
    public function getOrders()
    {
        // Get all orders from database
        $query = $this->db->get('orders_tbl');
        $orders = $query->result();

        // Decode JSON data from database and set object attributes with them.
        foreach ($orders as &$order) {
            // Decode JSON only if it's not empty or null
            $order_details = json_decode($order->orders_tbl_service, true);
            if ($order_details !== null) {
                // Assign attributes only if json_decode was successful
                $order->services = isset($order_details['services']) ? $order_details['services'] : null;
                $order->masseurs = isset($order_details['masseurs']) ? $order_details['masseurs'] : null;
                $order->locations = isset($order_details['locations']) ? $order_details['locations'] : null;
                $order->totalCost = isset($order_details['orders_tbl_cost']) ? $order_details['orders_tbl_cost'] : null;
            } else {
                // Handle case where orders_tbl_service is null or invalid
                $order->services = null;
                $order->masseurs = null;
                $order->locations = null;
                $order->totalCost = null;
            }
        }

        return $orders;
    }


    // getting order by id
    public function getOrder($id)
    {
        $query = $this->db->get_where('orders_tbl', array('orders_tbl_id' => $id));
        return $query->result();
    }

    public function getOngoing()
    {
        // Get orders with status 'ON-GOING'
        $this->db->where('orders_tbl_status', 'ON-GOING');
        $query = $this->db->get('orders_tbl');
        $orders = $query->result();

        // Decode JSON data from the database and set object attributes
        foreach ($orders as $order) {
            $order_details = json_decode($order->orders_tbl_service, true);

            if (is_array($order_details)) {
                $order->services = $order_details['services'] ?? null;
                $order->masseurs = $order_details['masseurs'] ?? null;
                $order->locations = $order_details['locations'] ?? null;
                $order->totalCost = $order_details['orders_tbl_cost'] ?? null;
            } else {
                // Handle invalid or null JSON
                $order->services = null;
                $order->masseurs = null;
                $order->locations = null;
                $order->totalCost = null;
            }
        }

        // echo '<pre>';
        // print_r($orders);

        return $query->result();
    }


    // complete order
    public function completeOrder($id)
    {
        $this->db->where('orders_tbl_id', $id);
        $this->db->update('orders_tbl', array('orders_tbl_status' => 'COMPLETED'));
    }

    public function getCompletes()
    {
        // Query the database to fetch orders where the status is either 'COMPLETED' or 'CANCELLED'
        $this->db->where_in('orders_tbl_status', ['COMPLETED', 'CANCELLED']);

        // Execute the query
        $query = $this->db->get('orders_tbl');

        // Fetch results as an array of objects
        $orders = $query->result();

        // Iterate through each order and decode the JSON field
        foreach ($orders as $order) {
            // Decode JSON only if it's not empty or null
            $order_details = json_decode($order->orders_tbl_service, true);
            if ($order_details !== null) {
                // Assign attributes only if json_decode was successful
                $order->services = isset($order_details['services']) ? $order_details['services'] : null;
                $order->masseurs = isset($order_details['masseurs']) ? $order_details['masseurs'] : null;
                $order->locations = isset($order_details['locations']) ? $order_details['locations'] : null;
                $order->totalCost = isset($order_details['orders_tbl_cost']) ? $order_details['orders_tbl_cost'] : null;
            } else {
                // Handle case where orders_tbl_service is null or invalid
                $order->services = null;
                $order->masseurs = null;
                $order->locations = null;
                $order->totalCost = null;
            }
        }

        // Return the updated orders
        return $orders;
    }


    // API SECTION
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

    // get booking with ongoing status
    public function getOngoingOrders($status)
    {
        $this->db->where('orders_tbl_status', $status);
        $query = $this->db->get('orders_tbl');
        return $query->result();
    }

    // getting all completed orders
    public function getCompletedOrders()
    {
        $this->db->where_in('orders_tbl_status', ['Cancelled', 'Completed', 'Complete']);
        $query = $this->db->get('orders_tbl');
        return $query->result();
    }
}
