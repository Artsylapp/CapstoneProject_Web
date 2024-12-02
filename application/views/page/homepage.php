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
					<?php 
						// Generate unique ID for the location button
						$locationId = preg_replace('/\s+/', '_', $location->location_tbl_name); // Replace spaces with underscores for IDs

						// Check if location_tbl_freetime is valid and calculate the time
						if (!empty($location->location_tbl_freetime)) {
							try {
								$freetime = (new DateTime($location->location_tbl_freetime))->add(new DateInterval('PT8H'))->format('Y-m-d H:i:s'); // Add 8 hours and format
								$freetime_formatted = (new DateTime($location->location_tbl_freetime))->add(new DateInterval('PT8H'))->format('h:i:s A'); // Add 8 hours and format
							} catch (Exception $e) {
								$freetime = 'Invalid Time'; // Fallback if DateTime fails
							}
						} else {
							$freetime = 'N/A'; // Fallback for missing time
						}
					?>
					<?php if ($location->location_tbl_status == "BOOKED"): ?>
						<div class="col-s-2 homenavbtn margin-all">
							<button name="<?php echo( htmlspecialchars($location->location_tbl_name), htmlspecialchars($freetime_formatted)) ?>" id="btn-<?php echo $locationId; ?>" class="btn menu-btn-location lr-bg ttsh" data-freetime="<?php echo $freetime; ?>">
								<h1 class="btn-label"><?php echo htmlspecialchars($location->location_tbl_name); ?></h1>
								<h2 class="btn-label"><?php echo htmlspecialchars($location->location_tbl_status); ?></h2>
								<h2 class="btn-label"><?php echo htmlspecialchars($freetime_formatted); ?></h2>
							</button>
						</div>
					<?php else: ?>
						<div class="col-s-2 homenavbtn margin-all">
							<button name="<?php echo htmlspecialchars($location->location_tbl_name); ?>" id="btn-<?php echo $locationId; ?>" class="btn menu-btn-location lg-bg ttsh">
								<h1 class="btn-label"><?php echo htmlspecialchars($location->location_tbl_name); ?></h1>
								<h2 class="btn-label"><?php echo htmlspecialchars($location->location_tbl_status); ?></h2>
							</button>
						</div>
					<?php endif; ?>
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

<script>

	function textToSpeech(button) {
		button.
	}
	
    // Function to flash the button
    function flashButton(button) {

        if (button.style.backgroundColor === 'rgb(255, 66, 66)') {
			button.style.backgroundColor = '#ffef42'; // Yellow color
		} else {
			button.style.backgroundColor = '#ff4242'; // Red color
		}

    }

    // Function to check times and flash buttons
    function checkButtons() {
        const buttons = document.querySelectorAll('button[data-freetime]'); // Select buttons with the `data-freetime` attribute

        buttons.forEach(button => {
            const freeTime = new Date(button.getAttribute('data-freetime'));
            const currentTime = new Date();
            const diffInMinutes = Math.abs((currentTime - freeTime) / (1000 * 60)); // Calculate time difference in minutes

			console.log(`Button ID: ${button.id}, Time Difference: ${diffInMinutes} minutes`);

            if (diffInMinutes <= 5) {
                // Flash the button
                flashButton(button);
            } else {
                // Reset to default background if condition is not met
                button.style.backgroundColor = '';
            }

			if (diffInMinutes <= 1) {
                // Flash the button
                textToSpeech(button);
            } else {
                // Reset to default background if condition is not met
                button.style.backgroundColor = '';
            }
        });
    }

    // Check every second
    setInterval(checkButtons, 1000);
</script>

