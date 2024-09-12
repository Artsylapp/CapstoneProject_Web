console.log("Fetching data");
// Fetch data from the controller
fetch('/Capstoneproject_web/getYearAnalytics')
    .then(response => response.json())
    .then(data => {
        const thisYearData = new Array(12).fill(0); // Initialize with 0s for each month
        const previousYearData = new Array(12).fill(0);

        // Process current year data
        data.currentYear.forEach(order => {
            thisYearData[order.month - 1] = order.count; // -1 because months are 0-indexed in JavaScript
        });

        // Process previous year data
        data.previousYear.forEach(order => {
            previousYearData[order.month - 1] = order.count;
        });

        // Update chart with the data
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        const chartData = {
            labels: months,
            datasets: [
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
                },
            ]
        };

        // Create chart
        const ctx = document.getElementById('ChartAnalysis').getContext('2d');
        const ChartAnalysis = new Chart(ctx, {
            type: 'line',
            data: chartData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    })
    .catch(error => console.error('Error fetching data:', error));