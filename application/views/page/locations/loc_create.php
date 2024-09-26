<div class="col-xs-12 col-sm-12">
	<div class="container-fluid">

		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<h1 class="overflow-wrap black-txt">LOCATION CREATE</h1>
				<h3 class="black-txt" style="margin-top: 0px;">Create Location - COMPANY</h3>
			</div>
		</div>

		<div class="row mt-s">
			<div class="col-sm-12 col-xs-12 box-white">

				<form class="form-horizontal" action="<?php echo $this->config->base_url("locations/loc_add")?>" method="POST">
					<div class="form-group">
						<label class="control-label col-sm-2" for="fullname">Location Name:</label>
						<div class="col-sm-10">
						<input type="text" class="form-control" id="fullname" placeholder="Location Name" name="create_Customer" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="sel1">Location Type:</label>
						<div class="col-sm-10">
							<select class="form-control" id="sel1" name="optradio">
								<option>Bed</option>
								<option>Chair</option>
							</select>
						</div>
					</div>
					<div class="col-sm-offset-9 col-sm-3" style="margin-top:25px;">
						<div class="col-sm-12">
							<button class="btn green-bg menu-btn-m ttsh" name="confirm creation">
								<h4>CREATE LOCATION</h4>
							</button>
						</div>
					</div>
				</form>

				<div class="col-sm-offset-9 col-sm-3" style="margin-bottom:25px; margin-top:25px;">
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
