<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_model extends CI_Model {

    // Get all bookings and save the data of the booking
    public function saveBooking($data)
    {
        // Start transaction
        $this->db->trans_start();
    
        // Prepare data for passing to database
        $bookingData = [
            'orders_tbl_service' => json_encode([
                'services' => $data['services'],
                'locations' => $data['locations'],
                'orders_tbl_cost' => $data['totalCost'],
            ]),
            'orders_tbl_masseur' => json_encode([
                'masseur_detail' =>  $data['masseurs'],
            ]),
            'orders_tbl_customer' => json_encode([
                'customer_details'=> localStorage.getItem('customer_information'),
            ]) ,
            'orders_tbl_status' => "ON-GOING",
        ];
        
        // Insert the booking data into the orders_tbl
        $this->db->insert('orders_tbl', $bookingData);
    
        // Update the status of the masseur to 'BOOKED'
        foreach ($data['masseurs'] as $masseur_name => $masseur_data) {
            $this->db->where('accounts_tbl_name', $masseur_name);
            $this->db->update('accounts_tbl', ['accounts_tbl_status' => 'BOOKED']);
        }
        // Update the status of the location to 'BOOKED'
        foreach ($data['locations'] as $location_name => $location_data) {
            $this->db->where('location_tbl_name', $location_name);
            $this->db->update('location_tbl', ['location_tbl_status' => 'BOOKED']);
        }
    
        // Complete the transaction
        $this->db->trans_complete();
    
        if ($this->db->trans_status() === FALSE) {
            // Log the error
            log_message('error', 'Error inserting booking data or updating masseur status: ' . $this->db->error());
            return false;
        } else {
            return true;
        }
    }

    // Get all bookings and update the data of the booking
    public function updateBooking($data)
    {
        $id = $data['id'];
        $status = $data['status'];
    
        // Start a transaction to ensure all updates are applied automically
        $this->db->trans_start();
    
        // Update the booking status
        $this->db->where('orders_tbl_id', $id);
        if (empty($status)) {
            $this->db->update('orders_tbl', array('orders_tbl_status' => 'CANCELLED'));
        }else{
            $this->db->update('orders_tbl', array('orders_tbl_status' => $status));
        }
    
        // Update masseur status to AVAILABLE
        if (isset($data['masseurs'])) {
            foreach ($data['masseurs'] as $masseur) {
                $this->db->where('accounts_tbl_name', $masseur);
                $this->db->update('accounts_tbl', array('accounts_tbl_status' => 'AVAILABLE'));
            }
        }
    
        // Update location status to Open
        if (isset($data['locations'])) {
            foreach ($data['locations'] as $location) {
                $this->db->where('location_tbl_name', $location);
                $this->db->update('location_tbl', array('location_tbl_status' => 'Open'));
            }
        }
    
        // Complete the transaction
        $this->db->trans_complete();
    
        return $this->db->trans_status(); // Returns true if all updates are successful
    } 

    function updatePaidAmount($data) {
        $id = $data['id'];
    
        // Start database transaction
        $this->db->trans_start();
    
        // Update the payment amount
        $this->db->where('orders_tbl_id', $id);
        $this->db->update('orders_tbl', array('orders_paid_amount' => $data['paid_amount']));
    
        // Complete transaction
        $this->db->trans_complete();
    
        // Return success or failure based on transaction status
        return $this->db->trans_status();
    }
}