<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model{
    
        /* CONSTRUCTOR */
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

}