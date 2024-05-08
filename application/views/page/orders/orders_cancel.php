<div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
                    
			    <div style="width: 100%; padding: 15px; border-style: solid; border-color:#404040; border-width: medium; background-color: #F2F2F2; color: #000000; margin-bottom:3%; border-radius:24px; text-align: left;">

                    <div style="display: flex;">
                        <!-- Placeholder Circle -->
                        <div style="width: 125px; height: 125px; background-color: #ccc; border-radius: 50%; display: flex; justify-content: center; align-items: center; font-size: 24px; color: #555; border: 2px solid #aaa;"></div>

                        <div style="margin-left: 20px; display: flex; flex-direction: column; justify-content: center;">
                            <h1 style="margin: 10px; font-size:25px;">EMPLOYEE IN-CHARGE</h3>
                            <h4 style="margin: 10px; font-size:30px;">EMPLOYEE NAME</h4>
                        </div>
                    </div>
				
                    <table class="table table-striped" style="margin-top:20px; font-size:25px;">
                        <thead>
                        <tr>
                            <th>SERVICE</th>
                            <th>QTY</th>
                            <th>PRICE</th>
                        </tr>
                        </thead>
                        <tbody>
                            <!--USE IN A FOR EACH-->
                        <tr>
                            <td>SOMETHING</td>
                            <td>X</td>
                            <td>XX.XX</td>
                        </tr>
                        </tbody>
                    </table>

                    <table class="table table-striped" style="margin-top:10px; font-size:25px;">
                        <thead>
                        <tr>
                            <th>MASSEUR</th>
                            <th>AREA</th>
                            <th>DATE AND TIME</th>
                        </tr>
                        </thead>
                        <tbody>
                            <!--USE IN A FOR EACH-->
                        <tr>
                            <td>SOMEONE</td>
                            <td>SOMEWHERE</td>
                            <td>DATE AND TIME</td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="" style="border-style: solid; background-color: #F2F2F2; border-radius: 5px; padding:1%; width: 100%; display: flex; justify-content: flex-end;">
                        <h3 style="margin: 0; font-size:40px;">TOTAL: XX.XX</h3>
                    </div>

                </div>

                <div>
                    <a href="<?php echo $this->config->base_url("orders")?>">
						<button class="btnpushable btnStyle green ttsh" name="CONFIRM" style="margin-top: 5%; margin-left: 5%; width:40%;">
							<span class="btnshadow"></span>
							<span class="btnedge"></span>
							<span class="btnfront">CONFIRM</span>
						</button>
					</a>

                    <a href="<?php echo $this->config->base_url("orders/orders_select/orders_cancel")?>">
						<button class="btnpushable btnStyle red ttsh" name="CANCEL" style="margin-top: 5%; margin-left: 8%; width:40%;">
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

</body>
</html>
