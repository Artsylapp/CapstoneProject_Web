<div>
	<div class="col-lg-9">

		<div class="container">
			<div class="row">
				<div class="col-lg-12">
                    
				<div style="width: 100%; padding: 15px; border-style: solid; border-color:#404040; border-width: medium; background-color: #F2F2F2; color: #000000; margin-bottom:5%; border-radius:24px; text-align: left;">

						<!-- use for each loop to get everydata and display it as a list (URI = SERVICE ID IN FUNCTIONS) -->


						<?php foreach($services as $service): ?>

							<a href="<?php echo $this->config->base_url("services/$selection_mode/" . $service->services_tbl_id)?>">

								<?php 
									$type = "Service Type: " . $service->services_tbl_name;
									$desc = "Service Description: " . $service->services_tbl_description;
									$price = "ervice Price: " . $service->services_tbl_price;
								?>

								<button class="btnpushable btnStyle cyan ttsh" style="color: black;" data-type="<?php echo $type ?>" data-desc="<?php echo $desc ?>" data-price="<?php echo $price ?>">
									<span class="btnshadow"></span>
									<span class="btnedge"></span>
									<span class="btnfront">
										<p><?php echo $type ?></p>
										<p><?php echo $desc ?></p>
										<p>S<?php echo $price ?></p>
									</span>
								</button>
							</a>

						<?php endforeach; ?>

						<!-- To submit data just use segment like base_url("/index.php/ser_edit/segment(3)") maybe using get function-->

                        <a href="<?php echo $this->config->base_url("services")?>">
							<button class="btnpushable btnStyle red ttsh" name="BACK" style="margin-top: 5%; margin-left: 1%; width:40%; font-size:50px;">
								<span class="btnshadow"></span>
								<span class="btnedge"></span>
								<span class="btnfront">BACK</span>
							</button>
						</a>

				</div>
			</div>
		</div>

	</div>

	</div>
</div>
