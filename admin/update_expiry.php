<?php
include_once "../includes/db_connect.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $expire_date = $_POST['expire_date'];

    // Sanitize the input to prevent SQL injection
    $expireDate = mysqli_real_escape_string($conn, $expire_date);

    // Update expiry date for all rows
    $updateQuery = "UPDATE studentinfo SET expire_date = '$expireDate'";

    if (mysqli_query($conn, $updateQuery)) {
        // Redirect back to the page where you added the expiry date
        header("Location: manage_pass.php");
        exit();
    } else {
        echo "Error updating expire_date: " . mysqli_error($conn);
    }
}
?>
