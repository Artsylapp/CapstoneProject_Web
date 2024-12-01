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

    localStorage.removeItem('customer_information');

    sessionData = localStorage.getItem('selected_services') ? JSON.parse(localStorage.getItem('selected_services')) : {};
    console.log(sessionData);
    sessionData = localStorage.getItem('assigned_masseurs') ? JSON.parse(localStorage.getItem('assigned_masseurs')) : {};
    console.log(sessionData);
    sessionData = localStorage.getItem('assigned_locations') ? JSON.parse(localStorage.getItem('assigned_locations')) : {};
    console.log(sessionData);
    sessionData = localStorage.getItem('customer_information') ? JSON.parse(localStorage.getItem('customer_information')) : {};
    console.log(sessionData);
    
</script>


<div class="col-xs-12 col-sm-12">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <h1 class="black-txt overflow-wrap">Finalizing Booking</h1>
                <h3 class="black-txt" style="margin-top: 0px;"><span>Booking</span> > <span>Create</span> - <?php echo $this->session->userdata('comp_Name') ?></h3>
            </div>
        </div>

        <div class="col-xs-4 col-sm-4"></div>

            <div class="col-xs-4 col-sm-4 center-item">
                <button id="finalize-button" class="btn lg-bg menu-btn-m center-item ttsh" 
                    name="Proceed complete booking" 
                    data-base-url="<?php echo base_url('orders/save_booking'); ?>" 
                    data-redirect-url="<?php echo base_url('orders'); ?>">
                    <h3 class="black-txt">COMPLETE BOOK</h3>
                </button>
            </div>
        </div>

        <div class="row center-item" style="margin-top:5vh;">
            <table class="table table-striped box-white mw-table table-font" id="invoice_table" style="width: 90vw;">
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
