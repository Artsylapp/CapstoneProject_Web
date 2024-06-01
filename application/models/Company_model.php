<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company_model extends CI_Model{
    
        /* CONSTRUCTOR */
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function createCompany($data){
        $this->db->insert('company_tbl', $data);
        // print_r($data);
    }

    public function getCompanies(){
        $query = $this->db->get('company_tbl');
        return $query->result();
    }

    public function getCompany($user) {
        $this->db->where('company_tbl_name', $user);
        $query = $this->db->get('company_tbl'); // Assuming company_tbl is the table name
        return $query->result();
    }

    public function getCompanyWeb($username) {
        $this->db->where('company_tbl_name', $username);
        $query = $this->db->get('company_tbl'); // Replace 'company_table' with your actual table name
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function updateCompany($data){
        $this->db->where('company_tbl_id', $data['company_tbl_id']);
        $this->db->update('company_tbl', $data);
    }

    public function deleteCompany($item){
        $this->db->where('company_tbl', $item);
        $this->db->delete('company_tbl');
    }
}