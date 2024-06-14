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

    public function get_booking_data_by_id($id) {
        // This method should retrieve the booking data from the database based on the given ID
        $query = $this->db->get_where('orders_tbl', ['orders_tbl_id' => $id]);
        return $query->row_array(); // Assuming you want an associative array
    }

    public function saveBooking($data) {
        // Log the incoming data to debug
        error_log('saveBooking called with data: ' . print_r($data, true));

        // Check if $data is an array and contains the required keys
        if (!is_array($data) || 
            !isset($data['services']) || 
            !isset($data['masseurs']) || 
            !isset($data['locations']) || 
            !isset($data['totalCost'])) {
            log_message('error', 'Invalid data structure passed to saveBooking');
            return false;
        }

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

        error_log('Booking data prepared: ' . print_r($bookingData, true));

        // Insert the booking data into the orders_tbl
        $this->db->insert('orders_tbl', $bookingData);

        // Update the status of the masseur to 'BOOKED'
        if (is_array($data['masseurs'])) {
            foreach ($data['masseurs'] as $masseur_name => $masseur_data) {
                $this->db->where('accounts_tbl_name', $masseur_name);
                $this->db->update('accounts_tbl', ['accounts_tbl_status' => 'BOOKED']);
            }
        } else {
            log_message('error', 'Invalid masseurs data structure');
        }

        // Update the status of the location to 'BOOKED'
        if (is_array($data['locations'])) {
            foreach ($data['locations'] as $location_name => $location_data) {
                $this->db->where('location_tbl_name', $location_name);
                $this->db->update('location_tbl', ['location_tbl_status' => 'BOOKED']);
            }
        } else {
            log_message('error', 'Invalid locations data structure');
        }

        // Complete the transaction
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            // Log the error
            log_message('error', 'Error inserting booking data or updating masseur/location status: ' . $this->db->error());
            return false;
        } else {
            return true;
        }
    }
    
}
?>