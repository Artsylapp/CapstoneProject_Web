<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_model extends CI_Model {

    /* CONSTRUCTOR */
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function saveBooking($data) {
        $this->db->insert('bookings_tbl', $data);
    }
}
?>