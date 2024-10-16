<div class="col-xs-9 col-sm-9">
    <div class="container-fluid">

        <div class="row">

            <div class="col-xs-12 col-sm-12">
                <h1 class="black-txt overflow-wrap">ASSIGN MASSEUR</h1>
                <h3 class="black-txt" style="margin-top: 0px;">Assign Masseur To Booking - COMPANY</h3>
            </div>

            <div class="col-xs-4 col-sm-4"></div>

            <div class="col-xs-4 col-sm-4 center-item">
                <button id="continue-button" class="btn lg-bg menu-btn-m center-item ttsh" name="Proceed to placement" data-base-url="<?php echo $this->config->base_url('booking/placement'); ?>">
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($accounts as $account): ?>
                            <?php if ($account->accounts_tbl_empType == "Masseur" AND $account->accounts_tbl_status == "AVAILABLE"): ?>
                                <tr>
                                    <td><?php echo $account->accounts_tbl_name; ?></td>
                                    <td><?php echo $account->accounts_tbl_empType; ?></td>
                                    <td class="text-center">
                                        <button class="btn lg-bg menu-btn-sm ttsh assign-masseur" data-masseur-name="<?php echo $account->accounts_tbl_name; ?>" name="<?php echo "ASSIGN: $account->accounts_tbl_name"; ?>">
                                            <h4>ASSIGN</h4>
                                        </button>
                                    </td>
                                </tr>
                            <?php elseif ($account->accounts_tbl_empType == "Masseur" AND $account->accounts_tbl_status == "BOOKED"):?>
                                <tr>
                                    <td><?php echo $account->accounts_tbl_name; ?></td>
                                    <td><?php echo $account->accounts_tbl_empType; ?></td>
                                    <td class="text-center">
                                        <button class="btn lr-bg menu-btn-sm ttsh assign-masseur" disabled data-masseur-name="<?php echo $account->accounts_tbl_name; ?>" name="<?php echo "UNAVAILABLE: $account->accounts_tbl_name"; ?>">
                                            <h4>BOOKED</h4>
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
