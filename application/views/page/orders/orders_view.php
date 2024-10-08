<div class="col-xs-12 col-sm-12">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <h1 class="overflow-wrap black-txt">VIEW BOOKING</h1>
                <h3 class="black-txt" style="margin-top: 0px;">Display Booking Details - COMPANY</h3>
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

                    <form class="form-horizontal" action="<?php echo $this->config->base_url("orders/manual_payment/" . $this->uri->segment(3))?>" method="POST">
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

                        <div class="col-sm-offset-8 col-sm-3" style="margin-top:25px;">
                            <div class="col-sm-12">
                                <?php if ($paid == $totalCost) :?>
                                    <a href="<?php echo $this->config->base_url("orders/complete_booking/" . $this->uri->segment(3))?>">
                                    <button class="btn lg-bg menu-btn-m ttsh" name="COMPLETE BOOKING" formaction="<?php echo $this->config->base_url("orders/complete_booking/" . $this->uri->segment(3))?>">
                                        <h4>COMPLETE BOOKING</h4>
                                    </button>
                                    </a>
                                <?php else:?>
                                    <a href="<?php echo $this->config->base_url("booking/MPayment/" . $this->uri->segment(3))?>">
                                    <button class="btn lg-bg menu-btn-m ttsh" name="Manual Payment">
                                        <h4>MANUAL PAYMENT</h4>
                                    </button>
                                    </a>
                                <?php endif;?>
                            </div>

                        </div>
                    </form>

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
