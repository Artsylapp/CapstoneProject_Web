<div class="col-xs-12 col-sm-12">
	<div class="container-fluid">

		<div class="row">

			<div class="col-xs-12 col-sm-12">
				<h1 class="overflow-wrap black-txt">DASHBOARD</h1>
				<h3 class="black-txt" style="margin-top: 0px;">Welcome to VIAMM - <?php echo $this->session->userdata('comp_Name') ?></h3>
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

	</div>
</div>

<script>
    (function() {
        async function updateSize() {
            const width = await getWidth();
            const height = await getHeight();
            console.log("Width: " + width + " Height: " + height);
        }

        async function getWidth() {
            return window.innerWidth;
        }

        async function getHeight() {
            return window.innerHeight;
        }

        // Initial call to display the current size
        updateSize();

        // Update the size and log it whenever the window is resized
        window.addEventListener('resize', updateSize);
    })();
</script>
