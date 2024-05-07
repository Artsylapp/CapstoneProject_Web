<div>
		<div class="col-lg-9">

			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<a href="<?php echo $this->config->base_url("/index.php/orders_create")?>">
							<button class="btnpushable btnStyle cyan">
								<span class="btnshadow"></span>
								<span class="btnedge"></span>
								<span class="btnfront">NEW ORDER</span>
							</button>
						</a>
					</div>
				</div>

                <div class="row">
					<div class="col-lg-12">
						<a href="<?php echo $this->config->base_url("/index.php/orders/orders_select/orders_going")?>">
							<button class="btnpushable btnStyle blue">
								<span class="btnshadow"></span>
								<span class="btnedge"></span>
								<span class="btnfront">VIEW ORDER</span>						
							</button>
					</div>
				</div>

                <div class="row">
					<div class="col-lg-12">
						<a href="<?php echo $this->config->base_url("/index.php/orders/orders_select/orders_cancel")?>">
							<button class="btnpushable btnStyle red">
								<span class="btnshadow"></span>
								<span class="btnedge"></span>
								<span class="btnfront">CANCEL ORDER</span>
							</button>
						</a>
					</div>
				</div>

			</div>

		</div>

	</div>
</div>