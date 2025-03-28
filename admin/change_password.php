<?php
session_start(); // Start the session

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: user.php"); // Redirect if not logged in
    exit();
}

include '../includes/db_connect.php'; // Include your database connection

$showError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmNewPassword = $_POST['confirm_new_password'];

    // Fetch the user's current password from the database
    $userId = $_SESSION['id'];
    $sql = "SELECT admin_pass FROM users WHERE id = '$userId'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $dbPassword = $row['admin_pass'];

    // Check if the entered current password matches the one in the database
    if (password_verify($currentPassword, $dbPassword)) {
        if ($newPassword === $confirmNewPassword) {
            $hash = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateSql = "UPDATE users SET admin_pass = '$hash' WHERE id = '$userId'";
            $updateResult = mysqli_query($conn, $updateSql);

            if ($updateResult) {
                $showAlert = true;
                header("Location: user.php?passwordchanged=true");
                exit();
            } else {
                $showError = "Error updating password";
            }
        } else {
            $showError = "New passwords do not match";
        }
    } else {
        $showError = "Invalid current password";
    }
}
?>
