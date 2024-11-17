<div class="col-xs-12 col-sm-12">

	<div class="container-fluid">
		<div class="row">

			<div class="col-xs-12 col-sm-12">
				<h1 class="black-txt overflow-wrap">DELETE SERVICE</h1>
				<h3 class="black-txt" style="margin-top: 0px;">
					<a style="color: black;" href="<?php echo $this->config->base_url("manage_hub") ?>">
						<span>Management</span>
					</a>
					> <span>Service</span> - <?php echo $this->session->userdata('comp_Name') ?>
				</h3>
			</div>


		</div>

		<div class="row mt-s">
			
			<div class="col-sm-12 col-xs-12 box-white">

			<?php
				$name = $services->services_tbl_name;
				$description = $services->services_tbl_description;
				$price = $services->services_tbl_price;
			?>

			<form class="form-horizontal" action="<?php echo $this->config->base_url("services/ser_remove/" . $this->uri->segment(3))?>" method="POST">
				<div class="form-group">

					<div class="col-sm-offset-1 col-sm-6" style="display: flex;justify-content: left; padding-top: 1em;">
						<label class="control-label col-sm-2" for="SrvName">Service Name:</label>
						<div class="col-sm-10" style="padding-left: 2.5em;">
							<input disabled type="text" class="form-control" id="SrvName" placeholder="Service Name" value="<?php echo $name ?>">
						</div>
					</div>

					<div class="col-sm-offset-1 col-sm-6" style="display: flex;justify-content: left; padding-top: 1em;">
						<label class="control-label col-sm-2" for="SrvDsc">Description:</label>
						<div class="col-sm-10" style="padding-left: 2.5em;">
							<input disabled type="text" class="form-control" id="SrvDsc" placeholder="Service Description" value="<?php echo $description ?>">
						</div>
					</div>

					<div class="col-sm-offset-1 col-sm-6" style="display: flex;justify-content: left; padding-top: 1em;">
						<label class="control-label col-sm-2" for="SrvPrc">Price:</label>
						<div class="col-sm-10" style="padding-left: 2.5em;">
							<input disabled type="text" class="form-control" id="SrvPrc" placeholder="Service Price" value="<?php echo $price ?>">
						</div>
					</div>

				</div>

				<div class="col-sm-offset-8 col-sm-3" style="margin-top:25px;">
					<div class="col-sm-12">
						<button class="btn lr-bg menu-btn-m ttsh" name="Confirm Delete, <?php echo $name ?>">
							<h4>DELETE</h4>
						</button>
					</div>
				</div>
			</form>

			<div class="col-sm-offset-8 col-sm-3" style="margin-bottom:25px; margin-top:25px;">
				<a href="<?php echo $this->config->base_url("services")?>">
					<button class="btn yellow-bg menu-btn-m ttsh" name="Back to Service hub">
						<h4>BACK</h4>
					</button>
				</a>
			</div>

			</div>

		</div>

	</div>

</div>
