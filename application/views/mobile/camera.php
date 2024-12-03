<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Camera</title>
</head>

<body>
    <h1>Open Camera Example</h1>
    <!-- File input for capturing an image -->
    <input type="file" accept="image/*" id="money-scanner-input" capture="camera" style="display: none;" />
    <!-- Button (optional, can be removed if not needed) -->
    <button style="width: 250px; height:100px;" type="button" class="buttonscan" id="money-scanner-button">Scan Money</button>

    <script>
        // Function to trigger camera
        function openCamera() {
            const cameraInput = document.getElementById('money-scanner-input');
            cameraInput.click();
        }

        // Automatically open the camera when the page loads
        window.onload = openCamera;

        // Optional: Keep button functionality if needed
        document.getElementById('money-scanner-button').addEventListener('click', openCamera);
    </script>
</body>

</html>
