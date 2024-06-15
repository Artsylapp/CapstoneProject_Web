<div class="col-xs-9 col-sm-9">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <h1 class="overflow-wrap">ASSIGN PLACEMENT</h1>
                <h3 style="margin-top: 0px;">Assign Location For Booking - COMPANY</h3>
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

        <div class="row mt-s center-item">
            <div class="col-sm-12 col-xs-12 box-white">
                <table class="table table-hover" id="acc_table">
                    <thead>
                        <tr>
                            <th>Location</th>
                            <th>Type</th>
                            <th>Assign</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($locations as $location): ?>
                        <?php if ($location->location_tbl_status == "Open"): ?>
                            <tr data-location-type="<?php echo $location->location_tbl_type; ?>">
                                <td><?php echo $location->location_tbl_name; ?></td>
                                <td><?php echo $location->location_tbl_type; ?></td>
                                <td class="text-center">
                                    <button class="btn green-bg menu-btn-sm ttsh assign-location" data-location-name="<?php echo $location->location_tbl_name; ?>" name="<?php echo "ASSIGN: $location->location_tbl_name"; ?>">
                                        <h4>ASSIGN</h4>
                                    </button>
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
