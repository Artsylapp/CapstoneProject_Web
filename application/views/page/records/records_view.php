<div class="col-xs-12 col-sm-12">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <h1 class="overflow-wrap black-txt">VIEW RECORDS</h1>
                <h3 class="black-txt" style="margin-top: 0px;">Records - <?php echo $this->session->userdata('comp_Name') ?></h3>
            </div>
        </div>

        <div class="row mt-s">
            <div class="col-sm-12 col-xs-12 box-white">

            <?php if ($bookingdetails): ?>
                <form class="form-horizontal" action="" method="">
                    <div class="form-group">

                        <!-- Booking Number -->
                        <div class="col-sm-offset-1 col-sm-6" style="display: flex; justify-content: left;">
                            <h1>Booking Number: <?php echo $id?></h1>
                        </div>


                        <!-- Therapist Assigned -->
                        <div class="col-sm-offset-1 col-sm-6" style="display: flex; justify-content: left;">
                            <h1>Therapist Assigned: <?php echo $masseurs_name?></h1>
                        </div>

                        <!-- Status Assigned -->
                        <div class="col-sm-offset-1 col-sm-6" style="display: flex; justify-content: left;">
                            <?php 
                                if ($status == 'ON-GOING'){
                                    echo '<h1>Status: <span style="color: orange">' . $status . '</span></h1>';
                                } else if ($status == 'COMPLETED') {
                                    echo '<h1>Status: <span style="color: green">' . $status . '</span></h1>';
                                } elseif ($status == 'CANCELLED') {
                                    echo '<h1>Status: <span style="color: red">' . $status . '</span></h1>';
                                } else {
                                    echo '<h1>Status: <span>' . $status . '</span></h1>';
                                }
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-1 col-sm-10">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Services Table -->
                    <div class="form-group">
                        <div class="col-sm-offset-1 col-sm-10">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            <h3>Amount</h3>
                                        </th>
                                        <th class="text-center">
                                            <h3>Service</h3>
                                        </th>
                                        <th class="text-center">
                                            <h3>Price</h3>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($services as $serviceName => $serviceDetails): ?>
                                        <tr class="text-center">
                                            <td><h2><?php echo htmlspecialchars($serviceDetails['amount']); ?></h2></td>
                                            <td><h2><?php echo htmlspecialchars($serviceName); ?></h2></td>
                                            <td><h2>₱<?php echo htmlspecialchars($serviceDetails['price']); ?></h2></td>
                                        </tr class="text-right">
                                    <?php endforeach; ?>
                                    <tr>
                                        <td style="font-weight: bold;"><h2>TOTAL</h2></td>
                                        <td style="font-weight: bold;"><h2></h2></td>
                                        <td style="font-weight: bold;"><h2>₱<?php echo $totalCost?></h2></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;"><h2>CURRENT PAID AMOUNT</h2></td>
                                        <td style="font-weight: bold;"><h2></h2></td>
                                        <td style="font-weight: bold;"><h2>₱<?php echo $paid_amount; ?></h2></td>
                                    </tr>
                                        
                                </tbody>
                            </table>
                        </div>
                    </div>

                </form>

                <div class="col-sm-offset-8 col-sm-3" style="margin-bottom:25px; margin-top:25px;">
                    <a href="<?php echo $this->config->base_url("records")?>">
                        <button class="btn yellow-bg menu-btn-m ttsh" name="Back to records hub">
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
