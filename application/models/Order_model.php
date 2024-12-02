<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends CI_Model
{
// WEB SECTION
    // Get all orders
    public function getOrders() {
        // Get all orders from database
        $query = $this->db->get('orders_tbl');
        $orders = $query->result();

        // Decode JSON data from database and set object attributes with them.
        foreach ($orders as &$order) {
            // Decode JSON only if it's not empty or null
            $order_details = json_decode($order->orders_tbl_service, true);
            $masseur_details = json_decode($order->orders_tbl_masseur, true);
            $customer_details = json_decode($order->orders_tbl_customer, true);
            if ($order_details !== null) {
                // Assign attributes only if json_decode was successful
                $order->services = isset($order_details['services']) ? $order_details['services'] : null;
                $order->masseurs = isset($order_details['masseurs']) ? $order_details['masseurs'] : null; //NOT REMOVED IN-CASE ITS NEEDED ON MOBILE
                $order->locations = isset($order_details['locations']) ? $order_details['locations'] : null;
                $order->totalCost = isset($order_details['orders_tbl_cost']) ? $order_details['orders_tbl_cost'] : null;
            } else {
                // Handle case where orders_tbl_service is null or invalid
                $order->services = null;
                $order->masseurs = null; //NOT REMOVED IN-CASE ITS NEEDED ON MOBILE
                $order->locations = null;
                $order->totalCost = null;
            }

            if ($masseur_details !== null) {
                $order->masseur = isset($masseur_detail['name']) ? $masseur_details['name'] : null;
                $order->masseur_gender = isset($masseur_detail['gender']) ? $masseur_details['gender'] : null;
            }else {
                $order->masseur = null;
                $order->masseur_gender = null;
            }

            if ($customer_details !== null) {
                $order->customer_name = isset($customer_details['name']) ? $customer_details['name'] : null;
                $order->customer_gender = isset($customer_details['gender']) ? $customer_details['gender'] : null;
            }else {
                $order->customer_name = null;
                $order->customer_gender = null;
            }

        }

        return $orders;
    }

    // getting order by id
    public function getOrder($id) {
        $query = $this->db->get_where('orders_tbl', array('orders_tbl_id' => $id));
        return $query->result();
    }

    // get ongoing orders
    public function getOngoing() {
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

        return $query->result();
    }

    // set the booking to complete
    public function completeOrder($id) {
        $this->db->where('orders_tbl_id', $id);
        $this->db->update('orders_tbl', array('orders_tbl_status' => 'COMPLETED'));
    }

    // get completed orders
    public function getCompletes() {
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
 
// GET REQUESTS (fetch data, read)
    // get booking with ongoing status
    public function getOngoingOrders($status) {
        $this->db->where('orders_tbl_status', $status);
        $query = $this->db->get('orders_tbl');
        return $query->result();
    }

    // getting all completed orders
    public function getCompletedOrders() {
        $this->db->where_in('orders_tbl_status', ['Cancelled', 'Completed', 'Complete']);
        $query = $this->db->get('orders_tbl');
        return $query->result();
    }

// POST REQUESTS (insert, update, delete)
    // update the status of the order to completed if paid
    public function updatePaidAmount($data) {
        // Prepare the data to update multiple columns in a single query
        $updateData = [
            'orders_tbl_status' => $data['status'],
            'orders_tbl_paid_amount' => $data['paidAmount']
        ];

        // print_r($updateData);

        // Perform a single update query
        $this->db->where('orders_tbl_id', $data['id']);
        $success = $this->db->update('orders_tbl', $updateData);

        return $success; // Return true if the update is successful, false otherwise
    }

    // update the status of the order to cancelled
    public function updateCancelOrder($data) {
        $this->db->where('orders_tbl_id', $data['id']);
        $success = $this->db->update('orders_tbl', ['orders_tbl_status' => $data['status']]);

        return $success; // Return true if the update is successful, false otherwise
    }

    // update the status of the masseur to available
    public function updateMasseurStatus($data) {
        $this->db->where('accounts_tbl_name', $data['name']);
        $success = $this->db->update('accounts_tbl', ['accounts_tbl_status' => $data['status']]);

        return $success; // Return true if the update is successful, false otherwise
    }

    // update the status of the workstation to available
    public function updateWorkstationStatus($data) {
        $this->db->where('location_tbl_name', $data['name']);
        $success = $this->db->update('location_tbl', ['location_tbl_status' => $data['status']]);

        return $success; // Return true if the update is successful, false otherwise
    }

}
