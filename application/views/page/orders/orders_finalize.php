<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo base_url('assets/js/populateTable.js'); ?>"></script>

<div class="col-xs-12 col-sm-12">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <h1 class="overflow-wrap">Booking Details</h1>
                <h3 style="margin-top: 0px;">Display Booking Details - VIAMM</h3>
            </div>
        </div>

        <div class="col-xs-4 col-sm-4"></div>

            <div class="col-xs-4 col-sm-4 center-item">
                <button id="finalize-button" class="btn green-bg menu-btn-m center-item ttsh" 
                    name="Proceed to finalizing" 
                    data-base-url="<?php echo base_url('orders/save_booking'); ?>" 
                    data-redirect-url="<?php echo base_url('orders'); ?>">
                    <h3>CONTINUE</h3>
                </button>
            </div>
        </div>

        <div class="row mt-s">
            <div class="col-sm-12 col-xs-12 box-white">

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
                
            </div>
        </div>

    </div>
</div>
