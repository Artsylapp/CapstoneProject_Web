<div class="col-xs-10 col-sm-10">

	<div class="container-fluid">
		<div class="row">

			<div class="col-xs-12 col-sm-12" style="text-align: right;">
				<h1 class="overflow-wrap">RECORDS HUB</h1>
				<h3 style="margin-top: 0px;">View Records - COMPANY</h3>
			</div>

		</div>

		<div class="row mt-s center-item">
			
			<div class="col-sm-12 col-xs-12 box-white">

				<table class="table table-hover" id="acc_table">
					<thead>
					<tr>
						<th>Order Number</th>
						<th>Status</th>
						<th>Total Price</th>
					</tr>
					</thead>
					<tbody>

					<!-- THIS IS FOR ORDERS
						
					<?php foreach($accounts as $account):  ?>

							<?php 
								$name = $account->accounts_tbl_name;
								$contact = $account->accounts_tbl_contact;
								$type = $account->accounts_tbl_empType;
							?>

							<tr>
								<td><?php echo $name?></td>
								<td><?php echo $contact?></td>
								<td><?php echo $type?></td>
								<td class="text-center">

								<a href="<?php echo $this->config->base_url("accounts/acc_edit/$account->accounts_tbl_id")?>">
									<button class="btn yellow-bg menu-btn-sm ttsh" name="<?php echo "EDIT: $name"?>" style="background-color: #f6c23e;">
										<h4>EDIT</h4>
									</button>
								</a>

								</td>
								<td class="text-center">

								<a href="<?php echo $this->config->base_url("accounts/acc_delete/$account->accounts_tbl_id")?>">
									<button class="btn red-bg menu-btn-sm ttsh" name="<?php echo "DELETE: $name"?>">
										<h4>DELETE</h4>
									</button>
								</a>

								</td>
							</tr>

					<?php endforeach; ?>

					-->
					

					
					</tbody>
				</table>

			</div>

		</div>

	</div>

</div>
