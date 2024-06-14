<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /*
    public function saveBooking($data) {
        //Prepare data for passing to database
        $bookingData = [
            'orders_tbl_details' => json_encode([
                'services' => $data['services'],
                'masseurs' => $data['masseurs'],
                'locations' => $data['locations'],
                'orders_tbl_cost' => $data['totalCost'],
            ]),
            'orders_tbl_status' => "ON-GOING",
        ];
    
        // Insert the booking data into the orders_tbl
        $this->db->insert('orders_tbl', $bookingData);
    }
        */

    public function saveBooking($data) {
        // Start transaction
        $this->db->trans_start();
    
        // Prepare data for passing to database
        $bookingData = [
            'orders_tbl_details' => json_encode([
                'services' => $data['services'],
                'masseurs' => $data['masseurs'],
                'locations' => $data['locations'],
                'orders_tbl_cost' => $data['totalCost'],
            ]),
            'orders_tbl_status' => "ON-GOING",
        ];

        error_log(print_r($bookingData, true));
    
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
    
}
?>