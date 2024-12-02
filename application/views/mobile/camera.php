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
            // Remove automatic click triggering
            // const inputElement = document.getElementById('money-scanner-input');
            // inputElement.click(); // Removed this line to stop auto-triggering the file chooser

            // Handle file input change (file selected)
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

        // Handle form submission and prevent default action
        function handleFormSubmit(event) {
            event.preventDefault(); // Prevent form submission

            const inputElement = document.getElementById('money-scanner-input');
            if (inputElement.files && inputElement.files[0]) {
                let formData = new FormData();
                formData.append('money_image', inputElement.files[0]);

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
        }
    </script>
</head>

<body>
    <h1>Money Scanner</h1>
    <form id="moneyForm" enctype="multipart/form-data" method="POST" onsubmit="handleFormSubmit(event)">
        <!-- Hidden file input for the camera -->
        <input
            id="money-scanner-input"
            type="file"
            name="money_image"
            accept="image/*"
            capture="camera"
            style="display: none;"
            required />
        <!-- Button to open the camera (can trigger click) -->
        <button type="button" id="Open-camera" onclick="document.getElementById('money-scanner-input').click();">Open Camera</button>
    </form>
</body>

</html>
