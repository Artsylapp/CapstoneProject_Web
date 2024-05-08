<div>
	<div class="col-lg-9">

		<div class="container">
			<div class="row">
				<div class="col-lg-12">
                    
				<div style="width: 100%; padding: 15px; border-style: solid; border-color:#404040; border-width: medium; background-color: #F2F2F2; color: #000000; margin-bottom:5%; border-radius:24px; text-align: left;">

                    <div class="form-group" style="align-content:left;">
						<h1 style="padding-left:1%;">Serivce Type: <?php echo $services->services_tbl_name ?></h1>

						<h1 style="padding-left:1%;">Service Description: <?php echo $services->services_tbl_description ?></h1>

						<h1 style="padding-left:1%;">Service Price: <?php echo $services->services_tbl_price ?></h1>

                    </div>

					<a href="<?php echo $this->config->base_url("services/ser_select/ser_desc")?>">
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
</div>
