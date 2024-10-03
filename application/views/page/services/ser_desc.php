<div>
	<div class="col-lg-12">

		<div class="container">
			<div class="row ">
				<div class="col-lg-12">
                    
				<div style="width: 100%; padding: 15px; border-style: solid; border-color:#404040; border-width: medium; background-color: #F2F2F2; color: #000000; margin-bottom:5%; border-radius:24px; text-align: left;">

					<?php 
						$type = "Service Type: " . $services->services_tbl_name;
						$desc = "Service Description: " . $services->services_tbl_description;
						$price ="Service Price: " . $services->services_tbl_price;
					?>
                    <!-- <div class="form-group ttsh" style="align-content:left;">
						<h1 class="ttsh" style="padding-left:1%;" name="<?php echo $type ?>"><?php echo $type ?></h1>

						<h1 class="ttsh" style="padding-left:1%;" name="<?php echo $desc ?>"><?php echo $desc ?></h1>

						<h1 class="ttsh" style="padding-left:1%;" name="<?php echo $price ?>"><?php echo $price ?></h1>
                    </div> -->

					<div class="form-group ttsh" style="align-content:left;" data1="<?php echo $type ?>" data2="<?php echo $desc ?>" data3="<?php echo $price ?>">
						<h1 style="padding-left:1%;" name="<?php echo $type ?>"><?php echo $type ?></h1>
						<h1 style="padding-left:1%;" name="<?php echo $desc ?>"><?php echo $desc ?></h1>
						<h1 style="padding-left:1%;" name="<?php echo $price ?>"><?php echo $price ?></h1>
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
