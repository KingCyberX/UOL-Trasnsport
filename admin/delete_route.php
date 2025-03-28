<?php
include_once('../includes/db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $route_id = $conn->real_escape_string($_GET["id"]);

    if (isset($_GET["confirm"]) && $_GET["confirm"] === "yes") {
        $delete_subroute_sql = "DELETE FROM subroutes WHERE route_id = $route_id";
        if ($conn->query($delete_subroute_sql) === TRUE) {
            $delete_route_sql = "DELETE FROM routetable WHERE id = $route_id";
            if ($conn->query($delete_route_sql) === TRUE) {
                header("Location: add_route.php"); 
                exit();
            } else {
                echo "Error deleting Route: " . $conn->error;
            }
        } else {
            echo "Error deleting Sub-Routes: " . $conn->error;
        }
    } else {
        echo '<script>
              if (confirm("Are you sure you want to delete this route?")) {
                  window.location.href = "delete_route.php?id=' . $route_id . '&confirm=yes";
              } else {
                  // User cancelled the deletion
                  window.location.href = "add_route.php"; // Redirect back to the sub-route page
              }
              </script>';
    }
}

$conn->close();
?>
