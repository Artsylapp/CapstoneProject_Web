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
                
            </div>
        </div>

    </div>
</div>
