// Function to get the data from the server
async function fetchData(url) {
    try {
        const response = await fetch(url);
        const data = await response.json();
        console.log('Data fetched successfully:', data);
        return data;
    } catch (err) {
        console.error('Error fetching data:', err);
    }
}

// create chart
function createChart(id, labels, datasets, type, title) {
    const chart = new Chart(document.getElementById(id), {
        type: type,
        data: {
            labels: labels,
            datasets: datasets
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { 
                    display: true,
                    position: 'bottom'
                },
                title: {
                    display: true,
                    text: title,
                    font: {
                        size: 16
                    }
                }
            }
        }
    });
}

//convert month numbers to array
function convertMonthsToArray(monthData) {
    // Create array of 12 elements initialized to 0
    let monthArray = new Array(12).fill(0);
    
    // Map numbered months (1-12) to array indices (0-11)
    Object.entries(monthData).forEach(([month, value]) => {
        monthArray[parseInt(month) - 1] = value;
    });
    
    return monthArray;
}

// Display analytics data
function displayAnalyticsData(data) {
    if (data) {

        // Display main analytics
        document.getElementById('totalRevenue').textContent = `₱${data.totalRevenue.toFixed(2)}`;
        document.getElementById('totalOrders').textContent =  data.totalOrder || 0;

        document.getElementById('mostOrderedService').textContent = `${data.topmostService} (${data.topmostServiceCount || 0} orders)`;
        document.getElementById('leastOrderedService').textContent = `${data.topleastService} (${data.topleastServiceCount || 0} orders)`;
        
        document.getElementById('mostActiveEmployee').textContent = `${data.mostActiveEmployee} (${data.mostActiveEmployeeCount || 0} orders)`;
        document.getElementById('leastActiveEmployee').textContent = `${data.leastActiveEmployee} (${data.leastActiveEmployeeCount || 0} orders)`;

        // document.getElementById('mostProfitableMonth').textContent = `${data.mostProfitableMonth} (₱${data.mostProfitableMonthIncome.toFixed(2)})`;
        // document.getElementById('leastProfitableMonth').textContent = `${data.leastProfitableMonth} (₱${data.leastProfitableMonthIncome.toFixed(2)})`;


        // Text to speech attributes
        document.getElementById('totalRevenueCard').setAttribute('name', `Total Revenue of ${data.totalRevenue.toFixed(2)} pesos`);
        document.getElementById('totalOrderCard').setAttribute('name', `Total Orders of ${data.totalOrder}`);

        document.getElementById('mostOrderedServiceCard').setAttribute('name', `Most Service Ordered: ${data.topmostService} with ${data.topmostServiceCount} orders`);
        document.getElementById('leastOrderedServiceCard').setAttribute('name', `Least Service Ordered: ${data.topleastService} with only ${data.topleastServiceCount} orders`);

        document.getElementById('mostActiveEmployeeCard').setAttribute('name', `Most Active Employee: ${data.mostActiveEmployee} with ${data.mostActiveEmployeeCount} orders`);
        document.getElementById('leastActiveEmployeeCard').setAttribute('name', `Least Active Employee: ${data.leastActiveEmployee} with only ${data.leastActiveEmployeeCount} orders`);

    } else {
        console.error('Data format is not as expected:', data);
    }
}

// analyzeOrderData function
function OrderDataChart(data) {
    const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    // Convert month numbers to arrays
    const currentYearData = convertMonthsToArray(data.currentYearOrder);
    const prevYearData = convertMonthsToArray(data.prevYearOrder);
    const title = 'Orders per Month';

    const orderDatasets = [
        {
            label: "This Year Sales",
            data: currentYearData,
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0
        },
        {
            label: 'Last Year Sales', 
            data: prevYearData,
            fill: false,
            borderColor: 'rgb(192, 75, 192)',
            tension: 0.6
        }
    ];

    createChart('orderedChart', months, orderDatasets, 'line', title);
}

function RevenueDataChart(data) {
    const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    // Convert month numbers to arrays
    const currentYearData = convertMonthsToArray(data.currentYearRevenue);
    const prevYearData = convertMonthsToArray(data.prevYearRevenue);
    const title = 'Revenue per Month';

    const orderDatasets = [
        {
            label: "This Year Sales",
            data: currentYearData,
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0
        },
        {
            label: 'Last Year Sales', 
            data: prevYearData,
            fill: false,
            borderColor: 'rgb(192, 75, 192)',
            tension: 0.6
        }
    ];

    createChart('revenueChart', months, orderDatasets, 'line', title);
}

