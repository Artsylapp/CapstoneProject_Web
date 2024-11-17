<div class="col-xs-12 col-sm-12">

	<div class="container-fluid">
		<div class="row">

			<div class="col-xs-12 col-sm-12">
				<h1 class="black-txt overflow-wrap ">SERVICE HUB</h1>
				<h3 class="black-txt" style="margin-top: 0px;">Manage Services - <?php echo $this->session->userdata('comp_Name') ?></h3>
			</div>

			<div class="col-xs-4 col-sm-4 center-item">
				<a href="<?php echo $this->config->base_url("ser_create")?>">
					<button class="btn lg-bg menu-btn-m center-item ttsh" name="NEW Service">
						<h3 class="">NEW SERVICE</h3>
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
						<th>Edit</th>
						<th>Delete</th>
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

								<a href="<?php echo $this->config->base_url("services/ser_edit/$service->services_tbl_id")?>">
									<button class="btn yellow-bg menu-btn-sm ttsh" name="<?php echo "EDIT: $type"?>" style="background-color: #f6c23e;">
										<h4>EDIT</h4>
									</button>
								</a>

								</td>
								<td class="text-center">

								<a href="<?php echo $this->config->base_url("services/ser_delete/$service->services_tbl_id")?>">
									<button class="btn lr-bg menu-btn-sm ttsh" name="<?php echo "DELETE: $type"?>">
										<h4>DELETE</h4>
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
