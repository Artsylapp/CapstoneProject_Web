<div>
	<div class="col-lg-9">

		<div class="container">
			<div class="row">
				<div class="col-lg-12">
                    
				<div style="width: 100%; padding: 15px; border-style: solid; border-color:#404040; border-width: medium; background-color: #F2F2F2; color: #000000; margin-bottom:5%; border-radius:24px; text-align: left;">

						<!-- use for each loop to get everydata and display it as a list -->

						<!-- To submit data just use segment like base_url("/index.php/ser_edit/segment(3)") maybe using get function-->

						<?php foreach($accounts as $account):  ?>
						
							<a href="<?php echo $this->config->base_url("accounts/$selection_mode/" . $account->accounts_tbl_id)?>">

								<?php 
									$name = "Employee Name: " . $account->accounts_tbl_name;
									$contact = "Contact Number: " . $account->accounts_tbl_contact;
									if ($account->accounts_tbl_empType == 1) {
										$type = "Employee Type: Admin";
									} elseif ($account->accounts_tbl_empType == 2) {
										$type = "Employee Type: Masseur";
									} else {
										$type = "Employee Type: Unapplicable";
									}
								?>

								<button class="btnpushable btnStyle cyan ttsh" style="margin-bottom:2%; text-align: left;" data1="<?php echo $name ?>" data2="<?php echo $contact ?>" data3="<?php echo $type ?>">
									<span class="btnshadow"></span>
									<span class="btnedge"></span>
									<span class="btnfront">
										<p><?php echo $name ?></p>
										<p><?php echo $contact ?></p>
										<p><?php echo $type ?></p>
									</span>
								</button>
							</a>

						<?php endforeach; ?>

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