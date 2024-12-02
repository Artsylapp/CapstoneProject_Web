<?php
session_start();
include('includes/config.php');
error_reporting(1);
$logo_image = 'viamm_logo.png';
$logo2_image = 'viamm_logo.png';
$background = 'viamm_bg.jpg';
$booking_id = $_REQUEST['booking_id'];
$_SESSION['from'] = 'payments';
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['booking_id'])) {
    try {
        $new_status = 'CANCELLED';
        $booking_id = $_POST['booking_id'];

        // Update query
        $statement = $dbh->prepare("UPDATE orders_tbl SET orders_tbl_status = :new_status WHERE orders_tbl_id = :order_id");
        $statement->bindParam(':new_status', $new_status);
        $statement->bindParam(':order_id', $booking_id);
        $statement->execute();

        $message = "Selected Booking has been cancelled successfully.";
        header("Location: bookings.php");
        exit();
    } catch (PDOException $e) {
        $message = "Error updating order status: " . $e->getMessage();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['amountinput'])) {
    try {
        $paid_amount = $_POST['amountinput'];

        // Update query
        $statement = $dbh->prepare("UPDATE orders_tbl SET orders_paid_amount = :paid_amount WHERE orders_tbl_id = :order_id");
        $statement->bindParam(':paid_amount', $paid_amount);
        $statement->bindParam(':order_id', $booking_id);
        $statement->execute();

        $message = "Selected Booking has been paid successfully.";
    } catch (PDOException $e) {
        $message = "Error updating order status: " . $e->getMessage();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['scanned_amount'])) {
    try {
        $paid_amount = $_POST['scanned_amount'];

        // Update query
        $statement = $dbh->prepare("UPDATE orders_tbl SET orders_paid_amount = :paid_amount WHERE orders_tbl_id = :order_id");
        $statement->bindParam(':paid_amount', $paid_amount);
        $statement->bindParam(':order_id', $booking_id);
        $statement->execute();

        $message = "Selected Booking has been paid successfully.";
    } catch (PDOException $e) {
        $message = "Error updating order status: " . $e->getMessage();
    }
}


