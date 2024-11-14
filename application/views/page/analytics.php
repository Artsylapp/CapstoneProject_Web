<div class="analytics">
    
    <!-- Dynamic layout with flexbox -->

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <h1 class="overflow-wrap black-txt">Analytics</h1>
                <h3 class="black-txt" style="margin-top: 0px;">View Analytics - <?php echo $this->session->userdata('comp_Name') ?></h3>
            </div>
        </div>

        <div class="row">

            <div class="col-sm-8 ChartContainer">
                <div class="charts">
                    <div id="analysisChartContainer">
                        <canvas id="ChartAnalysis" class="analytics_canvas"></canvas>
                    </div>

                    <div class="revenueChartContainer">
                        <canvas id="RevenueChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="AnalyticsData DataContainer" id="DataAnalytics">

                    <div class="container">

                        <div class="justify-content-center">
                            <div class="col">
                                <div class="title">
                                    <h2>Analytics Report</h2>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="cardData col-md ttsh" id="totalRevenueCard">
                                <p>Total Revenue</p>
                                <p><span id="totalRevenue"></span></p>
                            </div>

                            <div class="cardData col-md ttsh" id="totalOrderCard">
                                <p>Total Orders</p>
                                <p><span id="totalOrder"></span></p>
                            </div>

                            <div class="cardData col-md ttsh" id="mostServiceCard">
                                <p>Most Ordered Service</p>
                                <p><span id="mostService"></span></p>
                            </div>

                            <div class="cardData col-md ttsh" id="mostActiveEmployeeCard">
                                <p>Most Active Employee</p>
                                <p><span id="mostActiveEmployee"></span></p>
                            </div>

                            <div class="cardData col-md ttsh" id="MPMCard">
                                <p>Most Profitable Month</p>
                                <p><span id="MPM"></span></p>
                            </div>

                            <div class="cardData col-md ttsh" id="AOVCard">
                                <p>Average Order Value</p>
                                <p><span id="AOV"></span></p>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

</div>

<!-- Chart Analytics -->
<script type="module" src="<?php echo $this->config->base_url('assets/js/ChartAnalytics.js') ?>"></script>
<!-- Data Analytics --> 
<script src="<?php echo $this->config->base_url('assets/js/DataAnalytics.js') ?>"></script>
<!-- Analytics -->
<script src="<?php echo $this->config->base_url('assets/js/Analytics.js') ?>"></script>