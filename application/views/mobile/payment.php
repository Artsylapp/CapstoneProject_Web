<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Payment</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url('assets/css/mobile/payment.css'); ?>">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  </head>

    <body  style="overflow:hidden; background-color:#8ecfe6;">

    <?php if(!isset($_POST['cancel'])){ ?>
      
      <script>
          function speakonload(text) {
              responsiveVoice.speak(text);
          }

          document.addEventListener('DOMContentLoaded', function() {
                    speakonload("Viewing record with Booking ID <?php echo $_REQUEST["booking_id"]; ?>");
          });
      </script>

    <?php }else{ ?>

      <script>
          function speakonload(text) {
              responsiveVoice.speak(text);
          }

          document.addEventListener('DOMContentLoaded', function() {
                    speakonload("<?php echo $message; ?>");
          });
      </script>

    <?php } ?>

    <div class="container" style="overflow:hidden;">
        <center>
            <h1 class="title-label">Booking Details</h1>
        </center>

            <div id="loading-indicator" class="loading-indicator">
                <div class="spinner"></div>
                <p>Processing...</p>
            </div>

            <div class="row">
                <div class="col-md-12" >
                <center>

                    <div class="containergg">
                        <center>
                            <div class="booking-card" style="padding:2vh;">
                                <div class="booking-row date-time" style="text-align:left; font-size:2vh;"> 
                                    <span style="font-weight:bold;">Booking ID:</span> <?php echo $_REQUEST['booking_id']; ?>
                                </div>

                                <div class="booking-row date-time" style="text-align:left; font-size:2vh;">
                                    <span style="font-weight:bold;">Status:</span> 
                                    <span class="<?php echo $status; ?>"><?php echo $status; ?></span>
                                </div>

                                <div class="booking-row date-time" style="text-align:left; font-size:2vh;">
                                    <span style="font-weight:bold;">Masseurs:</span> 
                                    <?php echo $customer; ?>
                                </div>

                                <div>
                                    <div class="booking-row date-time" style="text-align:left; font-size:2vh; font-weight:bold;">
                                        Service:
                                    </div>

                                    <div class="booking-row date-time" style="text-align:left; font-size:2vh;">
                                        <?php echo $service; ?>
                                    </div>
                                </div>

                                <hr style="border-top:1px solid black; width:100%;">

                                <div class="booking-row date-time">
                                    <span class="left">
                                        <span style="font-weight:bold;">Price:</span> 
                                        <?php echo $price; ?>
                                    </span>

                                    <span class="right">
                                        <span style="font-weight:bold;">Count:</span> 
                                        <?php echo $quantity; ?>x
                                    </span>
                                </div>

                                <div class="booking-row date-time" style="text-align:left;">
                                    <span style="font-weight:bold;">Total Amount:</span> 
                                    ₱ <?php echo number_format($totalcost,2); ?>
                                </div>

                                <?php if($orders_paid_amount > 0){ ?>
                                    <div class="booking-row date-time" style="text-align:left;">
                                        <span style="font-weight:bold;">Paid Amount:</span> 
                                        ₱ <?php echo number_format($orders_paid_amount,2); ?>
                                    </div>
                                <?php } ?>

                            </div>
                        </center>

                        <?php if($orders_paid_amount == 0){ ?>
                            <button type="button" class="buttongg1 type--C" id="payment-link" style="margin-bottom:1vh;">
                                <div class="buttongg1__line"></div>
                                <div class="buttongg1__line"></div>
                                <span class="buttongg1__text">
                                    PROCEED PAYMENT
                                </span>
                            </button>
                        <?php } ?>

                        <form action="" method="POST" id="cancel-form">
                            <input type="hidden" name="booking_id" value="<?php echo $booking_id; ?>">
                            <button type="submit" class="buttongg1 type--B" id="canceller2" name="canceller2"  style="margin-bottom:1vh;">
                                <div class="buttongg1__line"></div>
                                <div class="buttongg1__line"></div>
                                <span class="buttongg1__text">
                                    CANCEL ORDER
                                </span>
                            </button>
                        </form>

                        <button class="buttongg1 type--A" id="bookings-link" data-message="Going back to the bookings.">
                            <a href="bookings.php">
                                <div class="buttongg1__line"></div>
                                <div class="buttongg1__line"></div>
                                <span class="buttongg1__text">
                                    BACK
                                </span>
                            </a>
                        </button>

                        <!-- The Modal for payment options -->
                        <div id="paymentModal" class="modal">
                            <div class="modal-content" style="height:57vh !important; max-height: 100vh !important; margin-top:25%;">
                                <span class="close" id="close-modal">&times;</span>
                                <h1 style="font-weight:bold; font-size:3vh;">Payment Options</h1>

                                <hr>

                                <p style="margin-bottom:0.5vh;">Manually Input Payment Below:</p>

                                <!-- Manual payment form -->
                                <form action="" method="POST" id="payment-form">
                                    <input type="text" name="amountinput" id="amount-input" class="modal-input" placeholder="Enter amount" required>
                                    <button type="submit" class="buttongg1 type--B" id="submitpayment" name="submitpayment" style="margin-bottom:1vh; height:8.5vh;">
                                        <div class="buttongg1__line"></div>
                                        <div class="buttongg1__line"></div>
                                        <span class="buttongg1__text">
                                            SUBMIT PAYMENT
                                        </span>
                                    </button>
                                </form>

                                <hr>

                                <!-- Scan money payment form -->
                                <form id="money-scan-form" enctype="multipart/form-data">
                                    <input type="file" accept="image/*" id="money-scanner-input" capture="camera" style="display: none;" />
                                    <button type="button" class="buttonscan" id="money-scanner-button" style="z-index:-1; margin-top:7vh;">Scan Money</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </center>
                </div>
            </div>
    </div>
    </body>

    <!-- Text to speech script -->
    <script>
        // Function to trigger speech
        function speakscanned(text) {
            responsiveVoice.speak(text, null, {
                onend: function() {
                    location.reload(); // Reload the page after speech finishes
                }
            });
        }

        // Function to trigger speech
        function speakg1(text) {
                    responsiveVoice.speak(text);
        }

        // Function to handle speech synthesis
        function speakg1g(text) {
                    responsiveVoice.speak(text);
        }

        function speaktext(text) {
            responsiveVoice.speak(text, undefined, {
                onend: function() {
                    console.log("Saving payment");
                    document.getElementById('scanned-form').submit();
                }
            });
        }
    </script>

    <!-- Money Scan script -->
    <script>
        document.getElementById('money-scanner-button').addEventListener('click', function() {
            document.getElementById('money-scanner-input').click();
        });

        document.getElementById('money-scanner-input').addEventListener('change', function() {    // Show the preloader
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
                        let totalamount = 0;
                        let bookingamount = 0;

                        // Sum up the values based on the class mappings
                        data.classes.forEach(cls => {
                            if (classMappingBills.hasOwnProperty(cls)) {
                                totalBills += classMappingBills[cls];
                            } else if (classMappingCoins.hasOwnProperty(cls)) {
                                totalCoins += classMappingCoins[cls];
                            }
                        });

                        totalamount = totalBills + totalCoins;
                        bookingamount = <?php echo json_encode($totalcost); ?>; // Ensure PHP variable is properly embedded

                        // Display results
                        console.log("Detected classes: " + data.classes.join(', '));
                        console.log("Total Bills: " + totalBills);
                        console.log("Total Coins: " + totalCoins);

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
    </script>

    <!-- Button tap count/assist tts script -->
    <script>
        // Define the button and input elements
        let submitPaymentButton = document.getElementById('submitpayment');
        let paymentForm = document.getElementById('payment-form');
        let amountInput = document.getElementById('amount-input');
        let tapCountPaymentSubmit = 0;
        let tapTimeoutPaymentSubmit;
        let totalpaymentamount = <?php echo $totalcost; ?>

        // Function to handle speech prompt on hover or first tap
        function triggerSpeechOnHoverOrFirstTapSubmit() {
            if (tapCountPaymentSubmit === 0) {
                speakg1("Do you want to proceed on submitting payment? Double tap if yes.");
                console.log("Do you want to proceed on submitting payment? Double tap if yes.");

                // Reset after 5 seconds to allow for double-tap
                setTimeout(function() {
                    tapCountPaymentSubmit = 0; // Reset tap count
                }, 5000);
            }
        }

        // Function to check if amount input is empty
        function checkAmountAndSubmit() {
            if (amountInput.value.trim() === '') {
                speakg1("Please input amount before submitting payment.");
                console.log("Please input amount before submitting payment.");
                return false; // Prevent form submission
            }
            if(amountInput.value.trim() != totalpaymentamount){

                speakg1("Amount should be equal to the total amount of booking.");
                console.log("Amount should be equal to the total amount of booking.");
                return false; // Prevent form submission
            }
            return true; // Allow form submission
        }

        // Handle double-tap to submit the form
        submitPaymentButton.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default form submission

            tapCountPaymentSubmit++; // Increment tap count

            if (tapCountPaymentSubmit === 1) {
                // First tap: Speech prompt
                triggerSpeechOnHoverOrFirstTapSubmit();

                // Set a timeout to reset tap count if no second tap happens
                tapTimeoutPaymentSubmit = setTimeout(function() {
                    tapCountPaymentSubmit = 0; // Reset tap count
                }, 1500); // Adjust time if necessary
            } else if (tapCountPaymentSubmit === 2) {
                // Second tap: Check if amount is provided and submit the form
                clearTimeout(tapTimeoutPaymentSubmit); // Clear the timeout to reset tap count
                tapCountPaymentSubmit = 0; // Reset tap count

                if (checkAmountAndSubmit()) {
                    paymentForm.submit(); // Submit the form
                }
            }
        });

        // Add hover and touch listeners
        function addHoverOrTouchListenerSubmit(element) {
            element.addEventListener('mouseenter', function() {
                triggerSpeechOnHoverOrFirstTapSubmit(); // Trigger speech on hover
            });

            element.addEventListener('touchstart', function(event) { // For mobile devices
                triggerSpeechOnHoverOrFirstTapSubmit(); // Trigger speech on touch start
            });
        }

        // Apply listeners to the submit payment button
        addHoverOrTouchListenerSubmit(submitPaymentButton);

        // Define the button elements
        let proceedPaymentButton = document.getElementById('payment-link');
        let paymentModal = document.getElementById('paymentModal');
        let closeModal = document.getElementById('close-modal');
        let tapCountPayment = 0;
        let tapTimeoutPayment;

        let inputmoney = document.getElementById('amount-input');
        // Function to handle the first interaction (hover or tap)
        function triggerSpeechOnHoverOrFirstTapPayment() {
            if (tapCountPayment === 0) {
                speakg1("Do you want to proceed with payment options? Double tap to open the modal.");
                console.log("Do you want to proceed with payment options? Double tap to open the modal.");

                // Reset after 5 seconds to allow for double-tap
                setTimeout(function() {
                    tapCountPayment = 0; // Reset tap count
                }, 5000);
            }
        }

        // Handle double-tap to open the modal
        proceedPaymentButton.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior

            tapCountPayment++; // Increment tap count

            if (tapCountPayment === 1) {
                // First tap: Speech prompt
                triggerSpeechOnHoverOrFirstTapPayment();

                // Set a timeout to reset tap count if no second tap happens
                tapTimeoutPayment = setTimeout(function() {
                    tapCountPayment = 0; // Reset tap count
                }, 1500); // Adjust time if necessary
            } else if (tapCountPayment === 2) {
                // Second tap: Open the modal
                clearTimeout(tapTimeoutPayment); // Clear the timeout to reset tap count
                tapCountPayment = 0; // Reset tap count
                paymentModal.style.display = "block"; // Show the modal

                inputmoney.focus();
                speakg1("You can type manually the amount or press the Scan Money at the middle of your screen. To scan just press the capture button at the bottom part of your screen.");
            }
        });

        // Close the modal when the user clicks on <span> (x)
        closeModal.onclick = function() {
            paymentModal.style.display = "none";
        }

        // Close the modal when the user clicks anywhere outside of the modal
        window.onclick = function(event) {
            if (event.target === paymentModal) {
                paymentModal.style.display = "none";
            }
        }

        // Add hover and touch listeners
        function addHoverOrTouchListenerPayment(element) {
            element.addEventListener('mouseenter', function() {
                triggerSpeechOnHoverOrFirstTapPayment(); // Trigger speech on hover
            });

            element.addEventListener('touchstart', function(event) { // For mobile devices
                triggerSpeechOnHoverOrFirstTapPayment(); // Trigger speech on touch start
            });
        }

        // Apply listeners to the proceed payment button
        addHoverOrTouchListenerPayment(proceedPaymentButton);

        // Cancel button handler
        let cancelButton = document.getElementById('canceller2');
        let cancelForm = document.getElementById('cancel-form');
        let cancelConfirmed = false;
        let tapCount = 0;
        let tapTimeout;

        // Function to handle the first interaction (hover or tap)
        function triggerSpeechOnHoverOrFirstTap() {
            if (!cancelConfirmed) {
                speakg1("Are you sure you want to cancel this booking? Double tap the cancel button to proceed.");
                cancelConfirmed = true;

                console.log("Are you sure you want to cancel this booking? Double tap the cancel button to proceed.");

                // Reset cancelConfirmed after 5 seconds to allow for double-tap
                setTimeout(function() {
                    cancelConfirmed = false;
                }, 5000);
            }
        }

        // Handle double-tap to submit the form
        cancelButton.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default form submission

            tapCount++; // Increment tap count

            if (tapCount === 1) {
                // First tap: Speech prompt
                triggerSpeechOnHoverOrFirstTap();

                // Set a timeout to reset tap count if no second tap happens
                tapTimeout = setTimeout(function() {
                    tapCount = 0; // Reset tap count
                }, 1500); // Adjust time if necessary
            } else if (tapCount === 2) {
                // Second tap: Submit the form
                clearTimeout(tapTimeout); // Clear the timeout to reset tap count
                tapCount = 0; // Reset tap count
                if (cancelConfirmed) {
                    console.log("Submitting form...");
                    cancelForm.submit(); // Submit the form
                }
            }
        });

        // Add hover and touch listeners
        function addHoverOrTouchListener(element) {
            element.addEventListener('mouseenter', function() {
                triggerSpeechOnHoverOrFirstTap(); // Trigger speech on hover
            });

            element.addEventListener('touchstart', function(event) { // For mobile devices
                triggerSpeechOnHoverOrFirstTap(); // Trigger speech on touch start
            });
        }

        // Apply listeners to the cancel button
        addHoverOrTouchListener(cancelButton);

        // Function to handle the first interaction (hover or tap)
        function triggerSpeechOnHoverOrFirstTapBack() {
            if (!cancelConfirmed) {
                speakg1("Going back to bookings.");
                cancelConfirmed = true;

                console.log("Going back to bookings.");

                // Reset cancelConfirmed after 5 seconds to allow for double-tap
                setTimeout(function() {
                    cancelConfirmed = false;
                }, 5000);
            }
        }

        // Add hover and touch listeners
        function addHoverOrTouchListenerBack(element) {
            element.addEventListener('mouseenter', function() {
                triggerSpeechOnHoverOrFirstTapBack(); // Trigger speech on hover
            });

            element.addEventListener('touchstart', function(event) { // For mobile devices
                triggerSpeechOnHoverOrFirstTapBack(); // Trigger speech on touch start
            });
        }

        // If applicable, add similar listeners to other buttons like the back button
        addHoverOrTouchListenerBack(document.getElementById("bookings-link"));

    </script>

    <script src="<?php echo $this->config->base_url('assets/js/mobile/payment.js'); ?>"></script>
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=p79khoOR"></script>

</html>