<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
use chriskacerguis\RestServer\RestController;

class ApiAccounts extends RestController{

    public function __construct(){
        parent::__construct();
        $this->load->model('Account_model');
    }

    // API GET TEST (GET)
    public function index_get(){
        // echo "API accounts index page";
        $employee = new Account_model;
        $result = $employee->getAccountsAPI();
        $this->response($result, 200);
    }

    // API INSERT TEST
    // public function insertUser_post(){
    //     $account = new Account_model;

    //     $data = [
            
    //         'accounts_tbl_type' => $this->post('accounts_type'),
    //         'accounts_tbl_name' => $this->post('accounts_name'),
    //         'accounts_tbl_address' => $this->post('accounts_address'),
    //         'accounts_tbl_contact' => $this->post('accounts_contact'),

    //     ];

    //     // Validation check
    //     foreach ($data as $key => $value) {
    //         if (empty(trim($value))) {
    //             $this->response([
    //                 'status' => false,
    //                 'message' => "The field $key cannot be empty"
    //             ], RestController::HTTP_BAD_REQUEST);
    //             return;
    //         }
    //     }

    //     $result = $account->createAccount($data);

    //     if($result > 0){
    //         $this->response([
    //             'status' => true,
    //             'message' => 'New user has been created'
    //         ], RestController::HTTP_OK);
    //     }else{
    //         $this->response([
    //             'status' => false,
    //             'message' => 'Failed to create new user'
    //         ], RestController::HTTP_BAD_REQUEST);
    //     }

        // $this->response($data, 200);
    // }

    // API EDIT TEST (GET)
    public function editUser_get($id){
        $account = new Account_model;
        $result = $account->getAccount($id);
        $this->response($result, 200);

    }

    // API UPDATE TEST (PUT)
    public function updateUser_put($id){

        $account = new Account_model;
        $data = [
            'accounts_tbl_type' => $this->put('accounts_tbl_type'),
            'accounts_tbl_name' => $this->put('accounts_tbl_name'),
            'accounts_tbl_address' => $this->put('accounts_tbl_address'),
            'accounts_tbl_contact' => $this->put('accounts_tbl_contact'),
        ];
        $update_result = $account->updateAcc($id, $data);

        // Validation check
        foreach ($data as $key => $value) {
            if (empty(trim($value))) {
                $this->response([
                    'status' => false,
                    'message' => "The field $key cannot be empty"
                ], RestController::HTTP_BAD_REQUEST);
                return;
            }
        }

        if($update_result > 0){
            $this->response([
                'status' => true,
                'message' => 'User has been updated'
            ], RestController::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'message' => 'Failed to update User'
            ], RestController::HTTP_BAD_REQUEST);
        }

        $this->response($data, 200);
    }

    // API DELETE TEST
    public function deleteUser_delete($id){
        $account = new Account_model;
        $delete_result = $account->deleteAccount($id);

        if($delete_result > 0){
            $this->response([
                'status' => true,
                'message' => 'User has been deleted'
            ], RestController::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'message' => 'Failed to delete User'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}