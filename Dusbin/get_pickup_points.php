<?php
include_once('../includes/db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['city'])) {
    $cityName = $_POST['city'];

    // Validate and sanitize input
    $cityName = htmlspecialchars(strip_tags($cityName));

    // Fetch pickup points for the selected city
    $pickupResult = $conn->query("SELECT pickup_point FROM location WHERE city_name = '$cityName'");
    
    if ($pickupResult->num_rows > 0) {
        echo '<label for="pickupPoint">Pickup Point:</label>';
        echo '<select class="form-control" id="pickupPoint" name="pickupPoint" required>';
        while ($row = $pickupResult->fetch_assoc()) {
            echo '<option value="' . $row['pickup_point'] . '">' . $row['pickup_point'] . '</option>';
        }
        echo '</select>';
    } else {
        echo '<input type="text" class="form-control" id="pickupPoint" name="pickupPoint" placeholder="No pickup points available" readonly>';
    }
}

// Close the database connection
$conn->close();
?>
