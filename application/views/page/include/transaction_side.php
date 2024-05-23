<script>
    let baseUrl = "<?php echo base_url('orders/save_services'); ?>";
    var mode = "<?php echo($mode)?>";
    var redirectUrl = "";

    switch (mode) {
        case "create":
            redirectUrl = "<?php echo base_url('orders/orders_assign'); ?>";
            break;

        case "assign":
            redirectUrl = "<?php echo base_url('orders/orders_placement'); ?>";
            break;

        case "place":
            redirectUrl = "<?php echo base_url('orders'); ?>";
            break;
    
        default:
            break;
    }

    console.log(redirectUrl);

    let sessionData = <?php echo isset($selected_services) ? json_encode($selected_services) : '{}'; ?>;
    console.log(sessionData);
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo base_url('assets/js/populateTable.js'); ?>"></script>

<div class="col-xs-3 col-sm-3" style="background-color: hsla(22, 61%, 80%, 0.4); margin: 0px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="sidebar">
                    <div class="row center-item">
                        <button type="button circle-button" class="btn btn-image" id="sidebar-image">
                            <img src="" alt="">
                        </button>
                    </div>

                    <div class="row center-item">
                        <h3 class="overflow-wrap">EMPLOYEE NAME</h3>
                    </div>

                    <div class="row center-item">
                        <h5 class="overflow-wrap">CONTACT</h5>
                    </div>

                    <div class="row center-item" style="margin-top: auto;">
                        <table class="table" id="invoice_table">
                            <thead>
                                <tr>
                                    <th>Service</th>
                                    <th>Price</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody id="item-list">
                                <!-- Items will be populated by JavaScript -->
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2">Total Cost</td>
                                    <td id="total-cost">$0.00</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>