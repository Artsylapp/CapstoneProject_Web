<div class="col-xs-12 col-sm-12">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xs-12 col-sm-12" style="text-align: right;">
                <h1 class="overflow-wrap">RECORDS HUB</h1>
                <h3 style="margin-top: 0px;">View Records - COMPANY</h3>
            </div>
            <div class="col-xs-4 col-sm-4"></div>
        </div>

        <div class="row mt-s center-item">
            <div class="col-sm-12 col-xs-12 box-white">
                <table class="table table-hover" id="acc_table">
                    <thead>
                        <tr>
                            <th>Booking Number</th>
                            <th>Status</th>
                            <th>Total Price</th>
							<th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order): ?>
                            <?php if ($order->orders_tbl_status !== "ON-GOING"): ?>
                                <tr>
                                    <td><?php echo $order->orders_tbl_id; ?></td>
                                    <td><?php echo $order->orders_tbl_status; ?></td>
                                    <td><?php echo $order->totalCost; ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo $this->config->base_url("records/records_view/" . $order->orders_tbl_id); ?>">
                                            <button class="btn green-bg menu-btn-sm ttsh" name="VIEW BOOKING NUMBER: <?php echo $order->orders_tbl_id; ?>">
                                                <h4>VIEW</h4>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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
