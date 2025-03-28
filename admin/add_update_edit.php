<?php
include '../includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $updateId = $_POST["update_id"];
    $newHeading = $_POST["edit_heading"];
    $newParagraph = $_POST["edit_paragraph"];

    $sql = "UPDATE add_updates SET heading = '$newHeading', paragraph = '$newParagraph' WHERE update_id = $updateId";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: add_updates.php");
        exit; 
    } else {
        echo "Error updating update. Please try again later.";
        error_log("SQL Error: " . $conn->error);
    }

    $conn->close();
}
?>
