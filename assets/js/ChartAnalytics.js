// Fetch data from the server (controller)
function fetchData(url) {
    // console.log("urls for the current analytics pages " + url);

    return fetch(url)
        .then(response => response.json())
        .catch(err => console.error('Error fetching data:', err));
}

// Create the chart with given data
function createChart(chartElementId, labels, datasets) {
    const ctx = document.getElementById(chartElementId).getContext('2d');
    return new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: datasets
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

// Analyze Order Data
function analyzeOrderData(data) {
    const thisYearData = new Array(12).fill(0);
    const previousYearData = new Array(12).fill(0);

    // Process current year data
    data.currentYear.forEach(order => {
        thisYearData[order.month - 1] = order.count; // Months are 0-indexed
    });

    // Process previous year data
    data.previousYear.forEach(order => {
        previousYearData[order.month - 1] = order.count;
    });

    const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    const orderDatasets = [
        {
            label: "This Year Sales",
            data: thisYearData,
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0
        },
        {
            label: 'Last Year Sales',
            data: previousYearData,
            fill: false,
            borderColor: 'rgb(192, 75, 192)',
            tension: 0.6
        }
    ];

    // Create orders chart
    createChart('ChartAnalysis', months, orderDatasets);
}

// Analyze Revenue Data
function analyzeRevenueData(data) {
    const thisYear = new Date().getFullYear();
    const previousYear = thisYear - 1;
  
    const thisYearRevenue = new Array(12).fill(0);
    const previousYearRevenue = new Array(12).fill(0);

     // Filter data for current and previous years
    const currentYearData = data.filter(item => item.year === thisYear);
    const previousYearData = data.filter(item => item.year === previousYear);

    // Process current year revenue
    currentYearData.forEach(revenue => {
        thisYearRevenue[revenue.month - 1] = revenue.total_sales;
    });

    // Process previous year revenue
    previousYearData.forEach(revenue => {
        previousYearRevenue[revenue.month - 1] = revenue.total_sales;
    });

    const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    const revenueDatasets = [
        {
            label: "This Year Revenue",
            data: thisYearRevenue,
            fill: false,
            borderColor: 'rgb(75, 192, 75)',
            tension: 0
        },
        {
            label: 'Last Year Revenue',
            data: previousYearRevenue,
            fill: false,
            borderColor: 'rgb(192, 75, 75)',
            tension: 0.6
        }
    ];

    // Create revenue chart
    createChart('RevenueChart', months, revenueDatasets);
}

// Call the data analytics functions




// For order data
fetchData('/Capstoneproject_web/getYearData')
    .then(data => analyzeOrderData(data));

// For revenue data
fetchData('/Capstoneproject_web/getRevenueData')
    .then(data => analyzeRevenueData(data));
