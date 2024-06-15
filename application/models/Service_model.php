<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_model extends CI_Model{

    //inserts data into the table 'services'
    public function createService($data)
    {
        $this->db->insert('services_tbl', $data); 
    }

    //get all services from the table
    public function getServices() 
    {
        $query = $this->db->get('services_tbl');
        return $query->result();
    }

    //get specific service from the table
    public function getService($id) 
    {
        $query = $this->db->get_where('services_tbl', array('services_tbl_id' => $id));
        return $query->row();
    }

    //update specific service from the table
    public function updateService($data, $id) 
    {
        $this->db->where('services_tbl_id', $id);
        $this->db->update('services_tbl', $data);
    }
    
    //delete specific service from the table
    public function deleteService($id) 
    {
        $this->db->where('services_tbl_id', $id);
        $this->db->delete('services_tbl');
    }
}