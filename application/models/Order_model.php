<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model{

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getOrders() {
        $query = $this->db->get('orders_tbl');
        return $query->result();
    }

    public function getOrder($id) {
        $query = $this->db->get_where('orders_tbl', array('orders_tbl_id' => $id));
        return $query->result();
    }

    public function updateOrder($data) {
        $this->db->where('orders_tbl_id', $data['orders_tbl_id']);
        $this->db->update('orders_tbl', $data);
        return $data;
    }

    public function deleteOrder($id) {
        $this->db->where('orders_tbl_id', $id);
        $this->db->delete('orders_tbl');
    }

    public function getOngoingOrders() {
        $query = $this->db->get_where('orders_tbl', array('orders_tbl_status' => 'Ongoing'));
        return $query->result();
    }



}