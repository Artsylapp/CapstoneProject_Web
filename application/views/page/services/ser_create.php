<div class="col-xs-12 col-sm-12">

	<div class="container-fluid">
		<div class="row">

			<div class="col-xs-12 col-sm-12">
				<h1 class="black-txt overflow-wrap">SERVICE CREATE</h1>
				<h3 class="black-txt" style="margin-top: 0px;">Create Service - <?php echo $this->session->userdata('comp_Name') ?></h3>
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
						<label class="control-label col-sm-2" for="sel1">Service Designation:</label>
						<div class="col-sm-10">
							<select class="form-control" id="sel1" name="optradio">
								<option>Bed</option>
								<option>Chair</option>
							</select>
						</div>
					</div>
				<div class="col-sm-offset-9 col-sm-3" style="margin-top:25px;">
					<div class="col-sm-12">
						<button class="btn lg-bg menu-btn-m ttsh" name="confirm creation">
							<h4>CREATE SERVICE</h4>
						</button>
					</div>
				</div>
			</form>

			<div class="col-sm-offset-9 col-sm-3" style="margin-bottom:25px; margin-top:25px;">
				<a href="<?php echo $this->config->base_url("services")?>">
					<button class="btn lr-bg menu-btn-m ttsh" name="Cancel">
						<h4>CANCEL</h4>
					</button>
				</a>
			</div>

			</div>

		</div>

	</div>

</div>
