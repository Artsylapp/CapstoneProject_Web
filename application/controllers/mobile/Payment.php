<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Camera extends CI_Controller {

    /* CONSTRUCTOR */
    public function __construct() {
        parent::__construct();
        $this->load->helper(['url', 'form']); // Load URL and Form helpers
        $this->load->library('session'); // Load the session library
        $this->load->model('mobile/Payment_model'); // Load the Booking_model
    }

    public function index() {
        $data['booking_id'] = $this->input->get('booking_id');
        $data['masseur'] = $this->input->get('masseur');
        $data['workstation'] = $this->input->get('workstation');
        
        $this->load->view('mobile/camera', $data);
    }

    public function upload_money_image() {
        // Load the upload library
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('money_image')) {
            // Upload failed
            $error = ['error' => $this->upload->display_errors()];
            echo json_encode(['success' => false, 'error' => $error]);
        } else {
            // Successfully uploaded
            $data = $this->upload->data();
            $filePath = $data['full_path'];

            // Process the image (money recognition logic)
            // Assuming you have a recognition library or function
            $recognitionResult = $this->processMoneyImage($filePath);

            echo json_encode(['success' => true, 'result' => $recognitionResult]);
        }
    }

    private function processMoneyImage($filePath) {
        // Placeholder for money recognition logic
        // For example, use OpenCV, ML model, or external API
        return "Recognized currency details";
    }

}
