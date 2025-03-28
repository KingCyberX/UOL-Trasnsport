<?php
include '../includes/db_connect.php';

// Check if the update_id is provided in the URL
if (isset($_GET['id'])) {
    $updateId = $_GET['id'];

    // Create a SQL query to delete the record
    $sql = "DELETE FROM add_updates WHERE update_id = $updateId";

    // Perform the deletion
    if ($conn->query($sql) === TRUE) {
        // Redirect back to the page with the updated data
        header("Location: add_updates.php");
        exit; // Terminate script execution
    } else {
        echo "Error deleting update: " . $conn->error;
    }
} else {
    echo "Update ID not provided.";
}

$conn->close();
?>