$orders_paid_amount = 0;
$statement = $dbh->prepare("SELECT * FROM orders_tbl WHERE orders_tbl_id = ?");
$statement->execute(array($booking_id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {

    // Assuming $total_amount contains the JSON data
    $total_amount = $row['orders_tbl_details'];

    // Decode the JSON string into a PHP associative array
    $total_amount_array = json_decode($total_amount, true);

    // Dynamically get the first service name (this can change based on the data)
    $service_keys = array_keys($total_amount_array['services']);
    $service = $service_keys[0];

    // Now use the service name to extract other values dynamically
    $price = $total_amount_array['services'][$service]['price'];
    $quantity = $total_amount_array['services'][$service]['amount'];
    $type = $total_amount_array['services'][$service]['type'];

    // Get the total cost
    $totalcost = $total_amount_array['orders_tbl_cost'];

    // Get the masseur (customer) dynamically
    $masseur_keys = array_keys($total_amount_array['masseurs']);
    $customer = $masseur_keys[0];
    $status = $row['orders_tbl_status'];
    $orders_paid_amount = $row['orders_paid_amount'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <?php include('includes/initialize-scripts.php'); ?>
    <link rel="stylesheet" href="includes/headers-css-master/styles/reset.min.css" />
    <link rel="stylesheet" href="includes/headers-css-master/styles/style.css" />
    <link rel="stylesheet" href="includes/headers-css-master/styles/header-3.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        /* Style for input box */
        .modal-input {
            width: calc(100% - 22px);
            /* Adjust width considering padding */
            padding: 10px;
            margin-bottom: 20px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Style for the money scanner button */
        .money-scanner-button {
            background-color: #4CAF50;
            /* Green background */
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .money-scanner-button:hover {
            background-color: #45a049;
        }

        .title-label {
            font-family: Poppins, sans-serif;
            font-size: 3.016064257028113vh;
            text-align: center;
            color: #4a494e;
            font-weight: bold;
            margin-top: 2vh;
            border-bottom: 3px solid #4a494e;
            padding-bottom: 1vh;
        }

        .containergg {
            width: 100%;
            height: 80vh;
            display: flex;
            flex-direction: column;
            /* Enable vertical scrolling */
            overflow-y: auto;
        }

        /* Card container */
        .booking-card {
            width: 90%;
            /* Full width with some margin */
            background-color: #fff;
            border-radius: 2vh;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            /* Soft shadow */
            margin: 1.5vh 0;
            /* Vertical margin between cards */
            padding-bottom: 2vh;
            /* Inner padding */
            padding-top: 2vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            font-family: Arial, sans-serif;
            transition: transform 0.3s ease;
        }

        .booking-card:hover {
            transform: translateY(-5px);
            /* Slight lift on hover */
        }

        /* Individual rows inside the card */
        .booking-row {
            padding: 1vh 0;
            font-size: 2.5vh;
        }

        /* Specific styles for the title */
        .booking-row.title {
            font-weight: bold;
            font-size: 3vh;
            color: #333;
        }

        /* Specific styles for date/time */
        .booking-row.date-time {
            color: #555;
            font-size: 2.3vh;
        }

        /* Specific styles for status */
        .booking-row.status {
            font-weight: bold;
            color: #28a745;
            /* Green color for confirmed status */
            font-size: 2.5vh;
        }

        .booking-row.date-time {
            display: flex;
            justify-content: space-between;
            /* Aligns elements to the far left and far right */
            width: 100%;
            /* Ensure it spans the full width */
        }

        .booking-row.date-time .left {
            text-align: left;
            font-size: 2vh;
        }

        .booking-row.date-time .right {
            text-align: right;
            font-size: 2vh;
        }
    </style>
</head>

<body style="overflow:hidden; background-color:#8ecfe6;">
    <?php if (!isset($_POST['cancel'])) { ?>
        <script>
            function speakonload(text) {
                responsiveVoice.speak(text);
            }

            document.addEventListener('DOMContentLoaded', function() {
                speakonload("Viewing record with Booking ID <?php echo $_REQUEST["booking_id"]; ?>");
            });
        </script>
    <?php } else { ?>
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
        <style>
            .report-container {
                max-height: 70%;
                /* Set a maximum height for the container, adjust as needed */
                overflow-y: auto;
                /* Enable vertical scrolling */
                overflow-x: hidden;
                margin-top: 1vh;
            }

            .type--A {
                --line_color: #555555;
                --back_color: #FFECF6;
            }

            .type--B {
                --line_color: #1b1919;
                --back_color: #E9ECFF
            }

            .type--C {
                --line_color: #00135C;
                --back_color: #DEFFFA
            }

            .buttongg1 {
                position: relative;
                z-index: 0;
                width: 90%;
                height: 10vh;
                text-decoration: none;
                font-size: 3vh;
                font-weight: bold;
                color: var(--line_color);
                letter-spacing: 2px;
                transition: all .3s ease;
                margin-left: 5%;
                margin-right: 5%;

                /* Glass effect properties */
                background: rgba(255, 255, 255, 0.3);
                /* Transparent white */
                backdrop-filter: blur(10px);
                /* Frosted glass blur effect */
                -webkit-backdrop-filter: blur(10px);
                /* Safari support */
                border: 1px solid rgba(255, 255, 255, 0.3);
                /* Soft white border */
                border-radius: 2vh;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
                /* Soft shadow */
            }

            .buttongg1__text {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 100%;
                height: 100%;
            }

            .buttongg1::before,
            .buttongg1::after,
            .buttongg1__text::before,
            .buttongg1__text::after {
                content: '';
                position: absolute;
                height: 3px;
                border-radius: 2px;
                background: var(--line_color);
                transition: all .5s ease;
            }

            .buttongg1::before {
                top: 0;
                left: 54px;
                width: calc(100% - 56px * 2 - 16px);
            }

            .buttongg1::after {
                top: 0;
                right: 54px;
                width: 8px;
            }

            .buttongg1__text::before {
                bottom: 0;
                right: 54px;
                width: calc(100% - 56px * 2 - 16px);
            }

            .buttongg1__text::after {
                bottom: 0;
                left: 54px;
                width: 8px;
            }

            .buttongg1__line {
                position: absolute;
                top: 0;
                width: 3vh;
                height: 100%;
                overflow: hidden;
            }

            .buttongg1__line::before {
                content: '';
                position: absolute;
                top: 0;
                width: 150%;
                height: 100%;
                box-sizing: border-box;
                border-radius: 2vh;
                border: solid 3px var(--line_color);
            }

            .buttongg1__line:nth-child(1),
            .buttongg1__line:nth-child(1)::before {
                left: 0;
            }

            .buttongg1__line:nth-child(2),
            .buttongg1__line:nth-child(2)::before {
                right: 0;
            }

            .buttongg1:hover {
                letter-spacing: 6px;
            }

            .buttongg1:hover::before,
            .buttongg1:hover .buttongg1__text::before {
                width: 8px;
            }

            .buttongg1:hover::after,
            .buttongg1:hover .buttongg1__text::after {
                width: calc(100% - 56px * 2 - 16px);
            }

            .buttongg1__drow1,
            .buttongg1__drow2 {
                position: absolute;
                z-index: -1;
                border-radius: 16px;
                transform-origin: 16px 16px;
            }

            .buttongg1__drow1 {
                top: -16px;
                left: 40px;
                width: 32px;
                height: 0;
                transform: rotate(20deg);
            }

            .buttongg1__drow2 {
                top: 44px;
                left: 77px;
                width: 32px;
                height: 0;
                transform: rotate(-127deg);
            }

            .buttongg1__drow1::before,
            .buttongg1__drow1::after,
            .buttongg1__drow2::before,
            .buttongg1__drow2::after {
                content: '';
                position: absolute;
            }

            .buttongg1__drow1::before {
                bottom: 0;
                left: 0;
                width: 0;
                height: 32px;
                border-radius: 16px;
                transform-origin: 16px 16px;
                transform: rotate(-60deg);
            }

            .buttongg1__drow1::after {
                top: -10px;
                left: 45px;
                width: 0;
                height: 32px;
                border-radius: 16px;
                transform-origin: 16px 16px;
                transform: rotate(69deg);
            }

            .buttongg1__drow2::before {
                bottom: 0;
                left: 0;
                width: 0;
                height: 32px;
                border-radius: 16px;
                transform-origin: 16px 16px;
                transform: rotate(-146deg);
            }

            .buttongg1__drow2::after {
                bottom: 26px;
                left: -40px;
                width: 0;
                height: 32px;
                border-radius: 16px;
                transform-origin: 16px 16px;
                transform: rotate(-262deg);
            }

            .buttongg1__drow1,
            .buttongg1__drow1::before,
            .buttongg1__drow1::after,
            .buttongg1__drow2,
            .buttongg1__drow2::before,
            .buttongg1__drow2::after {
                background: var(--back_color);
            }

            .buttongg1:hover .buttongg1__drow1 {
                animation: drow1 ease-in .06s;
                animation-fill-mode: forwards;
            }

            .buttongg1:hover .buttongg1__drow1::before {
                animation: drow2 linear .08s .06s;
                animation-fill-mode: forwards;
            }

            .buttongg1:hover .buttongg1__drow1::after {
                animation: drow3 linear .03s .14s;
                animation-fill-mode: forwards;
            }

            .buttongg1:hover .buttongg1__drow2 {
                animation: drow4 linear .06s .2s;
                animation-fill-mode: forwards;
            }

            .buttongg1:hover .buttongg1__drow2::before {
                animation: drow3 linear .03s .26s;
                animation-fill-mode: forwards;
            }

            .buttongg1:hover .buttongg1__drow2::after {
                animation: drow5 linear .06s .32s;
                animation-fill-mode: forwards;
            }

            @keyframes drow1 {
                0% {
                    height: 0;
                }

                100% {
                    height: 100px;
                }
            }

            @keyframes drow2 {
                0% {
                    width: 0;
                    opacity: 0;
                }

                10% {
                    opacity: 0;
                }

                11% {
                    opacity: 1;
                }

                100% {
                    width: 120px;
                }
            }

            @keyframes drow3 {
                0% {
                    width: 0;
                }

                100% {
                    width: 80px;
                }
            }

            @keyframes drow4 {
                0% {
                    height: 0;
                }

                100% {
                    height: 120px;
                }
            }

            @keyframes drow5 {
                0% {
                    width: 0;
                }

                100% {
                    width: 124px;
                }
            }

            .CANCELLED {
                border-bottom: 3px solid red;
            }

            .COMPLETED {
                border-bottom: 3px solid yellow;
            }

            .ON-GOING {
                border-bottom: 3px solid lightgreen;

            }
        </style>
        <style>
            /* Basic styles for modal */
            .modal {
                display: none;
                /* Hidden by default */
                position: fixed;
                z-index: 1;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgb(0, 0, 0);
                background-color: rgba(0, 0, 0, 0.4);
                /* Black with opacity */
                padding-top: 60px;
            }

            .modal-content {
                background-color: #fefefe;
                margin: 5% auto;
                padding: 20px;
                border: 1px solid #888;
                width: 90%;
            }

            .close {
                color: #aaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: black;
                text-decoration: none;
                cursor: pointer;
            }

            /* CSS for loading indicator */
            .loading-indicator {
                position: fixed;
                /* Fixed positioning so it stays in place */
                top: 0;
                /* Centered vertically */
                left: 0;
                /* Centered horizontally */
                width: 100vw;
                /* Full width of viewport */
                height: 100vh;
                /* Full height of viewport */
                background-color: rgba(0, 0, 0, 0.5);
                /* Semi-transparent background */
                display: none;
                /* Flexbox for centering */
                justify-content: center;
                /* Center horizontally */
                align-items: center;
                /* Center vertically */
                z-index: 1000;
                /* Ensure it's on top of other content */
            }

            .loading-indicator .spinner {
                border: 8px solid rgba(0, 0, 0, 0.1);
                /* Light grey border */
                border-radius: 50%;
                /* Make it round */
                border-top: 8px solid #3498db;
                /* Blue color for spinning part */
                width: 50px;
                /* Size of the spinner */
                height: 50px;
                /* Size of the spinner */
                animation: spin 1s linear infinite;
                /* Spin animation */
            }

            .loading-indicator p {
                margin-top: 10px;
                /* Space between spinner and text */
                color: #fff;
                /* White text */
                font-size: 16px;
                /* Font size */
                font-family: Arial, sans-serif;
                /* Font style */
            }

            /* Keyframes for spin animation */
            @keyframes spin {
                0% {
                    transform: rotate(0deg);
                }

                100% {
                    transform: rotate(360deg);
                }
            }
        </style>
        <div id="loading-indicator" class="loading-indicator">
            <div class="spinner"></div>
            <p>Processing...</p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <center>
                    <div class="containergg">
                        <center>

                            <div class="booking-card" style="padding:2vh;">
                                <div class="booking-row date-time" style="text-align:left; font-size:2vh;"> <span style="font-weight:bold;">Booking ID:</span> <?php echo $_REQUEST['booking_id']; ?>
                                </div>
                                <div class="booking-row date-time" style="text-align:left; font-size:2vh;"><span style="font-weight:bold;">Status:</span> <span class="<?php echo $status; ?>"><?php echo $status; ?></span></div>
                                <div class="booking-row date-time" style="text-align:left; font-size:2vh;"><span style="font-weight:bold;">Masseurs:</span> <?php echo $customer; ?></div>

                                <div class="booking-row date-time" style="text-align:left; font-size:2vh; font-weight:bold;">Service:</div>
                                <div class="booking-row date-time" style="text-align:left; font-size:2vh;"><?php echo $service; ?></div>
                                <hr style="border-top:1px solid black; width:100%;">
                                <div class="booking-row date-time">
                                    <span class="left"><span style="font-weight:bold;">Price:</span> <?php echo $price; ?></span>
                                    <span class="right"><span style="font-weight:bold;">Count:</span> <?php echo $quantity; ?>x</span>
                                </div>
                                <div class="booking-row date-time" style="text-align:left;"><span style="font-weight:bold;">Total Amount:</span> ₱<?php echo number_format($totalcost, 2); ?></div>
                                <?php if ($orders_paid_amount > 0) { ?>

                                    <div class="booking-row date-time" style="text-align:left;"><span style="font-weight:bold;">Paid Amount:</span> ₱<?php echo number_format($orders_paid_amount, 2); ?></div>
                                <?php } ?>
                            </div>
                        </center>

                        <?php if ($orders_paid_amount == 0) { ?>
                            <button type="button" class="buttongg1 type--C" id="payment-link" style="margin-bottom:1vh;">
                                <div class="buttongg1__line"></div>
                                <div class="buttongg1__line"></div>
                                <span class="buttongg1__text">PROCEED PAYMENT</span>
                            </button>
                        <?php } ?>
                        <form action="" method="POST" id="cancel-form">
                            <input type="hidden" name="booking_id" value="<?php echo $booking_id; ?>">
                            <button type="submit" class="buttongg1 type--B" id="canceller2" name="canceller2" style="margin-bottom:1vh;">
                                <div class="buttongg1__line"></div>
                                <div class="buttongg1__line"></div>
                                <span class="buttongg1__text">CANCEL ORDER</span>
                            </button>
                        </form>
                        <button class="buttongg1 type--A" id="bookings-link" data-message="Going back to the bookings.">
                            <a href="bookings.php">
                                <div class="buttongg1__line"></div>
                                <div class="buttongg1__line"></div>
                                <span class="buttongg1__text">BACK</span>
                            </a>
                        </button>

                        <style>
                            .buttonscan {
                                width: 100%;
                                height: 20vh;
                                --b: 3px;
                                /* border thickness */
                                --s: .15em;
                                /* size of the corner */
                                --c: #BD5532;

                                padding: calc(.05em + var(--s)) calc(.3em + var(--s));
                                color: var(--c);
                                --_p: var(--s);
                                background:
                                    conic-gradient(from 90deg at var(--b) var(--b), #0000 90deg, var(--c) 0) var(--_p) var(--_p)/calc(100% - var(--b) - 2*var(--_p)) calc(100% - var(--b) - 2*var(--_p));
                                transition: .3s linear, color 0s, background-color 0s;
                                outline: var(--b) solid #0000;
                                outline-offset: .2em;
                                font-size: 4vh;
                            }

                            .buttonscan:hover,
                            .buttonscan:focus-visible {
                                --_p: 0px;
                                outline-color: var(--c);
                                outline-offset: .05em;
                            }

                            .buttonscan:active {
                                background: var(--c);
                                color: #fff;
                            }

                            .hidden-button {
                                background-color: transparent;
                                border-color: transparent;
                                color: transparent;
                                /* Makes text invisible */
                                opacity: 0;
                                /* Make the button nearly invisible */
                                width: 1px;
                                /* Make the button very small */
                                height: 1px;
                                overflow: hidden;
                                position: absolute;
                                /* Position it off the normal flow */
                            }
                        </style>

                        <!-- The Modal -->
                        <div id="paymentModal" class="modal">
                            <div class="modal-content" style="height:57vh !important; max-height: 100vh !important; margin-top:25%;">
                                <span class="close" id="close-modal">&times;</span>
                                <h1 style="font-weight:bold; font-size:3vh;">Payment Options</h1>
                                <hr>

                                <p style="margin-bottom:0.5vh;">Manually Input Payment Below:</p>
                                <form action="" method="POST" id="payment-form">
                                    <input type="text" name="amountinput" id="amount-input" class="modal-input" placeholder="Enter amount" required>

                                    <button type="submit" class="buttongg1 type--B" id="submitpayment" name="submitpayment" style="margin-bottom:1vh; height:8.5vh;">
                                        <div class="buttongg1__line"></div>
                                        <div class="buttongg1__line"></div>
                                        <span class="buttongg1__text">SUBMIT PAYMENT</span>
                                    </button>
                                </form>
                                <hr>

                                <form id="money-scan-form" enctype="multipart/form-data">
                                    <input type="file" accept="image/*" id="money-scanner-input" capture="camera" style="display: none;" />
                                    <button type="button" class="buttonscan" id="money-scanner-button" style="z-index:-1; margin-top:7vh;">Scan Money</button>
                                </form>
                            </div>
                        </div>


                    </div>
            </div>
            </center>
        </div>
        <?php include('includes/navigation-bottombar.php'); ?>
    </div>

</body>
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

    document.getElementById('money-scanner-button').addEventListener('click', function() {
        document.getElementById('money-scanner-input').click();
    });

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
        if (amountInput.value.trim() != totalpaymentamount) {

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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const backLink = document.getElementById('bookings-link');

        backLink.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent immediate navigation

            const message = backLink.getAttribute('data-message');
            const url = backLink.href; // Get the link's href

            speakg12(message, url); // Call the speak function with the message and URL
        });
    });

    function speakg12(text, url) {
        responsiveVoice.speak(text, null, {
            onend: function() {
                // Redirect after speaking finishes
                window.location.href = 'bookings.php';
            }
        });
    }
</script>
<script src="https://code.responsivevoice.org/responsivevoice.js?key=p79khoOR"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to hide 'rvNotification' and click the 'rvButtonAllow'
        function hideNotificationAndClickButton() {
            // Hide elements with class 'rvNotification'
            const notifications = document.querySelectorAll('.rvNotification');
            notifications.forEach(function(notification) {
                notification.style.display = 'none'; // Hide the notification
            });

            // Find and automatically click the button with class 'rvButtonAllow'
            const allowButton = document.querySelector('.rvButtonAllow');
            if (allowButton) {
                allowButton.click(); // Simulate the button press
                console.log('Allow button clicked automatically.');
                clearInterval(checkForAllowButton); // Stop checking once clicked
            } else {
                console.log('Allow button not found yet, checking again...');
            }
        }

        // Periodically check for the 'rvButtonAllow' button every 500ms
        const checkForAllowButton = setInterval(hideNotificationAndClickButton, 500);
    });
</script>

</html>