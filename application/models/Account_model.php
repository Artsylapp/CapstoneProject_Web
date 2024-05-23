<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model{
    
        /* CONSTRUCTOR */
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function createAccount($data){
        return $this->db->insert('accounts_tbl', $data);
    }

    public function getAccounts(){
        $query = $this->db->get('accounts_tbl');
        return $query->result();
    }

    public function getAccount($id){
        $query = $this->db->get_where('accounts_tbl', array('accounts_tbl_id' => $id));
        return $query->row(); //dont use result() because it will return an array

        // $this->db->where('accounts_tbl_id', $id);
        // $query = $this->db->get('accounts_tbl');
        // return $query->row();
    }

    public function updateAccount($data){
        $this->db->where('accounts_tbl_id', $data['accounts_tbl_id']);
        return $this->db->update('accounts_tbl', $data);

        // echo "<pre>";
        // print_r($data);
    }

    public function deleteAccount($id){
        $this->db->where('accounts_tbl_id', $id);
        return $this->db->delete('accounts_tbl');
    }


    /* API */
    public function getAccountsAPI(){
        $query = $this->db->get('accounts_tbl');
        return $query->result();
    }

    // test API update
    public function updateAcc($id, $data){
        $this->db->where('accounts_tbl_id', $id);
        return $this->db->update('accounts_tbl', $data);
    }
}