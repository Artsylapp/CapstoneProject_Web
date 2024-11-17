<div class="col-xs-12 col-sm-12">
	<div class="container-fluid">

		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<h1 class="black-txt overflow-wrap">EDIT WORKSTATION</h1>
				<h3 class="black-txt" style="margin-top: 0px;">
					<a style="color: black;" href="<?php echo $this->config->base_url("manage_hub") ?>">
						<span>Management</span>
					</a>
					> <span>Workstation</span> - <?php echo $this->session->userdata('comp_Name') ?>
				</h3>
			</div>
		</div>

		<div class="row mt-s">
			<div class="col-sm-12 col-xs-12 box-white">

				<form class="form-horizontal" action="<?php echo $this->config->base_url("locations/loc_update/" . $this->uri->segment(3))?>" method="POST">
					<div class="form-group">
						<label class="control-label col-sm-2" for="fullname">WorkStation Name:</label>
						<div class="col-sm-10">
						<input type="text" class="form-control" id="fullname" placeholder="Workstation Name" value="<?php echo $locations->location_tbl_name ?>" name="edit_Customer" required>
						</div>
					</div>
					<div class="form-group">
							<label class="control-label col-sm-2" for="sel1">WorkStation Type:</label>
							<div class="col-sm-10">
								<select class="form-control" id="sel1" name="optradio">
									<option value="Bed" <?php echo ($locations->location_tbl_type == 'Bed') ? 'selected' : ''; ?>>Bed</option>
									<option value="Chair" <?php echo ($locations->location_tbl_type == 'Chair') ? 'selected' : ''; ?>>Chair</option>
								</select>
							</div>
						</div>
					<div class="col-sm-offset-8 col-sm-3" style="margin-top:25px;">
						<div class="col-sm-12">
							<button class="btn lg-bg menu-btn-m ttsh" name="Confirm Edit, <?php echo $locations->location_tbl_name ?>">
								<h4>EDIT</h4>
							</button>
						</div>
					</div>
				</form>	

				<div class="col-sm-offset-8 col-sm-3" style="margin-bottom:25px; margin-top:25px;">
					<a href="<?php echo $this->config->base_url("locations")?>">
						<button class="btn lr-bg menu-btn-m ttsh" name="Back to workstation hub">
							<h4>BACK</h4>
						</button>
					</a>
				</div>

			</div>
		</div>

	</div>
</div>
