<div>
	<div class="col-lg-9">

		<div class="container">
			<div class="row">
				<div class="col-lg-12">
                    
				<div style="width: 100%; padding: 15px; border-style: solid; border-color:#404040; border-width: medium; background-color: #F2F2F2; color: #000000; margin-bottom:5%; border-radius:24px; text-align: left;">

						<!-- Use for each to display data from the database -->
						<a href="<?php echo $this->config->base_url("/index.php/ser_delete")?>">
							<button class="btnpushable btnStyle cyan" style="text-align: left;">
								<span class="btnshadow"></span>
								<span class="btnedge"></span>
								<span class="btnfront">
									<!-- <p>NAME: <?php echo $service['name']; ?></p>
									<p>DESC: <?php echo $service['description']; ?></p>
									<p>PRICE: <?php echo $service['price']; ?></p> -->
									<p>NAME: SERVICE NAME</p>
									<p>DESC: SERVICE DESCRIPTION</p>
									<p>PRICE: SERVICE PRICE</p>
								</span>
							</button>
						</a>

						<a href="<?php echo $this->config->base_url("/index.php/services")?>">
							<button class="btnpushable btnStyle red" style="margin-top: 5%; margin-left: 1%; width:40%;">
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
