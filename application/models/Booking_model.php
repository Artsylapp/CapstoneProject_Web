<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function saveBooking($data) {
        // Structure the data correctly based on your table schema
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
    
}
?>