<div class="col-xs-12 col-sm-12">
	<div class="container-fluid">

		<div class="row">

			<div class="col-xs-12 col-sm-12">
				<h1 class="overflow-wrap black-txt">DASHBOARD</h1>
				<h3 class="black-txt" style="margin-top: 0px;">Welcome to VIAMM, <?php echo $this->session->userdata('comp_Name') ?>!</h3>
			</div>

		</div>

		<div class="button-container">
			<div class="container-fluid">
				<div class="row">

					<div class="col-s-6 homenavbtn">
						<a href="<?php echo $this->config->base_url("booking") ?>">
							<button class="btn menu-btn lg-bg ttsh" name="BOOKING">
								<img class="menu-icon" src='<?php echo $this->config->base_url("assets/images/icon/icon_booking.png"); ?>' alt="">
								<h1 class="btn-text-menu btn-label">BOOKING</h1>
							</button>
						</a>
					</div>

					<div class="col-s-6 homenavbtn">
						<a href="<?php echo $this->config->base_url("manage_hub") ?>">
							<button class="btn menu-btn ttsh lb-bg" name="MANAGEMENT">
								<img class="menu-icon" src='<?php echo $this->config->base_url("assets/images/icon/icon_manage.png"); ?>' alt="">
								<h1 class="btn-text-menu btn-label">MANAGEMENT</h1>
							</button>
						</a>
					</div>

					<div class="col-s-6 homenavbtn">
						<a href="<?php echo $this->config->base_url("records") ?>">
							<button class="btn menu-btn lbr-bg ttsh " name="RECORDS">
								<img class="menu-icon" src='<?php echo $this->config->base_url("assets/images/icon/icon_records.png"); ?>' alt="">
								<h1 class="btn-text-menu btn-label">RECORDS</h1>
							</button>
						</a>
					</div>

					<div class="col-s-6 homenavbtn">
						<a href="<?php echo $this->config->base_url("analytics") ?>">
							<button class="btn menu-btn lr-bg ttsh" name="ANALYTICS">
								<img class="menu-icon" src='<?php echo $this->config->base_url("assets/images/icon/icon_analytics.png"); ?>' alt="">
								<h1 class="btn-text-menu btn-label">ANALYTICS</h1>
							</button>
						</a>
					</div>

				</div>
			</div>
		</div>

		<div class="button-container top-spacer">
			<div class="container-fluid">
				<div class="row">

					<?php foreach($locations as $location): ?>
						<div class="col-s-2 homenavbtn margin-all">
							<button class="btn menu-btn-location <?php $location->locations_tbl_status = ('Open') ? 'lg-bg' : 'lr-bg' ;?> ttsh">
								<h3 class="btn-label"><?php echo($location->location_tbl_name)?></h1>
								<h3 class="btn-label"><?php echo($location->location_tbl_status)?></h1>
								<h3 class="btn-label">Insert Time Available</h1>
							</button>
						</div>
					<?php endforeach; ?>

				</div>
			</div>
		</div>

	</div>
</div>

<footer>
	<div class="row" style="padding-top: 2em;">
			<div class="">
				<p class="center-item black-txt">&#169; 2024 VIAMM - Technovative</p>
				
				<p class="center-item black-txt">
						<i class="fas fa-envelope"></i>
						Contact Us:
						<a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=202110913@fit.edu.ph" target="_blank" rel="noopener noreferrer">
						<!-- <a href="mailto:202110913@fit.edu.ph"> -->
						<span class="blue-txt">&nbsp;202110913@fit.edu.ph</span>
						</a>
				</p>  

				<p class="center-item black-txt">
						<i class="fas fa-map-marker-alt"></i> 
						FEU Institute of Technology, P. Paredes st, Sampaloc Manila, 1005
				</p>

			</div>
	</div>
</footer>
