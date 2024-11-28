<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo base_url('assets/js/populateTable.js'); ?>"></script> 

<script>
    let baseUrl = "<?php echo base_url('orders/save_services'); ?>";
    var mode = "<?php echo($mode)?>";
    var redirectUrl = "";

    switch (mode) {
        case "create":
            redirectUrl = "<?php echo base_url('orders_finalize'); ?>";
            break;

        case "assign":
            redirectUrl = "<?php echo base_url('booking/create'); ?>";
            break;

        case "place":
            redirectUrl = "<?php echo base_url('orders_assign'); ?>";
            break;

        case "information":
            redirectUrl = "<?php echo base_url('orders_placement'); ?>";
            break;
            
        default:
            break;
    }

    console.log(redirectUrl);

    let sessionData = localStorage.getItem('selected_services') ? JSON.parse(localStorage.getItem('selected_services')) : {};
    console.log(sessionData);
    sessionData = localStorage.getItem('assigned_masseurs') ? JSON.parse(localStorage.getItem('assigned_masseurs')) : {};
    console.log(sessionData);
    sessionData = localStorage.getItem('assigned_locations') ? JSON.parse(localStorage.getItem('assigned_locations')) : {};
    console.log(sessionData);
    sessionData = localStorage.getItem('assigned_locations') ? JSON.parse(localStorage.getItem('customer_information')) : {};
    console.log(sessionData);

</script>

<div class="col-xs-3 col-sm-3" style="background-color:hsl(218, 53%, 65%, 0.4); margin: 0px; height:100vh;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="sidebar">

                    <div class="row center-item" style="display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 100vh; margin-top: auto;">
                        <table class="table table-striped box-white mw-table" id="invoice_table" style="width: 20vw;">
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

                            <thead>
                                <tr>
                                    <th colspan="3">Masseur</th>
                                </tr>
                            </thead>
                            <tbody id="assign-list">
                                <!-- Masseurs will be populated by JavaScript -->
                            </tbody>

                            <thead>
                                <tr>
                                    <th colspan="3">Area</th>
                                </tr>
                            </thead>
                            <tbody id="placement-list">
                                <!-- Area will be populated by JavaScript -->
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="2">Total Cost</td>
                                    <td id="total-cost">₱0.00</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
