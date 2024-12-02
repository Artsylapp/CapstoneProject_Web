
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Money Scanner</title>
    <script>
        // Request permission for camera access
        function requestCameraPermission() {
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia({ video: true })
                    .then(function(stream) {
                        // Permission granted
                        console.log("Camera permission granted");
                        stream.getTracks().forEach(track => track.stop()); // Stop the stream after getting permission
                        openCamera(); // Open the camera
                    })
                    .catch(function(err) {
                        // Permission denied
                        console.error("Camera permission denied: ", err);
                        alert("Camera permission is required to use the scanner.");
                    });
            } else {
                alert("Your browser does not support camera access.");
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            
            // Simulate a click on the file input field when the page loads
            const inputElement = document.getElementById('money-scanner-input');
            inputElement.click(); // Open the camera automatically
        });

        // Function to automatically open the camera when the button is clicked
        function openCamera() {
            // Request camera permission on page load
            requestCameraPermission();
            const inputElement = document.getElementById('money-scanner-input');
            inputElement.click(); // Open the file input dialog with the camera as the default capture option
        }

        // Handle file input change (file selected)
        document.addEventListener('DOMContentLoaded', function() {
            const inputElement = document.getElementById('money-scanner-input');

            inputElement.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    // Create FormData and append the captured image
                    let formData = new FormData();
                    formData.append('money_image', this.files[0]);

                    // Send the file to the server
                    fetch("<?php echo base_url('camera/upload_money_image'); ?>", {
                            method: "POST",
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert("Recognition successful: " + data.result);
                            } else {
                                alert("Recognition failed: " + data.error);
                            }
                        })
                        .catch(error => {
                            console.error("Error:", error);
                            alert("Error uploading image. Please try again.");
                        });
                }
            });
        });
    </script>
</head>

<body>
    <h1>Money Scanner</h1>
    <form id="moneyForm" enctype="multipart/form-data">
        <!-- Hidden file input for the camera -->
        <input
            id="money-scanner-input"
            type="file"
            name="money_image"
            accept="image/*"
            capture="camera"
            style="display: none;"
            required />
    </form>

    <!-- Button to automatically open the camera -->
    <button type="button" onclick="requestCameraPermission()">Open Camera</button>
</body>

</html>