<!DOCTYPE html>
<?php
session_start();

// Redirect to login page if the user is not logged in
if (!isset($_SESSION['email'])) {
    header("Location: signin.php");
    exit();
}

include '../common/db.php';


// Fetch logged-in user email from session
$user = $_SESSION['email'];

// Fetch summary statistics
$totalCodesQuery = $conn->prepare("SELECT COUNT(*) AS total_codes FROM verification_codes WHERE generated_by = ?");
$totalCodesQuery->bind_param("s", $user);
$totalCodesQuery->execute();
$totalCodesResult = $totalCodesQuery->get_result();
$totalCodes = $totalCodesResult->fetch_assoc()['total_codes'];
$totalCodesQuery->close();

$usedCodesQuery = $conn->prepare("SELECT COUNT(*) AS used_codes FROM verification_codes WHERE generated_by = ? AND status = 'yes'");
$usedCodesQuery->bind_param("s", $user);
$usedCodesQuery->execute();
$usedCodesResult = $usedCodesQuery->get_result();
$usedCodes = $usedCodesResult->fetch_assoc()['used_codes'];
$usedCodesQuery->close();

$remainingCodes = $totalCodes - $usedCodes;

// Fetch codes by date for daily chart
$codesByDateQuery = $conn->prepare("SELECT DATE(created_at) AS date, COUNT(*) AS count FROM verification_codes WHERE generated_by = ? GROUP BY DATE(created_at)");
$codesByDateQuery->bind_param("s", $user);
$codesByDateQuery->execute();
$codesByDateResult = $codesByDateQuery->get_result();
$codesByDate = [];
while ($row = $codesByDateResult->fetch_assoc()) {
    $codesByDate[] = $row;
}
$codesByDateQuery->close();

// Fetch monthly codes for bar chart
$monthlyCodesQuery = $conn->prepare("SELECT DATE_FORMAT(created_at, '%Y-%m') AS month, COUNT(*) AS count FROM verification_codes WHERE generated_by = ? GROUP BY DATE_FORMAT(created_at, '%Y-%m')");
$monthlyCodesQuery->bind_param("s", $user);
$monthlyCodesQuery->execute();
$monthlyCodesResult = $monthlyCodesQuery->get_result();
$monthlyCodes = [];
while ($row = $monthlyCodesResult->fetch_assoc()) {
    $monthlyCodes[] = $row;
}
$monthlyCodesQuery->close();

