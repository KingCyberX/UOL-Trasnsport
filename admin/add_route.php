<?php
include_once('includes/header.php');
include_once('includes/sidebar.php');
include_once('includes/navbar.php');
include '../includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $route_name = $conn->real_escape_string($_POST["route_name"]);
    $day = $conn->real_escape_string($_POST["day"]);

    $route_sql = "INSERT INTO routetable (route_name, day) VALUES ('$route_name', '$day')";
    if ($conn->query($route_sql) === TRUE) {
        $alertMessage = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            Route added successfully.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
    } else {
        // Set an error message if there's an error adding the route
        $alertMessage = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Error adding Route: ' . $route_sql . '<br>' . $conn->error . '
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
    }
}
?>

<?php
// Display the alert message if it's not empty
if (!empty($alertMessage)) {
    echo $alertMessage;
}
?>

<nav class="navbar bg-body-tertiary bg-light my-4 justify-content-end mb-0">
    <div class="col-4" style="text-align: start;">
        <h5>Add New Route</h5>
    </div>
    <div class="col-8">
        <form class="form-inline" action="add_route.php" method="post">
            <label for="route_name" class="mr-2">Route Name:</label>
            <input type="text" name="route_name" id="route_name" class="form-control mr-2" required>

            <label for="day" class="mr-2">Day:</label>
            <select name="day" class="form-control mr-2" id="day" required>
                <option value="weekday">Weekday (Mon-Fri)</option>
                <option value="weekend">Weekend (Sat-Sun)</option>
            </select>

            <button type="submit" class="btn btn-success">Add Route</button>
        </form>
    </div>
</nav>




<div class="container">
    <h4>Routes List</h4>
    <table class="table"  id="myTable">
        <thead>
            <tr>
                <th>Route Name</th>
                <th>Day</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $route_query = "SELECT id, route_name ,day FROM routetable";
            $route_result = $conn->query($route_query);

            if ($route_result->num_rows > 0) {
                while ($row = $route_result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["route_name"] . "</td>
                            <td>" . $row["day"] . "</td>

                            <td>
                                <a href='delete_route.php?id=" . $row["id"] . "' class='btn btn-danger'><i class='fa fa-trash'></i> Route</a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No routes available.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
include_once('includes/footer.php');
?>
