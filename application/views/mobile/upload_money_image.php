<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $uploadDir = 'assets/images/';
        $uploadFile = $uploadDir . basename($_FILES['image']['name']);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {

            // Extract and print only the class labels from predictions
            $classes = [];
            $filePath = realpath($uploadFile);
            $roboflowApiUrl = "https://detect.roboflow.com/final-yolov8-annotation/1?api_key=ZkHJirV5OTz4cA9P0RPG";

            // Initialize cURL session
            $ch = curl_init($roboflowApiUrl);

            // Prepare file for upload
            $cFile = curl_file_create($filePath);

            // cURL options for file upload
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, [
                'file' => $cFile
            ]);

            // Execute the cURL request
            $response = curl_exec($ch);
            $error = curl_error($ch);
            curl_close($ch);

            // Check for cURL errors
            if ($error) {
                echo json_encode(['success' => false, 'error' => 'Roboflow API error: ' . $error]);
            } else {
                // Debugging: Output the raw response for inspection
                file_put_contents('response_debug.json', $response);

                // Decode the response
                $decodedResponse = json_decode($response, true);
                if ($decodedResponse === null && json_last_error() !== JSON_ERROR_NONE) {
                    echo json_encode(['success' => false, 'error' => 'Invalid JSON response from Roboflow API: ' . json_last_error_msg()]);
                } else {
                    if (isset($decodedResponse['predictions']) && is_array($decodedResponse['predictions'])) {
                        foreach ($decodedResponse['predictions'] as $prediction) {
                            if (isset($prediction['class']) && $prediction['confidence'] >= 0.7) {
                                $classes[] = $prediction['class'];
                            }
                        }
                    }
                }
            }



            $roboflowApiUrl = "https://detect.roboflow.com/peso-coins/1?api_key=ZkHJirV5OTz4cA9P0RPG";

            // Initialize cURL session
            $ch = curl_init($roboflowApiUrl);

            // Prepare file for upload
            $cFile = curl_file_create($filePath);

            // cURL options for file upload
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, [
                'file' => $cFile
            ]);

            // Execute the cURL request
            $response = curl_exec($ch);
            $error = curl_error($ch);
            curl_close($ch);

            // Check for cURL errors
            if ($error) {
                echo json_encode(['success' => false, 'error' => 'Roboflow API error: ' . $error]);
            } else {
                // Debugging: Output the raw response for inspection
                file_put_contents('response_debug.json', $response);

                // Decode the response
                $decodedResponse = json_decode($response, true);
                if ($decodedResponse === null && json_last_error() !== JSON_ERROR_NONE) {
                    echo json_encode(['success' => false, 'error' => 'Invalid JSON response from Roboflow API: ' . json_last_error_msg()]);
                } else {
                    if (isset($decodedResponse['predictions']) && is_array($decodedResponse['predictions'])) {
                        foreach ($decodedResponse['predictions'] as $prediction) {
                            if (isset($prediction['class']) && $prediction['confidence'] >= 0.7) {
                                $classes[] = $prediction['class'];
                            }
                        }
                    }
                }
            }


            if(!empty($classes)){

                    // Respond with the class labels
                    echo json_encode([
                        'success' => true,
                        'classes' => $classes
                    ]);
            }

        } else {
            echo json_encode(['success' => false, 'error' => 'Error moving the uploaded file.']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'No image uploaded or upload error.']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method.']);
}
?>
