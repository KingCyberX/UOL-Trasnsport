<?php
session_start();
include_once('includes/header.php');
include_once('includes/sidebar.php');
include_once('includes/navbar.php');

include_once('../includes/db_connect.php');

// Initialize variables
$successMessagePoint = '';
$errorMessagePoint = '';

// Check if the form is submitted for adding a pickup point
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pickupPoint'])) {
    // Get values from the form
    $pickupPoint = $_POST["pickupPoint"];
    $selectedCityId = $_POST["selectedCityId"];

    // Insert pickup point into the pickup_points table with the city_id
    $sqlPoint = "INSERT INTO pickup_points (point_name, city_id) VALUES ('$pickupPoint', '$selectedCityId')";
    if ($conn->query($sqlPoint) !== TRUE) {
        $errorMessagePoint = "Error adding pickup point: " . $sqlPoint . "<br>" . $conn->error;
    } else {
        $successMessagePoint = "Pickup point added successfully.";
    }
}

// Fetch cities for the dropdown
$sqlCities = "SELECT * FROM cities";
$resultCities = $conn->query($sqlCities);
$citiesDropdownOptions = "";
while ($rowCity = $resultCities->fetch_assoc()) {
    $citiesDropdownOptions .= '<option value="' . $rowCity['id'] . '">' . $rowCity['city_name'] . '</option>';
}

// Close the database connection

?>

<nav class="navbar bg-body-tertiary bg-light justify-content-end mb-0">
    <div class="col-10" style="text-align: start;">
        <h5>Add Pickup Points</h5>
    </div>
    <div class="col-2">
                    <!-- Button to trigger the modal -->
                    <button type="button" class="btn btn-success mt-3" data-toggle="modal" data-target="#addPickupPointModal">
                Add Pickup Point
            </button>
    </div>
</nav>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-6 offset-md-3">
            <?php
            // Display success or error message for adding/editing a pickup point
if (isset($_SESSION['successMessagePoint'])) {
    echo '<div class="alert alert-success" role="alert">' . $_SESSION['successMessagePoint'] . '</div>';
    unset($_SESSION['successMessagePoint']); // Clear the session variable to avoid displaying the message on subsequent page loads
} elseif (isset($_SESSION['errorMessagePoint'])) {
    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['errorMessagePoint'] . '</div>';
    unset($_SESSION['errorMessagePoint']); // Clear the session variable to avoid displaying the message on subsequent page loads
}
            // Display success or error message for adding a pickup point
            if (!empty($successMessagePoint)) {
                echo '<div class="alert alert-success" role="alert">' . $successMessagePoint . '</div>';
            } elseif (!empty($errorMessagePoint)) {
                echo '<div class="alert alert-danger" role="alert">' . $errorMessagePoint . '</div>';
            }
            ?>



            <!-- Modal for adding pickup point -->
            <div class="modal fade" id="addPickupPointModal" tabindex="-1" role="dialog" aria-labelledby="addPickupPointModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addPickupPointModalLabel">Add Pickup Point</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="add_pickup_point.php" method="post">
                                <div class="form-group">
                                    <label for="selectCity">Select City:</label>
                                    <select class="form-control" id="selectCity" name="selectedCityId" required>
                                        <?php echo $citiesDropdownOptions; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pickupPoint">Pickup Point:</label>
                                    <input type="text" class="form-control" id="pickupPoint" name="pickupPoint" required>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">Add Pickup Point</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
// Fetch pickup points from the database
$sqlFetchPoints = "SELECT * FROM pickup_points";
$resultPoints = $conn->query($sqlFetchPoints);

// Display Pickup Point Table
echo "<div class='container'>
        <div class='row mt-4'>
            <div class='col-md-12'>
                <h2>Pickup Point Table</h2>
                <table class='table' id='myTable'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>City</th>
                            <th>Pickup Point</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>";

if ($resultPoints === false) {
    echo "<tr><td colspan='4'>Error fetching pickup points: " . $conn->error . "</td></tr>";
} else {
    // Display table of pickup points with associated city names
    if ($resultPoints->num_rows > 0) {
        while ($rowPoint = $resultPoints->fetch_assoc()) {
            // Fetch city name associated with the pickup point
            
    // Edit Pickup Point Modal
    echo "<div class='modal fade' id='editPickupPointModal{$rowPoint['id']}' tabindex='-1' role='dialog' aria-labelledby='editPickupPointModalLabel{$rowPoint['id']}' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='editPickupPointModalLabel{$rowPoint['id']}'>Edit Pickup Point</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>
                <form action='edit_pickup_point.php' method='post'>
                    <input type='hidden' name='pointId' value='{$rowPoint['id']}'>
                    <div class='form-group'>
                        <label for='editPickupPoint'>Edit Pickup Point:</label>
                        <input type='text' class='form-control' id='editPickupPoint' name='editPickupPoint' value='{$rowPoint['point_name']}' required>
                    </div>
                    <button type='submit' class='btn btn-primary mt-2'>Save Changes</button>
                </form>
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
            </div>
        </div>
    </div>
</div>";
            $cityId = $rowPoint['city_id'];
            $sqlFetchCity = "SELECT city_name FROM cities WHERE id = $cityId";
            $resultCity = $conn->query($sqlFetchCity);
            $cityName = ($resultCity && $resultCity->num_rows > 0) ? $resultCity->fetch_assoc()['city_name'] : 'N/A';

            echo "<tr>
            <td>{$rowPoint['id']}</td>
            <td>$cityName</td>
            <td>{$rowPoint['point_name']}</td>
            <td>
                <a href='delete_pickup_point.php?id={$rowPoint['id']}' class='btn btn-danger'><i class='fa fa-trash'></i></a>
                <button class='btn btn-primary' data-toggle='modal' data-target='#editPickupPointModal{$rowPoint['id']}'><i class='fa fa-edit'></i></button>
            </td>
          </tr>";
    
        }
    } else {
        echo "<tr><td colspan='4'>No pickup points found.</td></tr>";
    }
}

echo "</tbody>
                </table>
            </div>
        </div>
    </div>";
?>

<?php
include_once('includes/footer.php');
?>