function TopServicesChart(data) {
    // Track unique services
    const uniqueServices = new Map();
    
    // Process most ordered first
    Object.entries(data.mostOrderedService).forEach(([service, count]) => {
        uniqueServices.set(service, {
            count: count,
            isTop: true
        });
    });

    // Add least ordered if not present
    Object.entries(data.leastOrderedService).forEach(([service, count]) => {
        if (!uniqueServices.has(service)) {
            uniqueServices.set(service, {
                count: count,
                isTop: false
            });
        }
    });

    // Prepare chart data
    const serviceNames = Array.from(uniqueServices.keys());
    const serviceCounts = Array.from(uniqueServices.values()).map(v => v.count);
    const colors = Array.from(uniqueServices.values()).map(v => 
        v.isTop ? 'rgb(29, 237, 60)' : 'rgb(255, 99, 132)'
    );

    const datasets = [{
        label: 'Number of Orders',
        data: serviceCounts,
        backgroundColor: colors
    }];

    const title = 'Service Order Distribution';
    createChart('topServicesChart', serviceNames, datasets, 'bar', title);
}

function ProfitMonthChart(data) {
    // Track unique months
    const uniqueMonths = new Map();
    
    // Process top months first (takes precedence)
    data.top3ProfitableMonths.forEach(item => {
        if (!uniqueMonths.has(item.month)) {
            uniqueMonths.set(item.month, {
                revenue: item.revenue,
                isTop: true
            });
        }
    });

    // Add bottom months only if not already present
    data.bottom3ProfitableMonths.forEach(item => {
        if (!uniqueMonths.has(item.month)) {
            uniqueMonths.set(item.month, {
                revenue: item.revenue,
                isTop: false
            });
        }
    });

    // Convert to arrays for chart
    const months = Array.from(uniqueMonths.keys());
    const revenues = Array.from(uniqueMonths.values()).map(v => v.revenue);
    const colors = Array.from(uniqueMonths.values()).map(v => 
        v.isTop ? [
            'rgb(54, 162, 235)',  // Blue
            'rgb(255, 99, 132)',  // Pink
            'rgb(255, 206, 86)'   // Yellow
        ] : [
            'rgb(201, 203, 207)', // Gray
            'rgb(153, 102, 255)', // Purple
            'rgb(75, 192, 192)'   // Teal
        ]
    ).flat().slice(0, months.length);

    const datasets = [{
        label: 'Monthly Revenue',
        data: revenues,
        backgroundColor: colors,
        borderColor: 'rgb(255, 255, 255)',
        borderWidth: 1
    }];

    const title = 'Monthly Revenue Distribution';
    createChart('monthlyRevenueChart', months, datasets, 'pie', title);
}

// display most and least profitable month with pie chart
// function ProfitMonthChart(data) {
//     // Get months and revenues
//     const top3Months = data.top3ProfitableMonths || [];
//     const bottom3Months = data.bottom3ProfitableMonths || [];

//     // Combine all months and remove duplicates
//     const uniqueMonths = new Map();
    
//     // Process top months first (higher revenue takes precedence)
//     top3Months.forEach(item => {
//         if (!uniqueMonths.has(item.month)) {
//             uniqueMonths.set(item.month, {
//                 revenue: item.revenue,
//                 isTop: true
//             });
//         }
//     });

//     // Add bottom months only if not already present
//     bottom3Months.forEach(item => {
//         if (!uniqueMonths.has(item.month)) {
//             uniqueMonths.set(item.month, {
//                 revenue: item.revenue,
//                 isTop: false
//             });
//         }
//     });

//     // Convert to arrays for chart
//     const months = Array.from(uniqueMonths.keys());
//     const revenues = Array.from(uniqueMonths.values()).map(v => v.revenue);
//     const colors = Array.from(uniqueMonths.values()).map(v => 
//         v.isTop ? [
//             'rgb(54, 162, 235)',
//             'rgb(255, 99, 132)',
//             'rgb(255, 206, 86)'
//         ] : [
//             'rgb(201, 203, 207)',
//             'rgb(153, 102, 255)',
//             'rgb(75, 192, 192)'
//         ]
//     ).flat();

//     const title = 'Monthly Revenue Distribution';

//     const monthDatasets = [{
//         label: 'Revenue',
//         data: revenues,
//         backgroundColor: colors,
//         borderColor: 'rgb(255, 255, 255)',
//         borderWidth: 1
//     }];

//     const options = {
//         responsive: true,
//         plugins: {
//             legend: {
//                 position: 'bottom'
//             },
//             title: {
//                 display: true,
//                 text: title
//             },
//             tooltip: {
//                 callbacks: {
//                     label: function(context) {
//                         return `${context.label}: ₱${context.raw.toFixed(2)}`;
//                     }
//                 }
//             }
//         }
//     };

//     createChart('profitMonthChart', months, monthDatasets, 'pie', title);
// }


// Fetch data and display analytics

fetchData('getAnalytics')
    .then(data => {
        displayAnalyticsData(data);
        OrderDataChart(data);
        RevenueDataChart(data);
        TopServicesChart(data);
        ProfitMonthChart(data);
        // ProfitMonthChart(data);
    });