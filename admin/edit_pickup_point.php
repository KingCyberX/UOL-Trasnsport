<?php
session_start();
include_once('../includes/db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editPickupPoint'])) {
    $pointId = $_POST['pointId'];
    $editedPickupPoint = $_POST['editPickupPoint'];

    $sqlEditPoint = "UPDATE pickup_points SET point_name='$editedPickupPoint' WHERE id='$pointId'";
    if ($conn->query($sqlEditPoint) !== TRUE) {
        $_SESSION['errorMessagePoint'] = "Error updating pickup point: " . $conn->error;
    } else {
        $_SESSION['successMessagePoint'] = "Pickup point updated successfully.";
        header("Location: add_pickup_point.php"); // Redirect to the page where you display pickup points
        exit();
    }
}
?>
