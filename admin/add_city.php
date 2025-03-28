<?php
session_start(); // Start the session

include_once('../includes/db_connect.php');

// Initialize variables
$errorMessageCity = '';

// Check if the form is submitted for adding a city
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values from the form
    $city = $_POST["city"];

    // Insert city into the cities table
    $sqlCity = "INSERT INTO cities (city_name) VALUES ('$city')";
    if ($conn->query($sqlCity) !== TRUE) {
        $errorMessageCity = "Error adding city: " . $sqlCity . "<br>" . $conn->error;
    } else {
        $_SESSION['successMessageCity'] = "City added successfully."; // Store the success message in the session
    }

    // Redirect to the same page to prevent form resubmission on page refresh
    header("Location: add_city.php");
    exit();
}

// Include header files after processing the form submission
include_once('includes/header.php');
include_once('includes/sidebar.php');
include_once('includes/navbar.php');
?>



<nav class="navbar bg-body-tertiary bg-light justify-content-end mb-0">
    <div class="col-6" style="text-align: start;">
        <h2>Manage Cities</h2>
    </div>
    <div class="col-6">
        <form action="add_city.php" method="post" class="form-inline">
            <label for="city" class="mr-2">City:</label>
            <input type="text" id="city" class="form-control col-md-5 mr-2" name="city" required>
            <button type="submit" class="btn btn-success">Add City</button>
        </form>
    </div>
</nav>


<div class="container">
    <div class="row mt-4">
        <div class="col-md-3">

            <?php
if (isset($_SESSION['successMessageCity'])) {
    echo '<div class="alert alert-success" role="alert">' . $_SESSION['successMessageCity'] . '</div>';
    unset($_SESSION['successMessageCity']); // Clear the session variable after displaying the message
} elseif (!empty($errorMessageCity)) {
    echo '<div class="alert alert-danger" role="alert">' . $errorMessageCity . '</div>';
}
?>
          
           
        </div>
    </div>
</div>

<!-- ... Existing code ... -->

<?php
// Fetch all cities from the table
$sqlFetchCities = "SELECT * FROM cities";
$resultCities = $conn->query($sqlFetchCities);

// Display City Table
echo "<div class='container'>
        <div class='row mt-4'>
            <div class='col-md-12'>
                <h2>Cities</h2>
                <table class='table' id='myTable'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>City Name</th>
                            <th>Action</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>";

// Display table of cities
foreach ($resultCities as $row) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['city_name']}</td>
            <td>
                <a href='delete_city.php?id={$row['id']}' class='btn btn-danger'><i class='fa fa-trash'></i></a>
            </td>
            <td>
                <button class='btn btn-primary edit-btn' data-toggle='modal' data-target='#editModal{$row['id']}' data-cityid='{$row['id']}' data-cityname='{$row['city_name']}'><i class='fa fa-edit'></i></button>
            </td>
          </tr>";

    // Modal for editing city
    echo "<div class='modal fade' id='editModal{$row['id']}' tabindex='-1' role='dialog' aria-labelledby='editModalLabel{$row['id']}' aria-hidden='true'>aria-hidden='true'>
            <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='editModalLabel{$row['id']}'>Edit City</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <form id='editForm{$row['id']}' method='post' action='edit_city.php'>
                            <input type='hidden' name='city_id' value='{$row['id']}'>
                            <div class='form-group'>
                                <label for='newCityName'>New City Name:</label>
                                <input type='text' class='form-control' id='newCityName' name='new_city_name' required value='{$row['city_name']}'>
                            </div>
                            <button type='submit' class='btn btn-primary'>Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>";
}

echo "</tbody>
        </table>
    </div>
</div>
</div>";

// Close the database connection
$conn->close();
?>

<?php
include_once('includes/footer.php');
?>
