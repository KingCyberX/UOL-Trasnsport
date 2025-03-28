<?php
session_start();

// Include the file with the database connection code
include_once('../includes/db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cityId = $_POST['city_id'];
    $newCityName = $_POST['new_city_name'];
    
    // Check if $conn is a valid database connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sqlUpdateCity = "UPDATE cities SET city_name = '$newCityName' WHERE id = $cityId";
    
    if ($conn->query($sqlUpdateCity) === TRUE) {
        // Update successful
        $_SESSION['successMessageCity'] = "City updated successfully."; // Store the success message in the session
        // Redirect to add_city.php
        header("Location: add_city.php");
        exit(); // Make sure to exit after the header to prevent further execution
    } else {
        // Handle the error
        echo "Error updating city: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
