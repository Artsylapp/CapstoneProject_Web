<div class="col-xs-9 col-sm-9">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <h1 class="overflow-wrap">SELECT SERVICES</h1>
                <h3 style="margin-top: 0px;">Select Services For Booking - COMPANY</h3>
            </div>
            <div class="col-xs-4 col-sm-4"></div>
            <div class="col-xs-4 col-sm-4 center-item">
                <button id="continue-button" class="btn green-bg menu-btn-m center-item ttsh" name="Proceed to masseur assignment" data-base-url="<?php echo $this->config->base_url('orders/orders_assign'); ?>">
                    <h3>CONTINUE</h3>
                </button>
            </div>
        </div>
        <div class="row mt-s center-item">
            <div class="col-sm-12 col-xs-12 box-white">
                <table class="table table-hover" id="acc_table">
                <thead>
                    <tr>
                        <th>Service Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Add</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($services as $service): ?>
                        <tr data-service-type="<?php echo $service->services_tbl_designation; ?>">
                        <td><?php echo $service->services_tbl_name; ?></td>
                        <td><?php echo $service->services_tbl_description; ?></td>
                        <td><?php echo $service->services_tbl_price; ?></td>
                        <td class="text-center">
                            <button class="btn green-bg menu-btn-sm ttsh add-service" data-service-name="<?php echo $service->services_tbl_name; ?>" data-service-price="<?php echo $service->services_tbl_price; ?>" data-service-type="<?php echo $service->services_tbl_designation; ?>">
                                <h4>ADD</h4>
                            </button>
                        </td>
                        <td class="text-center">
                            <button class="btn red-bg menu-btn-sm ttsh remove-service" data-service-name="<?php echo $service->services_tbl_name; ?>" data-service-price="<?php echo $service->services_tbl_price; ?>">
                                <h4>REMOVE</h4>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>