<div class="col-xs-12 col-sm-12">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <h1 class="overflow-wrap black-txt">VIEW BOOKING</h1>
                <h3 class="black-txt" style="margin-top: 0px;">Display Booking Details - COMPANY</h3>

                <script>

                var message = "<?php echo addslashes($this->session->flashdata('message')); ?>"; // Escape quotes for JS
                var error = "<?php echo addslashes($this->session->flashdata('error')); ?>"; // Escape quotes for JS

                console.log("Flash Message:", message);
                console.log("Flash Error:", error);

                </script>
            </div>
        </div>

        <div class="row mt-s">
            <div class="col-sm-12 col-xs-12 box-white">

                <?php if ($booking):
                    $id = $booking->orders_tbl_id;
                    $status = $booking->orders_tbl_status;
                    $services = $services;
                    $paid = $booking->orders_paid_amount;
                ?>

                    <form class="form-horizontal" action="" method="">
                        <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-6" style="display: flex; justify-content: left;">
                                <h2>Booking Number: <?php echo $id; ?></h2>
                            </div>
                            <div class="col-sm-offset-1 col-sm-6" style="display: flex; justify-content: left;">
                                <h2>Status: <?php echo $status; ?></h2>
                            </div>
                        </div>

                        <!-- Services Table -->
                        <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-10">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-left">
                                                <h3>Amount</h3>
                                            </th>
                                            <th class="text-left">
                                                <h3>Service</h3>
                                            </th>
                                            <th class="text-left">
                                                <h3>Price</h3>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php foreach($masseurs as $masseurName => $isSelected):?>
                                                <h1>Masseur: <?php echo htmlspecialchars($masseurName); ?></h1>
                                            <?php endforeach;?>
                                        </tr>
                                        <?php foreach ($services as $serviceName => $serviceDetails): ?>
                                            <tr>
                                                <td><h3><?php echo htmlspecialchars($serviceDetails['amount']); ?></h3></td>
                                                <td><h3><?php echo htmlspecialchars($serviceName); ?></h3></td>
                                                <td><h3><?php echo htmlspecialchars($serviceDetails['price']); ?></h3></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <tr>
                                            <td style="font-weight: bold;"><h2>TOTAL</h2></td>
                                            <td style="font-weight: bold;"><h2></h2></td>
                                            <td style="font-weight: bold;"><h2><?php echo $totalCost?></h2></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;"><h2>CURRENT PAID AMOUNT</h2></td>
                                            <td style="font-weight: bold;"><h2></h2></td>
                                            <td style="font-weight: bold;"><h2><?php echo $paid?></h2></td>
                                        </tr>
                                            
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        </form>

                        <div class="col-sm-offset-8 col-sm-3" style="margin-top:25px;">
                            <div class="col-sm-12">
                                <?php if ($paid == $totalCost) :?>
                                    <a href="<?php echo $this->config->base_url("orders/complete_booking/" . $this->uri->segment(3))?>">
                                    <button class="btn lg-bg menu-btn-m ttsh" name="COMPLETE BOOKING" formaction="<?php echo $this->config->base_url("orders/complete_booking/" . $this->uri->segment(3))?>">
                                        <h4>COMPLETE BOOKING</h4>
                                    </button>
                                    </a>
                                <?php else:?>
                                    <button class="btn lg-bg menu-btn-m ttsh" name="Manual Payment" onclick="openPopup()">
                                        <h4>MANUAL PAYMENT</h4>
                                    </button>

                                    <!-- Payment Pop-up -->
                                    <form class="form-horizontal" method="POST" action="<?php echo $this->config->base_url('orders/manual_pay/' . $this->uri->segment(3))?>">
                                    <div id="paymentPopup" class="popup">
                                        <div class="popup-header">Enter Payment Amount</div>
                                            <div class="form-group">
                                                <input type="number" name="updatePayment" placeholder="Payment Amount" required>
                                                <button>Submit</button>
                                                <button type="button" onclick="closePopup()">Close</button>
                                            </div>
                                    </div>
                                    </form>

                                    <script>
                                        // JavaScript to open and close the pop-up
                                        function openPopup() {
                                            document.getElementById("paymentPopup").classList.add("active");
                                        }

                                        function closePopup() {
                                            document.getElementById("paymentPopup").classList.remove("active");
                                        }
                                    </script>

                                <?php endif;?>
                            </div>

                        </div>

                    <div class="col-sm-offset-8 col-sm-3" style="margin-bottom:25px; margin-top:25px;">
                        <a href="<?php echo $this->config->base_url("orders")?>">
                            <button class="btn yellow-bg menu-btn-m ttsh" name="Back to booking hub">
                                <h4>BACK</h4>
                            </button>
                        </a>
                    </div>

                <?php else: ?>
                    <p>Booking not found.</p>
                <?php endif; ?>
                
            </div>
        </div>

    </div>
</div>
