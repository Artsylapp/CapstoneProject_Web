// Function to get the data from the server
async function fetchData(url) {
    console.log("Fetching data from URL: " + url);

    try {
        const response = await fetch(url);
        return await response.json();
    } catch (err) {
        return console.error('Error fetching data:', err);
    }
}

function displayAnalyticsData(data) {
    // Check if data contains the expected fields
    if (data || data.totalProfit !== undefined) {
        // Update the content inside the elements
        document.getElementById('totalProfit').textContent = "₱" + data.totalProfit;
        document.getElementById('totalOrder').textContent = data.totalOrder;
        document.getElementById('mostService').textContent = data.mostService + " (" + data.mostServiceCount + " orders total)";
        document.getElementById('totalRevenue').textContent = "₱" + data.totalRevenue;
        document.getElementById('AOV').textContent = data.AOV;
        document.getElementById('mostActiveEmployee').textContent = data.mostActiveEmployee + " (" + data.mostActiveEmployeeCount + " orders total)";
    
        // Dynamically update the name attribute for each card
        document.getElementById('totalProfitCard').setAttribute('name', 'Total Sales of ' + data.totalProfit);
        document.getElementById('totalOrderCard').setAttribute('name', 'Total Orders of ' + data.totalOrder);
        document.getElementById('mostServiceCard').setAttribute('name', 'Most Service Ordered: ' + data.mostService + ' with ' + data.mostServiceCount + ' orders');
        document.getElementById('totalRevenueCard').setAttribute('name', 'Total Revenue of ₱' + data.totalRevenue);
        document.getElementById('AOVCard').setAttribute('name', 'Average Order Value of ' + data.AOV);
        document.getElementById('mostActiveEmployeeCard').setAttribute('name', 'Most Active Employee: ' + data.mostActiveEmployee + ' with ' + data.mostActiveEmployeeCount + ' orders');
    
    } else {
        console.error('Data format is not as expected:', data);
    }
}

// Fetch and display data
fetchData('getAnalyticsData')
    .then(data => {
        displayAnalyticsData(data);
    });
