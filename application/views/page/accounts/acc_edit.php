<div>
	<div class="col-lg-9">

		<div class="container">
			<div class="row">
				<div class="col-lg-12">
                    
				<div style="width: 100%; padding: 15px; border-style: solid; border-color:#404040; border-width: medium; background-color: #0097B2; color: #000000; margin-bottom:5%; border-radius:24px; text-align: left;">

					<h1 style="padding-left:1%; font-size:50px; font-weight:900">EDIT ACCOUNT</h1>
				
                    <form action="<?php echo $this->config->base_url("accounts/acc_update/" . $this->uri->segment(3))?>" method="POST">

                        <div class="form-group" style="align-content:left;">
                            <input style="font-size:35px; height: auto; margin-top: 3%; margin-bottom: 3%; color:#000000;" type="text" class="form-control" placeholder="NAME" value="<?php echo $accounts->accounts_tbl_name ?>" name="update_Account" required/>

                            <input style="font-size:35px; height: auto; margin-top: 3%; margin-bottom: 3%; color:#000000;" type="text" class="form-control" placeholder="ADDRESS" value="<?php echo $accounts->accounts_tbl_address ?>" name="update_Address" required/>

                            <input style="font-size:35px; height: auto; margin-top: 3%; margin-bottom: 3%; color:#000000;" type="text" class="form-control" placeholder="CONTACT" value="<?php echo $accounts->accounts_tbl_contact ?>" name="update_Contact" required/>

							<div>
								<button type="submit" class="btnpushable btnStyle green ttsh" style="margin-left: 1%; width:40%;" name="CONFIRM">
									<span class="btnshadow"></span>
									<span class="btnedge"></span>
									<span class="btnfront">CONFIRM</span>
								</button>
							</div>

                        </div>

                    </form>
						<a href="<?php echo $this->config->base_url("accounts")?>">
							<button class="btnpushable btnStyle red ttsh" style="margin-top: 5%; margin-left: 1%; width:40%;" name="CANCEL">
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