<?php
include_once('includes/header.php');
include_once('includes/sidebar.php');
include_once('includes/navbar.php');
include_once('../includes/db_connect.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the form and insert into the database
    $routeId = $_POST['route'];
    $description = $_POST['description'];
    $date = date('Y-m-d');

    $query = "INSERT INTO daily_reports (route_id, description, report_date) VALUES ('$routeId', '$description', '$date')";
    mysqli_query($conn, $query);
}

// Fetch routes from the cities table
$routeQuery = "SELECT id, city_name FROM cities";
$routeResult = mysqli_query($conn, $routeQuery);

// Initialize variables for date filter
$dateFilter = "";
$filteredReportResult = null;

// Check if the date filter form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['selected_date'])) {
    $dateFilter = $_GET['selected_date'];
    // Fetch filtered data from the daily_reports table based on the selected date
    $reportQuery = "SELECT daily_reports.id, cities.city_name, daily_reports.description, daily_reports.report_date
                    FROM daily_reports
                    INNER JOIN cities ON daily_reports.route_id = cities.id
                    WHERE daily_reports.report_date = '$dateFilter'";
    $filteredReportResult = mysqli_query($conn, $reportQuery);
} else {
    // If no date filter is set, fetch all data from the daily_reports table
    $reportQuery = "SELECT daily_reports.id, cities.city_name, daily_reports.description, daily_reports.report_date
                    FROM daily_reports
                    INNER JOIN cities ON daily_reports.route_id = cities.id";
    $reportResult = mysqli_query($conn, $reportQuery);
}

// Check if the date filter form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['selected_date'])) {
    $dateFilter = $_GET['selected_date'];
    // Fetch filtered data from the daily_reports table based on the selected date
    $reportQuery = "SELECT daily_reports.id, cities.city_name, daily_reports.description, daily_reports.report_date
                    FROM daily_reports
                    INNER JOIN cities ON daily_reports.route_id = cities.id
                    WHERE daily_reports.report_date = '$dateFilter'";
    $filteredReportResult = mysqli_query($conn, $reportQuery);
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['clear_date_filter'])) {
    // If the "View All Reports" button is clicked, fetch all data from the daily_reports table
    $reportQuery = "SELECT daily_reports.id, cities.city_name, daily_reports.description, daily_reports.report_date
                    FROM daily_reports
                    INNER JOIN cities ON daily_reports.route_id = cities.id";
    $reportResult = mysqli_query($conn, $reportQuery);
}

?>

<nav class="navbar bg-body-tertiary bg-light my-4 justify-content-end mb-0">
    <div class="col-4" style="text-align: start;">
        <h5><strong> Add Daily Report</strong></h5>
    </div>
    <div class="col-8" style="text-align: end;">
        <form method="post" action="" class="form-inline">
            <div class="form-group mr-2">
                <label for="route" class="mr-2">Select Route:</label>
                <select class="form-control" name="route" id="route" required>
                    <?php while ($row = mysqli_fetch_assoc($routeResult)) : ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['city_name']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group mr-2">
                <label for="description" class="mr-2">Description:</label>
                <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Add Daily Report</button>
        </form>
    </div>
</nav>


<div class="container">
    <h2>Daily Reports</h2>
    <!-- Date Filter Form -->
    <form method="get" action="">
        <div class="form-group">
            <label for="selected_date">Select Date to View Reports:</label>
            <input type="date" class="form-control col-4" name="selected_date" id="selected_date" required>

            <button type="submit" class="btn btn-primary mt-2">View Reports</button>
            <a href="?clear_date_filter" class="btn btn-secondary mt-2 ml-2">View All Reports</a>

        </div>
    </form>

    <div class="container">
    <!-- Success and Error Messages -->
    <?php
    if (isset($_GET['success']) && $_GET['success'] == 1) {
        echo '<div class="alert alert-success" role="alert">
                Report deleted successfully!
              </div>';
    } elseif (isset($_GET['error']) && $_GET['error'] == 1) {
        echo '<div class="alert alert-danger" role="alert">
                Error deleting the report.
              </div>';
    }
    ?>
    </div>
    <!-- Table for Daily Reports -->
    <table class="table" id="myTable" >
        <thead>
            <tr>
                <th>Report ID</th>
                <th>Route</th>
                <th>Description</th>
                <th>Report Date</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $resultToDisplay = isset($filteredReportResult) ? $filteredReportResult : $reportResult;

            if ($resultToDisplay) {
                while ($reportRow = mysqli_fetch_assoc($resultToDisplay)) :
            ?>
                    <tr>
                        <td><?php echo $reportRow['id']; ?></td>
                        <td><?php echo $reportRow['city_name']; ?></td>
                        <td><?php echo $reportRow['description']; ?></td>
                        <td><?php echo $reportRow['report_date']; ?></td>
                        <td>
        <form method="post" action="delete_status.php">
            <input type="hidden" name="report_id" value="<?php echo $reportRow['id']; ?>">
            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </form>
    </td>
                    </tr>
            <?php
                endwhile;
            } else {
                echo '<tr><td colspan="4">No reports available.</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<?php
include_once('includes/footer.php');
?>
