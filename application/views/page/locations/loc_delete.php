<div class="col-xs-10 col-sm-10">

	<div class="container-fluid">
		<div class="row">

			<div class="col-xs-12 col-sm-12">
				<h1 class="overflow-wrap">LOCATION DELETE</h1>
				<h3 style="margin-top: 0px;">Delete Location - COMPANY</h3>
			</div>


		</div>

		<div class="row mt-s">
			
			<div class="col-sm-11 col-xs-11 box-white">

			<?php
				$name = $locations->location_tbl_name;
				$type = $locations->location_tbl_type;
				$price = $locations->location_tbl_status;
			?>

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
						<button class="btn red-bg menu-btn-m ttsh" name="confirm delete">
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
