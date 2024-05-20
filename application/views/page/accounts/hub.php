<div class="col-xs-10 col-sm-10">

	<div class="container-fluid">
		<div class="row">

			<div class="col-xs-12 col-sm-12">
				<h1 class="overflow-wrap">ACCOUNTS HUB</h1>
				<h3 style="margin-top: 0px;">Manage Accounts - COMPANY</h3>
			</div>

			<div class="col-xs-4 col-sm-4"></div>

			<div class="col-xs-4 col-sm-4 center-item">
				<a href="<?php echo $this->config->base_url("acc_create")?>">
					<button class="btn green-bg menu-btn-m center-item ttsh" name="NEW ACCOUNT">
						<h4>NEW ACCOUNT</h4>
					</button>
				</a>
			</div>

		</div>

		<div class="row mt-s center-item">
			
			<div class="col-sm-12 col-xs-12 box-white">

				<table class="table table-hover" id="acc_table">
					<thead>
						<tr>
							<th>Employee Name</th>
							<th>Contact</th>
							<th>Type</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					
					<tbody>
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
										<button class="btn yellow-bg menu-btn-sm ttsh" name="<?php echo "EDIT $name"?>">
											<h4>Edit</h4>
										</button>
									</a>
								</td>
								<td class="text-center">
									<a href="<?php echo $this->config->base_url("accounts/acc_delete/$account->accounts_tbl_id")?>">
										<button class="btn red-bg menu-btn-sm ttsh" name="<?php echo "DELETE $name"?>">
											<h4>Delete</h4>
										</button>
									</a>
								</td>
							</tr>

						<?php endforeach; ?>
					</tbody>
				</table>

			</div>

		</div>

	</div>

</div>
