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
        document.getElementById('totalProfit').textContent = "₱" + data.totalProfit;
        document.getElementById('totalOrder').textContent = data.totalOrder;
        document.getElementById('mostService').textContent = data.mostService + " (" + data.mostServiceCount + " orders total)";
        document.getElementById('totalRevenue').textContent = "₱" + data.totalRevenue;
        document.getElementById('AOV').textContent = data.AOV;
        document.getElementById('mostActiveEmployee').textContent = data.mostActiveEmployee + " (" + data.mostActiveEmployeeCount + " orders total)";
    } else {
        console.error('Data format is not as expected:', data);
    }
}

// Fetch and display data
// for local testing
// fetchData('/Capstoneproject_web/getAnalyticsData')

// for deployment
fetchData('getAnalyticsData')
    .then(data => {
        displayAnalyticsData(data);
    });
