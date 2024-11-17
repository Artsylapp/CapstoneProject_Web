<div class="col-xs-12 col-sm-12">
	<div class="container-fluid">

		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<h1 class="black-txt overflow-wrap">EDIT ACCOUNT</h1>
				<h3 class="black-txt" style="margin-top: 0px;"><span>Management</span> > <span>Account</span> - <?php echo $this->session->userdata('comp_Name') ?></h3>
			</div>
		</div>

		<div class="row mt-s">
			<div class="col-sm-12 col-xs-12 box-white">
				<form class="form-horizontal" action="<?php echo $this->config->base_url("accounts/acc_update/" . $this->uri->segment(3))?>" method="POST">
					
					<div class="form-group">
						<label class="control-label col-sm-2" for="fullname">Fullname:</label>
						<div class="col-sm-10">
						<input type="text" class="form-control" id="fullname" placeholder="Fullname" value="<?php echo $accounts->accounts_tbl_name ?>" name="update_Account" required>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2" for="address">Address:</label>
						<div class="col-sm-10">
						<input type="text" class="form-control" id="address" placeholder="Address" value="<?php echo $accounts->accounts_tbl_address ?>" name="update_Address" required>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2" for="contact">Contact Number:</label>

						<div class="col-sm-10">
							<input type="text" class="form-control" id="contact" placeholder="Contact Number" value="<?php echo $accounts->accounts_tbl_contact ?>" name="update_Contact" required>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2" for="sel1">Employee Type:</label>
						<div class="col-sm-10">
							<select class="form-control" id="sel1" name="optradio_update">
								<option <?php if ($accounts->accounts_tbl_empType == "Admin") { echo "selected"; } ?>>Admin</option>
								<option <?php if ($accounts->accounts_tbl_empType == "Masseur") { echo "selected"; } ?>>Masseur</option>
							</select>
						</div>
					</div>

					<div class="col-sm-offset-8 col-sm-3" style="margin-top:25px;">
						<div class="col-sm-12">
							<button class="btn lg-bg menu-btn-m ttsh" name="CONFIRM EDIT">
								<h4>CONFIRM EDIT</h4>
							</button>
						</div>
					</div>

				</form>

				<div class="col-sm-offset-8 col-sm-3" style="margin-bottom:25px; margin-top:25px;">
					<a href="<?php echo $this->config->base_url("accounts")?>">
						<button class="btn lr-bg menu-btn-m ttsh" name="CONFIRM">
							<h4>CANCEL</h4>
						</button>
					</a>
				</div>

			</div>
		</div>

	</div>
</div>
