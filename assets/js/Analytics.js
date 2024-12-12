// Chart.js Example Data
const ctx1 = document.getElementById('topServicesChart').getContext('2d');
const ctx2 = document.getElementById('revenueChart').getContext('2d');
const ctx3 = document.getElementById('profitServiceChart').getContext('2d');
const ctx4 = document.getElementById('employeeActivityChart').getContext('2d');

// Top Services Chart
new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: ['Service A', 'Service B', 'Service C'],
        datasets: [{
            label: 'Orders',
            data: [100, 80, 60],
            backgroundColor: ['#4CAF50', '#FFC107', '#F44336']
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true
            },
            title: {
                display: true,
                text: 'Top 3 Most Ordered Services'
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        return context.dataset.label + ': ' + context.raw;
                    }
                }
            }
        }
    }
});

// Revenue Chart
new Chart(ctx2, {
    type: 'line',
    data: {
        labels: ['January', 'February', 'March', 'April'],
        datasets: [{
            label: 'Revenue ($)',
            data: [2000, 8500, 3000, 4000],
            borderColor: '#007BFF',
            fill: false
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true
            },
            title: {
                display: true,
                text: 'Monthly Revenue'
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        return context.dataset.label + ': $' + context.raw;
                    }
                }
            }
        }
    }
});

// Profit Chart
new Chart(ctx3, {
    type: 'pie',
    data: {
        labels: ['Service A', 'Service B', 'Service C'],
        datasets: [{
            label: 'Profit ($)',
            data: [1500, 1200, 900],
            backgroundColor: ['#36A2EB', '#FF6384', '#FFCE56']
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom'
            },
            title: {
                display: true,
                text: 'Most Profitable Services'
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        return context.label + ': $' + context.raw;
                    }
                }
            }
        }
    }
});

// Employee Activity Chart
new Chart(ctx4, {
    type: 'bar',
    data: {
        labels: ['Employee 1', 'Employee 2', 'Employee 3'],
        datasets: [{
            label: 'Orders Handled',
            data: [50, 70, 40],
            backgroundColor: ['#6A1B9A', '#C2185B', '#E64A19']
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true
            },
            title: {
                display: true,
                text: 'Employee Activity'
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        return context.dataset.label + ': ' + context.raw;
                    }
                }
            }
        }
    }
});