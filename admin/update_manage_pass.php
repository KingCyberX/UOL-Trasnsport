<?php
include "../includes/db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $studentId = $_POST["studentId"];
    $editName = $_POST["editName"];
    $editRegNo = $_POST["editRegNo"];
    $editEmail = $_POST["editEmail"];
    $editPhone = $_POST["editPhone"];
    $editsubsource = $_POST["editsubsource"]; // Make sure the field name matches the form field

    // Update the database record
    $query = "UPDATE studentinfo SET 
              name = '$editName',
              unireg = '$editRegNo',
              uniemail = '$editEmail',
              phone = '$editPhone',
              subsource = '$editsubsource'  /* Removed the comma here */
              WHERE id = $studentId";

    if (mysqli_query($conn, $query)) {
        // Record updated successfully
        header("Location: manage_pass.php"); // Redirect to the view page or any other page as needed
        exit();
    } else {
        // Handle the update error
        echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
