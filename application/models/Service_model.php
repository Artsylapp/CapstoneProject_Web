<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_model extends CI_Model{

    public function createService($data)
    {
        // $this->db->insert('services', $data); //inserts data into the table 'services'
        print_r($data);
    }
}