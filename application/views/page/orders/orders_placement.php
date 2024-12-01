<div class="col-xs-9 col-sm-9">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <h1 class="black-txt overflow-wrap">ASSIGN PLACEMENT</h1>
                <h3 class="black-txt" style="margin-top: 0px;"><span>Booking</span> > <span>Create</span> - <?php echo $this->session->userdata('comp_Name') ?></h3>
            </div>
            
            <div class="col-xs-4 col-sm-4 center-item">
                <button id="continue-button" class="btn lg-bg menu-btn-m center-item ttsh" 
                    name="Proceed to masseur assignment" 
                    data-base-url="<?php echo $this->config->base_url('orders_assign');?>">
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
                                    <button class="btn lg-bg menu-btn-sm ttsh assign-location" data-location-type="<?php echo $location->location_tbl_type; ?>" data-location-name="<?php echo $location->location_tbl_name; ?>" name="<?php echo "ASSIGN: $location->location_tbl_name"; ?>">
                                        <h4>ASSIGN</h4>
                                    </button>
                                </td>
                            </tr>
                        <?php else: ?>
                            <tr data-location-type="<?php echo $location->location_tbl_type; ?>">
                                <td><?php echo $location->location_tbl_name; ?></td>
                                <td><?php echo $location->location_tbl_type; ?></td>
                                <td class="text-center">
                                    <button disabled class="btn lr-bg menu-btn-sm ttsh assign-location" data-location-type="<?php echo $location->location_tbl_type; ?>" data-location-name="<?php echo $location->location_tbl_name; ?>" name="<?php echo "IN-USE: $location->location_tbl_name"; ?>">
                                        <h4>IN-USE</h4>
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
