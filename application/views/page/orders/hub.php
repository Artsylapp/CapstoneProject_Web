<div>
		<div class="col-lg-9">

			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<a href="<?php echo $this->config->base_url("/index.php/orders_create")?>">
							<button type="button" class="btn btn-primary" style="width: 100%; text-align: center; padding: 5%; border-style: solid; border-color:#404040; border-width: medium; background-color: #0097B2; font-size: 30px; color: #000000; margin-bottom:4%;">
								NEW ORDER
							</button>
						</a>
					</div>
				</div>

                <div class="row">
					<div class="col-lg-12">
						<a href="<?php echo $this->config->base_url("/index.php/orders/orders_select/orders_going")?>">
							<button type="button" class="btn btn-primary" style="width: 100%; text-align: center; padding: 5%; border-style: solid; border-color:#404040; border-width: medium; background-color: #A5FFEF; font-size: 30px; color: #000000; margin-bottom:4%;">
								ON-GOING ORDERS
							</button>
						</a>
					</div>
				</div>

                <div class="row">
					<div class="col-lg-12">
						<a href="<?php echo $this->config->base_url("/index.php/orders/orders_select/orders_cancel")?>">
							<button type="button" class="btn btn-primary" style="width: 100%; text-align: center; padding: 5%; border-style: solid; border-color:#404040; border-width: medium; background-color: #A5FFEF; font-size: 30px; color: #000000; margin-bottom:4%;">
								CANCEL ORDER
							</button>
						</a>
					</div>
				</div>

			</div>

		</div>

	</div>
</div>

</body>
</html>
