<div class="col-xs-12 col-sm-12">
	<div class="container-fluid">

		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<h1 class="black-txt overflow-wrap">DELETE ACCOUNT</h1>
				<h3 class="black-txt" style="margin-top: 0px;">
					<a style="color: black;" href="<?php echo $this->config->base_url("manage_hub") ?>">
						<span>Management</span>
					</a>
					> <span>Account</span> - <?php echo $this->session->userdata('comp_Name') ?>
				</h3>
			</div>
		</div>

		<?php
		$name = $accounts->accounts_tbl_name;
		$address = $accounts->accounts_tbl_address;
		$contact = $accounts->accounts_tbl_contact;
		if ($accounts->accounts_tbl_empType == "Admin") {
			$type = "Admin";
		} else if ($accounts->accounts_tbl_empType == "Masseur") {
			$type = "Masseur";
		} else {
			$type = "Unapplicable";
		}
		?>

		<div class="row mt-s">
			<div class="col-sm-12 col-xs-12 box-white">
				<form class="form-horizontal" action="<?php echo $this->config->base_url("accounts/acc_remove/" . $this->uri->segment(3)) ?>" method="POST">
					<div class="form-group">

						<div class="col-sm-offset-1 col-sm-6" style="display: flex; justify-content: left;">
							<label class="control-label col-sm-2" for="fullname">Employee:</label>
							<div class="col-sm-10">
								<input disabled type="text" class="form-control" id="fullname" placeholder="Fullname" value="<?php echo $name ?>">
							</div>
						</div>

						<div class="col-sm-offset-1 col-sm-6" style="display: flex; justify-content: left; padding-top: 1em">
							<label class="control-label col-sm-2" for="fullname">Address:</label>
							<div class="col-sm-10">
								<input disabled ="text" class="form-control" id="fullname" placeholder="Fullname" value="<?php echo $address ?>">
							</div>
						</div>

						<div class="col-sm-offset-1 col-sm-6" style="display: flex; justify-content: left; padding-top: 1em">
							<label class="control-label col-sm-2" for="fullname">Contact:</label>
							<div class="col-sm-10">
								<input disabled ="text" class="form-control" id="fullname" placeholder="Fullname" value="<?php echo $contact ?>">
							</div>
						</div>

						<div class="col-sm-offset-1 col-sm-6" style="display: flex; justify-content: left; padding-top: 1em">
							<label class="control-label col-sm-2" for="fullname">Employee Type:</label>
							<div class="col-sm-10">
								<input disabled ="text" class="form-control" id="fullname" placeholder="Fullname" value="<?php echo $type ?>"required>
							</div>
						</div>

					</div>

					<div class="col-sm-offset-8 col-sm-3" style="margin-top:25px;">
						<div class="col-sm-12">
							<button class="btn lr-bg menu-btn-m ttsh" name="Confirm Delete <?php echo $name ?>">
								<h4>DELETE</h4>
							</button>
						</div>
					</div>

				</form>

				<div class="col-sm-offset-8 col-sm-3" style="margin-bottom:25px; margin-top:25px;">
					<a href="<?php echo $this->config->base_url("accounts") ?>">
						<button class="btn yellow-bg menu-btn-m ttsh" name="Back to Account hub">
							<h4>BACK</h4>
						</button>
					</a>
				</div>

			</div>
		</div>

	</div>
</div>