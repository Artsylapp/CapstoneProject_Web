// Fetch data from the server (controller)
async function fetchData(url) {
    try {
        const response = await fetch(url);
        return await response.json();
    } catch (err) {
        return console.error('Error fetching data:', err);
    }
}

// Create the chart with given data
function createChart(chartElementId, labels, datasets, ChartType) {

    let canvas = document.getElementById(chartElementId);
    if (!canvas) {
        // console.error(`Canvas element with id "${chartElementId}" not found.`);

        // If not, create a hidden canvas dynamically
        canvas = document.createElement('canvas');
        canvas.id = chartElementId;
        canvas.style.display = 'none'; // Hide the canvas
        document.body.appendChild(canvas); // Append to body
        
        // console.log(`Canvas element with id "${chartElementId}" created.`);
    }

    const ctx = canvas.getContext('2d');
    return new Chart(ctx, {
        type: ChartType,
        data: {
            labels: labels,
            datasets: datasets
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
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
            backgroundColor: 'rgba(62, 255, 0, 0.5)', // Bar color for last year
            borderColor: 'rgba(62, 255, 0, 1)', // Border color
            borderWidth: 1
        },
        {
            label: 'Last Year Revenue',
            data: previousYearRevenue,
            backgroundColor: 'rgba(255, 74, 74, 0.5)', // Bar color for last year
            borderColor: 'rgba(255, 74, 74, 1)', // Border color
            borderWidth: 1
        }
    ];

    // Create revenue chart
    createChart('RevenueChart', months, revenueDatasets, 'bar');
}

// fetch data url from server
fetchData('getYearData') // route url 'Analytics/getYearAnalytics'
    .then(data => analyzeOrderData(data)); // then the data is passed from the server to the analyzeOrderData function

fetchData('getRevenueData') // 'Analytics/getRevenueAnalytics'
    .then(data => analyzeRevenueData(data)); // then the data is passed from the server to the analyzeRevenueData function


function exportChartAsImage(chartElementId) {
    const canvas = document.getElementById(chartElementId);
    if (!canvas) {
        console.error(`Canvas with id "${chartElementId}" not found.`);
        return null;
    }

    // Create a temporary canvas
    const tempCanvas = document.createElement('canvas');
    tempCanvas.width = canvas.width;
    tempCanvas.height = canvas.height;

    // Get the context of the temporary canvas
    const ctx = tempCanvas.getContext('2d');

    // Fill the background with white
    ctx.fillStyle = '#ffffff';
    ctx.fillRect(0, 0, tempCanvas.width, tempCanvas.height);

    // Draw the original chart onto the temporary canvas
    ctx.drawImage(canvas, 0, 0);

    // Export the temporary canvas as an image
    return tempCanvas.toDataURL('image/jpeg', 1.0);
}

export { exportChartAsImage };
    

