<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analytics_model extends CI_Model{

    public function getAnalytics(){
        // get all completed orders in the database
        $this->db->where('orders_tbl_status', 'COMPLETED');
        $query = $this->db->get('orders_tbl');
        return $query->result_array();
}
    
    public function getCancelled(){
        $this->db->where('orders_tbl_status', 'CANCELLED');
        $query = $this->db->get('orders_tbl');
        return $query->result_array();
    }
}
    
