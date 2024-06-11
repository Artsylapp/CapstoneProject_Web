<div class="col-xs-10 col-sm-10">

	<div class="container-fluid">
		<div class="row">

			<div class="col-xs-12 col-sm-12" style="text-align: right;">
				<h1 class="overflow-wrap">ORDERS HUB</h1>
				<h3 style="margin-top: 0px;">Manage Orders - COMPANY</h3>
			</div>

			<div class="col-xs-4 col-sm-4"></div>

			<div class="col-xs-4 col-sm-4 center-item">
				<a href="<?php echo $this->config->base_url("orders_create")?>" id="new-order-button">
                    <button class="btn green-bg menu-btn-m center-item ttsh" name="NEW ORDER">
                        <h3 class="white-txt">NEW BOOKING</h3>
                    </button>
                </a>
			</div>

		</div>

		<div class="row mt-s center-item">
			
			<div class="col-sm-12 col-xs-12 box-white">

				<table class="table table-hover" id="acc_table">
					<thead>
					<tr>
						<th>Booking Number</th>
						<th>Status</th>
						<th>Total Price</th>
						<th>Cancel</th>
					</tr>
					</thead>
					<tbody>
						
					<?php foreach($orders as $order):  ?>

							<?php 
								$Booking_Number = $order->orders_tbl_id;
								$Status = $order->orders_tbl_status;
								$Total_Price = $order->orders_tbl_cost;
							?>

							<tr>
								<td><?php echo $Booking_Number?></td>
								<td><?php echo $Status?></td>
								<td><?php echo $Total_Price?></td>

								<td class="text-center">

								<a href="<?php echo $this->config->base_url("")?>">
									<button class="btn red-bg menu-btn-sm ttsh" name="<?php echo "CANCEL BOOKING NUMBER: $Booking_Number"?>">
										<h4>CANCEL</h4>
									</button>
								</a>

								</td>
							</tr>

					<?php endforeach; ?>
					
					</tbody>
				</table>

			</div>

		</div>

	</div>

</div>

<script>
    $(document).ready(function() {
        $('#new-order-button').on('click', function() {
            localStorage.removeItem('selected_services');
			localStorage.removeItem('assigned_masseurs');
			localStorage.removeItem('assigned_locations');
        });
    });
</script>
