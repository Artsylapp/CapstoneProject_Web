// Fetch data from the server (controller)
async function fetchData(url) {
    console.log("urls for the current analytics pages " + url);

    try {
        const response = await fetch(url);
        return await response.json();
    } catch (err) {
        return console.error('Error fetching data:', err);
    }
}

// Create the chart with given data
function createChart(chartElementId, labels, datasets, ChartType) {
    const ctx = document.getElementById(chartElementId).getContext('2d');
    return new Chart(ctx, {
        type: ChartType,
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
    createChart('ChartAnalysis', months, orderDatasets, 'line');
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
            label: 'This Year Revenue',
            data: thisYearRevenue,
            backgroundColor: 'rgba(192, 75, 75, 0.5)', // Bar color for last year
            borderColor: 'rgba(192, 75, 75, 1)', // Border color
            borderWidth: 1
        },
        {
            label: 'Last Year Revenue',
            data: previousYearRevenue,
            backgroundColor: 'rgba(192, 75, 75, 0.5)', // Bar color for last year
            borderColor: 'rgba(192, 75, 75, 1)', // Border color
            borderWidth: 1
        }
    ];

    // Create revenue chart
    createChart('RevenueChart', months, revenueDatasets, 'bar');
}

// For order data
// for local testing
// fetchData('/Capstoneproject_web/getYearData')

// for deployment
fetchData('getYearData')
    .then(data => analyzeOrderData(data));

// For revenue data
// for local testing
// fetchData('/Capstoneproject_web/getRevenueData')

// for deployment
fetchData('getRevenueData')
    .then(data => analyzeRevenueData(data));
