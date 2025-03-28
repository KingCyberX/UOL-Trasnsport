<?php
include_once('../includes/db_connect.php');

if (isset($_GET['id'])) {
    $pickupPointId = $_GET['id'];

    $sqlDeletePoint = "DELETE FROM pickup_points WHERE id = $pickupPointId";
    if ($conn->query($sqlDeletePoint) === TRUE) {
        header("Location: add_pickup_point.php");
        exit();
    } else {
        echo "Error deleting pickup point: " . $conn->error;
    }
} else {
    echo "Pickup Point ID not provided.";
}

$conn->close();
?>
