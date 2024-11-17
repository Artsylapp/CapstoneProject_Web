<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model{

    // create account
    public function createAccount($data)
    {
        return $this->db->insert('accounts_tbl', $data);
    }

    public function getAccountbyName($name)
    {
        $query = $this->db->get_where('accounts_tbl', array('accounts_tbl_name' => $name));
        return $query->row();
    }

    // get all accounts
    public function getAccounts()
    {
        $query = $this->db->get('accounts_tbl');
        return $query->result();
    }

    // get account by id
    public function getAccount($id)
    {
        $query = $this->db->get_where('accounts_tbl', array('accounts_tbl_id' => $id));

        //dont use result() because it will return an array
        return $query->row(); 
    }

    // update account
    public function updateAccount($data)
    {
        $this->db->where('accounts_tbl_id', $data['accounts_tbl_id']);
        return $this->db->update('accounts_tbl', $data);
    }

    // delete account
    public function deleteAccount($id)
    {
        $this->db->where('accounts_tbl_id', $id);
        return $this->db->delete('accounts_tbl');
    }
}