<div>
	<div class="col-lg-9">

		<div class="container">
			<div class="row">
				<div class="col-lg-12">
                    
				<div style="width: 100%; padding: 15px; border-style: solid; border-color:#404040; border-width: medium; background-color: #0097B2; color: #000000; margin-bottom:5%; border-radius:24px; text-align: left;">

					<h1 style="padding-left:1%; font-size:50px; font-weight:900">EDIT SERVICE</h1>
				
                    <form action="">

                        <div class="form-group" style="align-content:left;">
                            <input style="font-size:35px; height: auto; margin-top: 3%; margin-bottom: 3%; color:#000000;" type="text" class="form-control" placeholder="NAME" value="PRE-FILLED" required/>

                            <input style="font-size:35px; height: auto; margin-top: 3%; margin-bottom: 3%; color:#000000;" type="text" class="form-control" placeholder="DESCRIPTION" value="PRE-FILLED" required/>

                            <input style="font-size:35px; height: auto; margin-top: 3%; margin-bottom: 3%; color:#000000;" type="number" class="form-control" placeholder="PRICE" value="" required/>

							<div>
								<button type="submit" class="btnpushable btnStyle green ttsh" name="CONFIRM" style="margin-left: 1%; width:40%;">
									<span class="btnshadow"></span>
									<span class="btnedge"></span>
									<span class="btnfront">CONFIRM</span>
								</button>
							</div>

                        </div>

                    </form>

						<a href="<?php echo $this->config->base_url("/index.php/services/ser_select/ser_edit")?>">

							<button class="btnpushable btnStyle red ttsh" name="CANCEL" style="margin-top: 5%; margin-left: 1%; width:40%;">
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
</div>
