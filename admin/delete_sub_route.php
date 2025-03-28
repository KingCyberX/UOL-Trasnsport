<?php
include_once('../includes/db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $subroute_id = $conn->real_escape_string($_GET["id"]);

    // Delete the selected sub-route
    $delete_subroute_sql = "DELETE FROM subroutes WHERE id = $subroute_id";
    if ($conn->query($delete_subroute_sql) === TRUE) {
        header("Location: add_sub_route.php"); // Redirect back to the sub-route page
        exit();
    } else {
        echo "Error deleting Sub-Route: " . $conn->error;
    }
}

$conn->close();
?>
