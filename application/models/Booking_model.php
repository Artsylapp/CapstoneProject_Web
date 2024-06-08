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
            'orders_tbl_services' => json_encode($data['services']),
            'orders_tbl_empName' => json_encode($data['masseurs']),
            'orders_tbl_location' => json_encode($data['locations']),
            'orders_tbl_status' => "ON-GOING",
            'orders_tbl_cost' => $data['totalCost']
        ];

        $changeStatus = [
            'accounts_tbl_name' => $data['masseurs'],
            'accounts_tbl_status' => 'UNAVAILABLE'
        ];

        $this->db->insert('orders_tbl', $bookingData);
    }
}
?>