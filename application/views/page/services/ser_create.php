<div class="col-xs-12 col-sm-12">

	<div class="container-fluid">
		<div class="row">

			<div class="col-xs-12 col-sm-12">
				<h1 class="black-txt overflow-wrap">CREATE SERVICE</h1>
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

			<form class="form-horizontal" action="<?php echo $this->config->base_url("services/ser_add")?>" method="POST">

				<div class="form-group">
					<label class="control-label col-sm-2" for="fullname">Service Name:</label>
					<div class="col-sm-10">
					<input type="text" class="form-control" id="fullname" placeholder="Service Name" name="create_Customer" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-2" for="address">Description:</label>
					<div class="col-sm-10">
					<input type="text" class="form-control" id="address" placeholder="Service Description" name="create_Description" required>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2" for="contact">Price:</label>
					<div class="col-sm-10">
					<input type="number" class="form-control" id="contact" placeholder="Service Price" name="create_Price" required>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2" for="SrvDsg">Designation:</label>
					<div class="col-sm-10">
						<select class="form-control" id="SrvDsg" name="optradio">
							<option>Bed</option>
							<option>Chair</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2" for="SrvDur">Service Duration:</label>
					<div class="col-sm-10">
						<select class="form-control" id="SrvDur" name="srvDur">
							<option>120 Minutes</option>
							<option>90 Minutes</option>
							<option>60 Minutes</option>
							<option>30 Minutes</option>
						</select>
					</div>
				</div>

				<div class="col-sm-offset-9 col-sm-3" style="margin-top:25px;">
					<div class="col-sm-12">
						<button class="btn lg-bg menu-btn-m ttsh" name="Confirm Create Service">
							<h4>CREATE</h4>
						</button>
					</div>
				</div>
				
			</form>

			<div class="col-sm-offset-9 col-sm-3" style="margin-bottom:25px; margin-top:25px;">
				<a href="<?php echo $this->config->base_url("services")?>">
					<button class="btn lr-bg menu-btn-m ttsh" name="Back to Service hub">
						<h4>BACK</h4>
					</button>
				</a>
			</div>

			</div>

		</div>

	</div>

</div>
