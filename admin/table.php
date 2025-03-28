<?php
include_once "../includes/db_connect.php";



$sql = "

";

// Execute queries
if (mysqli_query($conn, $sql) ) {
    echo "Tables created successfully.";
} else {
    echo "Error creating tables: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
