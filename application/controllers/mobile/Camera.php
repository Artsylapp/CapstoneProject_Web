<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Camera extends CI_Controller {

    /* CONSTRUCTOR */
    public function __construct() {
        parent::__construct();
        $this->load->helper(['url', 'form']); // Load URL and Form helpers
        $this->load->library('session'); // Load the session library
        $this->load->library('upload'); // Load upload library
        $this->load->model('mobile/Payment_model'); // Load the Booking model
    }

    public function index() {
        // Retrieve parameters
        $data['booking_id'] = $this->input->get('booking_id');
        $data['masseur'] = $this->input->get('masseur');
        $data['workstation'] = $this->input->get('workstation');

        // Load the camera view
        $this->load->view('mobile/initialize-scripts');
        $this->load->view('mobile/camera', $data);
    }

    public function upload_money_image() {
        // Configure upload settings
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB
        $config['encrypt_name'] = true; // Prevent file name conflicts and increase security

        $this->upload->initialize($config);

        // Check if the file upload succeeded
        if (!$this->upload->do_upload('money_image')) {
            $error = $this->upload->display_errors();
            echo json_encode(['success' => false, 'error' => strip_tags($error)]);
            return;
        }

        // File upload successful
        $data = $this->upload->data();
        $filePath = $data['full_path'];

        try {
            // Process the image (custom recognition logic)
            $recognitionResult = $this->processMoneyImage($filePath);

            echo json_encode(['success' => true, 'result' => $recognitionResult]);
        } catch (Exception $e) {
            // Handle processing errors
            echo json_encode(['success' => false, 'error' => 'Image processing failed.']);
        }
    }

    private function processMoneyImage($filePath) {
        // Placeholder for money recognition logic
        // Example: Integrate with an external API, ML model, or library
        return "Recognized currency details"; // Replace with real logic
    }
}
