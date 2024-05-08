<div class="col-lg-3">
    <div class="profile-sidebar" style="border-style: solid; background-color: #F2F2F2; border-radius: 5px; padding:1%; margin-bottom:10%; display: flex; justify-content: space-between; align-items: center; margin-left: auto; width: 100%;">
        <div style="display: flex;">
            <!-- IMAGE DIV -->
            <div style="width: 125px; height: 125px; background-color: #ccc; border-radius: 50%; display: flex; justify-content: center; align-items: center; font-size: 24px; color: #555; border: 2px solid #aaa;">
                <!-- Placeholder Circle -->
            </div>

            <!-- TEXT DIV -->
            <div style="margin-left: 20px; display: flex; flex-direction: column; justify-content: center;">
                <h3 style="margin: 10px;">VIAMM</h3>
                <h4 style="margin: 5px;">EMPLOYEE NAME</h4>
            </div>
        </div>
    </div>

    <div class="profile-sidebar" style="border-style: solid; background-color: #F2F2F2; border-radius: 5px; padding:1%;
    margin-bottom:10%; width: 100%; height: 400px; overflow-y: auto; display: flex; flex-direction: column;">
        <!-- TRANSACTION DATA -->
        <div class="margin-left: 20px; display: flex; flex-direction: column; justify-content: center;">          
                <table class="table table-striped">
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
        </div>
        <div class="margin-left: 20px; display: flex; flex-direction: column; justify-content: center; margin-top:auto;">          
            <div class="", style="border-style: solid; background-color: #F2F2F2; border-radius: 5px; padding:1%; width: 100%;">
                <h3>TOTAL: XX.XX</h3>
            </div>
        </div>
    </div>

    <div class="profile-sidebar" style="padding:3%; margin-bottom:10%;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-left: auto; width: 350px;">
            <div style="align-items: center; width: 125px; height: 125px; background-color: #ccc; border-radius: 50%; display: flex; justify-content: center; align-items: center; font-size: 24px; color: #555; border: 2px solid #aaa;">
                <!-- Placeholder Circle -->
                <a href="<?php echo $this->config->base_url("home")?>" style="margin: 0; line-height: 75px; font-size:10px">HOME BUTTON</a>
            </div>
            <div style="width: 120px; height: 120px; background-color: #ccc; border-radius: 50%; display: flex; justify-content: center; align-items: center; font-size: 24px; color: #555; border: 2px solid #aaa; margin-left:25%;">
                <!-- Placeholder Circle -->
                <a style="margin: 0; line-height: 75px; font-size:10px">AUDIO</a>
            </div>
        </div>
    </div>
</div>
