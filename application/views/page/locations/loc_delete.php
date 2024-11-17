<div class="col-xs-12 col-sm-12">
	<div class="container-fluid">

		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<h1 class="black-txt overflow-wrap">DELETE WORKSTATION</h1>
				<h3 class="black-txt" style="margin-top: 0px;">
					<a style="color: black;" href="<?php echo $this->config->base_url("manage_hub") ?>">
						<span>Management</span>
					</a>
					> <span>Workstation</span> - <?php echo $this->session->userdata('comp_Name') ?>
				</h3>
			</div>
		</div>

		<?php
			$name = $locations->location_tbl_name;
			$type = $locations->location_tbl_type;
			$price = $locations->location_tbl_status;
		?>

		<div class="row mt-s">
			<div class="col-sm-12 col-xs-12 box-white">

				<form class="form-horizontal" action="<?php echo $this->config->base_url("locations/loc_remove/" . $this->uri->segment(3))?>" method="POST">
					<div class="form-group">

						<div class="col-sm-offset-1 col-sm-6" style="display: flex;justify-content: left; padding-top: 1em;">
							<label class="control-label col-sm-2" for="fullname">WorkStation Name:</label>
							<div class="col-sm-10">
								<input disabled type="text" class="form-control" id="fullname" placeholder="Fullname" value="<?php echo $name ?>">
							</div>
						</div>

						<div class="col-sm-offset-1 col-sm-6" style="display: flex;justify-content: left; padding-top: 1em;">
							<label class="control-label col-sm-2" for="fullname">WorkStation Type:</label>
							<div class="col-sm-10">
								<input disabled type="text" class="form-control" id="fullname" placeholder="Fullname" value="<?php echo $type ?>">
							</div>
						</div>

						<div class="col-sm-offset-1 col-sm-6" style="display: flex;justify-content: left; padding-top: 1em;">
							<label class="control-label col-sm-2" for="fullname">Price:</label>
							<div class="col-sm-10">
								<input disabled type="text" class="form-control" id="fullname" placeholder="Fullname" value="<?php echo $price ?>">
							</div>
						</div>
						
					</div>

					<div class="col-sm-offset-8 col-sm-3" style="margin-top:25px;">
						<div class="col-sm-12">
							<button class="btn lr-bg menu-btn-m ttsh" name="Confirm Delete, <?php echo $name ?> ">
								<h4>DELETE</h4>
							</button>
						</div>
					</div>
				</form>

				<div class="col-sm-offset-8 col-sm-3" style="margin-bottom:25px; margin-top:25px;">
					<a href="<?php echo $this->config->base_url("locations")?>">
						<button class="btn yellow-bg menu-btn-m ttsh" name="Back to Workstation hub">
							<h4>BACK</h4>
						</button>
					</a>
				</div>

			</div>
		</div>

	</div>
</div>
