<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company_model extends CI_Model{

    // create company account
    public function createCompany($data)
    {
        $this->db->insert('company_tbl', $data);
    }

    // get all company account
    public function getCompanies()
    {
        $query = $this->db->get('company_tbl');
        return $query->result();
    }

    // get company account by id
    public function getCompany($user)
    {
        $this->db->where('company_tbl_name', $user);
        $query = $this->db->get('company_tbl'); // Assuming company_tbl is the table name
        return $query->result();
    }

    // get company account by id
    public function getCompanyWeb($username)
    {
        $this->db->where('company_tbl_name', $username);
        $query = $this->db->get('company_tbl'); // Replace 'company_table' with your actual table name
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    // update company account
    public function updateCompany($data)
    {
        $this->db->where('company_tbl_id', $data['company_tbl_id']);
        $this->db->update('company_tbl', $data);
    }

    // delete company account
    public function deleteCompany($item)
    {
        $this->db->where('company_tbl', $item);
        $this->db->delete('company_tbl');
    }
}