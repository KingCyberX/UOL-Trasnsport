<?php
include_once('../includes/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['report_id'])) {
    $reportId = $_POST['report_id'];

    // Perform the delete operation
    $deleteQuery = "DELETE FROM daily_reports WHERE id = '$reportId'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        header("Location: report.php?success=1");
        exit();
    } else {
        header("Location: report.php?error=1");
        exit();
    }
} else {
    header("Location: report.php?error=1");
    exit();
}
?>
