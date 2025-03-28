<td>
                <img src='{$imagePath}' alt='Profile Image' width='50'>
            </td>





            <?php
include_once('includes/header.php');
include_once('includes/sidebar.php');
include_once('includes/navbar.php');

?>

<?php
include "../includes/db_connect.php";

// Create an associative array to store route counts and capacities
$routeData = array();
for ($i = 1; $i <= 19; $i++) {
    $routeData[$i] = array(
        'count' => 0,
        'capacity' => 0  // Initialize with default capacity
    );
}

// Fetch capacities from the database (you need to create a table to store route capacities)
$capacityQuery = "SELECT * FROM route_capacities";
$capacityResult = mysqli_query($conn, $capacityQuery);
while ($capacityRow = mysqli_fetch_assoc($capacityResult)) {
    $routeData[$capacityRow['route_no']]['capacity'] = $capacityRow['capacity'];
}

$query = "SELECT * FROM studentinfo";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    // ... your existing code
    // Inside the while loop, update the route counts
    $routeData[$row['route_no']]['count']++;
    // ... continue with your existing code
}
?>

<!-- Display capacity update form -->
<div class="container-fluid">
    <h2>Set Route Capacities</h2>
    <form method="post" action="update_capacities.php"> <!-- Create update_capacities.php to handle form submission -->
        <table class="table">
            <thead>
                <tr>
                    <th>Route No</th>
                    <th>Capacity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($routeData as $routeNo => $data) {
                    $count = $data['count'];
                    $capacity = $data['capacity'];
                    $alertClass = ($count >= $capacity) ? 'alert-danger' : '';
                    echo "
                    <tr class='$alertClass'>
                        <td>Route $routeNo</td>
                        <td>
                            <input type='number' name='capacities[$routeNo]' value='$capacity'>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Update Capacities</button>
    </form>
</div>

<!-- Display route counts -->
<div class="container-fluid">
    <h2>Route Counts</h2>
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th>Route No</th>
                <th>Count</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($routeData as $routeNo => $data) {
                $count = $data['count'];
                echo "
                <tr>
                    <td>Route $routeNo</td>
                    <td>$count</td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
include_once('includes/footer.php');
?>
