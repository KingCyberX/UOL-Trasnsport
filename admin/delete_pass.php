<?php
include_once('../includes/db_connect.php');

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $passId = $_GET['id'];

    $deleteQuery = "DELETE FROM studentinfo WHERE id = $passId";
    if ($conn->query($deleteQuery) === TRUE) {
        header("Location: manage_pass.php"); 
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}
?>
