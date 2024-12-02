<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Scanner</title>
    <script>
        function submitForm() {
            const formData = new FormData(document.getElementById("moneyForm"));

            fetch("<?php echo base_url('mobile/scanner'); ?>", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Recognition Success: " + data.classes);
                } else {
                    alert("Error: " + data.error);
                }
            })
            .catch(err => console.error(err));
        }
    </script>
</head>
<body>
    <h1>Money Scanner</h1>
    <form id="moneyForm" enctype="multipart/form-data">
        <!-- Hidden file input -->
        <input 
            id="money_image" 
            type="file" 
            name="money_image" 
            accept="image/*" 
            capture="environment" 
            style="display: none;" 
            required 
        />

        <!-- Button to trigger the file input -->
        <button type="button" onclick="document.getElementById('money_image').click()">Open Camera</button>

        <!-- Scan Money Button -->
        <button type="button" onclick="submitForm()">Scan Money</button>
    </form>
</body>
</html>
