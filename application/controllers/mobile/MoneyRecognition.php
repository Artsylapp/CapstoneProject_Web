<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MoneyRecognition extends CI_Controller {

    public function upload_money_image() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'error' => 'Invalid request method.']);
            return;
        }

        // Load necessary helpers and libraries
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
            echo json_encode(['success' => false, 'error' => $this->upload->display_errors()]);
            return;
        }

        // File upload succeeded
        $fileData = $this->upload->data();
        $filePath = realpath($fileData['full_path']);
        $classes = [];

        // Roboflow API endpoints
        $roboflowApiUrl1 = "https://detect.roboflow.com/final-yolov8-annotation/1?api_key=ZkHJirV5OTz4cA9P0RPG";
        $roboflowApiUrl2 = "https://detect.roboflow.com/peso-coins/1?api_key=ZkHJirV5OTz4cA9P0RPG";

        // Send the image to the Roboflow API (two endpoints)
        $responses = [];
        foreach ([$roboflowApiUrl1, $roboflowApiUrl2] as $url) {
            $response = $this->send_image_to_roboflow($url, $filePath);
            if ($response['success']) {
                $responses[] = $response['data'];
                if (isset($response['data']['predictions']) && is_array($response['data']['predictions'])) {
                    foreach ($response['data']['predictions'] as $prediction) {
                        if (isset($prediction['class']) && $prediction['confidence'] >= 0.7) {
                            $classes[] = $prediction['class'];
                        }
                    }
                }
            }
        }

        // Return the detected classes
        if (!empty($classes)) {
            echo json_encode(['success' => true, 'classes' => $classes]);
        } else {
            echo json_encode(['success' => false, 'error' => 'No valid classes detected.']);
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
            return ['success' => false, 'error' => 'Invalid JSON response: ' . json_last_error_msg()];
        }

        return ['success' => true, 'data' => $decodedResponse];
    }
}
