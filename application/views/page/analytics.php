<!-- Dynamic layout with center -->
<div id="chartContainer" style="height: 360px; background: white; display: flex; justify-content: center; align-items: center;">
    <canvas id="ChartAnalysis"></canvas>
    <canvas id="RevenueChart"></canvas>
</div>

<div class="AnalyticsData" id="DataAnalytics">
    <h1>Analytics Data for this year</h1>
    <p>Total Sale: <span id="totalProfit"></span></p> <!-- Total orders = sum of all orders cost -->
    <p>Total Number of Order: <span id="totalOrder"></span></p> <!-- Total number Orders -->
    <p>Most Numbered Service: <span id="mostService"></span></p> <!-- Most ordered service -->
    <p>Overall Total Revenue: <span id="totalRevenue"></span></p> <!-- Total revenue = total sale - sum of all order costs -->
    <p>Average Order Value: <span id="AOV"></span></p> <!-- Average Order Value = Total revenue / number of order placed -->
</div>

<script src="<?php echo $this->config->base_url('assets/js/ChartAnalytics.js') ?>"></script> <!-- Chart Analytics -->
<script src="<?php echo $this->config->base_url('assets/js/DataAnalytics.js') ?>"></script> <!-- Data Analytics -->
