<div class="container">
    <!-- Header -->
    <div class="analytics-header py-4">
        <h1 style="font-weight: bold;">Analytics Hub</h1>
    </div>

    <!-- Summary Cards -->
    <div class="row">
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 2rem; font-weight: bold;">Total Revenue</h5>
                    <p class="card-text" id="totalRevenue" style="font-size: 1.75rem;">$0</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 2rem; font-weight: bold;">Total Orders</h5>
                    <p class="card-text" id="totalOrders" style="font-size: 1.75rem;">0</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 2rem; font-weight: bold;">Most Ordered Service</h5>
                    <p class="card-text" id="mostOrderedService" style="font-size: 1.75rem;">N/A</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 2rem; font-weight: bold;">Least Ordered Service</h5>
                    <p class="card-text" id="mostOrderedService" style="font-size: 1.75rem;">N/A</p>
                </div>
            </div>
        </div>

        <!-- Centered Columns -->
        <div class="col-md-3 offset-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 2rem; font-weight: bold;">Most Active Employee</h5>
                    <p class="card-text" id="mostActiveEmployee" style="font-size: 1.75rem;">N/A</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 2rem; font-weight: bold;">Least Active Employee</h5>
                    <p class="card-text" id="mostActiveEmployee" style="font-size: 1.75rem;">N/A</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="row charts-container">
        <!-- Chart to display top 3 most ordered service -->
        <div class="col-lg-6">
            <div class="chart-box">
                <canvas id="topServicesChart"></canvas>
            </div>
        </div>

        <!-- Chart to display revenue by month comparing current year to previous year -->
        <div class="col-lg-6">
            <div class="chart-box">
                <canvas id="revenueChart"></canvas>
            </div>
        </div>
    </div>

    <div class="row charts-container">
        <!-- Chart to display most profitable services -->
        <div class="col-lg-6">
            <center>
                <div style="height:40rem;" class="chart-box">
                    <canvas id="profitServiceChart"></canvas>
                </div>
            </center>
        </div>

        <!-- Chart to display employee activity -->
        <div class="col-lg-6">
            <div style="height:40rem;" class="chart-box">
                <center>
                    <canvas id="employeeActivityChart"></canvas>
                </center>

            </div>
        </div>
    </div>

</div>

<!-- Analytics -->
<script src="<?php echo $this->config->base_url('assets/js/Analytics.js') ?>"></script>