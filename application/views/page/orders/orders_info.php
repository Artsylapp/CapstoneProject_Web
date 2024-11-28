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
                <form class="form-horizontal" action="<?php echo $this->config->base_url("acc_add") ?>" method="POST">
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="EmpName">Employee Name:</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="EmpName" placeholder="Employee Name" name="create_Account" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="EmpAdd">Address:</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="EmpAdd" placeholder="Address" name="create_Address" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="EmpCnt">Contact Number:</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="EmpCnt" placeholder="Masseur Contact Number" name="create_Contact" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="sel1">Employee Type:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="sel1" name="optradio">
                                <option>Masseur</option>
                                <option>Admin</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-offset-8 col-sm-3" style="margin-top:25px;">
                        <div class="col-sm-12">
                            <button class="btn lg-bg menu-btn-m ttsh" name="Confirm Create Account">
                                <h4>CREATE</h4>
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
