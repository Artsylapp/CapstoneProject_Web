<div class="col-xs-10 col-sm-10">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <h1 class="overflow-wrap">VIEW BOOKING</h1>
                <h3 style="margin-top: 0px;">Display Booking Details - COMPANY</h3>
            </div>
        </div>
        <div class="row mt-s">
            <div class="col-sm-11 col-xs-11 box-white">
                <?php if ($booking): ?>
                    <?php
                        $id = $booking->orders_tbl_id;
                        $status = $booking->orders_tbl_status;
                        $services = $services;
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
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-sm-offset-8 col-sm-3" style="margin-top:25px;">
                            <div class="col-sm-12">
                                <button class="btn green-bg menu-btn-m ttsh" name="Manual Payment">
                                    <h4>MANUAL PAYMENT</h4>
                                </button>
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
