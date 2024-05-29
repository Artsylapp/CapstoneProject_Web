<div class="col-xs-9 col-sm-9">

    <div class="container-fluid">
        <div class="row">

            <div class="col-xs-12 col-sm-12">
                <h1 class="overflow-wrap">ASSIGN MASSEUR</h1>
                <h3 style="margin-top: 0px;">Assign Masseur To Order - COMPANY</h3>
            </div>

            <div class="col-xs-4 col-sm-4"></div>

            <div class="col-xs-4 col-sm-4 center-item">
                <button id="continue-button" class="btn green-bg menu-btn-m center-item ttsh" name="Proceed to placement" data-base-url="<?php echo $this->config->base_url('orders/orders_placement'); ?>">
                    <h3>CONTINUE</h3>
                </button>
            </div>

        </div>

        <div class="row mt-s center-item">
            
            <div class="col-sm-12 col-xs-12 box-white">

                <table class="table table-hover" id="acc_table">
                    <thead>
                        <tr>
                            <th>Employee Name</th>
                            <th>Type</th>
                            <th>Assign</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($accounts as $account): ?>
                            <?php if ($account->accounts_tbl_empType == "Masseur"): ?>
                                <tr>
                                    <td><?php echo $account->accounts_tbl_name; ?></td>
                                    <td><?php echo $account->accounts_tbl_empType; ?></td>
                                    <td class="text-center">
                                        <button class="btn green-bg menu-btn-sm ttsh assign-masseur" data-masseur-name="<?php echo $account->accounts_tbl_name; ?>" name="<?php echo "ASSIGN: $account->accounts_tbl_name"; ?>">
                                            <h4>ASSIGN</h4>
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn red-bg menu-btn-sm ttsh remove-masseur" data-masseur-name="<?php echo $account->accounts_tbl_name; ?>" name="<?php echo "REMOVE: $account->accounts_tbl_name"; ?>">
                                            <h4>REMOVE</h4>
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
