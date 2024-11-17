<div class="col-xs-12 col-sm-12">
	<div class="container-fluid">

		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<h1 class="black-txt overflow-wrap">CREATE ACCOUNT</h1>
				<h3 class="black-txt" style="margin-top: 0px;">
					<a style="color: black;" href="<?php echo $this->config->base_url("manage_hub") ?>">
						<span>Management</span>
					</a>
					> <span>Account</span> - <?php echo $this->session->userdata('comp_Name') ?>
				</h3>
			</div>
		</div>

		<?php if (isset($info['error'])): ?>
			<div class="alert alert-danger">
					<?php echo $info['error']; ?>
			</div>
		<?php endif; ?>

		<div class="row mt-s box-white">
			<div class="col-sm-12 col-xs-12 ">
				<form class="form-horizontal" action="<?php echo $this->config->base_url("acc_add") ?>" method="POST">
				
					<div class="form-group">
						<label class="control-label col-sm-2" for="EmpName">Employee Name:</label>

						<div class="col-sm-10">
							<input type="text" class="form-control" id="EmpName" placeholder="Employee Name" name="create_Account" required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-2" for="EmpAdd">Address:</label>

						<div class="col-sm-10">
							<input type="text" class="form-control" id="EmpAdd" placeholder="Address" name="create_Address" required>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2" for="EmpCnt">Contact Number:</label>

						<div class="col-sm-10">
							<input type="text" class="form-control" id="EmpCnt" placeholder="Masseur Contact Number" name="create_Contact" required>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2" for="sel1">Employee Type:</label>
						<div class="col-sm-10">
							<select class="form-control" id="sel1" name="optradio">
								<option>Masseur</option>
								<option>Admin</option>
							</select>
						</div>
					</div>

					<div class="col-sm-offset-8 col-sm-3" style="margin-top:25px;">
						<div class="col-sm-12">
							<button class="btn lg-bg menu-btn-m ttsh" name="Confirm Create Account">
								<h4>CREATE</h4>
							</button>
						</div>
					</div>

				</form>
			</div>
			
			<div class="col-sm-offset-8 col-sm-3" style="margin-bottom:25px; margin-top:25px;">
				<a href="<?php echo $this->config->base_url("accounts")?>">
					<button class="btn lr-bg menu-btn-m ttsh" name="Back to Account hub">
						<h4>BACK</h4>
					</button>
				</a>
			</div>

		</div>

	</div>
</div>
