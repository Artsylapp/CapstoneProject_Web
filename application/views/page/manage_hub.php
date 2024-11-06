<div class="col-xs-12 col-sm-12" style="height:100vh;">
	<div class="container-fluid">

		<div class="row">

			<div class="col-xs-12 col-sm-12">
				<h1 class="black-txt overflow-wrap">MANAGE HUB</h1>
				<h3 class="black-txt" style="margin-top: 0px;">Welcome to VIAMM - <?php echo $this->session->userdata('comp_Name') ?></h3>
			</div>

		</div>

		<div class="button-container">
			<div class="container-fluid">

			<div class="row">

				<div class="col-s-6 homenavbtn">
					<a href="<?php echo $this->config->base_url("accounts")?>">
						<button class="btn menu-btn lg-bg ttsh" name="ACCOUNTS">
							<img class="menu-icon" src='<?php echo $this->config->base_url("assets/images/icon/icon_accounts.png");?>' alt="">
							<h1 class="btn-label">ACCOUNTS</h1>
						</button>
					</a>
				</div>

				<div class="col-s-6 homenavbtn">
					<a href="<?php echo $this->config->base_url("services")?>">
						<button class="btn menu-btn lbr-bg ttsh " name="SERVICES">
							<img class="menu-icon" src='<?php echo $this->config->base_url("assets/images/icon/icon_services.png");?>' alt="">
							<h1 class="btn-label">SERVICES</h1>
						</button>
					</a>
				</div>

				<div class="col-s-6 homenavbtn">
					<a href="<?php echo $this->config->base_url("locations")?>">
						<button class="btn menu-btn ttsh lb-bg" name="WORK STATIONS">
							<img class="menu-icon" src='<?php echo $this->config->base_url("assets/images/icon/icon_station.png");?>' alt="">
							<h1 class="btn-label">WORK STATIONS</h1>
						</button>
					</a>
				</div>

				</div>

			</div>
		</div>
		
		
	</div>
</div>
