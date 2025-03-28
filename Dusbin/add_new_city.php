<?php
include_once('../includes/db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['newCity'])) {
    $newCityName = $_POST['newCity'];

    // Validate and sanitize input
    $newCityName = htmlspecialchars(strip_tags($newCityName));

    // Insert the new city into the database
    $sql = "INSERT INTO location (city_name) VALUES ('$newCityName')";

    if ($conn->query($sql) === TRUE) {
        echo "New city added successfully!";
    } else {
        echo "Error adding new city: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
