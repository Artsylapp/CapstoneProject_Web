<div class="col-xs-9 col-sm-9">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <h1 class="black-txt overflow-wrap">CUSTOMER INFO</h1>
                <h3 class="black-txt" style="margin-top: 0px;"><span>Booking</span> > <span>Create</span> - <?php echo $this->session->userdata('comp_Name') ?></h3>
            </div>
            
            <div class="col-xs-4 col-sm-4 center-item">
                <button id="continue-button" class="btn lg-bg menu-btn-m center-item ttsh" 
                    name="Proceed to finalizing booking" 
                    data-base-url="<?php echo $this->config->base_url('orders_placement');?>">
                    <h3>CONTINUE</h3>
                </button>
            </div>
        </div>

        <div class="row mt-s center-item">
            <div class="col-sm-12 col-xs-12 box-white">
                    <form class="form-horizontal">
                        
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="CusName">Customer Name:</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="CusName" placeholder="Customer Name" name="CusName" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="CusCon">Contact Number:</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="CusCon" placeholder="Customer Mobile Number" name="CusCon" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="sel_gender">Gender Preferred:</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="sel_gender" name="optradio">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                        </div>

                    </form>
            </div>
        </div>

    </div>
</div>

<script>

    document.getElementById('CusName').addEventListener('blur', function() {
        var Customer_Name = document.getElementById('CusName').value;
        console.log('Saved', Customer_Name, "inside localStorage");
    });

    document.getElementById('CusCon').addEventListener('blur', function() {
        var Customer_Con = document.getElementById('CusCon').value;
        console.log('Saved', Customer_Con, "inside localStorage");
        
    });

    document.getElementById('sel_gender').addEventListener('change', function() {
        var Customer_P_Gender = document.getElementById('sel_gender').value;
        console.log('Saved', Customer_P_Gender, "inside localStorage");
        
    });

</script>
