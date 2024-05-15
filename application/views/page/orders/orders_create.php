<div class="col-xs-9 col-sm-9">

	<div class="container-fluid">
		<div class="row">

			<div class="col-xs-12 col-sm-12">
				<h1 class="overflow-wrap">SELECT SERVICES</h1>
				<h3 style="margin-top: 0px;">Select Services For Order - COMPANY</h3>
			</div>

			<div class="col-xs-4 col-sm-4"></div>

			<div class="col-xs-4 col-sm-4 center-item">
				<a href="<?php echo $this->config->base_url("orders_assign")?>">
					<button class="btn green-bg menu-btn-m center-item ttsh" name="Proceed to masseur assignment">
						<h3 class="">CONTINUE</h3>
					</button>
				</a>
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

							<?php 
								$type = $service->services_tbl_name;
								$desc = $service->services_tbl_description;
								$price = $service->services_tbl_price;
							?>

							<tr>
								<td><?php echo $type?></td>
								<td><?php echo $desc?></td>
								<td><?php echo $price?></td>
								<td class="text-center">

								<a href="">
									<button class="btn green-bg menu-btn-sm ttsh" name="<?php echo "ADD 1: $type"?>">
										<h4>ADD</h4>
									</button>
								</a>

								</td>
								<td class="text-center">

								<a href="">
									<button class="btn red-bg menu-btn-sm ttsh" name="<?php echo "REMOVE 1: $type"?>">
										<h4>REMOVE</h4>
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
