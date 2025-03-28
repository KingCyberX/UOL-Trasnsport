<?php
include_once('../includes/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['report_id'])) {
    $reportId = $_POST['report_id'];
    $editRouteId = $_POST['edit_route'];
    $editDescription = $_POST['edit_description'];

    // Perform the update operation
    $updateQuery = "UPDATE daily_reports SET route_id = '$editRouteId', description = '$editDescription' WHERE id = '$reportId'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        // Redirect back to the page after successful update
        header("Location: report.php?edit_success=1");
        exit();
    } else {
        // Redirect back to the page with an error parameter
        header("Location: report.php?edit_error=1");
        exit();
    }
} else {
    // Redirect back to the page with an error parameter for invalid request
    header("Location: report.php?edit_error=1");
    exit();
}
?>
