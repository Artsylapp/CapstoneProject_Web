<div>
	<div class="col-lg-9">

		<div class="container">
			<div class="row">
				<div class="col-lg-12">
                    
				<div style="width: 100%; padding: 15px; border-style: solid; border-color:#404040; border-width: medium; background-color: #F2F2F2; color: #000000; margin-bottom:5%; border-radius:24px; text-align: left;">

					<h1 style="padding-left:1%; font-size:50px; font-weight:900">DELETE SERVICE</h1>
				
                    <form action="<?php echo $this->config->base_url("services/ser_remove/" . $this->uri->segment(3))?>">

                        <div class="form-group" style="align-content:left;">
                        <h1 style="padding-left:1%;">Service Type: <?php echo $services->services_tbl_name ?></h1>

                        <h1 style="padding-left:1%;">Service Description: <?php echo $services->services_tbl_description ?></h1>

                        <h1 style="padding-left:1%;">Service Price: <?php echo $services->services_tbl_price ?></h1>

							<div>
								<button type="submit" class="btnpushable btnStyle green ttsh" name="CONFIRM" style="margin-left: 1%; width:40%;">
									<span class="btnshadow"></span>
									<span class="btnedge"></span>
									<span class="btnfront">CONFIRM</span>
								</button>
							</div>

                        </div>

                    </form>

					<a href="<?php echo $this->config->base_url("services/ser_select/ser_delete")?>">
							<button class="btnpushable btnStyle red ttsh" name="CANCEL" style="width: 40%; margin-left: 1%; font-size: 50px;">
								<span class="btnshadow"></span>
								<span class="btnedge"></span>
								<span class="btnfront">CANCEL</span>
							</button>
						</a>

                    </div>

				</div>
			</div>
		</div>

	</div>

	</div>
</div>
