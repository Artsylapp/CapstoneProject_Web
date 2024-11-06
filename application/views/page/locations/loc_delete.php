<div class="col-xs-12 col-sm-12">
	<div class="container-fluid">

		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<h1 class="black-txt overflow-wrap">LOCATION DELETE</h1>
				<h3 class="black-txt" style="margin-top: 0px;">Delete Location - <?php echo $this->session->userdata('comp_Name') ?></h3>
			</div>
		</div>

		<?php
			$name = $locations->location_tbl_name;
			$type = $locations->location_tbl_type;
			$price = $locations->location_tbl_status;
		?>

		<div class="row mt-s">
			<div class="col-sm-12 col-xs-12 box-white">

				<form class="form-horizontal" action="<?php echo $this->config->base_url("locations/loc_remove/" . $this->uri->segment(3))?>" method="POST">
					<div class="form-group">
						<div class="col-sm-offset-1 col-sm-6" style="
						display: flex;
						justify-content: left;
						">
							<h1>Service Name: <?php echo $name?></h1>
						</div>
						<div class="col-sm-offset-1 col-sm-6" style="
						display: flex;
						justify-content: left;
						">
							<h1>Type: <?php echo $type?></h1>
						</div>
						<div class="col-sm-offset-1 col-sm-6" style="
						display: flex;
						justify-content: left;
						">
							<h1>Status: <?php echo $price?></h1>
						</div>
					</div>
					<div class="col-sm-offset-8 col-sm-3" style="margin-top:25px;">
						<div class="col-sm-12">
							<button class="btn lr-bg menu-btn-m ttsh" name="confirm delete">
								<h4>DELETE SERVICE</h4>
							</button>
						</div>
					</div>
				</form>

				<div class="col-sm-offset-8 col-sm-3" style="margin-bottom:25px; margin-top:25px;">
					<a href="<?php echo $this->config->base_url("locations")?>">
						<button class="btn yellow-bg menu-btn-m ttsh" name="cancel">
							<h4>CANCEL</h4>
						</button>
					</a>
				</div>

			</div>
		</div>

	</div>
</div>
