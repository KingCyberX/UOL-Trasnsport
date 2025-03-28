<?php
include_once('../includes/db_connect.php');

$sqlCities = "SELECT * FROM cities";
$resultCities = $conn->query($sqlCities);

$options = "";
while ($rowCity = $resultCities->fetch_assoc()) {
    $options .= '<option value="' . $rowCity['id'] . '">' . $rowCity['city_name'] . '</option>';
}

echo $options;

// Close the database connection
$conn->close();
?>
