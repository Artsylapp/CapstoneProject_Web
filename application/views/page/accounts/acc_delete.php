<div>
	<div class="col-lg-9">

		<div class="container">
			<div class="row">
				<div class="col-lg-12">
                    
				<div style="width: 100%; padding: 15px; border-style: solid; border-color:#404040; border-width: medium; background-color: #F2F2F2; color: #000000; margin-bottom:5%; border-radius:24px; text-align: left;">

					<h1 style="padding-left:1%; font-size:50px; font-weight:900">DELETE ACCOUNT</h1>
				
                    <form action="<?php echo $this->config->base_url("accounts/acc_remove/" . $this->uri->segment(3)) ?>" method="POST">

						<?php
							$name = "NAME: " . $accounts->accounts_tbl_name;
							$address = "ADDRESS: " . $accounts->accounts_tbl_address;
							$contact = "CONTACT: " . $accounts->accounts_tbl_contact;
							if($accounts->accounts_tbl_empType == 1){
								$type = "TYPE: ADMIN";
							}else if($accounts->accounts_tbl_empType == 2){
								$type = "TYPE: MASSEUR";
							}else{
								$type = "TYPE: Unapplicable";
							}
						?>

                        <div class="form-group ttsh" style="align-content:left;" data1="<?php echo $name ?>" data2="<?php echo $address ?>" data3="<?php echo $contact ?>" data4="<?php $type ?>">

							<h1 style="padding-left:1%;"><?php echo $name ?></h1>

							<h1 style="padding-left:1%;"><?php echo $address ?></h1>

							<h1 style="padding-left:1%;"><?php echo $contact ?></h1>

							<h1 style="padding-left:1%;"><?php echo $type ?></h1>

						</div>

						<button type="submit" class="btnpushable btnStyle green ttsh" name="CONFIRM" style="margin-top: 5%; margin-left: 1%; width:40%;">
							<span class="btnshadow"></span>
							<span class="btnedge"></span>
							<span class="btnfront">CONFIRM</span>
						</button>

                    </form>

						<a href="<?php echo $this->config->base_url("accounts/acc_select/acc_delete")?>">
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