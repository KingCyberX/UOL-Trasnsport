<?php
include_once('../includes/db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['newPickupPoint'])) {
    $newPickupPoint = $_POST['newPickupPoint'];

    // Validate and sanitize input
    $newPickupPoint = htmlspecialchars(strip_tags($newPickupPoint));

    // Insert the new pickup point into the database
    $sql = "INSERT INTO location (pickup_point) VALUES ('$newPickupPoint')";

    if ($conn->query($sql) === TRUE) {
        echo "New pickup point added successfully!";
    } else {
        echo "Error adding new pickup point: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
