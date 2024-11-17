<div class="col-xs-12 col-sm-12">
	<div class="container-fluid">

		<div class="row">

			<div class="col-xs-12 col-sm-12">
				<h1 class="black-txt overflow-wrap">ACCOUNT HUB</h1>
				<h3 class="black-txt" style="margin-top: 0px;">Manage Accounts - <?php echo $this->session->userdata('comp_Name') ?></h3>
			</div>

			<div class="col-xs-4 col-sm-4 center-item">
				<a href="<?php echo $this->config->base_url("acc_create")?>">
					<button class="btn lg-bg menu-btn-m center-item ttsh" name="CREATE NEW ACCOUNT">
						<h4>CREATE ACCOUNT</h4>
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
						<?php foreach($accounts as $account):

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
										<h4>EDIT</h4>
									</button>
								</a>
							</td>
							<td class="text-center">
								<a href="<?php echo $this->config->base_url("accounts/acc_delete/$account->accounts_tbl_id")?>">
									<button class="btn lr-bg menu-btn-sm ttsh" name="<?php echo "DELETE $name"?>">
										<h4>DELETE</h4>
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
