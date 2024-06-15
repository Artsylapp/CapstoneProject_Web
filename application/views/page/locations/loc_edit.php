<div class="col-xs-10 col-sm-10">
	<div class="container-fluid">

		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<h1 class="overflow-wrap">SERVICE EDIT</h1>
				<h3 style="margin-top: 0px;">Edit Service - COMPANY</h3>
			</div>
		</div>

		<div class="row mt-s">
			<div class="col-sm-11 col-xs-11 box-white">

				<form class="form-horizontal" action="<?php echo $this->config->base_url("locations/loc_update/" . $this->uri->segment(3))?>" method="POST">
					<div class="form-group">
						<label class="control-label col-sm-2" for="fullname">Location Name:</label>
						<div class="col-sm-10">
						<input type="text" class="form-control" id="fullname" placeholder="Location Name" value="<?php echo $locations->location_tbl_name ?>" name="edit_Customer" required>
						</div>
					</div>
					<div class="form-group">
							<label class="control-label col-sm-2" for="sel1">Location Type:</label>
							<div class="col-sm-10">
								<select class="form-control" id="sel1" name="optradio">
									<option value="Bed" <?php echo ($locations->location_tbl_type == 'Bed') ? 'selected' : ''; ?>>Bed</option>
									<option value="Chair" <?php echo ($locations->location_tbl_type == 'Chair') ? 'selected' : ''; ?>>Chair</option>
								</select>
							</div>
						</div>
					<div class="col-sm-offset-8 col-sm-3" style="margin-top:25px;">
						<div class="col-sm-12">
							<button class="btn green-bg menu-btn-m ttsh" name="confirm edit">
								<h4>EDIT SERVICE</h4>
							</button>
						</div>
					</div>
				</form>	

				<div class="col-sm-offset-8 col-sm-3" style="margin-bottom:25px; margin-top:25px;">
					<a href="<?php echo $this->config->base_url("locations")?>">
						<button class="btn yellow-bg menu-btn-m ttsh" name="Cancel">
							<h4>CANCEL</h4>
						</button>
					</a>
				</div>

			</div>
		</div>

	</div>
</div>
