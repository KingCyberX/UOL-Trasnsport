<?php
include '../includes/db_connect.php'; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Delete the user from the database
    $sql = "DELETE FROM users WHERE id = '$userId'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: user.php?deletesuccess=true");
        exit();
    } else {
        header("Location: user.php?deleteerror=true");
        exit();
    }
} else {
    header("Location: user.php"); // Redirect to user listing page
    exit();
}
?>
