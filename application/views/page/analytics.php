<div class="analytics">
    <!-- Dynamic layout with flexbox -->

    <div class="container">
        <div class="row">

            <div class="col-xs-8">
                <div class="charts" style>
                    <div id="analysisChartContainer">
                        <canvas id="ChartAnalysis" class="analytics_canvas"></canvas>
                    </div>
                    
                    <div class="revenueChartContainer">
                        <canvas id="RevenueChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-xs-4">
                <div class="AnalyticsData" id="DataAnalytics">
                    
                    <div class="container">

                        <div class="justify-content-center">
                            <div class="col">
                                <div class="title">
                                    <h2>Analytics Report</h2>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">

                            <div class="cardData col-md">
                                <p>Total Sale</p>
                                <p><span id="totalProfit"></span></p>
                            </div>

                            <div class="cardData col-md">
                                <p>Total Number of Orders</p>
                                <p><span id="totalOrder"></span></p>
                            </div>

                            <div class="cardData col-md">
                                <p>Most Ordered Service</p>
                                <p><span id="mostService"></span></p>
                            </div>

                            <div class="cardData col-md">
                                <p>Most Active Employee</p>
                                <p><span id="mostActiveEmployee"></span></p>
                            </div>

                            <div class="cardData col-md">
                                <p>Overall Total Revenue</p>
                                <p><span id="totalRevenue"></span></p>
                            </div>

                            <div class="cardData col-md">
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

<script src="<?php echo $this->config->base_url('assets/js/ChartAnalytics.js') ?>"></script> <!-- Chart Analytics -->
<script src="<?php echo $this->config->base_url('assets/js/DataAnalytics.js') ?>"></script> <!-- Data Analytics -->
<script src="<?php echo $this->config->base_url('assets/js/Analytics.js') ?>"></script> <!-- Analytics -->  