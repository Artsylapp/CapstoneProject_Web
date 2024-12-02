<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MoneyRecognition extends CI_Controller {

    public function upload_money_image() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->output_json(['success' => false, 'error' => 'Invalid request method.']);
            return;
        }

        // Load helpers and libraries
        $this->load->helper(['form', 'url']);
        $this->load->library('upload');

        // Configure file upload
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB
        $config['encrypt_name'] = true;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('image')) {
            // File upload failed
            $this->output_json(['success' => false, 'error' => 'File upload failed.']);
            return;
        }

        // File upload succeeded
        $fileData = $this->upload->data();
        $filePath = realpath($fileData['full_path']);
        $classes = [];

        // Roboflow API endpoints
        $apiEndpoints = [
            "https://detect.roboflow.com/final-yolov8-annotation/1?api_key=ZkHJirV5OTz4cA9P0RPG",
            "https://detect.roboflow.com/peso-coins/1?api_key=ZkHJirV5OTz4cA9P0RPG"
        ];

        // Send the image to the Roboflow API
        foreach ($apiEndpoints as $url) {
            $response = $this->send_image_to_roboflow($url, $filePath);
            if ($response['success']) {
                foreach ($response['data']['predictions'] ?? [] as $prediction) {
                    if (!empty($prediction['class']) && $prediction['confidence'] >= 0.7) {
                        $classes[] = $prediction['class'];
                    }
                }
            }
        }

        // Clean up the uploaded file
        unlink($filePath);

        // Return the detected classes
        if (!empty($classes)) {
            $this->output_json(['success' => true, 'classes' => $classes]);
        } else {
            $this->output_json(['success' => false, 'error' => 'No valid classes detected.']);
        }
    }

    private function send_image_to_roboflow($url, $filePath) {
        $cFile = curl_file_create($filePath);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, ['file' => $cFile]);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            return ['success' => false, 'error' => $error];
        }

        $decodedResponse = json_decode($response, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return ['success' => false, 'error' => 'Invalid JSON response.'];
        }

        return ['success' => true, 'data' => $decodedResponse];
    }

    private function output_json($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}
