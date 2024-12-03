<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Camera</title>
</head>

<body>
    <h1>Open Camera Example</h1>

    <form id="money-scan-form" enctype="multipart/form-data">
        <input type="file" accept="image/*" id="money-scanner-input" capture="camera" style="display: none;" />
        <button type="button" class="buttonscan" id="money-scanner-button" style="z-index:-1; margin-top:7vh;">Scan Money</button>
    </form>
    

    <script>
        // Function to trigger camera
        function openCamera() {
            alert("openCamera() function triggered!");

            const cameraInput = document.getElementById('money-scanner-input');
            cameraInput.click();
        }

        // Optional: Keep button functionality if needed
        document.getElementById('money-scanner-button').addEventListener('click', openCamera);

        document.getElementById('money-scanner-input').addEventListener('change', function() { // Show the preloader
        document.getElementById('loading-indicator').style.display = 'flex';

        let formData = new FormData();
        formData.append('image', document.getElementById('money-scanner-input').files[0]);

        fetch('upload_money_image.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log("Raw Response:", data); // Log raw response for debugging
                if (data.success) {
                    if (data.classes && Array.isArray(data.classes)) {
                        console.log("Classes Detected:", data.classes);

                        // Define the mapping for bills and coins
                        const classMappingBills = {
                            'Twenty': 20,
                            'Fifty': 50,
                            'One_Hundred': 100,
                            'Two_Hundred': 200,
                            'Five_Hundred': 500,
                            'One_Thousand': 1000
                        };

                        const classMappingCoins = {
                            '1 peso': 1,
                            '5 pesos': 5,
                            '10 pesos': 10,
                            '20 pesos': 20
                        };

                        // Initialize totals
                        let totalBills = 0;
                        let totalCoins = 0;

                        // Sum up the values based on the class mappings
                        data.classes.forEach(cls => {
                            if (classMappingBills.hasOwnProperty(cls)) {
                                totalBills += classMappingBills[cls];
                            } else if (classMappingCoins.hasOwnProperty(cls)) {
                                totalCoins += classMappingCoins[cls];
                            }
                        });
                        let totalamount = 0;
                        let bookingamount = 0;
                        // Display results
                        console.log("Detected classes: " + data.classes.join(', '));
                        console.log("Total Bills: " + totalBills);
                        console.log("Total Coins: " + totalCoins);

                        totalamount = totalBills + totalCoins;
                        bookingamount = <?php echo json_encode($totalcost); ?>; // Ensure PHP variable is properly embedded

                        // Display results
                        console.log("Detected classes: " + data.classes.join(', '));
                        console.log("Total Bills: " + totalBills);
                        console.log("Total Coins: " + totalCoins);
                        console.log("Total Amount: " + totalamount);
                        console.log("Booking Amount: " + bookingamount);

                        if (totalamount === bookingamount) {
                            // Set total amount in input field
                            document.getElementById('scanned_amount').value = totalamount;

                            let message = `Total scanned amount is ${totalamount}.`;
                            // Speak the total amount
                            speaktext(message);
                        } else {
                            let message = `Total scanned amount is ${totalamount}. It should be equal to the total booking amount ${bookingamount}.`;
                            speakscanned(message);
                            console.log(`Restarting Total scanned amount is ${totalamount} only. It should be equal to the total booking amount ${bookingamount}.`);

                        }
                    } else {
                        console.error("No classes found in the response.");
                        speakscanned("No Money Detected, please try again.");

                    }
                } else {
                    console.error("Error:", data.error);
                    speakscanned("Error Please Report To Supervisor.");

                }
            })
            .catch(error => {
                console.error('Error uploading image:', error);
                speakscanned("Error Please Report To Supervisor.");

            })
    });

    // Automatically open the camera when the page loads
    window.onload = openCamera();

    </script>

</body>

</html>
