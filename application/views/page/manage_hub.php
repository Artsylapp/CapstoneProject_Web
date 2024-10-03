<div class="col-xs-12 col-sm-12" style="height:100vh;">
	<div class="container-fluid">
		<div class="row">

			<div class="col-xs-12 col-sm-12" style="text-align: right;">
				<h1 class="overflow-wrap black-txt">MANAGE HUB</h1>
				<h3 class="black-txt" style="margin-top: 0px;">Welcome to VIAMM - <?php echo $this->session->userdata('comp_Name') ?></h3>
			</div>

			<div class="col-xs-6 col-sm-6">
				<a href="<?php echo $this->config->base_url("accounts")?>">
					<button class="btn menu-btn lg-bg ttsh" name="ACCOUNTS">
						<h1 class="">ACCOUNTS</h1>
					</button>
				</a>
			</div>

			<div class="col-xs-6 col-sm-6">
				<a href="<?php echo $this->config->base_url("services")?>">
					<button class="btn menu-btn lbr-bg ttsh " name="SERVICES">
						<h1 class="">SERVICES</h1>
					</button>
				</a>
			</div>
		</div>
		<div class="row mt-s">

			<div class="col-xs-6 col-sm-6">
				<a href="<?php echo $this->config->base_url("locations")?>">
					<button class="btn menu-btn ttsh lb-bg" name="WORK STATIONS">
						<h1 class="">WORK STATIONS</h1>
					</button>
				</a>
			</div>

		</div>
	</div>
</div>
