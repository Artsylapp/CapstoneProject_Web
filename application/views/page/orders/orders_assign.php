<div>
	<div class="col-lg-9">

		<div class="container">
			<div class="row">
				<div class="col-lg-12">
                    
				<div style="width: 100%; padding: 15px; border-style: solid; border-color:#404040; border-width: medium; background-color: #F2F2F2; color: #000000; margin-bottom:5%; border-radius:24px; text-align: left;">

						<!-- use for each loop to get everydata and display it as a list -->

						<!-- To submit data just use segment like base_url("/index.php/ser_edit/segment(3)") maybe using get function-->

						<!-- PROBABLY GOING TO USE JAVASCRIPT TO ADD TO A LIST -->
						
						<a href="">
							<button class="btnpushable btnStyle cyan ttsh" name="EMPLOYEE NAME HERE" style="text-align: left;">
                                <span class="btnshadow"></span>
								<span class="btnedge"></span>
								<span class="btnfront">
									<p>NAME: EMPLOYEE NAME</p>
									<p>EMP. TYPE: TYPE</p>
								</span>
							</button>
						</a>

						<a href="<?php echo $this->config->base_url("/index.php/orders_create")?>">
							<button class="btnpushable btnStyle red ttsh" name="CANCEL" style="margin-top: 5%; margin-left: 1%; width:40%;">
								<span class="btnshadow"></span>
								<span class="btnedge"></span>
								<span class="btnfront">CANCEL</span>
							</button>
						</a>

                        <a href="<?php echo $this->config->base_url("/index.php/orders_placement")?>">
							<button class="btnpushable btnStyle green ttsh" name="CONFIRM" style="margin-top: 5%; margin-left: 1%; width:40%;">
								<span class="btnshadow"></span>
								<span class="btnedge"></span>
								<span class="btnfront">CONFIRM</span>
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
