<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_model extends CI_Model{

    public function createService($data)
    {
        $this->db->insert('services_tbl', $data); //inserts data into the table 'services'
        // print_r($data);
    }

    public function getServices() //get all services from the table
    {
        $query = $this->db->get('services_tbl');
        return $query->result();
    }

    public function getService($id) //get specific service from the table
    {
        $query = $this->db->get_where('services_tbl', array('services_tbl_id' => $id));
        return $query->row();
    }

    public function updateService($data, $id) //update specific service from the table
    {
        $this->db->where('services_tbl_id', $id);
        $this->db->update('services_tbl', $data);
    }

    public function deleteService($id) //delete specific service from the table
    {
        $this->db->where('services_tbl_id', $id);
        $this->db->delete('services_tbl');
    }
}