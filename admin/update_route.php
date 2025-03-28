<?php
include_once '../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $passId = $_POST['passId'];
    $newRouteNo = $_POST['route_no'];

    // Update the route_no in the database
    $updateQuery = "UPDATE studentinfo SET route_no = $newRouteNo WHERE id = $passId";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        // Redirect back to the page displaying passes
        header('Location: manage_pass.php');
        exit();
    } else {
        // Handle update failure
        echo "Error updating route: " . mysqli_error($conn);
    }
}
?>
