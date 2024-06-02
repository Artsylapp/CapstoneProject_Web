<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location_model extends CI_Model{

    /* CONSTRUCTOR */
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function createLocation($data){
        $this->db->insert('location_tbl', $data);
        // print_r($data);
    }

    public function getLocations(){
        $query = $this->db->get('location_tbl');
        return $query->result();
    }

    public function getLocation($id){
        $query = $this->db->get_where('location_tbl', array('location_tbl_id' => $id));
        return $query->row();
    }

    public function updateLocation($data){
        $this->db->where('location_tbl_id', $data['location_tbl_id']);
        $this->db->update('location_tbl', $data);

        // echo "<pre>";
        // print_r($data);
    }

    public function deleteLocation($item){
        $this->db->where('location_tbl_id', $item);
        $this->db->delete('location_tbl');
    }

}