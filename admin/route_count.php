<?php
include_once('includes/header.php');
include_once('includes/sidebar.php');
include_once('includes/navbar.php');
include "../includes/db_connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['capacities']) && is_array($_POST['capacities'])) {
        foreach ($_POST['capacities'] as $routeNo => $newCapacity) {
            $updateQuery = "UPDATE capacities SET capacity = $newCapacity WHERE route_no = $routeNo";
            mysqli_query($conn, $updateQuery);
        }
    }
}

$query = "SELECT studentinfo.route_no, COUNT(*) as count, capacities.capacity FROM studentinfo JOIN capacities ON studentinfo.route_no = capacities.route_no GROUP BY studentinfo.route_no";
$result = mysqli_query($conn, $query);

$alertMessage = ""; 

while ($row = mysqli_fetch_assoc($result)) {
    $routeNo = $row['route_no'];
    $count = $row['count'];
    $capacity = $row['capacity'];

    if ($count > $capacity) {
        $alertMessage .= "Alert: Route $routeNo has exceeded its capacity.<br>";
    }
}

?>
<style>
@keyframes blink {
    0% { opacity: 1; }
    50% { opacity: 0; }
    100% { opacity: 1; }
}

.blinking {
    animation: blink 1s infinite;
}
</style>
<?php
if (!empty($alertMessage)) {
    echo '<div class="alert alert-danger blinking">' . $alertMessage . '</div>';
}
?>
<nav class="navbar bg-body-tertiary bg-light my-4 justify-content-end mb-0">
    <div class="col-4" style="text-align: start;">
        <h5><strong> Route Counts and Capacities</strong></h5>
    </div>
    <div class="col-8" style="text-align: end;">
        <button  class="btn btn-success">Route Counts and Capacities</button>
  </div>
</nav>

<div class="container-fluid">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th>Route No</th>
                    <th>Count</th>
                    <th>Capacity</th>
                    <th>New Capacity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                mysqli_data_seek($result, 0);
                while ($row = mysqli_fetch_assoc($result)) {
                    $routeNo = $row['route_no'];
                    $count = $row['count'];
                    $capacity = $row['capacity'];
                    $alertClass = ($count >= $capacity) ? 'alert-danger' : '';
                    echo "
                    <tr class='$alertClass'>
                        <td>Route $routeNo</td>
                        <td>$count</td>
                        <td>$capacity</td>
                        <td>
                            <input type='number' name='capacities[$routeNo]' value='$capacity'>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
        <button type="submit" class="btn btn-success my-4">Update Capacities</button>
    </form>
</div>

<?php
include_once('includes/footer.php');
?>
