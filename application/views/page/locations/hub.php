<div class="col-xs-12 col-sm-12">
	<div class="container-fluid">
		
		<div class="row">

			<div class="col-xs-12 col-sm-12" style="text-align: right;">
				<h1 class="overflow-wrap black-txt">LOCATION HUB</h1>
				<h3 class="black-txt" style="margin-top: 0px;">Manage Location - COMPANY</h3>
			</div>

			<div class="col-xs-4 col-sm-4"></div>

			<div class="col-xs-4 col-sm-4 center-item">
				<a href="<?php echo $this->config->base_url("loc_create")?>">
					<button class="btn green-bg menu-btn-m center-item ttsh" name="NEW Location">
						<h3 class="">NEW LOCATION</h3>
					</button>
				</a>
			</div>

		</div>

		<div class="row mt-s center-item">
			<div class="col-sm-12 col-xs-12 box-white">
				<table class="table table-hover" id="acc_table">
					<thead>
						<tr>
							<th>Location Name</th>
							<th>Type</th>
							<th>Status</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>

					<tbody>
						<?php foreach($locations as $location): ?>
							<tr data-location-type="<?php echo $location->location_tbl_type; ?>">
								<td><?php echo $location->location_tbl_name; ?></td>
								<td><?php echo $location->location_tbl_type; ?></td>
								<td class="text-center"><?php echo $location->location_tbl_status; ?></td>
								<td class="text-center">
									<a href="<?php echo $this->config->base_url("locations/loc_edit/$location->location_tbl_id")?>">
										<button class="btn yellow-bg menu-btn-sm ttsh" name="<?php echo "EDIT: $location->location_tbl_name"?>" style="background-color: #f6c23e;">
											<h4>EDIT</h4>
										</button>
									</a>
								</td>
								<td class="text-center">
									<a href="<?php echo $this->config->base_url("locations/loc_delete/$location->location_tbl_id")?>">
										<button class="btn red-bg menu-btn-sm ttsh" name="<?php echo "DELETE: $location->location_tbl_name"?>">
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
