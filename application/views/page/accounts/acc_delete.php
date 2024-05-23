<div class="col-xs-10 col-sm-10">

	<div class="container-fluid">
		<div class="row">

			<div class="col-xs-12 col-sm-12">
				<h1 class="overflow-wrap">ACCOUNT DELETE</h1>
				<h3 style="margin-top: 0px;">Delete Account - COMPANY</h3>
			</div>


		</div>

		<div class="row mt-s">
			
			<div class="col-sm-11 col-xs-11 box-white">

				<?php
					$name = $accounts->accounts_tbl_name;
					$address = $accounts->accounts_tbl_address;
					$contact = $accounts->accounts_tbl_contact;
					if($accounts->accounts_tbl_empType == 1){
						$type = "ADMIN";
					}else if($accounts->accounts_tbl_empType == 2){
						$type = "MASSEUR";
					}else{
						$type = "Unapplicable";
					}
				?>

				<form class="form-horizontal" action="<?php echo $this->config->base_url("accounts/acc_remove/" . $this->uri->segment(3))?>" method="POST">
					
					<div class="form-group">
						<div class="col-sm-offset-1 col-sm-6" style="display: flex; justify-content: left;">
							<h1>Fullname: <?php echo $name?></h1>
						</div>

						<div class="col-sm-offset-1 col-sm-6" style="display: flex; justify-content: left;">
							<h1>Address: <?php echo $address?></h1>
						</div>

						<div class="col-sm-offset-1 col-sm-6" style="display: flex; justify-content: left;">
							<h1>Contact: <?php echo $contact?></h1>
						</div>

						<div class="col-sm-offset-1 col-sm-6" style="display: flex; justify-content: left;">
							<h1>Employee Type: <?php echo $type?></h1>
						</div>
					</div>

					<div class="col-sm-offset-8 col-sm-3" style="margin-top:25px;">
						<div class="col-sm-12">
							<button class="btn red-bg menu-btn-m ttsh" name="CONFIRM DELETE">
								<h4>CONFIRM DELETE</h4>
							</button>
						</div>
					</div>
					
				</form>

				<div class="col-sm-offset-8 col-sm-3" style="margin-bottom:25px; margin-top:25px;">
					<a href="<?php echo $this->config->base_url("accounts")?>">
						<button class="btn yellow-bg menu-btn-m ttsh" name="CONFIRM">
							<h4>CANCEL</h4>
						</button>
					</a>
				</div>

			</div>

		</div>

	</div>

</div>
