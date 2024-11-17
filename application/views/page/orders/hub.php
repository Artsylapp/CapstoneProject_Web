<div class="col-xs-12 col-sm-12">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12" style="text-align: left;">
                <h1 class="black-txt overflow-wrap">BOOKING HUB</h1>
                <h3 class="black-txt" style="margin-top: 0px;">Manage Bookings - <?php echo $this->session->userdata('comp_Name') ?></h3>
            </div>
            <div class="col-xs-4 col-sm-4 center-item">
                <a href="<?php echo $this->config->base_url("booking/create") ?>" id="new-order-button">
                    <button class="btn lg-bg menu-btn-m center-item ttsh" name="CREATE NEW BOOKING">
                        <h3 class="black-txt">NEW BOOKING</h3>
                    </button>
                </a>
            </div>
        </div>
        <div class="row mt-s center-item">
            <div class="col-sm-12 col-xs-12 box-white">
                <?php if (!empty($orders)): ?>
                    <table class="table table-hover nobuttonstab" id="acc_table">
                        <thead>
                            <tr>
                                <th>Booking Number</th>
                                <th>Status</th>
                                <th>Total Price</th>
                                <th>View Booking</th>
                                <th>Cancel Booking</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order): ?>
                                <?php if ($order->orders_tbl_status == "ON-GOING"): ?>
                                    <tr>
                                        <td><?php echo $order->orders_tbl_id; ?></td>
                                        <td><?php echo $order->orders_tbl_status; ?></td>
                                        <td><?php echo $order->totalCost; ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo $this->config->base_url("booking/view/" . $order->orders_tbl_id); ?>">
                                                <button class="btn lg-bg menu-btn-sm ttsh" name="VIEW BOOKING NUMBER: <?php echo $order->orders_tbl_id; ?>">
                                                    <h4 class="black-txt">VIEW</h4>
                                                </button>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?php echo $this->config->base_url("booking/cancel/" . $order->orders_tbl_id); ?>">
                                                <button class="btn lr-bg menu-btn-sm ttsh" name="CANCEL BOOKING NUMBER: <?php echo $order->orders_tbl_id; ?>">
                                                    <h4>CANCEL</h4>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="text-center" style="margin: 20px;">
                        <h2>No bookings Found🙁</h2>
                        <p>Looks like things are quiet for now. Start by creating a new booking!😁</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#new-order-button').on('click', function() {
            localStorage.removeItem('selected_services');
            localStorage.removeItem('assigned_masseurs');
            localStorage.removeItem('assigned_locations');
        });
    });
</script>
