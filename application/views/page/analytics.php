<div class="container">
    <!-- Header -->
    <div class="analytics-header py-4">
        <h1 style="font-weight: bold;">Analytics Hub</h1>
    </div>

    <!-- Summary Cards -->
    <div class="row">
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body" id="totalRevenueCard">
                    <h5 class="card-title" style="font-size: 2rem; font-weight: bold;">Total Revenue</h5>
                    <p class="card-text" id="totalRevenue" style="font-size: 1.75rem;">$0</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body" id="totalOrderCard">
                    <h5 class="card-title" style="font-size: 2rem; font-weight: bold;">Total Orders</h5>
                    <p class="card-text" id="totalOrders" style="font-size: 1.75rem;">0</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center" id="mostOrderedServiceCard">
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 2rem; font-weight: bold;">Most Ordered Service</h5>
                    <p class="card-text" id="mostOrderedService" style="font-size: 1.75rem;">N/A</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center" id="leastOrderedServiceCard">
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 2rem; font-weight: bold;">Least Ordered Service</h5>
                    <p class="card-text" id="leastOrderedService" style="font-size: 1.75rem;">N/A</p>
                </div>
            </div>
        </div>

        <!-- Centered Columns -->
        <div class="col-md-3 offset-md-3">
            <div class="card text-center">
                <div class="card-body" id="mostActiveEmployeeCard">
                    <h5 class="card-title" style="font-size: 2rem; font-weight: bold;">Most Active Employee</h5>
                    <p class="card-text" id="mostActiveEmployee" style="font-size: 1.75rem;">N/A</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body" id="leastActiveEmployeeCard">
                    <h5 class="card-title" style="font-size: 2rem; font-weight: bold;">Least Active Employee</h5>
                    <p class="card-text" id="leastActiveEmployee" style="font-size: 1.75rem;">N/A</p>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Charts Section -->
<div class="row charts-container">

    <!-- Chart to display numbers of orders per month in the current year -->
    <div class="col-lg-6">
        <center>
            <div class="chart-box chart-box-line">
                <canvas id="orderedChart"></canvas>
        </center>
    </div>

    <!-- Chart to display revenue by month comparing current year to previous year -->
    <div class="col-lg-6">
        <center>
            <div class="chart-box chart-box-line">
                <canvas id="revenueChart"></canvas>
            </div>
        </center>
    </div>


    <!-- Chart to display top 3 most ordered service -->
    <div class="col-lg-6">
        <center>
            <div style="height:40rem;" class="chart-box">
                <canvas id="topServicesChart"></canvas>
            </div>
        </center>
    </div>

    <!-- Chart to display most profitable services -->
    <div class="col-lg-6">
        <center>
            <div style="height:40rem;" class="chart-box">
                <canvas id="monthlyRevenueChart"></canvas>
            </div>
        </center>
    </div>

    <!-- Chart to display employee activity -->
    <!-- <div class="col-lg-6 offset-lg-3">
<center>
    <div class="chart-box">
        <canvas id="employeeActivityChart"></canvas>
    </div>
</center>
</div> -->
</div>

<!-- Analytics -->
<script src="<?php echo $this->config->base_url('assets/js/analytics.js') ?>"></script>