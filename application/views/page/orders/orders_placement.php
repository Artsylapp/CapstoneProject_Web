<div class="col-xs-9 col-sm-9">

	<div class="container-fluid">
		<div class="row">

			<div class="col-xs-12 col-sm-12">
				<h1 class="overflow-wrap">ASSIGN PLACEMENT</h1>
				<h3 style="margin-top: 0px;">Assign Location For Servicing - COMPANY</h3>
			</div>

			<div class="col-xs-4 col-sm-4"></div>

			<div class="col-xs-4 col-sm-4 center-item">
                <button id="continue-button" class="btn green-bg menu-btn-m center-item ttsh" name="Proceed to finalizing" data-base-url="<?php echo $this->config->base_url('orders/save_services'); ?>">
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
						<th>Remove</th>
					</tr>
					</thead>
					<tbody>

                    <!--

                    <?php foreach($accounts as $account):  ?>

                        <?php 
                            $name = $account->accounts_tbl_name;
                            $contact = $account->accounts_tbl_contact;
                            $type = $account->accounts_tbl_empType;
                        ?>

                        <?php 

                            if ($type == "Masseur") {
                                
                                ?>

                        <tr>
                                <td><?php echo $name?></td>
                                <td><?php echo $type?></td>
                                <td class="text-center">

                                <a href="">
                                    <button class="btn green-bg menu-btn-sm ttsh" name="<?php echo "ASSIGN: $name"?>">
                                        <h4>ASSIGN</h4>
                                    </button>
                                </a>

                                </td>
                                <td class="text-center">

                                <a href="">
                                    <button class="btn red-bg menu-btn-sm ttsh" name="<?php echo "REMOVE: $name"?>">
                                        <h4>REMOVE</h4>
                                    </button>
                                </a>

                                </td>
                                </tr>

                                <?php

                            }

                        ?>

                        <?php endforeach; ?>

                    -->
					
					</tbody>
				</table>

			</div>

		</div>

	</div>

</div>
