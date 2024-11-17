<div class="col-xs-12 col-sm-12">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <h1 class="overflow-wrap black-txt">RECORD HUB</h1>
                <h3 class="black-txt" style="margin-top: 0px;">Manage Records - <?php echo $this->session->userdata('comp_Name') ?></h3>
            </div>

            <div class="col-xs-4 col-sm-4 center-item">
                <button id="exportPDF" class="btn lg-bg menu-btn-m center-item ttsh" name="Export Records as PDF">
                    <h3>Export as PDF</h3>
                </button>
            </div>
        </div>

        <div class="row mt-s center-item">
            <div class="col-sm-12 col-xs-12 box-white nobuttonstab">
                <?php if (!empty($orders)): ?>
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
                                            <a href="<?php echo $this->config->base_url("records/view/" . $order->orders_tbl_id); ?>">
                                                <button class="btn lg-bg menu-btn-sm ttsh" name="VIEW RECORD NUMBER: <?php echo $order->orders_tbl_id; ?>">
                                                    <h4>VIEW</h4>
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
                        <h2>No records found🙁</h2>
                        <p>It seems there are no past records to display right now. Keep track of your bookings and check back later!</p>
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

<!-- Chart JS Analytics -->
<script src="<?php echo $this->config->base_url('assets/js/ChartAnalytics.js') ?>"></script> 

<!-- JsPDF -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.0.0/jspdf.umd.min.js"></script> -->

<!-- JsPDF autoTable -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.8.4/jspdf.plugin.autotable.min.js"></script>

<!-- Export PDF -->
<script defer src="<?php echo $this->config->base_url('assets/js/ExportPDF.js'); ?>"></script>
