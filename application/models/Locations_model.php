<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Locations_model extends CI_Model{

    // create new location
    public function createLocation($data)
    {
        $this->db->insert('location_tbl', $data);
    }

    // get all locations
    public function getLocations()
    {
        $query = $this->db->get('location_tbl');
        return $query->result();
    }

    // get location by id
    public function getLocation($id)
    {
        $query = $this->db->get_where('location_tbl', array('location_tbl_id' => $id));
        return $query->row();
    }

    // update location data
    public function updateLocation($data)
    {
        $this->db->where('location_tbl_id', $data['location_tbl_id']);
        $this->db->update('location_tbl', $data);
    }

    // delete location data
    public function deleteLocation($item)
    {
        $this->db->where('location_tbl_id', $item);
        $this->db->delete('location_tbl');
    }
}