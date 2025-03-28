<?php
include_once('includes/header.php');
include_once('includes/sidebar.php');
include_once('includes/navbar.php');
include '../includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $route_id = $conn->real_escape_string($_POST["route_id"]);
    $sub_route_name = $conn->real_escape_string($_POST["sub_route_name"]);

    // Fetch the day associated with the route
    $day_query = "SELECT day FROM routetable WHERE id = '$route_id'";
    $day_result = $conn->query($day_query);

    if (!$day_result) {
        // Add this section for error handling
        echo "Error fetching day: " . $conn->error;
    } else {
        $day_row = $day_result->fetch_assoc();
        $day = $day_row['day'];

        // Insert Pickup Point associated with the selected route and day
        $subroute_sql = "INSERT INTO subroutes (subroute_name, route_id, day_type) VALUES ('$sub_route_name', '$route_id', '$day')";
        if ($conn->query($subroute_sql) === TRUE) {
            // Set the success message if the Pickup Point is added successfully
            $alertMessage = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                Pickup Point added successfully.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
        } else {
            // Set an error message if there's an error adding the Pickup Point
            $alertMessage = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Error adding Pickup Point: ' . $subroute_sql . '<br>' . $conn->error . '
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
        }
    }
}
?>

<?php
// Display the alert message if it's not empty
if (!empty($alertMessage)) {
    echo $alertMessage;
}
?>
<nav class="navbar bg-body-tertiary bg-light justify-content-end mb-0">
    <div class="col-2" style="text-align: start;">
        <h4>Add Pickup Point</h4>
    </div>
    <div class="col-10">
        <form action="add_sub_route.php" method="post" class="form-inline">
            <label for="route_id" class="mr-2"><strong>Select Route:</strong></label>
            <select class="form-control mr-2" name="route_id" id="route_id" required>
                <?php
                // Fetch and display available routes from the database
                $route_query = "SELECT id, route_name FROM routetable";
                $route_result = $conn->query($route_query);

                if ($route_result->num_rows > 0) {
                    while ($row = $route_result->fetch_assoc()) {
                        echo '<option value="' . $row["id"] . '">' . $row["route_name"] . '</option>';
                    }
                }
                ?>
            </select>

            <label for="sub_route_name" class="mr-2"><strong>Pickup Point Name:</strong></label>
            <input type="text" name="sub_route_name" id="sub_route_name" class="form-control mr-2" required>

            <button type="submit" class="btn btn-success">Add Pickup-Point</button>
        </form>
    </div>
</nav>


<div class="container my-4">
    <h4>Pickup Points List</h4>
    <table class="table"  id="myTable">
        <thead>
            <tr>
                <th>Route</th>
                <th>Pickup Point</th>
                <th>Day</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
$query = "SELECT routetable.id as route_id, routetable.route_name, subroutes.subroute_name, subroutes.id as subroute_id, subroutes.day_type FROM subroutes
          JOIN routetable ON subroutes.route_id = routetable.id";
$result = $conn->query($query);

if ($result === FALSE) {
    // Add this section for error handling
    echo "Error executing query: " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["route_name"] . "</td>
                    <td>" . $row["subroute_name"] . "</td>
                    <td>" . $row["day_type"] . "</td>
                    <td>
                        <a href='delete_route.php?id=" . $row["route_id"] . "' class='btn btn-danger'><i class='fa fa-trash'></i> Route</a>
                        <a href='delete_sub_route.php?id=" . $row["subroute_id"] . "' class='btn btn-danger'><i class='fa fa-trash'></i> Pickup Point </a>
                    </td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No Pickup Point available.</td></tr>";
    }
}
?>

        </tbody>
    </table>
</div>


<?php
include_once('includes/footer.php');
?>
