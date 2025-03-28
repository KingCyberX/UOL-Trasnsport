<?php
include_once('../includes/db_connect.php');

// Check if the ID parameter is provided
if (isset($_GET['id'])) {
    $cityId = $_GET['id'];

    // Check if there are related records in daily_reports
    $sqlCheckReports = "SELECT COUNT(*) FROM daily_reports WHERE route_id = $cityId";
    $result = $conn->query($sqlCheckReports);

    if ($result) {
        $rowCount = $result->fetch_assoc()['COUNT(*)'];

        if ($rowCount > 0) {
            // Cannot delete the city. There are related reports.
            $errorMessage = "Cannot delete the city. There are $rowCount report(s) associated with it.";
            echo "<script>
                    alert('$errorMessage');
                    window.location.href='add_city.php';
                  </script>";
        } else {
            // No related reports, proceed with deletion
            $sqlDeleteCity = "DELETE FROM cities WHERE id = $cityId";
            
            // Attempt to delete the city
            if ($conn->query($sqlDeleteCity) === TRUE) {
                // Redirect back to add_city.php after deletion
                header("Location: add_city.php");
                exit();
            } else {
                // Display the error message in the alert
                $errorMessage = "Error deleting city: " . $conn->error;
                echo "<script>
                        alert('$errorMessage');
                        window.location.href='add_city.php';
                      </script>";
            }
        }
    } else {
        // Display the error message in the alert
        $errorMessage = "Error checking reports: " . $conn->error;
        echo "<script>
                alert('$errorMessage');
                window.location.href='add_city.php';
              </script>";
    }
} else {
    // Display the error message in the alert
    $errorMessage = "City ID not provided.";
    echo "<script>
            alert('$errorMessage');
            window.location.href='add_city.php';
          </script>";
}

// Close the database connection
$conn->close();
?>
