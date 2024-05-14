<div class="col-xs-10 col-sm-10">

	<div class="container-fluid">
		<div class="row">

			<div class="col-xs-12 col-sm-12">
				<h1 class="overflow-wrap">ACCOUNT CREATION</h1>
				<h3 style="margin-top: 0px;">Create Account - COMPANY</h3>
			</div>


		</div>

		<div class="row mt-s">
			
			<div class="col-sm-11 col-xs-11 box-white">

			<form class="form-horizontal" action="<?php echo $this->config->base_url("acc_add") ?>" method="POST">
				<div class="form-group">
					<label class="control-label col-sm-2" for="fullname">Fullname:</label>
					<div class="col-sm-10">
					<input type="text" class="form-control" id="fullname" placeholder="Fullname" name="create_Account" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="address">Address:</label>
					<div class="col-sm-10">
					<input type="text" class="form-control" id="address" placeholder="Address" name="create_Address" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="contact">Contact Number:</label>
					<div class="col-sm-10">
					<input type="text" class="form-control" id="contact" placeholder="Contact Number" name="create_Contact" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="sel1">Employee Type:</label>
					<div class="col-sm-10">
						<select class="form-control" id="sel1" name="optradio">
							<option>Admin</option>
							<option>Masseur</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-2">
						<button class="btn green-bg menu-btn-m ttsh" name="CONFIRM">
							<h4>CONFIRM</h4>
						</button>
					</div>
				</div>
			</form>

			</div>

		</div>

	</div>

</div>
