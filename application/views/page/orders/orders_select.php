<div>
	<div class="col-lg-9">

		<div class="container">
			<div class="row">
				<div class="col-lg-12">
                    
				<div style="width: 100%; padding: 15px; border-style: solid; border-color:#404040; border-width: medium; background-color: #F2F2F2; color: #000000; margin-bottom:5%; border-radius:24px; text-align: left;">

						<!-- use for each loop to get everydata and display it as a list -->

						<!-- To submit data just use segment like base_url("ser_edit/segment(3)") maybe using get function-->
						
						<a href="<?php echo $this->config->base_url("$selection_mode")?>">
							<button type="button" class="btn btn-primary" style="width: 100%; text-align: center; padding: 2%; border-style: solid; border-color:#404040; border-width: medium; background-color: #0097B2; font-size: 24px; color: #000000; margin-bottom:2%; text-align: left;">
                                <p>ORDER NUMBER: XX</p>
								<p>TOTAL: XX.XX</p>
							</button>
						</a>

						<a href="<?php echo $this->config->base_url("orders")?>">
							<button class="btnpushable btnStyle red" style="margin-top: 5%; margin-left: 1%; width:40%;" >
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

</body>
</html>