// Fetch peak hours for codes used
$peakHoursQuery = $conn->prepare("
    SELECT HOUR(created_at) AS hour, COUNT(*) AS count
    FROM verification_codes
    WHERE generated_by = ? AND status = 'yes'
    GROUP BY HOUR(created_at)
    ORDER BY hour
");
$peakHoursQuery->bind_param("s", $user);
$peakHoursQuery->execute();
$peakHoursResult = $peakHoursQuery->get_result();
$peakHours = [];
while ($row = $peakHoursResult->fetch_assoc()) {
    $peakHours[] = $row;
}
$peakHoursQuery->close();

// Close connection
$conn->close();
?>

<html lang="en">
<?php include '../common/admin-head.php'; ?>

<body>
    <main class="page-wrapper rbt-dashboard-page">
        <div class="rbt-panel-wrapper">
            <?php include '../common/header.php'; ?>
            <?php include '../common/mobilemenu.php'; ?>
            <?php include '../common/Leftpanel.php'; ?>

            <div class="rbt-main-content mr--0">
                <div class="rbt-daynamic-page-content">
                    <div class="rbt-dashboard-content">
                        <div class="content-page">
                            <div class="container mt-4">
                                <div class="section-title text-center sal-animate" data-sal="slide-up">
                                    <h2 class="title w-600 mb--20">Reports & Analytics</h2>
                                    <p class="description b1">Analyze your verification codes data.</p>
                                </div>

                                <!-- Summary Statistics -->
                                <div class="row mb-4">
                                    <div class="col-md-4 rainbow-pricing style-chatenai">
                                        <div class="card shadow-sm rbt-static-bar pricing-table-inner bg-flashlight">
                                            <div class="card-body">
                                                <h5 class="card-title">Total Codes Generated</h5>
                                                <p class="card-text"><?php echo $totalCodes; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 rainbow-pricing style-chatenai">
                                        <div class="card shadow-sm rbt-static-bar pricing-table-inner bg-flashlight">
                                            <div class="card-body">
                                                <h5 class="card-title">Number of Codes Used</h5>
                                                <p class="card-text"><?php echo $usedCodes; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 rainbow-pricing style-chatenai">
                                        <div class="card shadow-sm rbt-static-bar pricing-table-inner bg-flashlight">
                                            <div class="card-body">
                                                <h5 class="card-title">Remaining Codes</h5>
                                                <p class="card-text"><?php echo $remainingCodes; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Date Range Selector -->
                                <div class="mb-4 d-inline-flex p-2">
                                    <label>Select Date Range:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dateRange" id="daily" value="daily" checked>
                                        <label class="form-check-label" for="daily">Daily</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dateRange" id="weekly" value="weekly">
                                        <label class="form-check-label" for="weekly">Weekly</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dateRange" id="monthly" value="monthly">
                                        <label class="form-check-label" for="monthly">Monthly</label>
                                    </div>
                                </div>

                                <!-- Charts -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <h5 id="pieChartTitle" class="my-4">Total vs Used Codes (Daily)</h5>
                                        <canvas id="pieChart"></canvas>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 id="barChartTitle" class="my-4">Monthly Codes Generated (Monthly)</h5>
                                        <canvas id="barChart"></canvas>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 id="lineChartTitle" class="my-4">Codes Generated Over Time (Daily)</h5>
                                        <canvas id="lineChart"></canvas>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 id="hourChartTitle" class="my-4">Peak Hours for Codes Used</h5>
                                        <canvas id="hourChart"></canvas>
                                    </div>
                                </div>

                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                                <script>
                                    // Pie Chart for Total vs Used Codes
                                    var ctxPie = document.getElementById('pieChart').getContext('2d');
                                    var pieChart = new Chart(ctxPie, {
                                        type: 'pie',
                                        data: {
                                            labels: ['Total Codes', 'Used Codes'],
                                            datasets: [{
                                                data: [<?php echo $totalCodes; ?>, <?php echo $usedCodes; ?>],
                                                backgroundColor: ['rgba(54, 162, 235, 0.2)', 'rgba(255, 99, 132, 0.2)'],
                                                borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)'],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            responsive: true
                                        }
                                    });

                                    // Bar Chart for Monthly Codes Generated
                                    var ctxBar = document.getElementById('barChart').getContext('2d');
                                    var monthlyCodes = <?php echo json_encode($monthlyCodes); ?>;
                                    var barLabels = monthlyCodes.map(row => row.month);
                                    var barData = monthlyCodes.map(row => row.count);

                                    var barChart = new Chart(ctxBar, {
                                        type: 'bar',
                                        data: {
                                            labels: barLabels,
                                            datasets: [{
                                                label: 'Number of Codes Generated',
                                                data: barData,
                                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                                borderColor: 'rgba(75, 192, 192, 1)',
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            responsive: true,
                                            scales: {
                                                x: {
                                                    beginAtZero: true
                                                },
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });

                                    // Line Chart for Codes Generated Over Time
                                    var ctxLine = document.getElementById('lineChart').getContext('2d');
                                    var codesByDate = <?php echo json_encode($codesByDate); ?>;
                                    var lineLabels = codesByDate.map(row => row.date);
                                    var lineData = codesByDate.map(row => row.count);

                                    var lineChart = new Chart(ctxLine, {
                                        type: 'line',
                                        data: {
                                            labels: lineLabels,
                                            datasets: [{
                                                label: 'Number of Codes Generated',
                                                data: lineData,
                                                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                                                borderColor: 'rgba(153, 102, 255, 1)',
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            responsive: true,
                                            scales: {
                                                x: {
                                                    beginAtZero: true
                                                },
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });

                                    // Line Chart for Peak Hours
                                    var ctxHour = document.getElementById('hourChart').getContext('2d');
                                    var peakHours = <?php echo json_encode($peakHours); ?>;
                                    var hourLabels = peakHours.map(row => row.hour + ':00');
                                    var hourData = peakHours.map(row => row.count);

                                    var hourChart = new Chart(ctxHour, {
                                        type: 'bar',
                                        data: {
                                            labels: hourLabels,
                                            datasets: [{
                                                label: 'Number of Codes Used',
                                                data: hourData,
                                                backgroundColor: 'rgba(255, 159, 64, 0.2)',
                                                borderColor: 'rgba(255, 159, 64, 1)',
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            responsive: true,
                                            scales: {
                                                x: {
                                                    beginAtZero: true
                                                },
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });

                                    // Function to update charts based on selected date range
                                    function updateCharts() {
                                        var selectedRange = document.querySelector('input[name="dateRange"]:checked').value;

                                        var filteredData = {
                                            daily: <?php echo json_encode($codesByDate); ?>,
                                            weekly: [], // Populate this with actual weekly data if needed
                                            monthly: <?php echo json_encode($monthlyCodes); ?>
                                        };

                                        var lineLabels = filteredData[selectedRange].map(row => row.date || row.month);
                                        var lineData = filteredData[selectedRange].map(row => row.count);

                                        // Update Line Chart
                                        lineChart.data.labels = lineLabels;
                                        lineChart.data.datasets[0].data = lineData;
                                        lineChart.update();

                                        // Update Bar Chart if monthly is selected
                                        if (selectedRange === 'monthly') {
                                            barChart.data.labels = lineLabels;
                                            barChart.data.datasets[0].data = lineData;
                                            barChart.update();
                                        }

                                        // Update Chart Titles
                                        document.getElementById('pieChartTitle').textContent = 'Total vs Used Codes (' + (selectedRange.charAt(0).toUpperCase() + selectedRange.slice(1)) + ')';
                                        document.getElementById('lineChartTitle').textContent = 'Codes Generated Over Time (' + (selectedRange.charAt(0).toUpperCase() + selectedRange.slice(1)) + ')';
                                        document.getElementById('barChartTitle').textContent = 'Monthly Codes Generated (' + (selectedRange.charAt(0).toUpperCase() + selectedRange.slice(1)) + ')';
                                        document.getElementById('hourChartTitle').textContent = 'Peak Hours for Codes Used';
                                    }

                                    // Event listener for date range changes
                                    document.querySelectorAll('input[name="dateRange"]').forEach(radio => {
                                        radio.addEventListener('change', updateCharts);
                                    });

                                    // Initial chart update
                                    updateCharts();
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
