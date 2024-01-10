Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Function to fetch percentage data from API
function fetchDataAndUpdateChart() {
    $.ajax({
        url: '/api/chart-pie', // Replace with the actual API endpoint
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            updateChart(data);
        },
        error: function (error) {
            console.error('Error fetching data:', error);
        }
    });
}

// Function to update the chart with new data
function updateChart(data) {
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Học Sinh Đã Đến", "Học Sinh Chưa Đến"],
            datasets: [{
                data: data, // Update data from the API
                backgroundColor: ['#4e73df', '#1cc88a'],
                hoverBackgroundColor: ['#2e59d9', '#17a673'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
}

// Fetch and update the chart on page load
fetchDataAndUpdateChart();