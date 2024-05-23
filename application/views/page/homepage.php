<div class="col-xs-10 col-sm-10">

	<div class="container-fluid">
		<div class="row">

			<div class="col-xs-12 col-sm-12">
				<h1 class="overflow-wrap">DASHBOARD</h1>
				<h3 style="margin-top: 0px;">Welcome to VIAMM - <?php echo $this->session->userdata('comp_Name') ?></h3>
			</div>

			<div class="col-xs-4 col-sm-4">
				<a href="<?php echo $this->config->base_url("orders")?>">
					<button class="btn white-bg menu-btn ttsh" name="ORDERING">
						<h1 class="">ORDERING</h1>
					</button>
				</a>
			</div>

			<div class="col-xs-4 col-sm-4">
				<a href="<?php echo $this->config->base_url("manage_hub")?>">
					<button class="btn white-bg menu-btn ttsh" name="MANAGEMENT">
						<h1 class="">MANAGE</h1>
					</button>
				</a>
			</div>

			<div class="col-xs-4 col-sm-4">
				<a href="<?php echo $this->config->base_url("records")?>">
					<button class="btn white-bg menu-btn ttsh" name="RECORDS">
						<h1 class="">RECORDS</h1>
					</button>
				</a>
			</div>

		</div>

		<div class="row mt-s">
			
			<div class="col-xs-8 col-sm-8" style="padding-right:0">
				<div class="placeholder" style="height:40vh; width:100%; background-color: #ffffff;">
					placeholder until record gets done
				</div>
			</div>

			<div class="col-xs-4 col-sm-4" style="padding-right:0">
				<div class="placeholder" style="height:40vh; width:100%; background-color: #ffffff;">
					placeholder until orders processing gets done
				</div>
			</div>

		</div>

	</div>

</div>
