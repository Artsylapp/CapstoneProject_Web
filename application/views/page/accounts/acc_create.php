<div>
	<div class="col-lg-9">

		<div class="container">
			<div class="row">
				<div class="col-lg-12">
                    
				<div style="width: 100%; padding: 15px; border-style: solid; border-color:#404040; border-width: medium; background-color: #0097B2; color: #000000; margin-bottom:5%; border-radius:24px; text-align: left;">

					<h1 style="padding-left:1%;">NEW ACCOUNT</h1>
				
                    <form action="">

                        <div class="form-group" style="align-content:left;">
                            <input style="font-size:35px; height: auto; margin-top: 3%; margin-bottom: 3%;" type="text" class="form-control" value="NAME" required/>

                            <input style="font-size:35px; height: auto; margin-top: 3%; margin-bottom: 3%;" type="text" class="form-control" value="ADDRESS" required/>

                            <input style="font-size:35px; height: auto; margin-top: 3%; margin-bottom: 3%;" type="text" class="form-control" value="CONTACT" required/>

                            <label style="transform: scale(2); margin-right: 10%; margin-left: 5%; margin-top: 3%; margin-bottom: 3%;" class="radio-inline"><input type="radio" name="optradio" checked>Option 1</label>
							<label style="transform: scale(2); margin-right: 10%; height: auto; margin-top: 3%; margin-bottom: 3%;" class="radio-inline"><input type="radio" name="optradio">Option 2</label>

							<div>
								<button style="margin-left: 1%; width:40%; font-size:50px; background-color:#C1FF72; border-radius:15px; border-width:5px; border-color:#404040;" type="submit" class="btn btn-default">CONFIRM</button>
							</div>

                        </div>

                    </form>

						<a href="<?php echo $this->config->base_url("/index.php/accounts")?>">
							<button style="margin-top: 5%; margin-left: 1%; width:40%; font-size:50px; background-color:#EA2D40; border-radius:15px; border-width:5px; border-color:#404040;" class="btn btn-default">CANCEL</button>
						</a>

                    </div>

				</div>
			</div>
		</div>

	</div>

	</div>
</div>

</body>
</html>
